<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - NhanVanBook</title>
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

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #8b6914 0%, #6d5419 50%, #5d4e37 100%);
            color: white;
            padding: 120px 2rem 60px;
            text-align: center;
            margin-top: 60px;
            border-bottom: 4px solid #d4a574;
        }

        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInUp 0.8s ease;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.95;
            animation: fadeInUp 1s ease;
        }

        /* Contact Container */
        .contact-container {
            max-width: 1200px;
            margin: -40px auto 60px;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            background: linear-gradient(135deg, #faf8f3 0%, #f5f1e8 100%);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(93, 78, 55, 0.2);
            overflow: hidden;
            border: 3px solid #d4a574;
        }

        /* Contact Form */
        .contact-form-section {
            padding: 3rem;
        }

        .contact-form-section h2 {
            color: #5d4e37;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            border-bottom: 3px solid #d4a574;
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #5d4e37;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #d4a574;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: inherit;
            background-color: #fff9e6;
            color: #3e2723;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #8b6914;
            box-shadow: 0 0 0 3px rgba(139, 105, 20, 0.15);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-button {
            background: linear-gradient(135deg, #8b6914 0%, #6d5419 100%);
            color: #fff9e6;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            font-weight: 600;
            box-shadow: 0 5px 20px rgba(139, 105, 20, 0.3);
        }

        .submit-button:hover {
            background: linear-gradient(135deg, #6d5419 0%, #5d4e37 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 105, 20, 0.4);
        }

        /* Contact Info */
        .contact-info-section {
            background: linear-gradient(135deg, #5d4e37 0%, #4a3f2f 100%);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .contact-info-section h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #d4a574;
            border-bottom: 3px solid #8b6914;
            padding-bottom: 0.5rem;
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(212, 165, 116, 0.15);
            border-radius: 12px;
            transition: all 0.3s;
            border: 2px solid rgba(212, 165, 116, 0.3);
        }

        .contact-info-item:hover {
            background: rgba(212, 165, 116, 0.25);
            transform: translateX(10px);
            border-color: #d4a574;
        }

        .contact-icon {
            font-size: 2rem;
            margin-right: 1.5rem;
            color: #d4a574;
        }

        .contact-details h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #d4a574;
        }

        .contact-details p {
            opacity: 0.95;
            line-height: 1.8;
            color: #e8dcc8;
        }

        /* Map Section */
        .map-section {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 2rem;
        }

        .map-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #5d4e37;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(93, 78, 55, 0.1);
        }

        .map-container {
            background: linear-gradient(135deg, #faf8f3 0%, #f5f1e8 100%);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(93, 78, 55, 0.15);
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6d5419;
            border: 3px solid #d4a574;
        }

        /* FAQ Section */
        .faq-section {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 2rem;
        }

        .faq-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #5d4e37;
            margin-bottom: 3rem;
            text-shadow: 2px 2px 4px rgba(93, 78, 55, 0.1);
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .faq-item {
            background: linear-gradient(135deg, #fff9e6 0%, #faf8f3 100%);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(93, 78, 55, 0.15);
            border-left: 4px solid #8b6914;
            transition: all 0.3s;
            border: 2px solid #d4a574;
            border-left-width: 4px;
        }

        .faq-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(139, 105, 20, 0.3);
            border-left-color: #d4a574;
        }

        .faq-item h3 {
            color: #5d4e37;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .faq-item p {
            color: #6d5419;
            line-height: 1.8;
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

        @media (max-width: 968px) {
            .contact-wrapper {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .nav-links {
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 1.8rem;
            }

            .logo {
                font-size: 1.4rem;
            }

            .faq-grid {
                grid-template-columns: 1fr;
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
                <li><a href="#home">Trang Chủ</a></li>
                <li><a href="#about">Giới Thiệu</a></li>
                <li><a href="#products">Sản Phẩm</a></li>
                <li><a href="#contact">Liên Hệ</a></li>
            </ul>
        </nav>
    </header> -->

    <!-- Page Header -->
    <section class="page-header">
        <h1>Liên Hệ Với Chúng Tôi</h1>
        <p>Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn</p>
    </section>

    <!-- Contact Form and Info -->
    <section class="contact-container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div class="contact-form-section">
                <h2>Gửi Tin Nhắn</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Họ và Tên *</label>
                        <input type="text" id="name" name="name" required placeholder="Nhập họ và tên của bạn">
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required placeholder="email@example.com">
                    </div>

                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="tel" id="phone" name="phone" placeholder="0123 456 789">
                    </div>

                    <div class="form-group">
                        <label for="subject">Chủ Đề</label>
                        <select id="subject" name="subject">
                            <option value="general">Câu hỏi chung</option>
                            <option value="order">Đơn hàng</option>
                            <option value="support">Hỗ trợ kỹ thuật</option>
                            <option value="feedback">Góp ý</option>
                            <option value="partnership">Hợp tác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Nội Dung *</label>
                        <textarea id="message" name="message" required
                            placeholder="Nhập nội dung tin nhắn của bạn..."></textarea>
                    </div>

                    <button type="submit" class="submit-button">Gửi Tin Nhắn</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="contact-info-section">
                <h2>Thông Tin Liên Hệ</h2>

                <div class="contact-info-item">
                    <div class="contact-icon">📍</div>
                    <div class="contact-details">
                        <h3>Địa Chỉ</h3>
                        <p>123 Đường Nguyễn Huệ<br>Quận 1, TP. Hồ Chí Minh<br>Việt Nam</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon">📞</div>
                    <div class="contact-details">
                        <h3>Điện Thoại</h3>
                        <p>Hotline: 1900-xxxx<br>
                            Mobile: 0123 456 789<br>
                            (8:00 - 22:00 hàng ngày)</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon">📧</div>
                    <div class="contact-details">
                        <h3>Email</h3>
                        <p>info@nhanvanbook.vn<br>
                            support@nhanvanbook.vn<br>
                            sales@nhanvanbook.vn</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon">⏰</div>
                    <div class="contact-details">
                        <h3>Giờ Làm Việc</h3>
                        <p>Thứ 2 - Thứ 7: 8:00 - 22:00<br>
                            Chủ Nhật: 9:00 - 21:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <h2>Câu Hỏi Thường Gặp</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h3>🚚 Chính sách giao hàng như thế nào?</h3>
                <p>Chúng tôi giao hàng toàn quốc trong 24-48 giờ. Miễn phí giao hàng cho đơn hàng từ 200,000đ trở lên.
                </p>
            </div>

            <div class="faq-item">
                <h3>💳 Có những phương thức thanh toán nào?</h3>
                <p>Chúng tôi chấp nhận thanh toán qua thẻ ATM, thẻ tín dụng, ví điện tử và thanh toán khi nhận hàng
                    (COD).</p>
            </div>

            <div class="faq-item">
                <h3>🔄 Chính sách đổi trả như thế nào?</h3>
                <p>Bạn có thể đổi trả sách trong vòng 7 ngày nếu sản phẩm bị lỗi hoặc không đúng mô tả.</p>
            </div>

            <div class="faq-item">
                <h3>📦 Làm thế nào để theo dõi đơn hàng?</h3>
                <p>Sau khi đặt hàng, bạn sẽ nhận được mã tracking qua email hoặc SMS để theo dõi đơn hàng của mình.</p>
            </div>

            <div class="faq-item">
                <h3>💰 Có chương trình ưu đãi nào không?</h3>
                <p>Chúng tôi thường xuyên có các chương trình khuyến mãi, giảm giá và tích điểm thành viên. Đăng ký nhận
                    tin để không bỏ lỡ!</p>
            </div>

            <div class="faq-item">
                <h3>📖 Sách có phải là hàng chính hãng?</h3>
                <p>100% sách chúng tôi cung cấp đều là hàng chính hãng, mới 100%, có tem bản quyền đầy đủ.</p>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <h2>Vị Trí Cửa Hàng</h2>
        <div class="map-container">
            <p style="font-size: 1.2rem;">🗺️ Bản đồ Google Maps sẽ được hiển thị tại đây</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
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

    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            if (name && email && message) {
                alert('Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.');
                this.reset();
            }
        });
    </script>
</body>

</html>