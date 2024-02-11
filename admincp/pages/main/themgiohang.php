<?php
include("../../admincp/config/config.php");
session_start();
//xoatatca
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    // session_destroy();
    header("Location:../../index.php?quanly=giohang");

}
if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
    $id = $_GET['xoa']; // Get the ID of the product to delete
    $product = array(); // Initialize an empty array to hold the products you want to keep

    foreach($_SESSION['cart'] as $cart_item) {
        if($cart_item['id'] != $id) {
            // If the current cart item is not the one to delete, add it to the $product array
            $product[] = array(
                "tensanpham" => $cart_item['tensanpham'],
                "id" => $cart_item['id'],
                "soluong" => $cart_item["soluong"],
                "giasp" => $cart_item["giasp"],
                "hinhanh" => $cart_item["hinhanh"],
                "masp" => $cart_item["masp"],
            );
        }
    }

    // Update the session cart only once after the loop
    $_SESSION['cart'] = $product;

    // Redirect after the operation is complete
    header("Location:../../index.php?quanly=giohang");
    exit; // It's a good practice to call exit() after a header redirect to stop script execution
}

//them so luong
if(isset($_SESSION["cart"]) && isset($_GET["cong"])) {
    $id = $_GET["cong"];
    foreach($_SESSION['cart'] as $cart_item) {
        if($cart_item['id'] == $id &&  $cart_item["soluong"] < 10) {
            // If the current cart item is not the one to delete, add it to the $product array
            $product[] = array(
                "tensanpham" => $cart_item['tensanpham'],
                "id" => $cart_item['id'],
                "soluong" => $cart_item["soluong"]+1,
                "giasp" => $cart_item["giasp"],
                "hinhanh" => $cart_item["hinhanh"],
                "masp" => $cart_item["masp"],
            );
        } else {
            $product[] = array(
                "tensanpham" => $cart_item['tensanpham'],
                "id" => $cart_item['id'],
                "soluong" => $cart_item["soluong"],
                "giasp" => $cart_item["giasp"],
                "hinhanh" => $cart_item["hinhanh"],
                "masp" => $cart_item["masp"],
            );
        }
    }
    $_SESSION['cart'] = $product;
    header("Location:../../index.php?quanly=giohang");
    exit; // It's a good practice to call exit() after a header redirect to stop script execution
}
//tru so luong
if(isset($_SESSION["cart"]) && isset($_GET["tru"])) {
    $id = $_GET["tru"];
    foreach($_SESSION['cart'] as $cart_item) {
        if($cart_item['id'] == $id) {
            if($cart_item["soluong"] > 0) {
                $product[] = array(
                    "tensanpham" => $cart_item['tensanpham'],
                    "id" => $cart_item['id'],
                    "soluong" => $cart_item["soluong"]-1,
                    "giasp" => $cart_item["giasp"],
                    "hinhanh" => $cart_item["hinhanh"],
                    "masp" => $cart_item["masp"],
                );
            } 
        } else {
            $product[] = array(
                "tensanpham" => $cart_item['tensanpham'],
                "id" => $cart_item['id'],
                "soluong" => $cart_item["soluong"],
                "giasp" => $cart_item["giasp"],
                "hinhanh" => $cart_item["hinhanh"],
                "masp" => $cart_item["masp"],
            );
        }
    }
    $_SESSION['cart'] = $product;
    header("Location:../../index.php?quanly=giohang");
    exit; // It's a good practice to call exit() after a header redirect to stop script execution
}
//them san pham vao gio hang
if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(
            array(
                "tensanpham" => $row['tensp'],
                "id" => $id,
                "soluong" => $soluong,
                "giasp" => $row["giasp"],
                "hinhanh" => $row["hinhanhsp"],
                "masp" => $row["masp"],
            )
        );
        // kiem tra session gio hang ton tai chua
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
            $found = false;
            foreach($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        "tensanpham" => $cart_item['tensanpham'],
                        "id" => $cart_item['id'],
                        "soluong" => $cart_item["soluong"] + 1,
                        "giasp" => $cart_item["giasp"],
                        "hinhanh" => $cart_item["hinhanh"],
                        "masp" => $cart_item["masp"],
                    );
                    $found = true;
                } else {
                    // nếu dữ liệu không trùng
                    $product[] = array(
                        "tensanpham" => $cart_item['tensanpham'],
                        "id" => $cart_item['id'],
                        "soluong" => $cart_item["soluong"],
                        "giasp" => $cart_item["giasp"],
                        "hinhanh" => $cart_item["hinhanh"],
                        "masp" => $cart_item["masp"],
                    );
                }
            }

            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }

        } else {
            $_SESSION['cart'] = $new_product;
        }

    }
    foreach ($_SESSION['cart'] as $cart_item) {
        print_r($cart_item);

    }
    header("Location:../../index.php?quanly=giohang");

}
//xoa sanpham
?>