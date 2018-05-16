<?php
require "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
//-------------------計算報名總筆數------------
$str="select count(*) from register";
$list=mysql_query($str,$link);
list($disscuss_count)=mysql_fetch_row($list);
?>


<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<title>姓名</title>
<style>
@font-face
	{font-family:新細明體;
	panose-1:2 2 3 0 0 0 0 0 0 0;
	mso-font-alt:PMingLiU;
	mso-font-charset:136;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
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
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;
	text-underline:single;}
 /* Page Definitions */
 @page
	{mso-page-border-surround-header:no;
	mso-page-border-surround-footer:no;}
@page Section1
	{size:595.3pt 841.9pt;
	margin:72.0pt 90.0pt 72.0pt 90.0pt;
	mso-header-margin:42.55pt;
	mso-footer-margin:49.6pt;
	mso-paper-source:0;
	layout-grid:18.0pt;}
div.Section1
	{page:Section1;}
-->
</style>
</head>

<body lang=ZH-TW link=blue vlink=purple style='tab-interval:24.0pt;text-justify-trim:
punctuation'>

<div align="center">
<table border="0" width="700" id="table1" cellspacing="0">
	<tr>
		<td class=contnet><a href="on_line.php?sort=report">按是否為報告者排序</a></td>
		<td align="right" class=contnet><font color="#FF8409">報名總人數：<?php echo $disscuss_count; ?>人</font></td>
	</tr>
</table>
<div class=Section1 style='layout-grid:18.0pt'>
<div align=center>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:
 .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' width="740">
 <?php
//--------抓取投稿筆數分析------------


