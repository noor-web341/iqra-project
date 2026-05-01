<?php
$conn = mysqli_connect(
    "sql308.infinityfree.com",
    "if0_41802860",
    "GWHDgLz3W2GQ",
    "if0_41802860_iqra"
);

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE user SET name='$name', email='$email' WHERE id=$id");

    header("Location: dashboard.php");
}
?>