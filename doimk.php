<?php
session_start();
include "./DAO/pdo.php";
include "./DAO/taikhoan.php";
if (isset($_SESSION['user']) == false) {
    header('location: ./dangnhap.php');
    exit();
} else {
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        extract($_SESSION['user']);
    }
    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
        $mkcu = $_POST['mkcu'];
        $password_moi = $_POST['password_moi'];
        $password_nhaplai = $_POST['password_nhaplai'];
        $id = $_POST['id'];
        $check_taikhoan = check_matkhau($username, $mkcu);
        if ($mkcu != $check_taikhoan) {
            $thongbao = "Mật khẩu cũ sai";
            // echo $check_taikhoan;
        } else {
            doi_matkhau($id, $password_moi);
            $thongbao = "Cập nhật thành công.";
        }
        if ($password_moi != $password_nhaplai) {
            $thongbao = "Mật khẩu không khớp. Xin nhập lại!!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật mật khẩu</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/1974627856.js" crossorigin="anonymous"></script>
    <style>
        .container-capnhatmk {
            text-decoration: none;
            background-color: #F3F3F3;
            min-height: 700px;
        }

        .header-tong-capnhatmk {
            text-align: center;
            background-color: var(--tone-chudao);
        }

        .header-tong-capnhatmk .header-capnhatmk {
            align-items: center;
        }

        .header-tong-capnhatmk .header-capnhatmk .logo img {
            border-radius: 10px;
            height: 100px;
            margin: 5px 0;
        }

        .container-capnhatmk .form-tong {
            background-color: #72D6E8;
            width: 40%;
            border: 1px solid #72D6E8;
            border-radius: 20px;
            margin: 2% 30%;
        }

        .container-capnhatmk .form-tong .form {
            padding: 20px 40px 40px 40px;
        }

        .container-capnhatmk .form-tong .form .textcapnhat {
            text-align: center;
            font-size: 35px;
            margin-bottom: 30px;
        }

        .container-capnhatmk .form-tong .form label {
            font-size: 20px;
        }

        .container-capnhatmk .form-tong .form input {
            height: 40px;
            width: 100%;
            margin: 5px 0;
            padding: 0 10px;
            font-size: 16px;
            outline: none;
            border: none;
            border-radius: 10px;
        }

        .container-capnhatmk .form-tong .form .capnhat {
            background-color: #5085EE;
            color: white;
            width: 60%;
            font-size: 20px;
            margin: 20px 20%;
            font-weight: bold;
            cursor: pointer;

        }

        .container-capnhatmk .form-tong .form .capnhat:hover {
            background-color: green;
        }

        .container-capnhatmk .form-tong .form .thongbao {
            text-align: center;
            color: red;
            font-size: 20px;
            padding: 10px 0 0;
        }

        .container-capnhatmk .form-tong .form .quaylai {
            margin: 10px 20px 0;
            text-align: center;
            font-size: 20px;
        }

        .container-capnhatmk .form-tong .form .quaylai>a {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="container-capnhatmk">
        <header class="header-tong-capnhatmk">
            <div class="header-capnhatmk">
                <div class="logo">
                    <a href="index.php"><img src="./img/logo.png" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <form class="form" action="" method="post">
                <h3 class="textcapnhat">Đổi mật khẩu</h3>

                <div class="form-group">
                    <label class="form-group" for="username">Tên dăng nhập:</label>
                    <input class="tendangnhap" type="text" name="username" id="username" value="<?= $username ?>" disabled>
                </div>

                <div class="form-group">
                    <label class="form-group" for="mkcu">Mật khẩu cũ:</label>
                    <input class="mkcu" type="password" name="mkcu" id="mkcu">
                </div>

                <div class="form-group">
                    <label class="form-group" for="password_moi">Mật khẩu mới:</label>
                    <input class="mk" type="password" name="password_moi" id="password_moi">
                </div>

                <div class="form-group">
                    <label class="form-group" for="password_nhaplai">Nhập lại mật khẩu mới:</label>
                    <input class="mk" type="password" name="password_nhaplai" id="password_nhaplai">
                </div>

                <?php
                if (isset($thongbao)) {
                    echo ' <h5 class="thongbao">' . $thongbao . '</h5>';
                }
                ?>

                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="capnhat" type="submit" name="capnhat" value="Cập nhật">
                <p class="quaylai">Trở về trang chủ: <a href="./index.php">Tại đây</a></p>
            </form>
        </div>
    </div>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>

</html>

<!-- if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $mkcu = $_POST['mkcu'];
                    $password_moi = $_POST['password_moi'];
                    $password_nhaplai = $_POST['password_nhaplai'];
                    $id = $_POST['id'];
                    // $password == $mkcu;
                    if ($mkcu != $password) {
                        $thongbao = "Mật khẩu cũ sai";
                        if ($password_moi != $password_nhaplai) {
                            $thongbao = "Mật khẩu không khớp. Xin nhập lại!!";
                        }
                    } else {
                        doi_matkhau($id, $password_moi);
                        $_SESSION['password'] = $password_moi;
                        $thongbao = "Cập nhật thành công.";
                    }
                } -->