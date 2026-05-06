<?php $page = "transactions"; ?>
<?php
include "db.php";

/* FETCH PAYMENTS */
$query = "SELECT * FROM payments ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

/* TOTAL REVENUE */
$totalQuery = "SELECT SUM(amount) AS total_amount FROM payments WHERE LOWER(status)='verified'";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalAmount = $totalRow['total_amount'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions Report</title>

<style>

/* ================= RESET ================= */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", sans-serif;
}

body{
    background:linear-gradient(135deg,#f1f5f9,#e2e8f0);
    color:#111827;
}

/* ================= LAYOUT ================= */
.container{
    display:flex;
}

/* ================= SIDEBAR ================= */
.sidebar{
    width:240px;
    height:100vh;
    background:rgba(15,23,42,0.97);
    color:white;
    padding:20px;
    position:fixed;
    left:0;
    top:0;
    box-shadow:2px 0 20px rgba(0,0,0,0.2);
}

.sidebar h2{
    margin-bottom:20px;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    margin:10px 0;
}

.sidebar ul li a{
    display:block;
    padding:12px;
    color:#cbd5e1;
    text-decoration:none;
    border-radius:10px;
    transition:0.3s;
}

.sidebar ul li a:hover{
    background:#2563eb;
    color:white;
    transform:translateX(5px);
}

.sidebar ul li a.active{
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
}

/* ================= MAIN ================= */
.main{
    margin-left:240px;
    padding:30px;
    width:100%;
}

.main h2{
    font-size:26px;
    margin-bottom:20px;
}

/* ================= TOTAL BOX ================= */
.total-box{
    background:linear-gradient(135deg,#1f4037,#99f2c8);
    color:white;
    padding:20px;
    border-radius:15px;
    width:260px;
    text-align:center;
    margin-bottom:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.total-box h3{
    font-size:18px;
}

.total-box h2{
    font-size:28px;
    margin-top:10px;
}

/* ================= TABLE ================= */
.table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
}

.table th{
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
    padding:14px;
    text-align:left;
}

.table td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.table tr:hover{
    background:#f9fafb;
}

/* STATUS */
.status{
    padding:5px 10px;
    border-radius:5px;
    color:white;
}

.success{ background:green; }
.pending{ background:orange; }
.failed{ background:red; }

</style>
</head>

<body>

<div class="container">

<!-- SIDEBAR -->
<aside class="sidebar">
    <h2>🕌 IQRA</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="admin_books.php">Hadith Books</a></li>
        <li><a href="admin_hadiths.php">Hadiths</a></li>
        <li><a href="admin_messages.php">Messages</a></li>
        <li><a href="all_questions.php">Quiz Questions</a></li>
        <li><a href="transactions_report.php" class="<?= ($page == 'transactions') ? 'active' : '' ?>">
            Transactions
        </a></li>
    </ul>
</aside>

<!-- MAIN -->
<main class="main">

    <h2>💰 Transactions Report</h2>

    <!-- TOTAL BOX -->
    <div class="total-box">
        <h3>Total Revenue</h3>
        <h2><?php echo $totalAmount ? $totalAmount : 0; ?> PKR</h2>
    </div>

    <!-- TABLE -->
    <table class="table">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Transaction ID</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['transaction_id']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td>
                <span class="status 
                    <?php 
                        if(strtolower($row['status'])=='verified') echo 'success';
                        else if(strtolower($row['status'])=='pending') echo 'pending';
                        else echo 'failed';
                    ?>">
                    <?php echo $row['status']; ?>
                </span>
            </td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>

    </table>

</main>

</div>

</body>
</html>