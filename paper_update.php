<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];

$type=substr($papernumber,0,2);

include "chksession.php";
require "db.php";
if ($type=="IC")
{$type=substr($papernumber,0,3);}
else {
      if($type=="IE")$category1="電能與節能技術";      
      if($type=="ICS")$category1="智慧型控制系統";
      if($type=="ICD")$category1="積體電路設計";
      if($type=="3C")$category1="消費性家電產品開發與設計";      
      if($type=="ES")$category1="嵌入式系統開發與應用";
      if($type=="CT")$category1="通訊技術";
      if($type=="NT")$category1="網路技術開發與應用";      
      if($type=="MD")$category1="多媒體與數位內容技術";
      if($type=="HC")$category1="居家照護產品開發與設計";
      if($type=="OT")$category1="其他領域";
      if($type=="AI")$category1="智慧生活應用";
      if($type=="SI")$category1="系統整合與應用";
      if($type=="IS")$category1="多媒體安全與應用";
      if($type=="CI")$category1="雲端與物聯網應用技術";
      if($type=="INS")$category1="Invited Sessions(智慧型自動化與智慧生活)";
      
}
   $str = "select serial from papers where papername='$papername'";
   $list = mysql_query($str,$link);
   list($serial_chk) = mysql_fetch_row($list);
   
   if($serial_chk != $serial and $serial_chk!="")
   {
    header("location:happy.php?act=papername_error");
	exit;
   }
   
   $str = "select serial from papers where paperchinesename='$paperchinesename'";
   $list = mysql_query($str,$link);
   list($serial_chk) = mysql_fetch_row($list);
   
   if($serial_chk != $serial and $serial_chk!="")
   {
    header("location:happy.php?act=paperpaperchinesenamename_error");
	exit;
   }
   

$new_file=$_FILES["filename"]["name"];
if( !empty($new_file) )
{
  $time=date("Ymdis");
  list($name,$main)=explode(".",$new_file);
  list($id,$aa)=explode(".",$id);
  $raw_file=$name.".".$main;
  $new_files=$time.".".$main;
  if($main!="pdf" and $main!="doc")
    {
      echo "檔案格式錯誤，本研討會僅接受pdf及DOC檔案格式！ ";
      exit;
    }
 
 copy($_FILES["filename"]["tmp_name"],"paperfile/".$new_files); 
}


if(!empty($abstract) )
{
  $new_excerpt=$_FILES["abstract"]["name"];
  $time=date("Ymdis");
  list($name,$main)=explode(".",$new_excerpt);
  list($id,$aa)=explode(".",$id);
  $raw_excerpt=$name.".".$main;
  $new_excerpt=$time.".".$main;
  if($main!="pdf" and $main!="doc")
    {
      echo "檔案格式錯誤，本研討會僅接受pdf及DOC檔案格式！ ";
      exit;
    }
 
 copy($_FILES["abstract"]["tmp_name"],"paperexcerpt/".$new_excerpt); 
}


$str = "update papers set papername='$papername',paperchinesename='$paperchinesename',paperman='$paperman',nscno='$nscno',nsc_papername='$nsc_papername',nsc_number='$nsc_number',nsc_usename='$nsc_usename',edittime=now() where serial='$serial'";
mysql_query($str,$link);



	  
$str = "select name,email from members where id='$id'";
$list =mysql_query($str,$link);
list($name,$email) = mysql_fetch_row($list);


$mail_title="智慧生活科技研討會-論文編輯";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您修改的論文資料請確認：<br>
論文名稱：".$papername."<br>
論文作者：".$paperman."<br>
投稿類別：".$category1."<br>
國科會計畫名稱：".$nsc_papername."<br>
國科會計劃編號：".$nsc_number."<br>
NSC計畫主持人：".$nsc_usename."<br>
編輯時間：".date("Y-m-d H:i:s",time() + 3600 * 8)."<br>
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";


mysql_close($link);
header("location:paper_index.php");
?>