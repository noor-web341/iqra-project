<?php
include "db.php";

$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM quiz_questions WHERE id=$id");
$row = mysqli_fetch_assoc($result);

/* safety check */
if(!$row){
    die("Question not found!");
}

/* UPDATE */
if(isset($_POST['update'])){

    $surah_name = $_POST['surah_name'];
    $question = $_POST['question'];
    $a = $_POST['option_a'];
    $b = $_POST['option_b'];
    $c = $_POST['option_c'];
    $d = $_POST['option_d'];
    $correct = $_POST['correct_answer'];

    mysqli_query($conn,"UPDATE quiz_questions SET 
        surah_name='$surah_name',
        question='$question',
        option_a='$a',
        option_b='$b',
        option_c='$c',
        option_d='$d',
        correct_answer='$correct'
        WHERE id=$id
    ");

    header("Location: add_question.php");
    exit();
}

/* SURAH FROM DB */
$surah_result = mysqli_query($conn,"
    SELECT DISTINCT surah_name 
    FROM quiz_questions 
    WHERE surah_name != ''
    ORDER BY surah_name ASC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Question</title>

<style>
body{
    margin:0;
    font-family:"Segoe UI", sans-serif;
    background:#f4f6fb;
}

/* MAIN AREA */
.main{
    margin-left:240px;
    padding:40px;
}

/* TITLE */
h2{
    font-size:24px;
    font-weight:700;
    margin-bottom:25px;
    color:#111827;
}

/* FORM WRAPPER */
form{
    width:100%;
    max-width:700px;
    background:#fff;
    padding:25px;
    border-radius:14px;
    box-shadow:0 8px 20px rgba(0,0,0,0.06);
    border:1px solid #eef0f3;
}

/* INPUTS */
input, select, textarea{
    width:100%;
    padding:12px 14px;
    margin:10px 0;
    border:1px solid #e5e7eb;
    border-radius:10px;
    background:#f9fafb;
    font-size:14px;
    transition:0.25s;
}

/* FOCUS EFFECT */
input:focus, select:focus, textarea:focus{
    border-color:#2563eb;
    background:#fff;
    box-shadow:0 0 0 3px rgba(37,99,235,0.12);
    outline:none;
}

/* TEXTAREA */
textarea{
    height:120px;
    resize:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:#fff;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.2s;
}

/* BUTTON HOVER */
button:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(37,99,235,0.2);
}
</style>

</head>

<body>

<h2>Edit Quiz Question</h2>

<form method="POST">

<!-- SURAH FROM DB -->
<label>Surah Name</label>
<select name="surah_name" required>

    <option value="">Select Surah</option>

    <?php while($s = mysqli_fetch_assoc($surah_result)) { ?>
        <option value="<?= $s['surah_name'] ?>"
            <?= ($row['surah_name'] == $s['surah_name']) ? 'selected' : '' ?>>
            <?= $s['surah_name'] ?>
        </option>
    <?php } ?>

</select>

<label>Question</label>
<textarea name="question" required><?= $row['question'] ?></textarea>

<label>Option A</label>
<input type="text" name="option_a" value="<?= $row['option_a'] ?>" required>

<label>Option B</label>
<input type="text" name="option_b" value="<?= $row['option_b'] ?>" required>

<label>Option C</label>
<input type="text" name="option_c" value="<?= $row['option_c'] ?>" required>

<label>Option D</label>
<input type="text" name="option_d" value="<?= $row['option_d'] ?>" required>

<label>Correct Answer</label>
<select name="correct_answer" required>
    <option value="a" <?= ($row['correct_answer']=='a')?'selected':'' ?>>Option A</option>
    <option value="b" <?= ($row['correct_answer']=='b')?'selected':'' ?>>Option B</option>
    <option value="c" <?= ($row['correct_answer']=='c')?'selected':'' ?>>Option C</option>
    <option value="d" <?= ($row['correct_answer']=='d')?'selected':'' ?>>Option D</option>
</select>

<button type="submit" name="update">Update Question</button>

</form>

</body>
</html>