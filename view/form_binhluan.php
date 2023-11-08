<?php
session_start();
include "../DAO/pdo.php";
include "../DAO/binhluan.php";
$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .content_binhluan .box_binhluan {
            border: 1px solid black;
            border-top: none;
            padding: 10px 4%;
        }

        .content_binhluan .box_binhluan ul li {
            list-style: disc;
            padding: 5px 0;
        }

        .content_binhluan .box_binhluan ul li .noidungbinhluan{
            width: 500px;
            word-wrap: break-word;
        }

        .content_binhluan .box_binhluan ul li .noidungbinhluan .hovaten {
            font-size: 15px;
            font-weight: bold;
        }

        .content_binhluan .box_binhluan ul li .noidungbinhluan .noidung {
            display: flex;
            justify-content: space-between;

            padding-bottom: 10px;
            border-bottom: 1px solid rgba(207, 205, 205, 0.84);
        }

        .content_binhluan .box_binhluan ul li:last-child .noidungbinhluan .noidung {
            border-bottom: none;
        }

        .content_binhluan .box_binhluan ul li .noidungbinhluan .noidung .hienthinoidung p {
            padding: 10px 0 0 10px;
            width: 10px;
            word-wrap: break-word;
        }

        .content_binhluan .box_binhluan .nhap_binhluan textarea {
            outline: none;
            padding: 10px 10px;
            font-size: 15px;
            box-sizing: border-box;
        }

        .content_binhluan .box_binhluan .nhap_binhluan input {
            width: 56%;
            padding: 10px 0;
            font-size: 20px;
            cursor: pointer;
            background-color: rgb(71, 210, 103);
        }

        .content_binhluan .box_binhluan .nhap_binhluan input:hover {
            background-color: rgb(0, 185, 44);
        }

        .content_binhluan .box_binhluan .nhap_binhluan .dangnhap_binhluan {
            display: flex;
            font-size: 20px;
            font-weight: bold;
            color: red;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px 0;
            background-color: rgb(225, 189, 189);
        }
    </style>
</head>

<body>
    <article class="content_binhluan">
        <div class="text_binhluan">
            <h2>BÌNH LUẬN</h2>
        </div>
        <div class="box_binhluan">
            <ul>
                <?php
                // echo $idpro;
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<li>
                            <div class="noidungbinhluan">
                                <p class="hovaten">' . $hovaten . '</p>
                                <div class="noidung">
                                    <p class="hienthinoidung">' . $noidung . '</p>
                                    <p>' . $ngaybinhluan . '</p>
                                </div>
                            </div>
                        </li>';
                }
                ?>
            </ul>
            <div class="nhap_binhluan">
                <?php
                if (isset($_SESSION['user']) != "") {
                    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                        <input type="hidden" name="idpro" value="' . $idpro . '">
                        <textarea name="noidung" id="noidung" cols="70" rows="4" placeholder="Nhập bình luận của bạn tại đây."></textarea> <br>
                        <input type="submit" name="gui" value="Gửi">
                    </form>';
                } else {
                    echo '<a class="dangnhap_binhluan" href="./dangnhap.php">Đăng nhập để bình luận</a>';
                }
                ?>
            </div>
        </div>
        <?php
        if (isset($_POST['gui']) && ($_POST['gui'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $hovaten = $_SESSION['user']['hovaten'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngaybinhluan = date('H:i:s d/m/Y');
            insert_binhluan($hovaten, $iduser, $idpro, $noidung, $ngaybinhluan);
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </article>

    <?php

    // include "./cuoitrang.php";


    ?>
</body>

</html>