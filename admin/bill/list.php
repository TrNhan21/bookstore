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
        --red-primary: #c0392b;
        --red-dark: #a93226;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Times New Roman', serif;
        background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-dark) 100%);
        padding: 20px;
        min-height: 100vh;
    }

    .row {
        max-width: 100%;
        margin: 0;
        padding: 0 20px;
    }

    /* ==================== TITLE ==================== */
    .frmtitle {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 50%, var(--brown-primary) 100%);
        padding: 30px 50px;
        border-bottom: 5px solid var(--tan);
        box-shadow: 0 4px 15px rgba(139, 105, 20, 0.3);
        border-radius: 10px 10px 0 0;
        position: relative;
        overflow: hidden;
    }

    .frmtitle::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 249, 230, 0.15) 50%, transparent 70%);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(100%);
        }
    }

    .frmtitle h1 {
        font-size: 1.8em;
        color: var(--cream-accent);
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin: 0;
        text-align: center;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
        position: relative;
        z-index: 1;
    }

    /* ==================== NOTICE ==================== */
    .notice {
        padding: 15px 20px;
        margin: 15px 0;
        border-radius: 8px;
        font-weight: 600;
        line-height: 1.6;
        animation: slideIn 0.5s ease;
    }

    .notice.error {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        border: 2px solid var(--red-primary);
        color: #721c24;
        box-shadow: 0 4px 12px rgba(192, 57, 43, 0.15);
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ==================== CONTENT ==================== */
    .frmcontent {
        padding: 45px 40px;
        background: linear-gradient(135deg, var(--cream-light) 0%, var(--cream-medium) 100%);
        border-radius: 0 0 10px 10px;
        box-shadow: 0 6px 20px rgba(93, 78, 55, 0.2);
    }

    /* ==================== TABLE ==================== */
    table {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 25px;
        font-size: 0.95em;
        background-color: var(--cream-accent);
        box-shadow: 0 6px 20px rgba(93, 78, 55, 0.2);
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid var(--tan);
    }

    thead {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
    }

    th {
        color: #6d5419;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
        padding: 20px 18px;
        text-align: center;
        border-bottom: 3px solid var(--tan);
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
    }

    tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--cream-dark);
        height: 50px;
    }

    tbody tr:hover {
        background: linear-gradient(90deg, var(--cream-medium) 0%, #f5e6d3 100%);
        transform: scale(1.005);
        box-shadow: 0 4px 12px rgba(93, 78, 55, 0.15);
    }

    td {
        padding: 18px 16px;
        text-align: center;
        color: var(--text-primary);
        font-weight: 500;
        background-color: var(--cream-light);
    }

    td[style*="padding-left: 15px"] {
        text-align: center !important;
        font-weight: 600;
        color: var(--brown-primary);
        font-size: 1.05em;
    }

    input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: var(--gold-primary);
    }

    /* ==================== BUTTONS ==================== */
    input[type="button"],
    input[type="submit"] {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 0.9em;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        box-shadow: 0 4px 12px rgba(93, 78, 55, 0.25);
        border: none;
        margin-right: 8px;
    }

    /* Edit button */
    td a:first-child input[type="button"] {
        background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-dark) 100%);
        color: var(--cream-accent);
    }

    td a:first-child input[type="button"]:hover {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        box-shadow: 0 6px 20px rgba(184, 134, 11, 0.5);
        transform: translateY(-3px);
    }

    /* Delete button */
    td a:last-child input[type="button"],
    input[type="submit"][value*="Xóa"] {
        background: linear-gradient(135deg, var(--red-primary) 0%, var(--red-dark) 100%) !important;
        color: white !important;
    }

    td a:last-child input[type="button"]:hover,
    input[type="submit"][value*="Xóa"]:hover {
        background: linear-gradient(135deg, var(--red-dark) 0%, #922b21 100%) !important;
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.4) !important;
        transform: translateY(-3px);
    }

    /* Action buttons row */
    .row.mb10[style*="display: flex"] {
        display: flex !important;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 25px !important;
        padding-top: 25px;
        border-top: 2px solid var(--cream-dark);
    }

    .row.mb10[style*="display: flex"] input[type="button"]:not([value*="Xóa"]):not([value*="Nhập"]) {
        background: linear-gradient(135deg, #8b7355 0%, #6d5d47 100%);
        color: var(--cream-accent);
        padding: 12px 30px;
    }

    .row.mb10[style*="display: flex"] input[type="button"]:not([value*="Xóa"]):not([value*="Nhập"]):hover {
        background: linear-gradient(135deg, #6d5d47 0%, var(--brown-primary) 100%);
        box-shadow: 0 6px 20px rgba(139, 115, 85, 0.5);
        transform: translateY(-3px);
    }

    /* Add more button */
    input[type="button"][value*="Nhập"] {
        background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%) !important;
        color: white !important;
        padding: 12px 30px !important;
        font-weight: bold !important;
    }

    input[type="button"][value*="Nhập"]:hover {
        background: linear-gradient(135deg, #388E3C 0%, #2E7D32 100%) !important;
        box-shadow: 0 6px 15px rgba(76, 175, 80, 0.4) !important;
        transform: translateY(-3px);
    }

    a {
        text-decoration: none;
        display: inline-block;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .frmtitle {
            padding: 25px 30px;
        }

        .frmtitle h1 {
            font-size: 1.5em;
            letter-spacing: 1px;
        }

        .frmcontent {
            padding: 30px 25px;
        }

        .row.mb10[style*="display: flex"] {
            flex-direction: column;
        }

        .row.mb10[style*="display: flex"] input[type="button"],
        .row.mb10[style*="display: flex"] input[type="submit"] {
            width: 100%;
            margin-right: 0;
        }

        table {
            font-size: 0.85em;
        }

        th,
        td {
            padding: 12px 8px;
        }
    }
</style>
<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <div class="row frmcontent">
        <table border="1" style="width:100%; border-collapse: collapse; text-align: center;">
            <tr style="background-color: #fff9e6;">
                <th>MÃ ĐƠN</th>
                <th>KHÁCH HÀNG</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>ĐỊA CHỈ</th>
                <th>TỔNG TIỀN</th>
                <th>NGÀY ĐẶT</th>
                <th>THAO TÁC</th>
            </tr>
            <?php
            foreach ($listbill as $bill) {
                extract($bill);
                $xoabill = "index.php?act=xoabill&idhd=" . $idhd;
                $ctbill = "index.php?act=billdetail&idhd=" . $idhd; // Đường dẫn tới trang chi tiết
                echo '<tr>
            <td><b>HB-' . $idhd . '</b></td>
            <td>' . $hoten . '</td>
            <td>' . $sdt . '</td>
            <td>' . $diachi . '</td>
            <td>' . number_format($tongthanhtoan) . ' đ</td>
            <td>' . $ngaydat . '</td>
            <td>
                <a href="' . $ctbill . '"><input type="button" value="Chi tiết" style="background: linear-gradient(135deg, #444 0%, #000 100%); color:white;"></a>
                <a href="' . $xoabill . '" onclick="return confirm(\'Bạn có chắc muốn xóa đơn này?\')"><input type="button" value="Xóa"></a>
            </td>
        </tr>';
            }
            ?>
        </table>
    </div>
</div>