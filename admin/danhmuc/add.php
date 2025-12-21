<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI LOẠI SÁCH</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=adddm" method="post">
            <div class="row mb10">
                Mã loại sách<br>
                <input type="text" value="(tự động)" disabled>
            </div>
            <div class="row mb10">
                Tên loại sách<br>
                <input type="text" name="tendm" required>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
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