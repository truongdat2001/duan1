<?php
    session_start();
    include "./DAO/pdo.php";
    include "./DAO/taikhoan.php";

    if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check_taikhoan = check_taikhoan($username, $password);
        if(is_array($check_taikhoan)){
            $_SESSION['user'] = $check_taikhoan;
            header("location: index.php");
        }
        if($username || $password != $check_taikhoan){
            $thongbao = "Tài khoản không tồn tại. Vui Lòng kiểm tra hoặc đăng ký!";
        }
        if($password!=$check_taikhoan){
            $thongbao = "Mật khẩu sai.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dangnhap.css">
    <script src="https://kit.fontawesome.com/1974627856.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-dangnhap">
        <header class="header-tong-dangnhap">
            <div class="header-dangnhap">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.jpg" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <form class="form" action="" method="post">
                <h3 class="textdangnhap">Chào bạn! Hãy đăng nhập để tiếp tục!</h3>
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input class="tendangnhap" type="text" name="username" id="username">
                </div>

                <div class="form-group">
                    <label class="form-group" for="password">Mật khẩu:</label>
                    <input class="mkdangnhap" type="password" name="password" id="password">
                </div>
                <?php
                    if (isset($thongbao)) {
                        echo '<h5 style="color:red">' . $thongbao . '</h5>';
                    }
                    ?>

                <input class="dangnhap" type="submit" name="dangnhap" value="Đăng nhập">
                <div class="footer-form">
                    <a href="./quenmk.php">Quên mật khẩu?</a>
                    <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký ngay?</a></p>
                </div>
                <p class="quaylai">Trở về trang chủ: <a  href="./index.php">Tại đây</a></p>
            </form>
        </div>
    </div>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>
</html>