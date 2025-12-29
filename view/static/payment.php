<style>
    .payment-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        max-width: 900px;
        margin: 30px auto;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .payment-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-top: 30px;
    }

    .payment-method-box {
        border: 2px solid #e8dcc8;
        padding: 25px;
        border-radius: 12px;
        text-align: center;
        transition: 0.3s;
    }

    .payment-method-box:hover {
        border-color: #b8860b;
        background: #fff9e6;
    }

    .payment-method-box i {
        font-size: 40px;
        color: #b8860b;
        margin-bottom: 15px;
    }
</style>

<div class="row mb">
    <div class="payment-card">
        <h2 style="text-align: center; color: #8b6914; font-family: 'Times New Roman', serif;">PHƯƠNG THỨC THANH TOÁN
        </h2>

        <div class="payment-grid">
            <div class="payment-method-box">
                <i class="fas fa-money-bill-wave"></i>
                <h4>Thanh toán khi nhận hàng (COD)</h4>
                <p>Quý khách thanh toán tiền mặt trực tiếp cho nhân viên giao hàng.</p>
            </div>

            <div class="payment-method-box">
                <i class="fas fa-university"></i>
                <h4>Chuyển khoản ngân hàng</h4>
                <p>MB Bank: <strong>0825143736</strong><br>Chủ TK: NHAN VAN BOOK</p>
            </div>
        </div>
    </div>
</div>