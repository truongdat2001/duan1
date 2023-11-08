<?php

session_start();

if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
    $vaitro = $_SESSION['user']['vaitro'];
    if (($vaitro == 'admin')) {
        include "../DAO/pdo.php";
        include "../DAO/danhmuc.php";
        include "../DAO/sanpham.php";
        include "../DAO/taikhoan.php";
        include "../DAO/binhluan.php";
        include "../DAO/giohang.php";
        include "header.php";
        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                    //cho trang danh mục
                case 'add_dm':
                    if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                        $tenloai = $_POST['tenloai'];
                        insert_danhmuc($tenloai);
                        $thongbao = "Thêm thành công";
                    }
                    include "danhmuc/add_dm.php";
                    break;

                case 'list_dm':
                    $list_dm = loadall_danhmuc();
                    include "danhmuc/list_dm.php";
                    break;

                case 'xoa_dm':
                    if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                        delete_danhmuc($id_dm);
                        $thongbao = "Xóa thành công";
                    }
                    $list_dm = loadall_danhmuc();
                    include "danhmuc/list_dm.php";
                    break;

                case 'sua_dm':
                    if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                        $update_dm = loadone_danhmuc($_GET['id_dm']);
                    }
                    include "danhmuc/update_dm.php";
                    break;

                case 'update_dm':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $tenloai = $_POST['tenloai'];
                        $id_dm = $_POST['id_dm'];
                        update_danhmuc($tenloai, $id_dm);
                        $thongbao = "Cập nhật thành công";
                    }
                    $list_dm = loadall_danhmuc();
                    include "danhmuc/list_dm.php";
                    break;

                    //cho trang sản phẩm
                case 'add_sp':
                    if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                        $id_dm = $_POST['id_dm'];
                        $tensp = $_POST['tensp'];
                        $dongia = $_POST['dongia'];
                        $hinh = $_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                        $mota = $_POST['mota'];
                        insert_sanpham($tensp, $dongia, $hinh, $mota, $id_dm);
                        $thongbao = "Thêm thành công";
                    }
                    $list_dm = loadall_danhmuc();
                    include "sanpham/add_sp.php";
                    break;

                case 'list_sp':
                    if (isset($_POST['listok']) && ($_POST['listok'])) {
                        $kyw = $_POST['kyw'];
                        $id_dm = $_POST['id_dm'];
                    } else {
                        $kyw = "";
                        $id_dm = 0;
                    }
                    $list_dm = loadall_danhmuc();
                    $list_sp = loadall_sanpham($kyw, $id_dm);
                    include "sanpham/list_sp.php";
                    break;

                case 'xoa_sp':
                    if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                        delete_sanpham($_GET['id_sp']);
                        $thongbao = "Xóa thành công";
                    }
                    $list_sp = loadall_sanpham("", 0);
                    include "sanpham/list_sp.php";
                    break;

                case 'sua_sp':
                    if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                        $update_sp = loadone_sanpham($_GET['id_sp']);
                    }
                    $list_dm = loadall_danhmuc();
                    include "sanpham/update_sp.php";
                    break;

                case 'update_sp':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $id_sp = $_POST['id_sp'];
                        $id_dm = $_POST['id_dm'];
                        $tensp = $_POST['tensp'];
                        $dongia = $_POST['dongia'];
                        $hinh = $_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                        $mota = $_POST['mota'];
                        update_sanpham($id_sp, $tensp, $dongia, $hinh, $mota, $id_dm);
                        $thongbao = "Cập nhật thành công";
                    }
                    $list_dm = loadall_danhmuc();
                    $list_sp = loadall_sanpham("", 0);
                    include "sanpham/list_sp.php";
                    break;

                case 'ds_users':
                    $list_users = loadall_users();
                    include "nguoidung/list_users.php";
                    break;

                case 'ds_cmt':
                    $list_binhluan = loadall_binhluan(0);
                    include "binhluan/list_binhluan.php";
                    break;

                case 'xoa_binhluan':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        delete_binhluan($_GET['id']);
                        $thongbao = "Xóa thành công";
                    }
                    $list_binhluan = loadall_binhluan(0);
                    include "binhluan/list_binhluan.php";
                    break;

                case 'listbill':
                    if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    $listbill = loadall_bill($kyw, 0);
                    include "danhsachdonhang/listbill.php";
                    break;

                case 'thongke':
                    $listthongke = loadall_thongke();
                    include "thongke/listthongke.php";
                    break;

                case 'bieudo':
                    $listthongke = loadall_thongke();
                    include "thongke/bieudo.php";
                    break;

                case 'vebanhang':
                    header('location: ../index.php');
                    break;

                case 'thoat':
                    session_unset();
                    header('location: ../index.php');
                    break;

                default:
                    include "home.php";
                    break;
            }
        } else {
            include "home.php";
        }
        include "footer.php";
    } else{
        header('location: ../index.php');
    }    
    
} else {
    header('location: ../index.php');
} 

