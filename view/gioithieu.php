<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NhanVanBook - Thế Giới Sách Trực Tuyến</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', serif;
            line-height: 1.6;
            color: #3e2723;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc8 100%);
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #5d4e37 0%, #4a3f2f 100%);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(93, 78, 55, 0.3);
            border-bottom: 3px solid #d4a574;
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #d4a574;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #f5e6d3;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 600;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #d4a574;
            transition: width 0.3s;
        }

        .nav-links a:hover {
            color: #d4a574;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #8b6914 0%, #6d5419 50%, #5d4e37 100%);
            color: white;
            padding: 120px 2rem 80px;
            text-align: center;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y="50" font-size="60" opacity="0.05">📚</text></svg>') repeat;
            opacity: 0.3;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            animation: fadeInUp 1.2s ease;
            position: relative;
            z-index: 1;
        }

        .cta-button {
            background: linear-gradient(135deg, #d4a574 0%, #c7965a 100%);
            color: #3e2723;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            animation: fadeInUp 1.4s ease;
            box-shadow: 0 5px 20px rgba(212, 165, 116, 0.4);
            position: relative;
            z-index: 1;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, #c7965a 0%, #b8874b 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.5);
        }

        /* Features Section */
        .features {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #ffaa34ff;
            margin-bottom: 3rem;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.1);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #fff9e6 0%, #faf8f3 100%);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(93, 78, 55, 0.15);
            transition: all 0.3s;
            border: 2px solid #d4a574;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(139, 105, 20, 0.3);
            border-color: #8b6914;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: #5d4e37;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .feature-card p {
            color: #6d5419;
            line-height: 1.8;
        }

        /* Categories Section */
        .categories {
            background: linear-gradient(135deg, #5d4e37 0%, #4a3f2f 100%);
            color: white;
            padding: 60px 2rem;
            margin: 60px 0;
            border-top: 4px solid #d4a574;
            border-bottom: 4px solid #d4a574;
        }

        .category-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .category-item {
            background: linear-gradient(135deg, rgba(139, 105, 20, 0.3) 0%, rgba(109, 84, 25, 0.3) 100%);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .category-item:hover {
            background: linear-gradient(135deg, rgba(139, 105, 20, 0.5) 0%, rgba(109, 84, 25, 0.5) 100%);
            border-color: #d4a574;
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(212, 165, 116, 0.3);
        }

        .category-item h4 {
            font-size: 1.2rem;
            margin-top: 1rem;
            color: #f5e6d3;
        }

        /* Stats Section */
        .stats {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            background: linear-gradient(135deg, #8b6914 0%, #6d5419 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(139, 105, 20, 0.3);
            border: 2px solid #d4a574;
            transition: all 0.3s;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(139, 105, 20, 0.4);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #d4a574;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #4a3f2f 0%, #3e2723 100%);
            color: white;
            padding: 3rem 2rem 1rem;
            margin-top: 60px;
            border-top: 4px solid #8b6914;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: #d4a574;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            border-bottom: 2px solid #8b6914;
            padding-bottom: 0.5rem;
        }

        .footer-section p {
            color: #e8dcc8;
            line-height: 1.8;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #c7b299;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-section a:hover {
            color: #d4a574;
            padding-left: 5px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(212, 165, 116, 0.3);
            color: #c7b299;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .nav-links {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .logo {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- <header>
        <nav>
            <div class="logo">📚 NhanVanBook</div>
            <ul class="nav-links">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="#features">Đặc Điểm</a></li>
                <li><a href="#categories">Danh Mục</a></li>
                <li><a href="index.php?act=lienhe">Liên Hệ</a></li>
            </ul>
        </nav>
    </header> -->

    <!-- Hero Section -->
    <section class="hero" id="home">
        <h1>Chào Mừng Đến Với NhanVanBook</h1>
        <p>Khám phá thế giới tri thức với hàng ngàn đầu sách chất lượng</p>
        <a href="index.php" class="cta-button">Khám Phá Ngay</a>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <h2 class="section-title">Tại Sao Chọn NhanVanBook?</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">📖</div>
                <h3>Kho Sách Phong Phú</h3>
                <p>Hơn 50,000 đầu sách đa dạng từ văn học, kinh tế đến khoa học và công nghệ</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h3>Giao Hàng Nhanh</h3>
                <p>Giao hàng toàn quốc trong 24-48 giờ, miễn phí với đơn hàng trên 200k</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Giá Cả Hợp Lý</h3>
                <p>Cam kết giá tốt nhất thị trường, nhiều chương trình khuyến mãi hấp dẫn</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Thanh Toán An Toàn</h3>
                <p>Đa dạng phương thức thanh toán, bảo mật thông tin tuyệt đối</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⭐</div>
                <h3>Chất Lượng Đảm Bảo</h3>
                <p>Sách chính hãng, mới 100%, đổi trả trong 7 ngày nếu có lỗi</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h3>Hỗ Trợ 24/7</h3>
                <p>Đội ngũ tư vấn nhiệt tình, sẵn sàng hỗ trợ mọi lúc mọi nơi</p>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <h2 class="section-title">Danh Mục Sách Nổi Bật</h2>
        <div class="category-grid">
            <div class="category-item">
                <div style="font-size: 2.5rem;">📚</div>
                <h4>Văn Học</h4>
            </div>
            <div class="category-item">
                <div style="font-size: 2.5rem;">💼</div>
                <h4>Kinh Tế</h4>
            </div>
            <div class="category-item">
                <div style="font-size: 2.5rem;">🔬</div>
                <h4>Khoa Học</h4>
            </div>
            <div class="category-item">
                <div style="font-size: 2.5rem;">🎨</div>
                <h4>Nghệ Thuật</h4>
            </div>
            <div class="category-item">
                <div style="font-size: 2.5rem;">👶</div>
                <h4>Thiếu Nhi</h4>
            </div>
            <div class="category-item">
                <div style="font-size: 2.5rem;">💻</div>
                <h4>Công Nghệ</h4>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stat-item">
            <div class="stat-number">50K+</div>
            <div class="stat-label">Đầu Sách</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">100K+</div>
            <div class="stat-label">Khách Hàng</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">500K+</div>
            <div class="stat-label">Đơn Hàng</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">4.8/5</div>
            <div class="stat-label">Đánh Giá</div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Về NhanVanBook</h3>
                <p>Hệ thống bán sách trực tuyến hàng đầu Việt Nam, mang đến tri thức cho mọi người.</p>
            </div>
            <div class="footer-section">
                <h3>Liên Kết</h3>
                <ul>
                    <li><a href="#">Giới Thiệu</a></li>
                    <li><a href="#">Chính Sách Bảo Mật</a></li>
                    <li><a href="#">Điều Khoản Sử Dụng</a></li>
                    <li><a href="#">Hướng Dẫn Mua Hàng</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Liên Hệ</h3>
                <ul>
                    <li>📧 Email: info@nhanvanbook.vn</li>
                    <li>📞 Hotline: 1900-xxxx</li>
                    <li>📍 Địa chỉ: Hồ Chí Minh, Việt Nam</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 NhanVanBook. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>