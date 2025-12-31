<style>
    .banking-container {
        max-width: 800px;
        margin: 40px auto;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(139, 90, 43, 0.15);
        overflow: hidden;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .banking-header {
        background: linear-gradient(135deg, #ffe042ff 0%, #aa7a00ff 100%);
        padding: 30px;
        text-align: center;
        color: white;
    }

    .banking-header h2 {
        margin: 0;
        font-size: 24px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .banking-body {
        padding: 40px;
        text-align: center;
    }

    .status-success {
        color: #27ae60;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .qr-code-box {
        background: #fef9f3;
        border: 2px solid #f5e6d3;
        border-radius: 12px;
        padding: 20px;
        display: inline-block;
        margin: 20px 0;
    }

    .qr-code-box img {
        width: 220px;
        height: 220px;
        border-radius: 8px;
    }

    .bank-details {
        text-align: left;
        background: #fff;
        border: 1px solid #f5e6d3;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        display: inline-block;
        min-width: 350px;
    }

    .bank-details p {
        margin: 10px 0;
        color: #5a4a3a;
        font-size: 15px;
        border-bottom: 1px dashed #f5e6d3;
        padding-bottom: 8px;
        display: flex;
        justify-content: space-between;
    }

    .bank-details p:last-child {
        border-bottom: none;
    }

    .bank-details strong {
        color: #8b5a2b;
    }

    .copy-note {
        font-size: 13px;
        color: #8b7355;
        font-style: italic;
        margin-top: 15px;
    }

    .btn-history {
        display: inline-block;
        margin-top: 30px;
        padding: 15px 35px;
        background: linear-gradient(135deg, #ffea00ff 0%, #ffc400ff 100%);
        color: #8b5a2b;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 700;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(212, 165, 116, 0.3);
    }

    .btn-history:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(212, 165, 116, 0.4);
        color: #5a4a3a;
    }

    .alert-info {
        background: #e8f4fd;
        color: #2980b9;
        padding: 15px;
        border-radius: 8px;
        font-size: 14px;
        margin-top: 20px;
        border-left: 5px solid #3498db;
    }
</style>

<div class="banking-container">
    <div class="banking-header">
        <h2>Hướng dẫn thanh toán</h2>
    </div>

    <div class="banking-body">
        <div class="status-success">
            <span>✅</span> Đơn hàng #<?= $bill['idhd'] ?> đã được khởi tạo thành công!
        </div>

        <p style="color: #5a4a3a;">Vui lòng quét mã QR hoặc chuyển khoản thủ công theo thông tin dưới đây:</p>

        <div class="qr-code-box">
            <img src="https://img.vietqr.io/image/vietcombank-0825143736-compact.png?amount=<?= $bill['tongthanhtoan'] ?>&addInfo=DH%20<?= $bill['idhd'] ?>&accountName=NHANVAN%20BOOKSTORE"
                alt="Mã QR Thanh Toán">
            <p style="margin-top: 10px; font-weight: 600; color: #8b5a2b;">Mở App Ngân hàng để quét</p>
        </div>

        <br>

        <div class="bank-details">
            <p>Ngân hàng: <strong>Vietcombank</strong></p>
            <p>Chủ tài khoản: <strong>NHANVAN BOOKSTORE</strong></p>
            <p>Số tài khoản: <strong>0825143736</strong></p>
            <p>Số tiền: <strong><?= number_format($bill['tongthanhtoan']) ?> VNĐ</strong></p>
            <p>Nội dung: <strong>DH <?= $bill['idhd'] ?></strong></p>
        </div>

        <div class="alert-info">
            ℹ️ Hệ thống sẽ tự động cập nhật trạng thái đơn hàng sau khi nhận được tiền (thông thường từ 1-5 phút).
        </div>

        <p class="copy-note">Vui lòng nhập chính xác nội dung chuyển khoản "DH <?= $bill['idhd'] ?>" để đơn hàng được
            xác nhận tự động.</p>

        <a href="index.php?act=mybill" class="btn-history">Xem lịch sử đơn hàng</a>
    </div>
</div>