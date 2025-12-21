<?php
// 1. Kiểm tra nếu giỏ hàng trống thì không cho vào trang này
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "
    <div style='max-width: 600px; margin: 60px auto; text-align: center; padding: 40px; background: linear-gradient(135deg, #fef9f3 0%, #fff8e7 100%); border-radius: 15px; box-shadow: 0 5px 20px rgba(139, 90, 43, 0.1); font-family: sans-serif;'>
        <div style='font-size: 80px; margin-bottom: 20px;'>🛒</div>
        <h3 style='color: #8b5a2b; margin-bottom: 10px; font-size: 22px;'>Giỏ hàng trống</h3>
        <p style='color: #5a4a3a; margin-bottom: 25px;'>Không có sản phẩm để thanh toán</p>
        <a href='index.php' style='display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #d4a574 0%, #c89666 100%); color: white; text-decoration: none; border-radius: 25px; font-weight: 600;'>← Quay về trang chủ</a>
    </div>";
    return;
}

// 2. Lấy thông tin thành viên (nếu đã đăng nhập) để tự động điền vào form
$user_name = $_SESSION['user']['user'] ?? '';
$user_tel = $_SESSION['user']['tel'] ?? '';
$user_address = $_SESSION['user']['address'] ?? '';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        /* GIỮ NGUYÊN TOÀN BỘ CSS CỦA BẠN */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5e6d3 0%, #fdf5e6 100%);
            padding: 30px 15px;
            min-height: 100vh;
        }

        .checkout-container {
            max-width: 1000px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(139, 90, 43, 0.15);
            overflow: hidden;
        }

        .checkout-header {
            background: linear-gradient(135deg, #ffe042ff 0%, #aa7a00ff 100%);
            padding: 35px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .checkout-header h1 {
            color: #ffffff;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .checkout-header p {
            color: #fff8e7;
            font-size: 15px;
            position: relative;
            z-index: 1;
        }

        .checkout-body {
            padding: 40px 30px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .info-panel,
        .order-panel {
            background: #fef9f3;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #f5e6d3;
        }

        .info-panel h3,
        .order-panel h3 {
            color: #8b5a2b;
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #8b5a2b;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #f5e6d3;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            background: #ffffff;
        }

        .form-group input:focus {
            border-color: #d4a574;
            outline: none;
            box-shadow: 0 0 0 4px rgba(212, 165, 116, 0.1);
        }

        .order-items {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: white;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #f5e6d3;
        }

        .item-name {
            font-weight: 600;
            color: #5a4a3a;
        }

        .item-price {
            font-weight: 600;
            color: #d4a574;
        }

        .order-total {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 2px dashed #d4a574;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-amount {
            font-size: 26px;
            font-weight: 700;
            color: #d4a574;
        }

        .checkout-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #ffea00ff 0%, #ffc400ff 100%);
            color: #8b5a2b;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(212, 165, 116, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.5);
        }

        .security-note {
            text-align: center;
            color: #8b7355;
            font-size: 13px;
            margin-top: 20px;
            padding: 15px;
            background: #fef9f3;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .order-panel {
                display: block;
            }
        }
    </style>
</head>

<body>

    <div class="checkout-container">
        <div class="checkout-header">
            <h1>🧾 Thanh toán đơn hàng</h1>
            <p>Vui lòng điền đầy đủ thông tin để hoàn tất đơn hàng</p>
        </div>

        <form action="index.php?act=hoadon" method="post">
            <div class="checkout-body">
                <div class="checkout-grid">

                    <div class="info-panel">
                        <h3>📋 Thông tin giao hàng</h3>
                        <div class="form-group">
                            <label for="hoten">Họ và tên *</label>
                            <input type="text" id="hoten" name="hoten" value="<?= htmlspecialchars($user_name) ?>"
                                placeholder="Nguyễn Văn A" required>
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại *</label>
                            <input type="tel" id="sdt" name="sdt" value="<?= htmlspecialchars($user_tel) ?>"
                                placeholder="0901234567" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email (để nhận thông báo)</label>
                            <input type="email" id="email" name="email"
                                value="<?= htmlspecialchars($user_email ?? '') ?>" placeholder="example@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa chỉ giao hàng *</label>
                            <input type="text" id="diachi" name="diachi" value="<?= htmlspecialchars($user_address) ?>"
                                placeholder="Số nhà, Tên đường, Quận/Huyện..." required>
                        </div>

                        <div class="form-group" style="margin-top: 20px;">
                            <label style="margin-bottom: 10px;">Phương thức thanh toán:</label>
                            <div
                                style="display: flex; flex-direction: column; gap: 10px; background: #fff; padding: 15px; border-radius: 8px; border: 1px solid #f5e6d3;">
                                <label style="font-weight: normal; cursor: pointer;">
                                    <input type="radio" name="pttt" value="1" checked> Thanh toán khi nhận hàng (COD)
                                </label>
                                <label style="font-weight: normal; cursor: pointer;">
                                    <input type="radio" name="pttt" value="2"> Chuyển khoản ngân hàng
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="order-panel">
                        <h3>📦 Đơn hàng của bạn</h3>
                        <div class="order-items">
                            <?php
                            $tong = 0;
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                                foreach ($_SESSION['cart'] as $sp):
                                    $tt = $sp['giasp'] * $sp['soluong'];
                                    $tong += $tt;
                                    ?>
                                    <div class="order-item">
                                        <div class="item-info">
                                            <div class="item-name"><?= htmlspecialchars($sp['tensp']) ?></div>
                                            <div style="font-size: 13px; color: #8b7355;">
                                                <?= number_format($sp['giasp'], 0, ',', '.') ?>đ x <?= $sp['soluong'] ?>
                                            </div>
                                        </div>
                                        <div class="item-price"><?= number_format($tt, 0, ',', '.') ?>đ</div>
                                    </div>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div>

                        <div class="order-total">
                            <div style="font-weight: 600; color: #8b5a2b;">Tổng thanh toán:</div>
                            <div class="total-amount"><?= number_format($tong, 0, ',', '.') ?> đ</div>

                            <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
                        </div>
                    </div>
                </div>

                <button type="submit" name="dongydathang" class="checkout-btn">
                    <span>✅</span>
                    <span>XÁC NHẬN ĐẶT HÀNG</span>
                </button>

                <div class="security-note">
                    🔒 Thông tin của bạn được bảo mật và chỉ sử dụng để xử lý đơn hàng
                </div>
            </div>
        </form>
    </div>

</body>

</html>