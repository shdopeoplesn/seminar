<?php
require "../db.php";

$str = "select category,authorize,raw_authorize from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($category,$authorize,$raw_authorize) = mysql_fetch_row($list);

$str = "select typenumber from numbers where sn='$category'";
$list = mysql_query($str,$link);
list($typenumber) = mysql_fetch_row($list);

header("Content-type:application");
header("Content-Disposition: attachment; filename=$raw_authorize");

readfile("../authorize/$typenumber/$authorize");
?>