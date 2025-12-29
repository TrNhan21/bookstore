<style>
    /* Container và Card */
    .custom-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        padding: 25px !important;
        margin-top: 20px;
    }

    /* Tiêu đề */
    .frmtitle_stats h1 {
        text-align: center;
        color: #5a4a3a !important;
        text-transform: uppercase;
        font-weight: 800;
        font-size: 22px;
        margin-bottom: 10px;
    }

    /* Cấu trúc bảng */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .styled-table thead th {
        background: #5a4a3a;
        color: #ffd700;
        /* Màu vàng kim sáng */
        padding: 18px 10px;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
    }

    .styled-table tbody tr {
        transition: all 0.2s ease;
    }

    .styled-table tbody tr:hover {
        background-color: #fcfaf5;
    }

    .styled-table tbody td {
        padding: 15px 10px;
        border-bottom: 1px solid #f2f2f2;
        vertical-align: middle;
    }

    /* Căn chỉnh cột */
    .col-img {
        width: 12%;
        text-align: center;
    }

    .col-info {
        width: 38%;
        text-align: left;
    }

    .col-price {
        width: 15%;
        text-align: center;
    }

    .col-stock {
        width: 20%;
        text-align: center;
    }

    .col-perf {
        width: 15%;
        text-align: center;
    }

    /* Hình ảnh */
    .img-wrapper img {
        width: 65px;
        height: 90px;
        object-fit: cover;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: block;
        margin: 0 auto;
    }

    /* Badge & Text */
    .price-tag {
        font-weight: bold;
        color: #d35400;
        font-size: 15px;
    }

    .stock-status {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .in-stock {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .low-stock {
        background: #ffebee;
        color: #c62828;
    }

    .view-count {
        background: #f8f9fa;
        padding: 5px 10px;
        border-radius: 5px;
        color: #666;
        font-weight: bold;
    }

    /* Action Buttons */
    .action-bar {
        text-align: center;
        margin-top: 35px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .btn-gold-outline {
        display: inline-block;
        padding: 11px 22px;
        border: 2px solid #5a4a3a;
        color: #5a4a3a;
        text-decoration: none;
        font-weight: bold;
        border-radius: 6px;
        transition: 0.3s;
        font-size: 13px;
    }

    .btn-gold-outline:hover {
        background: #5a4a3a;
        color: #fff;
    }

    .btn-reset {
        display: inline-block;
        padding: 11px 22px;
        background-color: #e74c3c;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        margin-left: 10px;
        font-size: 13px;
        transition: 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-reset:hover {
        background-color: #c0392b;
        box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
    }
</style>

<div class="row">
    <div class="row frmtitle_stats">
        <h1>
            <i class="fas fa-layer-group"></i>
            DANH MỤC: <span style="color: #aa7a00;"><?= $_GET['iddm'] ?></span>
        </h1>
    </div>

    <div class="row frmcontent custom-card">
        <table class="styled-table">
            <thead>
                <tr>
                    <th class="col-img">ẢNH</th>
                    <th class="col-info">THÔNG TIN SÁCH</th>
                    <th class="col-price">GIÁ BÁN</th>
                    <th class="col-stock">KHO HÀNG</th>
                    <th class="col-perf">LƯỢT XEM</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list_sp_dm)): ?>
                    <?php foreach ($list_sp_dm as $sp): ?>
                        <tr>
                            <td class="col-img">
                                <div class="img-wrapper">
                                    <img src="../uploads/<?= $sp['img'] ?>" alt="Book">
                                </div>
                            </td>
                            <td class="col-info">
                                <div style="font-weight:bold; color:#333; font-size: 14px; margin-bottom: 4px;">
                                    <?= $sp['tensp'] ?>
                                </div>
                                <div style="font-size: 11px; color: #aaa;">Mã SP: #<?= $sp['idsp'] ?></div>
                            </td>
                            <td class="col-price">
                                <span class="price-tag"><?= number_format($sp['giasp']) ?> đ</span>
                            </td>
                            <td class="col-stock">
                                <?php if ($sp['soluong'] > 0): ?>
                                    <span class="stock-status in-stock">Còn <?= $sp['soluong'] ?> cuốn</span>
                                <?php else: ?>
                                    <span class="stock-status low-stock">Hết hàng</span>
                                <?php endif; ?>
                            </td>
                            <td class="col-perf">
                                <span class="view-count">
                                    <i class="fas fa-eye" style="color: #aa7a00;"></i> <?= $sp['luotxemsp'] ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center; padding: 50px; color: #999;">
                            <i class="fas fa-box-open" style="font-size: 40px; display: block; margin-bottom: 10px;"></i>
                            Chưa có sản phẩm nào trong danh mục này.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="action-bar">
            <a href="index.php?act=thongke" class="btn-gold-outline">
                <i class="fas fa-arrow-left"></i> QUAY LẠI BÁO CÁO
            </a>

            <a href="index.php?act=reset_view&iddm=<?= $_GET['iddm'] ?>" class="btn-reset"
                onclick="return confirm('Toàn bộ lượt xem của danh mục này sẽ về 0. Bạn có chắc chắn không?')">
                <i class="fas fa-sync-alt"></i> LÀM MỚI LƯỢT XEM
            </a>
        </div>
    </div>
</div>