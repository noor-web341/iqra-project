<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    if($user && $password == $user['password']){

        $_SESSION['user'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Wrong email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login | IQRA</title>

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: system-ui, sans-serif;
    background:#f4f6f8;
}

/* CARD */
.box{
    width:360px;
    background:#fff;
    padding:40px;
    border-radius:18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    text-align:center;
}

/* TITLE */
.box h2{
    margin-bottom:25px;
    font-size:24px;
    color:#111;
}

/* ERROR */
.error{
    background:#ffe5e5;
    color:#c0392b;
    padding:10px;
    border-radius:10px;
    margin-bottom:15px;
    font-size:14px;
}

/* INPUT */
input{
    width:100%;
    padding:13px;
    margin:8px 0;
    border:1px solid #ddd;
    border-radius:12px;
    outline:none;
    font-size:14px;
    transition:0.2s;
}

/* focus */
input:focus{
    border-color:#0072ff;
    box-shadow:0 0 0 3px rgba(0,114,255,0.1);
}

/* BUTTON */
button{
    width:100%;
    padding:13px;
    margin-top:15px;
    border:none;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    color:white;
    cursor:pointer;
    background:#111;
    transition:0.3s;
}

/* hover */
button:hover{
    background:#000;
    transform:translateY(-1px);
}

/* LINK */
a{
    color:#0072ff;
    text-decoration:none;
}

p{
    margin-top:15px;
    font-size:14px;
    color:#555;
}
</style>

</head>
<body>

<div class="box">
<a href="dashboard.php" style="text-decoration:none; color:inherit;">
    <h2>Admin Dashboard</h2>
</a>
<h2>Welcome Back</h2>

<?php if($error != "") { ?>
    <div class="error"><?php echo $error; ?></div>
<?php } ?>

<form method="POST">

<input type="email" name="email" placeholder="Email address" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Sign in</button>

</form>


</div>

</body>
</html>