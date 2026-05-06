<?php $page = "books"; ?>
<?php
include "db.php";

// ADD BOOK
if(isset($_POST['add_book'])){
    $name = $_POST['name'];

    mysqli_query($conn,"INSERT INTO books (name) VALUES ('$name')");
}

// DELETE BOOK
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM books WHERE id=$id");
}

$books = mysqli_query($conn,"SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <link rel="stylesheet" href="dashboard.css">
<style>
    /* Add any custom styles for the books page here */
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

/* ACTIVE LINK */
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
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:20px;
    display:flex;
    gap:10px;
    align-items:center;
}

input[type="text"]{
    flex:1;
    padding:12px;
    border:1px solid #e5e7eb;
    border-radius:10px;
    outline:none;
    background:#f9fafb;
    transition:0.3s;
}

input[type="text"]:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,0.15);
    background:#fff;
}

button{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white;
    padding:12px 18px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
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
    text-align:left;
    padding:14px;
}

.table td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.table tr:hover{
    background:#f9fafb;
}

/* DELETE LINK */
.table a{
    color:#ef4444;
    text-decoration:none;
    font-weight:600;
}

.table a:hover{
    text-decoration:underline;
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
        flex-direction:column;
        align-items:stretch;
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

        <h2>📚 Hadith Books</h2>

        <!-- ADD FORM -->
        <form method="POST">
            <input type="text" name="name" placeholder="Book Name" required>
            <button name="add_book">Add Book</button>
        </form>

        <br>

        <!-- TABLE -->
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($books)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td>
                    <a href="?delete=<?php echo $row['id']; ?>">🗑 Delete</a>
                </td>
            </tr>
            <?php } ?>

        </table>

    </main>

</div>

</body>
</html>