<?php
include "db.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM hadiths WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $text = $_POST['text'];

    mysqli_query($conn,"UPDATE hadiths SET text='$text' WHERE id=$id");

    header("Location: hadiths.php");
}
?>

<h2>Edit Hadith</h2>

<form method="POST">
    <textarea name="text"><?php echo $row['text']; ?></textarea>
    <button name="update">Update</button>
</form>