<?php
function insert_danhmuc($tendm)
{
    $sql = "INSERT INTO danhmuc(tendm) VALUES (?)";
    pdo_execute($sql, $tendm);
}

function delete_danhmuc($iddm)
{
    $sql = "DELETE FROM danhmuc WHERE iddm=?";
    pdo_execute($sql, $iddm);
}

function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmuc ORDER BY iddm DESC";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loadone_danhmuc($iddm)
{
    $sql = "SELECT * FROM danhmuc WHERE iddm=?";
    return pdo_query_one($sql, $iddm);
}

function update_danhmuc($iddm, $tendm)
{
    $sql = "UPDATE danhmuc SET tendm=? WHERE iddm=?";
    pdo_execute($sql, $tendm, $iddm);
}
function check_danhmuc_has_sanpham($iddm)
{
    $sql = "SELECT count(*) FROM sanpham WHERE id = ?";
    // Trả về số lượng sản phẩm (0 nếu không có sản phẩm nào)
    return pdo_query_value($sql, $iddm);
}
function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT tendm FROM danhmuc WHERE iddm = ?";
        $dm = pdo_query_one($sql, $iddm);

        // Trả về tendm nếu tìm thấy, ngược lại trả về chuỗi trống hoặc tiêu đề mặc định
        return $dm ? $dm['tendm'] : "";
    } else {
        return "";
    }
}
?>