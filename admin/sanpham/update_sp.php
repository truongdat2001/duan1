<?php
if (is_array($update_sp)) {
    extract($update_sp);
}

$imgpath = "../upload/" . $hinh;
if (is_file($imgpath)) {
    $img = "<img src='" . $imgpath . "' height='80'>";
} else {
    $img = "Không có hình";
}
?>

<div class="content">
    <div class="titel">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
    <div class="form">
        <form action="index.php?act=update_sp" method="post" enctype="multipart/form-data">
            <select class="show_dm" name="id_dm" id="">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($list_dm as $danhmuc) {
                    if($id_dm==$danhmuc['id_dm']) {
                        echo '<option value="' . $danhmuc['id_dm'] . '" selected>' . $danhmuc['ten_dm'] . '</option>';
                    } else {
                        echo '<option value="' . $danhmuc['id_dm'] . '">' . $danhmuc['ten_dm'] . '</option>';
                    }             
                }
                ?>
            </select>
            <div class="group">
                <label for="tensp">Tên sản phẩm:</label> <br>
                <input type="text" name="tensp" id="tensp" value="<?= $ten_sp ?>">
            </div>

            <div class="group">
                <label for="dongia">Đơn giá:</label> <br>
                <input type="text" name="dongia" id="dongia" value="<?= $don_gia ?>">
            </div>

            <div class="group">
                <label for="hinh">Hình ảnh:</label> <br>
                <input type="file" name="hinh" id="hinh">
                <?= $img ?>
            </div>

            <div class="group">
                <label for="mota">Mô tả:</label> <br>
                <textarea name="mota" id="mota" cols="30" rows="10"> <?= $mo_ta ?></textarea>
            </div>

            <div class="group-submit">
                <input type="hidden" name="id_sp" value="<?= $id_sp ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=list_sp"><input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        </form>
    </div>
</div>