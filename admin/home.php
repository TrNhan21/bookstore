<style>
    :root {
        --gold-primary: #b8860b;
        --gold-dark: #8b6914;
        --gold-darker: #6d5419;
        --brown-primary: #5d4e37;
        --cream-light: #faf8f3;
        --cream-medium: #f5f1e8;
        --cream-dark: #e8dcc8;
        --cream-accent: #fff9e6;
        --tan: #d4a574;
        --text-primary: #3e2723;
    }

    /* Bố cục lưới 3 cột cố định cho 6 bảng */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-top: 20px;
    }

    /* Khôi phục màu nền Cream đậm đà như cũ */
    .card-box {
        background: linear-gradient(135deg, var(--cream-light) 0%, var(--cream-medium) 100%);
        border: 2px solid var(--tan);
        padding: 35px 20px;
        text-align: center;
        border-radius: 12px;
        transition: all 0.4s ease;
        box-shadow: 0 5px 15px rgba(93, 78, 55, 0.1);
        /* Đổ bóng màu nâu nhạt */
    }

    /* Hiệu ứng Hover: Làm sáng lên một chút nhưng chữ vẫn đậm */
    .card-box:hover {
        transform: translateY(-10px);
        background: var(--cream-accent);
        /* Nền sáng hơn một chút khi hover */
        border-color: var(--gold-primary);
        box-shadow: 0 10px 25px rgba(139, 105, 20, 0.25);
    }

    .card-box h3 {
        color: var(--gold-darker);
        font-family: 'Times New Roman', serif;
        font-size: 1.6em;
        font-weight: 800;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .card-box p {
        color: var(--brown-primary);
        font-size: 1em;
        font-weight: 500;
        margin-bottom: 25px;
        line-height: 1.4;
    }

    /* Nút bấm đồng bộ với màu tiêu đề admin */
    .btn-link {
        display: inline-block;
        color: var(--cream-accent);
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        font-weight: bold;
        text-decoration: none;
        padding: 10px 25px;
        border-radius: 6px;
        font-size: 0.9em;
        text-transform: uppercase;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .btn-link:hover {
        background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-dark) 100%);
        letter-spacing: 1px;
        color: white;
    }

    /* Banner chào mừng giữ màu xanh nhưng làm dịu hơn */
    .welcome-banner {
        margin-top: 40px;
        padding: 20px 30px;
        background: #fdfaf0;
        /* Màu giấy cũ */
        border-left: 6px solid var(--gold-dark);
        border-radius: 4px;
        color: var(--text-primary);
        font-style: italic;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    /* Responsive cho màn hình nhỏ */
    @media (max-width: 1024px) {
        .dashboard-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<?php
// Lấy số lượng sản phẩm hết hàng từ model
$so_luong_het = count_sanpham_hethang();
?>

<div class="row" style="padding: 20px; min-height: 500px;">
    <div class="row frmtitle" style="margin-bottom: 30px;">
        <h1>BẢNG ĐIỀU KHIỂN QUẢN TRỊ</h1>
    </div>

    <div class="dashboard-grid">
        <div class="card-box">
            <h3>Sản phẩm</h3>
            <p>Quản lý sách trong kho, cập nhật giá và số lượng.</p>
            <?php if ($so_luong_het > 0): ?>
                <p
                    style="color: #d9534f; font-weight: bold; font-size: 0.9em; background: #fff5f5; padding: 5px; border-radius: 4px; border: 1px solid #ffcccc;">
                    ⚠️ Có <?= $so_luong_het ?> sản phẩm hết hàng!
                </p>
            <?php else: ?>
                <p style="color: #28a745; font-size: 0.9em;">✅ Kho hàng đang ổn định.</p>
            <?php endif; ?>
            <a href="index.php?act=listsp" class="btn-link">Truy cập ngay →</a>
        </div>

        <div class="card-box">
            <h3>Đơn hàng</h3>
            <p>Theo dõi trạng thái giao hàng và xử lý hóa đơn mới.</p>
            <a href="index.php?act=listbill" class="btn-link">Truy cập ngay →</a>
        </div>

        <div class="card-box">
            <h3>Khách hàng</h3>
            <p>Quản lý thông tin người dùng và phân quyền thành viên.</p>
            <a href="index.php?act=dskh" class="btn-link">Truy cập ngay →</a>
        </div>

        <div class="card-box">
            <h3>Danh mục</h3>
            <p>Phân loại sách theo thể loại, chủ đề và nhà xuất bản.</p>
            <a href="index.php?act=listdm" class="btn-link">Truy cập ngay →</a>
        </div>

        <div class="card-box">
            <h3>Bình luận</h3>
            <p>Kiểm duyệt các đánh giá và phản hồi từ độc giả.</p>
            <a href="index.php?act=dsbl" class="btn-link">Truy cập ngay →</a>
        </div>

        <div class="card-box">
            <h3>Thống kê</h3>
            <p>Xem báo cáo doanh thu, biểu đồ tăng trưởng kinh doanh.</p>
            <a href="index.php?act=thongke" class="btn-link">Truy cập ngay →</a>
        </div>
    </div>

    <div class="welcome-banner">
        <p style="margin: 0; font-size: 1.1em;">
            <span style="font-size: 1.5em; margin-right: 10px;">👋</span>
            <strong>Chào mừng trở lại!</strong> Bạn có thể bắt đầu quản lý nội dung bằng cách chọn các mục ở trên hoặc
            sử dụng thanh menu phía trên cùng.
        </p>
    </div>
</div>