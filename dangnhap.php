<?php
session_start();
include "./DAO/pdo.php";
include "./DAO/taikhoan.php";

if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_taikhoan = check_taikhoan($username, $password);
    if (is_array($check_taikhoan)) {
        $_SESSION['user'] = $check_taikhoan;
        header("location: index.php");
    }
    if ($username || $password != $check_taikhoan) {
        $thongbao = "Tài khoản không tồn tại. Vui Lòng kiểm tra hoặc đăng ký!";
    }
    if ($password != $check_taikhoan) {
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
                    <a href="index.php"><img src="img/logo.png" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <form class="form" action="" method="post">
                <h3 class="textdangnhap">Chào bạn! Hãy đăng nhập để tiếp tục!</h3>
                <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input class="tendangnhap" type="text" name="username" id="username">
                    <p id="checkUsername"></p>
                </div>

                <div class="form-group">
                    <label class="form-group" for="password">Mật khẩu:</label>
                    <input class="mkdangnhap" type="password" name="password" id="password">
                    <p id="checkMk"></p>
                </div>
                <?php
                if (isset($thongbao)) {
                    echo '<h5 style="color:red">' . $thongbao . '</h5>';
                }
                ?>

                <input onclick="return checkForm()" class="dangnhap" type="submit" name="dangnhap" value="Đăng nhập">
                <div class="footer-form">
                    <a href="./quenmk.php">Quên mật khẩu?</a>
                    <p>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký ngay?</a></p>
                </div>
                <p class="quaylai">Trở về trang chủ: <a href="./index.php">Tại đây</a></p>
            </form>
        </div>
    </div>

    <script>
        function checkForm() {
            var username = document.getElementById("username");
            var password = document.getElementById("password");

            if (username.value != "") {
                if (username.value.length < 4) {
                    document.getElementById("checkUsername").innerText = "Bạn phải nhập từ 4 ký tự";
                    document.getElementById("checkUsername").style.color = "red";
                    document.getElementById("username").style.border = "1px red solid";
                    username.focus();
                    return false;
                } else {
                    document.getElementById("checkUsername").innerText = "";
                    document.getElementById("username").style.border = "2px green solid";
                }
            } else {
                document.getElementById("checkUsername").innerText = "Bạn không được để trống. Vui lòng nhập tên đăng nhập";
                document.getElementById("checkUsername").style.color = "red";
                document.getElementById("username").style.border = "1px red solid";
                username.focus();
                return false;
            }

            if (password.value != "") {
                if (password.value.length < 3) {
                    document.getElementById("checkMk").innerText = "Bạn phải nhập từ 3 ký tự";
                    document.getElementById("checkMk").style.color = "red";
                    document.getElementById("password").style.border = "1px red solid";
                    password.focus();
                    return false;
                } else {
                    document.getElementById("checkMk").innerText = "";
                    document.getElementById("password").style.border = "2px green solid";
                }
            } else {
                document.getElementById("checkMk").innerText = "Bạn không được để trống. Vui lòng nhập mật khẩu.";
                document.getElementById("checkMk").style.color = "red";
                document.getElementById("password").style.border = "1px red solid";
                password.focus();
                return false;
            }
        }
    </script>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>

</html>