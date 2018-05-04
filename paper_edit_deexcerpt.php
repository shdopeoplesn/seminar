<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";
include "index_up.php";


$str = "select id from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($paper_id) = mysql_fetch_row($list);

if($id !=$paper_id)
{
 exit;
}

$str = "select raw_abstract  from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($raw_excerpt) = mysql_fetch_row($list);
?>
<style type="text/css">
.title 
   {  
    color: rgb(51, 51, 255);
    font-size: 10pt;
    letter-spacing:2px;
    line-height:15pt;
   }
.content 
   {  
    color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
   }
.content1
   { 
    color: rgb(51, 51, 51);
    font-size: 9pt;
   }

</style>


<SCRIPT language=javascript>
function formcheck() {
up_form.style.display="none";
message.style.display="block";
}
	</SCRIPT>

<br>
<div align="center">
<form action="excerpt_replace.php" name="up_form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
<input type="hidden" name="serial" value="<?php=$serial?>">


<div align="center">
<table class=title cellspacing="1" width="498" cellpadding="2">
<tr>
   <td width="492" bgcolor="#FFCCFF" align="center">
	<p align="center">重新上傳摘要</td>  
</tr>
</table>


<table width="500">
<tr>
   <td class=content width="129">原本的摘要檔案：</td>
   <td width="361" class=content1><?php=$raw_excerpt?></td>
<tr>
   <td class=content width="129">要上傳的摘要檔案：</td>
   <td width="361" class=content1><input type="file" name="filename1" size="42"></td>
</tr>
<tr>
   <td colspan="2" align="center">
	<input type="submit" value="重新上傳摘要" onclick="return confirm('確定要重新上傳摘要？\n上傳後，原本的摘要檔案將會被取代！')">&nbsp;&nbsp;<input type="button" value="上一頁" onClick="history.go(-1)"></td>
</tr>
</table>
</form>
</div>



<style type="text/css">
  .content_st
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
   <td class=content_st>檔案上傳中!</td>
</tr>                
</table>
</div>
</form>


<?php
include "index_down.php";
?>