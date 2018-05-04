<?php
include "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");

if( empty($start) )$start=0;
if( empty($ends) )$ends=999;
if( empty($eats2) ) $eats2 = '';
$str="select count(*) from register where receipt1!='' or uniformno1!='' ";
$list =mysql_query($str,$link);
list($number_count) = mysql_fetch_row($list);
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
<form method="POST" action="code_namelist.php">
<div align="center">
	<table border="0" width="345" cellspacing="1" cellpadding="0">
		<tr>
			<td width="341" colspan="3">
			<p align="center"><font size="6" face="標楷體">2018ILT統一編號名單</font></td>
		</tr>
		<tr>
			<td width="119" bgcolor="#F8F8F8"><p align="right">列印起始序號：</td>
			<td width="65" bgcolor="#F8F8F8"><input type="text" name="start" size="7" value="<?php echo $start;?>"></td>
			<td width="157" align="right">統一編號總人數：<?php echo $number_count; ?></td>
		</tr>
		<tr>
			<td width="119" bgcolor="#F8F8F8"><p align="right">讀取資料筆數：</td>
			<td width="65" bgcolor="#F8F8F8"><input type="text" name="ends" size="7" value="<?php echo $ends; ?>"></td>
			<td width="157" align="right"><?php echo $eats2; ?></td>
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
		<td align="center">會員編號</td>
		<td align="center">姓名</td>
		<td align="center">單位</td>
		<td align="center">身份</td>
		<td align="center">發票抬頭</td>
		<td align="center">統一編號</td>
	</tr>
<?php
$i=1;

$str="select serial,id,receipt1,uniformno1,position1 from register where receipt1!='' and uniformno1!='' order by serial limit $start,$ends ";
$list =mysql_query($str,$link);
while(list($serial,$id,$receipt,$uniformno,$position1) = mysql_fetch_row($list))
{
$position=$position1;
$stra="select name,unit from members where id='$id' ";
$lista =mysql_query($stra,$link);
list($name,$unit) = mysql_fetch_row($lista);

if ($position=="1"){$position="教授";}
if ($position=="2"){$position="研究生";}
if ($position=="3"){$position="大學生";}
if ($position=="4"){$position="一般社會人士";}
?>
	<tr>
		<td align="center"><?php echo $id; ?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $position; ?></td>
		<td align="center"><?php echo $receipt; ?></td>
		<td align="center"><?php echo $uniformno; ?></td>
	</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>