
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
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

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check existing email
    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email already exists');</script>";
    } else {
        $query = "INSERT INTO user (name, email, password, role) 
                  VALUES ('$name','$email','$password','user')";

      if(mysqli_query($conn, $query)){

    // 🔥 naya user fetch karo
    $user_query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    $user = mysqli_fetch_assoc($user_query);

    // 🔐 session set (AUTO LOGIN)
    $_SESSION['user'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['user_id'] = $user['id'];

    echo "<script>
            alert('Signup Successful 🎉');
            window.location='index.php';
          </script>";
        } else {
            echo "<script>alert('Database Error');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up | IQRA</title>


<link rel="stylesheet" href="signIn.css">


</head>

<body>

<div class="overlay"></div>

<div class="card">
    <h1>IQRA</h1>
    <h4>Welcome</h4>
    <h3>Create Account</h3>

    <!-- UPDATED FORM -->
    <form method="POST">

        <div class="input-group">
            <input type="text" name="name" placeholder="Full Name" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <!-- PASSWORD FIELD -->
        <div class="input-group password-field">
            <input type="password" name="password" id="password" placeholder="Password" onkeyup="checkStrength()" required>
            <i class="fa-solid fa-eye toggle" onclick="togglePassword()"></i>
        </div>

        <div id="strength"></div>

        <button type="submit" name="signup">Sign Up</button>

    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

<script src="signIn.js"></script>

</body>
</html>