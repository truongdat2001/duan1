<div class="content">
    <div class="titel">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>

    <div class="form">
        <div class="form-list">

            <table>
                <tr>
                    <th>ID</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>ID NGƯỜI DÙNG</th>
                    <th>ID SẢN PHẨM</th>
                    <th>NỘI DUNG</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th></th>
                </tr>

                <?php
                foreach ($list_binhluan as $binhluan) {
                    extract($binhluan);
                    $xoa_dm = "index.php?act=xoa_binhluan&id=" . $id;
                    echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $hovaten . '</td>
                        <td>' . $iduser . '</td>
                        <td>' . $idpro . '</td>
                        <td>' . $noidung . '</td>
                        <td>' . $ngaybinhluan . '</td>
                        <td><a href="' . $xoa_dm . '"><input type="button" value="Xóa"></a></td>
                    </tr>';
                }
                ?>
            </table>
            <?php
            if (isset($thongbao)) {
                echo $thongbao;
            }
            ?>
        </div>
    </div>
</div>