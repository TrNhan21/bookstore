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
    }

    /* Đưa container ra rộng toàn màn hình 95% */
    .detail-container {
        width: 95%;
        max-width: 100%;
        margin: 20px auto 50px;
        background: var(--white);
        border-radius: 12px;
        border: 1px solid var(--tan);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    /* Đồng bộ thanh điều hướng */
    .cart-navigation {
        width: 95%;
        margin: 20px auto 10px;
        display: flex;
    }

    .nav-tab.active {
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

    /* Header của chi tiết đơn */
    .cart-header {
        background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-dark) 100%);
        padding: 40px;
        text-align: center;
        color: var(--white);
    }

    .cart-header h1 {
        font-size: 30px;
        margin-bottom: 10px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Thông tin khách hàng & trạng thái */
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
        letter-spacing: 1px;
        border-left: 4px solid var(--gold-dark);
        padding-left: 10px;
    }

    .info-box p {
        margin: 8px 0;
        font-size: 16px;
        line-height: 1.6;
        color: var(--brown-primary);
    }

    /* Bảng chi tiết sản phẩm */
    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table th {
        background: var(--cream-medium);
        padding: 20px;
        text-align: left;
        color: var(--brown-primary);
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
    }

    .detail-table td {
        padding: 25px 20px;
        border-bottom: 1px solid var(--cream-medium);
        font-size: 16px;
    }

    .detail-table tr:hover td {
        background-color: #fffdf5;
    }

    .img-detail {
        width: 80px;
        /* Tăng kích thước ảnh cho rõ nét hơn */
        height: 110px;
        object-fit: cover;
        border-radius: 6px;
        border: 2px solid var(--white);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Tổng tiền lớn & nổi bật */
    .total-highlight {
        font-size: 28px;
        color: var(--red-soft);
        font-weight: 900;
        margin-top: 10px;
        display: block;
    }

    @media (max-width: 768px) {
        .bill-info {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .info-box {
            text-align: left !important;
        }
    }
</style>

<div class="cart-navigation">
    <a href="index.php?act=mybill" class="nav-tab active"><i class="fas fa-arrow-left"></i> QUAY LẠI ĐƠN HÀNG</a>
</div>

<div class="detail-container">
    <div class="cart-header">
        <h1>Chi Tiết Đơn Hàng #HD-<?= $bill['idhd'] ?></h1>
        <p>Ngày đặt: <?= $bill['ngaydat'] ?></p>
    </div>

    <div class="bill-info">
        <div class="info-box">
            <h4>Thông tin người nhận</h4>
            <p><strong>Họ tên:</strong> <?= $bill['hoten'] ?></p>
            <p><strong>Số điện thoại:</strong> <?= $bill['sdt'] ?></p>
            <p><strong>Địa chỉ:</strong> <?= $bill['diachi'] ?></p>
        </div>
        <div class="info-box" style="text-align: right;">
            <h4>Trạng thái thanh toán</h4>
            <p>Phương thức: Tiền mặt khi nhận hàng</p>
            <p style="font-size: 20px; color: var(--red-soft);"><strong>Tổng:
                    <?= number_format($bill['tongthanhtoan']) ?> đ</strong></p>
        </div>
    </div>

    <table class="detail-table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($billdetails as $item): ?>
                <tr>
                    <td style="display: flex; align-items: center; gap: 15px;">
                        <img src="<?= $img_path . $item['img'] ?>" class="img-detail">
                        <span><?= $item['tensp'] ?></span>
                    </td>
                    <td><?= number_format($item['dongia']) ?> đ</td>
                    <td>x <?= $item['soluong'] ?></td>
                    <td style="font-weight: bold; color: var(--gold-dark);"><?= number_format($item['thanhtien']) ?> đ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>