<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

$str = "insert into account(id,money,time)
    values('ilt$id1','$money1',$time1)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id2','$money2',$time2)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id3','$money3',$time3)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id4','$money4',$time4)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id5','$money5',$time5)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id6','$money6',$time6)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id7','$money7',$time7)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id8','$money8',$time8)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id9','$money9',$time9)";
mysql_query($str,$link);
$str = "insert into account(id,money,time)
    values('ilt$id10','$money10',$time10)";
mysql_query($str,$link);
header("location:crossaccoun_list.php");

?>