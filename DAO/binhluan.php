<?php
function insert_binhluan($hovaten, $iduser, $idpro, $noidung, $ngaybinhluan)
{
    $sql = "insert into binhluan (hovaten,iduser,idpro,noidung,ngaybinhluan) values ('$hovaten', '$iduser', '$idpro', '$noidung', '$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro)
{
    $sql = "select * from binhluan where 1";
    if($idpro>0) {
        $sql .= " and idpro='".$idpro."'";
    }
    $sql .= " order by id";
    $list_bl = pdo_query($sql);
    return $list_bl;
}

function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}