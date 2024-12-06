<?php
session_start();
$_SESSION['is_loggedin'] = false;
session_unset();
session_destroy();
header("Location: ../../index.php");
exit();
?>