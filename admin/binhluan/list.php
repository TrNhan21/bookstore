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

    /* ==================== TITLE & ANIMATION ==================== */
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
        font-family: 'Times New Roman', serif;
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

    /* ==================== CONTENT BOX ==================== */
    .frmcontent {
        padding: 40px;
        background: linear-gradient(135deg, var(--cream-light) 0%, var(--cream-medium) 100%);
        border-radius: 0 0 10px 10px;
        box-shadow: 0 6px 20px rgba(93, 78, 55, 0.2);
    }

    /* ==================== TABLE STYLE ==================== */
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: var(--cream-accent);
        box-shadow: 0 6px 20px rgba(93, 78, 55, 0.2);
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid var(--tan);
    }

    thead tr {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
    }

    th {
        color: var(--cream-accent) !important;
        text-transform: uppercase;
        font-weight: 700;
        padding: 20px 15px;
        text-align: center;
        border-bottom: 3px solid var(--tan);
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
    }

    tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--cream-dark);
    }

    tbody tr:hover {
        background: linear-gradient(90deg, var(--cream-medium) 0%, #f5e6d3 100%);
        transform: scale(1.002);
    }

    td {
        padding: 18px 15px;
        text-align: center;
        color: var(--text-primary);
        font-weight: 500;
        background-color: var(--cream-light);
    }

    .col-noidung {
        text-align: left !important;
        padding-left: 20px !important;
        font-style: italic;
        line-height: 1.6;
        color: var(--brown-primary);
        max-width: 350px;
    }

    .user-badge {
        font-weight: 700;
        color: var(--gold-darker);
    }

    /* ==================== BUTTONS ==================== */
    .btn-action {
        padding: 8px 18px;
        border-radius: 6px;
        font-size: 0.85em;
        font-weight: 700;
        cursor: pointer;
        text-transform: uppercase;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .btn-delete {
        background: linear-gradient(135deg, var(--red-primary) 0%, var(--red-dark) 100%);
        color: white;
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, var(--red-dark) 0%, #922b21 100%);
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.4);
    }

    .btn-check {
        background: linear-gradient(135deg, #8b7355 0%, #6d5d47 100%);
        color: var(--cream-accent);
        margin-right: 10px;
    }

    .btn-check:hover {
        background: linear-gradient(135deg, #6d5d47 0%, var(--brown-primary) 100%);
        transform: translateY(-2px);
    }

    /* Checkbox Custom */
    input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--gold-primary);
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="row frmtitle">
        <h1>Quản lý bình luận từ khách hàng</h1>
    </div>

    <div class="row frmcontent">
        <form action="index.php?act=delete_selected_bl" method="post">
            <table>
                <thead>
                    <tr>
                        <th width="40"></th>
                        <th width="70">ID</th>
                        <th width="150">Người dùng</th>
                        <th>Nội dung bình luận</th>
                        <th width="120">Đánh giá</th>
                        <th width="200">Sản phẩm</th>
                        <th width="150">Ngày đăng</th>
                        <th width="100">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($listbinhluan) && is_array($listbinhluan)): ?>
                        <?php foreach ($listbinhluan as $bl): ?>
                            <?php
                            extract($bl);
                            $xoabl = "index.php?act=xoabl&id=" . $id;
                            // Giả định tên cột trong CSDL của bạn là 'rating' hoặc 'sao'
                            // Nếu CSDL chưa có cột này, bạn cần thêm vào bảng binhluan
                            $rating = isset($rating) ? $rating : 5;
                            ?>
                            <tr>
                                <td><input type="checkbox" name="selected_id[]" value="<?= $id ?>"></td>
                                <td><small>#<?= $id ?></small></td>
                                <td><span class="user-badge"><?= $user ?></span></td>
                                <td class="col-noidung">"<?= $noidung ?>"</td>

                                <td>
                                    <div style="color: #ffc107; font-size: 13px; white-space: nowrap;">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<i class="fas fa-star"></i>';
                                            } else {
                                                echo '<i class="far fa-star"></i>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td style="color: var(--gold-dark); font-weight: 600;"><?= $tensp ?></td>
                                <td style="color: #8d6e63; font-size: 0.9em;"><?= $ngaybinhluan ?></td>
                                <td>
                                    <a href="<?= $xoabl ?>" onclick="return confirm('Xác nhận xóa?')">
                                        <input type="button" class="btn-action btn-delete" value="Xóa">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">Hiện chưa có dữ liệu bình luận nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="row" style="margin-top: 30px; display: flex; gap: 10px;">
                <input type="button" class="btn-action btn-check" value="Chọn tất cả" id="check-all">
                <input type="button" class="btn-action btn-check" value="Bỏ chọn tất cả" id="uncheck-all">

                <button type="submit" name="delete_selected" class="btn-action btn-delete"
                    onclick="return confirm('Xác nhận xóa tất cả các bình luận đã chọn?')">
                    Xóa các mục đã chọn
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const btnCheckAll = document.getElementById('check-all');
    const btnUncheckAll = document.getElementById('uncheck-all');
    const checkboxes = document.querySelectorAll('input[name="selected_id[]"]');

    btnCheckAll.addEventListener('click', () => {
        checkboxes.forEach(cb => cb.checked = true);
    });

    btnUncheckAll.addEventListener('click', () => {
        checkboxes.forEach(cb => cb.checked = false);
    });
</script>