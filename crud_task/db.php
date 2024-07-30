<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creat_crud";

// إنشاء الاتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);

// التحقق من الاتصال
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
// echo "connected successfully";
?>