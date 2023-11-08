<?php
function insert_taikhoan($hovate, $username, $password, $email)
{
    $sql = "insert into users (hovaten, username, password, email) values ('$hovate','$username','$password','$email')";
    pdo_execute($sql);
}

function check_taikhoan($username, $password)
{
    $sql = "select * from users where username= '" . $username . "' and  password= '" . $password . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function check_email($email)
{
    $sql = "select * from users where email= '" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function check_matkhau($username, $mkcu)
{
    $sql = "select * from users where username= '" . $username . "' and  password= '" . $mkcu . "'";
    $user = pdo_query_one($sql);
    if ($user && isset($user['password'])) {
        return $user['password']; // Trả về mật khẩu của người dùng
    } else {
        return false; // Trả về giá trị sai nếu không tìm thấy người dùng hoặc mật khẩu
    }
}

function update_taikhoan($id, $hovaten, $username, $password, $email, $diachi, $phone)
{
    $sql = "update users set id='" . $id . "', hovaten='" . $hovaten . "',username='" . $username . "', password='" . $password . "', email='" . $email . "', diachi='" . $diachi . "', phone='" . $phone . "' where id=" . $id;
    pdo_execute($sql);
}

function doi_matkhau($id, $password_moi)
{
    $sql = "update users set id='" . $id . "', password='" . $password_moi . "' where id=" . $id;
    pdo_execute($sql);
}

function loadall_users()
{
    $sql = "select * from users order by id";
    $list_users = pdo_query($sql);
    return $list_users;
}

