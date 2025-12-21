<?php
function insert_taikhoan($user, $pass, $email, $address, $tel)
{
    $sql = "INSERT INTO taikhoan (user, pass, email, address, tel) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $user, $pass, $email, $address, $tel);
}

function checkuser($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user = ? AND pass = ?";
    $sp = pdo_query_one($sql, $user, $pass);
    return $sp;
}

function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan ORDER BY id DESC";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

function loadone_taikhoan($id)
{
    $sql = "SELECT * FROM taikhoan WHERE id = " . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}
function update_taikhoan($id, $user, $pass, $email, $address, $tel)
{
    $sql = "UPDATE taikhoan SET user = ?, pass = ?, email = ?, address = ?, tel = ? WHERE id = ?";
    pdo_execute($sql, $user, $pass, $email, $address, $tel, $id);
}

function check_email($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email = ?";
    return pdo_query_one($sql, $email);
}
function delete_taikhoan($id)
{
    try {
        $sql = "DELETE FROM taikhoan WHERE id = ?";
        pdo_execute($sql, $id);
        return true;
    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            return false;
        }
        throw $e;
    }
}
function delete_taikhoan_self($id)
{
    try {
        $sql = "DELETE FROM taikhoan WHERE id = ?";
        pdo_execute($sql, $id);
        return true;
    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            return false;
        }
        throw $e;
    }
}
?>