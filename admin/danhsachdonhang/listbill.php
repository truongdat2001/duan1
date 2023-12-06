<div class="content">
    <div class="titel">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>

    <form action="index.php?act=listbill" method="post">
        <input class="timkiem" type="text" name="kyw" placeholder="Nhập mã đơn hàng">
        <input class="listok" type="submit" name="listok" value="GO">
    </form>

    <div class="form">
        <?php
        if (isset($thongbao)) {
            echo "<div style='font-size: 25px; color: red'>$thongbao</div>";
        }
        ?>
        <div class="form-list">
            <table>
                <tr>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th></th>
                </tr>
                <?php
                function TongDoanhThu($listbill)
                {
                    $tongDoanhThu = 0;
                    foreach ($listbill as $bill) {
                        $tongDoanhThu += $bill['tongcong'];
                    }
                    return $tongDoanhThu;
                }
                foreach ($listbill as $bill) {
                    extract($bill);
                    $soluong = loadall_giohang_soluong($bill['id']);
                    $ttdn = get_trangthaidonhang($bill['bill_trangthai']);
                    $khachhang = $bill['bill_hovaten'] . '
                                <br> ' . $bill['bill_email'] . ' 
                                <br> ' . $bill['bill_phone'] . ' 
                                <br> ' . $bill['bill_diachi'] . ' ';

                    echo '<tr>
                                <td>VN-' . $bill['id'] . '</td>
                                <td>' . $khachhang . '</td>
                                <td>' . $soluong . '</td>
                                <td><strong>' . number_format($tongcong, 0, ',', '.') . '</strong> VND</td>
                                <td>' . $bill['ngaydathang'] . '</td>
                                <td>' . $ttdn . '</td>
                                <td><a href=""><input type="button" value="Sửa"></a> <a href=""><input type="button" value="Xóa"></a></td>
                            </tr>';
                }
                ?>

            </table>
            <br>
            <Table>
                <tr>
                    <td colspan="2">Doanh Thu</td>
                    <td><strong><?php echo number_format(TongDoanhThu($listbill), 0, ',', '.'); ?></strong> VND</td>
                </tr>
            </Table>
        </div>
    </div>
</div>