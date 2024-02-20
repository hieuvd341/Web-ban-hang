<?php
$sql_quanly_user = "SELECT * FROM  tbl_dangky ORDER BY id_dangky ASC";
$query_quanly_user = mysqli_query($mysqli, $sql_quanly_user);
?>

<p>Liệt kê user</p>
<table style="width: 100% border-collapse: collapse" border=1>
    <tr>
        <th>Thứ tự</th>
        <th>Id</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Mật khẩu</th>
        <th>Điện thoại</th>
        <th>Quản lý</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_quanly_user)) {
        $i++; 
    ?>
    <tr>
        <td> <?php   echo $i ?></td>
        <td> <?php   echo $row["id_dangky"] ?></td>
        <td> <?php   echo $row["tenkhachhang"] ?></td>
        <td> <?php   echo $row["email"] ?></td>
        <td> <?php   echo $row["diachi"] ?></td>
        <td> <?php   echo $row["matkhau"] ?></td>
        <td> <?php   echo $row["dienthoai"] ?></td>
        <td><a href="modules/quanlyuser/xuly.php?id_dangky=<?php echo $row['id_dangky'] ?> ">Xóa</a> | <a
                    href="?action=quanlyuser&query=sua&id_dangky=<?php echo $row['id_dangky'] ?>"> Sửa</a> </td>
    </tr>
    <?php
    }
    ?>
</table>