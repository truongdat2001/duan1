<?php
function hienthi_spgiohang($xoa)
{
    global $hinh_path;
    $tong = 0;
    $i = 0;
    $vnd = " VNĐ";
    if ($xoa == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td = '<td><a href="index.php?act=xoagiohang&id-cart=' . $i . '"><input type="button" value="Xóa"></a></td>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = "";
        $xoasp_td = "";
        $xoasp_td2 = "";
    }
    echo '<tr>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>';

    foreach ($_SESSION['donhang'] as $cart) {
        $hinh = $hinh_path . $cart[2];
        $thanhtien = $cart[3] * $cart[4];
        $tong = $tong + $thanhtien;
        if ($xoa == 1) {
            $xoasp_th = '<th>Thao tác</th>';
            $xoasp_td = '<td><a href="index.php?act=xoagiohang&id-cart=' . $i . '"><input type="button" value="Xóa"></a></td>';
            $xoasp_td2 = '<td></td>';
        } else {
            $xoasp_th = "";
            $xoasp_td = "";
            $xoasp_td2 = "";
        }
        echo '<tr>
                <td>' . $cart[1] . '</td>
                <td><img src="' . $hinh . '" width="100px" height="100px" alt=""></td>
                <td>' . $cart[3] . ' ' . $vnd . '</td>
                <td>' . $cart[4] . '</td>
                <td>' . $thanhtien . ' ' . $vnd . '</td>
                ' . $xoasp_td . '
            </tr>';
        $i += 1;
    }
    echo '<tr>
            <td class="tongtien" colspan="4">Tổng tiền: </td>
            <td class="tien">' . $tong . ' ' . $vnd . '</td>
            ' . $xoasp_td2 . '
        </tr>';
}

function billct($listbill)
{
    global $hinh_path;
    $tong = 0;
    $i = 1;
    $vnd = " VNĐ";
    echo '<tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';

    foreach ($listbill as $cart) {
        $hinh = $hinh_path . $cart['hinh'];
        $tong = $tong + $cart['gia'];
        echo '<tr>
                <td>' . $i . '</td>
                <td>' . $cart['name'] . '</td>
                <td><img src="' . $hinh . '" width="100px" height="100px" alt=""></td>
                <td>' . $cart['gia'] . ' ' . $vnd . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $cart['thanhtien'] . ' ' . $vnd . '</td>
            </tr>';
        $i += 1;
    }
    echo '<tr>
            <td class="tongtien" colspan="5">Tổng tiền: </td>
            <td class="tien">' . $tong . ' ' . $vnd . '</td>
        </tr>';
}

function tongcong()
{
    $tong = 0;
    foreach ($_SESSION['donhang'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tong = $tong + $thanhtien;
    }
    return $tong;
}

function insert_bill($iduser,$hovaten, $diachi, $email, $phone, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into bill (iduser, bill_hovaten, bill_diachi, bill_email, bill_phone, bill_pttt, ngaydathang, tongcong) values ('$iduser','$hovaten','$diachi','$email','$phone','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_giohang($iduser, $idpro, $hinh, $name, $gia, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into giohang (iduser, idpro, hinh, name,	gia, soluong, thanhtien, idbill) values ('$iduser','$idpro','$hinh','$name','$gia','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_giohang($idbill)
{
    $sql = "select * from giohang where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_giohang_soluong($idbill)
{
    $sql = "select * from giohang where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function loadall_bill($kyw="",$iduser)
{
    $sql = "select * from bill where 1";
    if($iduser>0) $sql.=" and iduser=" . $iduser;
    if($kyw!="") $sql.=" and id like '%" . $kyw."%'";
    $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_trangthaidonhang($n){
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới.";
            break;

        case '1':
            $tt = "Đang xử lý.";
            break;

        case '2':
            $tt = "Đang giao hàng";
            break;

        case '3':
            $tt = "Hoàn tất";
            break;
        
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

function loadall_thongke() {
    $sql = "select danhmuc.id_dm as iddm ,danhmuc.ten_dm as tendm, count(sanpham.id_sp) as countsp, min(sanpham.don_gia) as mingia, max(sanpham.don_gia) as maxgia, avg(sanpham.don_gia) as giatrungbinh";
    $sql.=" from sanpham left join danhmuc on danhmuc.id_dm=sanpham.id_dm";
    $sql.=" group by danhmuc.id_dm order by danhmuc.id_dm desc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}

