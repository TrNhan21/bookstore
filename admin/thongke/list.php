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

    /* Widget Thống kê nhanh */
    .stat-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        padding: 25px;
        border-radius: 12px;
        color: white;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card h3 {
        font-size: 1em;
        text-transform: uppercase;
        margin-bottom: 10px;
        opacity: 0.9;
        letter-spacing: 1px;
    }

    .stat-card .value {
        font-size: 1.8em;
        font-weight: bold;
    }

    .bg-revenue {
        background: linear-gradient(135deg, #b8860b 0%, #8b6914 100%);
    }

    .bg-orders {
        background: linear-gradient(135deg, #5d4e37 0%, #3e2723 100%);
    }

    .bg-products {
        background: linear-gradient(135deg, #d4a574 0%, #b8860b 100%);
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
    }

    th {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        color: white;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.9em;
    }

    td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid var(--cream-dark);
    }

    tbody tr:hover {
        background-color: var(--cream-accent);
    }

    /* Nút bấm */
    .btn-action {
        padding: 12px 30px;
        background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
        box-shadow: 0 4px 10px rgba(39, 174, 96, 0.3);
    }

    .btn-action:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
        color: white;
    }
</style>

<div class="row">
    <div class="row frmtitle">
        <h1><i class="fas fa-chart-line"></i> BÁO CÁO & THỐNG KÊ HỆ THỐNG</h1>
    </div>

    <div class="row frmcontent">
        <div class="stat-container">
            <div class="stat-card bg-revenue">
                <h3>Tổng Doanh Thu</h3>
                <div class="value"><?= number_format($overview['revenue']) ?> đ</div>
            </div>
            <div class="stat-card bg-orders">
                <h3>Tổng Đơn Hàng</h3>
                <div class="value"><?= number_format($overview['orders']) ?></div>
            </div>
            <div class="stat-card bg-products">
                <h3>Số Lượng Sản Phẩm</h3>
                <div class="value"><?= number_format($overview['prods']) ?></div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>MÃ DANH MỤC</th>
                    <th>TÊN DANH MỤC</th>
                    <th>SỐ LƯỢNG SP</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listthongke as $tk): ?>
                    <tr>
                        <td><b>DM-<?= $tk['madm'] ?></b></td>
                        <td style="text-align: left; padding-left: 20px; font-weight: 600;">
                            <?= $tk['tendm'] ?>
                        </td>
                        <td><span
                                style="background: var(--cream-dark); padding: 4px 12px; border-radius: 15px;"><?= $tk['countsp'] ?></span>
                        </td>
                        <td><?= number_format($tk['minprice']) ?> đ</td>
                        <td><?= number_format($tk['maxprice']) ?> đ</td>
                        <td style="color: var(--gold-dark); font-weight: bold;">
                            <?= number_format($tk['avgprice']) ?> đ
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="row" style="margin-top: 30px; text-align: center;">
            <a href="index.php?act=bieudo" class="btn-action">
                <i class="fas fa-chart-pie"></i> Xem Biểu Đồ Trực Quan
            </a>
        </div>
    </div>
</div>