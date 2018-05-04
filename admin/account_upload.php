<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>銷帳上傳頁面</title>
<style type="text/css">
<!--
body {
	background-color: #00CCFF;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style></head>
<SCRIPT language=javascript>

function formcheck() {

if ( document.Regist.filename.value == "" ) {
alert("請上傳檔案！");
document.Regist.filename.focus();
return false;	
}

Regist.style.display="none";
message.style.display="block";
return true;	

	}
</SCRIPT>
<body>
<form action="account_upload_insert.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data"  >
<tr> <td align="center"><div align="center"><span class="style1">銷帳上傳網頁</span>
</div></td></tr>
<tr><td><div align="center">上傳檔案：
      <input type="file" name="filename" size="28">
</div></td></tr>
<tr><td><div align="center"><input type="submit" value="上傳"></div></td></tr>
</form>

</body>

</html>
