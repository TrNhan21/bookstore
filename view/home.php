<style>
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
</style>
<div class="row mb ">
    <div class="boxtrai">
        <div class="row">
            <div class="banner mb">
                <!-- <img src="view/images/view10.jpg" alt=""> -->
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="view/images/view7.jpg" style="width:100%">
                        <div class="text">Đắc Nhân Tâm</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="view/images/view12.jpg" style="width:100%">
                        <div class="text">Bắt Trẻ Đồng Xanh</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="view/images/view3.jpg" style="width:100%">
                        <div class="text">Điều Quan Trọng Nhất</div>
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

            </div>
        </div>
        <div class="product-list">
            <?php foreach ($sanphamnew as $sp): ?>
                <?php
                $idsp = $sp['idsp'];
                $tensp = $sp['tensp'];
                $giasp = $sp['giasp'];
                $img = $sp['img'];

                $hinhanh = $img_path . $img;
                $linksp = "index.php?act=sanphamct&idsp=" . $idsp;
                ?>

                <div class="boxsp">
                    <a href="<?= $linksp ?>">
                        <img src="<?= $hinhanh ?>" alt="<?= $tensp ?>">
                    </a>

                    <p class="tensp">
                        <a href="<?= $linksp ?>"><?= $tensp ?></a>
                    </p>

                    <p class="gia">
                        Giá: <?= number_format($giasp) ?> VNĐ
                    </p>

                    <!-- ✅ NÚT THÊM GIỎ (CSS THẲNG) -->
                    <form action="index.php?act=addcart" method="post" style="text-align:center;margin-top:8px;">
                        <input type="hidden" name="idsp" value="<?= $idsp ?>">
                        <input type="hidden" name="tensp" value="<?= $tensp ?>">
                        <input type="hidden" name="img" value="<?= $img ?>">
                        <input type="hidden" name="giasp" value="<?= $giasp ?>">

                        <button type="submit" name="addcart" style="
                background: linear-gradient(135deg,#f39c12,#e67e22);
                color:#fff;
                border:none;
                padding:8px 14px;
                border-radius:6px;
                font-size:14px;
                font-weight:bold;
                cursor:pointer;
                transition:0.25s;
            " onmouseover="this.style.transform='scale(1.05)';this.style.opacity='0.9'"
                            onmouseout="this.style.transform='scale(1)';this.style.opacity='1'">
                            🛒 Thêm vào giỏ
                        </button>
                    </form>
                </div>

            <?php endforeach; ?>
        </div>

    </div>
    <div class="boxphai">
        <?php include "boxphai.php"; ?>
    </div>