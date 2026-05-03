<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin'){
    header("Location: admin_login.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","iqra_db");
if(!$conn){
    die("Database connection failed");
}

$user_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));
$msg_count  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM contact_messages"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IQRA Admin Dashboard</title>

<link rel="stylesheet" href="dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
/* fallback safe layout fix (important) */
body{
    margin:0;
    font-family:Segoe UI;
    background:#f4f6fb;
}

/* ===== NAVBAR ===== */
.navbar{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:60px;
    background:#111827;
    color:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 20px;
    z-index:1000;
}

.nav-left{
    font-weight:bold;
    font-size:18px;
}

.nav-center a{
    color:#cbd5e1;
    text-decoration:none;
    margin:0 10px;
    font-size:14px;
}

.nav-center a:hover{
    color:white;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:10px;
}

.logout-btn{
    background:#ef4444;
    padding:6px 12px;
    color:white;
    border-radius:6px;
    text-decoration:none;
}

/* ===== LAYOUT ===== */
.container{
    display:flex;
    margin-top:60px;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:220px;
    height:100vh;
    background:#0f172a;
    color:white;
    padding:20px;
    position:fixed;
    left:0;
    top:60px;
}

.sidebar ul{
    list-style:none;
    padding:0;
}

.sidebar ul li a{
    display:block;
    padding:10px;
    color:#cbd5e1;
    text-decoration:none;
    border-radius:6px;
}

.sidebar ul li a:hover{
    background:#2563eb;
    color:white;
}

/* ===== MAIN ===== */
.main{
    margin-left:240px;
    padding:20px;
    width:100%;
}

/* ===== CARDS ===== */
.cards{
    display:flex;
    gap:20px;
}

.card{
    flex:1;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    text-align:center;
}

/* ===== CHART ===== */
.chart-box{
    background:white;
    margin-top:20px;
    padding:20px;
    border-radius:10px;
    height:360px;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-left">🕌 IQRA ADMIN</div>

    <!-- <div class="nav-center">
        <a href="dashboard.php">Dashboard</a>
        <a href="users.php">Users</a>
        <a href="admin_books.php">Books</a>
        <a href="admin_messages.php">Messages</a>
    </div> -->

    <div class="nav-right">
        <span>👤 <?php echo $_SESSION['user']; ?></span>
        <a href="admin_logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<!-- PAGE -->
<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="admin_books.php">Hadith Books</a></li>
            <li><a href="admin_hadiths.php">Hadiths</a></li>
            <li><a href="admin_messages.php">Messages</a></li>
            <li><a href="all_questions.php"> Quiz Questions</a></li>
        </ul>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <h2>Dashboard</h2>

        <!-- CARDS -->
        <div class="cards">

            <div class="card">
                <h3>Users</h3>
                <p><?php echo $user_count; ?></p>
            </div>

            <div class="card">
                <h3>Messages</h3>
                <p><?php echo $msg_count; ?></p>
            </div>

            <div class="card">
                <h3>Status</h3>
                <p>Active</p>
            </div>

        </div>

        <!-- CHART -->
        <div class="chart-box">
            <canvas id="chart"></canvas>
        </div>

    </main>

</div>

<script>
new Chart(document.getElementById('chart'), {
    type: 'doughnut',
    data: {
        labels: ['Users', 'Messages'],
        datasets: [{
            data: [<?php echo $user_count; ?>, <?php echo $msg_count; ?>]
        }]
    }
});
</script>

</body>
</html>