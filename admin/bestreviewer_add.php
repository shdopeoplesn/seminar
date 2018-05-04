<?php
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
 <table border="0" width="550" cellspacing="1" cellpadding="0">
     <form action="bestreviewer_insert.php" method="post" name="Regist" onSubmit="return formcheck();">
		<tr>
			<td width="206" align="center" class=title>姓名：</td>
			<td class=content width="341"><input type="text" name="name" size="50"></td>
		</tr>
        <tr>
			<td width="206" align="center" class=title>職稱：</td>
			<td class=content width="341"><input type="text" name="sever" size="50"></td>
		</tr>
		<tr>
			<td width="206" align="center" class=title>Email：</td>
			<td class=content width="341"><input type="text" name="email" size="50"></td>
		</tr>
        <tr>
			<td width="206" align="center" class=title><font color="#FF0000">*</font>身分證字號：</td>
			<td class=content width="341"><input type="text" name="best_id" size="50"></td>
		</tr>
        <tr>
			<td width="206" align="center" class=title><font color="#FF0000">*</font>金融機構名稱及分行名稱：</td>
			<td class=content width="341"><input type="text" name="bank_name" size="50"></td>
		</tr>
        <tr>
			<td width="206" align="center" class=title><font color="#FF0000">*</font>匯款帳號：</td>
			<td class=content width="341"><input type="text" name="bank_id" size="50"></td>
		</tr>
        <tr>
			<td width="206" align="center" class=title><font color="#FF0000">*</font>戶籍住址：</td>
			<td class=content width="341"><input type="text" name="address" size="50" ></td>
		</tr>
          <tr>
			<td width="206" align="center" class=title>備註：</td>
	       <td class=content width="341"><div align="center"><font color="#FF0000">最佳論文審查者，如非本校教師人員(有審查費)，<br>則<strong>*</strong>為必填欄位。</font></div></td>
		</tr>

		<tr>
			<td align="center" class=content colspan="2">
			<input type="submit" value="新增最佳論文評審"></td>
		</tr>
      </form>
 </table>
</div>
</body>
</html>