<?php
$servername = 'localhost';
$username  = 'root';
$password = '';
$database = 'carproject';

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo 'mysqli_error()';
}
