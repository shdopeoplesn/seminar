<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";
require("check.php");
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 17pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
   .paperstyle 
   {  
    text-decoration: underline;
   }
 </style>
</head>
<body>

<div align="center">
	<table border="0" width="300">
		<tr>
			<td class=title>請下載word檔案填寫欲變更審稿者名單</td>
			<td class=content><div align="center"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#6666FF';" onClick="dwindow.location.href='change_download.php'">word檔案下載</span></div></td>
		</tr>
		<tr>
			<td class=title>填寫完請寄至<a href="mailto:ILT2018@ncut.edu.tw">ilt2018@ncut.edu.tw</a></td>
		</tr>

	</table>
</div>
<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>
</body>
</html>