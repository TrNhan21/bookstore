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

/* Reset & Base */
.row {
    width: 100%;
    margin: 0 auto;
}

/* ==================== TITLE ==================== */
.frmtitle {
    background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
    padding: 25px;
    border-bottom: 5px solid var(--tan);
    border-radius: 10px 10px 0 0;
    text-align: center;
}

.frmtitle h1 {
    font-size: 1.8em;
    color: var(--cream-accent);
    text-transform: uppercase;
    letter-spacing: 3px;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

/* ==================== CONTENT CONTAINER ==================== */
.frmcontent {
    padding: 30px;
    background: white;
    border: 1px solid var(--cream-dark);
    border-top: none;
    border-radius: 0 0 10px 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

/* Box Trạng thái & Thông tin */
.status-box,
.info-box {
    background: var(--cream-light);
    border: 1px solid var(--tan) !important;
    padding: 20px !important;
    border-radius: 8px;
    margin-bottom: 25px;
}

.status-box {
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--cream-accent);
}

.status-box select {
    padding: 8px 15px;
    border: 1.5px solid var(--tan);
    border-radius: 4px;
    font-family: 'Times New Roman', serif;
    outline: none;
    color: var(--text-primary);
    font-weight: bold;
}

/* Grid thông tin khách hàng */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.info-item p {
    margin-bottom: 12px;
    font-size: 1.1em;
    color: var(--text-primary);
    border-bottom: 1px dashed var(--tan);
    padding-bottom: 5px;
}

.info-item strong {
    color: var(--gold-darker);
    display: inline-block;
    width: 120px;
}

/* ==================== TABLE STYLE ==================== */
.detail-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid var(--tan);
    border-radius: 8px;
    overflow: hidden;
    margin-top: 10px;
}

.detail-table thead th {
    background: var(--brown-primary);
    color: var(--cream-accent);
    padding: 15px;
    font-size: 0.9em;
    letter-spacing: 1px;
}

.detail-table tbody td {
    padding: 15px;
    border-bottom: 1px solid var(--cream-dark);
    color: var(--text-primary);
}

.detail-table tbody tr:nth-child(even) {
    background-color: var(--cream-light);
}

.detail-table tbody tr:hover {
    background-color: var(--cream-accent);
}

.img-product {
    width: 80px;
    height: 100px;
    object-fit: cover;
    border: 1px solid var(--tan);
    padding: 3px;
    background: white;
    transition: 0.3s;
}

.img-product:hover {
    transform: rotate(-3deg) scale(1.1);
}

/* Dòng tổng tiền */
.total-row td {
    background: var(--cream-medium);
    padding: 20px;
    font-weight: bold;
}

/* ==================== BUTTONS ==================== */
.btn-update {
    background: var(--gold-dark);
    color: white;
    border: none;
    padding: 9px 20px;
    margin-left: 10px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.btn-update:hover {
    background: var(--brown-primary);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.btn-back {
    margin-top: 20px;
    text-align: center;
}

.btn-back input {
    background: var(--brown-primary);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.btn-back input:hover {
    filter: brightness(1.2);
    transform: translateX(-5px);
}
</style>

<div class="row">
    <div class="row frmtitle">
        <h1>CHI TIẾT ĐƠN HÀNG: HB-<?= $bill['idhd'] ?></h1>
    </div>

    <div class="row frmcontent">
        <div class="status-box">
            <form action="index.php?act=update_status" method="post">
                <input type="hidden" name="idhd" value="<?= $bill['idhd'] ?>">
                <label style="font-weight: bold; color: var(--text-primary);">TRẠNG THÁI: </label>
                <select name="new_status">
                    <option value="0" <?= ($bill['bill_status'] == 0) ? 'selected' : '' ?>>Mới (Chờ xác nhận)</option>
                    <option value="1" <?= ($bill['bill_status'] == 1) ? 'selected' : '' ?>>Đang xử lý</option>
                    <option value="2" <?= ($bill['bill_status'] == 2) ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="3" <?= ($bill['bill_status'] == 3) ? 'selected' : '' ?>>Hoàn tất</option>
                    <option value="4" <?= ($bill['bill_status'] == 4) ? 'selected' : '' ?>>Hủy đơn</option>
                </select>
                <button type="submit" name="capnhat_tt" class="btn-update" value="1">CẬP NHẬT</button>
            </form>
        </div>

        <div class="info-box">
            <div class="info-grid">
                <div class="info-item">
                    <p><strong><i class="fas fa-user"></i> Người đặt:</strong> <?= $bill['hoten'] ?></p>
                    <p><strong><i class="fas fa-phone"></i> Điện thoại:</strong> <?= $bill['sdt'] ?></p>
                </div>
                <div class="info-item">
                    <p><strong><i class="fas fa-map-marker-alt"></i> Địa chỉ:</strong> <?= $bill['diachi'] ?></p>
                    <p><strong><i class="fas fa-calendar-alt"></i> Ngày đặt:</strong> <?= $bill['ngaydat'] ?></p>
                </div>
            </div>
        </div>

        <table class="detail-table">
            <thead>
                <tr>
                    <th>ẢNH</th>
                    <th style="text-align: left;">SẢN PHẨM</th>
                    <th>GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>THÀNH TIỀN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billct as $item): ?>
                <tr>
                    <td width="120">
                        <img src="../uploads/<?= $item['img'] ?>" class="img-product">
                    </td>
                    <td style="text-align: left;">
                        <span style="font-size: 1.1em; font-weight: bold; color: var(--brown-primary);">
                            <?= $item['tensp'] ?>
                        </span>
                    </td>
                    <td><?= number_format($item['dongia']) ?> đ</td>
                    <td>x<?= $item['soluong'] ?></td>
                    <td>
                        <b style="color: var(--gold-darker);"><?= number_format($item['thanhtien']) ?> đ</b>
                    </td>
                </tr>
                <?php endforeach; ?>

                <tr class="total-row">
                    <td colspan="4" style="text-align: right; text-transform: uppercase; letter-spacing: 1px;">
                        Tổng thanh toán:
                    </td>
                    <td style="color: var(--red-primary); font-size: 1.4em;">
                        <?= number_format($bill['tongthanhtoan']) ?> đ
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="btn-back">
            <a href="index.php?act=listbill">
                <input type="button" value="← Quay lại danh sách đơn hàng">
            </a>
        </div>
    </div>
</div>