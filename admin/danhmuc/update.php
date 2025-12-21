<?php
if (isset($dm) && is_array($dm)) {
    extract($dm); // tạo biến $iddm, $tendm từ mảng $dm
}
?>

<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT LOẠI SÁCH</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatedm" method="post">
            <div class="row mb10">
                Mã loại<br>
                <input type="text" value="<?= $iddm ?>" disabled>
                <input type="hidden" name="iddm" value="<?= $iddm ?>">
            </div>
            <div class="row mb10">
                Tên loại<br>
                <input type="text" name="tendm" value="<?= $tendm ?? '' ?>" required>
            </div>
            <div class="row mb10">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (!empty($thongbao)) {
                echo "<div class='notice'>$thongbao</div>";
            }
            ?>
        </form>
    </div>
</div>