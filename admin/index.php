<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/cart.php";
include "../model/binhluan.php";
include "header.php";

// Kiểm tra quyền admin nếu cần thiết ở đây

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        /* ==================== QUẢN LÝ DANH MỤC ==================== */
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendm = $_POST['tendm'];
                insert_danhmuc($tendm);
                $thongbao = "Thêm mới danh mục thành công!";
            }
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];

                // Kiểm tra logic trước khi xóa
                $count = check_danhmuc_has_sanpham($iddm);
                if ($count > 0) {
                    $thongbao = "Không thể xóa vì danh mục có sản phẩm!";
                } else {
                    delete_danhmuc($iddm);
                    $thongbao = "Xóa thành công!";
                }

            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'delete_selected_dm':
            if (isset($_POST['delete_selected']) && isset($_POST['name_id'])) {
                $ids = $_POST['name_id']; // Đây là mảng chứa các iddm đã chọn
                foreach ($ids as $iddm) {
                    // Kiểm tra xem danh mục có sản phẩm không trước khi xóa
                    if (check_danhmuc_has_sanpham($iddm) <= 0) {
                        delete_danhmuc($iddm);
                    }
                }
                $thongbao = "Đã thực hiện xóa các danh mục được chọn (Lưu ý: Các mục có sản phẩm sẽ không bị xóa).";
            } else {
                $thongbao = "Vui lòng chọn ít nhất một mục để xóa!";
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $dm = loadone_danhmuc($_GET['iddm']);
            }
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tendm = $_POST['tendm'];
                $iddm = $_POST['iddm'];
                update_danhmuc($iddm, $tendm);
                $thongbao = "Cập nhật danh mục thành công!";
            }
            $listdm = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        /* ==================== QUẢN LÝ SẢN PHẨM ==================== */
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm']; // Khớp với name="iddm" trong form của bạn
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'];
                $motasp = $_POST['motasp'];

                // KIỂM TRA AN TOÀN: Tránh lỗi Undefined array key
                if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != "") {
                    $img = $_FILES['hinhanh']['name'];

                    // Đường dẫn nhảy ra ngoài admin vào thư mục uploads
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($img);

                    // Thực hiện di chuyển file
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                        // Upload thành công
                    } else {
                        $img = ""; // Lỗi đường dẫn hoặc quyền ghi thư mục
                    }
                } else {
                    $img = ""; // Người dùng không chọn ảnh
                }

                // Truyền đúng biến $img vào cột 'img' trong database
                insert_sanpham($tensp, $giasp, $img, $motasp, $iddm, $soluong);
                $thongbao = "Thêm sản phẩm thành công!";
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";
            $iddm = isset($_POST['iddm']) ? $_POST['iddm'] : 0;

            $listdm = loadall_danhmuc();
            $listsp = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $check = check_sanpham_in_bill($_GET['idsp']);
                if ($check > 0) {
                    $thongbao = "Không thể xóa sản phẩm này vì đã có khách hàng mua!";
                } else {
                    delete_sanpham($_GET['idsp']);
                    $thongbao = "Xóa thành công!";
                }
            }
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'delete_selected_sp':
            if (isset($_POST['delete_selected']) && isset($_POST['selected_id'])) {
                $ids = $_POST['selected_id'];

                $result = delete_selected_sanpham($ids);

                $msg = "Đã xóa thành công " . $result['success'] . " sản phẩm. ";

                if (!empty($result['errors'])) {
                    $msg .= "<br>Không thể xóa các sản phẩm: <b>" . implode(", ", $result['errors']) . "</b> vì đã có người mua hàng (nằm trong hóa đơn).";
                }

                $thongbao = $msg;
            } else {
                $thongbao = "Vui lòng chọn ít nhất một sản phẩm để xóa!";
            }

            $listsp = loadall_sanpham();
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $sanpham = loadone_sanpham($_GET['idsp']);
            }
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $idsp = $_POST['idsp'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $motasp = $_POST['motasp'];
                $soluong = $_POST['soluong'];

                // KIỂM TRA FILE AN TOÀN
                // Kiểm tra xem khóa 'hinh' có tồn tại trong $_FILES và có tên file không
                if (isset($_FILES['hinh']) && $_FILES['hinh']['name'] != "") {
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // Upload thành công
                    }
                } else {
                    // Nếu không chọn ảnh mới, lấy lại tên ảnh cũ từ input hidden 'old_img'
                    $hinh = $_POST['old_img'];
                }

                update_sanpham($idsp, $iddm, $tensp, $giasp, $motasp, $hinh, $soluong);
                $thongbao = "Cập nhật thành công";
            }

            // Load lại dữ liệu để hiển thị danh sách
            $listdm = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        /* ==================== QUẢN LÝ KHÁCH HÀNG ==================== */
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $check = delete_taikhoan($_GET['id']);
                if ($check) {
                    $thongbao = "Xóa tài khoản thành công!";
                } else {
                    $thongbao = "Không thể xóa tài khoản này vì khách hàng đã có đơn hàng/dữ liệu liên quan!";
                }
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];

                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                $thongbao = "Cập nhật tài khoản thành công!";
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        /* ==================== QUẢN LÝ ĐƠN HÀNG ==================== */
        case 'listbill':
            $listbill = loadall_bill();
            include "bill/list.php";
            break;

        case 'xoabill':
            if (isset($_GET['idhd']) && $_GET['idhd'] > 0) {
                delete_bill($_GET['idhd']);
            }
            $listbill = loadall_bill();
            include "bill/list.php";
            break;

        case 'billdetail':
            if (isset($_GET['idhd']) && ($_GET['idhd'] > 0)) {
                $idhd = $_GET['idhd'];
                $bill = loadone_bill($idhd);   // Lấy thông tin khách hàng, tổng tiền
                $billct = loadall_cart($idhd); // Lấy danh sách sách khách đã mua
                include "bill/detail.php";
            }
            break;

        case 'thongke':
            $listthongke = loadall_thongke();
            $overview = load_stat_overview(); // Lấy dữ liệu cho các ô thông số
            include "thongke/list.php";
            break;

        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;

        case 'dsbl':
            $listbinhluan = loadall_binhluan_admin();
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']))
                delete_binhluan($_GET['id']);
            $listbinhluan = loadall_binhluan_admin();
            include "binhluan/list.php";
            break;

        case 'delete_selected_bl':
            if (isset($_POST['delete_selected']) && isset($_POST['selected_id'])) {
                $ids = $_POST['selected_id']; // Đây là một mảng chứa các ID đã chọn

                // Chuyển mảng ID thành chuỗi cách nhau bởi dấu phẩy (vd: 1,2,3)
                $ids_string = implode(',', $ids);

                // Gọi hàm xóa hàng loạt trong model
                delete_selected_binhluan($ids_string);

                $thongbao = "Đã xóa thành công các bình luận đã chọn!";
            }

            // Sau khi xóa xong, load lại danh sách
            $listbinhluan = loadall_binhluan_admin();
            include "binhluan/list.php";
            break;
        case 'update_status':
            if (isset($_POST['capnhat_tt']) && ($_POST['capnhat_tt'])) {
                $idhd = $_POST['idhd'];
                $new_status = $_POST['new_status'];
                update_bill_status($idhd, $new_status);

                // Chuyển hướng về trang chi tiết vừa sửa thay vì trang danh sách (nếu muốn)
                header("Location: index.php?act=billdetail&idhd=" . $idhd);
                exit();
            }
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
?>