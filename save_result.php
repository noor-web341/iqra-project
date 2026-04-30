<?php
session_start(); // 🔥 MUST ADD
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

// 🔐 check login user
if(!isset($_SESSION['user_id'])){
    echo "not logged in";
    exit;
}

$user_id = $_SESSION['user_id'];

$score = $data['score'];
$total = $data['total'];
$percentage = $data['percentage'];
$surah = $data['surah'];

mysqli_query($conn, "
    INSERT INTO quiz_results 
    (user_id, surah_id, score, total, percentage)
    VALUES 
    ('$user_id', '$surah', '$score', '$total', '$percentage')
");
?>