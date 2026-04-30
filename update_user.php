<?php
$conn = mysqli_connect("localhost", "root", "", "iqra_db");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE user SET name='$name', email='$email' WHERE id=$id");

    header("Location: dashboard.php");
}
?>