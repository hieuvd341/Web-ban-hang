<?php
$sql_lietke_sanpham = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmucsp= tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
$query_lietke_sanpham = mysqli_query($mysqli, $sql_lietke_sanpham);

?>
<p>Liệt kê sản phẩm</p>

<table style="width:100% border-collapse: collapse" border="1">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
        $i++;
        ?>
        <tr>
            <td>
                <?php echo $i ?>
            </td>
            <td>
                <?php echo $row['tensp'] ?>
            </td>
            <td> <img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanhsp'] ?>" width=150px>
            </td>
            <td>
                <?php echo $row['giasp'] ?>
            </td>
            <td>
                <?php echo $row['soluongsp'] ?>
            </td>
            <td>
                <?php echo $row['tendanhmuc'] ?>
            </td>
            <td>
                <?php echo $row['masp'] ?>
            </td>
            <td>
                <?php echo $row['tomtatsp'] ?>
            </td>
            <td>
                <?php if ($row['tinhtrangsp'] == 1) {
                    echo "Kich hoat";
                } else {
                    echo "An";
                }
                ?>
            </td>
            <td><a href="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $row['id_sanpham'] ?> ">Xóa</a> | <a
                    href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row['id_sanpham'] ?>"> Sửa</a> </td>
        </tr>
        <?php
    }
    ?>
</table>