<?php

/*
===============================
🌍 ENVIRONMENT AUTO DETECTION
===============================
*/

// 👉 Default (Localhost - XAMPP)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "iqra_db";

/*
===============================
🐳 DOCKER SETTINGS
===============================
*/
$docker_host = "db";   // docker service name
$docker_user = "root";
$docker_pass = "root";
$docker_db   = "iqra_db";

/*
===============================
🌐 LIVE HOSTING (InfinityFree)
===============================
*/
$live_host = "sql308.infinityfree.com";
$live_user = "if0_41802860";
$live_pass = "GWHDgLz3W2GQ";
$live_db   = "if0_41802860_iqra";

/*
===============================
🚀 DETECTION LOGIC
===============================
*/

// 🐳 Docker detect (IMPORTANT)
if (getenv('DOCKER_ENV') == 'true') {

    $conn = mysqli_connect($docker_host, $docker_user, $docker_pass, $docker_db);

// 🌐 Live hosting detect
} elseif ($_SERVER['HTTP_HOST'] != "localhost") {

    $conn = mysqli_connect($live_host, $live_user, $live_pass, $live_db);

// 💻 Localhost (default)
} else {

    $conn = mysqli_connect($host, $user, $pass, $db);
}

/*
===============================
❌ ERROR CHECK
===============================
*/
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

?>