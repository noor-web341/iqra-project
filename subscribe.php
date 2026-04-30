<?php
session_start();
$user_id = $_SESSION['user_id'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Subscribe | Premium Quiz</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    color:white;
}

/* MAIN CARD */
.card{
    background:white;
    color:black;
    width:380px;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 15px 40px rgba(0,0,0,0.4);
    animation:fadeIn 0.5s ease-in-out;
}

/* TITLE */
.card h2{
    margin:0;
    font-size:28px;
    color:#111827;
}

/* PRICE */
.price{
    font-size:40px;
    font-weight:bold;
    color:#16a34a;
    margin:15px 0;
}

/* TEXT */
.card p{
    color:gray;
    font-size:14px;
}

/* BUTTON */
.btn{
    display:block;
    margin-top:20px;
    padding:12px;
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:bold;
    transition:.3s;
}

.btn:hover{
    transform:scale(1.05);
}

/* SECOND BUTTON */
.secondary{
    background:#f1f5f9;
    color:black;
    margin-top:10px;
}

/* ANIMATION */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}
</style>

</head>

<body>

<div class="card">

    <h2>🔐 Premium Subscription</h2>

    <p>Unlock Quran Quiz</p>

    <div class="price">500 PKR</div>

    <p>Pay once and get lifetime access</p>

    <!-- Payment Button -->
    <a href="pay.php" class="btn">💳 Pay Now</a>

    <!-- Back Button -->
    <a href="index.html" class="btn secondary">⬅ Back to Home</a>

</div>

</body>
</html>