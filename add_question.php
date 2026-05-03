<?php 
include "db.php";

if(isset($_POST['submit'])){

    $surah_name = $_POST['surah_name'];
    $question = $_POST['question'];
    $a = $_POST['option_a'];
    $b = $_POST['option_b'];
    $c = $_POST['option_c'];
    $d = $_POST['option_d'];
    $correct = $_POST['correct_answer'];

    if(!in_array($correct, ['a','b','c','d'])){
        $error = "❌ Correct answer must be a, b, c or d";
    } else {

        mysqli_query($conn, "INSERT INTO quiz_questions 
        (surah_name, question, option_a, option_b, option_c, option_d, correct_answer)
        VALUES 
        ('$surah_name','$question','$a','$b','$c','$d','$correct')");

        header("Location: add_question.php?success=1");
        exit();
    }
}

/* SURAH LIST */
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
<title>Add Question</title>

<style>
body{
    font-family: Arial;
    background: linear-gradient(135deg, #e0e7ff, #f0fdf4);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    background:#fff;
    padding:25px;
    border-radius:12px;
    width:400px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:15px;
}

.success{
    background:#d1fae5;
    color:#065f46;
    padding:10px;
    border-radius:6px;
    margin-bottom:10px;
}

.error{
    background:#fee2e2;
    color:#991b1b;
    padding:10px;
    border-radius:6px;
    margin-bottom:10px;
}

input, select, textarea{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
}

textarea{
    height:80px;
    resize:none;
}

button{
    width:100%;
    background:#2563eb;
    color:white;
    padding:10px;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#1e40af;
}

.back-btn{
    display:block;
    text-align:center;
    margin-top:10px;
    text-decoration:none;
    color:#555;
}
</style>

</head>
<body>

<div class="container">

<h2>➕ Add Question</h2>

<?php if(isset($_GET['success'])) echo "<div class='success'>✅ Question Added</div>"; ?>
<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

<form method="POST">

<select name="surah_name" required>
<option value="">Select Surah</option>
<?php while($s = mysqli_fetch_assoc($surah_result)) { ?>
<option value="<?= $s['surah_name'] ?>">
<?= $s['surah_name'] ?>
</option>
<?php } ?>
</select>

<textarea name="question" placeholder="Enter Question" required></textarea>

<input type="text" name="option_a" placeholder="Option A" required>
<input type="text" name="option_b" placeholder="Option B" required>
<input type="text" name="option_c" placeholder="Option C" required>
<input type="text" name="option_d" placeholder="Option D" required>

<select name="correct_answer" required>
<option value="">Correct Answer</option>
<option value="a">Option A</option>
<option value="b">Option B</option>
<option value="c">Option C</option>
<option value="d">Option D</option>
</select>

<button name="submit">Add Question</button>

</form>

<!-- BACK BUTTON -->
<a href="all_questions.php" class="back-btn">⬅ Back to Questions</a>

</div>

</body>
</html>