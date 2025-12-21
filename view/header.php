<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NhanVanBook</title>
    <link rel="stylesheet" href="index.css">

    <!-- CSS gắn trực tiếp cho giỏ hàng -->
    <style>
        .menu {
            position: relative;
        }

        .menu ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 10px;
        }

        .menu ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #ffe6c8ff;
        }

        /* ===== GIỎ HÀNG ===== */
        .header-cart {
            margin-left: auto;
            position: relative;
        }

        .header-cart a {
            text-decoration: none;
            font-weight: bold;
            color: #5a3e1b;
            font-size: 16px;
        }

        .cart-count {
            position: absolute;
            top: -6px;
            right: -12px;
            background: #c0392b;
            color: #fff;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="boxcenter">

        <!-- HEADER -->
        <div class="row mb header">
            <h1>📚 NHANVANBOOK</h1>
        </div>

        <!-- MENU -->
        <div class="row mb menu">
            <ul>
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="index.php?act=gioithieu">GIỚI THIỆU</a></li>
                <li><a href="index.php?act=lienhe">LIÊN HỆ</a></li>
                <li><a href="index.php?act=gopy">GÓP Ý</a></li>
                <li><a href="index.php?act=hoidap">HỎI ĐÁP</a></li>

                <?php if (isset($_SESSION['user'])): ?>
                    <?php if ($_SESSION['user']['role'] == 1): ?>
                        <li><a href="admin/index.php" target="_blank">QUẢN TRỊ</a></li>
                    <?php endif; ?>
                    <li><a href="index.php?act=thoat">THOÁT (<?= $_SESSION['user']['user'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="index.php?act=dangnhap">ĐĂNG NHẬP</a></li>
                <?php endif; ?>

                <li class="header-cart" style="float: right;">
                    <a href="index.php?act=viewcart" style="color: #ff4d4d; font-weight: bold;">
                        🛒 GIỎ HÀNG
                        <span class="cart-count"
                            style="background: yellow; color: black; padding: 2px 6px; border-radius: 50%; font-size: 0.8em;">
                            <?php
                            // Tính tổng số lượng sản phẩm thay vì chỉ đếm dòng
                            $total_items = 0;
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $total_items += $item['soluong'];
                                }
                            }
                            echo $total_items;
                            ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>