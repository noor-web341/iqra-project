<?php $page = "users"; ?>
<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

/* DB */
$conn = mysqli_connect("localhost","root","","iqra_db");
if(!$conn){
    die("Database connection failed");
}

/* SEARCH */
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];

    $result = mysqli_query($conn,
    "SELECT * FROM user 
     WHERE name LIKE '%$search%' 
     OR country LIKE '%$search%' 
     OR city LIKE '%$search%'"
    );

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

<!-- SIDEBAR -->
<aside class="sidebar">
    <h2>🕌 IQRA</h2>

    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="users.php" class="active">Users</a></li>
        <li><a href="admin_books.php">Hadith Books</a></li>
        <li><a href="admin_hadiths.php">Hadiths</a></li>
        <li><a href="admin_messages.php">Messages</a></li>
        <li><a href="all_questions.php"> Quiz Questions</a></li>
    </ul>
</aside>

<!-- MAIN -->
<main class="main">

<h2>Manage Users</h2>

<!-- SEARCH -->
<form method="GET">
    <input type="text" name="search" placeholder="Search name, country, city..." value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>

<!-- TABLE -->
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Country</th>
    <th>City</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['country']; ?></td>
    <td><?php echo $row['city']; ?></td>

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