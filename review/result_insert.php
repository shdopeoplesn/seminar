<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require "../db.php";

$adminss=$_SESSION["reminss"];
$adminid=$_SESSION["reminid"];
$adminpw=$_SESSION["reminpw"];

$comment=$_POST["comment"];
$recommend=$_POST["recommend"];
//$comment=addslashes($comment);

$Submit=$_POST["Submit"];
$Submit2=$_POST["Submit2"];

$str = "select paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from reviewer where id='$adminid'";
$list = mysql_query($str,$link);
list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15) = mysql_fetch_row($list);

if ($Submit2 != ""){
$act="資料已暫存至資料庫中";
	if ($papernumber==$paperno1){
		$str = "update reviewer set comment1='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno2){
		$str = "update reviewer set comment2='$comment'  where id='$adminid'";
		mysql_query($str,$link);
	}
	if ($papernumber==$paperno3){
		$str = "update reviewer set comment3='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno4){
		$str = "update reviewer set comment4='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno5){
		$str = "update reviewer set comment5='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno6){
		$str = "update reviewer set comment6='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno7){
		$str = "update reviewer set comment7='$comment'  where id='$adminid'";
		mysql_query($str,$link);
	}
	if ($papernumber==$paperno8){
		$str = "update reviewer set comment8='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno9){
		$str = "update reviewer set comment9='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno10){
		$str = "update reviewer set comment10='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno11){
		$str = "update reviewer set comment11='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno12){
		$str = "update reviewer set comment12='$comment'  where id='$adminid'";
		mysql_query($str,$link);
	}
	if ($papernumber==$paperno13){
		$str = "update reviewer set comment13='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno14){
		$str = "update reviewer set comment14='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno15){
		$str = "update reviewer set comment15='$comment'  where id='$adminid'";
		mysql_query($str,$link);	
	}
}

if ($Submit!=""){
$act="資料已送出";
	if ($papernumber==$paperno1){
		$str = "update reviewer set comment1='$comment',recommend1='$recommend',chktime1=now(),chk_state1='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}

	if ($papernumber==$paperno2){
		$str = "update reviewer set comment2='$comment',recommend2='$recommend',chktime2=now(),chk_state2='1'  where id='$adminid'";
		mysql_query($str,$link);	

	}

	if ($papernumber==$paperno3){
		$str = "update reviewer set comment3='$comment',recommend3='$recommend',chktime3=now(),chk_state3='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno4){
		$str = "update reviewer set comment4='$comment',recommend4='$recommend',chktime4=now(),chk_state4='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	
	if ($papernumber==$paperno5){
		$str = "update reviewer set comment5='$comment',recommend5='$recommend',chktime5=now(),chk_state5='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno6){
		$str = "update reviewer set comment6='$comment',recommend6='$recommend',chktime6=now(),chk_state6='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno7){
		$str = "update reviewer set comment7='$comment',recommend7='$recommend',chktime7=now(),chk_state7='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno8){
		$str = "update reviewer set comment8='$comment',recommend8='$recommend',chktime8=now(),chk_state8='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno9){
		$str = "update reviewer set comment9='$comment',recommend9='$recommend',chktime9=now(),chk_state9='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno10){
		$str = "update reviewer set comment10='$comment',recommend10='$recommend',chktime10=now(),chk_state10='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno11){
		$str = "update reviewer set comment11='$comment',recommend11='$recommend',chktime11=now(),chk_state11='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno12){
		$str = "update reviewer set comment12='$comment',recommend12='$recommend',chktime12=now(),chk_state12='1'  where id='$adminid'";
		mysql_query($str,$link);	

	}

	if ($papernumber==$paperno13){
		$str = "update reviewer set comment13='$comment',recommend13='$recommend',chktime13=now(),chk_state13='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	if ($papernumber==$paperno14){
		$str = "update reviewer set comment14='$comment',recommend14='$recommend',chktime14=now(),chk_state14='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}
	
	if ($papernumber==$paperno15){
		$str = "update reviewer set comment15='$comment',recommend15='$recommend',chktime15=now(),chk_state15='1'  where id='$adminid'";
		mysql_query($str,$link);	
	}

}







/*
//--------------驗証email格式是否正確------------
if(!ereg("^.+@.+\\..+$",$email))
{
   header("location:happy.php?act=email");
   exit;
}

//--------------驗証email是否重覆----------------
$str = "select count(*) from members where email='$email'";
$list = mysql_query($str,$link);
list($count) = mysql_fetch_row($list);
if($count == 1)
 {
   header("location:happy.php?act=email_error");
   exit;
 }

//----------------產生亂數------------------------
$keychars = "abcdefghijklmnopqrstuvwxyz0123456789";
$length = 40;

// RANDOM KEY GENERATOR
$randkey2 = "";
for ($i=0;$i<8;$i++)
  $randkey2 .= substr($keychars, rand(1, strlen($keychars) ), 1); 
  
  
$result=mysql_query("Select * from members");
$no_reg=mysql_num_rows($result)+1;


if ($no_reg<10)
{
settype($no_reg,string);
$ilt="ilt00";
$randkey1 = "$ilt$no_reg"; 
}
if ($no_reg>9 and $no_reg<100)
{
settype($no_reg,string);
$ilt="ilt0";
$randkey1 = "$ilt$no_reg"; 
}

if ($no_reg>99 and $no_reg<1000)
{
settype($no_reg,string);
$ilt="ilt";
$randkey1 = "$ilt$no_reg"; 
}




//輸入使用者基本資料至資料庫
$str="insert into members (id,passwd,no,name,email,unit,position,tel,address,addtime,no2,author2,unit2,email2,position2,tel2,no3,author3,unit3,email3,position3,tel3,no4,author4,unit4,email4,position4,tel4) 
values ('$randkey1','$randkey2','1','$name','$email','$unit','$position','$tel','$address',now(),'2','$author2','$unit2','$email2','$position2','$tel2','3','$author3','$unit3','$email3','$position3','$tel3','4','$author4','$unit4','$email4','$position4','$tel4')";
mysql_query($str,$link);




//--------------寄送Email信件----------------
$mail_title="智慧生活科技研討會";
$mail_content="親愛的".$name."教授/先生 您好，以下為您的基本資料，請確認：
姓名：".$name."
電子郵件：".$email."
帳號：".$randkey1."
登入密碼：".$randkey2."
服務單位：".$unit."
聯絡電話：".$tel."
聯絡住址：".$address."
============================================================
若需要更改資訊請登入本研討會網站即可";
include "mail.php";


//註冊Session

//$id = $randkey1;
//$_SESSION["id"]=$id ;
//session_register("id");

//自動導向

header("location:show.php");
*/
//	echo "修改成功";


?>

<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
 .title 
 { 
   color: rgb(0, 0, 173);
   font-size: 10pt;
   letter-spacing:2px;
   line-height:15pt;
 }

</style>



<br>
<div align="center">
<table class=title cellspacing="1" width="253" cellpadding="2">
<tr>
   <td width="247" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content><div align="center">     <?php=$act?></div></td>
</tr>                
</table>
</div>
