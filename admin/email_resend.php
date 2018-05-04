<?php
require "../db.php";

$str = "select id,passwd,name,email,chk_number ,reply_count from reviewer where id='$re_id'";
$list = mysql_query($str,$link);
list($id,$passwd,$name,$email,$chk_number,$reply_count) = mysql_fetch_row($list);
$reply_count=$reply_count+1;

$str = "update reviewer set reply_count='$reply_count' where id='$re_id'";
mysql_query($str,$link); 

$mail_title="懇請".$name."教授/先生 擔任ILT2018的邀請擔任".$category."的REVIEWER";
$mail_content="懇請".$name."教授/先生 擔任ILT2018邀請擔任".$category."的REVIEWER，基本資料如下：<br>
帳號：".$id."<br>
密碼：".$passwd."<br>
============================================================<br>
審稿者網址：http://ilt2018.ncut.edu.tw/review/login.php<br>
若需要更改資訊請登入本研討會網站即可

若無法審稿或有任何問題，請以EMAIL通知ILT2018<br>
<a href='mailto:ilt2018@ncut.edu.tw'>ilt2018@ncut.edu.tw</a><br>
我們會與您聯繫";

//$url="ilt2018.ncut.edu.tw/review/reply.php?key=".$chk_number;
//$mail_content.="回函確認"."<a href=\"http://".$url."\"><h2>請點我</h2> </A>";

include "mail.php";


header("location:happy.php?act=reviewer_resend");
?>