<div class="container_ctsp">
    <div class="content_ctsp">
        <?php
        extract($onesp);
        $img = $hinh_path . $hinh;
        $vnd = " VNĐ";
        $soTienDinhDang = number_format($don_gia, 0, ',', '.');
        
        echo '<h3>' . $ten_sp . '</h3>
            <div class="sp_info">
                <div class="img">
                    <img src="' . $img . '" height="300px" width="300px" alt="">
                </div>
    
                <div class="info">
                    <h3>' . $soTienDinhDang . '' . $vnd . '</h3>
                    <h4>Tình trạng: Còn hàng</h4>
                    <a href="">ĐẶC ĐIỂM NỔI BẬT</a>
                    <ul>
                        <li>Được may từ chất vải sợi S.Cafe bảo vệ môi trường, thân thiện với làn da người mặc</li>
                        <li>Vải cafe còn mang sự mát mẻ,nhanh khô, khử mùi tốt và chống được tia cực tím, tia UV </li>
                        <li>Form áo rộng rãi, phù hợp với mọi vóc dáng mang lại sự thoải mái cho người mặc</li>
                        <li>Đa dạng về màu sắc dễ phối đồ, cho người mặc thoải mái lựa chọn</li>
                    </ul>
                </div>
    
                <div class="quyenloi">
                    <h2>MUA NHƯ VUA - CHĂM SÓC NHƯ VIP</h2>
                    <div class="group_quyenloi">
                        <div class="box">
                            <img src="./img/evo_policy_img_1.png" height="40px" width="40px" alt="">
                            <p>Miễn phí tư vấn</p>
                        </div>
    
                        <div class="box">
                            <img src="./img/evo_policy_img_2.png" height="40px" width="40px" alt="">
                            <p>Lỗi 1 đổi 1</p>
                        </div>
    
                        <div class="box">
                            <img src="./img/evo_policy_img_3.png" height="40px" width="40px" alt="">
                            <p>Bảo hành chỉ cần số điện thoại</p>
                        </div>
    
                        <div class="box">
                            <img src="./img/evo_policy_img_4.png" height="40px" width="40px" alt="">
                            <p>Hỗ trợ trọn đời | Nhận thu mua tại nhà</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="dathang">
                <div class="submit_dathang">
                    <form action="index.php?act=themgiohang" method="post">
                    <input type="hidden" name="id_sp" value="' . $id_sp . '">
                    <input type="hidden" name="ten_sp" value="' . $ten_sp . '">
                    <input type="hidden" name="hinh" value="' . $hinh . '">
                    <input type="hidden" name="don_gia" value="' . $don_gia . '">
                    <input type="submit" name="themgiohang" value="MUA NGAY VỚI GIÁ ' . $soTienDinhDang . '' . $vnd . '">
                </div>
            </div>';
        ?>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#binhluan").load("./view/form_binhluan.php", {
            idpro: <?= $id_sp ?>
        });
    });
</script>
<div class="content_binhluan" id="binhluan">
</div>