<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
include "index_up.php";

//for PHP 5.4 and after
$act = mysql_real_escape_string($_GET['act']);

if($act=="add")$act="填寫完基本資料，即可上傳論文！";
if($act=="state")$act="很抱歉，您的帳號尚未啟動，<br>如您未收到啟動信件，您可以重新寄發email。";
if($act=="start_error")$act="啟動帳號錯誤！";
if($act=="start")$act="您的帳號已啟動！";
if($act=="upload")$act="論文上傳完成！<p><input type=\"button\" value=\"上傳其他論文\" onClick=\"location.href='authority.php'\">";
if($act=="update")$act="修改完成";
if($act=="login")$act="您已登入";
if($act=="destroy")$act="您已登出";
if($act=="email")$act="您的email格式錯誤！";
if($act=="email_error")$act="您的email重覆了，請重新填寫。";
if($act=="error")$act="很抱歉，您所輸入的ID或密碼有誤，請重新輸入。";
if($act=="online")$act="恭喜您報名參加研討會完成！<p>若是自行開車，請收取Email信件，並列印停車證。";
if($act=="forget_error")$act="很抱歉，你所輸入的姓名或Email並不存在！";
if($act=="reemail_error")$act="很抱歉，你所輸入的Email不存在！";
if($act=="password_send")$act="密碼已寄出您的信箱，請到信箱收取！";
if($act=="reemail")$act="信件已寄出，請到信箱收取！";
if($act=="forget")$act="很抱歉，你所輸入的Email不存在！";
if($act=="forget_send")$act="信件已寄出，請到信箱收取！";
if($act=="final")$act="定稿論文上傳完成！";
if($act=="papername_error")$act="英文論文名稱重複！";
if($act=="paperchinesename_error")$act="中文論文名稱重複！";
if($act=="show_error")$act="非本人相關資訊！";
if($act=="register_error")$act="您已經註冊過，請勿重複註冊！";
if($act=="online_error")$act="出席者不可為空白！";
if($act=="file_error")$act="檔案格式錯誤，本研討會僅接受.pdf .doc .docx檔案格式！";
if($act=="file_empty")$act="置換檔案錯誤！";
if($act=="account_upload")$act="上傳完成！";
if($act=="time")$act="時間未到或是已經超過定稿上傳時間！";
if($act=="file_error1")$act="檔案格式錯誤，本研討會僅接受bmp jpg png檔案格式！";
if($act=="on_line2check")$act="報名已截止";

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
   <td class=content><?php if (isset($act)) echo $act ?></td>
</tr>                
</table>
</div>

<?php
include "index_down.php";
?>