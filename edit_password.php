<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";

include "index_up.php";


if(isset($_GET['act'])){
	//for PHP 5.4 and after
	$act = mysql_real_escape_string($_GET['act']);

	if($act==error)$error="很抱歉，您所輸入的密碼有誤，請重新輸入。";
}

?>

<style type="text/css">
.error 
 {
   color: rgb(255, 0, 0);
   font-size: 10pt;
   letter-spacing:1px;
 }
.note 
 { 
   color: rgb(249, 32, 18);
   font-size: 9pt;
    letter-spacing:1px;
 }
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
</style>
<SCRIPT language=javascript>
function checkpassword()
{   
 if (document.Regist.new_pw.value != document.Regist.renew_pw.value) 
  {
    alert("密碼與確認密碼不一致！");
    document.Regist.new_pw.value = "";
    document.Regist.renew_pw.value = "";
    document.Regist.new_pw.focus();
    return false;
  }
}	
</SCRIPT>

<span class=error>
<?php
if(isset($error)) echo $error;
?>
</span>
<body class=content>
<br>
<div align="center">
<table class=title cellspacing="1" width="383" cellpadding="2">
<tr>
   <td width="377" bgcolor="#FFCCFF">
	<p align="center">修改登入密碼<font color="#666666">(</font><font color="#FF0000"><span class=sp>*</span></font><font color="#666666">為必填欄位)</font></td>
</tr>
</table>
<form action="update_password.php" method="post" name="Regist">
<div align="center">
<table class=content cellspacing="1" width="379">
<tr>
   <td width="85"><span class=note>*</span>原本密碼：</td>
   <td width="287"><input type="text" name="old_pw" maxlength="8"></td>
</tr>
<tr>
   <td width="85"><span class=note>*</span>新的密碼：</td>
   <td width="287"><input type="password" name="new_pw" maxlength="8"></td>
</tr>
<tr>
    <td width="85"><span class=note>*</span>確認密碼：</td>
    <td width="287"><input type="password" name="renew_pw" maxlength="8" onblur=Javascript:checkpassword();></td>
</tr>
<tr>
   <td width="85"></td>
   <td width="287"><span class=note>密碼最多為8位數﹝可為數字、英文、英數混合﹞</span></td>
</tr>
<tr>
   <td colspan="2" align="center"><input type="submit" value="修改密碼"></td>
</tr>
</table>
</div>
</form>
<?php
include "index_down.php";
?>