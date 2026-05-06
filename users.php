<?php $page = "users"; ?>
<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

include "db.php";

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

/* TITLE */
.main h2{
    margin-bottom:15px;
}

/* ================= SEARCH FORM ================= */
form{
    display:flex;
    gap:10px;
    margin-bottom:20px;
}

form input{
    flex:1;
    padding:12px;
    border-radius:10px;
    border:1px solid #e5e7eb;
    background:#fff;
    outline:none;
}

form input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,0.15);
}

form button{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:0.3s;
}

form button:hover{
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

th{
    background:linear-gradient(90deg,#2563eb,#1d4ed8);
    color:white;
    padding:14px;
    text-align:left;
}

td{
    padding:12px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f9fafb;
}

/* ================= ACTION LINKS ================= */
td a{
    text-decoration:none;
    font-weight:600;
    margin-right:8px;
    padding:6px 10px;
    border-radius:8px;
    font-size:13px;
}

td a[href*="edit"]{
    background:#f59e0b;
    color:white;
}

td a[href*="delete"]{
    background:#ef4444;
    color:white;
}

td a:hover{
    opacity:0.85;
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

    form{
        flex-direction:column;
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