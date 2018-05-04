<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];

require "../db.php";

$str = "select sn,re_id from reviewer where re_id='$id' and re_password='$password' ";
$list = mysql_query($str,$link);
list($sn,$re_id) = mysql_fetch_row($list);

//-------紀錄更新審查的動作------
$str = "select papername,reviewer_sn from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papername,$reviewer_sn) = mysql_fetch_row($list);

if($reviewer_sn != $sn)
{
  echo "很抱歉，這不屬於您的範圍哦！";
  exit;
}

$ip=$REMOTE_ADDR;
$str = "insert into action(ip,id,action,time) values('$ip','$re_id','更新 $papername 審查',now())";
mysql_query($str,$link);


//--------------更新審查------------------
$str = "update my_papers set chkstate='$chkstate',propose='$propose',chktime=now() where serial='$serial'";
mysql_query($str,$link);
mysql_close($link);
header("location:paper.php");
?>