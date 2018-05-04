<?php
require "../db.php";


if( empty($start) )$start=0;
if( empty($ends) )$ends=999;

//-------------------計算投稿總筆數------------
$str="select count(traffic) from on_line where traffic = '自行開車'";
$list=mysql_query($str,$link);
list($disscuss_count)=mysql_fetch_row($list);
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">

<head>

<style type="text/css">
  .title 
   { 
     background-color: rgb(235, 255, 165);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 15pt;
     letter-spacing:2px;
   }
 .content1
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 18pt;
   }
 .content
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 18pt;
     text-align:center;
   }
 .up_next 
   { 
     color: rgb(51, 51, 255);
     font-size: 10pt;
     text-align:center;
   }
 </style>

<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 11">
<meta name=Originator content="Microsoft Word 11">
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>2006ILT</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor>2006ILT</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>0</o:TotalTime>
  <o:Created>2006-06-01T12:30:00Z</o:Created>
  <o:LastSaved>2006-06-01T12:30:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>1</o:Words>
  <o:Characters>12</o:Characters>
  <o:Company>2006ILT</o:Company>
  <o:Lines>1</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>12</o:CharactersWithSpaces>
  <o:Version>11.5606</o:Version>
 </o:DocumentProperties>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:GrammarState>Clean</w:GrammarState>
  <w:PunctuationKerning/>
  <w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery>
  <w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:Compatibility>
   <w:SpaceForUL/>
   <w:BalanceSingleByteDoubleByteWidth/>
   <w:DoNotLeaveBackslashAlone/>
   <w:ULTrailSpace/>
   <w:DoNotExpandShiftReturn/>
   <w:AdjustLineHeightInTable/>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:UseFELayout/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
 </w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" LatentStyleCount="156">
 </w:LatentStyles>
</xml><![endif]-->
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
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:表格內文;
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman";
	mso-ansi-language:#0400;
	mso-fareast-language:#0400;
	mso-bidi-language:#0400;}
table.MsoTableGrid
	{mso-style-name:表格格線;
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:none;
	font-size:10.0pt;
	font-family:"Times New Roman";
	mso-ansi-language:#0400;
	mso-fareast-language:#0400;
	mso-bidi-language:#0400;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=ZH-TW style='tab-interval:24.0pt;text-justify-trim:punctuation' topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">



<div align="center">
<table border="0" width="728" id="table1" cellspacing="0">
	<tr>
		<td align="right" width="724" colspan="2">
		<p align="center">
<font size="6" face="標楷體">2006ILT開車名單</font>[<a href="javascript:window.print()">列印</a>]</td>
	</tr>
	<tr>
		<td align="right" width="367">
		<p align="left"><font color="#cc0000">※請自行濾除重覆之名單</font></td>
		<td align="right" width="357"><font color="#002EB7">開車人數：<?php=$disscuss_count?>人</font></td>
	</tr>
</table>
</div>
<form method="POST" action="guard.php">
<div align="center">
	<table border="0" width="182" cellspacing="1" cellpadding="0">
		<tr>
			<td width="120" bgcolor="#F8F8F8"><p align="right">列印起始序號：</td>
			<td width="59" bgcolor="#F8F8F8"><input type="text" name="start" size="7" value="<?php=$start?>"></td>
		</tr>
		<tr>
			<td width="120" bgcolor="#F8F8F8"><p align="right">讀取資料筆數：</td>
			<td width="59" bgcolor="#F8F8F8"><input type="text" name="ends" size="7" value="<?php=$ends?>"></td>
		</tr>
		<tr>
			<td colspan="2" width="180" bgcolor="#F8F8F8"><p align="center"><input type="submit" value="送出" name="B1"></td>
		</tr>
	</table>
</div>
</form>

<div class=Section1 style='layout-grid:18.0pt'>
<div align="center">
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;mso-border-insideh:
 .5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td valign=top style='width:89px;border:1.0pt solid windowtext;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><o:p><span lang=EN-US>編號、</span>姓名</o:p></p>
  </td>
  <td valign=top style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:215px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span lang=EN-US><o:p>單位</o:p></span></p>
  </td>
  <td valign=top style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:100px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span lang=EN-US><o:p>職稱</o:p></span></p>
  </td>
  <td valign=top style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:153px;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span lang=EN-US><o:p>電話</o:p></span></p>
  </td>
  <td valign=top style='border-right:1.0pt solid windowtext; border-top:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:70pt;border-left:medium none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm' align="center">
  <p class=MsoNormal><span lang=EN-US><o:p>車牌</o:p></span></p>
  </td>
 </tr>
<?php
$str = "select sn,name,unit,career,tel,plate from on_line where traffic ='自行開車' order by sn limit $start,$ends ";
$list = mysql_query($str,$link);
while(list($sn,$name,$unit,$career,$tel,$plate) = mysql_fetch_row($list))
 {
   if(!empty($plate))
   {
     echo "
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td valign=top style='border-left:1.0pt solid windowtext; border-right:1.0pt solid windowtext; border-bottom:1.0pt solid windowtext; width:115px;border-top:medium none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal><span lang=EN-US><o:p>".($sn-1)."、".$name."</o:p></span></p>
  </td>
  <td valign=top style='width:170pt;border-top:medium none;border-left:
  medium none;border-bottom:1.0pt solid windowtext;border-right:1.0pt solid windowtext;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding-left:5.4pt; padding-right:5.4pt; padding-top:0cm; padding-bottom:0cm'>
  <p class=MsoNormal><span lang=EN-US><o:p>".$unit."</o:p></span></p>
  </td>
  <td width=70 valign=top style='width:70pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span lang=EN-US><o:p>".$career."</o:p></span></p>
  </td>
  <td width=130 valign=top style='width:130pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span lang=EN-US><o:p>".$tel."</o:p></span></p>
  </td>
  <td width=70pt valign=top style='width:70pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span lang=EN-US><o:p>".$plate."</o:p></span></p>
  </td>
 </tr>";
   }
 }
?>
</table>
<br>
<table>
</table>

</div>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

</div>

</body>

</html>