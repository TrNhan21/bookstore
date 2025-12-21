<div class="boxuser-status">
    <?php
    if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
        $user = $_SESSION['user'];
        // extract($user); // Nếu muốn dùng trực tiếp $user, $email, $role
        ?>
        <div class="user-logged">
            <span class="welcome">Xin chào, <strong><?= htmlspecialchars($user['user']) ?></strong></span>
            <span class="separator">|</span>
            <a href="index.php?act=edit_taikhoan" title="Thông tin cá nhân">
                <i class="fa fa-user"></i> Hồ sơ
            </a>

            <?php if (isset($user['role']) && $user['role'] == 1): ?>
                <span class="separator">|</span>
                <a href="admin/index.php" target="_blank" style="color: #d4a574; font-weight: bold;">
                    <i class="fa fa-cogs"></i> Quản trị
                </a>
            <?php endif; ?>

            <span class="separator">|</span>
            <a href="index.php?act=thoat" class="logout-link" onclick="return confirm('Bạn có muốn thoát không?')">
                Thoát <i class="fa fa-sign-out"></i>
            </a>
        </div>
    <?php
    } else {
        ?>
        <div class="user-guest">
            <a href="index.php?act=dangnhap"><i class="fa fa-sign-in"></i> Đăng nhập</a>
            <span class="separator">|</span>
            <a href="index.php?act=dangky">Đăng ký</a>
        </div>
    <?php
    }
    ?>
</div>

<style>
    .boxuser-status {
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333;
        padding: 5px 10px;
    }

    .user-logged strong {
        color: #8b5a2b;
    }

    .boxuser-status a {
        text-decoration: none;
        color: #555;
        transition: 0.3s;
    }

    .boxuser-status a:hover {
        color: #d4a574;
    }

    .separator {
        margin: 0 8px;
        color: #ccc;
    }

    .logout-link {
        color: #e74c3c !important;
    }
</style>