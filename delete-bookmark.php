<?php

session_start();
include 'connection.php';
$p_id = $_GET['pid'];
$user_id = $_GET['userid'];

$sql = "DELETE FROM `bookmark` WHERE product_id='$p_id' AND user_id='$user_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('location: show_bookmark.php');
}
