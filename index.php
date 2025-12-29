<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "model/binhluan.php";
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
            // 1. LẤY DỮ LIỆU TỪ FORM (Bắt buộc phải có đoạn này)
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $tongthanhtoan = $_POST['tongdonhang']; // Đảm bảo bên view/thanhtoan.php có input name="tongdonhang"
            $ngaydat = date('Y-m-d H:i:s');
            $iduser = (isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : 0;

            // 2. TẠO HÓA ĐƠN VÀ LẤY ID VỪA TẠO
            $idhd = bill_insert_id($iduser, $hoten, $sdt, $diachi, $tongthanhtoan, $ngaydat);

            // 3. XỬ LÝ CHI TIẾT VÀ TRỪ KHO
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $sp) {
                    $idsp = $sp['idsp'];
                    $soluong = $sp['soluong'];
                    $dongia = $sp['giasp'];
                    $thanhtien = $dongia * $soluong;

                    // Lưu vào bảng chitiethoadon
                    insert_chitiethoadon($idhd, $idsp, $soluong, $dongia, $thanhtien);

                    // Cập nhật số lượng tồn kho (Hàm này bạn đã viết trong model/sanpham.php)
                    update_soluong_kho($idsp, $soluong);
                }
            }

            // 4. XÓA GIỎ HÀNG VÀ THÔNG BÁO
            clear_cart();
            echo "<script>
                alert('Đặt hàng thành công! Mã đơn hàng của bạn là: #" . $idhd . "');
                window.location.href = 'index.php';
              </script>";

        } else {
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
            update_view_sanpham($idsp); // Tăng view khi khách click xem
            // --- BỔ SUNG: ĐOẠN XỬ LÝ LƯU BÌNH LUẬN KHI BẤM GỬI ---
            if (isset($_POST['guibinhluan'])) {
                $noidung = $_POST['noidung'];
                $idpro = $_POST['idpro'];
                $iduser = $_SESSION['user']['id'];
                $rating = $_POST['rating']; // Lấy số sao từ form
                $ngaybinhluan = date('Y-m-d H:i:s');

                insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan, $rating);
                header("Location: index.php?act=sanphamct&idsp=" . $idpro);
            }
            $onesp = loadone_sanpham($idsp);
            if (is_array($onesp)) {
                extract($onesp);
                // Lưu ý: Dùng $id (mã danh mục từ bảng sanpham) để load sản phẩm cùng loại
                $sp_cungloai = load_sanpham_cungloai($idsp, $id);

                // Load danh sách bình luận (bao gồm cả cái mới nhất vừa lưu)
                $binhluan = loadall_binhluan($idsp);

                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
        } else {
            include "view/home.php";
        }
        break;

    case 'mybill':
        // Kiểm tra xem đã đăng nhập chưa
        if (isset($_SESSION['user'])) {
            // Lấy ID của tài khoản đang đăng nhập hiện tại
            $iduser = $_SESSION['user']['id'];

            // Gọi hàm lấy đơn hàng của ĐÚNG tài khoản này
            $listbill = loadall_bill_user($iduser);

            include "view/cart/mybill.php";
        } else {
            // Nếu chưa đăng nhập thì bắt quay về trang chủ
            include "view/home.php";
        }
        break;

    case 'billdetail':
        if (isset($_GET['idhd']) && ($_GET['idhd'] > 0)) {
            $idhd = $_GET['idhd'];
            $bill = loadone_hoadon($idhd); // Lấy thông tin chung (người nhận, tổng tiền)
            $billdetails = loadall_cart_detail($idhd); // Lấy danh sách sản phẩm đã mua
            include "view/cart/billdetail.php";
        }
        break;

    case 'return_policy':
        include "view/static/return_policy.php";
        break;
    case 'privacy_policy':
        include "view/static/privacy_policy.php";
        break;
    case 'payment_method':
        include "view/static/payment.php";
        break;
    case 'shipping_policy':
        include "view/static/shipping.php";
        break;

    default:
        // Nếu không có hành động nào hoặc act sai, sẽ hiện trang chủ
        include "view/home.php";
        break;
}

include "view/footer.php";
?>