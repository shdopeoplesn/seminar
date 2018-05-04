<?php
require "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
$filename=$_POST["filename"];
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>銷帳上傳頁面</title>
<style type="text/css">
<!--
body {
	background-color: #00CCFF;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style></head>
<body>
<?php
if ( $_FILES["filename"]['size'] ) {
  // 原始檔名
  echo "上傳檔名：" . $_FILES["filename"]['name'] . "<br>";

  // 檔案大小
  echo "檔案大小：" . $_FILES["filename"]['size'] . "<br>";

  //取得檔案名稱
  $new_file=$_FILES["filename"]["name"];
  
  //取得檔案副檔名
  $main=substr($new_file,-4,4);
  $Xfile="寄款人資料".$main;
  
  //轉換小寫
  $main=strtolower($main);
  if($main!=".xls" & $main!=".txt")
    {
		header("location:happy.php?act=file_error");
      exit;
    }

  echo "新的檔名：" . $Xfile . "<br>";
if($main==".xls")
{
  // 儲存路徑
  $UploadPath = "./phpexcelreader/";
  $flag = unlink ($UploadPath.$Xfile);
  if ( $flag ) echo "刪除成功！<br>";
  else         echo "刪除失敗！<br>";
  // 存入實體目錄中
  $flag = copy($_FILES["filename"]['tmp_name'], $UploadPath.$Xfile);

  if ( $flag ) echo "上傳成功！<br>". "<br>";
  else         echo "上傳失敗！<br>". "<br>";
}
if($main==".txt")
{
  // 儲存路徑
  $UploadPath = "./txt/";
  $file="$UploadPath$Xfile";
  $flag = unlink ($UploadPath.$Xfile);
  if ( $flag ) echo "刪除成功！<br>";
  else         echo "刪除失敗！<br>";
  // 存入實體目錄中
  $flag = copy($_FILES["filename"]['tmp_name'], $UploadPath.$Xfile);

  if ( $flag ) echo "上傳成功！<br>". "<br>";
  else         echo "上傳失敗！<br>". "<br>";
  $fp=fopen($file,"r+");
  $a=10;
  $contents =fgets($fp,9);
$contents1 =fgets($fp,7);
$contents2 =fgets($fp,19);
$contents3 =fgets($fp,12);
$contents3=substr($contents3,-4,4);
$contents4 =fgets($fp,12);
fclose($fp);
echo "<table border=\"2\" cellspacing=\"1\" cellpadding=\"1\"><tr><td>研討會帳號</td><td>匯入日期</td><td>匯入帳號</td><td>匯入金額</td><td>銷帳編號</td></tr>";
echo "<td>$contents</td>";
echo "<td>$contents1</td>";
echo "<td>$contents2</td>";
echo "<td>$contents3</td>";
echo "<td>$contents4</td>";
echo "</tr><table>";
}


}
/*
require_once '/appserv/www/ilt2008/admin/phpexcelreader/Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->setDefaultFormat('%.0f');
$data->read("$Xfile");

error_reporting(E_ALL ^ E_NOTICE);

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		$account[$i][$j]=$data->sheets[0]['cells'][$i][$j];


	}
}
for ($ii=0;$ii<=$i;$ii++){
for ($jj=0;$jj<=$j;$jj++){
if ($account[$ii][$jj]!=""){
echo $account[$ii][$jj].",";}

}
if ($account[$ii][$j-1]!=""){
echo "<BR>";}

}*/

include "account_upload_show.php";
?>

</body>

</html>
