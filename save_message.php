<?php
include "db.php";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact_messages (name, email, message)
              VALUES ('$name', '$email', '$message')";

    if(mysqli_query($conn, $query)){
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }

} else {
    echo "no data";
}
?>