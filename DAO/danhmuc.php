<?php
function insert_danhmuc($tenloai)
{
    $sql = "insert into danhmuc (ten_dm) values ('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id_dm)
{
    $sql = "delete from danhmuc where id_dm=" . $id_dm;
    pdo_execute($sql);
}

function loadall_danhmuc()
{
    $sql = "select * from danhmuc order by id_dm";
    $list_dm = pdo_query($sql);
    return $list_dm;
}

function loadone_danhmuc($id_dm)
{
    $sql = "select * from danhmuc where id_dm=" . $id_dm;
    $update_dm = pdo_query_one($sql);
    return $update_dm;
}

function update_danhmuc($tenloai, $id_dm)
{
    $sql = "update danhmuc set ten_dm='" . $tenloai . "' where id_dm=" . $id_dm;
    pdo_execute($sql);
}
