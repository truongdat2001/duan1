<div class="content">
    <div class="titel">
        <h1>DANH SÁCH NGƯỜI DÙNG</h1>
    </div>

    <div class="form">
        <div class="form-list">

            <table>
                <tr>
                    <th>MÃ NGƯỜI DÙNG</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>TÊN ĐĂNG NHẬP</th>
                    <th>MẬT KHẨU</th>
                    <th>EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>VAI TRÒ</th>
                </tr>

                <?php
                foreach ($list_users as $taikhoan) {
                    extract($taikhoan);
                    echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $hovaten . '</td>
                        <td>' . $username . '</td>
                        <td>' . $password . '</td>
                        <td>' . $email . '</td>
                        <td>' . $diachi . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $vaitro . '</td>
                    </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>