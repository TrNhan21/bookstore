<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH GÓP Ý TỪ KHÁCH HÀNG</h1>
    </div>
    <div class="row frmcontent">
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead style="background: #5d4e37; color: white;">
                <tr>
                    <th>ID</th>
                    <th>NGƯỜI GỬI</th>
                    <th>EMAIL</th>
                    <th>NỘI DUNG GÓP Ý</th>
                    <th>NGÀY GỬI</th>
                    <th>THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listgopy as $gy): ?>
                    <?php extract($gy); ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><strong><?= $name ?></strong></td>
                        <td><?= $email ?></td>
                        <td style="text-align: left; padding: 10px;"><?= $noidung ?></td>
                        <td><?= $ngaygopy ?></td>
                        <td>
                            <a href="index.php?act=xoagy&id=<?= $id ?>" onclick="return confirm('Xóa góp ý này?')">
                                <input type="button" value="Xóa"
                                    style="background:red; color:white; border:none; padding:5px 10px; cursor:pointer;">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>