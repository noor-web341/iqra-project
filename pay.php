<!DOCTYPE html>
<html>
<head>
<title>Payment | IQRA</title>

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
    box-shadow:0 15px 40px rgba(0,0,0,0.5);
    text-align:center;
    animation:fadeIn 0.5s ease-in-out;
}

/* TITLE */
.card h2{
    margin:0;
    font-size:26px;
}

/* NUMBER BOX */
.number{
    background:#f1f5f9;
    padding:12px;
    margin:15px 0;
    border-radius:10px;
    font-weight:bold;
    font-size:18px;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,#16a34a,#22c55e);
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:scale(1.05);
}

/* LABEL */
label{
    font-size:14px;
    color:gray;
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

    <h2>💳 Premium Payment</h2>

    <p>Send payment to this number:</p>

    <div class="number">📱+923160764988</div>

    <label>Amount: 500 PKR</label>

    <form action="verify.php" method="POST">

        <!-- IMPORTANT: replace 1 with session user_id later -->
       <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <input type="text" name="transaction_id" placeholder="Enter Transaction ID" required>

        <button type="submit">✔ Verify Payment</button>

    </form>

</div>

</body>
</html>