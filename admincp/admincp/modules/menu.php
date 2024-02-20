<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    // header('Location:login.php');
}


?>

<ul class="admincp_list">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lí danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlysanpham&query=them">Quản lí sản phẩm</a></li>
    <li><a href="index.php?action=quanlyuser&query=them">Quản lí người dùng</a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lí danh mục bài viết</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản lí bài viết</a></li>
    
    <li><a href="index.php?action=dangxuat">Đăng xuất:
            <?php if (isset($_SESSION['dangnhap'])) {
                echo $_SESSION['dangnhap'];
            } ?>
        </a></li>
</ul>