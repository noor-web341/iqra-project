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
.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.add-btn{
    background:#22c55e;
    color:white;
    padding:10px 16px;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.add-btn:hover{
    background:#16a34a;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

th, td{
    padding:12px;
    border:1px solid #ddd;
}

th{
    background:#2563eb;
    color:white;
}

.edit{ color:#2563eb; }
.delete{ color:red; }
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