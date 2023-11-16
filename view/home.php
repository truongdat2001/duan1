<div class="container">
    <section class="content">
        <article class="danhmuc">
            <h3>DANH MỤC</h3>
            <nav>
                <ul>
                    <?php
                    foreach ($ds_dm as $danhmuc) {
                        extract($danhmuc);
                        $link_dm = "index.php?act=sanpham_dm&id_dm=" . $id_dm;
                        echo '<li>
                            <a href="' . $link_dm . '"><i class="fa-solid fa-chevron-right"></i> ' . $ten_dm . '</a>
                            </li>';
                    }
                    ?>
                    <!-- <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i>Điện thoại</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i> Máy ảnh</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i> Ống kính</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i> Table</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i> Laptop</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i> Đồng hồ</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-chevron-right"></i> Sạc dự phòng</a>
                    </li> -->
                </ul>
            </nav>
        </article>

        <div class="slide">
            <div class="slide-1">
                <a href=""><img src="img/slider_1.png" alt=""></a>
            </div>

            <div class="slide-2">
                <a href=""><img src="img/near_slider_1.png" alt=""></a>
                <a href=""><img src="img/near_slider_2.png" alt=""></a>
            </div>
        </div>
    </section>

    <div class="banner">
        <a href=""><img src="img/banner.png" alt=""></a>
    </div>

    <section class="sp-moi">
        <div class="header">
            <a href="">Sản phẩm MỚI</a>
            <p>Ưu đãi lớn trong tháng</p>
        </div>
        <ul class="content-moi">
            <?php
            foreach ($sp_new as $sanpham) {
                extract($sanpham);
                $img = $hinh_path . $hinh;
                $link_sp = "index.php?act=sanpham_ct&id_sp=" . $id_sp;
                $vnd = " VNĐ";
                $soTienDinhDang = number_format($don_gia, 0, ',', '.');
                echo '<li>
                    <div class="box">
                    <div class="box-top">
                        <a href="' . $link_sp . '" class="box-img">
                            <img src="' . $img . '" alt="">
                        </a>
                        <div class="themgiohang">
                            <form action="index.php?act=themgiohang" method="post">
                                <input type="hidden" name="id_sp" value="' . $id_sp . '">
                                <input type="hidden" name="ten_sp" value="' . $ten_sp . '">
                                <input type="hidden" name="hinh" value="' . $hinh . '">
                                <input type="hidden" name="don_gia" value="' . $don_gia . '">
                                <input type="submit" name="themgiohang" class="buy-now" value="Thêm vào giỏ hàng"></input>
                            </form>
                        </div>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="' . $link_sp . '" title="' . $ten_sp . '">' . $ten_sp . '</a>
                        <div class="gia">' . $soTienDinhDang . '' . $vnd . '</div>
                    </div>
                    </div>
                    </li>';
            }
            ?>


            <!-- <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <div class="themgiohang">
                            <form action="index.php?act=themgiohang" method="post">
                                <input type="hidden" name="id" value="">
                                <input type="hidden" name="name" value="">
                                <input type="hidden" name="img" value="">
                                <input type="hidden" name="id" value="">
                                <input type="submit" class="buy-now" value="Thêm vào giỏ hàng"></input>
                            </form>
                        </div>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li> -->
        </ul>
    </section>


    <section class="sp-like">
        <div class="header">
            <a href="">SẢN PHẨM YÊU THÍCH</a>
            <p>Ưu đãi lớn trong tháng</p>
        </div>
        <ul class="content-like">
            <?php
            foreach ($ds_top8 as $sanpham) {
                extract($sanpham);
                $img = $hinh_path . $hinh;
                $link_sp = "index.php?act=sanpham_ct&id_sp=" . $id_sp;
                $vnd = " VNĐ";
                echo '<li>
                    <div class="box">
                    <div class="box-top">
                        <a href="' . $link_sp . '" class="box-img">
                            <img src="' . $img . '" alt="">
                        </a>
                        <div class="themgiohang">
                            <form action="index.php?act=themgiohang" method="post">
                                <input type="hidden" name="id_sp" value="' . $id_sp . '">
                                <input type="hidden" name="ten_sp" value="' . $ten_sp . '">
                                <input type="hidden" name="hinh" value="' . $hinh . '">
                                <input type="hidden" name="don_gia" value="' . $don_gia . '">
                                <input type="submit" name="themgiohang" class="buy-now" value="Thêm vào giỏ hàng"></input>
                            </form>
                        </div>
                    </div>
                    <div class="box-info">
                        <a class="ten"  href="' . $link_sp . '" title="' . $ten_sp . '">' . $ten_sp . '</a>
                        
                    </div>
                    </div>
                    </li>';
            }
            ?>

            <!-- <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li>

            <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li>

            <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li>

            <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li>

            <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li>

            <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li>

            <li>
                <div class="box">
                    <div class="box-top">
                        <a href="" class="box-img">
                            <img src="img/canon-60d.png" alt="">
                        </a>
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i>Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li> -->
        </ul>
    </section>
</div>