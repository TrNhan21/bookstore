<style>
    /* Layout danh sách sản phẩm */
    .product-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 10px 0;
    }

    /* Mỗi hộp sản phẩm */
    /* mỗi sản phẩm */

    .boxsp {
        width: calc(33.333% - 14px);
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 12px;
        text-align: center;
        transition: 0.3s;

    }



    .boxsp:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* ảnh */

    .boxsp img {
        width: 100%;
        height: 220px;
        object-fit: contain;
    }


    .tensp {
        font-weight: bold;
        height: 40px;
        /* Giới hạn độ cao tên sản phẩm */
        overflow: hidden;
        margin: 10px 0;
    }

    .tensp a {
        text-decoration: none;
        color: #333;
    }

    .gia {
        color: #e67e22;
        font-weight: bold;
        font-size: 16px;
    }

    /* Đảm bảo slideshow hoạt động */
    .slideshow-container {
        max-width: 100%;
        position: relative;
        margin: auto;
    }
</style>

<div class="row mb">
    <div class="boxtrai">
        <div class="row">
            <div class="banner mb">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="view/images/view7.jpg" style="width:100%; border-radius: 8px;">
                        <div class="text">Đắc Nhân Tâm</div>
                    </div>

                    <div class="mySlides fade">
                        <img src="view/images/view12.jpg" style="width:100%; border-radius: 8px;">
                        <div class="text">Bắt Trẻ Đồng Xanh</div>
                    </div>

                    <div class="mySlides fade">
                        <img src="view/images/view3.jpg" style="width:100%; border-radius: 8px;">
                        <div class="text">Điều Quan Trọng Nhất</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <div style="text-align:center; margin-top: 10px;">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>

        <div class="product-list">
            <?php
            if (isset($sanphamnew) && !empty($sanphamnew)):
                foreach ($sanphamnew as $sp):
                    extract($sp); // Giải nén biến: $idsp, $tensp, $giasp, $img
                    $hinhanh = "uploads/" . $img;
                    if (!is_file($hinhanh))
                        $hinhanh = "uploads/no_image.png";
                    $linksp = "index.php?act=sanphamct&idsp=" . $idsp;
                    ?>

                    <div class="boxsp">
                        <div class="img-container">
                            <a href="<?= $linksp ?>">
                                <img src="<?= $hinhanh ?>" alt="<?= htmlspecialchars($tensp) ?>">
                            </a>
                        </div>

                        <p class="tensp">
                            <a href="<?= $linksp ?>"><?= htmlspecialchars($tensp) ?></a>
                        </p>

                        <p class="gia">
                            <?= number_format($giasp, 0, ',', '.') ?> VNĐ
                        </p>

                        <form action="index.php?act=addcart" method="post" style="margin-top:auto;">
                            <input type="hidden" name="idsp" value="<?= $idsp ?>">
                            <input type="hidden" name="tensp" value="<?= htmlspecialchars($tensp) ?>">
                            <input type="hidden" name="img" value="<?= $img ?>">
                            <input type="hidden" name="giasp" value="<?= $giasp ?>">
                            <input type="hidden" name="soluong" value="1">

                            <button type="submit" name="addcart" value="addcart" style="
                        background: linear-gradient(135deg,#f39c12,#e67e22);
                        color:#fff;
                        border:none;
                        padding:10px 18px;
                        border-radius:30px;
                        font-size:14px;
                        font-weight:bold;
                        cursor:pointer;
                        width: 100%;
                        transition:0.25s;
                    " onmouseover="this.style.opacity='0.85'; this.style.transform='scale(1.02)'"
                                onmouseout="this.style.opacity='1'; this.style.transform='scale(1)'">
                                🛒 Thêm vào giỏ
                            </button>
                        </form>
                    </div>

                    <?php
                endforeach;
            else:
                echo "<p>Đang cập nhật sản phẩm...</p>";
            endif;
            ?>
        </div>
    </div>

    <div class="boxphai">
        <?php include "boxphai.php"; ?>
    </div>
</div>