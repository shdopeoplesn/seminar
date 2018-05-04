<?php
require("check.php");
include "../db.php";

if( empty($start) )$start=0;
if( empty($ends) )$ends=999;

$str="select count(*) from on_line where traffic='自行開車' ";
$list =mysql_query($str,$link);
list($car_count) = mysql_fetch_row($list);
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<form method="POST" action="eat_namelist.php">
<div align="center">
	<table border="0" width="345" cellspacing="1" cellpadding="0">
		<tr>
			<td width="341" colspan="3">
			<p align="center"><font size="6" face="標楷體">2015ILT自行開車名單</font></td>
		</tr>
		<tr>
			<td width="119" bgcolor="#F8F8F8"><p align="right">列印起始序號：</td>
			<td width="65" bgcolor="#F8F8F8"><input type="text" name="start" size="7" value="<?php=$start?>"></td>
			<td width="157" align="right">開車總人數：<?php=$car_count?></td>
		</tr>
		<tr>
			<td width="119" bgcolor="#F8F8F8"><p align="right">讀取資料筆數：</td>
			<td width="65" bgcolor="#F8F8F8"><input type="text" name="ends" size="7" value="<?php=$ends?>"></td>
			<td width="157" align="right"><?php=$eats2?></td>
		</tr>
		<tr>
			<td colspan="2" width="185" bgcolor="#F8F8F8"><p align="center"><input type="submit" value="送出" name="B1"></td>
			<td width="157"><p align="center"><a href="javascript:window.print()">列印</a></td>
		</tr>
	</table>
</div>
</form>
<font color="#CC0000">※請自行濾除重覆之名單</font><br>
<br>
<table border="1" width="100%" bordercolorlight="#000000" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center">序號</td>
		<td align="center">姓名</td>
		<td align="center">單位</td>
		<td align="center">身份</td>
		<td align="center">聯絡電話</td>
		<td align="center">車牌</td>
	</tr>
<?php
$str="select sn,name,unit,career,tel,plate from on_line where traffic='自行開車' order by sn limit $start,$ends ";
$list =mysql_query($str,$link);
while(list($sn,$name,$unit,$career,$tel,$plate) = mysql_fetch_row($list))
{
?>
	<tr>
		<td align="center"><?php=($sn-1)?></td>
		<td align="center"><?php=$name?></td>
		<td align="center"><?php=$unit?></td>
		<td align="center"><?php=$career?></td>
		<td align="center"><?php=$tel?></td>
		<td align="center"><?php=$plate?></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>