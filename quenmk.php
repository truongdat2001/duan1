<?php
if (isset($_POST['gui']) == true) {
    $email = $_POST['email'];

    if ($email == "") {
        $thongbao = "Hãy nhập email";
    } else {
        $conn = new PDO("mysql:host=localhost;dbname=du_an_mot;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->rowCount();
        if ($count == 0) {
            $thongbao = "Không tìm thấy tài khoản tương ứng với email này.";
        } else {
            $matkhaumoi = substr(md5(rand(0, 999999)), 0, 8);
            $sql = "update users SET password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql); //Tao 1 prepare stement
            $stmt->execute([$matkhaumoi, $email]);
            sendMail($matkhaumoi, $email);
            // $xacnhan = "Đã gửi mail.";
            header('location: ./dangnhap.php');
        }
    }
}
?>

<?php
function sendMail($matkhaumoi, $email)
{
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'dattruong792001@gmail.com'; // SMTP username
        $mail->Password = 'kxbm iqua tjpj upsa';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('dattruong792001@gmail.com', 'ÉN DESIGN');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thiết lập lại mật khẩu của tài khoản khách hàng ';
        $noidungthu = "<p>Anh/chị đã yêu cầu đổi mật khẩu tại ÉN DESIGN.</p>
        <p>Mật khẩu mới của Anh/chị là: {$matkhaumoi}</p>";
        $mail->Body = $noidungthu;
        $mail->send();
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/1974627856.js" crossorigin="anonymous"></script>
    <style>
        .container-quenmk {
            text-decoration: none;
            background-color: #F3F3F3;
            min-height: 500px;
        }

        .header-tong-quenmk {
            text-align: center;
            background-color: var(--tone-chudao);
        }

        .header-tong-quenmk .header-quenmk {
            align-items: center;
        }

        .header-tong-quenmk .header-quenmk .logo img {
            border-radius: 10px;
            height: 100px;
            margin: 5px 0;
        }

        .container-quenmk .form-tong {
            background-color: #72D6E8;
            width: 40%;
            border: 1px solid #72D6E8;
            border-radius: 20px;
            margin: 2% 30%;
        }

        .container-quenmk .form-tong .form {
            padding: 20px 40px 40px 40px;
        }

        .container-quenmk .form-tong .form .textquenmk {
            text-align: center;
            font-size: 35px;
            margin-bottom: 30px;
        }

        .container-quenmk .form-tong .form label {
            font-size: 20px;
        }

        .container-quenmk .form-tong .form input {
            height: 40px;
            width: 100%;
            margin: 5px 0;
            padding: 0 10px;
            font-size: 16px;
            outline: none;
            border: none;
            border-radius: 10px;
        }

        .container-quenmk .form-tong .form .laylai {
            background-color: #5085EE;
            width: 60%;
            text-align: center;
            line-height: 2;
            color: white;
            font-size: 20px;
            margin: 20px 20%;
            font-weight: bold;
            cursor: pointer;
        }

        .container-quenmk .form-tong .form .laylai:hover {
            background-color: green;
        }

        .container-quenmk .form-tong .form p {
            text-align: center;
        }

        .container-quenmk .form-tong .form .form-group h5 {
            color: red;
            font-size: 15px;
        }

        .container-quenmk .form-tong .form p>a {
            color: red;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div class="container-quenmk">
        <header class="header-tong-quenmk">
            <div class="header-quenmk">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.png" alt="logo" style="width: 150px"></a>
                </div>
            </div>
        </header>

        <div class="form-tong">
            <form class="form" action="" method="post">
                <h3 class="textquenmk">Quên mật khẩu</h3>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email">
                    <?php
                    if (isset($thongbao)) {
                        echo '<h5>' . $thongbao . '</h5>';
                    }
                    if (isset($xacnhan)) {
                        echo '<h5>' . $xacnhan . '</h5>';
                    }
                    ?>
                </div>

                <input class="laylai" type="submit" name="gui" value="Lấy lại mật khẩu">
                <p>Trở về đăng nhập <a href="dangnhap.php">Tại đây.</a></p>
            </form>
        </div>
    </div>

    <?php
    include './view/cuoitrang.php';
    ?>
</body>

</html>