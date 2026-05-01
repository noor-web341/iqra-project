<?php
$conn = mysqli_connect(
    "sql308.infinityfree.com",
    "if0_41802860",
    "GWHDgLz3W2GQ",
    "if0_41802860_iqra"
);

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM user WHERE id=$id");

header("Location: dashboard.php");
?>