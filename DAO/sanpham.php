<?php
function insert_sanpham($tensp,$dongia,$hinh,$mota,$id_dm)
{
    $sql = "insert into sanpham (ten_sp, don_gia, hinh, mo_ta, id_dm) values ('$tensp','$dongia','$hinh','$mota','$id_dm')";
    pdo_execute($sql);
}

function delete_sanpham($id_sp)
{
    $sql = "delete from sanpham where id_sp=" .$id_sp;
    pdo_execute($sql);
}

function loadall_sanpham($kyw, $id_dm)
{
    $sql = "select * from sanpham where 1"; 
    if($kyw !="") {
        $sql.=" and ten_sp like '%".$kyw."%'";
    }
    if($id_dm>0) {
        $sql.=" and id_dm ='".$id_dm."'";
    }
    $sql .=" order by id_sp";
    $list_sp = pdo_query($sql);
    return $list_sp;
}

function loadtatca_sp()
{
    $sql = "select * from sanpham order by id_sp";
    $list_dm = pdo_query($sql);
    return $list_dm;
}

function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id_sp desc limit 0,8"; 
    $list_sp = pdo_query($sql);
    return $list_sp;
}

function loadall_sanpham_top8()
{
    $sql = "select * from sanpham where 1 order by so_luot_xem desc limit 0,8"; 
    $list_sp = pdo_query($sql);
    return $list_sp;
}

function loadone_sanpham($id_sp)
{
    $sql = "select * from sanpham where id_sp=" . $id_sp;
    $sp = pdo_query_one($sql);
    return $sp;
}

function load_tendm($id_dm)
{
    if($id_dm>0) {
        $sql = "select * from danhmuc where id_dm=" . $id_dm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $ten_dm;
    } else {
        return "";
    }
}

function update_sanpham($id_sp,$tensp,$dongia, $hinh, $mota, $id_dm)
{
    if($hinh != ""){
        $sql = "update sanpham set id_dm='" . $id_dm . "', ten_sp='" . $tensp . "',don_gia='" . $dongia . "', hinh='" . $hinh . "',mo_ta='" . $mota . "' where id_sp=" . $id_sp;
    } else {
        $sql = "update sanpham set id_dm='" . $id_dm . "', ten_sp='" . $tensp . "',don_gia='" . $dongia . "', mo_ta='" . $mota . "' where id_sp=" . $id_sp;
    }
    
    pdo_execute($sql);
}
