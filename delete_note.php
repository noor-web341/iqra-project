<?php
include "db.php";
session_start();

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM notes WHERE id='$id'");

header("Location: view_notes.php");
?>