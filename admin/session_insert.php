<?php
$category=$_POST["categorylist"];
$session_name=$_POST["session_name"];
$session_email=$_POST["session_email"];
//if (session_status() == PHP_SESSION_NONE) {session_start();}
//$id = $_SESSION["id"];
//include "chksession.php";
require "../db.php";

//--------------驗証email是否重覆----------------
$str = "select count(*) from session where category='$category'";
$list = mysql_query($str,$link);
list($count) = mysql_fetch_row($list);
if($count == 1)
 {
   header("location:happy.php?act=category_error");
   exit;
 }



//--------------驗証email格式是否正確------------
if(!ereg("^.+@.+\\..+$",$session_email))
{
   header("location:happy.php?act=email");
   exit;
}

//--------------驗証email是否重覆----------------
$str = "select count(*) from session where session_email='$session_email'";
$list = mysql_query($str,$link);
list($count) = mysql_fetch_row($list);
if($count == 1)
 {
   header("location:happy.php?act=email_error");
   exit;
 } 


      if($category=="1"){
	  $session_id="ILT2018_iee";
	  $email="ILT2018_ier@ncit.edu.tw";
	  $abbr="IEE";
	  }
	  
      if($category=="2"){
	  $session_id="ILT2018_ics";
	  $email="ILT2018_ics@ncit.edu.tw";	  
	  $abbr="ICS";	  
	  }	  
      if($category=="3"){
		$session_id="ILT2018_icd";
	  $email="ILT2018_icd@ncit.edu.tw";	  		
	  $abbr="ICD";	  
	  }
      if($category=="4"){
		$session_id="ILT2018_3c";
	  $email="ILT2018_3c@ncit.edu.tw";	  		
	  $abbr="3C";	  
	  }			
      if($category=="5"){
		$session_id="ILT2018_esd";
	  $email="ILT2018_esd@ncit.edu.tw";	  		
	  $abbr="ESD";	  
	  }
	  
      if($category=="6"){
		$session_id="ILT2018_ctd";
	  $email="ILT2018_ctd@ncit.edu.tw";	  		
	  $abbr="CTD";	  
	  }	  
      if($category=="7"){     
  		$session_id="ILT2018_ntd";
	  $email="ILT2018_ntd@ncit.edu.tw";	  			
	  $abbr="NTD";	  
	  }
      if($category=="8"){
		$session_id="ILT2018_mdc";
	  $email="ILT2018_mdc@ncit.edu.tw";	  		
	  $abbr="MDC";	  
	  }	  
      if($category=="9"){
  		$session_id="ILT2018_hcd";
	  $email="ILT2018_hcd@ncit.edu.tw";	  			
	  $abbr="HCD";	  
	  }
	    if($category=="10"){
  		$session_id="ILT2018_isa";
	  $email="ILT2018_isa@ncit.edu.tw";	  			
	  $abbr="MSA";	  
	  }
           if($category=="11"){
  		$session_id="ILT2018_cit";
	  $email="ILT2018_cit@ncit.edu.tw";	  			
	  $abbr="CIT";	  
	  }
          if($category=="12"){
  		$session_id="ILT2018_sia";
	  $email="ILT2018_sia@ncit.edu.tw";	  			
	  $abbr="SIA";	  
	  }
          if($category=="13"){
  		$session_id="ILT2018_oth";
	  $email="ILT2018_oth@ncit.edu.tw";	  			
	  $abbr="OTH";	  
	  }
          if($category=="14"){
  		$session_id="ILT2018_ins";
	  $email="ILT2018_ins@ncit.edu.tw";	  			
	  $abbr="INS";	  
	  }
           

$keychars = "abcdefghijklmnopqrstuvwxyz0123456789";
$length = 40;

// RANDOM KEY GENERATOR
$randkey = "";
for ($i=0;$i<9;$i++){
  $randkey .= substr($keychars, rand(1, strlen($keychars) ), 1); }





$str="insert into session (session_id,passwd,category,abbr,session_name,session_email) 
values ('$session_id','$randkey','$category','$abbr','$session_name','$session_email')";
mysql_query($str,$link);

$temp=$session_email;
$session_email=$email;
$email=$temp;

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

$url="ILT2018.ncut.edu.tw/admin/login.php";
$mail_title=" 感謝".$session_name."教授擔任".$category." session chair, 請查收您的帳號及密碼";
$mail_content="敬愛的".$session_name."教授/先生 您好，以下為您的基本資料，請確認：<br>
	 	 姓名：".$session_name."<br>
	 	 帳號：".$session_id."<br>
		 密碼：".$randkey."<br>
	     類別：".$category."<br>
	 類別簡稱：".$abbr."<br>
	 
     前至管理者網址 ”新增審查者”。
     每篇文章定於兩位審查者，而同一審查者可最多審查10篇。
     並將每篇文章分配於審查者。
============================================================<br>
管理者網址：" ;
$mail_content.="<a href=\"http://".$url."\">http://ILT2018.ncut.edu.tw/admin/login.php </A><br>
若需要更改資訊請登入本研討會網站即可<p>";
include "mail.php";

header("location:happy.php?act=session_add_ok");
?>