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
        if ($email == check_email($email)) {
            insert_taikhoan($hovaten, $username, $password, $email);
            header('location: dangnhap.php');
        } else {
            $thongbao = "Email đã tồn tồn tại trên hệ thống.";
        }
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
                    <a href="index.php"><img src="img/logo.png" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <form class="form" action="" method="post">
                <h3 class="textdangky">Đăng ký</h3>

                <div class="form-group">
                    <label for="hovaten">Họ và tên: </label>
                    <input type="text" name="hovaten" id="hovaten" value="<?= $hovaten ?>">
                    <p id="checkHovaten"></p>
                </div>

                <div class="form-group">
                    <label for="username">Tên đăng nhập: </label>
                    <input class="tendangky" type="text" name="username" id="username" value="<?= $username ?>">
                    <p id="checkUsername"></p>
                </div>

                <div class="form-group">
                    <label class="form-group" for="password">Mật khẩu: <?= $checkmk ? '' : '<span style="color: red; font-size: 16px;">Mật khẩu không khớp!</span>' ?></label>
                    <input class="mkdangnhap" type="password" name="password" id="password">
                    <p id="checkMk"></p>
                </div>

                <div class="form-group">
                    <label class="form-group" for="nhaplai_password">Nhập lại mật khẩu: </label>
                    <input class="nhaplai_mkdangky" type="password" name="nhaplai_password" id="nhaplai_password">
                    <p id="checkMknhaplai"></p>
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" value="<?= $email ?>">
                    <p id="checkEmail"></p>
                </div>
                <?php
                if (isset($thongbao)) {
                    echo '<h5 style="color:red">' . $thongbao . '</h5>';
                }
                ?>

                <input onclick="return checkForm()" class="dangky" type="submit" name="dangky" value="Đăng ký">

                <div class="footer-form">
                    <p>Bạn đã có tài khoản. <a href="dangnhap.php">Đăng nhập ngay</a></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        function checkForm() {
            var hovaten = document.getElementById("hovaten");
            var username = document.getElementById("username");
            var password = document.getElementById("password");
            var nhaplai_password = document.getElementById("nhaplai_password");
            var email = document.getElementById("email");

            if (hovaten.value != "") {
                if (hovaten.value.length < 4 || hovaten.value.length > 35) {
                    document.getElementById("checkHovaten").innerText = "Bạn phải nhập từ 4-30 kí tự";
                    document.getElementById("checkHovaten").style.color = "red";
                    document.getElementById("hovaten").style.border = "1px red solid";
                    hovaten.focus();
                    return false;
                } else {
                    document.getElementById("checkHovaten").innerText = "";
                    document.getElementById("hovaten").style.border = "2px green solid";
                }
            } else {
                document.getElementById("checkHovaten").innerText = "Bạn không được để trống. Vui lòng nhập họ và tên.";
                document.getElementById("checkHovaten").style.color = "red";
                document.getElementById("hovaten").style.border = "1px red solid";
                hovaten.focus();
                return false;
            }

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
                if (password.value.length < 4) {
                    document.getElementById("checkMk").innerText = "Bạn phải nhập từ 4 ký tự";
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

            if (nhaplai_password.value == "") {
                document.getElementById("checkMknhaplai").innerText = "Bạn không được để trống.";
                document.getElementById("checkMknhaplai").style.color = "red";
                document.getElementById("nhaplai_password").style.border = "1px red solid";
                nhaplai_password.focus();
                return false;
            }

            if (email.value == "") {
                document.getElementById("checkEmail").innerText = "Bạn không được để trống. Vui lòng nhập email.";
                document.getElementById("checkEmail").style.color = "red";
                document.getElementById("email").style.border = "1px red solid";
                email.focus();
                return false;
            }
            return true;
        }
    </script>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>

</html>