<?php
    session_start();
    include("config/config.php");
    if(isset($_POST['login'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='$taikhoan' AND password='$matkhau' LIMIT 1";
        $row= mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count > 0) {
            $_SESSION['dangnhap']=$taikhoan;
            header("Location:index.php");
        } else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng. Vui lòng nhập lại."); </script>';
            header("Location:login.php");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style type="text/css">
        body {
            background-color: #f2f2f2;
        }

        .wrapper-login {
            width: 15%;
            margin: 0 auto;
        }

        table.table-login {
            width: 100px;
            height: auto;
            background-color: aliceblue;
        }

        table.table-login tr td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <div class="wrapper-login" style="text-align:center; border-collapse:collapse; autocomplete:off" >
            <table border="1" class="table-login">
                <tr>
                    <td colspan="2">
                        <h3>Welcome to ?</h3>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name=password></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="submit"></td>
                </tr>
            </table>
        </div>
    </form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>