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
<?php
  //取得檔案名稱
  $new_file=$_FILES["filename"]["name"];
  //取得檔案副檔名
  $main=substr($new_file,-4,4);
  $new_file="寄款人資料".$main;
  //轉換小寫
  $main=strtolower($main);
  if($main!=".xls")
    {
		header("location:happy.php?act=file_error");
      exit;
    }
copy($_FILES["filename"]["tmp_name"],"phpExcelReader/".$new_files); 


/*

require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->setDefaultFormat('%.0f');
$data->read("$accountupload.xls");

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
?>
<body>


</body>

</html>
