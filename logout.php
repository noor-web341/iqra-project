<?php
session_start();

// saari session values hatao
$_SESSION = [];

// session destroy
session_destroy();

// redirect
header("Location: signin.php");
exit();
?>