<div class="row layout-main">
    <div class="boxtrai">
        <div class="row ">
            <div class="boxtitle">SẢN PHẨM <strong><?= $tendm ?></strong></div>
            <div class="row boxcontent ">
                <?php
                $i = 0;
                foreach ($dssp as $sp) {
                    extract($sp);

                    $hinhanh = $img_path . $img;
                    $linksp = "index.php?act=sanphamct&idsp=" . $idsp;

                    if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }

                    echo '<div class="boxsp ' . $mr . '">
                        <div class="row img">
                            <a href="' . $linksp . '">
                                <img src="' . $hinhanh . '" alt="">
                            </a>
                        </div>

                        <p><a href="' . $linksp . '">' . $tensp . '</a></p>

                        <p style="text-align:center;">
                            Giá: ' . number_format($giasp) . ' VNĐ
                        </p>

                       <form action="index.php?act=addcart" method="post" style="margin-top:10px;">

     <input type="hidden" name="idsp" value="<?= $idsp ?>">
                <input type="hidden" name="tensp" value="<?= $tensp ?>">
                <input type="hidden" name="img" value="<?= $hinhanh ?>">
                <input type="hidden" name="giasp" value="<?= $giasp ?>">
                <button type="submit" style="
            width:100%;
            padding:10px;
            background:#ff9800;
            color:white;
            font-weight:bold;
            border:none;
            border-radius:6px;
            cursor:pointer;
        ">
                    🛒 Thêm vào giỏ hàng
                </button>

                </form>


            </div>';

                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include "boxphai.php"; ?>
    </div>
</div>