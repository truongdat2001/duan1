<div class="content">
    <div class="titel">
        <h1>THÊM MỚI DANH MỤC</h1>
    </div>
    <div class="form">
        <?php
        if (isset($thongbao)) {
            echo "<div style='font-size: 25px; color: red'>$thongbao</div>";
        }
        ?>
        <form action="index.php?act=add_dm" method="post">
            <div class="group">
                <label for="maloai">Mã loại:</label> <br>
                <input type="text" name="maloai" id="maloai" disabled>
            </div>
            <div class="group">
                <label for="tenloai">Tên loại:</label> <br>
                <input type="text" name="tenloai" id="tenloai">
            </div>
            <div class="group-submit">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="Reset">
                <a href="index.php?act=list_dm"><input type="button" value="Danh sách"></a>
            </div>
        </form>
    </div>
</div>