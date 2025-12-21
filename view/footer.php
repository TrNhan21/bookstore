<style>

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