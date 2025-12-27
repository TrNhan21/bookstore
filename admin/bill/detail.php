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
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Times New Roman', serif;
        background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-dark) 100%);
        padding: 10px;
        min-height: 100vh;
    }

    /* Căn rộng 100% màn hình */
    .row {
        width: 100%;
        max-width: 100% !important;
        margin: 0 auto;
    }

    /* ==================== TITLE ==================== */
    .frmtitle {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        padding: 20px 30px;
        border-bottom: 5px solid var(--tan);
        border-radius: 10px 10px 0 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .frmtitle h1 {
        font-size: 1.6em;
        color: var(--cream-accent);
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* ==================== CONTENT ==================== */
    .frmcontent {
        padding: 25px;
        background: linear-gradient(135deg, var(--cream-light) 0%, var(--cream-medium) 100%);
        border-radius: 0 0 10px 10px;
        box-shadow: 0 6px 20px rgba(93, 78, 55, 0.15);
    }

    /* Box Thông tin khách hàng */
    .info-box {
        margin-bottom: 25px;
        border: 2px solid var(--tan) !important;
        padding: 25px !important;
        background: var(--cream-accent) !important;
        border-radius: 8px;
        box-shadow: inset 0 0 10px rgba(184, 134, 11, 0.1);
    }

    .info-box p {
        margin-bottom: 10px;
        font-size: 1.1em;
        color: var(--text-primary);
    }

    .info-box strong {
        color: var(--gold-darker);
        margin-right: 5px;
    }

    /* ==================== TABLE ==================== */
    table {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--tan);
        margin-bottom: 20px;
    }

    th {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        color: white;
        padding: 15px;
        text-transform: uppercase;
        font-weight: 700;
    }

    td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid var(--cream-dark);
        vertical-align: middle;
    }

    /* Ảnh sản phẩm */
    td img {
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    td img:hover {
        transform: scale(1.1);
    }

    /* Tổng tiền hàng cuối */
    .total-row {
        background: var(--cream-dark) !important;
        font-size: 1.2em;
    }

    /* ==================== BUTTONS ==================== */
    input[type="button"] {
        padding: 12px 25px;
        background: linear-gradient(135deg, var(--brown-primary) 0%, #3e2723 100%);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    input[type="button"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        filter: brightness(1.2);
    }
</style>

<div class="row">
    <div class="row frmtitle">
        <h1>CHI TIẾT ĐƠN HÀNG: HB-<?= $bill['idhd'] ?></h1>
    </div>

    <div class="row frmcontent info-box">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <div>
                <p><strong><i class="fas fa-user"></i> Người đặt:</strong> <?= $bill['hoten'] ?></p>
                <p><strong><i class="fas fa-phone"></i> Điện thoại:</strong> <?= $bill['sdt'] ?></p>
            </div>
            <div>
                <p><strong><i class="fas fa-map-marker-alt"></i> Địa chỉ:</strong> <?= $bill['diachi'] ?></p>
                <p><strong><i class="fas fa-calendar-alt"></i> Ngày đặt:</strong> <?= $bill['ngaydat'] ?></p>
            </div>
        </div>
    </div>

    <div class="row frmcontent">
        <table>
            <thead>
                <tr>
                    <th>ẢNH</th>
                    <th>SẢN PHẨM</th>
                    <th>GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>THÀNH TIỀN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billct as $item): ?>
                    <tr>
                        <td><img src="../uploads/<?= $item['img'] ?>" width="100" style="border: 1px solid var(--tan)"></td>
                        <td style="text-align: left; font-weight: bold;"><?= $item['tensp'] ?></td>
                        <td><?= number_format($item['dongia']) ?> đ</td>
                        <td><?= $item['soluong'] ?></td>
                        <td><b style="color: var(--gold-dark);"><?= number_format($item['thanhtien']) ?> đ</b></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="4" style="text-align: right; font-weight: bold;">TỔNG THANH TOÁN:</td>
                    <td style="color: var(--red-primary); font-size: 1.3em; font-weight: bold;">
                        <?= number_format($bill['tongthanhtoan']) ?> đ
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="row mb10" style="display: flex; justify-content: center; margin-top: 30px;">
            <a href="index.php?act=listbill">
                <input type="button" value="← Quay lại danh sách đơn hàng">
            </a>
        </div>
    </div>
</div>