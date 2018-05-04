<?php
require "../db.php";
$str = "select papernumber,filename,raw_file from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papernumber,$filename,$raw_name) = mysql_fetch_row($list);

header("Content-type:application");
header("Content-Disposition: attachment; filename=$papernumber-$raw_name");

readfile("../paperfile/$filename");
?>