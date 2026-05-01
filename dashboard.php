<?php $page = "dashboard"; ?>
<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

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

$user_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));
$msg_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM contact_messages"));
?>

<!DOCTYPE html>
<html>
<head>
<title>IQRA Dashboard</title>
<link rel="stylesheet" href="dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="container">

<!-- Sidebar -->
<aside class="sidebar">
    <h2>🕌 IQRA</h2>
    <ul>
        <li>
            <a href="dashboard.php" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
                Dashboard
            </a>
        </li>

        <li>
            <a href="users.php" class="<?= ($page == 'users') ? 'active' : '' ?>">
                Users
            </a>
        </li>

        <li>
            <a href="admin_books.php" class="<?= ($page == 'books') ? 'active' : '' ?>">
                Hadith Books
            </a>
        </li>

        <li>
            <a href="admin_hadiths.php" class="<?= ($page == 'hadiths') ? 'active' : '' ?>">
                Hadiths
            </a>
        </li>

        <li>
            <a href="admin_messages.php" class="<?= ($page == 'messages') ? 'active' : '' ?>">
                Messages
            </a>
        </li>
        <li>
    <a href="add_question.php" class="<?= ($page == 'add_question') ? 'active' : '' ?>">
        Add Quiz Question
    </a>
</li>

    </ul>
</aside>

<!-- Main -->
<main class="main">

    <h1>Dashboard</h1>

    <!-- Cards -->
    <div class="cards">
        <div class="card">
            <h3>Total Users</h3>
            <p><?php echo $user_count; ?></p>
        </div>

        <div class="card">
            <h3>Total Messages</h3>
            <p><?php echo $msg_count; ?></p>
        </div>

        <div class="card">
            <h3>Status</h3>
            <p>Active ✅</p>
        </div>
    </div>

    <!-- SMALL CHART -->
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
            data: [<?php echo $user_count; ?>, <?php echo $msg_count; ?>],
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

</body>
</html>