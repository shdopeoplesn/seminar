<?php
require "db.php";
if(!ereg("^.+@.+\\..+$",$chkid))
{
   $msg="您的email格式錯誤，請重新輸入！";
}
else
{
   $str = "select count(*) from members where email='$chkid'";
   $list = mysql_query($str,$link);
   list($count) = mysql_fetch_row($list);
   if($count == 1)
   {
      $msg="您的email重覆，請重新輸入！";
   }
   else
   {
      $msg="恭喜您，您的Email可以正常使用！";
   }
}
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>系統訊息</title>
<style type="text/css">
 .title
    {
       color: rgb(102, 102, 102);
       background-color: rgb(204, 255, 255);
       font-size: 11pt;
       font-weight: bold;
       height:20px;
    }
    .msg
    {
       color: rgb(102, 102, 102);
       background-color: rgb(249, 249, 249);
       font-size: 9pt;
       height:100px;
       text-align:center;
    }
    .close
    {
       text-align:center;
       background-color: rgb(249, 249, 249);
    }
</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div align="center">
	<table border="0" width="300" cellspacing="1" cellpadding="0">
		<tr>
			<td class=title>Email驗證結果：</td>
		</tr>
		<tr>
			<td class=msg><?php=$msg?></td>
		</tr>
		<tr>
			<td class=close><a href="JavaScript:self.close();"><img border="0" src="images/close.gif" width="80" height="23"></a></td>
		</tr>
	</table>
</div>
</body>
</html>