<?php
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
    if ( document.Regist.name.value == "" ) {
	 alert("請輸入【姓名】！");
	 document.Regist.name.focus();
	 return false;	
    }
    if ( document.Regist.email.value == "" ) {
	 alert("請輸入【Email】！");
	 document.Regist.email.focus();
	 return false;	
    }
    if ( document.Regist.sever.value == "" ) {
	 alert("請輸入【職稱】！");
	 document.Regist.sever.focus();
	 return false;	
    }

    return true;
}
</script>
</head>
<body>
<div align="center">
 <table border="0" width="375" cellspacing="1" cellpadding="0">
     <form action="reviewer_insert.php" method="post" name="Regist" onSubmit="return formcheck();">
		<tr>
			<td width="120" align="center" class=title>姓名：</td>
			<td class=content width="252"><input type="text" name="name"></td>
		</tr>
        <tr>
			<td width="120" align="center" class=title>職稱：</td>
			<td class=content width="252"><input type="text" name="sever"></td>
		</tr>
		<tr>
			<td width="120" align="center" class=title>Email：</td>
			<td class=content width="252"><input type="text" name="email"></td>
		</tr>

		<tr>
			<td align="center" class=content colspan="2">
			<input type="submit" value="新增評審"></td>
		</tr>
      </form>
 </table>
</div>
</body>
</html>