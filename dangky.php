<?php
include "./DAO/pdo.php";
include "./DAO/taikhoan.php";
session_start();
$hovaten = $username = $password = $nhaplai_password = $email = '';
$checkmk = true;
if (isset($_POST['dangky']) && ($_POST['dangky'])) {
    $hovaten = $_POST['hovaten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nhaplai_password = $_POST['nhaplai_password'];
    $email = $_POST['email'];
    if (($_POST['password']) == ($_POST['nhaplai_password'])) {
        insert_taikhoan($hovaten, $username, $password, $email);
        header('location: dangnhap.php');
    } else {
        $checkmk = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dangky.css">
    <script src="https://kit.fontawesome.com/1974627856.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-dangky">
        <header class="header-tong-dangky">
            <div class="header-dangky">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.jpg" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <form class="form" action="" method="post">
                <h3 class="textdangky">Đăng ký</h3>

                <div class="form-group">
                    <label for="hovaten">Họ và tên: </label>
                    <input type="text" name="hovaten" id="hovaten" value="<?= $hovaten ?>">
                </div>

                <div class="form-group">
                    <label for="username">Tên đăng nhập: </label>
                    <input class="tendangky" type="text" name="username" id="username" value="<?= $username ?>">
                </div>

                <div class="form-group">
                    <label class="form-group" for="password">Mật khẩu: <?= $checkmk ? '' : '<span style="color: red; font-size: 16px;">Mật khẩu không khớp!</span>' ?></label>
                    <input class="mkdangnhap" type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <label class="form-group" for="nhaplai_password">Nhập lại mật khẩu: </label>
                    <input class="nhaplai_mkdangky" type="password" name="nhaplai_password" id="nhaplai-password">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" value="<?= $email ?>">
                </div>
                <?php
                if (isset($thongbao)) {
                    echo '<h5 style="color:red">' . $thongbao . '</h5>';
                }
                ?>

                <input class="dangky" type="submit" name="dangky" value="Đăng ký">
            </form>
        </div>
    </div>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>

</html>