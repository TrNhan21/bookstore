<?php
// 1. Xử lý logic lấy dữ liệu (Nếu Controller chưa xử lý)
if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
    $idsp_get = $_GET['idsp'];
    $onesp = loadone_sanpham($idsp_get);
    // Thay 'id' bằng tên cột mã loại thực tế trong DB của bạn (ví dụ: 'iddm' hoặc 'id_danhmuc')
    $sp_cungloai = load_sanpham_cungloai($idsp_get, $onesp['id']);
}

// 2. Giải nén dữ liệu sản phẩm
if (is_array($onesp)) {
    extract($onesp); // Tạo ra $idsp, $tensp, $giasp, $img, $motasp...
}
?>

<div class="row layout-main">
    <div class="boxtrai">
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CHI TIẾT</div>
            <div class="boxcontent">
                <form action="index.php?act=addcart" method="post">
                    <input type="hidden" name="idsp" value="<?= $idsp ?>">
                    <input type="hidden" name="tensp" value="<?= $tensp ?>">
                    <input type="hidden" name="giasp" value="<?= $giasp ?>">
                    <input type="hidden" name="img" value="<?= $img ?>">

                    <div class="product-detail-wrapper" style="padding: 20px;">
                        <h2 style="color: #5a4632; margin-bottom: 20px;"><?= $tensp ?></h2>

                        <div style="text-align: center; margin-bottom: 20px;">
                            <img src="<?= $img_path . $img ?>" width="300"
                                style="border-radius: 8px; border: 1px solid #ddd;">
                        </div>

                        <div class="product-desc" style="line-height: 1.6; margin-bottom: 20px; text-align: justify;">
                            <?= $motasp ?>
                        </div>

                        <div style="font-size: 1.2rem; margin-bottom: 20px;">
                            <b style="color: #d9534f;">Giá: </b><?= number_format($giasp) ?> VNĐ
                        </div>

                        <div class="quantity" style="margin: 20px 0;">
                            <label>Số lượng: </label>
                            <input type="number" name="soluong" value="1" min="1"
                                style="width: 60px; text-align: center;">
                        </div>
                        <input type="submit" name="addcart" value="THÊM VÀO GIỎ HÀNG" class="btn-add"
                            style="padding: 10px 20px; background: #ff4d4d; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb">
            <div class="boxtitle">BÌNH LUẬN</div>
            <div class="row boxcontent" id="binhluan">
                <p style="padding: 20px;">Tính năng bình luận đang cập nhật...</p>
            </div>
        </div>

        <div class="row mb">
            <div class="boxtitle">SÁCH CÙNG LOẠI</div>
            <div class="boxcontent">
                <ul class="sp-cungloai-list">
                    <?php
                    if (!empty($sp_cungloai)) {
                        foreach ($sp_cungloai as $sp) {
                            $linksp = "index.php?act=sanphamct&idsp=" . $sp['idsp'];
                            echo '<li><a href="' . $linksp . '">' . $sp['tensp'] . '</a></li>';
                        }
                    } else {
                        echo "<li>Không có sản phẩm cùng loại</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>

<style>
    .sp-cungloai-list {
        list-style: disc;
        padding: 15px 40px;
        margin: 0;
    }

    .sp-cungloai-list li {
        margin-bottom: 10px;
    }

    .sp-cungloai-list a {
        color: #3e4a59;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
    }

    .sp-cungloai-list a:hover {
        color: #8b5e00;
        text-decoration: underline;
    }

    .boxcontent {
        background-color: #fbf7f0;
        border: 1px solid #d6c6a5;
        margin-bottom: 20px;
        border-top: none;
    }
</style>