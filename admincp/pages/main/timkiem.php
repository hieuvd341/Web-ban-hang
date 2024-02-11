<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql_product = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.tensp LIKE '%".$tukhoa."%'";
$query_product = mysqli_query($mysqli, $sql_product);
$row = mysqli_fetch_array($query_product);
?>

<h3>Từ khóa tìm kiếm: <?php echo $_POST['tukhoa']   ?></h3>
<ul class="product_list">
    <?php
    while ($row_product = mysqli_fetch_array($query_product)) {

        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanhsp'] ?>">
                <p class="title_product">Tên sản phẩm:
                    <?php echo $row_product['tensp'] ?>
                </p>
                <p class="price">Giá:
                    <?php echo number_format($row_product['giasp']) . " vnđ" ?>
                </p>
                <p style="text-align:center; color:#d1d1d1">Tên danh mục:
                    <?php echo $row_product['tendanhmuc'] ?>
                </p>
            </a>

        </li>

        <?php
    }
    ?>
</ul>