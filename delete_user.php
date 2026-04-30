<?php
$conn = mysqli_connect("localhost", "root", "", "iqra_db");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM user WHERE id=$id");

header("Location: dashboard.php");
?>