<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";



require "db.php";
include "index_up.php";
?>


<style type="text/css">
 .content 
   {  
    color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
   }
 .title 
   {  
    color: rgb(51, 51, 255);
    font-size: 10pt;
    letter-spacing:2px;
    line-height:15pt;
   }
 .note
   { 
    color: rgb(255, 0, 0);
    font-size: 9pt;
   }

</style>

<SCRIPT language=javascript>
function formcheck() {
if ( document.Regist.unit.value == "" ) {
alert("請輸入服務單位！");
document.Regist.unit.focus();
return false;	
}
if ( document.Regist.tel.value == "" ) {
alert("請輸入聯絡電話！");
document.Regist.tel.focus();
return false;	
}

return true;
	}
</SCRIPT>

<?php

$str = "select name,unit,tel,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$unit,$tel) = mysql_fetch_row($list);

?>
<br>
<div align="center">
<table class=title cellspacing="1" width="307" cellpadding="2">
<tr>
   <td width="301" bgcolor="#FFCCFF">
	<p align="center">修改基本資料<font color="#666666">(</font><font color="#FF0000"><span class=sp>*</span></font><font color="#666666">為必填欄位)</font></td>
 
</tr>
</table>
<form action="update_data.php" name="Regist" onsubmit="return formcheck();" method="post">
<div align="center">
<table class=content cellspacing="1" width="304">
<tr>
   <td width="81"><span class=note>*</span>姓名：</td>
   <td width="216"><?php echo $name; ?></td>

</tr>

<tr>
   <td width="81"><span class=note>*</span>服務單位：</td>
   <td width="216"><input type="text" name="unit"  maxlength="50" value="<?php echo $unit; ?>"></td>
</tr>
<tr>
    <td width="81"><span class=note>*</span>聯絡電話：</td>
    <td width="216"><input type="text" name="tel"  maxlength="30" value="<?php echo $tel; ?>"></td>
</tr>
<tr>
   <td colspan="2" align="center"><input type="submit" value="修改"></td>
</tr>
</table>
</div>
</form>

<?php
include "index_down.php";
?>