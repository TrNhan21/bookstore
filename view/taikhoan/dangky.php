<div class="layout-main">
    <div class="boxtrai">
        <div class="row">
            <div class="boxtitle">ĐĂNG KÝ TÀI KHOẢN</div>
            <div class="row boxcontent formtaikhoan">

                <form action="index.php?act=dangky" method="post">

                    <div class="row mb10">
                        Email <span style="color:red">*</span><br>
                        <input type="email" name="email" placeholder="example@gmail.com"
                            value="<?= $_POST['email'] ?? '' ?>" required>
                    </div>

                    <div class="row mb10">
                        Tên đăng nhập <span style="color:red">*</span><br>
                        <input type="text" name="user" placeholder="Tên đăng nhập" value="<?= $_POST['user'] ?? '' ?>"
                            required>
                    </div>

                    <div class="row mb10">
                        Mật khẩu <span style="color:red">*</span><br>
                        <input type="password" name="pass" placeholder="Mật khẩu" required>
                    </div>

                    <div class="row mb10">
                        Địa chỉ<br>
                        <input type="text" name="address" placeholder="Địa chỉ" value="<?= $_POST['address'] ?? '' ?>">
                    </div>

                    <div class="row mb10">
                        Điện thoại<br>
                        <input type="text" name="tel" placeholder="Số điện thoại" value="<?= $_POST['tel'] ?? '' ?>">
                    </div>

                    <div class="row mb10">
                        <input type="submit" name="dangky" value="Đăng ký">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>

                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo '<h2 class="thongbao" style="color: green; font-size: 14px; margin-top: 10px;">' . $thongbao . '</h2>';
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
    /* CSS bổ sung để form đẹp hơn */
    .formtaikhoan input[type="text"],
    .formtaikhoan input[type="email"],
    .formtaikhoan input[type="password"] {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
    }

    .formtaikhoan input[type="submit"] {
        background-color: #ffc400;
        border: 1px solid #cc9c00;
        padding: 8px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .formtaikhoan input[type="submit"]:hover {
        background-color: #ffea00;
    }

    .thongbao {
        padding: 10px 0;
    }
</style>