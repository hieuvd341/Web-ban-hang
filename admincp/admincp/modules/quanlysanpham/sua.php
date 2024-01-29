<?php
$sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1";
$query_sua_sanpham = mysqli_query($mysqli, $sql_sua_sanpham);

?>
<p>Sửa sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse">
    <?php
    while ($row = mysqli_fetch_array($query_sua_sanpham)) {

        ?>
        <form method="POST" action="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $row["id_sanpham"] ?>"
            enctype="multipart/form-data">

            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" value=<?php echo $row['tensp'] ?> name="tensp"></td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" value=<?php echo $row['masp'] ?> name="masp"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" value=<?php echo $row['giasp'] ?> name="giasp"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" value=<?php echo $row['soluongsp'] ?> name="soluongsp"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanhsp'] ?>" width=150px>
                    <input type="file" name="hinhanhsp">
                </td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td><textarea name="tomtatsp" rows="10" style="resize:none"><?php echo $row['tomtatsp'] ?></textarea></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea name="noidungsp" rows="10" style="resize:none"><?php echo $row['noidungsp'] ?></textarea></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmucsp">
                        <?php
                        $sql_danhmuc = "SELECT * FROM  tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            if ($row_danhmuc['id_danhmuc'] == $row['id_danhmucsp']) {
                                ?>
                                <option selected value="<?php echo $row_danhmuc["id_danhmuc"] ?>">
                                    <?php echo $row_danhmuc["tendanhmuc"] ?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $row_danhmuc["id_danhmuc"] ?>">
                                    <?php echo $row_danhmuc["tendanhmuc"] ?>
                                    <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng sản phẩm</td>
                <td>
                    <select name="tinhtrangsp">
                        <?php
                        if ($row['tinhtrangsp'] == '1') {
                            ?>
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Ẩn</option>
                            <?php
                        } else {
                            ?>
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Ẩn</option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" name="suasanpham" value="Sửa sản phẩm"> </td>
            </tr>
        </form>
    </table>

    <?php
    }
    ?>