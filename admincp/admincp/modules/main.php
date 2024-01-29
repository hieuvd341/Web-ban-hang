<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $tmp = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tmp = "";
    }
    if ($tmp == "quanlydanhmucsanpham" && $query == 'them') {
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    }
    if ($tmp == "quanlydanhmucsanpham" && $query == 'sua') {
        include("modules/quanlydanhmucsp/sua.php");
    } 
    if ($tmp == "quanlysanpham" && $query == "them") {
        include("modules/quanlysanpham/them.php");
        include("modules/quanlysanpham/lietke.php");
    } else if ($tmp == "quanlysanpham" && $query == 'sua') {
        include("modules/quanlysanpham/sua.php");
    } 
    
    
    
    
    else if ($tmp == "quanlydanhmucbaiviet") {
        include("modules/danhmucbaiviet.php");
    } else if ($tmp == "quanlybaiviet") {
        include("modules/baiviet.php");
    } else {
        include("modules/dashboard.php");
    }



    ?>
</div>