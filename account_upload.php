<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php"; 
require "db.php";
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

.note {   color: rgb(249, 32, 18);
   font-size: 9pt;
    letter-spacing:1px;
}
</style>
	<div align="center">
<form action="account_insert.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data"  >

<div align="center">
<table class=title cellspacing="1" width="466" cellpadding="2">
<tr>
    <td width="112" align="center"><span class=sp>*</span>照片上傳：</td>
    <td width="380"><input type="file" name="boss" size="28"></td>
</tr>
	<tr>
   <td colspan="2" align="center"><input type="submit" value="上傳"></td>

</tr>
	<tr>
   <td colspan="2" align="center">僅接受 jpg bmp png 三種格式</td>

</tr>

</table>
</form>
</div>
<style type="text/css">
  .content1
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
</style>


<form name="message"  style="display:none" >
<br>
<div align="center">
<table class=title cellspacing="1" width="253" cellpadding="2">
<tr>
   <td width="247" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content1>檔案上傳中!</td>
</tr>                
</table>
</div>
</form>