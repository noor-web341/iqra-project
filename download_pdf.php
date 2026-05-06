<?php
require_once __DIR__ . '/vendor/autoload.php';
include "db.php";

$book_id = (int)($_GET['book_id'] ?? 0);

$book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM books WHERE id=$book_id"));
$result = mysqli_query($conn, "SELECT * FROM hadiths WHERE book_id=$book_id");

$html = "<h2 style='text-align:center;'>".$book['name']."</h2>";

while($row = mysqli_fetch_assoc($result)){

    if(!empty($row['arabic'])){
        $html .= "<p style='direction:rtl; font-family:amiri; font-size:16px;'>".$row['arabic']."</p>";
    }

    if(!empty($row['english'])){
        $html .= "<p>".$row['english']."</p>";
    }

    if(!empty($row['reference'])){
        $html .= "<small>".$row['reference']."</small><hr>";
    }
}

$mpdf = new \Mpdf\Mpdf([
    'default_font' => 'dejavusans'
]);

$mpdf->WriteHTML($html);
$mpdf->Output($book['name'].'.pdf','D');
?>