<h3>Giỏ hàng

<?php
if(isset($_SESSION["dangnhap_khachhang"])) {
    echo "Xin chào " . $_SESSION["dangnhap_khachhang"];
}
?>
</h3>

<table style="width:100%; text-align:center; border-collapse: collapse" border="1">
    <tr>
        <th>Id</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Tổng tiền</th>
        <th>Quản lý</th>

    </tr>

    <?php
    if (isset($_SESSION['cart'])) {
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $thanhtien = $cart_item["soluong"] * $cart_item["giasp"];
            $tongtien += $thanhtien;
            $i++;
            ?>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $cart_item["masp"] ?>
                </td>
                <td>
                    <?php echo $cart_item["tensanpham"] ?>
                </td>
                <td>
                    <img src="admincp/modules/quanlysanpham/uploads/<?php echo $cart_item["hinhanh"]; ?>" width="150px">
                </td>
                <td>
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" style="text-decoration: none;"><i
                            class="fa-solid fa-minus"></i>
                    </a>
                    <?php echo $cart_item["soluong"] ?>
                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"> <i class="fa-solid fa-plus"></i>
                    </a>


                </td>
                <td>
                    <?php echo $cart_item["giasp"] ?>
                </td>
                <td>
                    <?php echo $thanhtien ?>
                </td>
                <td>
                    <?php echo number_format($tongtien, 0, ",", ".") . " vnđ" ?>
                </td>
                <td>
                    <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td class="xoatatca" colspan="9">
                <p>
                    <a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a>
                </p>
            </td>
        </tr>
        <tr>
            <td class="tongtien" style="float:left; " colspan="9">
                <p>Tổng tiền:
                    <?php echo number_format($tongtien, 0, ",", ".") . " vnđ" ?>
                </p>
            </td>
            <div style="clear: both"></div>
            
            <?php
                if(isset($_SESSION["dangnhap_khachhang"])) {
                    
            ?>
            <td class="dathang" style="float:right;">
                <a href="pages/main/thanhtoan.php">Đặt hàng</a>
            </td>
            <?php
                }else {

            ?>
            <td class="dathang" style="float:right;">
                <a href="../admincp/admincp/login.php">Đăng nhập để đặt hàng</a>
            </td>
            <?php
                }
            ?>
            <div style="clear: both"></div>
        </tr>
        
        <?php

    } else {
        ?>
        <tr>
            <td colspan="9">
                <p>Hiện tại giỏ hàng trống</p>
            </td>

        </tr>
        <?php
    }
    ?>
</table>