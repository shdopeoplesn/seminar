<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

require("check.php");

//$chk_id=strtoupper(substr($id,0,7));
//if ($chk_id!="ILT2015"){
//session_destroy();
//header("location:login.php");
//exit;
//}
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
.ex 
 { 
   color: rgb(160, 160, 160);
   font-size: 9pt;
 }
.sp
 { 
   color: rgb(255, 0, 0);
   font-size: 9pt;
 }

</style>
<SCRIPT language=javascript>
function formcheck() {
if ( document.Regist.category.value == "" ) {
alert("管理人數已滿！");
document.Regist.category.focus();
return false;	
}
if ( document.Regist.session_name.value == "" ) {
alert("請上輸入Session chair 的名子!");
document.Regist.session_name.focus();
return false;	
}
if ( document.Regist.session_email.value == "" ) {
alert("請輸入Session chair 的E-mail！");
document.Regist.session_email.focus();
return false;	
}
return true;
	}
</SCRIPT>


<br>
<div align="center">
<table class=title cellspacing="1" width="466" cellpadding="2">
<tr>
   <td width="450" bgcolor="#FFCCFF" align="center">
	<p align="center">類別管理者設定</td>  
</tr>
</table>
<div align="center">
<form action="session_insert.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data">
<table class=content cellspacing="1" width="499" class=contnet>

<tr>
   <td width="150" align="center"><span class=sp></span>投稿類別：</td>
   <td width="330">
   <?php $i=1;
   ?>
   <select name="categorylist">
<?php
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
?>
                     <option value="1">電能與節能技術</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　 	     <option value="2">智慧型控制系統</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="3">積體電路設計</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="4">消費性家電產品開發與設計</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="5">嵌入式系統開發與應用</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="6">通訊技術</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="7">網路技術開發與應用</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="8">多媒體與數位內容技術</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="9">居家照護產品開發與設計</option>
<?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
　　　　　　         <option value="10">多媒體安全與應用</option>
  <?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
                    <option value="11">雲端與物聯網應用技術</option>
  <?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
                    <option value="12">系統整合與應用</option>
  <?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
                     <option value="13">其他領域</option>
  <?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
                   <!--  <option value="14">Invited Sessions(智慧型自動化與智慧生活)</option>
  <?php }$i=$i+1;
   $stra="select category from session where category='$i' ";
   $lista =mysql_query($stra,$link);
   list($category) = mysql_fetch_row($lista);
   if ($category==""){
 ?>
                   -->
<?php  } ?>
                  </select>
				  
   </td>
</tr>
<tr>
   <td width="150" align="center">Session chair 的姓名：</td>
   <td width="330"><input type="text" name="session_name" size="30"></td>
</tr>

<tr>
   <td width="150" align="center">Session chair 的E-mail：</td>
   <td width="330"><input type="text" name="session_email" size="30"></td>
</tr>
<tr>
   <td colspan="2" align="center"><input type="submit" value="確定"></td>
</tr>
</table>
</div>
</form>