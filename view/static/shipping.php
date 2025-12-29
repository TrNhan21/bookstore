<style>
.shipping-container {
    max-width: 950px;
    margin: 40px auto;
    background: #ffffff;
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    line-height: 1.8;
    color: #3e2723;
    border-top: 8px solid #d4a574;
    /* Màu Tan chủ đạo */
}

.shipping-header {
    text-align: center;
    margin-bottom: 50px;
}

.shipping-header h1 {
    font-family: 'Times New Roman', serif;
    color: #5d4e37;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 2.2em;
    margin-bottom: 10px;
}

.shipping-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 40px;
}

.shipping-step {
    background: #faf8f3;
    padding: 25px;
    border-radius: 12px;
    border-bottom: 4px solid #e8dcc8;
    transition: 0.3s;
}

.shipping-step:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-color: #b8860b;
}

.shipping-step i {
    font-size: 30px;
    color: #b8860b;
    margin-bottom: 15px;
    display: block;
}

.shipping-step h4 {
    color: #5d4e37;
    font-size: 1.2em;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.shipping-table {
    width: 100%;
    border-collapse: collapse;
    margin: 30px 0;
    background: #fff;
}

.shipping-table th {
    background: #5d4e37;
    color: #fff;
    padding: 15px;
    text-align: left;
}

.shipping-table td {
    border: 1px solid #eee;
    padding: 15px;
}

.note-shipping {
    background: #fff9e6;
    padding: 20px;
    border-left: 5px solid #b8860b;
    border-radius: 5px;
    font-style: italic;
}
</style>

<div class="row mb">
    <div class="shipping-container">
        <div class="shipping-header">
            <h1>Giao hàng & Nhận hàng</h1>
            <p>NhanVanBook luôn nỗ lực để đưa tri thức đến tay bạn nhanh nhất có thể.</p>
        </div>

        <div class="shipping-grid">
            <div class="shipping-step">
                <i class="fas fa-box-open"></i>
                <h4>1. Đóng gói cẩn thận</h4>
                <p>Sách được bọc màng co và chèn chống sốc kỹ lưỡng để tránh bị cấn góc hoặc hư hỏng trong quá trình vận
                    chuyển.</p>
            </div>
            <div class="shipping-step">
                <i class="fas fa-shipping-fast"></i>
                <h4>2. Đối tác vận chuyển</h4>
                <p>Chúng tôi hợp tác với GHTK, Viettel Post để đảm bảo hàng được giao tận tay khách hàng trên toàn quốc.
                </p>
            </div>
        </div>

        <h3>Thời gian và Phí vận chuyển dự kiến</h3>
        <table class="shipping-table">
            <thead>
                <tr>
                    <th>Khu vực</th>
                    <th>Thời gian</th>
                    <th>Phí vận chuyển</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>TP. Hồ Chí Minh</strong></td>
                    <td>1 - 2 ngày làm việc</td>
                    <td>20.000đ (Free đơn > 300k)</td>
                </tr>
                <tr>
                    <td><strong>Khu vực Tỉnh/Thành khác</strong></td>
                    <td>3 - 5 ngày làm việc</td>
                    <td>35.000đ (Free đơn > 500k)</td>
                </tr>
            </tbody>
        </table>

        <h3>Quy trình nhận hàng</h3>
        <div class="note-shipping">
            <p><strong>Đồng kiểm:</strong> Quý khách hoàn toàn được quyền mở gói hàng kiểm tra ngoại quan (số lượng, tên
                sách) trước khi thanh toán cho nhân viên giao hàng.</p>
            <p>Nếu phát hiện sách bị ướt, rách hoặc không đúng đơn hàng, vui lòng từ chối nhận và liên hệ ngay Hotline:
                <strong>0825143736</strong>.
            </p>
        </div>

        <div style="text-align: center; margin-top: 40px; color: #8b6914;">
            <p><i class="fas fa-heart"></i> Cảm ơn bạn đã lựa chọn NhanVanBook!</p>
        </div>
    </div>
</div>