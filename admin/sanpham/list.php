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
        max-width: 1600px;
        margin: 0 auto;
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

    .notice.warning {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%);
        border: 2px solid #856404;
        color: #856404;
        box-shadow: 0 4px 12px rgba(133, 100, 4, 0.15);
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

    /* ==================== SEARCH FORM ==================== */
    form[action*="listsp"] {
        display: flex;
        gap: 15px;
        margin: 20px 0;
        align-items: center;
        background: linear-gradient(135deg, var(--cream-accent) 0%, var(--cream-medium) 100%);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(93, 78, 55, 0.15);
        border: 2px solid var(--tan);
    }

    form[action*="listsp"] input[type="text"] {
        flex: 2;
        padding: 14px 20px;
        border: 2px solid var(--tan);
        border-radius: 8px;
        font-size: 1em;
        transition: all 0.3s ease;
        background-color: var(--cream-accent);
        color: var(--text-primary);
        font-family: 'Times New Roman', serif;
    }

    form[action*="listsp"] input[type="text"]:focus {
        outline: none;
        border-color: var(--gold-primary);
        box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.2);
    }

    form[action*="listsp"] input[type="text"]::placeholder {
        color: #8d6e63;
        opacity: 0.7;
    }

    form[action*="listsp"] select {
        flex: 1;
        padding: 14px 20px;
        border: 2px solid var(--tan);
        border-radius: 8px;
        font-size: 1em;
        transition: all 0.3s ease;
        background-color: var(--cream-accent);
        color: var(--text-primary);
        cursor: pointer;
        font-family: 'Times New Roman', serif;
    }

    form[action*="listsp"] select:focus {
        outline: none;
        border-color: var(--gold-primary);
        box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.2);
    }

    form[action*="listsp"] input[type="submit"] {
        flex: 0 0 auto;
        padding: 14px 35px;
        border: none;
        border-radius: 8px;
        font-size: 0.95em;
        font-weight: 700;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-dark) 100%);
        color: var(--cream-accent);
        box-shadow: 0 4px 12px rgba(93, 78, 55, 0.25);
        transition: all 0.3s ease;
    }

    form[action*="listsp"] input[type="submit"]:hover {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        box-shadow: 0 6px 20px rgba(184, 134, 11, 0.5);
        transform: translateY(-3px);
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
        width: 100%;
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
        height: 100px;
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

    td[style*="padding: 0 10px"] {
        text-align: left;
        padding-left: 20px !important;
        font-weight: 600;
        color: var(--brown-primary);
    }

    td img {
        max-height: 80px;
        max-width: 60px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(93, 78, 55, 0.25);
        object-fit: cover;
        border: 2px solid var(--tan);
        transition: transform 0.3s ease;
    }

    td img:hover {
        transform: scale(1.2);
        box-shadow: 0 6px 20px rgba(139, 105, 20, 0.4);
    }

    td small {
        color: #8d6e63;
        font-style: italic;
    }

    td[style*="color: #e74c3c"] {
        color: #e74c3c !important;
        font-weight: bold !important;
        font-size: 1.05em;
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
        align-items: center !important;
    }

    .row.mb10[style*="display: flex"] input[type="button"]:not([value*="Xóa"]):not([value*="NHẬP"]) {
        background: linear-gradient(135deg, #8b7355 0%, #6d5d47 100%);
        color: var(--cream-accent);
        padding: 12px 30px;
    }

    .row.mb10[style*="display: flex"] input[type="button"]:not([value*="Xóa"]):not([value*="NHẬP"]):hover {
        background: linear-gradient(135deg, #6d5d47 0%, var(--brown-primary) 100%);
        box-shadow: 0 6px 20px rgba(139, 115, 85, 0.5);
        transform: translateY(-3px);
    }

    /* Add more button */
    input[type="button"][value*="NHẬP"] {
        background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%) !important;
        color: white !important;
        padding: 12px 30px !important;
        font-weight: bold !important;
    }

    input[type="button"][value*="NHẬP"]:hover {
        background: linear-gradient(135deg, #388E3C 0%, #2E7D32 100%) !important;
        box-shadow: 0 6px 15px rgba(76, 175, 80, 0.4) !important;
        transform: translateY(-3px);
    }

    input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: var(--gold-primary);
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

        form[action*="listsp"] {
            flex-direction: column;
        }

        form[action*="listsp"] input[type="text"],
        form[action*="listsp"] select,
        form[action*="listsp"] input[type="submit"] {
            width: 100%;
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

        td img {
            max-height: 60px;
            max-width: 50px;
        }
    }
</style>
<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <?php if (isset($thongbao) && $thongbao != ""): ?>
        <div
            style="background-color: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeeba; border-radius: 4px; margin: 15px 0; line-height: 1.6;">
            <?= $thongbao ?>
        </div>
    <?php endif; ?>

    <form action="index.php?act=listsp" method="post" style="margin-bottom: 20px;">
        <input type="text" name="kyw" placeholder="Tìm tên sách..." style="padding: 8px; width: 250px;">
        <select name="iddm" style="padding: 8px;">
            <option value="0">Tất cả danh mục</option>
            <?php
            if (isset($listdm) && is_array($listdm)) {
                foreach ($listdm as $dm) {
                    extract($dm);
                    $selected_id = isset($_POST['iddm']) ? $_POST['iddm'] : 0;
                    $s = ($iddm == $selected_id) ? "selected" : "";
                    echo '<option value="' . $iddm . '" ' . $s . '>' . $tendm . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" name="listok" value="GO" style="padding: 8px 15px; cursor: pointer;">
    </form>

    <?php if (isset($thongbao) && $thongbao != ""): ?>
        <div
            style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin: 10px 0;">
            <?= $thongbao ?>
        </div>
    <?php endif; ?>

    <div class="row frmcontent">
        <form action="index.php?act=delete_selected_sp" method="post">
            <div class="row mb10 frmdsloai">
                <table border="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background-color: #fff9e6; height: 45px;">
                            <th style="width: 30px; text-align: center;"></th>
                            <th style="text-align: center; width: 50px;">STT</th>
                            <th style="text-align: center; width: 80px;">Mã sách</th>
                            <th style="text-align: center;">Tên sách</th>
                            <th style="text-align: center; width: 120px;">Hình ảnh</th>
                            <th style="text-align: center; width: 100px;">Giá</th>
                            <th style="text-align: center; width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($listsp) && is_array($listsp)) {
                            $stt = 1;
                            foreach ($listsp as $sp) {
                                extract($sp); // Tự động tạo ra các biến $idsp, $tensp, $giasp, $img...
                        
                                $suasp = "index.php?act=suasp&idsp=" . $idsp;
                                $xoasp = "index.php?act=xoasp&idsp=" . $idsp;

                                // Đường dẫn ảnh hiển thị
                                $hinhpath = "../uploads/" . $img;
                                if (is_file($hinhpath)) {
                                    $hinh = "<img src='" . $hinhpath . "' height='80' style='object-fit: cover;'>";
                                } else {
                                    $hinh = "<small>No photo</small>";
                                }

                                echo '<tr style="height: 100px;">
            <td style="text-align: center;">
                <input type="checkbox" name="selected_id[]" value="' . $idsp . '">
            </td>
            <td style="text-align: center;">' . $stt . '</td>
            <td style="text-align: center;">' . $idsp . '</td>
            <td style="padding: 0 10px; font-weight: 500;">' . $tensp . '</td>
            <td style="text-align: center;">' . $hinh . '</td> 
            <td style="text-align: center; font-weight: bold; color: #e74c3c;">' . number_format($giasp, 0, ',', '.') . 'đ</td>
            <td style="text-align: center;">
                <a href="' . $suasp . '"><input type="button" value="Sửa" style="cursor:pointer; padding: 5px 10px;"></a>
                <a href="' . $xoasp . '" onclick="return confirm(\'Bạn có chắc muốn xóa không?\')">
                    <input type="button" value="Xóa" style="cursor:pointer; padding: 5px 10px; background-color: #ff4d4d; color: white; border: none;">
                </a>
            </td>
        </tr>';
                                $stt++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row mb10" style="margin-top: 20px; display: flex; gap: 10px; align-items: center;">
                <input type="button" value="Chọn tất cả" id="check-all-sp" style="padding: 10px; cursor: pointer;">
                <input type="button" value="Bỏ chọn tất cả" id="uncheck-all-sp" style="padding: 10px; cursor: pointer;">
                <input type="submit" name="delete_selected" value="Xóa các mục đã chọn"
                    style="padding: 10px; cursor: pointer; background-color: #ff4d4d; color: white; border: none; border-radius: 3px;"
                    onclick="return confirm('Xác nhận xóa hàng loạt các sản phẩm đã chọn?')">

                <a href="index.php?act=addsp">
                    <input type="button" value="NHẬP THÊM"
                        style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    const btnCheckAll = document.getElementById('check-all-sp');
    const btnUncheckAll = document.getElementById('uncheck-all-sp');
    const listCheckboxes = document.querySelectorAll('input[name="selected_id[]"]');

    btnCheckAll.addEventListener('click', () => {
        listCheckboxes.forEach(cb => cb.checked = true);
    });

    btnUncheckAll.addEventListener('click', () => {
        listCheckboxes.forEach(cb => cb.checked = false);
    });
</script>