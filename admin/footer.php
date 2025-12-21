<style>
    /* === Footer === */
    footer {
        background: linear-gradient(135deg, #8b6914 0%, #6d5419 50%, #5d4e37 100%);
        color: #f5e6d3;
        padding: 50px 20px 25px;
        margin-top: 50px;
        border-top: 4px solid var(--color-primary);
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 35px;
        margin-bottom: 35px;
    }

    .footer-section h3 {
        color: var(--color-accent);
        margin-bottom: 18px;
        font-size: 18px;
        border-bottom: 3px solid var(--color-primary);
        padding-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .footer-section ul {
        list-style: none;
    }

    .footer-section ul li {
        margin-bottom: 10px;
        font-size: 14px;
    }

    .footer-section ul li a {
        color: var(--color-bg-tan);
        text-decoration: none;
        transition: var(--transition);
    }

    .footer-section ul li a:hover {
        color: var(--color-accent);
        padding-left: 5px;
    }

    .policies {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin: 35px 0;
        padding: 25px;
        background: linear-gradient(135deg, rgba(139, 105, 20, 0.1) 0%, rgba(93, 78, 55, 0.1) 100%);
        border-radius: var(--radius-lg);
        border: 2px solid rgba(212, 165, 116, 0.3);
    }

    .policy-item {
        text-align: center;
        padding: 20px;
    }

    .policy-item h4 {
        font-size: 36px;
        margin-bottom: 12px;
        color: var(--color-accent);
    }

    .policy-item p {
        font-size: 14px;
        color: var(--color-bg-tan);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 25px;
        border-top: 2px solid rgba(212, 165, 116, 0.3);
    }

    .footer-bottom h3 {
        color: var(--color-accent);
        margin-bottom: 12px;
        font-size: 20px;
    }

    .footer-bottom p {
        font-size: 13px;
        color: #c7b299;
        margin: 8px 0;
    }
</style>
<div class="row mb footer"></div>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
</script>

<footer>
    <div class="footer-content">
        <div class="footer-grid">
            <div class="footer-section">
                <h3>Chăm sóc khách hàng</h3>
                <ul>
                    <li>📞 Điện thoại: 0825143736</li>
                    <li>📧 Email: support@nhanvanbook.com</li>
                    <li>📱 Facebook: fb.com/nhanvanbook</li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Dịch vụ của chúng tôi</h3>
                <ul>
                    <li>✓ Giao hàng toàn quốc</li>
                    <li>✓ Thanh toán bảo mật</li>
                    <li>✓ Đổi trả trong vòng 7 ngày</li>
                    <li>✓ Tư vấn miễn phí</li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Chính sách</h3>
                <ul>
                    <li><a href="chinhsachhoantra.html">Chính sách hoàn trả</a></li>
                    <li><a href="chinhsachbaomat.html">Chính sách bảo mật</a></li>
                    <li><a href="#">Phương thức thanh toán</a></li>
                    <li><a href="#">Giao hàng & Nhận hàng</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Thể loại</h3>
                <ul>
                    <li><a href="#">Trinh thám</a></li>
                    <li><a href="#">Kinh dị</a></li>
                    <li><a href="#">Kinh tế</a></li>
                    <li><a href="#">Văn hóa</a></li>
                    <li><a href="#">Giáo dục</a></li>
                    <li><a href="#">Truyện tranh</a></li>
                </ul>
            </div>
        </div>

        <div class="policies">
            <div class="policy-item">
                <h4>🚚</h4>
                <p>Giao hàng toàn quốc</p>
            </div>
            <div class="policy-item">
                <h4>🔒</h4>
                <p>Thanh toán bảo mật</p>
            </div>
            <div class="policy-item">
                <h4>↩️</h4>
                <p>Đổi trả trong vòng 7 ngày</p>
            </div>
            <div class="policy-item">
                <h4>💬</h4>
                <p>Tư vấn miễn phí</p>
            </div>
        </div>

        <div class="footer-bottom">
            <hr style="border-color: #34495e; margin: 20px 0;">
            <h3>NhanVanBook - Choose Books, Choose Life</h3>
            <p>📞 Điện thoại: 0825143736 | 📧 Email: info@nhanvanbook.com</p>
            <p>&copy; 2025 NhanVanBook. All rights reserved.</p>
        </div>
    </div>
</footer>
</div>
</div>

</body>

</html>