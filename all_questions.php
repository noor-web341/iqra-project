<?php 
$page = "add_question"; 
include "db.php";

/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM quiz_questions WHERE id=$id");
    header("Location: all_questions.php");
    exit();
}

/* GET QUESTIONS */
$result = mysqli_query($conn,"SELECT * FROM quiz_questions ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>All Questions</title>
<link rel="stylesheet" href="dashboard.css">

<style>


html, body{
    margin:0;
    padding:0;
    font-family:"Segoe UI", sans-serif;
    background:linear-gradient(135deg,#f1f5f9,#e2e8f0);
}

/* ================= LAYOUT ================= */
.container{
    display:flex;
    min-height:100vh;
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
    overflow-y:auto;
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

.sidebar ul li a:hover,
.sidebar ul li a.active{
    background:#2563eb;
    color:white;
    transform:translateX(5px);
}

/* ================= MAIN ================= */
.main{
    margin-left:240px;
    padding:25px;
    width:calc(100% - 240px);
}

/* ================= TOP BAR ================= */
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.top-bar h2{
    font-size:22px;
}

/* ================= ADD BUTTON ================= */
.add-btn{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    padding:10px 16px;
    text-decoration:none;
    border-radius:10px;
    font-weight:600;
    transition:0.3s;
}

.add-btn:hover{
    transform:scale(1.05);
}

/* ================= TABLE ================= */
table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
}

/* HEADER */
th{
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
    padding:14px;
    text-align:left;
    font-size:14px;
}

/* CELLS */
td{
    padding:12px;
    border-bottom:1px solid #eee;
    font-size:14px;
}

/* ROW HOVER */
tr:hover{
    background:#f9fafb;
}

/* ================= ACTION LINKS ================= */
.edit{
    color:#2563eb;
    font-weight:600;
    text-decoration:none;
    margin-right:8px;
}

.delete{
    color:#ef4444;
    font-weight:600;
    text-decoration:none;
}

.edit:hover,
.delete:hover{
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

    table{
        font-size:13px;
    }
}
</style>

</head>
<body>

<div class="container">

<!-- SIDEBAR -->
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

<!-- MAIN CONTENT -->
<main class="main">

<div class="top-bar">
    <h2>📚 All Questions</h2>

    <!-- ADD BUTTON -->
    <a href="add_question.php" class="add-btn">➕ Add Question</a>
</div>

<table>
<tr>
<th>ID</th>
<th>Surah</th>
<th>Question</th>
<th>Answer</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['surah_name'] ?></td>
<td><?= $row['question'] ?></td>
<td><?= strtoupper($row['correct_answer']) ?></td>
<td>
<a class="edit" href="edit_question.php?id=<?= $row['id'] ?>">✏️ Edit</a> |
<a class="delete" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete?')">🗑 Delete</a>
</td>
</tr>
<?php } ?>

</table>

</main>

</div>

</body>
</html>