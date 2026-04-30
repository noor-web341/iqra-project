<?php 
$page = "add_question"; 
include "db.php"; 
?>

<?php
if(isset($_POST['submit'])){

    $surah_id = $_POST['surah_id'];
    $surah_name = $_POST['surah_name'];
    $question = $_POST['question'];
    $a = $_POST['option_a'];
    $b = $_POST['option_b'];
    $c = $_POST['option_c'];
    $d = $_POST['option_d'];
    $correct = $_POST['correct_answer'];

    mysqli_query($conn, "INSERT INTO quiz_questions 
    (surah_id, surah_name, question, option_a, option_b, option_c, option_d, correct_answer)
    VALUES 
    ('$surah_id','$surah_name','$question','$a','$b','$c','$d','$correct')");

    $msg = "✅ Question Added Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Question</title>
<link rel="stylesheet" href="dashboard.css">
</head>

<body>

<div class="container">

<!-- SIDEBAR -->
<aside class="sidebar">
    <h2>🕌 IQRA</h2>
    <ul>

        <li>
            <a href="dashboard.php" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
        </li>

        <li>
            <a href="users.php" class="<?= ($page == 'users') ? 'active' : '' ?>">Users</a>
        </li>

        <li>
            <a href="admin_books.php" class="<?= ($page == 'books') ? 'active' : '' ?>">Hadith Books</a>
        </li>

        <li>
            <a href="admin_hadiths.php" class="<?= ($page == 'hadiths') ? 'active' : '' ?>">Hadiths</a>
        </li>

        <li>
            <a href="admin_messages.php" class="<?= ($page == 'messages') ? 'active' : '' ?>">Messages</a>
        </li>

        <li>
            <a href="add_question.php" class="<?= ($page == 'add_question') ? 'active' : '' ?>">Add Question</a>
        </li>

    </ul>
</aside>

<!-- MAIN -->
<main class="main">

<h2> Add Quiz Question</h2>

<?php if(isset($msg)) echo "<div class='success'>$msg</div>"; ?>

<div class="form-box">

<form method="POST">

    <label>Surah ID</label>
    <input type="number" name="surah_id" required>

    <label>Surah Name</label>
    <input type="text" name="surah_name" required>

    <label>Question</label>
    <textarea name="question" required></textarea>

    <label>Option A</label>
    <input type="text" name="option_a" required>

    <label>Option B</label>
    <input type="text" name="option_b" required>

    <label>Option C</label>
    <input type="text" name="option_c" required>

    <label>Option D</label>
    <input type="text" name="option_d" required>

    <label>Correct Answer (a/b/c/d)</label>
    <input type="text" name="correct_answer" required>

    <button type="submit" name="submit">➕ Add Question</button>

</form>

</div>

</main>

</div>

</body>
</html>