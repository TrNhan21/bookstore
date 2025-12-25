<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table class="danhmuc-table" width="100%">
                <tr>
                    <th>STT</th>
                    <th>MÃ TÀI KHOẢN</th>
                    <th>TÊN ĐĂNG NHẬP</th>
                    <th>MẬT KHẨU</th>
                    <th>EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>ĐIỆN THOẠI</th>
                    <th>VAI TRÒ</th>
                    <th>THAO TÁC</th>
                </tr>

                <tbody>
                    <?php
                    $stt = 1;
                    if (!empty($listtaikhoan) && is_array($listtaikhoan)) {
                        foreach ($listtaikhoan as $tk) {
                            $idtk = $tk['id'];
                            $user = $tk['user'] ?? '';
                            $pass = $tk['pass'] ?? '';
                            $email = $tk['email'] ?? '';
                            $address = $tk['address'] ?? 'N/A';
                            $tel = $tk['tel'] ?? 'N/A';
                            $role = $tk['role'] ?? 0;
                            $suatk = 'index.php?act=suatk&id=' . $tk['id'];
                            $xoatk = 'index.php?act=xoatk&id=' . $tk['id'];

                            echo '<tr>
                <td style="text-align: center;">' . $stt++ . '</td>
                <td style="text-align: center;">' . $idtk . '</td>
                <td>' . htmlspecialchars($user) . '</td>
                <td>' . htmlspecialchars($pass) . '</td>
                <td>' . htmlspecialchars($email) . '</td>
                <td>' . htmlspecialchars($address) . '</td>
                <td>' . htmlspecialchars($tel) . '</td>
                <td style="text-align: center;">' . ($role == 1 ? '<b style="color:red;">Admin</b>' : 'User') . '</td>
                <td style="text-align: center;">
                    <a href="http://localhost/bookstore/index.php?act=edit_taikhoan"><input type="button" value="Sửa" style="cursor:pointer;"></a>
                    <a href="' . $xoatk . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa tài khoản này?\')">
                        <input type="button" value="Xóa" style="cursor:pointer; background-color: #ff4d4d; color: white; border: none; padding: 3px 10px;">
                    </a>
                </td>
            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="9" style="text-align: center;">Không có tài khoản nào</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mb10">
            <a href="http://localhost/bookstore/index.php?act=dangky"><input type="button" value="Nhập thêm"></a>
        </div>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo '<div style="color: red; padding: 10px; font-weight: bold;">' . $thongbao . '</div>';
        }
        ?>
    </div>
</div>