$str = "select id,reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,position1,position2,position3,position4,position5,position6,papername1,papername2,papername3,papername4,papername5,papername6,paperchinesename1,paperchinesename2,paperchinesename3,paperchinesename4,paperchinesename5,paperchinesename6,category1,category2,category3,category4,category5,category6,papernumber1,papernumber2,papernumber3,papernumber4,papernumber5,papernumber6,eat1,eat2,eat3,eat4,eat5,eat6,status from register ";
$list = mysql_query($str,$link);
while(list($id,$reportman1,$reportman2,$reportman3,$reportman4,$reportman5,$reportman6,$position1,$position2,$position3,$position4,$position5,$position6,$papername1,$papername2,$papername3,$papername4,$papername5,$papername6,$paperchinesename1,$paperchinesename2,$paperchinesename3,$paperchinesename4,$paperchinesename5,$paperchinesename6,$category1,$category2,$category3,$category4,$category5,$category6,$papernumber1,$papernumber2,$papernumber3,$papernumber4,$papernumber5,$papernumber6,$eat1,$eat2,$eat3,$eat4,$eat5,$eat6,$status) = mysql_fetch_row($list))
 {

$stra = "select name,email,unit,tel from members where id='$id'";
$lista = mysql_query($stra,$link);
list($name,$email,$unit,$tel) = mysql_fetch_row($lista);

 
?>



 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="72" valign=top bgcolor="#F2F2F2" style='width:72px;border:1.0pt solid windowtext;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>姓名</span></p>  </td>
  <td width="104" valign=top bgcolor="#F2F2F2" style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:104px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
  style='font-size:10.0pt;color:#222200;letter-spacing:1.3pt'>email</span></p>  </td>
  <td width="171" valign=top bgcolor="#F2F2F2" style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:171px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman"'>單位</span><span lang=EN-US
  style='font-size:10.0pt'><o:p></o:p></span></p>  </td>

  <td width="88" valign=top bgcolor="#F2F2F2" style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; <?php if  ($status!="1"){  ?> width:130x <?php } else { ?>  width:97x  <?php }?>       ;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>電話</span></p>  </td>
  <td width="293" colspan=3  valign=top bgcolor="#F2F2F2" style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:33px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p align=center class=MsoNormal style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>用<span class="MsoNormal" style="text-align:center">餐</span></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td valign=top style='border-left:1.0pt solid windowtext; border-right:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:72px;border-top:medium none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p align="center" class=MsoNormal><span lang=EN-US><o:p><?php echo $name; ?></o:p></span></p>  </td>
  <td valign=top style='font-size:10.0pt; width:104px;border-top:medium none;border-left:medium none;
  border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p align="center" class=MsoNormal><span style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";' lang=EN-US><o:p><?php echo $email; ?></o:p></span></p>  </td>
  <td valign=top style='font-size:10.0pt; width:171px;border-top:medium none;border-left:medium none;
  border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p align="center" class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $unit; ?></o:p></span></p>  </td>

  <td  valign=top style='font-size:10.0pt;<?php if  ($status!="1"){  ?> width:130x <?php } else { ?>  width:97x  <?php }?>;border-top:medium none;border-left:
  medium none;border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $tel; ?></o:p></span></p>  </td>
  
  <?php
$meat=0;
$no_meat=0;
if ($eat1=="葷"){$meat=$meat+1;}
if ($eat2=="葷"){$meat=$meat+1;}
if ($eat3=="葷"){$meat=$meat+1;}
if ($eat4=="葷"){$meat=$meat+1;}
if ($eat5=="葷"){$meat=$meat+1;}
if ($eat6=="葷"){$meat=$meat+1;}
if ($eat1=="素"){$no_meat=$no_meat+1;}
if ($eat2=="素"){$no_meat=$no_meat+1;}
if ($eat3=="素"){$no_meat=$no_meat+1;}
if ($eat4=="素"){$no_meat=$no_meat+1;}
if ($eat5=="素"){$no_meat=$no_meat+1;}
if ($eat6=="素"){$no_meat=$no_meat+1;}
$eat="葷：".$meat."位 &nbsp;&nbsp; 素：".$no_meat."位";
?>	

  
  <td colspan=3 valign=top style='font-size:10.0pt; width:60px;border-top:medium none;border-left:
  medium none;border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $eat; ?></o:p></span></p>  </td>
  <?php
   if($status == 1)
    {
  ?>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td valign=top style='border-left:1.0pt solid windowtext; border-right:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:72px;border-top:medium none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' bgcolor="#F2F2F2">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>報告者</span></p>  </td>
  <td valign=top style='width:104px;border-top:medium none;border-left:medium none;
  border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' bgcolor="#F2F2F2">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>報告方式</span></p>  </td>
  <td valign=top style='width:171px;border-top:medium none;border-left:medium none;
  border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' bgcolor="#F2F2F2">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>投稿類別</span></p>  </td>
    <td valign=top style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:88px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' bgcolor="#F2F2F2">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>職稱</span></p>  </td>
  <td colspan=3 valign=top style='width:293px;border-top:medium none;
  border-left:medium none;border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' bgcolor="#F2F2F2">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;mso-ascii-font-family:"Times New Roman";
  mso-hansi-font-family:"Times New Roman";color:#222200;letter-spacing:1.3pt'>論文名稱</span></p>  </td>
 </tr>
 
<?php
$strb = "select papername,papernumber,accept,category from papers where id='$id' and accept>'0' ";
$listb = mysql_query($strb,$link);
while(list($papername,$papernumber,$accept,$category) = mysql_fetch_row($listb))
 {
 if ($papernumber==$papernumber1){$reportman=$reportman1;$position=$position1;}
 if ($papernumber==$papernumber2){$reportman=$reportman2;$position=$position2;}
 if ($papernumber==$papernumber3){$reportman=$reportman3;$position=$position3;}
 if ($papernumber==$papernumber4){$reportman=$reportman4;$position=$position4;}
 if ($papernumber==$papernumber5){$reportman=$reportman5;$position=$position5;}  
 if ($papernumber==$papernumber6){$reportman=$reportman6;$position=$position6;} 
 if($position==1)
{$position="教授";}
elseif($position==2)
{$position="研究生";}
elseif($position==3)
{$position="大學生";}
elseif($position==4)
{$position="一般社會人士";}

if($category=="1")$category="電能與節能技術";   
if($category=="2")$category="智慧型控制系統";	
if($category=="3")$category="積體電路設計";	
if($category=="4")$category="消費性家電產品開發與設計";  
if($category=="5")$category="嵌入式系統開發與應用";	
if($category=="6")$category="通訊技術";		
if($category=="7")$category="網路技術開發與應用";  
if($category=="8")$category="多媒體與數位內容技術";	
if($category=="9")$category="居家照護產品開發與設計";	
if($category=="10")$category="多媒體安全與應用";		
if($category=="11")$category="雲端與物聯網應用技術";	
if($category=="12")$category="系統整合與應用";		
if($category=="13")$category="其他領域";		
if($category=="14")$category="Invited Sessions(智慧型自動化與智慧生活)";
      
 if ($accept=="2"){$accept="口頭";}
 if ($accept=="1"){$accept="壁報";}
 if ($accept=="0"){$accept="拒絕";}
 
?>


 
 <tr style='mso-yfti-irow:3'>
  <td valign=top style='font-size:10.0pt; border-left:1.0pt solid windowtext; border-right:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:72px;border-top:medium none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $reportman; ?></o:p></span></p>  </td>
  <td valign=top style='font-size:10.0pt; width:104px;border-top:medium none;border-left:medium none;
  border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $accept; ?></o:p></span></p>  </td>
  <td valign=top style='width:171px;border-top:medium none;border-left:medium none;
  border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $category; ?></o:p></span></p>  </td>
    <td valign=top style='font-size:10.0pt; width:61px;border-top:medium none;border-left:
  medium none;border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p align="center" class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $position; ?></o:p></span></p>  </td>
  <td colspan=3 valign=top style='font-size:10.0pt;width:293px;border-top:medium none;
  border-left:medium none;border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p align="center" class=MsoNormal><span style='font-size:10.0pt' lang=EN-US><o:p><?php echo $papername; ?></o:p></span></p>  </td>
 </tr>

 <?php
 }
    }
?>
         <tr>
            <td colspan="7"><span lang=EN-US><o:p>&nbsp;</o:p></span></td>
         </tr>
<?php
 }
?>
         <tr>
            <td colspan="7"><p align="center"><a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a></td>
         </tr>
 </table>

</div>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>