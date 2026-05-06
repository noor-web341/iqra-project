<?php $page = "hadiths"; ?>
<?php
include "db.php";

// ADD HADITH
if(isset($_POST['add'])){
    $book_id = $_POST['book_id'];
    $arabic = $_POST['arabic'];
    $english = $_POST['english'];
    $status = $_POST['status'];
    $reference = $_POST['reference'];

    mysqli_query($conn,"
        INSERT INTO hadiths (book_id, arabic, english, status, reference)
        VALUES ('$book_id','$arabic','$english','$status','$reference')
    ");
}

// DELETE
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM hadiths WHERE id=$id");
}

$books = mysqli_query($conn,"SELECT * FROM books");

$hadiths = mysqli_query($conn,"
SELECT h.*, b.name as book_name 
FROM hadiths h 
JOIN books b ON h.book_id = b.id
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Hadiths</title>
<link rel="stylesheet" href="dashboard.css">

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

/* ================= FORM ================= */
form{
    background:#fff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    display:flex;
    flex-direction:column;
    gap:12px;
    margin-bottom:20px;
}

select,
textarea,
input{
    width:100%;
    padding:12px;
    border:1px solid #e5e7eb;
    border-radius:10px;
    background:#f9fafb;
    font-size:14px;
    transition:0.3s;
}

textarea{
    min-height:90px;
    resize:none;
}

select:focus,
textarea:focus,
input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,0.15);
    background:#fff;
    outline:none;
}

/* BUTTON */
button{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    padding:12px;
    border:none;
    border-radius:10px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
}

/* ================= TABLE ================= */
.table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
}

.table th{
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
    text-align:left;
    padding:14px;
}

.table td{
    padding:14px;
    border-bottom:1px solid #eee;
    vertical-align:top;
}

/* HOVER ROW */
.table tr:hover{
    background:#f9fafb;
}

/* ================= HADITH CONTENT STYLE ================= */
.table td p{
    margin:4px 0;
    font-size:13px;
    line-height:1.4;
}

/* ================= ACTION LINKS ================= */
.table a{
    display:inline-block;
    margin-right:8px;
    padding:6px 10px;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
}

.table a:first-child{
    background:#f59e0b;
    color:white;
}

.table a:last-child{
    background:#ef4444;
    color:white;
}

.table a:hover{
    opacity:0.85;
}

/* ================= RESPONSIVE ================= */
@media(max-width:768px){

    .sidebar{
        width:200px;
    }

    .main{
        margin-left:200px;
        padding:15px;
    }

    form{
        padding:15px;
    }

    .table td{
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

<!-- MAIN -->
<main class="main">

<h2>📖 Hadiths</h2>

<!-- FORM -->
<form method="POST">

    <select name="book_id" required>
        <option value="">Select Book</option>
        <?php while($b = mysqli_fetch_assoc($books)) { ?>
            <option value="<?php echo $b['id']; ?>">
                <?php echo $b['name']; ?>
            </option>
        <?php } ?>
    </select>

    <textarea name="arabic" placeholder="Arabic Hadith" required></textarea>
    <textarea name="english" placeholder="English Hadith" required></textarea>

    <input type="text" name="reference" placeholder="Reference">

    <select name="status">
        <option value="authentic">Authentic</option>
        <option value="weak">Weak</option>
    </select>

    <button name="add">Add Hadith</button>
</form>

<br>

<!-- TABLE -->
<table class="table">
<tr>
    <th>Book</th>
    <th>Hadith</th>
    <th>Action</th>
</tr>

<?php while($h = mysqli_fetch_assoc($hadiths)) { ?>
<tr>
    <td><?php echo $h['book_name']; ?></td>

    <td>
        <p><b>Arabic:</b> <?php echo $h['arabic']; ?></p>
        <p><b>English:</b> <?php echo $h['english']; ?></p>
        <p><b>Reference:</b> <?php echo $h['reference']; ?></p>
        <p><b>Status:</b> <?php echo $h['status']; ?></p>
    </td>

    <td>
        <a href="edit_hadith.php?id=<?php echo $h['id']; ?>">✏️ Edit</a>
        <a href="?delete=<?php echo $h['id']; ?>">🗑 Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</main>

</div>

</body>
</html>