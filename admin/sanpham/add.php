<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI SÁCH</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục<br>
                <select name="iddm">
                    <option value="0">--Chọn danh mục--</option>
                    <?php
                    foreach ($listdm as $dm) {
                        echo '<option value="' . $dm['iddm'] . '">' . $dm['tendm'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                Tên sách<br>
                <input type="text" name="tensp" required>
            </div>
            <div class="row mb10">
                Giá sách<br>
                <input type="text" name="giasp" required>
            </div>
            <div class="row mb10">
                Hình ảnh<br>
                <input type="file" name="hinhanh">
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="motasp" cols="30" rows="5"></textarea>
            </div>
            <div class="row mb10">
                Số lượng <br>
                <input type="number" name="soluong" min="0" value="0" required
                    style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
            </div>
            <?php if (!empty($thongbao))
                echo $thongbao; ?>
        </form>
    </div>
</div>