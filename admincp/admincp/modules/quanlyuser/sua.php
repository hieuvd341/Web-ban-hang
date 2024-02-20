<?php
$sql_sua_user = "SELECT * FROM tbl_dangky WHERE id_dangky='$_GET[id_dangky]' LIMIT 1";
$query_sua_user = mysqli_query($mysqli, $sql_sua_user);

?>
<p>Sửa người dùng</p>
<form method="POST" action="modules/quanlyuser/xuly.php?id_dangky= <?php echo $_GET["id_dangky"]?>">
    <table border="1" width="50%" style="border-collapse: collapse">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_user)) {
            ?>
            <tr>
                <td>Tên khách hàng</td>
                <td><input type="text" value="<?php echo $dong['tenkhachhang'] ?>" name="tenkhachhang"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" value="<?php echo $dong['email'] ?>" name="email"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" value="<?php echo $dong['diachi'] ?>" name="diachi"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="text" value="<?php echo $dong['matkhau'] ?>" name="matkhau"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" value="<?php echo $dong['dienthoai'] ?>" name="dienthoai"></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" name="suauser" value="Sửa người dùng"> </td>
            </tr>
            <?php
        }
        ?>
    </table>
</form>