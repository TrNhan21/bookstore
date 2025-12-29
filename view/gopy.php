<style>
    .feedback-box {
        max-width: 800px;
        margin: 40px auto;
        background: #fff9e6;
        /* Màu kem nhẹ */
        padding: 40px;
        border-radius: 15px;
        border: 2px solid #d4a574;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .feedback-box h2 {
        text-align: center;
        color: #5d4e37;
        font-family: 'Times New Roman', serif;
        text-transform: uppercase;
        border-bottom: 2px solid #d4a574;
        padding-bottom: 15px;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #3e2723;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #d4a574;
        border-radius: 8px;
        background: #fff;
        font-size: 16px;
        box-sizing: border-box;
        /* Đảm bảo không bị tràn khung */
    }

    .form-group textarea {
        height: 150px;
        resize: vertical;
    }

    .btn-gopy {
        background: linear-gradient(135deg, #b8860b 0%, #8b6914 100%);
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        font-size: 1.1em;
        transition: 0.3s;
    }

    .btn-gopy:hover {
        background: #5d4e37;
        transform: translateY(-2px);
    }
</style>

<div class="row">
    <div class="feedback-box">
        <h2>Gửi ý kiến góp ý</h2>
        <p style="text-align: center; font-style: italic; color: #7f8c8d; margin-bottom: 30px;">
            Mọi ý kiến của bạn sẽ giúp NhanVanBook nâng cao chất lượng phục vụ mỗi ngày.
        </p>

        <form action="index.php?act=send_gopy" method="post">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="noidung" required></textarea>
            </div>
            <button type="submit" name="btn_gopy" class="btn-gopy">GỬI GÓP Ý</button>
        </form>
    </div>
</div>