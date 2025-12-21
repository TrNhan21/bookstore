<?php
if (is_array($tk)) {
    extract($tk);
}
?>
<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT TÀI KHOẢN</h1>
    </div>
    <div class="row frmcontent">
        <?php
        // Kiểm tra xem biến $tk có dữ liệu không trước khi dùng
        if (isset($tk) && is_array($tk)) {
            extract($tk);
        } else {
            echo "<p style='color:red;'>Không tìm thấy thông tin tài khoản!</p>";
        }
        ?>
        <form action="index.php?act=updatetk" method="post">
            <input type="hidden" name="id" value="<?php if (isset($id))
                echo $id; ?>">

            Tên đăng nhập<br>
            <input type="text" name="user" value="<?= $user ?>" required><br>

            Mật khẩu<br>
            <input type="text" name="pass" value="<?= $pass ?>" required><br>

            Email<br>
            <input type="email" name="email" value="<?= $email ?>"><br>

            <div class="row mb10">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listtk"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>