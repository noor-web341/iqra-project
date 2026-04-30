<?php
include "db.php";

$json = file_get_contents("hadith.json");
$data = json_decode($json, true);

foreach($data as $h){

    $book = $h['book'];

    $check = mysqli_query($conn, "SELECT id FROM books WHERE name='$book'");
    $row = mysqli_fetch_assoc($check);

    if(!$row){
        mysqli_query($conn, "INSERT INTO books (name) VALUES ('$book')");
        $book_id = mysqli_insert_id($conn);
    } else {
        $book_id = $row['id'];
    }

    $arabic = mysqli_real_escape_string($conn, $h['arabic']);
    $english = mysqli_real_escape_string($conn, $h['english']);
    $status = $h['status'];
    $reference = $h['reference'];

    mysqli_query($conn, "
        INSERT INTO hadiths (book_id, arabic, english, status, reference)
        VALUES ('$book_id', '$arabic', '$english', '$status', '$reference')
    ");

}

echo "✅ Import Done Successfully!";
?>