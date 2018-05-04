<?php
require "../db.php";

$str = "select id from reviewer where chk_number='$key'";
$list = mysql_query($str,$link);
list($id) = mysql_fetch_row($list);

if ($id!=""){

$str = "update reviewer set reply='1' where id='$id'";

mysql_query($str,$link); 

header("location:http://ilt2018.ncut.edu.tw/review/login.php");
}
else 
{
$key = substr($key,0,4);

$str = "select id from reviewer where chk_number='$key'";
$list = mysql_query($str,$link);
list($id) = mysql_fetch_row($list);

if ($id!=""){

$str = "update reviewer set reply='1' where id='$id'";

mysql_query($str,$link); 

header("location:http://ilt2018.ncut.edu.tw/review/login.php");

}
exit;
}
?>