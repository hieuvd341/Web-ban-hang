<?php
$sql_sua_danhmucsanpham = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id_danhmuc]' LIMIT 1";
$query_sua_danhmucsanpham = mysqli_query($mysqli, $sql_sua_danhmucsanpham);

?>
<p>Sửa mục sản phẩm</p>
<form method="POST" action="modules/quanlydanhmucsp/xuly.php?id_danhmuc= <?php echo $_GET["id_danhmuc"]?>">
    <table border="1" width="50%" style="border-collapse: collapse">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_danhmucsanpham)) {
            ?>
            <tr>
                <td>Tên danh mục</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"> </td>
            </tr>
            <?php
        }
        ?>
    </table>
</form>