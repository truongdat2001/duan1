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

    $sanpham = array();
    /*
    $cart[1] là mã sản phẩm.
    $cart[2] là đường dẫn đến hình ảnh sản phẩm.
    $cart[3] là giá bán của sản phẩm.
    $cart[4] là số lượng sản phẩm được mua.
    */
    foreach ($_SESSION['donhang'] as $cart) {
        if (array_key_exists($cart[1], $sanpham)) {
            $sanpham[$cart[1]]['soluong'] += $cart[4];
            $sanpham[$cart[1]]['thanhtien'] += $cart[3] * $cart[4];
        } else {
            $sanpham[$cart[1]] = array(
                'hinh' => $hinh_path . $cart[2],
                'dongia' => $cart[3],
                'soluong' => $cart[4],
                'thanhtien' => $cart[3] * $cart[4]
            );
        }
    }

    foreach ($sanpham as $ten => $sp) {
        $tong += $sp['thanhtien'];
        $soTienDinhDang = number_format($sp['dongia'], 0, ',', '.');
        $dinhDangSoTien = number_format($sp['thanhtien'], 0, ',', '.');
        echo '<tr>
                <td>' . $ten . '</td>
                <td><img src="' . $sp['hinh'] . '" width="100px" height="100px" alt=""></td>
                <td>' . $soTienDinhDang . ' ' . $vnd . '</td>
                <td>' . $sp['soluong'] . '</td>
                <td id="thanhtien_' . $i . '">' . $dinhDangSoTien . ' ' . $vnd . '</td>
                ' . $xoasp_td . '
            </tr>';
        $i += 1;
    }
    $dinhDangTongTien = number_format($tong, 0, ',', '.');
    echo '<tr>
            <td class="tongtien" colspan="4">Tổng tiền: </td>
            <td class="tien">' . $dinhDangTongTien . ' ' . $vnd . '</td>
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
        $dinhDangTongTien = number_format($tong, 0, ',', '.');
        $soTienDinhDang = number_format($cart['gia'], 0, ',', '.');
        $dinhDangSoTien = number_format($cart['thanhtien'], 0, ',', '.');
        echo '<tr>
                <td>' . $i . '</td>
                <td>' . $cart['name'] . '</td>
                <td><img src="' . $hinh . '" width="100px" height="100px" alt=""></td>
                <td>' . $soTienDinhDang . ' ' . $vnd . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $dinhDangSoTien . ' ' . $vnd . '</td>
            </tr>';
        $i += 1;
    }
    echo '<tr>
            <td class="tongtien" colspan="5">Tổng tiền: </td>
            <td class="tien">' . $dinhDangTongTien . ' ' . $vnd . '</td>
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

function insert_bill($iduser, $hovaten, $diachi, $email, $phone, $pttt, $ngaydathang, $tongdonhang)
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

function loadall_bill($kyw = "", $iduser)
{
    $sql = "select * from bill where 1";
    if ($iduser > 0) $sql .= " and iduser=" . $iduser;
    if ($kyw != "") $sql .= " and id like '%" . $kyw . "%'";
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_trangthaidonhang($n)
{
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

function loadall_thongke()
{
    $sql = "select danhmuc.id_dm as iddm ,danhmuc.ten_dm as tendm, count(sanpham.id_sp) as countsp, min(sanpham.don_gia) as mingia, max(sanpham.don_gia) as maxgia, sum(sanpham.don_gia) as giatrungbinh";
    $sql .= " from sanpham left join danhmuc on danhmuc.id_dm=sanpham.id_dm";
    $sql .= " group by danhmuc.id_dm order by danhmuc.id_dm desc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}
