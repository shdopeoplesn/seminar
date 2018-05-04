<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";


$str = "select id,papername,paperman,papernumber,nscno,nsc_papername,nsc_number,nsc_usename from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($original_id,$papername,$paperman,$papernumber,$nscno) = mysql_fetch_row($list);

if ($original_id!==$id){
session_destroy();
header("location:happy.php?act=destroy");
exit;
}


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
.title1 
   {  
    color: rgb(51, 51, 255);
    font-size: 12pt;
    letter-spacing:2px;
    line-height:15pt;
   }
.sp
 { 
   color: rgb(255, 0, 0);
   font-size: 9pt;
 }
</style>

<SCRIPT language=javascript>
function formcheck() {
if ( document.Regist.final_abstract.value == "" ) {
alert("請上傳定稿摘要！");
document.Regist.final_abstract.focus();
return false;	
}
if ( document.Regist.final_file.value == "" ) {
alert("請上傳定稿論文！");
document.Regist.final_file.focus();
return false;	
}

Regist.style.display="none";
message.style.display="block";


return true;
	}
</SCRIPT>

<br>

<div align="center">
<form action="final_update.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data">

<div align="center">
<table class=title cellspacing="1" width="397" cellpadding="2">
<tr>
   <td width="391" bgcolor="#FFCCFF" align="center">
	<p align="center">定稿論文上傳</td>  
</tr>
</table>


<table class=content cellspacing="1" width="434" >
<?php
$str = "select sn from members where email='$id'";
$list = mysql_query($str,$link);
list($sn) = mysql_fetch_row($list);

$str = "select papername,paperchinesename,papernumber,category,nscno,nsc_papername,nsc_number,nsc_usename from papers where serial='$serial'";
$list = mysql_query($str,$link);
(list($papername,$paperchinesename,$papernumber,$category,$nscno,$nsc_papername,$nsc_number,$nsc_usename) = mysql_fetch_row($list))

?>
<tr>
  <td colspan="2" align="center">論文英文名稱 : <?php=$papername?></td>
</tr>
<tr>
  <td colspan="2" align="center">論文中文名稱 : <?php=$paperchinesename?></td>
</tr>
<tr>
  <td colspan="2" align="center">論文編號 : <?php=$papernumber?></td>
</tr>
<tr>
  <td colspan="2" align="center">國科會計畫名稱 : <?php=$nsc_papername?></td>
</tr>
<tr>
  <td colspan="2" align="center">國科會NSC編號 : <?php=$nsc_number?></td>
</tr>
<tr>
  <td colspan="2" align="center">NSC計畫主持人 : <?php=$nsc_usename?></td>
</tr>

<tr>
    <td width="144" align="center">定稿摘要上傳：</td>
    <td width="283"><input type="file" name="final_abstract" size="28"></td>
</tr>
<tr>
    <td width="144" align="center">定稿論文上傳：</td>
    <td width="283"><input type="file" name="final_file" size="28"></td>
</tr>
<tr>
    <td width="124" align="center"><span class=note></span>國科會計劃名稱：</td>
    <td width="263" style="text-align: left">
	<input type="text" name="nsc_papername" value="<?php echo $nsc_papername; ?>" size="24"></td>
</tr>
<tr>
    <td width="124" align="center"><span class=note></span>國科會NSC編號：</td>
    <td width="263" style="text-align: left">
	<input type="text" name="nsc_number" value="<?php echo $nsc_number; ?>" size="24"></td>
</tr>
<tr>
    <td width="124" align="center"><span class=note></span>NSC計畫主持人：</td>
    <td width="263" style="text-align: left">
	<input type="text" name="nsc_usename" value="<?php echo $nsc_usename; ?>" size="24"></td>
</tr>

<tr>
   <td width="144" align="center"></td>
   <td width="283" class=sp>本研討會接受PDF、DOC檔案格式</td>
</tr>
<tr>
   <td colspan="2" align="center"><input type="hidden" name="category" value="<?php=$category?>"><input type="hidden" name="serial" value="<?php=$serial?>"><input type="submit" value="上傳"></td>
</tr>
</table>
</form>
</div>




<style type="text/css">
  .content1
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
</style>


<form name="message"  style="display:none" >
<br>
<div align="center">
<table class=title cellspacing="1" width="253" cellpadding="2">
<tr>
   <td width="247" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content1>檔案上傳中!</td>
</tr>                
</table>
</div>
</form>




<?php
include "index_down.php";
?>