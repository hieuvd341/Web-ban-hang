<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
    $sql_product = "SELECT tbl_sanpham.*, tbl_danhmuc.tendanhmuc FROM tbl_sanpham 
                    LEFT JOIN tbl_danhmuc ON tbl_sanpham.id_danhmucsp = tbl_danhmuc.id_danhmuc 
                    WHERE tbl_sanpham.tensp LIKE ?";
    $stmt = $mysqli->prepare($sql_product);
    if ($stmt) {
        $searchKeyword = '%' . $tukhoa . '%';
        $stmt->bind_param('s', $searchKeyword);
        $stmt->execute();
        $query_product = $stmt->get_result();
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }
} else {
    $tukhoa = '';
}
?>

<h3>Từ khóa tìm kiếm: <?php echo htmlspecialchars($tukhoa); ?></h3>
<ul class="product_list">
    <?php
    while ($row_product = mysqli_fetch_assoc($query_product)) {
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanhsp'] ?>">
                <p class="title_product">Tên sản phẩm: <?php echo $row_product['tensp'] ?></p>
                <p class="price">Giá: <?php echo number_format($row_product['giasp'], 0, ",", ".") . " vnđ" ?></p>
                <p style="text-align:center; color:#d1d1d1">Tên danh mục: <?php echo $row_product['tendanhmuc']; ?></p>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
