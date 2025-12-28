<?php
// ==========================================
// 1. QUẢN LÝ GIỎ HÀNG TRONG SESSION
// ==========================================

function addcart($idsp, $tensp, $img, $giasp, $soluong)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Nếu sản phẩm đã tồn tại, tăng số lượng
    if (isset($_SESSION['cart'][$idsp])) {
        $_SESSION['cart'][$idsp]['soluong'] += $soluong;
    } else {
        // Nếu chưa có, thêm mới với ID làm key để dễ quản lý
        $_SESSION['cart'][$idsp] = [
            'idsp' => (int) $idsp,
            'tensp' => $tensp,
            'img' => $img,
            'giasp' => (int) $giasp,
            'soluong' => (int) $soluong
        ];
    }
}

/**
 * Hàm cập nhật số lượng (Dùng cho nút + và -)
 * Đồng bộ toàn bộ về $_SESSION['cart']
 */
function update_cart_quantity($idsp, $type)
{
    if (isset($_SESSION['cart'][$idsp])) {
        if ($type == 'increase') {
            $_SESSION['cart'][$idsp]['soluong'] += 1;
        } else if ($type == 'decrease') {
            if ($_SESSION['cart'][$idsp]['soluong'] > 1) {
                $_SESSION['cart'][$idsp]['soluong'] -= 1;
            } else {
                // Nếu số lượng về 1 mà bấm trừ thì xóa luôn
                delete_cart_item($idsp);
            }
        }
    }
}

function delete_cart_item($idsp)
{
    if (isset($_SESSION['cart'][$idsp])) {
        unset($_SESSION['cart'][$idsp]);
    }
}

function clear_cart()
{
    unset($_SESSION['cart']);
}

function get_tong_donhang()
{
    $tong = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $tong += $item['giasp'] * $item['soluong'];
        }
    }
    return $tong;
}

// ==========================================
// 2. TƯƠNG TÁC DATABASE (Hóa đơn & Chi tiết)
// ==========================================

function bill_insert_id($iduser, $hoten, $sdt, $diachi, $tongthanhtoan, $ngaydat)
{
    $sql = "INSERT INTO hoadon(iduser, hoten, sdt, diachi, tongthanhtoan, ngaydat) 
            VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_lastInsertId($sql, $iduser, $hoten, $sdt, $diachi, $tongthanhtoan, $ngaydat);
}

function insert_chitiethoadon($idhd, $idsp, $soluong, $dongia, $thanhtien)
{
    $sql = "INSERT INTO chitiethoadon (idhd, idsp, soluong, dongia, thanhtien) 
            VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $idhd, $idsp, $soluong, $dongia, $thanhtien);
}

function update_stock($idsp, $soluong_mua)
{
    $sql = "UPDATE sanpham SET soluongton = soluongton - ? WHERE idsp = ?";
    pdo_execute($sql, $soluong_mua, $idsp);
}

function get_bill_info($idhd)
{
    $sql = "SELECT * FROM hoadon WHERE idhd = ?";
    return pdo_query_one($sql, $idhd);
}

function get_bill_details($idhd)
{
    $sql = "SELECT ct.*, sp.tensp, sp.img 
            FROM chitiethoadon ct 
            JOIN sanpham sp ON ct.idsp = sp.idsp 
            WHERE ct.idhd = ?";
    return pdo_query($sql, $idhd);
}

// ==========================================
// 3. QUẢN LÝ DÀNH CHO ADMIN
// ==========================================

function delete_bill($idhd)
{
    // Xóa chi tiết trước để tránh lỗi ràng buộc khóa ngoại
    $sql_detail = "DELETE FROM chitiethoadon WHERE idhd = ?";
    pdo_execute($sql_detail, $idhd);

    $sql_bill = "DELETE FROM hoadon WHERE idhd = ?";
    pdo_execute($sql_bill, $idhd);
}
// Lấy thông tin chi tiết các sản phẩm trong 1 hóa đơn
function loadall_cart_detail($idhd)
{
    // JOIN bảng chitiethoadon với bảng sanpham để lấy tên và ảnh sản phẩm
    $sql = "SELECT ct.*, sp.tensp, sp.img 
            FROM chitiethoadon ct 
            JOIN sanpham sp ON ct.idsp = sp.idsp 
            WHERE ct.idhd = $idhd";
    return pdo_query($sql);
}

function loadone_hoadon($idhd)
{
    $sql = "SELECT * FROM hoadon WHERE idhd = $idhd";
    return pdo_query_one($sql);
}

// Lấy thông tin chung của 1 hóa đơn (để hiển thị tiêu đề)

function loadall_thongke()
{
    $sql = "SELECT 
                dm.iddm as madm, 
                dm.tendm as tendm, 
                count(sp.idsp) as countsp, 
                min(sp.giasp) as minprice, 
                max(sp.giasp) as maxprice, 
                avg(sp.giasp) as avgprice";
    $sql .= " FROM danhmuc dm LEFT JOIN sanpham sp ON dm.iddm = sp.id";
    $sql .= " GROUP BY dm.iddm, dm.tendm ORDER BY dm.iddm DESC";
    return pdo_query($sql);
}

