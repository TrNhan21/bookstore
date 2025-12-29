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
                <h3>Tổng Doanh Thu Năm</h3>
                <div class="value">
                    <?php
                    $tong_ca_nam = array_sum(array_column($listthongke_month, 'doanhthu'));
                    echo number_format($tong_ca_nam);
                    ?> đ
                </div>
            </div>
            <div class="stat-card bg-orders">
                <h3>Đơn Hàng Thành Công</h3>
                <div class="value">
                    <?php echo number_format(array_sum(array_column($listthongke_month, 'sodonhang'))); ?>
                </div>
            </div>
            <div class="stat-card bg-products">
                <h3>Sản Phẩm Theo Danh Mục</h3>
                <div class="value"><?= count($listthongke) ?> Nhóm</div>
            </div>
        </div>

        <h3 style="margin-bottom: 15px; color: var(--gold-darker);">I. THỐNG KÊ SẢN PHẨM THEO DANH MỤC</h3>
        <table class="detail-table">
            <thead>
                <tr>
                    <th>MÃ DM</th>
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
                            <a href="index.php?act=listsp_by_dm&iddm=<?= $tk['madm'] ?>"
                                style="text-decoration: none; color: inherit; display: block;">
                                <?= $tk['tendm'] ?>
                                <i class="fas fa-search-plus"
                                    style="font-size: 0.8em; color: var(--gold-dark); margin-left: 5px;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?act=listsp_by_dm&iddm=<?= $tk['madm'] ?>" style="text-decoration: none;">
                                <span
                                    style="background: var(--cream-dark); color: var(--brown-dark); padding: 4px 12px; border-radius: 15px; font-weight: bold;">
                                    <?= $tk['countsp'] ?>
                                </span>
                            </a>
                        </td>
                        <td><?= number_format($tk['minprice'] ?? 0) ?> đ</td>
                        <td><?= number_format($tk['maxprice'] ?? 0) ?> đ</td>
                        <td style="color: var(--gold-dark); font-weight: bold;">
                            <?= number_format($tk['avgprice'] ?? 0) ?> đ
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <hr style="margin: 40px 0; border: 1px dashed var(--tan);">

        <h3 style="margin: 20px 0; color: var(--gold-darker);">II. DOANH THU THEO THÁNG (NĂM <?= date('Y') ?>)</h3>
        <table class="detail-table">
            <thead>
                <tr style="background: var(--brown-primary); color: white;">
                    <th>THÁNG</th>
                    <th>SỐ ĐƠN HÀNG HOÀN TẤT</th>
                    <th>TỔNG DOANH THU</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listthongke_month as $month): ?>
                    <tr>
                        <td style="font-weight: bold;">Tháng <?= $month['thang'] ?></td>
                        <td><?= $month['sodonhang'] ?> đơn</td>
                        <td style="color: var(--red-primary); font-weight: bold;">
                            <?= number_format($month['doanhthu']) ?> đ
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr style="background: var(--cream-medium); font-weight: bold;">
                    <td colspan="2" style="text-align: right; font-size: 16px;">TỔNG DOANH THU CẢ NĂM:</td>
                    <td style="color: #b30000; font-size: 1.4em;"><?= number_format($tong_ca_nam) ?> đ</td>
                </tr>
            </tbody>
        </table>

        <div class="row" style="margin-top: 30px; text-align: center;">
            <a href="index.php?act=bieudo" class="btn-action">
                <i class="fas fa-chart-pie"></i> Xem Biểu Đồ Trực Quan
            </a>
        </div>
    </div>
</div>