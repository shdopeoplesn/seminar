<?
$to=$email;
echo send_mail($to,$mail_title,$mail_content);


function send_mail($to, $subject = 'No subject', $body) {
$loc_host = "mail.ncut.edu.tw"; //發信計算機名，可隨意
$smtp_acc = "ilt2015"; //Smtp認證的用戶名
$smtp_pass="ilt7210"; //Smtp認證的密碼，一般等同pop3密碼
$smtp_host="spam.ncut.edu.tw"; //SMTP服務器地址，類似 smtp.tom.com
$from="ilt2015@mail.ncut.edu.tw"; //發信人Email地址，你的發信信箱地址
$headers = "Content-Type:text/html; charset=\"utf8\"\r\nContent-Transfer-Encoding: base64";
$lb="\r\n"; //linebreak

//$hdr = explode($lb,$headers); //解析後的hdr
//if($body) {$bdy = preg_replace("/^\./","..",explode($lb,$body));}//解析後的Body

$smtp = array(
//1、EHLO，期待返回220或者250
array("EHLO ".$loc_host.$lb,"220,250","HELO error: "),
//2、發送Auth Login，期待返回334
array("AUTH LOGIN".$lb,"334","AUTH error:"),
//3、發送經過Base64編碼的用戶名，期待返回334
array(base64_encode($smtp_acc).$lb,"334","AUTHENTIFICATION error : "),
//4、發送經過Base64編碼的密碼，期待返回235
array(base64_encode($smtp_pass).$lb,"235","AUTHENTIFICATION error : "));
//5、發送Mail From，期待返回250
$smtp[] = array("MAIL FROM: <".$from.">".$lb,"250","MAIL FROM error: ");
//6、發送Rcpt To。期待返回250
$smtp[] = array("RCPT TO: <".$to.">".$lb,"250","RCPT TO error: ");
//7、發送DATA，期待返回354
$smtp[] = array("DATA".$lb,"354","DATA error: ");
//8.0、發送From
$smtp[] = array("From: ".$from.$lb,"","");
//8.2、發送To
$smtp[] = array("To: ".$to.$lb,"","");
//8.1、發送標題
$smtp[] = array("Subject: ".$subject.$lb,"","");
//8.3、發送其他Header內容
foreach($hdr as $h) {$smtp[] = array($h.$lb,"","");}
//8.4、發送一個空行，結束Header發送
$smtp[] = array($lb,"","");
//8.5、發送信件主體
$smtp[] = array($mail_content.$lb,"","");
//9、發送「.」表示信件結束，期待返回250
$smtp[] = array(".".$lb,"250","DATA(end)error: ");
//10、發送Quit，退出，期待返回221
$smtp[] = array("QUIT".$lb,"221","QUIT error: ");

//打開smtp服務器端口
$fp = @fsockopen($smtp_host, 25);
if (!$fp) echo "<b>Error:</b> Cannot conect to ".$smtp_host."<br>";
while($result = @fgets($fp, 1024)){if(substr($result,3,1) == " ") { break; }}

$result_str="";
//發送smtp數組中的命令/數據
foreach($smtp as $req){
//發送信息
@fputs($fp, $req[0]);
//如果需要接收服務器返回信息，則
if($req[1]){
//接收信息
while($result = @fgets($fp, 1024)){
if(substr($result,3,1) == " ") { break; }
};
if (!strstr($req[1],substr($result,0,3))){
$result_str.=$req[2].$result."<br>";
}
}
}
//關閉連接
@fclose($fp);
return $result_str;
}
?>