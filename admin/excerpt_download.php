<?php
require "../db.php";
$str = "select papernumber,abstract ,raw_abstract  from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papernumber,$excerpt,$raw_excerpt) = mysql_fetch_row($list);

header("Content-type:application");
header("Content-Disposition: attachment; filename=$papernumber-$raw_excerpt");

readfile("../paperexcerpt/$excerpt");
?>