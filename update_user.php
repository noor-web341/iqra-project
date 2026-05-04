<?php
include "db.php";

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $country = $_POST['country'];
    $city = $_POST['city'];

    $query = mysqli_query($conn,
        "UPDATE user 
         SET name='$name',
             country='$country',
             city='$city'
         WHERE id=$id"
    );

    if($query){
        header("Location: users.php?msg=updated");
        exit();
    } else {
        echo "Update failed!";
    }
}
?>