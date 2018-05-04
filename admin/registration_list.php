<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
include "../db.php";
$tempcategory=$_GET["category"];
if ($tempcategory==""){$tempcategory="全部";}
$category="";
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<title>第十三屆智慧生活與科技研討會 簽到單</title>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:新細明體;
	panose-1:2 2 3 0 0 0 0 0 0 0;
	mso-font-alt:PMingLiU;
	mso-font-charset:136;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:3 137232384 22 0 1048577 0;}
@font-face
	{font-family:標楷體;
	panose-1:3 0 5 9 0 0 0 0 0 0;
	mso-font-charset:136;
	mso-generic-font-family:script;
	mso-font-pitch:fixed;
	mso-font-signature:3 137232384 22 0 1048577 0;}
@font-face
	{font-family:"\@標楷體";
	panose-1:3 0 5 9 0 0 0 0 0 0;
	mso-font-charset:136;
	mso-generic-font-family:script;
	mso-font-pitch:fixed;
	mso-font-signature:3 137232384 22 0 1048577 0;}
@font-face
	{font-family:"\@新細明體";
	panose-1:2 2 3 0 0 0 0 0 0 0;
	mso-font-charset:136;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:3 137232384 22 0 1048577 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:none;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:新細明體;
	mso-font-kerning:1.0pt;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
 /* Page Definitions */
 @page
	{mso-page-border-surround-header:no;
	mso-page-border-surround-footer:no;}
@page Section1
	{size:595.3pt 841.9pt;
	margin:72.0pt 55.3pt 72.0pt 63.0pt;
	mso-header-margin:42.55pt;
	mso-footer-margin:49.6pt;
	mso-paper-source:0;
	layout-grid:18.0pt;}
div.Section1
	{page:Section1;}
.style1 {font-size: 12}
.style2 {color: #0066CC}
.style3 {
	color: #FF0000;
	font-weight: bold;
}
.JustPrint {display:none}    
 @media print {    
 .JustPrint { display:block; font:9pt verdana; letter-spacing:2px;}    
 .NoPrint {display:none}  
}
-->
</style>
<object id=WBControl width=0 height=0 classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2></object> <!--列印預覽window.print()-->
</head>

<body lang=ZH-TW style='tab-interval:24.0pt;text-justify-trim:punctuation'>
<form action="registration_list.php"  method="POST" name="Regist" >
<div class=Section1 style='layout-grid:18.0pt'>
<div align="center"><span style='font-size:14.0pt;font-family:標楷體' ><strong>第十三屆智慧生活與科技研討會 簽到單</strong></span><span style="font-weight: bold">
  </p>
</span>  </div><input type="button" value="列印(列印格式請去除頁尾)" onClick="javascript:WBControl.ExecWB(7,1)" class="NoPrint"> 
<p align="right"><span style="font-family: 標楷體"><font size="3">製表日期：
    <?php=date("Y")?>
  年
  <?php=date("m")?>
  月
  <?php=date("d")?>
  日 
  <?php=date("H")?>
  :
  <?php=date("i")?>
  </font></span></p>
<p class="NoPrint" align=center style='text-align:center'><span class="MsoNormal style1" style="text-align:center"><span class="style3">※未自動去除重複名單</span>　依照: </span> 
      <span class="style1">
      <select name="category" id="category" class="NoPrint">
        <option value="全部" > 全部</option>
        <option value="電能與節能技術"> 電能與節能技術</option>
        <option value="智慧型控制系統"> 智慧型控制系統</option>
        <option value="積體電路設計"> 積體電路設計</option>
        <option value="消費性家電產品開發與設計"> 消費性家電產品開發與設計</option>
        <option value="嵌入式系統開發與應用"> 嵌入式系統開發與應用</option>
        <option value="通訊技術"> 通訊技術</option>
        <option value="網路技術開發與應用"> 網路技術開發與應用</option>
        <option value="多媒體與數位內容技術"> 多媒體與數位內容技術</option>
        <option value="居家照護產品開發與設計"> 居家照護產品開發與設計</option>
        <option value="多媒體安全與應用"> 多媒體安全與應用</option>
        <option value="智慧生活應用"> 智慧生活應用</option>
        <option value="雲端與物聯網應用技術"> 雲端與物聯網應用技術</option>
        <option value="系統整合與應用"> 系統整合與應用</option>
        <option value="其他領域"> 其他領域</option>
       <option value="Invited Sessions(智慧型自動化與智慧生活)"> Invited Sessions(智慧型自動化與智慧生活)</option>
	
        
      </select>
	  <input type="submit" value="顯示" class="NoPrint">
      </span><span class="NoPrint" style="text-align:center"><span class="style2">目前依照:</span>
      <?php=$tempcategory?>
      <span class="style2">顯示</span>      </span>
    <!--  <input type="button"  value="Print" onClick="javascript:WBControl.ExecWB(7,1)" class="NoPrint">-->

 
</p><table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:
 .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:30.55pt'>
  <td width=85 style='border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.55pt'>
  <p class=MsoNormal align=center style='text-align:center'>會員編號<span lang=EN-US>
    <o:p></o:p></span></p></td>
    <td width=85 style='border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.55pt'>
  <p class=MsoNormal align=left style='text-align:center'>論文編號<span lang=EN-US><o:p></o:p></span></p>  </td>
  <td width=80 style='width:80.0pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.55pt'>
  <p class=MsoNormal align=center style='text-align:center'>姓名<span lang=EN-US><o:p></o:p></span></p>  </td>
  <td width=150 style='width:150pt;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.55pt'>
  <p class=MsoNormal align=center style='text-align:center'>單位<span lang=EN-US><o:p></o:p></span></p>  </td>
  <td width=100 style='border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.55pt'>
  <p class=MsoNormal align=center style='text-align:center'>職稱<span lang=EN-US><o:p></o:p></span></p>  </td>
  <td width=100 style='border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.55pt'>
  <p class=MsoNormal align=center style='text-align:center'>簽名<span lang=EN-US><o:p></o:p></span></p>  </td>
 </tr>

<?php

$tempman="";
$i=1;
$str="select id,reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,receipt1,receipt2,receipt3,receipt4,receipt5,receipt6,position1 ,position2,position3,position4,position5,position6,category1,category2,category3,category4,category5,category6,papernumber1,papernumber2,papernumber3,papernumber4,papernumber5,papernumber6 from register order by serial ";
$list=mysql_query($str,$link);
while(list($id,$reportman1,$reportman2,$reportman3,$reportman4,$reportman5,$reportman6,$receipt1,$receipt2,$receipt3,$receipt4,$receipt5,$receipt6,$position1,$position2,$position3,$position4,$position5,$position6,$category1,$category2,$category3,$category4,$category5,$category6,$papernumber1,$papernumber2,$papernumber3,$papernumber4,$papernumber5,$papernumber6)=mysql_fetch_row($list))
{
if ($tempcategory!="全部" and $tempcategory!=$category6){$reportman6="";$receipt6="";$position6="";$papernumber6="";}
if ($tempcategory!="全部" and $tempcategory!=$category5){$reportman5=$reportman6;$receipt5=$receipt6;$position5=$position6;$papernumber5=$papernumber6;}
if ($tempcategory!="全部" and $tempcategory!=$category4){$reportman4=$reportman5;$receipt4=$receipt5;$position4=$position5;$papernumber4=$papernumber5;}
if ($tempcategory!="全部" and $tempcategory!=$category3){$reportman3=$reportman4;$receipt3=$receipt4;$position3=$position4;$papernumber3=$papernumber4;}
if ($tempcategory!="全部" and $tempcategory!=$category2){$reportman2=$reportman3;$receipt2=$receipt3;$position2=$position3;$papernumber2=$papernumber3;}
if ($tempcategory!="全部" and $tempcategory!=$category1){$reportman1=$reportman2;$receipt1=$receipt2;$position1=$position2;$papernumber1=$papernumber2;}
//
$reportman=$reportman1;
  //while ($reportman!="" and $tempman!=$reportman1){
  while ($reportman!=""){
  $reportman=$reportman1;$position=$position1;$receipt=$receipt1;
  $tempman=$reportman1;
  $papernumber=$papernumber1;
?>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:30.6pt'>
  <td width=85 style='border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:30.6pt'>
  <p class=MsoNormal align=center style='text-align:center'><?php echo $id; ?></p>  </td>
  <td width=85 style='border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.6pt'>
  <p class=MsoNormal align=center style='text-align:center'><?php echo $papernumber1; ?></p>  </td>
  <td width=80 style='border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.6pt'>
  <p class=MsoNormal align=center style='text-align:center'><?php echo $reportman; ?></p>  </td>
  <td width=150 style='border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.6pt'>
  <p class=MsoNormal align=left style='text-align:center'><?php echo $receipt; ?></p></td><?php if ($position=="1"){$position="教授";}
if ($position=="2"){$position="研究生";}
if ($position=="3"){$position="大學生";}
if ($position=="4"){$position="一般社會人士";}?>
  <td width=100 style='border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.6pt'>
  <p class=MsoNormal align=center style='text-align:center'><?php echo $position; ?></p>  </td>
    <td width=100 style='border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:30.6pt'>
  <p class=MsoNormal align=center style='text-align:center'><o:p>&nbsp;</o:p></p>  </td>
 </tr>
<?php
$reportman="";
if ($reportman6!=""and $reportman5!=$reportman6 and $reportman1!=$reportman2 and $reportman2!=$reportman3 and $reportman3!=$reportman4 and $reportman4!=$reportman5)
{$reportman=$reportman6;$position=$position6;$receipt=$receipt6;$reportman6="";$temp6=$reportman6;}

if ($reportman5!=""and $reportman4!=$reportman5 and $reportman1!=$reportman2 and $reportman2!=$reportman3 and $reportman3!=$reportman4)
{$reportman=$reportman5;$position=$position5;$receipt=$receipt5;$reportman5="";$temp5=$reportman5;$reportman6=$temp6;} 

if ($reportman4!=""and $reportman3!=$reportman4 and $reportman1!=$reportman2 and $reportman2!=$reportman3 )
{$reportman=$reportman4;$position=$position4;$receipt=$receipt4;$reportman4="";$temp4=$reportman4;$reportman5=$temp5;} 

if ($reportman3!=""and $reportman2!=$reportman3 and $reportman1!=$reportman2)
{$reportman=$reportman3;$position=$position3;$receipt=$receipt3;$reportman3="";$temp3=$reportman3;$reportman4=$temp4;}

if ($reportman2!=""and $reportman1!=$reportman2)
{$reportman=$reportman2;$position=$position2;$receipt=$receipt2;$reportman2="";$reportman3=$temp3;


}
$i++;
}
}
?>
</table></form>
</body>
</html>