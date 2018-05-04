<?php
if(!isset($_SESSION)){if (session_status() == PHP_SESSION_NONE) {session_start();}}
include "index_up.php";

$name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
$unit = filter_var($_POST['unit'], FILTER_SANITIZE_SPECIAL_CHARS);
$tel = filter_var($_POST['tel'], FILTER_SANITIZE_SPECIAL_CHARS);

//若前一頁 add.php 需要指導教授欄位時才會傳過來，暫不使用
if(isset($_POST["boss"])){
	$boss = filter_var($_POST['boss'], FILTER_SANITIZE_SPECIAL_CHARS);
}

$email2 = '';
$chk_unit=strtoupper($unit);
if  ($chk_unit=="UNKNOWN" || $email==$email2 ){
  exit;
}
?>

<style>
.content {
  font-size: 10pt;
  line-height: 20pt;
  color: rgb(255, 00, 00);
  letter-spacing:2px;
  text-align:center;
}
.title {
  color: rgb(0, 0, 173);
  font-size: 10pt;
  letter-spacing:2px;
  line-height:15pt;
}
</style>

<?php
//--------------驗証email格式是否正確------------
// if(!preg_match("/^.+@.+\\..+$/",$email))
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
  $act="您的email格式錯誤！";
?>

<br>
<div align="center">
<table class=title cellspacing="1" width="253" cellpadding="2">
<tr>
   <td width="247" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content><?php echo $act;?></td>
</tr>
<tr>
  <td colspan="4" align="center"><input type="button" value="上一頁" onClick="history.back()"></td>
<tr>
</table>
</div>

<?php
exit;
}

//--------------驗証email是否重覆----------------
$str = "select id from members where email='$email'";
$list = mysql_query($str,$link);
list($id) = mysql_fetch_row($list);
if($id != "")
{
  // $act="您的email重覆了，請重新填寫！";
  $url = 'add.php?msg=dup';
  echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">"; exit;
}
?>
<!-- <br>
<div align="center">
<table class=title cellspacing="1" width="253" cellpadding="2">
<tr>
   <td width="247" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content><?php echo $act;?></td>
</tr>
  <tr>
    <td colspan="4" align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
  <tr>
</table>
</div> -->

<?php


//----------------產生亂數------------------------
$keychars = "abcdefghijklmnopqrstuvwxyz023456789";
$length = 40;

// RANDOM KEY GENERATOR
$randkey2 = "";
for ($i=0;$i<8;$i++)
  $randkey2 .= substr($keychars, rand(1, strlen($keychars) ), 1);


//取出最後一筆資料的ID加1
$str ="select * from members ORDER BY sn DESC";
$list = mysql_query($str,$link);
list($id) = mysql_fetch_row($list);
$reid=substr($id,3);
$no_reg= $reid + 1;

if ($no_reg<10)
{
  settype($no_reg,"string");
  $ilt="ILT00";
  $randkey1 = "$ilt$no_reg";
}
if ($no_reg>9 and $no_reg<100)
{
  settype($no_reg,"string");
  $ilt="ILT0";
  $randkey1 = "$ilt$no_reg";
}
if ($no_reg>99 and $no_reg<1000)
{
  settype($no_reg,"string");
  $ilt="ILT";
  $randkey1 = "$ilt$no_reg";
}

$ip = $_SERVER['REMOTE_ADDR'];

//寫入使用者基本資料至資料庫
$str="insert into members (id,passwd,name,email,unit,tel,addtime,ip)
values ('$randkey1','$randkey2','$name','$email','$unit','$tel',now(),'$ip')";
mysql_query($str,$link);

//--------------寄送Email信件----------------
$mail_title = config('settings.titleC')."會員帳號及密碼通知";
$mail_content = <<< EOF
敬愛的 $name 教授/先生 您好，以下為您的基本資料，請確認：<br>
姓名： $name <br>
電子郵件： $email <br>
帳號： $randkey1 <br>
登入密碼： $randkey2 <br>
服務單位： $unit <br>
聯絡電話： $tel <br>
============================================================<br>
若需要更改資訊請登入本研討會網站即可
EOF;
echo $mail_content; exit;
include "mail.php";

//註冊Session

//$id = $randkey1;
//$_SESSION["id"]=$id ;
//session_register("id");

//自動導向

$act="已註冊成功，";
$act.="請至您的信箱收取帳號密碼，";
$act.="此郵件可能被當作垃圾郵件，若無收到確認信，請至垃圾圾郵件查看!";
$act.="若還是未收取信件，請來信告知!<br>";
?>

<br>
<div align="center">
<table class=title cellspacing="1" width="253" cellpadding="2">
<tr>
   <td width="247" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content><?php echo $act;?></td>
</tr>
<tr><td>姓名：<?php echo $name;?></td></tr>
<tr><td>電子郵件：<?php echo $email;?></td></tr>
<tr><td>論文編號(登入帳號)：<?php echo $randkey1;?><BR><span class="content">請妥善保存帳號</span></td></tr>
<tr><td>登入密碼：<?php echo $randkey2;?><br><span class="content">請馬上更改密碼</span></td></tr>
<tr><td>
  <a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a><span class="content">建議列印保存</span>
</td></tr>
</table>
</div>

<?php
  include "index_down.php";
?>
