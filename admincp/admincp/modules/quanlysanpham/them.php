<p>Thêm sản phẩm</p>
<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
    <table border="1" width="100%" style="border-collapse: collapse">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensp"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluongsp"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanhsp"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea name="tomtatsp" rows="10" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="noidungsp" rows="10" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmucsp">
                    <?php
                    $sql_danhmuc = "SELECT * FROM  tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                        <option value="<?php echo $row_danhmuc["id_danhmuc"] ?>">
                            <?php echo $row_danhmuc["tendanhmuc"] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng sản phẩm</td>
            <td>
                <select name="tinhtrangsp">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"> <input type="submit" name="themsanpham" value="Thêm danh mục sản phẩm"> </td>
        </tr>
    </table>
</form>