<?php
include_once("connection.php");
if (isset($_POST['submit'])) {
    $p_id = $_POST['pid'];
    $product_title = $_POST['product_name'];
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];

    $product_image = $_FILES['product_image']['name'];
    $temp_name1 = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($temp_name1, "images/$product_image");

    $sql = "UPDATE products SET product_title='$product_title', product_brand='$brand_id', product_cat='$category_id', product_desc='$product_desc', product_qty='$product_qty', product_price='$product_price', product_keywords='$product_keywords', product_image='$product_image' WHERE product_id='$p_id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Product Updated Successfully')</script>";
    } else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
    echo '<script>window.open("products.php","_self")</script>';
}
// header('location: products.php');
