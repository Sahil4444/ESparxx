<?php
include 'connection.php';
include 'header.php';
$message = '';
if (isset($_SESSION['user_id'])) {
    header('location:index.php');
} else {
    $user_id = $_SESSION['userid'];
    $p_id = $_GET['id'];

    $sql = "SELECT * FROM `bookmark` where product_id = $p_id && user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        echo 'product already exist in wishlist';
        header('location: show_bookmark.php');
    } else {
        $sql = "INSERT INTO `bookmark` ( `product_id`, `user_id`) VALUES ('$p_id','$user_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: show_bookmark.php');
        }
    }
}
