<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>My Notes</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background:linear-gradient(180deg,#f5f7fb,#eef2f7);
}

/* HEADER */
.header{
    background:linear-gradient(135deg,#3498db,#2ecc71);
    color:white;
    padding:18px;
    text-align:center;
    font-size:22px;
    font-weight:600;
    letter-spacing:0.5px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

.back-arrow{
    position:fixed;
    top:15px;
    left:15px;
    cursor:pointer;
    font-size:18px;
    font-weight:bold;
    color:#333;
    background:none;
    width:auto;
    height:auto;
    border-radius:0;
    box-shadow:none;
    display:inline-block;
    transition:0.2s;
}

.back-arrow:hover{
    opacity:0.7;
    transform:none;
}
/* NOTES WRAPPER */
.container{
    padding:15px;
    max-width:600px;
    margin:auto;
}

/* NOTE CARD */
.card{
    background:white;
    margin:15px 0;
    padding:18px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
    transition:0.2s;
    border-left:5px solid #2ecc71;
}

.card:hover{
    transform:translateY(-2px);
}

.card h3{
    margin:0;
    color:#222;
    font-size:18px;
}

.card p{
    color:#666;
    margin-top:8px;
    line-height:1.5;
}

/* ACTIONS */
.actions{
    margin-top:12px;
}

.actions a{
    margin-right:12px;
    text-decoration:none;
    font-size:14px;
    font-weight:500;
}

.actions a:first-child{
    color:#3498db;
}

.actions a:last-child{
    color:#e74c3c;
}

/* FLOAT BUTTON */
.add-btn{
    position:fixed;
    bottom:20px;
    right:20px;
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    width:60px;
    height:60px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    text-decoration:none;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
    transition:0.2s;
}

.add-btn:hover{
    transform:scale(1.1);
}

/* EMPTY STATE */
.empty{
    text-align:center;
    margin-top:80px;
    color:#777;
}

.empty h2{
    font-size:20px;
    margin-bottom:10px;
}

.empty p{
    font-size:14px;
    color:#999;
}
</style>
</head>

<body>

  <div class="back-arrow" onclick="goBack()">
    IQRA
</div>

<div class="header">📒 My Personal Notes</div>

<div class="container">

<?php if(mysqli_num_rows($result) > 0){ ?>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div class="card">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo htmlspecialchars($row['note']); ?></p>

        <div class="actions">
            <a href="edit_note.php?id=<?php echo $row['id']; ?>">✏️ Edit</a>
            <a href="delete_note.php?id=<?php echo $row['id']; ?>">🗑 Delete</a>
        </div>
    </div>

    <?php } ?>

<?php } else { ?>

    <!-- ✅ NEW EMPTY STATE -->
    <div class="empty">
        <h2>📝 No Notes Yet</h2>
        <p>Start your journey by adding your first personal note ✨</p>
    </div>

<?php } ?>

</div>

<a class="add-btn" href="add_note.php">+</a>

<script>
function goBack(){
   window.location.href = "index.php";
}
</script>

</body>
</html>