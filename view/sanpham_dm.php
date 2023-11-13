<div class="container-sanpham">
    <div class="ten-danh-muc">
        <h3><?=$namedm?></h3>
    </div>

    <div class="sap-xep">
        <p class="xep-theo">Xếp theo: </p>
        <div class="group-sapxep">
            <input type="radio" name="radio-group" id="A-Z">
            <lable for="A-Z">Tên A-Z</lable>
        </div>
        <div class="group-sapxep">
            <input type="radio" name="radio-group" id="Z-A">
            <lable for="Z-A">Tên Z-A</lable>
        </div>
        <div class="group-sapxep">
            <input type="radio" name="radio-group" id="hangmoi">
            <lable for="hangmoi">Hàng mới</lable>
        </div>
        <div class="group-sapxep">
            <input type="radio" name="radio-group" id="giathapdencao">
            <lable for="giathapdencao">Giá thấp đến cao</lable>
        </div>
        <div class="group-sapxep">
            <input type="radio" name="radio-group" id="giacaoxuongthap">
            <lable for="giacaoxuongthap">Giá cao xuống thấp</lable>
        </div>
    </div>

    <div class="sanpham">
        <ul class="content-sanpham">

            <?php
            foreach ($ds_sp as $sanpham) {
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
                        <a class="ten" href="' . $link_sp . '">' . $ten_sp . '</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
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
                        <a href="" class="buy-now"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> Mua ngay</a>
                    </div>
                    <div class="box-info">
                        <a class="ten" href="">Canon 60D</a>
                        <div class="gia">4.000.000 VNĐ</div>
                    </div>
                </div>
            </li> -->
        </ul>
    </div>
</div>