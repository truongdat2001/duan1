<div class="container-billthanhtoan">
    <form action="index.php?act=hoanthanhdathang" method="post">
        <div class="infor-billthanhtoan">
            <div class="infor-billthanhtoan-left">
                <div class="text-infor-bill">
                    <h3>THÔNG TIN ĐẶT HÀNG</h3>
                </div>
                <div class="form-bill">
                    <table>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $hovaten = $_SESSION['user']['hovaten'];
                            $diachi = $_SESSION['user']['diachi'];
                            $email = $_SESSION['user']['email'];
                            $phone = $_SESSION['user']['phone'];
                        } else {
                            $hovaten = "";
                            $diachi = "";
                            $email = "";
                            $phone = "";
                        }
                        ?>
                        <tr>
                            <td>Người đặt hàng:</td>
                            <td><input type="text" name="hovaten" value="<?= $hovaten ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="diachi" value="<?= $diachi ?>"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="<?= $email ?>"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" name="phone" value="<?= $phone ?>"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="infor-billthanhtoan-right">
                <div class="text-infor-bill">
                    <h3>PHƯƠNG THỨC THANH TOÁN</h3>
                </div>
                <div class="form-bill">
                    <table>
                        <tr>
                            <td><input type="radio" value="1" name="pttt" checked>Trả tiền khi nhận hàng</td>
                            <td><input type="radio" value="2" name="pttt">Chuyển khoản ngân hàng</td>
                            <td><input type="radio" value="3" name="pttt">Thanh toán online</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="content-bill">
            <div class="ten-donhang">
                <h3>THÔNG TIN ĐƠN HÀNG</h3>
            </div>
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
                hienthi_spgiohang(0);
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
                <a href="index.php?act=hoanthanhdathang"><input class="dongy" name="dongydathang" type="submit" value="ĐỒNG Ý ĐẶT HÀNG"></a>
            </div>
        </div>
    </form>
</div>