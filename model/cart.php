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
    // Nếu không đăng nhập (iduser = 0), gán NULL cho DB
    $iduser = ($iduser > 0) ? $iduser : null;

    $sql = "INSERT INTO hoadon (iduser, hoten, sdt, diachi, tongthanhtoan, ngaydat) 
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

function loadall_bill()
{
    $sql = "SELECT * FROM hoadon ORDER BY idhd DESC";
    return pdo_query($sql);
}

function delete_bill($idhd)
{
    // Xóa chi tiết trước để tránh lỗi ràng buộc khóa ngoại
    $sql_detail = "DELETE FROM chitiethoadon WHERE idhd = ?";
    pdo_execute($sql_detail, $idhd);

    $sql_bill = "DELETE FROM hoadon WHERE idhd = ?";
    pdo_execute($sql_bill, $idhd);
}