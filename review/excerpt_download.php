<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["reminss"];
$adminid=$_SESSION["reminid"];
$adminpw=$_SESSION["reminpw"];

require "../db.php";
$str = "select papernumber,abstract,raw_abstract from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papernumber,$abstract,$raw_abstract) = mysql_fetch_row($list);

$str = "select paperno1,paperno2,paperno3,paperno4,paperno5 from reviewer where id='$adminid'";
$list = mysql_query($str,$link);
list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5) = mysql_fetch_row($list);



if ($papernumber==$paperno1){
$str="update reviewer set abstract_chk1='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno2){
$str="update reviewer set abstract_chk2='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno3){
$str="update reviewer set abstract_chk3='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno4){
$str="update reviewer set abstract_chk4='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno5){
$str="update reviewer set abstract_chk5='1' where id='$adminid' ";
mysql_query($str,$link) ;
}



header("Content-type:application");
header("Content-Disposition: attachment; filename=$raw_abstract");

readfile("../paperexcerpt/$abstract");
?>