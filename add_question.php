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
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#e0e7ff,#f0fdf4);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

/* ================= CARD ================= */
.container{
    width:420px;
    background:#fff;
    padding:25px;
    border-radius:16px;
    box-shadow:0 15px 35px rgba(0,0,0,0.12);
    animation:fadeIn 0.3s ease-in-out;
}

/* TITLE */
h2{
    text-align:center;
    margin-bottom:15px;
    font-size:22px;
}

/* ================= ALERTS ================= */
.success{
    background:#d1fae5;
    color:#065f46;
    padding:10px;
    border-radius:8px;
    margin-bottom:10px;
    font-size:13px;
}

.error{
    background:#fee2e2;
    color:#991b1b;
    padding:10px;
    border-radius:8px;
    margin-bottom:10px;
    font-size:13px;
}

/* ================= INPUTS ================= */
input, select, textarea{
    width:100%;
    padding:12px;
    margin:8px 0;
    border:1px solid #e5e7eb;
    border-radius:10px;
    font-size:14px;
    background:#f9fafb;
    transition:0.3s;
}

textarea{
    height:90px;
    resize:none;
}

input:focus,
select:focus,
textarea:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,0.15);
    background:#fff;
    outline:none;
}

/* ================= BUTTON ================= */
button{
    width:100%;
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    padding:12px;
    border:none;
    border-radius:10px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
    margin-top:5px;
}

button:hover{
    transform:scale(1.03);
}

/* ================= BACK BUTTON ================= */
.back-btn{
    display:block;
    text-align:center;
    margin-top:12px;
    color:#6b7280;
    text-decoration:none;
    font-size:13px;
    transition:0.3s;
}

.back-btn:hover{
    color:#111827;
}

/* ================= ANIMATION ================= */
@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ================= RESPONSIVE ================= */
@media(max-width:500px){
    .container{
        width:100%;
    }
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