<?php
session_start();
//session_unset();
unset($_SESSION['Username']);
session_destroy();
echo "se cerro la sesion";
header("Location: login.php");
?>
