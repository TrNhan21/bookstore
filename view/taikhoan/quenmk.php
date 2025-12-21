<div class="layout-main">
    <div class="boxtrai">
        <div class="row">
            <div class="boxtitle">KHÔI PHỤC MẬT KHẨU</div>
            <div class="row boxcontent formtaikhoan">

                <form action="index.php?act=quenmk" method="post">
                    <div class="row mb10">
                        Email đăng ký tài khoản <span style="color:red">*</span><br>
                        <input type="email" name="email" placeholder="Nhập email bạn đã đăng ký" required>
                    </div>

                    <div class="row mb10">
                        Mật khẩu mới muốn thay đổi <span style="color:red">*</span><br>
                        <input type="password" name="pass" placeholder="Nhập mật khẩu mới" required>
                    </div>

                    <div class="row mb10">
                        <input type="submit" name="guiemail" value="Xác nhận đổi mật khẩu">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>

                <?php if (isset($thongbao) && $thongbao != ""): ?>
                    <h2 class="thongbao" style="color: #d4a574; font-size: 14px; margin-top: 10px;">
                        <?= $thongbao ?>
                    </h2>
                <?php endif; ?>

                <div class="row mb10">
                    <a href="index.php?act=dangnhap" style="text-decoration: none; color: #8b5a2b; font-size: 0.9em;">
                        ← Quay lại đăng nhập
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>