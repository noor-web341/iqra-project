<?php
session_start();
include "db.php";

// 🔐 Login check
if(!isset($_SESSION['user_id'])){
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// ✅ fetch results (ONLY YOUR TABLE)
$result = mysqli_query($conn, "
    SELECT * 
    FROM quiz_results 
    WHERE user_id = '$user_id'
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Quiz Results</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background:#f1f5f9;
}

/* HEADER */
.header{
    background:#0f172a;
    color:white;
    padding:18px;
    text-align:center;
    font-size:20px;
    font-weight:700;
    position:relative;
}

/* BACK BUTTON */
.back-arrow{
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);
    width:42px;
    height:42px;
    border-radius:50%;
    background:white;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
}

.back-arrow img{
    width:22px;
    height:22px;
}

/* CONTAINER */
.container{
    max-width:800px;
    margin:30px auto;
    padding:15px;
}

/* CARD */
.card{
    background:white;
    padding:18px;
    margin-bottom:15px;
    border-radius:15px;
    box-shadow:0 4px 15px rgba(0,0,0,0.06);
    border-left:5px solid #6366f1;
    transition:0.2s;
}

.card:hover{
    transform:translateY(-3px);
}

/* TOP ROW */
.top{
    display:flex;
    justify-content:space-between;
    font-weight:600;
    margin-bottom:8px;
}

/* SCORE */
.score{
    color:#22c55e;
    font-weight:700;
}

/* PERCENTAGE */
.percent{
    color:#64748b;
    font-size:14px;
}

/* EMPTY */
.empty{
    text-align:center;
    margin-top:80px;
    color:#64748b;
}
</style>

</head>

<body>

<div class="header">

    <div class="back-arrow" onclick="goBack()">
        <img src="https://cdn-icons-png.flaticon.com/512/507/507257.png">
    </div>

    📊 My Quiz Results
</div>

<div class="container">

<?php if(mysqli_num_rows($result) > 0){ ?>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div class="card">

        <div class="top">
            <div>📖 Surah ID: <?php echo $row['surah_id']; ?></div>
            <div class="score"><?php echo $row['score']; ?>/<?php echo $row['total']; ?></div>
        </div>

        <div class="percent">
            Percentage: <?php echo $row['percentage']; ?>%
        </div>

    </div>

    <?php } ?>

<?php } else { ?>

    <div class="empty">
        <h3>📭 No Quiz Results Yet</h3>
        <p>Start solving quizzes to see your progress here.</p>
    </div>

<?php } ?>

</div>

<script>
function goBack(){
    window.history.back();
}
</script>

</body>
</html>