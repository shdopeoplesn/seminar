<?php
require "../db.php";

$str = "select category,final_abstract,final_rawabstract from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($category,$main_excerpt,$main_rawexcerpt) = mysql_fetch_row($list);

//$str = "select typenumber from numbers where sn='$category'";
//$list = mysql_query($str,$link);
//list($typenumber) = mysql_fetch_row($list);

header("Content-type:application");
header("Content-Disposition: attachment; filename=$main_rawexcerpt");

readfile("../final_abstract/$main_excerpt");
?>