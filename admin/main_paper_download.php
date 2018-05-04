<?php
require "../db.php";

$str = "select category,final_file,final_rawfile from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($category,$main_file,$main_rawfile) = mysql_fetch_row($list);

header("Content-type:application");
header("Content-Disposition: attachment; filename=$main_rawfile");

readfile("../final_paper/$main_file");
?>