// Hàm lấy các chỉ số tổng quan (Widgets)
function load_stat_overview()
{
    $sql_revenue = "SELECT SUM(tongthanhtoan) as total_revenue FROM hoadon";
    $sql_orders = "SELECT COUNT(idhd) as total_orders FROM hoadon";
    $sql_prods = "SELECT COUNT(idsp) as total_prods FROM sanpham";

    $res['revenue'] = pdo_query_one($sql_revenue)['total_revenue'] ?? 0;
    $res['orders'] = pdo_query_one($sql_orders)['total_orders'] ?? 0;
    $res['prods'] = pdo_query_one($sql_prods)['total_prods'] ?? 0;
    return $res;
}


// 1. Hàm load danh sách hóa đơn theo User
function loadall_bill_user($iduser)
{
    // Câu lệnh này đảm bảo: Tài khoản nào thì thấy đơn hàng đó
    $sql = "SELECT * FROM hoadon WHERE iduser = ? ORDER BY idhd DESC";
    return pdo_query($sql, $iduser);
}

// 2. Hàm đếm số lượng mặt hàng trong một hóa đơn
function loadall_cart_count($idhd)
{
    // Dựa vào bảng 'chitiethoadon' trong sơ đồ của bạn
    $sql = "SELECT * FROM chitiethoadon WHERE idhd = $idhd";
    $list = pdo_query($sql);
    return sizeof($list);
}

// 3. Hàm lấy trạng thái hóa đơn (Nếu bảng hoadon của bạn chưa có cột status, 
// bạn có thể thêm vào DB hoặc mặc định hiển thị)
function get_ttdh($status, $ngaydat)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đảm bảo múi giờ đồng bộ

    $currentDate = new DateTime(); // Thời gian hiện tại hệ thống
    $orderDate = new DateTime($ngaydat); // Thời gian lưu trong database

    // Tính toán khoảng cách
    $interval = $currentDate->diff($orderDate);
    $daysPassed = $interval->days;

    $time_status = "";
    if ($daysPassed == 0) {
        $time_status = "(Mới đặt hôm nay)";
    } else {
        $time_status = "(Đã đặt " . $daysPassed . " ngày trước)";
    }

    switch ($status) {
        case '0':
            $s = "Chờ xác nhận " . $time_status;
            break;
        case '1':
            $s = "Đang xử lý " . $time_status;
            break;
        case '2':
            $s = "Đang giao hàng";
            break;
        case '3':
            $s = "Đã giao hàng";
            break;
        default:
            $s = "Mới đặt";
            break;
    }
    return $s;
}
function update_kho_hang($idsp, $soluong_mua)
{
    // Trừ số lượng trong bảng sanpham dựa trên idsp
    $sql = "UPDATE sanpham SET soluong = soluong - ? WHERE idsp = ?";
    pdo_execute($sql, $soluong_mua, $idsp);
}
// Hàm trả về chuỗi hiển thị tên trạng thái
function get_status_text($status_number)
{
    switch ($status_number) {
        case 0:
            return '<span style="color: #007bff;">Đơn hàng mới</span>';
        case 1:
            return '<span style="color: #ffc107;">Đang xử lý</span>';
        case 2:
            return '<span style="color: #17a2b8;">Đang giao hàng</span>';
        case 3:
            return '<span style="color: #28a745; font-weight: bold;">Đã giao / Hoàn tất</span>';
        case 4:
            return '<span style="color: #dc3545;">Đã hủy</span>';
        default:
            return "Không xác định";
    }
}

// Hàm cập nhật trạng thái vào Database
// Cập nhật trạng thái đơn hàng
function update_bill_status($idhd, $status)
{
    $sql = "UPDATE hoadon SET bill_status = ? WHERE idhd = ?";
    pdo_execute($sql, $status, $idhd);
}

// Load tất cả hóa đơn
function loadone_bill($idhd)
{
    $sql = "SELECT * FROM hoadon WHERE idhd = " . $idhd;
    $bill = pdo_query_one($sql);
    return $bill;
}
// Lấy danh sách sản phẩm của đơn hàng đó
function loadall_cart($idhd)
{
    // Sử dụng INNER JOIN để lấy thêm tensp và img từ bảng sanpham
    $sql = "SELECT ct.*, sp.tensp, sp.img 
            FROM chitiethoadon ct
            INNER JOIN sanpham sp ON ct.idsp = sp.idsp
            WHERE ct.idhd = ?";
    return pdo_query($sql, $idhd);
}
function loadall_bill()
{
    // Truy vấn tất cả các cột từ bảng hoadon, sắp xếp đơn mới nhất lên đầu
    $sql = "SELECT * FROM hoadon ORDER BY idhd DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}
?>