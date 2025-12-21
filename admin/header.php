<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị Website - Bookstore</title>
    <link rel="stylesheet" href="../view/css/style2.css">
    <style>
        /* Thêm một chút style để menu nhìn rõ ràng hơn */
        .menu ul {
            padding: 0;
            list-style: none;
            display: flex;
            background: #333;
        }

        .menu ul li a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .menu ul li a:hover {
            background: #aa7a00;
            color: #fff;
        }

        .header h1 {
            background: #ffe16aff;
            padding: 20px;
            margin: 0;
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1>QUẢN TRỊ HỆ THỐNG (ADMIN)</h1>
        </div>

        <div class="row mb menu">
            <ul>
                <li><a href="index.php">Trang chủ Admin</a></li>
                <li><a href="index.php?act=listdm">Danh mục</a></li>
                <li><a href="index.php?act=listsp">Sản phẩm</a></li>
                <li><a href="index.php?act=dskh">Khách hàng</a></li>
                <li><a href="index.php?act=listbill">Đơn hàng</a></li>
                <li><a href="index.php?act=dsbl">Bình luận</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
                <li style="margin-left: auto; background: #aa7a00;"><a href="../index.php">Xem Website 🌐</a></li>
            </ul>
        </div>