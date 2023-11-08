<div class="container-giohang">
    <div class="ten-giohang">
        <h3>GIỎ HÀNG</h3>
    </div>

    <div class="content-giohang">
        <table>
            <!-- <tr>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr> -->

            <?php
                hienthi_spgiohang(1);
            // $tong = 0;
            // $i = 0;
            // $vnd = " VNĐ";
            // foreach ($_SESSION['donhang'] as $cart) {
            //     $hinh = $hinh_path . $cart[2];
            //     $thanhtien = $cart[3] * $cart[4];
            //     $tong = $tong + $thanhtien;
            //     $xoasp = '<a href="index.php?act=xoagiohang&id-cart=' . $i . '"><input type="button" value="Xóa"></a>';
            //     echo    '<tr>
            //                 <td>' . $cart[1] . '</td>
            //                 <td><img src="' . $hinh . '" width="100px" height="100px" alt=""></td>
            //                 <td>' . $cart[3] . ' '.$vnd.'</td>
            //                 <td>' . $cart[4] . '</td>
            //                 <td>' . $thanhtien . ' '.$vnd.'</td>
            //                 <td>' . $xoasp . '</td>
            //             </tr>';
            //     $i += 1;
            // }
            // echo '<tr>
            //         <td class="tongtien" colspan="4">Tổng tiền: </td>
            //         <td class="tien">' . $tong . ' '.$vnd.'</td>
            //         <td></td>
            //     </tr>';
            ?>
            <!-- <tr>
                <td><img src="./img/slider_1.png" width="100px" height="100px" alt=""></td>
                <td>Đồng hồ</td>
                <td>50</td>
                <td>4</td>
                <td>100 VNĐ</td>
                <td><input type="button" value="Xóa"></td>
            </tr>

            <tr>
                <td><img src="./img/slider_1.png" width="100px" height="100px" alt=""></td>
                <td>Đồng hồ</td>
                <td>50</td>
                <td>4</td>
                <td>100 VNĐ</td>
                <td><input type="button" value="Xóa"></td>
            </tr> -->
        </table>

        <div class="btn-dathang">
            <a href="index.php?act=bill"><input class="dongy" name="dongy" type="button" value="TIẾP TỤC ĐẶT HÀNG"></a> <a href="index.php?act=xoagiohang">XÓA GIỎ HÀNG</a>
        </div>
    </div>