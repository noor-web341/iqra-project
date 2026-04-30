<?php
include "db.php";

// 🔐 ID check
if(!isset($_GET['id'])){
    die("⚠️ Invalid request");
}

$id = intval($_GET['id']);

// ✅ fetch note
$stmt = $conn->prepare("SELECT * FROM notes WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(!$row){
    die("❌ Note not found");
}

$error = "";

// ✅ update logic
if(isset($_POST['update'])){

    $title = trim($_POST['title']);
    $note  = trim($_POST['note']);

    if(empty($title) || empty($note)){
        $error = "⚠️ All fields are required!";
    } else {

        $update = $conn->prepare("UPDATE notes SET title=?, note=? WHERE id=?");
        $update->bind_param("ssi", $title, $note, $id);

        if($update->execute()){
            header("Location: view_notes.php");
            exit();
        } else {
            $error = "❌ Failed to update note!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Note</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background:linear-gradient(180deg,#f5f7fb,#eef2f7);
}

/* HEADER */
.header{
    background:linear-gradient(135deg,#f39c12,#e67e22);
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
    border-color:#f39c12;
    box-shadow:0 0 5px rgba(243,156,18,0.3);
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
    background:linear-gradient(135deg,#f39c12,#e67e22);
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

/* ERROR */
.error{
    background:#ffe6e6;
    color:#e74c3c;
    padding:12px;
    border-radius:10px;
    margin-bottom:12px;
    text-align:center;
    font-size:14px;
}

/* SMALL TEXT */
.sub{
    text-align:center;
    font-size:14px;
    color:#777;
    margin-bottom:10px;
}
</style>

</head>
<body>

<div class="header">✏️ Edit Your Note</div>

<div class="container">

<div class="sub">Update your note anytime ✨</div>

<?php if($error != ""){ ?>
    <div class="error"><?php echo $error; ?></div>
<?php } ?>

<form method="POST">

    <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>">

    <textarea name="note"><?php echo htmlspecialchars($row['note']); ?></textarea>

    <button type="submit" name="update">💾 Update Note</button>

</form>

</div>

</body>
</html>