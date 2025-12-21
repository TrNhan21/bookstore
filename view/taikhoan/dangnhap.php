<div class="layout-main">
    <div class="boxtrai">
        <div class="row">
            <div class="boxtitle">ĐĂNG NHẬP THÀNH VIÊN</div>
            <div class="row boxcontent formtaikhoan">

                <?php if (isset($_SESSION['user'])):
                    extract($_SESSION['user']); ?>
                    <div class="row mb10">
                        <p>Xin chào, <strong><?= $user ?></strong>!</p>
                        <ul style="list-style: none; padding: 10px 0;">
                            <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                            <?php if ($role == 1): ?>
                                <li><a href="admin/index.php" target="_blank">Đăng nhập Admin</a></li>
                            <?php endif; ?>
                            <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                            <li><a href="index.php?act=thoat" style="color: red;">Thoát tài khoản</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <form action="index.php?act=dangnhap" method="post">
                        <div class="row mb10">
                            <label for="user">Tên đăng nhập</label><br>
                            <input type="text" id="user" name="user" placeholder="Nhập tên đăng nhập" required>
                        </div>

                        <div class="row mb10">
                            <label for="pass">Mật khẩu</label><br>
                            <input type="password" id="pass" name="pass" placeholder=" Nhập mật khẩu" required>
                        </div>

                        <div class="row mb10">
                            <input type="checkbox" name="remember"> Ghi nhớ tài khoản?
                        </div>

                        <div class="row mb10">
                            <input type="submit" name="dangnhap" value="Đăng nhập">
                            <input type="reset" value="Nhập lại">
                        </div>

                        <div class="row mb10">
                            <a href="index.php?act=quenmk">Quên mật khẩu?</a> |
                            <a href="index.php?act=dangky">Đăng ký thành viên</a>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if (isset($thongbao) && $thongbao != ""): ?>
                    <div class="thongbao" style="color: red; margin-top: 10px;">
                        <?= htmlspecialchars($thongbao) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>

<style>
    /* Đồng bộ CSS với trang Đăng ký */
    .formtaikhoan input[type="text"],
    .formtaikhoan input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 5px;
    }

    .formtaikhoan input[type="submit"] {
        background-color: #ffc400;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        color: #333;
    }

    .formtaikhoan input[type="submit"]:hover {
        background-color: #e6b000;
    }

    .formtaikhoan a {
        text-decoration: none;
        color: #8b5a2b;
        font-size: 0.9em;
    }

    .formtaikhoan a:hover {
        text-decoration: underline;
    }
</style>