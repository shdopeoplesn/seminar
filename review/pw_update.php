<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["reminss"];
$adminid = $_SESSION["reminid"];
$adminpw = $_SESSION["reminpw"];
$newpw=$_POST["newpw"];


require "../db.php";

if( empty($oldpw) )
    { $errortxt="請輸入舊密碼！";
      include "error.php";
      exit;
    }

if( empty($newpw) )
    { $errortxt="請輸入新密碼！";
      include "error.php";
      exit;
    }

if( empty($newpwre) )
    { $errortxt="請輸入重複密碼！";
      include "error.php";
      exit;
    }

if(strlen($newpw)>8)
    { $errortxt="新密碼請輸入8位！";
      include "error.php";
      exit;
    }

if($newpw != $newpwre)
    { $errortxt="新密碼與重複密碼不一致！";
      include "error.php";
      exit;
    }
	

	

//if( $adminss == "root2" )$stra="select sn,password from numbers where id='$adminid' and password='$adminpw' ";
$stra="select name,email,passwd from reviewer where id='$adminid'";
$lista =mysql_query($stra,$link);
list($name,$email,$usr_pw) = mysql_fetch_row($lista);

if($usr_pw != $oldpw)
    { echo "舊密碼輸入錯誤！";
      exit;
    }	


$str="update reviewer set passwd='$newpw' where id='$adminid' ";
mysql_query($str,$link) ;


$mail_title="智慧生活科技研討會-修改登入密碼";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您修改的資料，請確認：<br />
原本密碼：".$oldpw."<br>
修改後的密碼：".$newpw."<br>
============================================================<br />
若需要更改資訊請登入本研討會網站即可";
include "mail.php";


session_destroy();

echo "<script>window.parent.frames.location.href=\"login.php\";</script>";
?>