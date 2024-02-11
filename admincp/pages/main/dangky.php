<?php
if (isset($_POST["dangky"])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);

    $sql_dangky = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql_dangky);

    if ($stmt) {
        $stmt->bind_param("ssssi", $tenkhachhang, $email, $diachi, $matkhau, $dienthoai);
        $query_dangky = $stmt->execute();

        if ($query_dangky) {
            echo "<p style='color:green'>Bạn đã đăng ký thành công</p>";
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            $_SESSION['dangnhap_khachhang'] = $email;
            header('Location:index.php?quanly=giohang');
        } else {
            echo "<p style='color:red'>Đăng ký không thành công</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color:red'>Có lỗi xảy ra</p>";
    }
}
?>

<p>Đăng ký thành viên</p>
<style type="text/css"></style>
<form action="" method="POST">
    <table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td colspan="1"><input type="submit" name="dangky" value="Đăng ký"></td>
            <td colspan="1"><a href="index.php?quanly=dangnhap">Đăng nhập nếu đã có tài khoản</a></td>
        </tr>
    </table>
</form>