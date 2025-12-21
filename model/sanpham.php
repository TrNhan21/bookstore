<?php
function insert_sanpham($tensp, $giasp, $img, $motasp, $iddm)
{
    // Lưu ý: Cột id ở cuối bảng của bạn chính là id danh mục
    $sql = "INSERT INTO sanpham(tensp, giasp, img, motasp, id) 
            VALUES('$tensp', '$giasp', '$img', '$motasp', '$iddm')";
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

function update_sanpham($idsp, $tensp, $giasp, $img, $motasp, $iddm)
{
    $sql = "UPDATE sanpham SET 
            tensp = '" . $tensp . "', 
            giasp = '" . $giasp . "', 
            img = '" . $img . "', 
            motasp = '" . $motasp . "', 
            id = '" . $iddm . "' 
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
?>