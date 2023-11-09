<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=du_an_mot;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection(); // Lấy kết nối với cơ sở dữ liệu bằng hàm pdo_get_connection()
        $stmt = $conn->prepare($sql); //Chuẩn bị câu lệnh SQL bằng phương thức prepare() của đối tượng PDOStatement
        $stmt->execute($sql_args);  //Thực thi câu lệnh SQL bằng phương thức execute() của đối tượng PDOStatement
    }
    catch(PDOException $e){ // được thực thi nếu có bất kỳ lỗi nào xảy ra trong khối try
        throw $e;
    }
    finally{ //được thực thi nếu có bất kỳ lỗi nào xảy ra trong khối try
        unset($conn); //đóng kết nối với cơ sở dữ liệu bằng cách sử dụng hàm unset().
    }
}
function pdo_execute_return_lastInsertID($sql){ // được sử dụng để thực thi một câu lệnh SQL INSERT và trả về ID của bản ghi đã thêm
    $sql_args = array_slice(func_get_args(), 1); 
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId(); //Trả về ID của bản ghi đã thêm bằng phương thức lastInsertId() của đối tượng PDO.
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT) ?
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll(); // Lấy tất cả các hàng từ tập kết quả bằng phương thức fetchAll() của đối tượng PDOStatement.
        return $rows; // Trả về các hàng đã lấy dưới dạng mảng.
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        /*Lấy hàng đầu tiên từ tập kết quả bằng phương thức fetch() của đối tượng PDOStatement, 
        chỉ định chế độ lấy PDO::FETCH_ASSOC để trả về mảng liên kết.*/
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
        // Trích xuất giá trị đầu tiên từ mảng liên kết bằng cách sử dụng array_values() và chỉ mục [0].
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}