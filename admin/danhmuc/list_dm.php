<div class="content">
    <div class="titel">
        <h1>DANH SÁCH DANH MỤC</h1>
    </div>
    <div class="form">
        <div class="form-list">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>

                <?php
                foreach ($list_dm as $danhmuc) {
                    extract($danhmuc);
                    $sua_dm = "index.php?act=sua_dm&id_dm=" . $id_dm;
                    $xoa_dm = "index.php?act=xoa_dm&id_dm=" . $id_dm;

                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id_dm . '</td>
                        <td>' . $ten_dm . '</td>
                        <td><a href="' . $sua_dm . '"><input type="button" value="Sửa"></a> <a href="' . $xoa_dm . '"><input type="button" value="Xóa"></a></td>
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
        <div class="group-submit">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=add_dm"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>