<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php"; 
include "index_up.php";
require "db.php";
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

.note {   color: rgb(249, 32, 18);
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
alert("請輸入論文英文名稱！");
document.Regist.papername.focus();
return false;	
}
if ( document.Regist.paperchinesename.value == "" ) {
alert("請輸入論文中文名稱！");
document.Regist.paperchinesename.focus();
return false;	
}

if (document.Regist.category.selectedIndex==0)
{
alert("請選擇投稿類別！");
document.Regist.paperchinesename.focus();
return false;	
}


if ( document.Regist.paperman.value == "" ) {
alert("請輸入論文作者！");
document.Regist.paperman.focus();
return false;	
}
if ( document.Regist.category.value == "" ) {
alert("論文類別！");
document.Regist.category.focus();
return false;	
}
if ( document.Regist.filename.value == "" ) {
alert("請上傳論文檔案！");
document.Regist.filename.focus();
return false;	
}
if ( document.Regist.excerpt.value == "" ) {
alert("請上傳摘要檔案！");
document.Regist.excerpt.focus();
return false;	
}
Regist.style.display="none";
message.style.display="block";
return true;	

	}
</SCRIPT>


<br>
<div align="center">
<form action="paper_insert.php" method="post" name="Regist" onsubmit="return formcheck();" enctype="multipart/form-data"  >

<div align="center">
<table class=title cellspacing="1" width="466" cellpadding="2">
<tr>
   <td width="460" bgcolor="#FFCCFF" align="center">
	<p align="center">論文上傳<font color="#666666">(</font><span class=sp>*</span><font color="#666666">為必填欄位)</font></td>  
</tr>
</table>
</div>

<table   class=content cellspacing="1" width="499">

<tr>
   <td width="112" align="center"><span class=sp>*</span>論文英文名稱：</td>
   <td width="380"><input type="text" name="papername">
     <span class="note"> ex:Intelligent Living </span></td>
</tr>
<tr>
   <td width="112" align="center"><span class=sp>*</span>論文中文名稱：</td>
   <td width="380"><input type="text" name="paperchinesename">
     <span class="note">ex:智慧生活</span></td>
</tr>

<?php
$str = "select name from members where id='$id'";
$list = mysql_query($str,$link);
list($name) = mysql_fetch_row($list);
$author=$name;
?>

<tr>
   <td width="112" align="center"><span class=sp>*</span>論文作者：</td>
   <td width="380"><input name="paperman" type="text" value = <?php=$author ?>   size="30">
     <span class="note">ex:王大明、林小白</span> </td>
</tr>
<tr>
   <td width="112" align="center"><span class=sp>*</span>投稿類別：</td>
   <td width="380"><select name=category>
                     <option value="0">請選擇</option>   
                     <option value="1">電能與節能技術</option>
　　　　　　 	     <option value="2">智慧型控制系統</option>
　　　　　　         <option value="3">積體電路設計</option>
　　　　　　         <option value="4">消費性家電產品開發與設計</option>
　　　　　　         <option value="5">嵌入式系統開發與應用</option>
　　　　　　         <option value="6">通訊技術</option>
　　　　　　         <option value="7">網路技術開發與應用</option>
　　　　　　         <option value="8">多媒體與數位內容技術</option>
　　　　　　         <option value="9">居家照護產品開發與設計</option>
                    <option value="10">多媒體安全與應用</option>
                    <option value="11">雲端與物聯網應用技術</option>
                    <option value="12">系統整合與應用</option>
                    <option value="13">其他領域</option>
                   <!-- <option value="14">Invited Sessions(智慧型自動化與智慧生活)</option>-->
                  </select>
   </td>
</tr>
<?php
   $str = "select serial,id,accept from papers where id='$id'";
   $list = mysql_query($str,$link);
   list($accept) = mysql_fetch_row($list);
   if ($accept!="0" or $accept!=""){
   if (list($accept) = mysql_fetch_row($list)){
?>
<!--<tr>
   <td width="112" align="center">國科會計劃編號：</td>
   <td width="380"><input type="text" name="nscno" size="30"></td>
</tr>-->
<?php
}}
?>
<tr>
    <td width="112" align="center"><span class=sp>*</span>論文上傳：</td>
    <td width="380"><input type="file" name="filename" size="28"></td>
</tr>
<tr>
   <td width="112" align="center"><span class=sp>*</span>論文摘要：</td>
   <td width="380" class=sp><input type="file" name="excerpt" size="28"></td>
</tr>
 <tr>
   <td width="112" align="center">國科會計畫名稱：</td>
   <td width="380" ><input type="text" name="nsc_papername" size="30"></td>
</tr>
<tr>
   <td width="112" align="center">國科會NSC編號：</td>
   <td width="380" ><input type="text" name="nsc_number" size="30"></td>
</tr>
<tr>
   <td width="112" align="center">NSC計畫主持人：</td>
   <td width="380" ><input type="text" name="nsc_usename" size="30"></td>
</tr>

<tr>
   <td width="112" align="center"></td>
   <td width="380" class=sp>本研討會接受PDF與DOC(Word)檔案格式</br>如不是國科會計畫者，國科會欄位可不必填。</td>
</tr>
<tr>
   <td colspan="2" align="center"><input type="submit" value="上傳"></td>
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


