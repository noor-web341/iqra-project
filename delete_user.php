<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "iqra_db";

/*
✔ LIVE HOSTING (InfinityFree)
*/
$live_host = "sql308.infinityfree.com";
$live_user = "if0_41802860";
$live_pass = "GWHDgLz3W2GQ";
$live_db   = "if0_41802860_iqra";

/*
✔ AUTO DETECT ENVIRONMENT
*/
if($_SERVER['HTTP_HOST'] == "localhost") {
    $conn = mysqli_connect($host, $user, $pass, $db);
} else {
    $conn = mysqli_connect($live_host, $live_user, $live_pass, $live_db);
}

/*
✔ ERROR CHECK
*/
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM user WHERE id=$id");

header("Location: dashboard.php");
?>