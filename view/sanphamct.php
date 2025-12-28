<style>
    .binhluan-box {
        margin-top: 30px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        width: 100%;
    }

    .binhluan-box .frmtitle h3 {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        color: var(--cream-accent);
        padding: 15px 20px;
        font-size: 1.1em;
        text-transform: uppercase;
        margin: 0;
        width: 100%;
    }

    .binhluan-box .frmcontent {
        background: var(--cream-light) !important;
        border: 1px solid var(--tan) !important;
        padding: 25px !important;
        width: 100%;
    }

    /* Danh sách bình luận */
    .bl-list {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
        max-height: 300px;
        overflow-y: auto;
    }

    .bl-item {
        background: #fff;
        border-bottom: 1px solid var(--cream-dark);
        padding: 12px 15px;
        margin-bottom: 5px;
        border-radius: 4px;
    }

    .bl-item strong {
        color: var(--gold-darker);
    }

    .bl-item em {
        color: #999;
        font-size: 0.85em;
    }

    /* Form nhập liệu */
    .comment-form textarea {
        width: 100%;
        height: 100px;
        padding: 15px;
        border: 2px solid var(--cream-dark);
        border-radius: 5px;
        font-family: 'Times New Roman', serif;
        font-size: 1em;
        transition: 0.3s;
        resize: vertical;
    }

    .comment-form textarea:focus {
        outline: none;
        border-color: var(--tan);
        background: #fff;
    }

    .btn-gui-bl {
        margin-top: 15px;
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        color: #6f5000ff;
        border: none;
        padding: 12px 30px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 25px;
        color: #ddd;
        cursor: pointer;
        transition: 0.2s;
        padding: 0 2px;
    }

    /* Hiệu ứng khi di chuột hoặc chọn */
    .star-rating input:checked~label,
    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #ffc107;
    }

    .btn-gui-bl:hover {
        transform: translateY(-2px);
        filter: brightness(1.2);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php
// 1. Xử lý logic lấy dữ liệu (Nếu Controller chưa xử lý)
if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
    $idsp_get = $_GET['idsp'];
    $onesp = loadone_sanpham($idsp_get);
    // Lưu ý: Sử dụng cột 'id' (mã danh mục) từ bảng sanpham để load cùng loại
    $sp_cungloai = load_sanpham_cungloai($idsp_get, $onesp['id']);
}

// 2. Giải nén dữ liệu sản phẩm
if (is_array($onesp)) {
    extract($onesp); // Tạo ra $idsp, $tensp, $giasp, $img, $motasp, $soluong...
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

                        <div class="inventory-status" style="margin-bottom: 20px;">
                            <?php if ($soluong > 0): ?>
                                <div style="color: #28a745; font-weight: bold; margin-bottom: 10px;">
                                    <i class="fas fa-check-circle"></i> Còn hàng (<?= $soluong ?> sản phẩm)
                                </div>
                                <div class="quantity" style="margin: 20px 0;">
                                    <label>Số lượng đặt: </label>
                                    <input type="number" name="soluong" value="1" min="1" max="<?= $soluong ?>"
                                        style="width: 70px; text-align: center; padding: 5px;">
                                </div>
                                <input type="submit" name="addcart" value="THÊM VÀO GIỎ HÀNG" class="btn-add"
                                    style="padding: 12px 25px; background: #ff4d4d; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: 0.3s;">
                            <?php else: ?>
                                <div
                                    style="color: #d9534f; font-weight: bold; font-size: 1.2rem; padding: 10px; border: 1px dashed #d9534f; display: inline-block; border-radius: 5px;">
                                    <i class="fas fa-exclamation-triangle"></i> HIỆN ĐÃ HẾT HÀNG
                                </div>
                                <div style="margin-top: 15px;">
                                    <input type="button" value="HẾT HÀNG" disabled
                                        style="padding: 12px 25px; background: #ccc; color: #666; border: none; border-radius: 5px; cursor: not-allowed; font-weight: bold;">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb binhluan-box">
            <div class="frmtitle">
                <h3><i class="fas fa-comments"></i> KHÁCH HÀNG BÌNH LUẬN</h3>
            </div>
            <div class="frmcontent">
                <ul class="bl-list">
                    <?php if (!empty($binhluan)): ?>
                        <?php foreach ($binhluan as $bl): ?>
                            <li class="bl-item">
                                <div style="display: flex; justify-content: space-between;">
                                    <span>
                                        <strong><i class="fas fa-user-circle"></i> <?= $bl['user'] ?></strong>
                                        <div class="stars-display" style="color: #ffc107; margin: 5px 0;">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                echo ($i <= $bl['rating']) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                                            }
                                            ?>
                                        </div>
                                        <p style="margin: 5px 0 0 0;"><?= $bl['noidung'] ?></p>
                                    </span>
                                    <em><i class="far fa-clock"></i> <?= $bl['ngaybinhluan'] ?></em>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li style="text-align: center; color: #999; padding: 20px;">Chưa có bình luận nào cho cuốn sách này.
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="comment-form">
                    <?php if (isset($_SESSION['user'])): ?>
                        <form action="index.php?act=sanphamct&idsp=<?= $idsp ?>" method="post">
                            <input type="hidden" name="idpro" value="<?= $idsp ?>">
                            <div class="rating-container"
                                style="margin-bottom: 15px; display: flex; align-items: center; gap: 15px;">
                                <label style="font-weight: bold; color: var(--brown-primary); margin: 0;">Đánh giá của
                                    bạn:</label>
                                <div class="star-rating">
                                    <input type="radio" id="5-stars" name="rating" value="5" checked />
                                    <label for="5-stars" class="star"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="1-star" name="rating" value="1" />
                                    <label for="1-star" class="star"><i class="fas fa-star"></i></label>
                                </div>
                            </div>
                            <textarea name="noidung" placeholder="Hãy để lại cảm nhận của bạn về cuốn sách..."
                                required></textarea>
                            <div style="text-align: right;">
                                <input type="submit" name="guibinhluan" class="btn-gui-bl" value="Gửi bình luận ngay">
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
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

    </styles>