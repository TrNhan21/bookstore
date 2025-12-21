<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=bookstore;charset=utf8";
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO($dburl, $username, $password);
        // Thiết lập trả về mảng kết hợp (Associative Array) mặc định
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Lỗi kết nối CSDL: " . $e->getMessage());
    }
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 */
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh INSERT và trả về ID vừa chèn (lastInsertId)
 */
function pdo_execute_return_lastInsertId($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT nhiều bản ghi)
 */
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi (SELECT 1)
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetch();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một giá trị (COUNT, SUM,...)
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch();
        return $row ? array_values($row)[0] : null;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
?>