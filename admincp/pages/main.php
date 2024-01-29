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
        } else {
            include('main/index.php');
        }


        ?>
    </div>
</div>