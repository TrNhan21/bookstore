<?php
// Kiểm tra và giải nén mảng sanpham thành các biến độc lập ($idsp, $tensp, $img, ...)
if (isset($sanpham) && is_array($sanpham)) {
    extract($sanpham);
}

// Xử lý hiển thị ảnh cũ
// Biến $img được tạo ra từ extract($sanpham) dựa trên cột 'img' trong database
$hinhpath = "../uploads/" . ($img ?? "");

if (is_file($hinhpath)) {
    $hinhTag = "<img src='" . $hinhpath . "' height='100' style='display:block; margin: 10px 0; border:1px solid #ccc; border-radius:5px;'>";
} else {
    $hinhTag = "<p style='color:orange; font-size: 0.9em;'>Chưa có ảnh hoặc ảnh lỗi</p>";
}
?>

<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT SÁCH</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục<br>
                <select name="iddm">
                    <option value="0">--Chọn danh mục--</option>
                    <?php
                    foreach ($listdm as $dm) {
                        // So sánh iddm của danh mục với cột 'id' (khóa ngoại trong bảng sản phẩm)
                        $selected = ($dm['iddm'] == $id) ? "selected" : "";
                        echo '<option value="' . $dm['iddm'] . '" ' . $selected . '>' . $dm['tendm'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="row mb10">
                Mã sách (ID)<br>
                <input type="text" value="<?= $idsp ?? '' ?>" disabled style="background: #eee;">
                <input type="hidden" name="idsp" value="<?= $idsp ?? '' ?>">
            </div>

            <div class="row mb10">
                Tên sách<br>
                <input type="text" name="tensp" value="<?= $tensp ?? '' ?>" required>
            </div>

            <div class="row mb10">
                Giá sách (VNĐ)<br>
                <input type="number" name="giasp" value="<?= $giasp ?? '' ?>" required>
            </div>

            <div class="row mb10">
                Hình ảnh sách<br>
                <?= $hinhTag ?>
                <input type="file" name="hinhanh">
                <input type="hidden" name="old_img" value="<?= $img ?? '' ?>">
            </div>

            <div class="row mb10">
                Mô tả<br>
                <textarea name="motasp" cols="30" rows="10"><?= $motasp ?? '' ?></textarea>
            </div>

            <div class="row mb10">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
            </div>

            <?php if (isset($thongbao) && $thongbao != "")
                echo "<p style='color:green;'>$thongbao</p>"; ?>
        </form>
    </div>
</div>