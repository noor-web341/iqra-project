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
$result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
$user = mysqli_fetch_assoc($result);
?>

<form action="update_user.php" method="POST">
<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
<input type="text" name="name" value="<?php echo $user['name']; ?>">
<input type="email" name="email" value="<?php echo $user['email']; ?>">
<button name="update">Update</button>
</form>