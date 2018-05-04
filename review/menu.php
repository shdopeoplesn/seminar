<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["reviewer_id"];

?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
  <style type="text/css">
  .menu 
    {
      font-size: 10pt;
    }
  </style>
<style type="text/css">
      a:link    {text-decoration:underline;color:#0000ff;}
      a:visited {text-decoration:underline;color:#0000ff;}
      a:hover   {text-decoration:underline;color:#FF0000;}
.style1 {color: #FF0000}
</style> 
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table border="0" width="140" id="table1">
  <tr>
    <td colspan="2" bgcolor="#E6FFFF">　</td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="paper.php">論文評審</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="pw_edit.php">修改密碼</a></td>
  </tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="_top" href="login_out.php">登出系統</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FF0000">　</td>
	<td class=menu bgcolor="#E6FFFF"><a href="HELP_CODE.html" target="_blank">操作問題</a></td>
  </tr>
</table>
</body>
</html>