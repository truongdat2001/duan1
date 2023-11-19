<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xshop</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sanpham.css">
    <link rel="stylesheet" href="./css/dangky.css">
    <script src="https://kit.fontawesome.com/1974627856.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-dautrang">
        <header class="header-tong">
            <div class="header">
                <div class="logo">
                    <a href="./index.php"><img src="./img/logo.jpg" alt="logo" style="width: 150px"></a>
                </div>
                <div class="timkiem">
                    <form class="form" action="index.php?act=timsp" method="post">
                        <input type="type" class="nhap" name="kyw" placeholder="Bạn muốn tìm gì?">
                        <input type="submit" name="timkiem" class="icon-timkiem" value="Tìm kiếm">
                    </form>
                </div>
                <div class="spdaxem">
                    <a href="">Sản phẩm đã xem <i class="fa-solid fa-caret-down" style="color: white;"></i></a>
                </div>
                <div class="hotromuahang">
                    <a href="">
                        <span>0773315593</span>
                        <p>Hỗ trợ mua hàng</p>
                    </a>
                </div>
                <div class="taikhoan">
                    <ul class="login-user">
                        <?php
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        ?>
                            <li><a href=""><i class="fa-regular fa-user" style="color: white;"></i></a>
                                <ul class="menu-con">
                                    <li><a href="./capnhattaikhoan.php">Xin chào <?= $hovaten ?></a></li>
                                    <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                                    <li><a href="./doimk.php">Đổi mật khẩu</a></li>
                                    <?php if ($vaitro == 'admin') { ?>
                                        <li><a href="./admin/index.php">Đăng nhập Admin</a></li>
                                    <?php } ?>
                                    <li><a href="index.php?act=dangxuat">Đăng xuất</a></li>
                                </ul>
                            </li>

                        <?php

                        } else {


                        ?>
                            <li><a href=""><i class="fa-regular fa-user" style="color: white;"></i></a>
                                <ul class="menu-con">
                                    <li><a href="./dangnhap.php">Đăng nhập</a></li>
                                    <li><a href="./dangky.php">Đăng ký</a></li>
                                </ul>
                            </li>
                    </ul>
                <?php } ?>
                </div>
                <div class="giohang">
                    <a href="index.php?act=themgiohang"><i class="fa-solid fa-cart-shopping" style="color: white;"></i></a>
                </div>
            </div>
        </header>
    </div>
</body>

</html>