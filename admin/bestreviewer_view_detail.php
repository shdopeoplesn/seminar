<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style type="text/css">
  .title
  { color: rgb(204, 204, 255);
    background-color: rgb(51, 51, 153);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:3px;
    text-align:center;
  }
  .content
  { color: rgb(131, 131, 131);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    background-color: rgb(249, 249, 249);
  }
   .paperstyle 
   {  
    text-decoration: underline;
   }
</style>
</head>
<body>

<?php

$str = "select papername,paperman,category from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papername,$paperman,$category) = mysql_fetch_row($list);

?>
<div align="center">
	<table border="0" width="500">
		<tr>
			<td width="73" class=title>論文名稱</td>
			<td class=content><?php=$papername?></td>
		</tr>
		<tr>
			<td width="73" class=title>論文作者</td>
			<td class=content><?php=$paperman?></td>
		</tr>
		<tr>
			<td width="73" class=title>論文下載</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">下載</span></td>
		</tr>
		<tr>
			<td width="73" class=title>摘要下載</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'">下載</span></td>
		</tr>
		<tr>
			<td class=content colspan="2"><br></td>
		</tr>
		<tr>
 			<td class=content  colspan="2" align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
		</tr>
	</table>
</div>
<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>
</body>
</html>