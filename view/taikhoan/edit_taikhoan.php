<div class="layout-main">
    <div class="boxtrai">
        <div class="row">
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <div class="row boxcontent formtaikhoan">

                <?php
                if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    extract($_SESSION['user']);
                    // Đảm bảo lấy đúng biến id từ session sau khi extract
                    $id_account = $id;
                }
                ?>

                <form action="index.php?act=edit_taikhoan" method="post">
                    <input type="hidden" name="id" value="<?= $id_account ?>">

                    <div class="row mb10">
                        Email<br>
                        <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
                    </div>

                    <div class="row mb10">
                        Tên đăng nhập<br>
                        <input type="text" name="user" value="<?= htmlspecialchars($user ?? '') ?>" required>
                    </div>

                    <div class="row mb10">
                        Mật khẩu<br>
                        <input type="password" name="pass" value="<?= htmlspecialchars($pass ?? '') ?>"
                            placeholder="Nhập mật khẩu mới">
                        <small style="color: #666; display: block; margin-top: 5px;">(Để trống nếu không muốn đổi mật
                            khẩu)</small>
                    </div>

                    <div class="row mb10">
                        Địa chỉ<br>
                        <input type="text" name="address" value="<?= htmlspecialchars($address ?? '') ?>">
                    </div>

                    <div class="row mb10">
                        Điện thoại<br>
                        <input type="text" name="tel" value="<?= htmlspecialchars($tel ?? '') ?>">
                    </div>

                    <div class="row mb10">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>

                <?php if (isset($thongbao) && $thongbao != ""): ?>
                    <div
                        style="margin: 15px 0; padding: 10px; border-radius: 5px; background: #e8f5e9; color: #2e7d32; font-weight: bold;">
                        <?= $thongbao ?>
                    </div>
                <?php endif; ?>

                <hr style="border: 0.5px solid #eee; margin: 20px 0;">

                <div class="danger-zone"
                    style="background: #fff5f5; padding: 15px; border: 1px dashed #ffcccc; border-radius: 5px;">
                    <h3 style="color: #d9534f; margin-top: 0; font-size: 16px;">Vùng nguy hiểm</h3>
                    <p style="font-size: 13px; color: #666;">
                        Nếu bạn xóa tài khoản, toàn bộ dữ liệu cá nhân sẽ bị gỡ bỏ khỏi hệ thống.
                        <strong>Lưu ý:</strong> Không thể xóa nếu bạn đã có lịch sử đơn hàng.
                    </p>
                    <a href="index.php?act=delete_my_account&id=<?= $id_account ?>"
                        onclick="return confirm('CẢNH BÁO: Bạn có chắc chắn muốn xóa vĩnh viễn tài khoản này? Thao tác này không thể hoàn tác!')"
                        style="display: inline-block; padding: 8px 15px; background: #d9534f; color: white; text-decoration: none; border-radius: 4px; font-size: 14px;">
                        Xóa tài khoản của tôi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxphai.php"; ?>
    </div>
</div>