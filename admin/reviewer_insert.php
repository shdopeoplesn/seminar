<?php
require "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
$ip=$REMOTE_ADDR;

$str = "select category,abbr from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category,$abbr) = mysql_fetch_row($list);


//--------------驗証email格式是否正確------------
if(!ereg("^.+@.+\\..+$",$email))
{
   header("location:happy.php?act=email");
   exit;
}

//--------------驗証email是否重覆----------------
/*
$str = "select id from reviewer where email='$email'";
$list = mysql_query($str,$link);
while(list($chk_abbr) = mysql_fetch_row($list))
{
$chk_abbr = substr($chk_abbr, 0,3); 

if($abbr == $chk_abbr)
 {
   header("location:happy.php?act=email_error");
   exit;
 }
}*/
//----------------產生亂數------------------------
$keychars = "abcdefghijklmnopqrstuvwxyz0123456789";
$length = 40;

// RANDOM KEY GENERATOR
$randkey = "";
for ($i=0;$i<8;$i++)
  $randkey .= substr($keychars, rand(1, strlen($keychars) ), 1); 
  
$randkey2 = "";
for ($i=0;$i<10;$i++)
  $randkey2 .= substr($keychars, rand(1, strlen($keychars) ), 1); 


$str = "select category,abbr from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category,$abbr) = mysql_fetch_row($list);

$result=mysql_query("Select * from reviewer where id like '$abbr%'");
$category_count=mysql_num_rows($result)+1;

if ($category_count<10)
{
settype($no_reg,string);
$category_count = "00$category_count"; 
}
if ($category_count>9 and $category_count<100)
{
settype($no_reg,string);
$category_count = "0$category_count"; 
}

$abbr="$abbr"."R";
$reviewer_id="$abbr$category_count";

$str = "insert into reviewer(id,passwd,name,sever,email,chk_number) 
values('$reviewer_id','$randkey','$name','$sever','$email','$randkey2')";

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
	  

$mail_title="懇請".$name."教授/先生 擔任ILT2018的邀請擔任".$category."的REVIEWER";
$mail_content="懇請".$name."教授/先生 擔任ILT2018邀請擔任".$category."的REVIEWER，基本資料如下：<br>
帳號：".$reviewer_id."<br>
密碼：".$randkey."<br>
============================================================<br>
審稿者網址：http://ilt2018.ncut.edu.tw/review/login.php<br>
若需要更改資訊請登入本研討會網站即可

請您於4月30號之前完成審稿作業，若無法審稿或有任何問題，請以EMAIL通知ILT2018<br>
我們會與您聯繫";

//$url="ilt2018.ncut.edu.tw/review/reply.php?key=".$randkey2;
//$mail_content.="回函確認"."<a href=\"http://".$url."\"><h2>請點我</h2> </A>"; 


include "mail.php";


mysql_query($str,$link);
header("location:happy.php?act=reviewer_add");

?>