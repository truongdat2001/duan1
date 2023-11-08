<div class="container-hoanthanhdathang">
    <div class="infor-camon">
        <div class="titel-camon">
            <h3>CẢM ƠN</h3>
            <p>Cảm ơn Anh/Chị đã đặt hàng.</p>
        </div>
    </div>

    <?php
    if (isset($bill) && (is_array($bill))) {
        extract($bill);
    }
    else {
        echo "Ko tim thấy";
    }
    ?>

    <div class="infor-madonhang">
        <div class="titel-madonhang">
            <h3>THÔNG TIN ĐƠN HÀNG</h3>
            <p>MÃ ĐƠN HÀNG: VN - <?= $bill['id']; ?></p>
            <p>NGÀY ĐẶT HÀNG <?= $bill['ngaydathang']; ?></p>
            <p>TỔNG ĐƠN HÀNG: <?= $bill['tongcong']; ?></p>
        </div>
    </div>

    <div class="infor-ttdathang">
        <div class="titel-ttdathang">
            <h3>THÔNG TIN ĐẶT HÀNG</h3>
        </div>
        <table>
            <tr>
                <td>Người đặt hàng:</td>
                <td><?= $bill['bill_hovaten']; ?></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><?= $bill['bill_diachi']; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?= $bill['bill_email']; ?></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td>
                <td><?= $bill['bill_phone']; ?></td>
            </tr>
        </table>
    </div>

    <div class="pttt">
        <div class="titel-pttt">
            <h3>PHƯƠNG THỨC THANH TOÁN</h3>
            <p><?= $bill['bill_pttt']; ?>.</p>
        </div>
    </div>

    <div class="chitietgiohang">
        <div class="titel-chitietgiohang">
            <h3>CHI TIẾT GIỎ HÀNG</h3>
        </div>
        <div class="content-giohang">
            <table>
                <!-- <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr> -->

                <?php
                billct($billct);
                ?>
                <!-- <tr>
                    <td>1</td>
                    <td><img src="./img/slider_1.png" width="100px" height="100px" alt=""></td>
                    <td>Đồng hồ</td>
                    <td>50</td>
                    <td>4</td>
                    <td>100 VNĐ</td>
                </tr> -->
            </table>
        </div>
    </div>
</div>