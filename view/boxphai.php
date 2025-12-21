<div class="boxphai">
    <div class="row mb">
        <div class="boxtitle">TÀI KHOẢN</div>
        <div class="boxcontent formtaikhoan">

            <?php if (isset($_SESSION['user']) && is_array($_SESSION['user'])):
                $user = $_SESSION['user'];
                extract($user); // Giải nén để có $id, $user, $email, $role...
                ?>
                <div class="row mb10">
                    Xin chào: <br>
                    <strong><?= htmlspecialchars($user) ?></strong>
                </div>

                <div class="row mb10">
                    Email: <?= htmlspecialchars($email) ?>
                </div>

                <div class="row mb10">
                    <ul class="menu-account">
                        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>

                        <?php if ($role == 1): ?>
                            <li><a href="admin/index.php" target="_blank"><b style="color:red">Đăng nhập Admin</b></a></li>
                        <?php endif; ?>

                        <li>
                            <a href="index.php?act=xoatk&id=<?= $id ?>"
                                onclick="return confirm('Hành động này sẽ xóa vĩnh viễn tài khoản của bạn. Bạn chắc chắn chứ?')">
                                <span style="color: #d9534f;">Xóa tài khoản</span>
                            </a>
                        </li>
                        <li><a href="index.php?act=thoat" style="color: blue;">Đăng xuất</a></li>
                    </ul>
                </div>

            <?php else: ?>
                <form action="index.php?act=dangnhap" method="post">
                    <div class="row mb10">
                        Tên đăng nhập<br>
                        <input type="text" name="user" required>
                    </div>

                    <div class="row mb10">
                        Mật khẩu<br>
                        <input type="password" name="pass" required>
                    </div>

                    <div class="row mb10">
                        <input type="submit" name="dangnhap" value="Đăng nhập">
                    </div>
                </form>

                <ul class="menu-account">
                    <li><a href="index.php?act=quenmk">Quên mật khẩu?</a></li>
                    <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb">
        <div class="boxtitle">DANH MỤC</div>
        <div class="boxcontent2 menudoc">
            <ul>
                <?php
                if (isset($danhsachdm) && is_array($danhsachdm)) {
                    foreach ($danhsachdm as $danhmuc) {
                        // Giải nén mảng thành biến $iddm và $tendm
                        extract($danhmuc);

                        // Tạo link sử dụng biến $iddm đúng theo ảnh database
                        $linkdm = "index.php?act=sanpham&iddm=" . $iddm;
                        ?>
                        <li>
                            <a href="<?= $linkdm ?>"><?= $tendm ?></a>
                        </li>
                        <?php
                    }
                } else {
                    echo "<li>Đang cập nhật danh mục...</li>";
                }
                ?>
            </ul>
        </div>

        <div class="boxfooter searbox">
            <form action="index.php?act=sanpham" method="post">
                <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm...">
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </form>
        </div>
    </div>

    <div class="row mb">
        <div class="boxtitle">TOP 10 YÊU THÍCH</div>
        <div class="boxcontent">
            <?php
            foreach ($danhsachtop10 as $sp) {
                extract($sp);
                // SỬA TẠI ĐÂY: Chắc chắn dùng idsp
                $linksp = "index.php?act=sanphamct&idsp=" . $idsp;
                $img_top10 = $img_path . $img;
                echo '
            <div class="row mb10 top10">
                <img src="' . $img_top10 . '" alt="" style="width:30px; height:30px; float:left; margin-right:10px;">
                <a href="' . $linksp . '">' . $tensp . '</a>
            </div>';
            }
            ?>
        </div>
    </div>
</div>