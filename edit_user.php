<?php
include "db.php";
session_start();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
}

/* CARD */
.card{
    width:380px;
    background:#fff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
.card h2{
    text-align:center;
    margin-bottom:20px;
    color:#111827;
}

/* INPUTS */
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#2563eb;
    box-shadow:0 0 5px rgba(37,99,235,0.3);
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:#fff;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(37,99,235,0.3);
}

/* LABEL */
label{
    font-size:13px;
    color:#374151;
    font-weight:600;
}
</style>

</head>

<body>

<div class="card">

<h2>Edit User</h2>

<form action="update_user.php" method="POST">

<input type="hidden" name="id" value="<?php echo $user['id']; ?>">

<label>Name</label>
<input type="text" name="name" value="<?php echo $user['name']; ?>" required>

<label>Country</label>
<input type="text" name="country" value="<?php echo $user['country']; ?>" required>

<label>City</label>
<input type="text" name="city" value="<?php echo $user['city']; ?>" required>

<button type="submit" name="update">Update User</button>

</form>

</div>

</body>
</html>