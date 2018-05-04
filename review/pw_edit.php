<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>修改密碼</title>
<SCRIPT language=javascript>
function chpwcheck()
{
    if ( document.chpw.oldpw.value == "" )
     {
	alert("請輸入舊密碼！");
	document.chpw.oldpw.focus();
	return false;	
     }

    if ( document.chpw.newpw.value == "" )
     {
	alert("請輸入新密碼！");
	document.chpw.newpw.focus();
	return false;	
     }

    if ( document.chpw.newpwre.value == "" )
     {
	alert("請輸入新的確認密碼！");
	document.chpw.newpwre.focus();
	return false;	
     }

    if (document.chpw.newpw.value != document.chpw.newpwre.value) 
     {
	alert("密碼與確認密碼不一致！");
	document.chpw.newpw.value = "";
	document.chpw.newpwre.value = "";
	document.chpw.newpw.focus();
	return false;		
     }

     if ( document.chpw.newpw.value.length != 8)
     {
	alert("新密碼請輸入8位！");
	document.chpw.newpw.value = "";
	document.chpw.newpwre.value = "";
	document.chpw.newpw.focus();
	return false;	
     }

     if ( document.chpw.newpwre.value.length != 8)
     {
	alert("新確認密碼請輸入8位！");
	document.chpw.newpw.value = "";
	document.chpw.newpwre.value = "";
	document.chpw.newpwre.focus();
	return false;	
     }
     return confirm("修改密碼後請重新登入！");
}
</SCRIPT>
</head>
<body>
<form action="pw_update.php" method="post" name="chpw" onsubmit="return chpwcheck();">
<div align="center">
	<table border="0" width="400" cellspacing="1">
		<tr>
			<td width="148" align="right" height="25">
			<font size="2" color="#666666">請輸入舊密碼：</font></td>
			<td width="249" height="25">
			<input type="password" name="oldpw" size="20"></td>
		</tr>
		<tr>
			<td width="148" align="right" height="25">
			<font size="2" color="#666666">請輸入新密碼：</font></td>
			<td width="249" height="25">
			<font color="#666666">
			<input type="password" name="newpw" size="20">
			</font><font size="2" color="#666666"></font></td>
		</tr>
		<tr>
			<td width="148" align="right" height="25">
			<font size="2" color="#666666">請再次輸入新密碼：</font></td>
			<td width="249" height="25">
			<input type="password" name="newpwre" size="20">
			<font color="#666666" size="2"></font></td>
		</tr>
		<tr>
			<td width="397" height="25" colspan="2">
			<p align="center"><input type="submit" value="修改密碼"></td>
		</tr>
	</table>
</div>
</form>
</body>
</html>