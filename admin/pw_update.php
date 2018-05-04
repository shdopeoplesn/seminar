<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$adminid = $_SESSION["adminid"];
$adminpw = $_SESSION["adminpw"];

require "../db.php";


if( $adminss == "root2" )$stra="select session_name,passwd,session_email from session where session_id='$adminid' ";
$lista =mysql_query($stra,$link);
list($name,$usr_pw,$email) = mysql_fetch_row($lista);

if($usr_pw != $oldpw)
    { echo "舊密碼輸入錯誤！";
      exit;
    }


if( $adminss == "root2" )$str="update session set passwd='$newpw' where session_id='$adminid' ";
mysql_query($str,$link) or die("錯誤");


$mail_title="智慧生活科技研討會-修改登入密碼";
$mail_content="親愛的".$name."教授/先生 您好，以下為您修改的資料，請確認：<br>
原本密碼：".$oldpw."<br>
修改後的密碼：".$newpw."<br>
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";

mysql_close($link);


session_destroy();

echo "<script>window.parent.frames.location.href=\"login.php\";</script>";
?>