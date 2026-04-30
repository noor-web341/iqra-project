<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$error = "";

// ✅ Submit check
if(isset($_POST['save'])){

    $title = trim($_POST['title']);
    $note  = trim($_POST['note']);

    if(empty($title) || empty($note)){
        $error = "⚠️ Please fill all fields properly!";
    } else {

        $stmt = $conn->prepare("INSERT INTO notes (user_id, title, note) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $title, $note);

        if($stmt->execute()){
            header("Location: view_notes.php");
            exit();
        } else {
            $error = "❌ Failed to save note!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Note</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background:linear-gradient(180deg,#f5f7fb,#eef2f7);
}

/* HEADER */
.header{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    padding:18px;
    text-align:center;
    font-size:22px;
    font-weight:600;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

/* CONTAINER */
.container{
    max-width:500px;
    margin:40px auto;
    background:white;
    padding:22px;
    border-radius:15px;
    box-shadow:0 8px 25px rgba(0,0,0,0.08);
}

/* INPUTS */
input, textarea{
    width:100%;
    padding:14px;
    margin-top:12px;
    border-radius:10px;
    border:1px solid #ddd;
    font-size:15px;
    outline:none;
    transition:0.2s;
}

input:focus, textarea:focus{
    border-color:#2ecc71;
    box-shadow:0 0 5px rgba(46,204,113,0.3);
}

textarea{
    height:140px;
    resize:none;
}

/* BUTTON */
button{
    width:100%;
    padding:14px;
    margin-top:18px;
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    border:none;
    border-radius:10px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:0.2s;
}

button:hover{
    transform:scale(1.02);
}

/* ERROR BOX */
.error{
    background:#ffe6e6;
    color:#e74c3c;
    padding:12px;
    border-radius:10px;
    margin-bottom:12px;
    text-align:center;
    font-size:14px;
}

/* SMALL TITLE */
.sub{
    text-align:center;
    font-size:14px;
    color:#777;
    margin-bottom:10px;
}
</style>

</head>
<body>

<div class="header">📝 Create New Note</div>

<div class="container">

<div class="sub">Write your thoughts and save them safely ✨</div>

<?php if($error != ""){ ?>
    <div class="error"><?php echo $error; ?></div>
<?php } ?>

<form method="POST">

    <input type="text" name="title" placeholder="Enter note title">

    <textarea name="note" placeholder="Write your note here..."></textarea>

    <button type="submit" name="save">💾 Save Note</button>

</form>

</div>

</body>
</html>