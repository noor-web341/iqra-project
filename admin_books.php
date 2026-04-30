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
    <a href="add_question.php" class="<?= ($page == 'add_question') ? 'active' : '' ?>">
        Add Quiz Question
    </a>
</li>
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