<div class="content">
    <div class="titel">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>

    <form action="index.php?act=listbill" method="post">
        <input class="timkiem" type="text" name="kyw" placeholder="Nhập mã đơn hàng">
        <input class="listok" type="submit" name="listok" value="GO">
    </form>

    <div class="form">
        <div class="form-list">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $soluong = loadall_giohang_soluong($bill['id']);
                    $ttdn = get_trangthaidonhang($bill['bill_trangthai']);
                    $khachhang = $bill['bill_hovaten'] . '
                                <br> ' . $bill['bill_email'] . ' 
                                <br> ' . $bill['bill_phone'] . ' 
                                <br> ' . $bill['bill_diachi'] . ' '; 
                    echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>VN-' . $bill['id'] . '</td>
                                <td>' . $khachhang . '</td>
                                <td>'.$soluong.'</td>
                                <td><strong>'.$tongcong.'</strong> VND</td>
                                <td>'.$bill['ngaydathang'].'</td>
                                <td>'.$ttdn.'</td>
                                <td><a href=""><input type="button" value="Sửa"></a> <a href=""><input type="button" value="Xóa"></a></td>
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