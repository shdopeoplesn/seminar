<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";

//----------------讀取舊file----------------
$str = "select filename from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($old_files) = mysql_fetch_row($list);

//取得檔案名稱
$new_file=$_FILES["filename1"]["name"];
$time=date("YmdHis");

//取得檔案副檔名
$main=substr($new_file,-4,4);

//取得ID
list($userid,$userid2)=explode("@",$id);

//轉換小寫
$main=strtolower($main);

//判斷檔案格式
if($main!=".pdf"and $main!=".doc" and $main!="docx")
{
		header("location:happy.php?act=file_error");
   exit;
}
if($main=="docx")
{
	$main=".docx";
}
//指派檔案名稱
$raw_file=$new_file;
$new_files=$userid."_".$time.$main;

copy($_FILES["filename1"]["tmp_name"],"paperfile/".$new_files); 

//----------------update--------------------
   $str = "update papers set filename='$new_files',raw_file='$raw_file',edittime=now() where serial='$serial'";
   mysql_query($str,$link); 
  

$date="paperfile/".$old_files;
if(!unlink($date))
 {
	header("location:happy.php?act=file_empty");
    exit; 
 }



$str = "select name,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$email) = mysql_fetch_row($list);

$mail_title="智慧生活科技研討會-論文置換";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您置換的論文檔案請確認：<br>
論文：".$raw_file."<br>
置換時間：".date("Y-m-d H:i:s",time() + 3600 * 8)."<br>
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";



header("location:paper_edit.php?serial=$serial");
?>






