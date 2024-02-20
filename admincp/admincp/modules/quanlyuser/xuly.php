<?php
include("../../config/config.php");

if (isset($_POST['themuser'])) {
    $tenkhachhang = $_POST['tenkhachhang'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    $dienthoai = $_POST['dienthoai'];
    $sql_them = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=quanlyuser&query=them");
} else if (isset($_POST["suauser"])) {
    $tenkhachhang = $_POST['tenkhachhang'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    $dienthoai = $_POST['dienthoai'];
    $sql_sua = "UPDATE tbl_dangky SET tenkhachhang='" . $tenkhachhang . "', email='" . $email . "', diachi='" . $diachi . "', matkhau='" . $matkhau . "', dienthoai='" . $dienthoai . "' WHERE id_dangky='" . $_GET['id_dangky'] . "'";
    mysqli_query($mysqli, $sql_sua);
    header("Location:../../index.php?action=quanlyuser&query=them");

} else {
    $id = $_GET['id_dangky'];
    $sql_xoa = "DELETE FROM tbl_dangky WHERE id_dangky='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlyuser&query=them");
}
?>