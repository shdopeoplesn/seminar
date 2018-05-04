<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
//$excellent
require "../db.php";
$str="update papers set bestpaper='$bestpaper' where serial='$serial' ";
mysql_query($str,$link);

 


header("location:happy.php?act=bestpaper_set");
?>