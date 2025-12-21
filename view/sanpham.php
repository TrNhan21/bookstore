<div class="row layout-main">
    <div class="boxtrai">
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM: <strong><?= isset($tendm) ? $tendm : "" ?></strong></div>
            <div class="row boxcontent">
                <?php
                $i = 0;
                // Kiểm tra nếu có danh sách sản phẩm
                if (isset($dssp) && is_array($dssp)) {
                    foreach ($dssp as $sp) {
                        extract($sp); // Giải nén mảng: idsp, tensp, giasp, img...
                
                        // Đường dẫn ảnh (Giả sử $img_path được định nghĩa ở Controller hoặc dùng trực tiếp "upload/")
                        $path_img = "uploads/" . $img;
                        $linksp = "index.php?act=sanphamct&idsp=" . $idsp;

                        // Xử lý margin-right cho box thứ 3 mỗi dòng
                        $mr = (($i + 1) % 3 == 0) ? "" : "mr";

                        echo '<div class="boxsp ' . $mr . '">
                                <div class="row img">
                                    <a href="' . $linksp . '">
                                        <img src="' . $path_img . '" alt="' . $tensp . '">
                                    </a>
                                </div>

                                <p class="sp-name"><a href="' . $linksp . '">' . $tensp . '</a></p>

                                <p class="sp-price">
                                    ' . number_format($giasp, 0, ',', '.') . ' VNĐ
                                </p>

                                <form action="index.php?act=addcart" method="post" style="margin-top:10px;">
                                    <input type="hidden" name="idsp" value="' . $idsp . '">
                                    <input type="hidden" name="tensp" value="' . $tensp . '">
                                    <input type="hidden" name="img" value="' . $img . '">
                                    <input type="hidden" name="giasp" value="' . $giasp . '">
                                    
                                    <button type="submit" name="addcart" style="
                                        width:100%;
                                        padding:10px;
                                        background:#ff9800;
                                        color:white;
                                        font-weight:bold;
                                        border:none;
                                        border-radius:6px;
                                        cursor:pointer;
                                        transition: 0.3s;
                                    " onmouseover="this.style.background=\'#e68a00\'" 
                                       onmouseout="this.style.background=\'#ff9800\'">
                                        🛒 Thêm vào giỏ
                                    </button>
                                </form>
                            </div>';
                        $i++;
                    }
                } else {
                    echo '<div style="padding: 20px;">Danh mục này hiện chưa có sản phẩm.</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>

<style>
    /* CSS bổ sung để giao diện đẹp hơn */
    .sp-name {
        height: 40px;
        overflow: hidden;
        text-align: center;
        margin-top: 10px;
    }

    .sp-name a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .sp-price {
        text-align: center;
        color: #e67e22;
        font-weight: bold;
    }

    .boxsp img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>