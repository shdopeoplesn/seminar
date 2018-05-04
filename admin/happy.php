<?php

if($act=="start_error")$act="啟動帳號錯誤！";
if($act=="start")$act="您的帳號已啟動！";
if($act=="update")$act="修改完成";
if($act=="login")$act="您已登入";
if($act=="destroy")$act="您已登出";
if($act=="email")$act="您的email格式錯誤！";
if($act=="email_error")$act="您的email重覆了，請重新填寫。";
if($act=="error")$act="很抱歉，您所輸入的ID或密碼有誤，請重新輸入。";
if($act=="forget_error")$act="很抱歉，你所輸入的姓名或Email並不存在！";
if($act=="reemail_error")$act="很抱歉，你所輸入的Email不存在！";
if($act=="password_send")$act="密碼已寄出您的信箱，請到信箱收取！";
if($act=="reemail")$act="信件已寄出，請到信箱收取！";
if($act=="forget")$act="很抱歉，你所輸入的Email不存在！";
if($act=="forget_send")$act="信件已寄出，請到信箱收取！";
if($act=="category_error")$act="你所輸入該類別管理者已重複！";
if($act=="session_add_ok")$act="新增管理者成功！";
if($act=="reviewer_add")$act="新增審查者成功！";
if($act=="repeat_error")$act="審查人員重複！";
if($act=="bestreviewer_add")$act="新增最佳論文審查者成功！";
if($act=="reivewer_over")$act="審查人員審稿數超過15個！";
if($act=="reveiwer_update")$act="更新審稿名單成功！";
if($act=="bestreveiwer_update")$act="更新最佳論文審稿名單成功！";
if($act=="paper_set")$act="設定完成！";
if($act=="bestpaper_set")$act="最佳論文設定完成！";
if($act=="reviewer_resend")$act="審稿者資料重送成功！";
if($act=="bestreviewer_resend")$act="最佳論文審稿者資料重送成功！";


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
   <td class=content><?php=$act?></td>
</tr>                
</table>
</div>

