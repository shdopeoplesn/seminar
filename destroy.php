<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
//$id = $_SESSION["id"];
session_destroy();
header("location:happy.php?act=destroy");
?>