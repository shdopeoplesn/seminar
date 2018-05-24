<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}

$id = $_SESSION["id"];
$new_pw = filter_var($_POST['new_pw'],FILTER_SANITIZE_STRING);
$renew_pw = filter_var($_POST['renew_pw'],FILTER_SANITIZE_STRING);
$old_pw = filter_var($_POST['old_pw'],FILTER_SANITIZE_STRING);
include "chksession.php";
require "db.php";
include "index_up.php";

/*
$str = "select name,passwd,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$passwd,$email) = mysql_fetch_row($list);
*/

new \Pixie\Connection('mysql', $config, 'QB');
$query = QB::table('members')->select(['name','passwd','email'])
->where('id','=', $id);
$answer=$query->get(); 
$name = $answer[0]->name;
$passwd = $answer[0]->passwd;
$email = $answer[0]->email;

if($passwd != $old_pw)
 {
   //header("location:edit_password?act=error");
   
   echo "很抱歉，您所輸入的密碼有誤，請重新輸入。";
   
   exit;
 }


 /*
$str = "update members set passwd='$renew_pw' where id='$id'";
mysql_query($str,$link);
*/
$data = array(
	'passwd' => $renew_pw
);
QB::table('members')->where('id', $id)->update($data);


$mail_title="智慧生活科技研討會-修改登入密碼";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您修改的資料，請確認：<br>
原本密碼：".$old_pw."<br>
修改後的密碼：".$new_pw."<br>
============================================================><br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";

mysql_close($link);
$act="更新完畢";?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {font-size: 12px}
.style3 {font-size: 12px; color: #FF0000; }
-->
</style>

<div align="center">
  <table class=title cellspacing="1" width="253" cellpadding="2">
    <tr>
      <td width="247" bgcolor="#FFCCFF">
      <p align="center">系統訊息</td>
    </tr>
    <tr>
      <td class=content><?php echo $act; ?></td>
    </tr>      
    <tr><td>登入密碼：<?php echo $new_pw; ?>
      <BR>
      <span class="style3">請妥善保存密碼</span></td>
    </tr>
    <tr><TD>
    <a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a><span class="content style1 style2">建議列印保存</span></TD></TR>
  </table>
  <?php include "index_down.php";?>
</div>
