<!-- <!DOCTYPE html>
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
    <h1>IQRA</h1>
    <h4>السلام عليكم</h4>
    <h3>Create Account</h3>

    <div class="input-group">
        <input type="text" id="name" placeholder="Full Name">
    </div>

    <div class="input-group">
        <input type="email" id="email" placeholder="Email">
    </div>

    <div class="input-group">
        <input type="password" id="password" placeholder="Password" onkeyup="checkStrength()">
        <span onclick="togglePassword('password')" class="toggle">👁</span>
    </div>

    <div id="strength"></div>

  <a href="index.html"><button onclick="login()">Sign Up</button></a>

    <p>Already have an account? <a href="login.html">Login</a></p>
    <p id="message"></p>
</div> -->
<!-- <script>
    if (sessionStorage.getItem("iqraLoggedIn") !== "true") {
        window.location.href = "login.html";
    }
    function logout() {
    sessionStorage.removeItem("iqraLoggedIn");
    window.location.href = "login.html";
}

</script> -->
<!-- <script src="signIn.js"></script>
</body>
</html> -->

<?php
$conn = mysqli_connect("localhost", "root", "", "iqra_db");

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
            echo "<script>
                    alert('Signup Successful');
                    window.location='login.php';
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