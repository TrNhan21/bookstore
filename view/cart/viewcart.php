<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --gold-dark: #aa7a00;
            --gold-light: #ffe042;
            --brown-primary: #5a4a3a;
            --tan: #bdab8b;
            --cream-light: #fef9f3;
            --cream-medium: #f5e6d3;
            --white: #ffffff;
            --red-soft: #e74c3c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5e6d3 0%, #bdab8b 100%);
            padding: 30px 15px;
            min-height: 100vh;
            color: var(--brown-primary);
        }

        /* TABS NAVIGATION */
        .cart-navigation {
            max-width: 1100px;
            margin: 0 auto 20px;
            display: flex;
            gap: 8px;
        }

        .nav-tab {
            padding: 12px 25px;
            text-decoration: none;
            color: var(--brown-primary);
            font-weight: bold;
            border-radius: 12px 12px 0 0;
            background: rgba(255, 255, 255, 0.5);
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--tan);
            border-bottom: none;
        }

        .nav-tab.active {
            background: var(--white);
            color: var(--gold-dark);
            border-top: 3px solid var(--gold-dark);
            padding-bottom: 15px;
            margin-bottom: -2px;
            z-index: 2;
        }

        .nav-tab:hover:not(.active) {
            background: var(--cream-medium);
            transform: translateY(-2px);
        }

        /* CONTAINER chính */
        .cart-container {
            max-width: 1100px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 0 12px 12px 12px;
            /* Bo góc mượt với Tab */
            box-shadow: 0 15px 50px rgba(139, 90, 43, 0.2);
            overflow: hidden;
            border: 1px solid var(--tan);
        }

        .cart-header {
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold-dark) 100%);
            padding: 30px;
            text-align: center;
            color: var(--white);
        }

        .cart-header h1 {
            font-size: 28px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* DANH SÁCH SẢN PHẨM */
        .cart-body {
            padding: 30px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr auto auto;
            align-items: center;
            gap: 25px;
            padding: 20px;
            background: var(--cream-light);
            border-radius: 12px;
            margin-bottom: 15px;
            border: 1px solid var(--cream-medium);
        }

        .item-image {
            width: 100px;
            height: 130px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid var(--white);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .item-price {
            color: var(--gold-dark);
            font-weight: 600;
        }

        /* ĐIỀU KHIỂN SỐ LƯỢNG */
        .quantity-control {
            display: flex;
            align-items: center;
            background: var(--white);
            border-radius: 8px;
            border: 1px solid var(--tan);
            overflow: hidden;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--cream-medium);
            color: var(--brown-primary);
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .quantity-btn:hover {
            background: var(--gold-dark);
            color: white;
        }

        .quantity-value {
            padding: 0 15px;
            font-weight: 700;
        }

        .item-total-price {
            font-size: 18px;
            color: var(--gold-dark);
            font-weight: 800;
            min-width: 120px;
            text-align: right;
        }

        /* TỔNG KẾT & NÚT */
        .cart-summary {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px dashed var(--tan);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .summary-total-value {
            font-size: 32px;
            color: var(--red-soft);
            font-weight: 900;
        }

        .cart-actions {
            display: grid;
            grid-template-columns: 1fr 1fr 2fr;
            gap: 15px;
        }

        .cart-btn {
            padding: 15px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: white;
        }

        .btn-clear {
            background: #95a5a6;
        }

        .btn-continue {
            background: var(--brown-primary);
        }

        .btn-checkout {
            background: var(--gold-dark);
            box-shadow: 0 5px 15px rgba(170, 122, 0, 0.3);
        }

        .cart-btn:hover {
            transform: translateY(-3px);
            filter: brightness(1.1);
        }

        /* TRỐNG */
        .empty-cart {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-cart-icon {
            font-size: 80px;
            color: var(--tan);
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .cart-item {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .item-image {
                margin: 0 auto;
            }

            .item-total-price {
                text-align: center;
            }

            .cart-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="row mb">
        <div class="cart-navigation">
            <a href="index.php?act=viewcart" class="nav-tab active">
                <i class="fas fa-shopping-cart"></i> GIỎ HÀNG CỦA BẠN
            </a>
            <a href="index.php?act=mybill" class="nav-tab">
                <i class="fas fa-history"></i> LỊCH SỬ ĐƠN HÀNG
            </a>
        </div>

        <!-- <div class="frmtitle">
            <h1>GIỎ HÀNG</h1> -->
    </div>
    </div>
    <div class="cart-container">
        <div class="cart-header">
            <h1>🛒 Giỏ hàng của bạn</h1>
            <p>Xem lại sản phẩm trước khi thanh toán</p>
        </div>

        <div class="cart-body">
            <?php
            $tong = 0;
            $item_count = 0;

            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                ?>
                <div class="cart-items">
                    <?php
                    foreach ($_SESSION['cart'] as $idsp => $sp):
                        $gia = (int) $sp['giasp'];
                        $soluong = (int) $sp['soluong'];
                        $thanhtien = $gia * $soluong;

                        $tong += $thanhtien;
                        $item_count += $soluong;

                        // Sử dụng $idsp từ key của mảng để chính xác tuyệt đối
                        $link_tang = "index.php?act=cart_plus&idsp=" . $idsp;
                        $link_giam = "index.php?act=cart_minus&idsp=" . $idsp;
                        $link_xoa = "index.php?act=delcart&idsp=" . $idsp;
                        ?>
                        <div class="cart-item">
                            <div class="item-image">
                                <img src="<?= $img_path . $sp['img'] ?>" alt="<?= htmlspecialchars($sp['tensp']) ?>">
                            </div>

                            <div class="item-details">
                                <div class="item-name"><?= htmlspecialchars($sp['tensp']) ?></div>
                                <div class="item-price"><?= number_format($gia, 0, ',', '.') ?> đ</div>
                            </div>

                            <div class="item-controls">
                                <div class="quantity-control">
                                    <a href="<?= $link_giam ?>" class="quantity-btn">−</a>
                                    <span class="quantity-value"><?= $soluong ?></span>
                                    <a href="<?= $link_tang ?>" class="quantity-btn">+</a>
                                </div>

                                <div class="item-total">
                                    <div class="item-total-label">Thành tiền</div>
                                    <div class="item-total-price"><?= number_format($thanhtien, 0, ',', '.') ?> đ</div>
                                </div>

                                <a href="<?= $link_xoa ?>" class="item-remove" onclick="return confirm('Xóa sản phẩm này?')">
                                    <i class="fa-solid fa-trash" style="color: #e74c3c;"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="cart-summary">
                    <div class="summary-row">
                        <span class="summary-total-label">Tổng thanh toán (<?= $item_count ?> món):</span>
                        <span class="summary-total-value"><?= number_format($tong, 0, ',', '.') ?> đ</span>
                    </div>

                    <div class="cart-actions" style="margin-top: 20px;">
                        <a href="index.php?act=delcart" class="cart-btn btn-clear"
                            onclick="return confirm('Xóa sạch giỏ hàng?')">
                            <i class="fa-solid fa-trash-can"></i> Xóa hết
                        </a>

                        <a href="index.php" class="cart-btn btn-continue">
                            <i class="fa-solid fa-arrow-left"></i> Tiếp tục mua sắm
                        </a>

                        <a href="index.php?act=thanhtoan" class="cart-btn btn-checkout" style="flex: 2;">
                            <i class="fa-solid fa-credit-card"></i> Thanh toán ngay
                        </a>
                    </div>
                </div>

            <?php else: ?>
                <div class="empty-cart">
                    <div class="empty-cart-icon">🛒</div>
                    <h3>Giỏ hàng trống!</h3>
                    <p>Bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
                    <a href="index.php" class="cart-btn btn-checkout" style="display: inline-flex; min-width: 200px;">
                        Mua sắm ngay
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>