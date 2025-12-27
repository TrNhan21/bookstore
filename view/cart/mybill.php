<style>
    :root {
        --gold-dark: #aa7a00;
        --gold-light: #ffe042;
        --brown-primary: #5a4a3a;
        --tan: #bdab8b;
        --cream-light: #fef9f3;
        --cream-medium: #f5e6d3;
        --white: #ffffff;
    }

    /* Quan trọng: Loại bỏ giới hạn chiều rộng và căn giữa */
    .mybill-container {
        width: 95%;
        /* Chiếm 95% chiều rộng màn hình */
        max-width: 100%;
        /* Bỏ giới hạn 1100px cũ */
        margin: 20px auto;
        font-family: 'Segoe UI', sans-serif;
    }

    .cart-tabs {
        display: flex;
        gap: 5px;
        padding-left: 10px;
        /* Tạo khoảng trống lề trái cho tab */
    }

    .tab-item {
        padding: 15px 40px;
        /* Tăng độ rộng của tab */
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid var(--tan);
        border-bottom: none;
        border-radius: 12px 12px 0 0;
        color: var(--brown-primary);
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }

    .tab-item.active {
        background: var(--white);
        color: var(--gold-dark);
        border-top: 4px solid var(--gold-dark);
        margin-bottom: -1px;
        z-index: 2;
    }

    .bill-box {
        width: 100%;
        border: 1px solid var(--tan);
        background: var(--white);
        border-radius: 12px;
        /* Bo góc đều tất cả các cạnh */
        padding: 40px;
        /* Tăng khoảng cách đệm bên trong */
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .bill-table {
        width: 100%;
        border-collapse: collapse;
    }

    .bill-table th {
        background: var(--cream-medium);
        padding: 20px;
        text-align: center;
        text-transform: uppercase;
        font-size: 14px;
        border-bottom: 2px solid var(--tan);
    }

    .bill-table td {
        padding: 20px;
        border-bottom: 1px solid var(--cream-medium);
        text-align: center;
    }

    /* Hiệu ứng dòng khi di chuột vào */
    .bill-table tr:hover td {
        background-color: #fffdf5;
    }

    .status-badge {
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 700;
        background: var(--cream-light);
        border: 1px solid var(--tan);
        color: var(--gold-dark);
    }

    .btn-detail {
        display: inline-block;
        padding: 10px 25px;
        background: var(--gold-dark);
        color: white !important;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .status-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        background: #fff8e1;
        /* Màu vàng nhạt nhẹ */
        color: #f57f17;
        /* Màu cam đậm */
        border: 1px solid #ffe082;
        display: inline-block;
        white-space: nowrap;
        /* Giữ chữ trên 1 dòng */
    }

    .btn-detail:hover {
        background: var(--brown-primary);
        transform: scale(1.05);
    }
</style>

<div class="row mybill-container">
    <div class="cart-tabs">
        <a href="index.php?act=viewcart" class="tab-item">GIỎ HÀNG</a>
        <a href="index.php?act=mybill" class="tab-item active">ĐƠN HÀNG CỦA TÔI</a>
    </div>

    <div class="bill-box">
        <table class="bill-table">
            <thead>
                <tr>
                    <th>Mã Đơn</th>
                    <th>Ngày Đặt</th>
                    <th>Số Lượng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($listbill) && is_array($listbill)) {
                    foreach ($listbill as $bill) {
                        extract($bill);

                        // Giả sử cột trạng thái trong DB của bạn là 'status' hoặc 'bill_status'
                        // Nếu chưa có cột này, bạn truyền số 0 cố định
                        $trangthai_id = isset($bill['status']) ? $bill['status'] : 0;

                        // Gọi hàm với 2 tham số: ID trạng thái và Ngày đặt
                        $ttdh = get_ttdh($trangthai_id, $ngaydat);

                        $countsp = loadall_cart_count($idhd);

                        echo '<tr>
            <td style="font-weight: bold;">HD-' . $idhd . '</td>
            <td>' . $ngaydat . '</td>
            <td>' . $countsp . ' mặt hàng</td>
            <td style="color: #e74c3c; font-weight: 800;">' . number_format($tongthanhtoan) . 'đ</td>
            <td><span class="status-badge">' . $ttdh . '</span></td>
            <td><a href="index.php?act=billdetail&idhd=' . $idhd . '" class="btn-detail">Xem chi tiết</a></td>
        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>