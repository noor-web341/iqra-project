<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
include "db.php";

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔥 NEW FIELDS
    $country = $_POST['country'];
    $city = $_POST['city'];

    // check existing email
    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email already exists');</script>";
    } else {
        $query = "INSERT INTO user (name, email, password, role, country, city) 
                  VALUES ('$name','$email','$password','user','$country','$city')";

      if(mysqli_query($conn, $query)){

    // 🔥 naya user fetch karo
    $user_query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    $user = mysqli_fetch_assoc($user_query);

    // 🔐 session set (AUTO LOGIN)
    $_SESSION['user'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['user_id'] = $user['id'];

    echo "<script>
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
   <a href="index.php" class="borl">
    <h1>IQRA</h1>
</a>
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
<div class="input-group">
    <select name="country" id="country" onchange="updateCities()" required>
        <option value="">Select Country</option>
        <option value="Pakistan">Pakistan</option>
        <option value="India">India</option>
    </select>
</div>

<div class="input-group">
    <select name="city" id="city" required>
        <option value="">Select City</option>
    </select>
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