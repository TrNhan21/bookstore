<?php
function insert_sanpham($tensp, $giasp, $hinh, $motasp, $iddm, $soluong)
{
    // Câu lệnh SQL thêm cột soluong vào bảng sanpham
    $sql = "INSERT INTO sanpham(tensp, giasp, img, motasp, id, soluong) 
            VALUES ('$tensp', '$giasp', '$hinh', '$motasp', '$iddm', '$soluong')";
    pdo_execute($sql);
}

function delete_sanpham($idsp)
{
    $sql = "DELETE FROM sanpham WHERE idsp=?";
    pdo_execute($sql, $idsp);
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham ORDER BY idsp DESC LIMIT 0,9";
    return pdo_query($sql);
}

function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxemsp DESC LIMIT 0,10";
    return pdo_query($sql);
}

function loadone_sanpham($idsp)
{
    $sql = "SELECT * FROM sanpham WHERE idsp = " . $idsp;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_tendm($iddm)
{
    if ($iddm <= 0) {
        return "";
    }

    $sql = "SELECT * FROM danhmuc WHERE iddm=?";
    $dm = pdo_query_one($sql, $iddm);

    if (is_array($dm)) {
        return $dm['tendm'];
    }

    return "";
}

function load_sanpham_cungloai($idsp, $iddm)
{
    if ($iddm == null || $iddm == "")
        return [];
    $sql = "SELECT * FROM sanpham WHERE id = ? AND idsp <> ?";
    return pdo_query($sql, $iddm, $idsp);
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND tensp LIKE '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND id = '" . $iddm . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($idsp, $iddm, $tensp, $giasp, $motasp, $hinh, $soluong)
{
    $sql = "UPDATE sanpham SET 
                id = '$iddm', 
                tensp = '$tensp', 
                giasp = '$giasp', 
                motasp = '$motasp', 
                img = '$hinh', 
                soluong = '$soluong' 
            WHERE idsp = " . $idsp;
    pdo_execute($sql);
}
function check_sanpham_in_bill($idsp)
{
    $sql = "SELECT count(*) FROM chitiethoadon WHERE idsp = ?";
    return pdo_query_value($sql, $idsp);
}
function delete_selected_sanpham($ids)
{
    $count_success = 0;
    $error_names = [];

    foreach ($ids as $idsp) {
        try {
            $sql_get_name = "SELECT tensp FROM sanpham WHERE idsp = " . $idsp;
            $sp = pdo_query_one($sql_get_name);
            $ten_sp = $sp['tensp'];
            $sql_delete = "DELETE FROM sanpham WHERE idsp = " . $idsp;
            pdo_execute($sql_delete);
            $count_success++;
        } catch (Exception $e) {
            if (strpos($e->getMessage(), '23000') !== false) {
                $error_names[] = $ten_sp;
            } else {
                throw $e;
            }
        }
    }

    return [
        'success' => $count_success,
        'errors' => $error_names
    ];
}
function update_soluong_kho($idsp, $soluong_mua)
{
    // Câu lệnh SQL trừ số lượng hiện có cho số lượng vừa mua
    $sql = "UPDATE sanpham SET soluong = soluong - ? WHERE idsp = ?";
    pdo_execute($sql, $soluong_mua, $idsp);
}
function count_sanpham_hethang()
{
    $sql = "SELECT count(idsp) FROM sanpham WHERE soluong <= 0";
    return pdo_query_value($sql);
}
function loadall_sanpham_by_danhmuc($iddm)
{
    // id trong bảng sanpham là khóa ngoại trỏ tới iddm của danhmuc
    $sql = "SELECT * FROM sanpham WHERE id = ? ORDER BY idsp DESC";
    return pdo_query($sql, $iddm);
}
function update_view_sanpham_by_dm($iddm)
{
    // Tăng lượt xem cho tất cả sản phẩm thuộc danh mục này khi admin vào xem thống kê chi tiết
    $sql = "UPDATE sanpham SET luotxemsp = luotxemsp + 1 WHERE id = ?";
    pdo_execute($sql, $iddm);
}
function update_view_sanpham($idsp)
{
    $sql = "UPDATE sanpham SET luotxemsp = luotxemsp + 1 WHERE idsp = ?";
    pdo_execute($sql, $idsp); // Truyền $idsp vào dấu ? để bảo mật
}
function reset_view_sanpham($iddm = 0)
{
    if ($iddm > 0) {
        // Sửa iddm thành id cho đúng tên cột trong CSDL của bạn
        $sql = "UPDATE sanpham SET luotxemsp = 0 WHERE id = ?";
        pdo_execute($sql, $iddm);
    } else {
        $sql = "UPDATE sanpham SET luotxemsp = 0";
        pdo_execute($sql);
    }
}
?>