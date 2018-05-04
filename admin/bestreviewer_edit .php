<?php
require "../db.php";

$str = "select suid,re_name,re_id,re_password from reviewer where sn='$sn' ";
$list = mysql_query($str,$link);
list($suid,$re_name,$re_id,$re_password) = mysql_fetch_row($list);

$str = "select name from numbers where sn='$suid' ";
$list = mysql_query($str,$link);
list($unitname) = mysql_fetch_row($list);
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
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:right;
     line-height: 20pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
     background-color: rgb(255, 255, 180);
   }
</style>
<Script Language="javascript">
function formcheck() {
    if ( document.Regist.re_name.value == "" ) {
	 alert("請輸入【姓名(代號)】！");
	 document.Regist.re_name.focus();
	 return false;	
    }
    if ( document.Regist.re_id.value == "" ) {
	 alert("請輸入【帳號】！");
	 document.Regist.re_id.focus();
	 return false;	
    }
    if ( document.Regist.re_password.value == "" ) {
	 alert("請輸入【密碼】！");
	 document.Regist.re_password.focus();
	 return false;	
    }
    return true;
}
</script>
</head>
<body>
<form action="bestreviewer_update1.php" method="post" name="Regist" onSubmit="return formcheck();">
<input type="hidden" name="sn" value="<?php=$sn?>">
<div align="center">
 <table border="0" width="375" cellspacing="1" cellpadding="0">
		<tr>
			<td width="120" align="center" class=title>姓名(代號)：</td>
			<td class=content width="252"><input type="text" name="re_name" value="<?php=$re_name?>"></td>
		</tr>
		<tr>
			<td width="120" align="center" class=title>帳號：</td>
			<td class=content width="252"><input type="text" name="re_id" value="<?php=$re_id?>"></td>
		</tr>
		<tr>
			<td width="120" align="center" class=title>密碼：</td>
			<td class=content width="252"><input type="text" name="re_password" value="<?php=$re_password?>"></td>
		</tr>
		<tr>
			<td width="120" align="center" class=title>類別：</td>
			<td class=content width="252"><?php=$unitname?></td>
		</tr>
		<tr>
			<td align="center" class=content colspan="2"><input type="submit" value="編輯評審資料"></td>
		</tr>
      </form>
 </table>
</div>
</body>
</html>