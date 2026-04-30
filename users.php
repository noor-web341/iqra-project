<?php $page = "users"; ?>
<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","iqra_db");

// search
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = mysqli_query($conn,"SELECT * FROM user WHERE name LIKE '%$search%' OR email LIKE '%$search%'");
} else {
    $result = mysqli_query($conn,"SELECT * FROM user");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Users</title>
<link rel="stylesheet" href="dashboard.css">
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

<h1>Manage Users</h1>

<!-- Search -->
<form method="GET">
<input type="text" name="search" placeholder="Search user..." value="<?php echo $search; ?>">
<button>Search</button>
</form>

<!-- Table -->
<table class="table">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>
<a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a> |
<a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</main>
</div>

</body>
</html>