<?php $page = "messages"; ?>
<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Messages</title>
<link rel="stylesheet" href="dashboard.css">
<style>
html, body{
    margin:0;
    padding:0;
    font-family:Segoe UI, sans-serif;
    background:#f8fafc;
}

/* ================= LAYOUT ================= */
.container{
    display:flex;
}

/* ================= SIDEBAR ================= */
.sidebar{
    width:220px;
    min-height:100vh;
    background:#111827;
    color:white;
    position:fixed;
    left:0;
    top:0;
    padding:15px;
    overflow-y:auto;
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

.sidebar ul li a:hover,
.sidebar ul li a.active{
    background:#2563eb;
    color:white;
}

/* ================= MAIN (IMPORTANT FIX) ================= */
.main{
    margin-left:220px;
    padding:20px;
    width:calc(100% - 220px);
}

/* TITLE */
.main h2{
    margin:0 0 15px 0;
}

/* ================= GRID ================= */
.msg-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:12px;   /* tight clean spacing */
}

/* ================= CARD ================= */
.msg-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:10px;
    padding:15px;
}

/* TEXT CLEAN */
.msg-card h3{
    margin:0 0 5px 0;
    font-size:16px;
}

.msg-card p{
    margin:3px 0;
    font-size:14px;
    color:#374151;
}

.msg-card small{
    display:block;
    margin-top:8px;
    font-size:12px;
    color:#6b7280;
}

/* ================= ACTION ================= */
.actions{
    margin-top:10px;
    text-align:right;
}

.actions a{
    color:#ef4444;
    text-decoration:none;
    font-weight:600;
    font-size:13px;
}

.actions a:hover{
    text-decoration:underline;
}

/* ================= RESPONSIVE ================= */
@media(max-width:768px){
    .sidebar{
        width:200px;
    }

    .main{
        margin-left:200px;
        width:calc(100% - 200px);
    }

    .msg-container{
        grid-template-columns:1fr;
    }
}
</style>
</head>

<body>

<div class="container">

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
    <a href="all_questions.php" class="<?= ($page == 'add_question') ? 'active' : '' ?>">
        Quiz Questions
    </a>
</li>
<li><a href="transactions_report.php" class="<?= ($page == 'transactions') ? 'active' : '' ?>">
            Transactions
        </a></li>
    </ul>
</aside>

<main class="main">

<h2>📩 Contact Messages</h2>

<div class="msg-container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="msg-card">
    <h3><?php echo $row['name']; ?></h3>
    <p><?php echo $row['email']; ?></p>
    <p><?php echo $row['message']; ?></p>

    <small><?php echo $row['created_at']; ?></small>

    <div class="actions">
        <a href="delete_msg.php?id=<?php echo $row['id']; ?>">Delete</a>
        
    </div>
</div>

<?php } ?>

</div>

</main>

</div>

</body>
</html>