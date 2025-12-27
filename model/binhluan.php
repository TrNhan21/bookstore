<?php


function loadall_binhluan($idpro)
{
    $sql = "SELECT bl.*, tk.user FROM binhluan bl 
            JOIN taikhoan tk ON bl.iduser = tk.id 
            WHERE bl.idpro = '$idpro' ORDER BY bl.id DESC";
    return pdo_query($sql);
}

// Hàm dành cho Admin
function loadall_binhluan_admin()
{
    $sql = "SELECT bl.*, tk.user, sp.tensp FROM binhluan bl 
            JOIN taikhoan tk ON bl.iduser = tk.id 
            JOIN sanpham sp ON bl.idpro = sp.idsp 
            ORDER BY bl.id DESC";
    return pdo_query($sql);
}

function delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan WHERE id = $id";
    pdo_execute($sql);
}
function delete_selected_binhluan($ids)
{
    // Câu lệnh SQL sử dụng toán tử IN để xóa nhiều ID
    $sql = "DELETE FROM binhluan WHERE id IN ($ids)";
    pdo_execute($sql);
}
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan, $rating)
{
    $sql = "INSERT INTO binhluan(noidung, iduser, idpro, ngaybinhluan, rating) 
            VALUES('$noidung', '$iduser', '$idpro', '$ngaybinhluan', '$rating')";
    pdo_execute($sql);
}
?>