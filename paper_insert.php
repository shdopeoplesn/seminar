<?php
require "db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
$papername=$_POST["papername"];
$paperchinesename=$_POST["paperchinesename"];
$paperman=$_POST["paperman"];
$category=$_POST["category"];
$nscno=$_POST["nscno"];
$filename=$_POST["filename"];
$excerpt=$_POST["excerpt"];
$nsc_papername=$_POST["nsc_papername"];
$nsc_number=$_POST["nsc_number"];
$nsc_usename=$_POST["nsc_usename"];


//include "chksession.php";


   $str = "select serial from papers where papername='$papername'";
   $list = mysql_query($str,$link);
   list($serial) = mysql_fetch_row($list);
   
   if($serial != "")
   {
    header("location:happy.php?act=papername_error");
	exit;
   }


   $str = "select serial from papers where paperchinesename='$paperchinesename'";
   $list = mysql_query($str,$link);
   list($serial) = mysql_fetch_row($list);
   
   if($serial != "")
   {
    header("location:happy.php?act=paperchinesename_error");
	exit;
   }





  //取得檔案名稱
  $new_file=$_FILES["filename"]["name"];
  $time=date("YmdHis");

  //取得檔案副檔名
  $main=substr($new_file,-4,4);
  //list($name,$main)=explode(".",$new_file);

  //取得ID(@之前)
  list($ids,$aa)=explode("@",$id);
  
  //轉換小寫
  $main=strtolower($main);
  if($main!=".pdf" and $main!=".doc"and $main!="docx")
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
  $new_files=$ids."_".$time.$main;
copy($_FILES["filename"]["tmp_name"],"paperfile/".$new_files); 


  //取得檔案名稱
  $new_excerpt=$_FILES["excerpt"]["name"];
  $time=date("YmdHis");

  //取得檔案副檔名
  $main=substr($new_excerpt,-4,4);
  //list($name,$main)=explode(".",$new_excerpt);

  
  //轉換小寫
  $main=strtolower($main);
  if($main!=".pdf" and $main!=".doc" and $main!="docx")
    {
		header("location:happy.php?act=file_error");
      exit;
    }
  if($main=="docx")
    {
		$main=".docx";
    }
	//指派檔案名稱
  $raw_excerpt=$new_excerpt;
  $new_excerpt=$ids."_".$time.$main;
copy($_FILES["excerpt"]["tmp_name"],"paperexcerpt/".$new_excerpt); 


/*
$str = "select number from papers where category='$category' order by number desc limit 0,1"; 
$list = mysql_query($str,$link);
list($numbera) = mysql_fetch_row($list);

$numbera++;*/

/*
$str= "select sn,name from members where id='$id'";
$list = mysql_query($str,$link);
list($sn,$name) = mysql_fetch_row($list);
*/
/* $str = "select typenumber from numbers where sn='$category' "; 
$list = mysql_query($str,$link);
list($typenumberaaaa) = mysql_fetch_row($list);*/

//$str="insert into papers(papername,paperman,category,nscno,filename,raw_file,excerpt,raw_excerpt,addtime,edittime) 
//values('$papername','$paperman','$category','$nscno','$new_files','$raw_file','$new_excerpt','$raw_excerpt',now(),now())";
//mysql_query($str,$link);

//$str="insert into papers(id,papername,paperman,category,nscno,filename,excerpt,filename,raw_file,excerpt,raw_abstract,addtime,edittime  ) 
//values('$id','$papername','$paperman','$category','$nscno','$new_files','$raw_file','$new_excerpt','$raw_excerpt',now(),now())";

      
if($category=="1")$type="IEE";      
if($category=="2")$type="ICS";
if($category=="3")$type="ICD";
if($category=="4")$type="3C";      
if($category=="5")$type="ESD";
if($category=="6")$type="CTD";
if($category=="7")$type="NTD";      
if($category=="8")$type="MDC";
if($category=="9")$type="HCD";
if($category=="10")$type="MSA";
if($category=="11")$type="CIT";
if($category=="12")$type="SIA";
if($category=="13")$type="OTH";
if($category=="14")$type="INS";

$str = "select papernumber from papers where papernumber like '$type%' ORDER BY papernumber DESC";
$list = mysql_query($str,$link);
list($number) = mysql_fetch_row($list);
$reid=substr($number,3);
$no_reg= $reid + 1;


//$result=mysql_query("Select * from papers where category='$category'");
//$no_reg=mysql_num_rows($result)+1;

if ($no_reg<10)
{
settype($no_reg,string);

$no_reg = "00$no_reg"; 
}
if ($no_reg>9 and $no_reg<100)
{
$no_reg = "0$no_reg"; 
}
$papernumber="$type$no_reg";


//查出是哪個帳號的人上傳的

$str = "select name from members where id='$id'";
$list = mysql_query($str,$link);
list($uploadname) = mysql_fetch_row($list);

//存進資料庫
$str="insert into papers(id,papername,paperchinesename,paperman,category,papernumber ,nscno,filename,raw_file,abstract,raw_abstract,addtime,edittime,uploadname,nsc_papername,nsc_number,nsc_usename) 
values('$id','$papername','$paperchinesename','$paperman','$category','$papernumber','$nscno','$new_files','$raw_file','$new_excerpt','$raw_excerpt',now(),now(),'$uploadname','$nsc_papername','$nsc_number','$nsc_usename')";
mysql_query($str,$link);

      if($category=="1")$category="電能與節能技術";      
      if($category=="2")$category="智慧型控制系統";
      if($category=="3")$category="積體電路設計";
      if($category=="4")$category="消費性家電產品開發與設計";      
      if($category=="5")$category="嵌入式系統開發與應用";
      if($category=="6")$category="通訊技術";
      if($category=="7")$category="網路技術開發與應用";      
      if($category=="8")$category="多媒體與數位內容技術";
      if($category=="9")$category="居家照護產品開發與設計";
      if($category=="10")$category="多媒體安全與應用";
      if($category=="11")$category="雲端與物聯網應用技術";
      if($category=="12")$category="系統整合與應用";
      if($category=="13")$category="其他領域";
      if($category=="14")$category="Invited Sessions(智慧型自動化與智慧生活)";

$str = "select name,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$email) = mysql_fetch_row($list);





$url="ilt2018.ncut.edu.tw/";

$mail_title="智慧生活科技研討會(ILT2018) 已收到".$name."教授/先生等的論文稿";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您的論文資料，請確認：<br>
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
若需要更改資訊請登入本研討會網站"."<a href=\"http://".$url."\"><h2>http://ilt2018.ncut.edu.tw/</A>"."即可";
include "mail.php";
mysql_close($link);

header("location:happy.php?act=upload");



?>