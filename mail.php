<?php

//引入文件
require_once("./phpmailer/class.phpmailer.php");

//宣告一個PHPMailer物件
$mail = new PHPMailer();

//設定使用SMTP發送
$mail->IsSMTP();

//指定SMTP的服務器位址
$mail->Host = "spam.ncut.edu.tw";
//設定SMTP服務的POSTㄑ
$mail->Port = 25;

//設定為安全驗證方式
$mail->SMTPAuth = true;

//SMTP的帳號
$mail->Username = "ILT2018";
//SMTP的密碼
$mail->Password = "ncut7210";

//寄件人Email
$mail->From = "ILT2018@ncut.edu.tw";
//寄件人名稱
$mail->FromName = "2018年智慧生活科技研討會";

//收件人Email
$mail->AddAddress($email);

//設定密件副本
$mail->AddBCC("s4a512104@student.ncut.edu.tw");

//設定信件字元編碼
$mail->CharSet="UTF-8";
//設定信件編碼，大部分郵件工具都支援此編碼方式
$mail->Encoding = "base64";
//設置郵件格式為HTML
$mail->IsHTML(true);
//每50自斷行
$mail->WordWrap = 50;

//傳送附檔
//$mail->AddAttachment("upload/temp/filename.zip");
//傳送附檔的另一種格式，可替附檔重新命名
//$mail->AddAttachment("upload/temp/filename.zip", "newname.zip");

//郵件標題
$mail->Subject=$mail_title;
//郵件內容
$mail->Body ="
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">

</head>
<body>
".$mail_content."
</body>
</html>
";

//附加內容
//$mail->AltBody = '這是附加的信件內容';

//寄送郵件
if(!$mail->Send())
{
//echo "郵件無法順利寄出!";
//echo "Mailer Error: " . $mail->ErrorInfo;

exit;
}
//echo "郵件已經順利寄出!";

?>
