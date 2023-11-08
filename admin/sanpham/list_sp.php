<div class="content">
    <div class="titel">
        <h1>DANH SÁCH DANH MỤC</h1>
    </div>

    <form action="index.php?act=list_sp" method="post">
        <input class="timkiem" type="text" name="kyw">
        <select class="show_dm" name="id_dm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($list_dm as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id_dm . '">' . $ten_dm . '</option>';
            }
            ?>
        </select>
        <input class="listok" type="submit" name="listok" value="GO">
    </form>

    <div class="form">
        <div class="form-list">

            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>ĐƠN GIÁ</th>
                    <th>HÌNH ẢNH</th>
                    <th>LƯỢT XEM</th>
                    <th></th>
                </tr>

                <?php
                foreach ($list_sp as $sanpham) {
                    extract($sanpham);
                    $sua_sp = "index.php?act=sua_sp&id_sp=" . $id_sp;
                    $xoa_sp = "index.php?act=xoa_sp&id_sp=" . $id_sp;

                    $imgpath = "../upload/" . $hinh;
                    if (is_file($imgpath)) {
                        $img = "<img src='" . $imgpath . "' height='80'>";
                    } else {
                        $img = "Không có hình";
                    }

                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id_sp . '</td>
                        <td>' . $ten_sp . '</td>
                        <td>' . $don_gia . '</td>
                        <td>' . $img . '</td>
                        <td>' . $so_luot_xem . '</td>
                        <td><a href="' . $sua_sp . '"><input type="button" value="Sửa"></a> <a href="' . $xoa_sp . '"><input type="button" value="Xóa"></a></td>
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
            <a href="index.php?act=add_sp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>