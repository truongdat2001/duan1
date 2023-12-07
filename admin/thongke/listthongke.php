<div class="content">
    <div class="titel">
        <h1>THỐNG KÊ ĐƠN HÀNG</h1>
    </div>

    <div class="form">
        <div class="form-list">
            <table>
                <tr>
                    <th>MÃ DANH MỤC</th>
                    <th>TÊN DANH MỤC</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ CAO NHẤT</th>

                </tr>

                <?php
                foreach ($listthongke as $thongke) {
                    extract($thongke);
                    echo '<tr>
                                <td>' . $iddm . '</td>
                                <td>' . $tendm . '</td>
                                <td>' . number_format($countsp, 0, ',', '.') . '</td>
                                <td>' . number_format($mingia, 0, ',', '.') . ' VNĐ</td>
                                <td>' . number_format($maxgia, 0, ',', '.') . ' VNĐ</td>
                                
                            </tr>';
                }
                ?>

            </table>

        </div>
        <div class="group-submit">
            <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
        </div>
    </div>
</div>