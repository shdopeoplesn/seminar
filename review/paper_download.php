<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["reminss"];
$adminid=$_SESSION["reminid"];
$adminpw=$_SESSION["reminpw"];

require "../db.php";

$str = "select papernumber,filename,raw_file from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papernumber,$filename,$raw_name) = mysql_fetch_row($list);


$str = "select paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from reviewer where id='$adminid'";
$list = mysql_query($str,$link);
list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15) = mysql_fetch_row($list);

if ($papernumber==$paperno1){
$str="update reviewer set paper_chk1='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno2){
$str="update reviewer set paper_chk2='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno3){
$str="update reviewer set paper_chk3='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno4){
$str="update reviewer set paper_chk4='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno5){
$str="update reviewer set paper_chk5='1' where id='$adminid' ";
mysql_query($str,$link) ;
}

if ($papernumber==$paperno6){
$str="update reviewer set paper_chk6='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno7){
$str="update reviewer set paper_chk7='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno8){
$str="update reviewer set paper_chk8='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno9){
$str="update reviewer set paper_chk9='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno10){
$str="update reviewer set paper_chk10='1' where id='$adminid' ";
mysql_query($str,$link) ;
}



if ($papernumber==$paperno11){
$str="update reviewer set paper_chk11='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno12){
$str="update reviewer set paper_chk12='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno13){
$str="update reviewer set paper_chk13='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno14){
$str="update reviewer set paper_chk14='1' where id='$adminid' ";
mysql_query($str,$link) ;
}
if ($papernumber==$paperno15){
$str="update reviewer set paper_chk15='1' where id='$adminid' ";
mysql_query($str,$link) ;
}


header("Content-type:application");
header("Content-Disposition: attachment; filename=$raw_name");

readfile("../paperfile/$filename");

?>