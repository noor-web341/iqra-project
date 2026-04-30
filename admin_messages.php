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
    <a href="add_question.php" class="<?= ($page == 'add_question') ? 'active' : '' ?>">
        Add Quiz Question
    </a>
</li>
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
        <a href="mailto:<?php echo $row['email']; ?>">Reply</a>
    </div>
</div>

<?php } ?>

</div>

</main>

</div>

</body>
</html>