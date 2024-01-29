<p>Chi tiết sản phẩm</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmucsp=tbl_danhmuc.id_danhmuc AND
                tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    ?>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img width=80% src="admincp/modules/quanlysanpham/uploads/<?php echo $row_chitiet['hinhanhsp'] ?>">
        </div>

        <form method="POST" action="#">
            <div class="chitiet_sanpham">
                <h3 style="margin:0">Tên sản phẩm:
                    <?php echo $row_chitiet['tensp'] ?>
                </h3>
                <h3>Mã sản phẩm:
                    <?php echo $row_chitiet['masp'] ?>
                </h3>
                <h3>Giá sản phẩm:
                    <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . " vnd" ?>
                </h3>
                <h3>Số lượng sản phẩm:
                    <?php echo $row_chitiet['soluongsp'] ?>
                </h3>
                <h3>Tên danh mục:
                    <?php echo $row_chitiet['tendanhmuc'] ?>
                </h3>
                <p> <input class="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>

        </form>
    </div>
    </div>
    <?php
}
?>