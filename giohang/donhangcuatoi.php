<div class="container-donhangcuatoi">
    <div class="infor-donhangcuatoi">
        <div class="titel-donhangcuatoi">
            <h3>ĐƠN HÀNG CỦA TÔI</h3>
        </div>
        <div class="content-donhangcuatoi">
            <table>
                <tr>
                    <th>STT</th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT</th>
                    <th>SỐ LƯỢNG MẶT HÀNG</th>
                    <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                </tr>

                <?php
                    if(is_array($listbill)){
                        $i = 1;
                        foreach ($listbill as $bill) {
                            $trangthaidonhang = get_trangthaidonhang($bill['bill_trangthai']);
                            extract($bill);
                            $soluongsp = loadall_giohang_soluong($bill['id']);
                            echo '<tr>
                                    <td>'.$i.'</td>
                                    <td>VN-'.$bill['id'].'</td>
                                    <td>'.$bill['ngaydathang'].'</td>
                                    <td>'.$soluongsp.'</td>
                                    <td>'.$bill['tongcong'].'</td>
                                    <td>'.$trangthaidonhang.'</td>
                                </tr>';
                                $i+=1;
                        }
                    }
                ?>
                <!-- <tr>
                    <td>1</td>
                    <td>DAM-111</td>
                    <td>SADSADA</td>
                    <td>1</td>
                    <td>40000</td>
                    <td>Đã tanh toámn</td>
                </tr> -->
            </table>
        </div>
    </div>
</div>