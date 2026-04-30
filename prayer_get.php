<?php
$lat = $_GET['lat'];
$lon = $_GET['lon'];

$data = json_decode(file_get_contents(
    "https://api.aladhan.com/v1/timings?latitude=$lat&longitude=$lon&method=2"
), true);

$geo = json_decode(file_get_contents(
    "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=$lat&longitude=$lon"
), true);

$timings = $data['data']['timings'];

echo json_encode([
    "city"     => $geo['city'] ?? "Your Location",

    "Fajr"     => $timings['Fajr'],
    "Sunrise"  => $timings['Sunrise'],   // ✅ ADD THIS
    "Dhuhr"    => $timings['Dhuhr'],
    "Asr"      => $timings['Asr'],
    "Maghrib"  => $timings['Maghrib'],
    "Isha"     => $timings['Isha']
]);
?>