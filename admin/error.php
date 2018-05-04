<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
  
 <style type="text/css">
 .system1 { 
    font-size: 9pt;
    background-color: rgb(211, 220, 227);
    letter-spacing:1px;
    }

 .system2 {
    font-size: 9pt;
    background-color: rgb(245, 245, 245);
    letter-spacing:1px;
    }
  </style>
</head>
<body>
<div align="center">
	<table border="0" width="250" cellspacing="1" cellpadding="0">
		<tr>
			<td height="25" class=system1>
			<p align="center"><b>錯誤訊息</b></td>
		</tr>
		<tr>
			<td height="55" class=system2><?php echo $errortxt; ?></td>
		</tr>
		<tr>
			<td height="25" class=system1>
			<p align="center"><input type="button" value="取消‧返回" onClick="history.go(-1)"></td>
		</tr>
	</table>
</div>
</body>
</hmtl>
