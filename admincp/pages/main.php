<div id="main">
    <?php
    include("sidebar/sidebar.php")
        ?>
    <div class="mainContent">
        <?php
        if (isset($_GET["quanly"])) {
            $tmp = $_GET["quanly"];
        } else {
            $tmp = '';
        }
        if ($tmp == 'danhmucsanpham') {
            include('main/danhmuc.php');
        } else if ($tmp == 'giohang') {
            include('main/giohang.php');
        } else if ($tmp == 'tintuc') {
            include('main/tintuc.php');
        } else if ($tmp == 'lienhe') {
            include('main/lienhe.php');
        } else if ($tmp == 'sanpham') {
            include('main/sanpham.php');
        }else if ($tmp == 'dangky') {
            include('main/dangky.php');
        }else if ($tmp == 'dangnhap') {
            include('main/dangnhap.php');
        }else if ($tmp == 'timkiem') {
            include('main/timkiem.php');
        }else if ($tmp == 'camon') {
            include('main/thankyou.php');
        } else {
            include('main/index.php');
        }


        ?>
    </div>
</div>