<?php
require "db.php";
$id= filter_var($_POST["id"],FILTER_SANITIZE_STRING);
$email= filter_var($_POST["email"],FILTER_VALIDATE_EMAIL);
$str = "select email,name from members where id='$id'";
$list = mysql_query($str,$link);
list($check_mail,$name,$passwd) = mysql_fetch_row($list);

if($check_mail == "" || $check_mail!=$email)
 {
 include "index_up.php";
$act="很抱歉，你所輸入的帳號或Email錯誤！" ;
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
   <td class=content><?php echo $act; ?></td>
</tr>                
</table>
</div>

<?php
 exit;
 
 }
if  ($check_mail==$email)
{
//----------------產生亂數------------------------
$keychars = "abcdefghijklmnopqrstuvwxyz0123456789";
$length = 40;
// RANDOM KEY GENERATOR
$randkey = "";
for ($i=0;$i<8;$i++)
  $randkey .= substr($keychars, rand(1, strlen($keychars) ), 1); 

$str = "update members set passwd='$randkey' where id='$id'";
mysql_query($str,$link);

//--------------寄送Email信件----------------
$mail_title="智慧生活科技研討會會員帳號及密碼通知";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您的密碼，請確認：<p>
登入密碼：".$randkey."<p>
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";
include "index_up.php";
$act1="密碼已送出，請至您的Email收取！" ;
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
   <td class=content><?php echo $act1; ?></td>
</tr>                
</table>
</div>

<?php
}
include "index_down.php";
?>