<?php
session_start();

$_SESSION = [];
session_unset();
session_destroy();

// force cookie delete (important fix)
setcookie(session_name(), '', time() - 3600, '/');

header("Location: signin.php");
exit();
?>