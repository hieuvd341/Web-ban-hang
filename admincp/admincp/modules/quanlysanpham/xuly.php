<?php
include("../../config/config.php");
$tensp = $_POST['tensp'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluongsp = $_POST['soluongsp'];
$tomtatsp = $_POST['tomtatsp'];
$tinhtrangsp = $_POST['tinhtrangsp'];
$noidungsp = $_POST['noidungsp'];
$id_danhmuc = $_POST['danhmucsp'];
//xu ly hinh anh
$hinhanhsp = $_FILES['hinhanhsp']['name'];
$hinhanhsp_tmp = $_FILES['hinhanhsp']['tmp_name'];
$hinhanhsp = time() . '_' . $hinhanhsp;
$upload_directory = 'uploads/';
$upload_path = $upload_directory . $hinhanhsp;
// move_uploaded_file($hinhanhsp_tmp, '../../../pages/uploads/' . $hinhanhsp);
if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO tbl_sanpham(tensp, masp, giasp, soluongsp, hinhanhsp, tomtatsp, noidungsp, tinhtrangsp, id_danhmucsp) 
    VALUE('" . $tensp . "','" . $masp . "', '" . $giasp . "', '" . $soluongsp . "', '" . $hinhanhsp . "', '" . $tomtatsp . "', '" . $noidungsp . "', '" . $tinhtrangsp . "', '" . $id_danhmuc . "')";
    move_uploaded_file($hinhanhsp_tmp, $upload_path);

    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=quanlysanpham&query=them");
} else if (isset($_POST["suasanpham"])) {
    //sua
    if ($_FILES['hinhanhsp']['name']) {
        $id = $_GET['id_sanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanhsp']);
        }
        $sql_sua = "UPDATE tbl_sanpham SET tensp='" . $tensp . "', masp='" . $masp . "', giasp='" . $giasp . "', soluongsp='" . $soluongsp . "', hinhanhsp='" . $hinhanhsp . "', tomtatsp='" . $tomtatsp . "', noidungsp='" . $noidungsp . "', id_danhmucsp='" . $id_danhmuc . "', tinhtrangsp='" . $tinhtrangsp . "' WHERE id_sanpham='" . $_GET['id_sanpham'] . "'";
        move_uploaded_file($hinhanhsp_tmp, $upload_path);

    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensp='" . $tensp . "', masp='" . $masp . "', giasp='" . $giasp . "', soluongsp='" . $soluongsp . "', tomtatsp='" . $tomtatsp . "', noidungsp='" . $noidungsp . "', tinhtrangsp='" . $tinhtrangsp . "', id_danhmucsp='" . $id_danhmuc . "' WHERE id_sanpham='" . $_GET['id_sanpham'] . "'";
    }
    mysqli_query($mysqli, $sql_sua);

    header("Location:../../index.php?action=quanlysanpham&query=them");

} else {
    $id = $_GET['id_sanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanhsp']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlysanpham&query=them");
}
?>