<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
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
<br><br>
<table border="1" width="100%" bordercolorlight="#000000" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center">序號</td>
		<td align="center">論文編號</td>
		<td align="center">論文中文名稱</td>
		<td align="center">論文英文名稱</td>
	</tr>
<?php
$str = "select category from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category) = mysql_fetch_row($list);
$i=1;
$str="select papernumber,papername,paperchinesename from  papers where  category='$category' and excellent!='0' order by papernumber ";
$list =mysql_query($str,$link);
while(list($papernumber,$papername,$paperchinesename) = mysql_fetch_row($list))
{
?>
	<tr>
		<td align="center"><?php=($i)?></td>
		<td align="center"><?php=$papernumber?></td>
		<td align="center"><?php=$paperchinesename?></td>
		<td align="center"><?php=$papername?></td>
	</tr>
<?php
$i=$i+1;
}
?>
</table>
</body>
</html>