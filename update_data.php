<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";

$unit = filter_var($_POST['unit'],FILTER_SANITIZE_STRING);
$tel = filter_var($_POST['tel'],FILTER_SANITIZE_NUMBER_INT);


$str = "update members set unit='$unit',tel='$tel' where id='$id'";
mysql_query($str,$link); 


$str = "select name,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$email) = mysql_fetch_row($list);

$mail_title="智慧生活科技研討會-修改基本資料";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您修改的資料，請確認：<br>
               服務單位：".$unit."<br>
               聯絡電話：".$tel."<br>
               
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";

//mysql_close($link);

header("location:happy.php?act=update");

?>