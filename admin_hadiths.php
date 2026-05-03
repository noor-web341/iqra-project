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