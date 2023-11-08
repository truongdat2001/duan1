<?php
session_start();
include "./DAO/pdo.php";
include "./DAO/taikhoan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài khoản</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/capnhattaikhoan.css">
    <script src="https://kit.fontawesome.com/1974627856.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-edit-user">
        <header class="header-tong-edit-user">
            <div class="header-edit-user">
                <div class="logo">
                    <a href="index.php"><img src="./img/logo.jpg" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <?php
            if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                extract($_SESSION['user']);
            }
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $hovaten = $_POST['hovaten'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $phone = $_POST['phone'];
                $id = $_POST['id'];

                update_taikhoan($id, $hovaten, $username, $password, $email, $diachi, $phone);
                $_SESSION['user'] = check_taikhoan($username, $password);
                header("location: capnhattaikhoan.php");
            }

            if(isset($_POST['home'])&&($_POST['home'])){
                header('location: ./index.php');
            }
            ?>
            <form class="form" action="" method="post">
                <h3 class="textcapnhat">Cập nhật tài khoản</h3>

                <div class="form-group">
                    <label for="hovaten">Họ và tên: </label>
                    <input type="text" name="hovaten" id="hovaten" value="<?= $hovaten ?>">
                </div>

                <div class="form-group">
                    <label for="username">Tên đăng nhập: </label>
                    <input class="ten" type="text" name="username" id="username" value="<?= $username ?>">
                </div>

                <div class="form-group">
                    <label class="form-group" for="password">Mật khẩu:</label>
                    <input class="mk" type="password" name="password" id="password" value="<?= $password ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" value="<?= $email ?>">
                </div>

                <div class="form-group">
                    <label for="diachi">Địa chỉ: </label>
                    <input type="diachi" name="diachi" id="diachi" value="<?= $diachi ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại: </label>
                    <input type="phone" name="phone" id="phone" value="<?= $phone ?>">
                </div>

                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="capnhat" type="submit" name="capnhat" value="Cập nhật">
                <input class="home" type="submit" name="home" value="Về trang chủ">
            </form>
        </div>
    </div>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>

</html>