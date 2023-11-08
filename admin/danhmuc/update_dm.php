<?php
    if(is_array($update_dm)){
        extract($update_dm);
    }
?>

<div class="content">
    <div class="titel">
        <h1>CẬP NHẬT LOẠI HÀNG</h1>
    </div>
    <div class="form">
        <form action="index.php?act=update_dm" method="post">
            <div class="group">
                <label for="maloai">Mã loại:</label> <br>
                <input type="text" name="maloai" id="maloai"disabled>
            </div>
            <div class="group">
                <label for="tenloai">Tên loại:</label> <br>
                <input type="text" name="tenloai" id="tenloai" value="<?php if(isset($ten_dm)&&($ten_dm!="")) echo $ten_dm;?>" >
            </div>
            <div class="group-submit">
                <input type="hidden" name="id_dm" value="<?php if(isset($id_dm)&&($id_dm>0)) echo $id_dm;?>">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=list_dm"><input type="button" value="Danh sách"></a>
            </div>
            <?php
                // if (isset($thongbao)&&($thongbao!="")) {
                //     echo $thongbao;
                // }
            ?>
        </form>
    </div>
</div>