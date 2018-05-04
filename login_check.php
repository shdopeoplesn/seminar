<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require "db.php";

$id=$_POST["id"];
$passwd=$_POST["passwd"];

$str = "select count(*) from members where id='$id' and passwd='$passwd' ";
$list = mysql_query($str,$link);
list($count) = mysql_fetch_row($list);

if($count == 1)
 {
      $id = strtoupper($id);
      //session_register("id");
	  $_SESSION['id']=$id;
      header("location:happy.php?act=login");
 }
else
{
  header("location:happy.php?act=error");
  exit;
}

?>