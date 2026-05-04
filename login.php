<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        // 🔐 ORIGINAL SESSIONS (UNCHANGED)
        $_SESSION['user'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        // ⭐ ADDITION (IMPORTANT FOR QUIZ/PREMIUM SYSTEM)
        $_SESSION['user_id'] = $user['id'];

        if($user['role'] === 'admin'){
            header("Location: dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<script>alert('Invalid login');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Secure Sign In | IQRA</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="signIn.css">

</head>
<body>

<div class="overlay"></div>

<div class="card">
   <a href="index.php" class="borl">
    <h1>IQRA</h1>
</a>
    <h4>بِسْمِ ٱللَّٰهِ</h4>
    <h3>Login to Continue</h3>

    <!-- UPDATED FORM -->
    <form method="POST">

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" name="login">Login</button>

    </form>

    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
</div>

</body>
</html>