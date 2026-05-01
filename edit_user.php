<?php
$conn = mysqli_connect(
    "sql308.infinityfree.com",
    "if0_41802860",
    "GWHDgLz3W2GQ",
    "if0_41802860_iqra"
);

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