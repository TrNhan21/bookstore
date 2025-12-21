<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5e6d3 0%, #bdab8bff 100%);
            padding: 30px 15px;
            min-height: 100vh;
        }

        .cart-container {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(139, 90, 43, 0.15);
            overflow: hidden;
        }

        /* HEADER */
        .cart-header {
            background: linear-gradient(135deg, #ffe042ff 0%, #aa7a00ff 100%);
            padding: 35px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cart-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .cart-header h1 {
            color: #ffffff;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart-header p {
            color: #fff8e7;
            font-size: 15px;
            position: relative;
            z-index: 1;
        }

        /* BODY */
        .cart-body {
            padding: 40px 30px;
        }

        /* EMPTY CART */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, #fef9f3 0%, #fff8e7 100%);
            border-radius: 12px;
            margin: 20px 0;
        }

        .empty-cart-icon {
            font-size: 100px;
            margin-bottom: 20px;
            opacity: 0.6;
        }

        .empty-cart h3 {
            color: #8b5a2b;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .empty-cart p {
            color: #8b7355;
            font-size: 16px;
            margin-bottom: 25px;
        }

        /* CART ITEMS */
        .cart-items {
            margin-bottom: 30px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: #fef9f3;
            border-radius: 10px;
            margin-bottom: 15px;
            border: 1px solid #f5e6d3;
            transition: all 0.3s;
        }

        .cart-item:hover {
            box-shadow: 0 5px 20px rgba(139, 90, 43, 0.1);
            transform: translateY(-2px);
        }

        .item-image {
            flex-shrink: 0;
            width: 100px;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
            background: white;
            border: 2px solid #f5e6d3;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-size: 18px;
            font-weight: 600;
            color: #5a4a3a;
            margin-bottom: 10px;
        }

        .item-price {
            font-size: 16px;
            color: #d4a574;
            font-weight: 600;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 8px 15px;
            border-radius: 8px;
            border: 2px solid #f5e6d3;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #d4a574;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.2s;
            font-weight: bold;
        }

        .quantity-btn:hover {
            background: #c89666;
            transform: scale(1.1);
        }

        .quantity-value {
            font-size: 16px;
            font-weight: 600;
            color: #5a4a3a;
            min-width: 30px;
            text-align: center;
        }

        .item-total {
            text-align: right;
            min-width: 120px;
        }

        .item-total-label {
            font-size: 13px;
            color: #8b7355;
            margin-bottom: 5px;
        }

        .item-total-price {
            font-size: 20px;
            font-weight: 700;
            color: #d4a574;
        }

        .item-remove {
            text-decoration: none;
            font-size: 24px;
            transition: all 0.2s;
            padding: 8px;
            border-radius: 6px;
        }

        .item-remove:hover {
            background: #ffe5e5;
            transform: scale(1.2);
        }

        /* CART SUMMARY */
        .cart-summary {
            background: linear-gradient(135deg, #fef9f3 0%, #fff8e7 100%);
            padding: 30px;
            border-radius: 10px;
            border: 2px solid #f5e6d3;
            margin-bottom: 30px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f5e6d3;
        }

        .summary-row:last-child {
            border-bottom: none;
            padding-top: 20px;
            margin-top: 10px;
            border-top: 2px dashed #d4a574;
        }

        .summary-label {
            font-size: 16px;
            color: #8b5a2b;
        }

        .summary-value {
            font-size: 16px;
            font-weight: 600;
            color: #5a4a3a;
        }

        .summary-total-label {
            font-size: 20px;
            font-weight: 700;
            color: #8b5a2b;
        }

        .summary-total-value {
            font-size: 28px;
            font-weight: 700;
            color: #d4a574;
        }

        /* BUTTONS */
        .cart-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .cart-btn {
            flex: 1;
            min-width: 180px;
            padding: 16px 30px;
            text-align: center;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-clear {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
        }

        .btn-clear:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        .btn-continue {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: white;
        }

        .btn-continue:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(127, 140, 141, 0.4);
        }

        .btn-checkout {
            background: linear-gradient(135deg, #ffea00ff 0%, #ffc400ff 100%);
            color: white;
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 165, 116, 0.5);
        }

        .cart-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 20px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .cart-body {
                padding: 30px 20px;
            }

            .cart-header h1 {
                font-size: 26px;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .item-image {
                width: 100%;
                height: 200px;
            }

            .item-controls {
                flex-direction: column;
                width: 100%;
            }

            .quantity-control {
                width: 100%;
                justify-content: center;
            }

            .item-total {
                width: 100%;
            }

            .cart-actions {
                flex-direction: column;
            }

            .cart-btn {
                min-width: 100%;
            }

            .summary-total-value {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
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