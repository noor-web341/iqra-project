<?php
include "db.php";
session_start();

$user_id = $_SESSION['user_id'] ?? 0;
$txn = trim($_POST['transaction_id']);

if($user_id == 0){
    die("❌ Login required");
}

if(strlen($txn) < 8){
    die("❌ Invalid Transaction ID");
}

// check duplicate
$check = mysqli_query($conn,"SELECT * FROM payments WHERE transaction_id='$txn'");

if(mysqli_num_rows($check) > 0){
    die("❌ Transaction Already Used");
}

// save payment (ONLY ONCE)
mysqli_query($conn,"INSERT INTO payments(user_id,transaction_id,amount,status)
VALUES('$user_id','$txn',500,'verified')");

// update premium
mysqli_query($conn,"UPDATE user SET is_premium=1 WHERE id='$user_id'");

// update session
$_SESSION['is_premium'] = 1;

// redirect
//  header("Location: .php");
// exit;
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Success | IQRA</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* CENTER CARD */
.card{
    background:white;
    width:380px;
    padding:35px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 20px 50px rgba(0,0,0,0.5);
    animation:pop 0.4s ease-in-out;
}

/* SUCCESS ICON */
.icon{
    font-size:60px;
    margin-bottom:10px;
}

/* TITLE */
h1{
    color:#16a34a;
    font-size:26px;
    margin:10px 0;
}

/* TEXT */
p{
    color:#6b7280;
    font-size:14px;
}

/* BUTTON */
a{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:bold;
    transition:0.3s;
}

a:hover{
    transform:scale(1.05);
}

/* ANIMATION */
@keyframes pop{
    from{
        transform:scale(0.8);
        opacity:0;
    }
    to{
        transform:scale(1);
        opacity:1;
    }
}
</style>

</head>

<body>

<div class="card">

    <div class="icon">🎉</div>

    <h1>Payment Verified</h1>

    <p>Your premium access has been successfully activated.</p>

    <a href="quran_quiz.php">➡ Go to Quiz</a>

</div>

</body>
</html>