<?php
// Kiểm tra nếu không có thông tin hóa đơn thì quay về trang chủ
if (!isset($bill) || empty($bill)) {
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <style>
        .bill-container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
        }

        .bill-header {
            background: linear-gradient(135deg, #e6b800 0%, #aa7a00 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }

        .success-icon {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: #aa7a00;
            font-size: 30px;
        }

        .bill-body {
            padding: 30px;
        }

        .info-box {
            background: #fffdf5;
            border-left: 4px solid #aa7a00;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 30px;
        }

        .info-title {
            font-weight: bold;
            color: #8b5a2b;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-row {
            display: flex;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .info-label {
            width: 120px;
            color: #666;
        }

        .info-value {
            font-weight: 500;
            color: #333;
        }

        .bill-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .bill-table th {
            background: #aa7a00;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            text-transform: uppercase;
        }

        .bill-table td {
            padding: 15px 12px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        .text-right {
            text-align: right;
        }

        .total-box {
            border: 2px dashed #aa7a00;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .total-label {
            font-size: 18px;
            font-weight: bold;
            color: #8b5a2b;
        }

        .total-amount {
            font-size: 24px;
            font-weight: bold;
            color: #aa7a00;
        }

        .btn-home {
            display: block;
            width: fit-content;
            margin: 0 auto;
            padding: 12px 35px;
            background: #ffcc00;
            color: #8b5a2b;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: #aa7a00;
            color: white;
            transform: translateY(-2px);
        }

        .footer-note {
            text-align: center;
            color: #999;
            font-size: 13px;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="bill-container">
        <div class="bill-header">
            <div class="success-icon">✓</div>
            <h2>Đặt hàng thành công!</h2>
            <p>Cảm ơn bạn đã tin tưởng và đặt hàng tại cửa hàng chúng tôi</p>
        </div>

        <div class="bill-body">
            <div class="info-box">
                <div class="info-title">📜 Thông tin khách hàng</div>
                <div class="info-row">
                    <span class="info-label">Họ và tên:</span>
                    <span class="info-value"><?= $bill['hoten'] ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Số điện thoại:</span>
                    <span class="info-value"><?= $bill['sdt'] ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Địa chỉ:</span>
                    <span class="info-value"><?= $bill['diachi'] ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Ngày đặt:</span>
                    <span class="info-value"><?= date("d/m/Y H:i", strtotime($bill['ngaydat'])) ?></span>
                </div>
            </div>

            <table class="bill-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th class="text-right">Số lượng</th>
                        <th class="text-right">Đơn giá</th>
                        <th class="text-right">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bill_details as $item): ?>
                        <tr>
                            <td><?= $item['tensp'] ?></td>
                            <td class="text-right"><?= $item['soluong'] ?></td>
                            <td class="text-right"><?= number_format($item['dongia']) ?> đ</td>
                            <td class="text-right"><strong><?= number_format($item['thanhtien']) ?> đ</strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total-box">
                <span class="total-label">Tổng thanh toán:</span>
                <span class="total-amount"><?= number_format($bill['tongthanhtoan']) ?> đ</span>
            </div>

            <a href="index.php" class="btn-home">🏠 Quay về trang chủ</a>

            <p class="footer-note">❤ Cảm ơn quý khách đã mua hàng. Chúng tôi sẽ liên hệ sớm nhất!</p>
        </div>
    </div>

</body>

</html>