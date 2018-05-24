<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";

$unit = filter_var($_POST['unit'],FILTER_SANITIZE_STRING);
$tel = filter_var($_POST['tel'],FILTER_SANITIZE_NUMBER_INT);


new \Pixie\Connection('mysql', $config, 'QB');
$data = array(
	'unit'        => $unit,
	'tel' => $tel
);
QB::table('members')->where('id', $id)->update($data);

$query = QB::table('members')->select(['name', 'email'])
->where('id','=', $id);
$answer=$query->get(); 
$name = $answer[0]->name."<br />";
$email = $answer[0]->email."<br />";

$mail_title="智慧生活科技研討會-修改基本資料";
$mail_content="敬愛的".$name."教授/先生 您好，以下為您修改的資料，請確認：<br>
               服務單位：".$unit."<br>
               聯絡電話：".$tel."<br>
               
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
include "mail.php";

//mysql_close($link);

header("location:happy.php?act=update");
echo '123';
exit();

?>