<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";


$str = "select papernumber from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($typenumber) = mysql_fetch_row($list);

  //取得檔案名稱
  $new_excerpt=$_FILES["final_abstract"]["name"];
  $time=date("YmdHis");

  //取得檔案副檔名
  $main=substr($new_excerpt,-4,4);
  //list($name,$main)=explode(".",$new_excerpt);

  //取得ID(@之前)
  list($ids,$aa)=explode("@",$id);

  //轉換小寫
  $main=strtolower($main);
  if($main!=".pdf" and $main!=".doc" and $main!="docx")
    {
      echo "檔案格式錯誤，本研討會僅接受.pdf .doc .docx檔案格式！ ";
      exit;
    }
  if($main=="docx")
    {
		$main=".docx";
    }
	//指派檔案名稱
  $raw_excerpt=$new_excerpt;
  $new_excerpt=$ids."_".$time.$main;
copy($_FILES["final_abstract"]["tmp_name"],"final_abstract/".$new_excerpt); 


  //取得檔案名稱
  $new_file=$_FILES["final_file"]["name"];
  $time=date("YmdHis");

  //取得檔案副檔名
  $main=substr($new_file,-4,4);
  //list($name,$main)=explode(".",$new_file");


  //轉換小寫
  $main=strtolower($main);
  if($main!=".pdf" and $main!=".doc" and $main!="docx")
    {
      echo "檔案格式錯誤，本研討會僅接受.pdf .doc .docx檔案格式！ ";
      exit;
    }
  if($main=="docx")
    {
		$main=".docx";
    }
  //指派檔案名稱
  $raw_file=$new_file;
  $new_file=$ids."_".$time.$main;
copy($_FILES["final_file"]["tmp_name"],"final_paper/".$new_file); 

/*
$str = "select sn from members where id='$id'";
$list = mysql_query($str,$link);
list($sn) = mysql_fetch_row($list);
*/


$str = "update papers set nscno='$nscno',final_file='$new_file',final_rawfile='$raw_file',final_abstract='$new_excerpt',final_rawabstract='$raw_excerpt',final_addtime=now(),final_edittime=now(),nsc_papername='$nsc_papername',nsc_number='$nsc_number',nsc_usename='$nsc_usename'  where serial='$serial'";
mysql_query($str,$link);

$str = "select name,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$email) = mysql_fetch_row($list);

      if($category=="1")$category="電能與節能技術";      
      if($category=="2")$category="智慧型控制系統";
      if($category=="3")$category="積體電路設計";
      if($category=="4")$category="消費性家電產品開發與設計";      
      if($category=="5")$category="嵌入式系統開發與應用";
      if($category=="6")$category="通訊技術";
      if($category=="7")$category="網路技術開發與應用";      
      if($category=="8")$category="多媒體與數位內容技術";
      if($category=="9")$category="居家照護產品開發與設計";
      if($category=="10")$category="資訊安全與應用";
      if($category=="11")$category="雲端與物聯網應用技術";
      if($category=="12")$category="系統整合與應用";
      if($category=="13")$category="其他領域";
      if($category=="14")$category="Invited Sessions(智慧型自動化與智慧生活)";
      
$str = "select papername,paperman,papernumber,nscno,nsc_papername,nsc_number,nsc_usename from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papername,$paperman,$papernumber,$nscno) = mysql_fetch_row($list);



$mail_title="智慧生活科技研討會-論文上傳";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您的定稿論文資料，請確認：<br>
論文名稱：".$papername."<br>
論文作者：".$paperman."<br>
論文編號：".$papernumber."<br>
投稿類別：".$category."<br>
國科會計畫名稱：".$nsc_papername."<br>
國科會計劃編號：".$nsc_number."<br>
NSC計畫主持人：".$nsc_usename."<br>
論文：".$raw_file."<br>
摘要：".$raw_excerpt."<br>
上傳時間：".date("Y-m-d H:i:s",time() + 3600 * 8)."<br>
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";


header("location:happy.php?act=final");

?>