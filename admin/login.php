<?php
require "../db.php";
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ILT2018研討會後端管理系統</title>
<style type=text/css>
<!--
body{
background-image : url(images/title.jpg);
background-repeat : no-repeat;
background-position : 00% 00%;
background-attachment : fixed;
}
  .content
  { 
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    text-align:center;
  }
-->
</style>
</head>
<body bgcolor="#E8E8E8">
<div align="center">
 　<p>　</p>
	<p>　</p>
 <table border="0" width="229" id="table1">
        <form action="login_chk.php" method="post">
		<tr>
			<td width="89" class=content>帳號：</td>
			<td width="130" class=content><input type="text" name="admid" size="19"></td>
		</tr>
		<tr>
			<td width="89" class=content>密碼：</td>
			<td width="130" class=content><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2" class=content><input type="submit" value="登入"></td>
		</tr>
        </form>
 </table>
</div>
</body>

</html>