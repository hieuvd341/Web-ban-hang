<?php
$sql_product = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmucsp='$_GET[id]' ORDER BY id_sanpham DESC";
$query_product = mysqli_query($mysqli, $sql_product);
// $row_title = mysqli_fetch_array($query_product);

$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục sản phẩm :
    <?php echo $row_title['tendanhmuc'] ?>
</h3>
<ul class="product_list">
    <?php
    while ($row_product = mysqli_fetch_array($query_product)) {
        ?>

        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_product["id_sanpham"] ?>">
                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanhsp'] ?>" >
                <p class="title_product">
                    Tên sản phẩm: <?php echo $row_product['tensp'] ?>
                </p>
                <p class="price">
                    Giá: <?php echo number_format($row_product['giasp']) . " vnđ" ?>
                </p>
            </a>

        </li>
        <?php
    }
    ?>
</ul>