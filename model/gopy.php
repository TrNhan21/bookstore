<?php
// Lấy tất cả góp ý
function insert_gopy($name, $email, $noidung)
{
    $ngaygopy = date('H:i:s d/m/Y');
    // Đảm bảo tên bảng và tên cột trong ngoặc giống hệt CSDL của bạn
    $sql = "INSERT INTO gopy(name, email, noidung, ngaygopy) VALUES ('$name', '$email', '$noidung', '$ngaygopy')";
    pdo_execute($sql);
}

function loadall_gopy()
{
    $sql = "SELECT * FROM gopy ORDER BY id DESC";
    return pdo_query($sql);
}

// Xóa góp ý
function delete_gopy($id)
{
    $sql = "DELETE FROM gopy WHERE id=" . $id;
    pdo_execute($sql);
}
?>