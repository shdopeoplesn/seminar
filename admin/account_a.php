<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

//$chk_id=strtoupper(substr($id,0,7));
//if ($chk_id!="ied2012"){
//session_destroy();
//header("location:login.php");
//exit;
//}
?>



<style type="text/css">
.content 
   {  
    color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
   }
.title 
   {  
    color: rgb(51, 51, 255);
    font-size: 10pt;
    letter-spacing:2px;
    line-height:15pt;
   }
.ex 
 { 
   color: rgb(160, 160, 160);
   font-size: 9pt;
 }
.sp
 { 
   color: rgb(255, 0, 0);
   font-size: 9pt;
 }

</style>
<SCRIPT language=javascript>
function formcheck() {
if ( document.Regist.category.value == "" ) {
alert("管理人數已滿！");
document.Regist.category.focus();
return false;	
}
if ( document.Regist.session_name.value == "" ) {
alert("請上輸入Session chair 的名子!");
document.Regist.session_name.focus();
return false;	
}
if ( document.Regist.session_email.value == "" ) {
alert("請輸入Session chair 的E-mail！");
document.Regist.session_email.focus();
return false;	
}
return true;
	}
</SCRIPT>


<br>
<div align="center">
<table class=title cellspacing="1" width="466" cellpadding="2">
<tr>
   <td width="450" bgcolor="#FFCCFF" align="center">
	<p align="center">入帳登記</td>  
</tr>
</table>
<div align="center">
<form action="account_a_insert.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data">
<table class=content cellspacing="1" width="499" class=contnet>

<tr>
   <td width="50" align="center">帳號</td>
   <td width="50" align="center">金額</td>
   <td width="50" align="center">時間</td>
</tr>

<tr>
   <td width="50" align="center">1.<input type="text" name="id1" size="6"></td>
   <td width="50" align="center"><input type="text" name="money1" size="5"></td>
   <td width="50" align="center"><input type="text" name="time1" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">2.<input type="text" name="id2" size="6"></td>
   <td width="50" align="center"><input type="text" name="money2" size="5"></td>
   <td width="50" align="center"><input type="text" name="time2" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">3.<input type="text" name="id3" size="6"></td>
   <td width="50" align="center"><input type="text" name="money3" size="5"></td>
   <td width="50" align="center"><input type="text" name="time3" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">4.<input type="text" name="id4" size="6"></td>
   <td width="50" align="center"><input type="text" name="money4" size="5"></td>
   <td width="50" align="center"><input type="text" name="time4" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">5.<input type="text" name="id5" size="6"></td>
   <td width="50" align="center"><input type="text" name="money5" size="5"></td>
   <td width="50" align="center"><input type="text" name="time5" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">6.<input type="text" name="id6" size="6"></td>
   <td width="50" align="center"><input type="text" name="money6" size="5"></td>
   <td width="50" align="center"><input type="text" name="time6" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">7.<input type="text" name="id7" size="6"></td>
   <td width="50" align="center"><input type="text" name="money7" size="5"></td>
   <td width="50" align="center"><input type="text" name="time7" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">8.<input type="text" name="id8" size="6"></td>
   <td width="50" align="center"><input type="text" name="money8" size="5"></td>
   <td width="50" align="center"><input type="text" name="time8" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">9.<input type="text" name="id9" size="6"></td>
   <td width="50" align="center"><input type="text" name="money9" size="5"></td>
   <td width="50" align="center"><input type="text" name="time9" size="5"></td>
</tr>
<tr>
   <td width="50" align="center">10.<input type="text" name="id10" size="6"></td>
   <td width="50" align="center"><input type="text" name="money10" size="5"></td>
   <td width="50" align="center"><input type="text" name="time10" size="5"></td>
</tr>
<tr>
    <td width="50" align="center"></td>
    <td width="50" align="center"></td>
   <td width="50" align="center"><input type="submit" value="確定"></td>
</tr>
</table>
</form>

</div>