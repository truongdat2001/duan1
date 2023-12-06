<div class="content">
    <div class="titel">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="form">
        <?php
        if (isset($thongbao)) {
            echo "<div style='font-size: 25px; color: red'>$thongbao</div>";
        }
        ?>
        <form action="index.php?act=add_sp" method="post" enctype="multipart/form-data">
            <div class="group">
                <label for="masp">Danh mục:</label> <br>
                <select name="id_dm" id="">
                    <?php
                    foreach ($list_dm as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id_dm . '">' . $ten_dm . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="group">
                <label for="tensp">Tên sản phẩm:</label> <br>
                <input type="text" name="tensp" id="tensp">
            </div>

            <div class="group">
                <label for="dongia">Đơn giá:</label> <br>
                <input type="text" name="dongia" id="dongia">
            </div>

            <div class="group">
                <label for="hinh">Hình ảnh:</label> <br>
                <input type="file" name="hinh" id="hinh">
            </div>

            <div class="group">
                <label for="mota">Mô tả:</label> <br>
                <textarea name="mota" id="mota" cols="30" rows="10"></textarea>
            </div>

            <div class="group-submit">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="Reset">
                <a href="index.php?act=list_sp"><input type="button" value="Danh sách"></a>
            </div>
        </form>
    </div>
</div>