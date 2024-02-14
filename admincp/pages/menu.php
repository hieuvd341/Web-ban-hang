<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<?php
if (isset($_GET["dangxuat_khachhang"]) && $_GET["dangxuat_khachhang"] == 1) {
    unset($_SESSION["dangnhap_khachhang"]);
}
?>
<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
        <?php
        if (isset($_SESSION['dangnhap_khachhang'])) {
            ?>
            <li><a href="index.php?dangxuat_khachhang=1">Đăng xuất</a></li>
            <?php
        } else {
            ?>
            <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
            <?php
        }
        ?>
    </ul>
    <p>
    <form action="index.php?quanly=timkiem" method="POST" style="float:right">
        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
        <input type="submit" name="timkiem" value="Tìm kiếm">
    </form>
    </p>
</div>