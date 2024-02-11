<?php
if (isset($_POST['dangnhap'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = md5($_POST['password']); // Hash the password using MD5

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM tbl_dangky WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($password === $row['matkhau']) { // Ensure column name is correct
                $_SESSION['dangnhap_khachhang'] = $row['email'];
                $_SESSION['id_khachhang'] = $row['id_dangky'];
                header('Location:index.php');
                exit();
            } else {
                echo '<p style="color:red">Email hoặc mật khẩu không đúng, vui lòng nhập lại.</p>';
            }
        } else {
            echo '<p style="color:red">Email hoặc mật khẩu không đúng, vui lòng nhập lại.</p>';
        }
    } else {
        echo '<p style="color:red">Có lỗi xảy ra với cơ sở dữ liệu.</p>';
    }
}
?>

<form action="" method="POST">
    <div class="wrapper-login" style="text-align:center; border-collapse:collapse; autocomplete:off">
        <table border="1" class="table-login">
            <tr>
                <td colspan="2">
                    <h3>Đăng nhập khách hàng</h3>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="email" placeholder="email..."></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="password..."></td>
            </tr>
            <tr>
                <input type="submit" name="dangnhap" value="Đăng nhập">

            </tr>
        </table>
    </div>
</form>