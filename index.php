<?php
include "DAO/pdo.php";
include "DAO/sanpham.php";
include "DAO/danhmuc.php";
include "DAO/giohang.php";
include "view/dautrang.php";
include "view/menu.php";
include "bientong.php";

if (!isset($_SESSION['donhang'])) {
    $_SESSION['donhang'] = [];
}

$sp_new = loadall_sanpham_home();
$ds_dm = loadall_danhmuc();
$ds_top8 = loadall_sanpham_top8();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'lienhe':
            include "view/lienhe.php";
            break;

        case 'sanpham_ct':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $onesp = loadone_sanpham($_GET['id_sp']);
                include "view/chitietsp.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'timsp':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
                $tukhoa = "Từ bạn tìm là: ";
            } else {
                $kyw = "";
                loadtatca_sp();
            }

            if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                $id_dm = $_GET['id_dm'];
            } else {
                $id_dm = 0;
            }
            $ds_sp = loadall_sanpham($kyw, $id_dm);
            $namedm = load_tendm($id_dm);
            include "view/timsp.php";
            break;

        case 'sanpham_dm':
            if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                $id_dm = $_GET['id_dm'];
            } else {
                $id_dm = 0;
            }
            $ds_sp = loadall_sanpham("", $id_dm);
            $namedm = load_tendm($id_dm);
            include "view/sanpham.php";
            break;

        case 'themgiohang':
            if (isset($_POST['themgiohang']) && ($_POST['themgiohang'])) {
                $id_sp = $_POST['id_sp'];
                $ten_sp = $_POST['ten_sp'];
                $hinh = $_POST['hinh'];
                $don_gia = $_POST['don_gia'];
                $so_luong = 1;
                $thanhtien = $so_luong * $don_gia;
                $spadd = [$id_sp, $ten_sp, $hinh, $don_gia, $so_luong, $thanhtien];
                array_push($_SESSION['donhang'], $spadd);
            }
            include "giohang/giohang.php";
            break;

        case 'xoagiohang':
            if (isset($_GET['id-cart'])) {
                array_splice($_SESSION['donhang'], $_GET['id-cart'], 1);
            } else {
                $_SESSION['donhang'] = [];
            }
            // include "giohang/giohang.php";
            header('location: index.php?act=themgiohang');
            break;

        case 'bill':
            include "./giohang/bill.php";
            break;

        case 'hoanthanhdathang':
            if ($_SESSION['donhang'] != []) {
                if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                    if (isset($_SESSION['user'])) {
                        $iduser = $_SESSION['user']['id'];
                    } else {
                        $id = 0;
                    }
                    $hovaten = $_POST['hovaten'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $pttt = $_POST['pttt'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang = date('H:i:s d/m/Y');
                    $tongcong = tongcong();

                    /*
                    You need to ensure that a valid user id is always passed to the insert_giohang function. 
                    If a user is not logged in (i.e., $_SESSION['user']['id'] is not set), 
                    you should not allow them to add items to the cart. hahah
                    */
                    if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
                        // Redirect to login page or show an error message
                        header('Location: dangnhap.php');
                        exit();
                    }

                    $idbill = insert_bill($iduser, $hovaten, $diachi, $email, $phone, $pttt, $ngaydathang, $tongcong);

                    foreach ($_SESSION['donhang'] as $giohang) {
                        insert_giohang($iduser, $giohang[0], $giohang[2], $giohang[1], $giohang[3], $giohang[4], $giohang[5], $idbill);
                    }

                    $_SESSION['donhang'] = [];
                }
                $bill = loadone_bill($idbill);
                $billct = loadall_giohang($idbill);
                include "./giohang/hoanthanhdathang.php";
            } else {
                header('location: index.php?act=bill');
            }

            break;

        case 'mybill':
            $listbill = loadall_bill("", $_SESSION['user']['id']);
            include "./giohang/donhangcuatoi.php";
            break;

        case 'dangxuat':
            session_unset();
            header('location: index.php');
            break;

        case 'tintuc':
            include "view/tintuc.php";
            break;

        case 'hoidap':
            include "view/hoidap.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/cuoitrang.php";
