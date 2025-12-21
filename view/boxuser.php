<div class="boxuser">
    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo "<h3>Xin chào, <strong>" . htmlspecialchars($user['user']) . "</strong></h3>";
        echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
        echo "<a href='index.php?act=thoat'>Đăng xuất</a>";
    } else {
        echo "<a href='index.php?act=dangnhap'>Đăng nhập</a> | ";
        echo "<a href='index.php?act=dangky'>Đăng ký</a>";
    }
    ?>
</div>