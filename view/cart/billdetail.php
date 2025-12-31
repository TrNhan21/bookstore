<style>
    :root {
        --gold-dark: #aa7a00;
        --gold-light: #ffe042;
        --brown-primary: #5a4a3a;
        --tan: #bdab8b;
        --cream-light: #fef9f3;
        --cream-medium: #f5e6d3;
        --white: #ffffff;
        --red-soft: #e74c3c;
        --gray-light: #e6ccb3;
        --accent-step: #d4a373;
    }

    /* Container Trạng thái Giao hàng */
    .status-container {
        width: 95%;
        margin: 20px auto;
        background: var(--white);
        padding: 30px;
        border-radius: 12px;
        border: 1px solid var(--tan);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .status-tracker {
        display: flex;
        justify-content: space-between;
        margin: 40px 0 20px;
        position: relative;
    }

    /* Đường kẻ nối các bước */
    .status-line {
        position: absolute;
        top: 15px;
        left: 5%;
        right: 5%;
        height: 4px;
        background-color: var(--gray-light);
        z-index: 1;
    }

    /* Tiến trình đường kẻ dựa trên trạng thái */
    .status-line-progress {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background-color: var(--accent-step);
        transition: width 0.5s ease;
    }

    .status-step {
        text-align: center;
        position: relative;
        flex: 1;
        z-index: 2;
    }

    .status-step .dot {
        height: 30px;
        width: 30px;
        background-color: var(--white);
        border: 3px solid var(--gray-light);
        border-radius: 50%;
        display: inline-block;
        margin-bottom: 10px;
        transition: 0.3s;
    }

    .status-step.active .dot {
        background-color: var(--accent-step);
        border-color: var(--accent-step);
        box-shadow: 0 0 10px rgba(212, 163, 115, 0.5);
    }

    .status-step.active p {
        color: #ffffffff;
        font-weight: bold;
    }

    .status-step p {
        font-size: 14px;
        color: #999;
    }

    /* Container chính Chi tiết */
    .detail-container {
        width: 95%;
        max-width: 100%;
        margin: 0 auto 50px;
        background: var(--white);
        border-radius: 12px;
        border: 1px solid var(--tan);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .cart-navigation {
        width: 95%;
        margin: 20px auto 10px;
    }

    .nav-tab {
        display: inline-block;
        padding: 12px 30px;
        background: var(--white);
        color: var(--gold-dark);
        border: 1px solid var(--tan);
        border-bottom: none;
        border-radius: 12px 12px 0 0;
        font-weight: bold;
        text-decoration: none;
        border-top: 4px solid var(--gold-dark);
    }

    .cart-header {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-dark) 100%);
        padding: 40px;
        text-align: center;
        color: var(--white);
    }

    .bill-info {
        padding: 40px;
        background: var(--cream-light);
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        border-bottom: 2px solid var(--tan);
    }

    .info-box h4 {
        color: var(--gold-dark);
        margin-bottom: 15px;
        text-transform: uppercase;
        font-size: 16px;
        border-left: 4px solid var(--gold-dark);
        padding-left: 10px;
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table th {
        background: var(--cream-medium);
        padding: 20px;
        text-align: center;
        color: var(--brown-primary);
    }

    .detail-table td {
        padding: 20px;
        border-bottom: 1px solid var(--cream-medium);
        text-align: center;
    }

    .img-detail {
        width: 70px;
        height: 100px;
        object-fit: cover;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Bổ sung thêm CSS cho Badge Phương thức thanh toán */
    .payment-badge {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
        margin-top: 5px;
    }

    .badge-cod {
        background-color: #fdf5e6;
        color: #8b5a2b;
        border: 1px solid #f5e6d3;
    }

    .badge-banking {
        background-color: #e8f4fd;
        color: #2980b9;
        border: 1px solid #d1e9ff;
    }
</style>
<?php
// 1. Xử lý trạng thái đơn hàng
$st = $bill['bill_status'];
$progress_width = ($st <= 3) ? ($st * 33.33) : 0;

// 2. Xử lý logic Phương thức thanh toán
$pttt_text = "";
$pttt_class = "";
$pttt_icon = "";

// Kiểm tra nếu có tồn tại cột pttt trong mảng $bill
if (isset($bill['pttt'])) {
    if ($bill['pttt'] == 2) {
        $pttt_text = "Chuyển khoản ngân hàng (Banking)";
        $pttt_class = "badge-banking";
        $pttt_icon = "🏦";
    } else {
        $pttt_text = "Tiền mặt khi nhận hàng (COD)";
        $pttt_class = "badge-cod";
        $pttt_icon = "🚚";
    }
} else {
    // Dự phòng cho các đơn hàng cũ chưa có cột pttt
    $pttt_text = "Tiền mặt khi nhận hàng (COD)";
    $pttt_class = "badge-cod";
    $pttt_icon = "🚚";
}
?>

<div class="status-container">
    <div
        style="font-weight: bold; color: var(--gold-dark); text-transform: uppercase; letter-spacing: 1px; text-align: center;">
        Trạng Thái Đơn Hàng
    </div>

    <div class="status-tracker">
        <div class="status-line">
            <div class="status-line-progress" style="width: <?= $progress_width ?>%;"></div>
        </div>

        <div class="status-step <?= ($st >= 0) ? 'active' : '' ?>">
            <span class="dot"></span>
            <p>Chờ xác nhận</p>
        </div>
        <div class="status-step <?= ($st >= 1) ? 'active' : '' ?>">
            <span class="dot"></span>
            <p>Đang xử lý</p>
        </div>
        <div class="status-step <?= ($st >= 2) ? 'active' : '' ?>">
            <span class="dot"></span>
            <p>Đang giao</p>
        </div>
        <div class="status-step <?= ($st == 3) ? 'active' : '' ?>">
            <span class="dot"></span>
            <p>Hoàn tất</p>
        </div>
    </div>

    <?php if ($st == 4): ?>
        <div
            style="text-align: center; color: #721c24; background: #f8d7da; padding: 15px; border-radius: 8px; font-weight: bold; margin-top: 10px;">
            <i class="fas fa-times-circle"></i> ĐƠN HÀNG ĐÃ HỦY
        </div>
    <?php endif; ?>
</div>

<div class="cart-navigation">
    <a href="index.php?act=mybill" class="nav-tab">
        <i class="fas fa-arrow-left"></i> QUAY LẠI ĐƠN HÀNG
    </a>
</div>

<div class="detail-container">
    <div class="cart-header">
        <h1>Chi Tiết Đơn Hàng #HB-<?= $bill['idhd'] ?></h1>
        <p><i class="far fa-calendar-alt"></i> Ngày đặt: <?= date('d/m/Y H:i:s', strtotime($bill['ngaydat'])) ?></p>
    </div>

    <div class="bill-info">
        <div class="info-box">
            <h4><i class="fas fa-map-marker-alt"></i> Thông tin người nhận</h4>
            <p><strong>Họ tên:</strong> <?= htmlspecialchars($bill['hoten']) ?></p>
            <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($bill['sdt']) ?></p>
            <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($bill['diachi']) ?></p>
        </div>

        <div class="info-box" style="text-align: right;">
            <h4><i class="fas fa-credit-card"></i> Thanh toán</h4>
            <p>Phương thức: </p>
            <div class="payment-badge <?= $pttt_class ?>">
                <?= $pttt_icon ?> <?= $pttt_text ?>
            </div>

            <p style="margin-top: 15px;">
                <span style="font-size: 16px; color: var(--brown-primary);">Tổng thanh toán:</span><br>
                <strong
                    style="font-size: 28px; color: var(--red-soft);"><?= number_format($bill['tongthanhtoan'], 0, ',', '.') ?>
                    đ</strong>
            </p>
        </div>
    </div>

    <table class="detail-table">
        <thead>
            <tr>
                <th style="text-align: left;">Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $items = isset($billct) ? $billct : (isset($billdetails) ? $billdetails : []);
            foreach ($items as $item):
                ?>
                <tr>
                    <td style="display: flex; align-items: center; gap: 20px; text-align: left;">
                        <img src="uploads/<?= $item['img'] ?>" class="img-detail"
                            onerror="this.src='../uploads/default.jpg'">
                        <span
                            style="font-weight: bold; color: var(--brown-primary);"><?= htmlspecialchars($item['tensp']) ?></span>
                    </td>
                    <td><?= number_format($item['dongia'], 0, ',', '.') ?> đ</td>
                    <td>x <?= $item['soluong'] ?></td>
                    <td style="font-weight: bold; color: var(--gold-dark); font-size: 18px;">
                        <?= number_format($item['thanhtien'], 0, ',', '.') ?> đ
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>