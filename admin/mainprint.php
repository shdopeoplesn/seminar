<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
</head>
<body>

<div align="center">
	<table border="0" width="500" cellspacing="1" cellpadding="0" id="table1">
		<tr>
			<td width="56" align="center">序號</td>
			<td width="386">
			<p align="center">session name</td>
			<td align="center">
			<p align="center">print</td>
		</tr>
<?php
$str = "select sn,name from numbers order by sn ";
$list = mysql_query($str,$link);
while(list($sn,$name) = mysql_fetch_row($list))
{
?>
		<tr>
			<td width="56" align="center"><?php=$sn?></td>
			<td width="386"><?php=$name?></td>
			<td align="center"><a href="../administrator_print<?php=$ccnumber?>.php?mainsn=<?php=$sn?>" target="_blank">print</a></td>
		</tr>
<?php
}
?>
	</table>
</div>

</body>
</html>