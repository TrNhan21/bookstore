<style>
/* Container chính theo style Bookstore */
.cart-container {
    margin: 20px 0;
    padding: 20px;
    background-color: #fffdf7;
    /* Vàng kem cực nhạt */
    border: 1px solid #e6ccb3;
    border-radius: 5px;
}

.boxtitle {
    font-size: 1.4em;
    font-weight: bold;
    color: #4d3319;
    /* Nâu đậm */
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #d4a373;
    /* Vàng đồng */
    text-transform: uppercase;
}

/* Bảng đơn hàng */
.table-mybill {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

.table-mybill th {
    background-color: #fff9e6;
    /* Vàng nhạt như header bạn đã dùng */
    color: #593e25;
    padding: 12px;
    border: 1px solid #e6ccb3;
    font-size: 0.9em;
}

.table-mybill td {
    padding: 12px;
    border: 1px solid #eee;
    color: #333;
    font-size: 0.95em;
}

.table-mybill tr:nth-child(even) {
    background-color: #faf7f2;
    /* Xen kẽ màu nâu rất nhạt */
}

/* Badge trạng thái đơn hàng */
.status-badge {
    padding: 4px 10px;
    border-radius: 2px;
    font-size: 0.85em;
    font-weight: bold;
    display: inline-block;
}

/* Màu trạng thái tone trung tính/vintage */
.status-0 {
    background-color: #e0e0e0;
    color: #444;
}

/* Chờ xác nhận */
.status-1 {
    background-color: #fcefb4;
    color: #856404;
}

/* Đang xử lý */
.status-2 {
    background-color: #d1ecf1;
    color: #0c5460;
}

/* Đang giao */
.status-3 {
    background-color: #d4edda;
    color: #155724;
}

/* Hoàn tất */
.status-4 {
    background-color: #f8d7da;
    color: #721c24;
}

/* Đã hủy */

/* Nút Chi tiết phong cách nâu đen */
.btn-detail {
    background: linear-gradient(135deg, #664422 0%, #332211 100%);
    color: #fff !important;
    border: none;
    padding: 6px 12px;
    text-decoration: none;
    font-size: 0.85em;
    border-radius: 3px;
    transition: 0.3s;
}

.btn-detail:hover {
    opacity: 0.8;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Căn giữa tiêu đề bảng */
.table-mybill th {
    background-color: #fff9e6;
    color: #593e25;
    padding: 12px;
    border: 1px solid #e6ccb3;
    font-size: 0.9em;
    text-align: center;
    /* Căn giữa chữ trong th */
    vertical-align: middle;
}

/* Căn giữa dữ liệu trong các ô */
.table-mybill td {
    padding: 12px;
    border: 1px solid #eee;
    color: #333;
    font-size: 0.95em;
    text-align: center;
    /* Căn giữa chữ trong td */
    vertical-align: middle;
    /* Căn giữa theo chiều dọc */
}

/* Đảm bảo form và select cũng nằm giữa ô */
.table-mybill td form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}

/* Căn giữa badge trạng thái */
.status-badge {
    display: inline-block;
    /* Để căn giữa theo text-align của td */
    padding: 4px 10px;
    border-radius: 2px;
    font-size: 0.85em;
    font-weight: bold;
}
</style>
<div class="row mb cart-container">
    <div class="boxtitle">📦 ĐƠN HÀNG CỦA BẠN</div>
    <div class="row boxcontent">
        <table class="table-mybill">
            <thead>
                <tr>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT</th>
                    <th>TỔNG GIÁ TRỊ</th>
                    <th>TRẠNG THÁI</th>
                    <th>THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($listbill)) {
                    foreach ($listbill as $bill) {
                        extract($bill);

                        // Định nghĩa nội dung trạng thái
                        $labels = [
                            0 => "Chờ xác nhận",
                            1 => "Đang xử lý",
                            2 => "Đang giao hàng",
                            3 => "Đã giao hàng",
                            4 => "Đã hủy"
                        ];
                        $status_text = $labels[$bill_status] ?? "Không xác định";

                        echo '<tr>
                                <td><span class="bill-id">HB-' . $idhd . '</span></td>
                                <td>' . $ngaydat . '</td>
                                <td><span class="total-amount">' . number_format($tongthanhtoan) . ' đ</span></td>
                                <td>
                                    <span class="status-badge status-' . $bill_status . '">
                                        ' . $status_text . '
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?act=billdetail&idhd=' . $idhd . '" class="btn-detail">Xem chi tiết</a>
                                </td>
                            </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Bạn chưa có đơn hàng nào.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>