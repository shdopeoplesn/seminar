<?php
require "db.php";

if (session_status() == PHP_SESSION_NONE) {session_start();}
$original_id = $_SESSION["id"];


$str = "select id,papername,paperchinesename,papernumber,paperman,nscno,nsc_papername,nsc_number,nsc_usename from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($id,$papername,$paperchinesename,$papernumber,$paperman,$nscno,$nsc_papername,$nsc_number,$nsc_usename) = mysql_fetch_row($list);

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
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
 .title 
 { 
   color: rgb(0, 0, 173);
   font-size: 10pt;
   letter-spacing:2px;
   line-height:15pt;
 }

</style>

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
 .paperstyle 
   {  
    text-decoration: underline;
   }
   .note 
 { 
   color: rgb(249, 32, 18);
   font-size: 9pt;
    letter-spacing:1px;
 }
</style>

<SCRIPT language=javascript>
function formcheck() {
/*var basic,show,chk1,chk2,chk3,chk_flag,i,j;
basic=" 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
chk_flag="0";
for(i=0;i<document.Regist.papername.value.length;i++){
chk1=document.Regist.papername.value.substring(i,i+1);
chk3="0";
	for(j=0;j<basic.length;j++){
		chk2=basic.substring(j,j+1);
		if (chk1==chk2){chk3="1";}
	}
if (chk3=="0"){chk_flag="1";}
}
if ( chk_flag == "1" ) {
alert("英文欄位中不可有中文名稱！");
document.Regist.focus();
return false;	
}

*/


if ( document.Regist.papername.value == "" ) {
alert("請輸入英文論文名稱！");
document.Regist.papername.focus();
return false;	
}
if ( document.Regist.paperchinesename.value == "" ) {
alert("請輸入中文論文名稱！");
document.Regist.paperchinesename.focus();
return false;	
}
if ( document.Regist.paperman.value == "" ) {
alert("請輸入作者姓名！");
document.Regist.paperman.focus();
return false;	
}

return true;
	}

</SCRIPT>

<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>
<br>
<div align="center">
<table class=title cellspacing="1" width="392" cellpadding="2">
<tr>
   <td width="386" bgcolor="#FFCCFF">
	<p align="center">論文編輯<font color="#666666">(</font><font color="#FF0000"><span class=sp>*</span></font><font color="#666666">為必填欄位)</font></td>
</tr>
</table>

<form action="paper_update.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data" class=content>
<div align="center">
<table class=content cellspacing="1" width="394">
<tr>
   <td width="124" align="center"><span class=note>*</span>論文編號：</td>
   <td class=paper_content width="66"><?php echo $papernumber;?></td>
</tr>
<tr>
   <td width="124" align="center"><span class=note>*</span>英文論文名稱：</td>
   <td width="263" style="text-align: left"><input type="text" name="papername" value="<?php echo $papername; ?>"></td>
</tr>
<tr>
   <td width="124" align="center"><span class=note>*</span>中文論文名稱：</td>
   <td width="263" style="text-align: left"><input type="text" name="paperchinesename" value="<?php echo $paperchinesename; ?>"></td>
</tr>

<tr>
   <td width="124" align="center"><span class=note>*</span>論文作者：</td>
   <td width="263" style="text-align: left">
	<input type="text" name="paperman" value="<?php echo $paperman; ?>" size="24"></td>
</tr>
<tr>
    <td width="124" align="center"><span class=note></span>國科會計畫名稱：</td>
    <td width="263" style="text-align: left">
	<input type="text" name="nsc_papername" value="<?php echo $nsc_papername; ?>" size="30"></td>
</tr>
<tr>
    <td width="124" align="center"><span class=note></span>國科會NSC編號：</td>
    <td width="263" style="text-align: left">
	<input type="text" name="nsc_number" value="<?php echo $nsc_number; ?>" size="30"></td>
</tr>
<tr>
    <td width="124" align="center"><span class=note></span>NSC計畫主持人：</td>
    <td width="263" style="text-align: left">
	<input type="text" name="nsc_usename" value="<?php echo $nsc_usename; ?>" size="30"></td>
</tr>
<tr>
   <td align="center"><span class=note>*</span>論文檔案：</td><td style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'"><?php=$raw_file?></span>[<a href="paper_edit_defile.php?serial=<?php=$serial?>" onclick="return confirm('確定要重新上傳論文論文？')">重新上傳論文</a>]</td>
</tr>
<tr>
   <td align="center"><span class=note>*</span>摘要檔案：</td><td style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'"><?php=$raw_excerpt?></span>[<a href="paper_edit_deexcerpt.php?serial=<?php=$serial?>" onclick="return confirm('確定要重新上傳摘要？')">重新上傳摘要</a>]</td>
</tr>
<?php
if($chkstate == "1" and $main_file != NULL and $main_excerpt != NULL)
{
?>
<tr>
   <td align="center"><span class=note>*</span>定稿論文：</td><td style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_file_download.php?serial=<?php=$serial?>'"><?php=$main_rawfile?></span>[<a href="main_edit_defile.php?serial=<?php=$serial?>" onclick="return confirm('確定要重新上傳定稿論文？')">重新上傳論文</a>]</td>
</tr>
<tr>
   <td align="center"><span class=note>*</span>定稿摘要：</td><td style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_excerpt_download.php?serial=<?php=$serial?>'"><?php=$main_rawexcerpt?></span>[<a href="main_edit_deexcerpt.php?serial=<?php=$serial?>" onclick="return confirm('確定要重新上傳定稿摘要？')">重新上傳摘要</a>]</td>
</tr>
<?php
}
?>

<tr>
   <td colspan="2" align="center">
         <input type="hidden" name="serial" value="<?php echo $serial;?>">
         <input type="hidden" name="papernumber" value="<?php echo $papernumber;?>">
         <input type="submit" value="修改">&nbsp;&nbsp;<input type="button" value="上一頁" onClick="history.go(-1)"></td>
</tr>
</table>
</div>
</form>

<?php
include "index_down.php";
?>