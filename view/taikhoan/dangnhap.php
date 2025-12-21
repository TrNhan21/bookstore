<div class="layout-main">
    <div class="boxtrai">
        <div class="row">
            <div class="boxtitle">ĐĂNG NHẬP</div>
            <div class="row boxcontent">
                <form action="index.php?act=dangnhap" method="post">
                    <div class="row mb10">
                        <label for="user">Tên đăng nhập</label><br>
                        <input type="text" id="user" name="user" required>
                    </div>

                    <div class="row mb10">
                        <label for="pass">Mật khẩu</label><br>
                        <input type="password" id="pass" name="pass" required>
                    </div>

                    <div class="row mb10">
                        <input type="submit" name="dangnhap" value="Đăng nhập">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>

                <?php if (isset($thongbao) && $thongbao != ""): ?>
                <div class="thongbao">
                    <?= htmlspecialchars($thongbao) ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include __DIR__ . "/../boxphai.php"; ?>
    </div>
</div>