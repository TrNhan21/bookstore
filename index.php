<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "global.php";
include "view/header.php";

// Dữ liệu dùng chung
$sanphamnew = loadall_sanpham_home();
$danhsachdm = loadall_danhmuc();
$danhsachtop10 = loadall_sanpham_top10();

$act = $_GET['act'] ?? "";

switch ($act) {
    /* ==================== QUẢN LÝ TÀI KHOẢN ==================== */
    case 'gioithieu':
        include "view/gioithieu.php";
        break;

    case 'lienhe':
        include "view/lienhe.php";
        break;
    case 'dangky':
        if (isset($_POST['dangky'])) {
            $email = $_POST['email'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];

            if (check_email($email)) {
                $thongbao = "Email này đã được sử dụng!";
            } else {
                insert_taikhoan($user, $pass, $email, $address, $tel);
                $thongbao = "Đăng ký thành công! Bạn có thể đăng nhập.";
            }
        }
        include "view/taikhoan/dangky.php";
        break;

    case 'dangnhap':
        if (isset($_POST['dangnhap'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $checkuser = checkuser($user, $pass);
            if (is_array($checkuser)) {
                $_SESSION['user'] = $checkuser;
                header('Location: index.php');
                exit;
            } else {
                $thongbao = "Tài khoản hoặc mật khẩu không chính xác!";
            }
        }
        include "view/taikhoan/dangky.php";
        break;

    case 'edit_taikhoan':
        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $id = $_POST['id'];
            update_taikhoan($id, $user, $pass, $email, $address, $tel);
            $_SESSION['user'] = checkuser($user, $pass);
            $thongbao = "Cập nhật tài khoản thành công!";
        }
        include "view/taikhoan/edit_taikhoan.php";
        break;

    case 'update_taikhoan':
        if (isset($_POST['capnhat'])) {
            $id = $_POST['id'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];

            update_taikhoan($id, $user, $pass, $email, $address, $tel);
            $_SESSION['user'] = loadone_taikhoan($id); // Cập nhật lại session
            $thongbao = "Cập nhật tài khoản thành công!";
        }
        include "view/taikhoan/edit_taikhoan.php";
        break;

    case 'quenmk':
        if (isset($_POST['guiemail'])) {
            $email = $_POST['email'];
            $checkemail = check_email($email);
            if (is_array($checkemail)) {
                $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass']; // Lấy cột 'pass' từ DB
            } else {
                $thongbao = "Email không tồn tại!";
            }
        }
        include "view/taikhoan/quenmk.php";
        break;

    case 'xoatk':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
        } elseif (isset($_SESSION['user']['id'])) {
            $id = $_SESSION['user']['id'];
        }

        if (isset($id)) {
            $isDeleted = delete_taikhoan_self($id);
            if ($isDeleted) {
                unset($_SESSION['user']);
                header("Location: index.php");
                exit();
            } else {
                $thongbao = "Không thể xóa do bạn đã có đơn hàng!";
                include "view/taikhoan/edit_taikhoan.php";
            }
        }
        break;

    case 'thoat':
        session_destroy();
        header("Location: index.php");
        break;

    /* ==================== QUẢN LÝ GIỎ HÀNG & THANH TOÁN ==================== */
    case 'addcart':
        if (isset($_POST['addcart']) && ($_POST['addcart'])) {
            $idsp = $_POST['idsp'];
            $tensp = $_POST['tensp'];
            $img = $_POST['img'];
            $giasp = $_POST['giasp'];
            if (isset($_POST['soluong']) && $_POST['soluong'] > 0) {
                $soluong = (int) $_POST['soluong'];
            } else {
                $soluong = 1;
            }
            // 1. Kiểm tra xem giỏ hàng đã tồn tại chưa
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // 2. Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['idsp'] == $idsp) {
                    $item['soluong'] += $soluong; // Nếu có rồi thì tăng số lượng
                    $found = true;
                    break;
                }
            }

            // 3. Nếu chưa có sản phẩm này trong giỏ thì thêm mới
            if (!$found) {
                $spadd = [
                    'idsp' => $idsp,
                    'tensp' => $tensp,
                    'img' => $img,
                    'giasp' => $giasp,
                    'soluong' => $soluong
                ];
                $_SESSION['cart'][] = $spadd;
            }
        }
        // 4. Chuyển hướng về trang giỏ hàng
        header('Location: index.php?act=viewcart');
        exit();
        break;

    // Xử lý tăng số lượng sản phẩm
    case 'cart_plus':
        if (isset($_GET['idsp'])) {
            update_cart_quantity($_GET['idsp'], 'increase');
        }
        header("Location: index.php?act=viewcart");
        exit();
        break;

    case 'cart_minus':
        if (isset($_GET['idsp'])) {
            update_cart_quantity($_GET['idsp'], 'decrease');
        }
        header("Location: index.php?act=viewcart");
        exit();
        break;

    case 'delcart':
        if (isset($_GET['idsp'])) {
            delete_cart_item($_GET['idsp']);
        } else {
            clear_cart(); // Nếu không có idsp thì xóa sạch giỏ hàng
        }
        header("Location: index.php?act=viewcart");
        exit();
        break;

    case 'viewcart':
        include "view/cart/viewcart.php";
        break;

    case 'thanhtoan':
        include "view/cart/thanhtoan.php";
        break;

    case 'hoadon':
        if (isset($_POST['dongydathang'])) {
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $tongthanhtoan = $_POST['tongdonhang'];
            $ngaydat = date('Y-m-d H:i:s');
            $iduser = (isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : 0;
            $idhd = bill_insert_id($iduser, $hoten, $sdt, $diachi, $tongthanhtoan, $ngaydat);
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $sp) {
                    $idsp = $sp['idsp'];
                    $soluong = $sp['soluong'];
                    $dongia = $sp['giasp'];
                    $thanhtien = $dongia * $soluong;
                    insert_chitiethoadon($idhd, $idsp, $soluong, $dongia, $thanhtien);

                    // (Tùy chọn) Cập nhật số lượng tồn kho nếu cần
                    // update_stock($idsp, $soluong);
                }
            }
            clear_cart();
            echo "<script>
                alert('Đặt hàng thành công! Mã đơn hàng của bạn là: #" . $idhd . "');
                window.location.href = 'index.php';
              </script>";

        } else {
            // Nếu ai đó truy cập index.php?act=hoadon bằng cách gõ URL mà không bấm nút
            header("location: index.php");
        }
        break;

    /* ==================== SẢN PHẨM ==================== */
    case 'sanpham':
        $kyw = $_POST['kyw'] ?? "";
        $iddm = $_GET['iddm'] ?? 0;

        $dssp = loadall_sanpham($kyw, $iddm);
        $tendm = load_ten_dm($iddm);
        include "view/sanpham.php";
        break;

    case 'sanphamct':
        if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
            $idsp = $_GET['idsp']; // Lấy ID từ URL
            $onesp = loadone_sanpham($idsp);

            if (is_array($onesp)) {
                extract($onesp);
                // Sử dụng $iddm (vì bảng sanpham của bạn dùng iddm)
                $sp_cungloai = load_sanpham_cungloai($idsp, $id);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
        } else {
            include "view/home.php";
        }
        break;
    default:
        // Nếu không có hành động nào hoặc act sai, sẽ hiện trang chủ
        include "view/home.php";
        break;
}

include "view/footer.php";
?>