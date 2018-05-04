<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
require "db.php";
$str = "select final_file,final_rawfile from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($filename,$raw_file) = mysql_fetch_row($list);
header("Content-type:application");
header("Content-Disposition: attachment; filename=$raw_file");
readfile("final_paper/$filename");
?>