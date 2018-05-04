<?php
require "../db.php";

$str="select name,typenumber,email from numbers where category='$category' ";
$list =mysql_query($str,$link);
list($name,$typenumber,$email) = mysql_fetch_row($list);

$content1="
<html xmlns:v=\"urn:schemas-microsoft-com:vml\"
xmlns:o=\"urn:schemas-microsoft-com:office:office\"
xmlns:w=\"urn:schemas-microsoft-com:office:word\"
xmlns=\"http://www.w3.org/TR/REC-html40\">
<head>
<meta http-equiv=Content-Type content=\"text/html; charset=utf-8\">
<meta name=ProgId content=Word.Document>
<meta name=Generator content=\"Microsoft Word 11\">
<meta name=Originator content=\"Microsoft Word 11\">
<title>".$name."  [".$typenumber."]目前尚未回傳資訊</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>tony</o:Author>
  <o:Template>Normal</o:Template>
  <o:LastAuthor> </o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>12</o:TotalTime>
  <o:Created>2006-05-25T12:46:00Z</o:Created>
  <o:LastSaved>2006-05-25T12:46:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>30</o:Words>
  <o:Characters>174</o:Characters>
  <o:Company>ncit</o:Company>
  <o:Lines>1</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>203</o:CharactersWithSpaces>
  <o:Version>11.5606</o:Version>
 </o:DocumentProperties>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
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
 <w:LatentStyles DefLockedState=\"false\" LatentStyleCount=\"156\">
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
	{font-family:標楷體;
	panose-1:3 0 5 9 0 0 0 0 0 0;
	mso-font-charset:136;
	mso-generic-font-family:script;
	mso-font-pitch:fixed;
	mso-font-signature:3 137232384 22 0 1048577 0;}
@font-face
	{font-family:\"\@標楷體\";
	panose-1:3 0 5 9 0 0 0 0 0 0;
	mso-font-charset:136;
	mso-generic-font-family:script;
	mso-font-pitch:fixed;
	mso-font-signature:3 137232384 22 0 1048577 0;}
@font-face
	{font-family:\"\@新細明體\";
	panose-1:2 2 3 0 0 0 0 0 0 0;
	mso-font-charset:136;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:3 137232384 22 0 1048577 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-parent:\"\";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:none;
	font-size:12.0pt;
	font-family:\"Times New Roman\";
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
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:表格內文;
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-parent:\"\";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:\"Times New Roman\";
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
	font-family:\"Times New Roman\";
	mso-ansi-language:#0400;
	mso-fareast-language:#0400;
	mso-bidi-language:#0400;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext=\"edit\">
  <o:idmap v:ext=\"edit\" data=\"1\"/>
 </o:shapelayout></xml><![endif]-->
</head>
<body lang=ZH-TW link=blue vlink=purple style='tab-interval:24.0pt;text-justify-trim:punctuation'>
<div class=Section1 style='layout-grid:18.0pt'>
<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:14.0pt;font-family:標楷體;mso-bidi-font-family:
新細明體;mso-font-kerning:0pt'><span
lang=EN-US style='color:windowtext;text-decoration:none;text-underline:none'><span
lang=EN-US>".$name."&nbsp;&nbsp;[".$typenumber."]</span></span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;font-family:
標楷體;mso-bidi-font-family:新細明體;mso-font-kerning:0pt'>目前尚未回傳資訊</span></b></p>
<p class=MsoNormal align=center style='text-align:center'>　</p>
<div align=\"center\">
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=552
 style='width:413.9pt;margin-left:.3pt;border-collapse:collapse;border:none;
 mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:
 0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt solid windowtext;mso-border-insidev:
 .5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=235 style='width:176.1pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt' height=\"20\">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;color:#222200;letter-spacing:1.5pt'>論文名稱</span></p></td>
  <td width=84 style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt' height=\"20\">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;color:#222200;letter-spacing:1.5pt'>論文編號</span></p></td>
  <td width=84 style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt' height=\"20\">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;color:#222200;letter-spacing:1.5pt'>定稿論文</span></p></td>
  <td width=84 style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt' height=\"20\">
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:10.0pt;font-family:新細明體;color:#222200;letter-spacing:1.5pt'>定稿摘要</span></p></td>
  <td width=65 style='width:48.8pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt' height=\"20\">
  <p class=MsoNormal align=center style='text-align:center'><span style='font-size:10.0pt;font-family:新細明體'>授權書</span></p></td>
 </tr>
";
   $stra="select papername,number,main_file,main_excerpt,authorize from my_papers where category='$sn' ";
   $lista =mysql_query($stra,$link);
   while(list($papername,$numbers,$main_file,$main_excerpt,$authorize) = mysql_fetch_row($lista))
   {

   if( empty($main_file) )$main_filetxt="無";
   else $main_filetxt="有";

   if( empty($main_excerpt) )$main_excerpttxt="無";
   else $main_excerpttxt="有";

   if( empty($authorize) )$authorizetxt="無";
   else $authorizetxt="有";

      if( empty($main_file) or empty($main_excerpt) or empty($authorize) )
      {
$content2=$content2."
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=235 valign=top style='width:176.1pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:10.0pt;font-family:新細明體;
  mso-bidi-font-family:新細明體;color:#414141;mso-font-kerning:0pt'>".$papername."</span><span lang=EN-US
  style='font-size:14.0pt'><o:p></o:p></span></p>
  </td>
  <td width=84 style='width:63.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
  style='font-size:10.0pt;font-family:新細明體;mso-bidi-font-family:新細明體;
  color:#414141;mso-font-kerning:0pt'>".$typenumber.$numbers."</span><span lang=EN-US
  style='font-size:14.0pt'><o:p></o:p></span></p>
  </td>
  <td width=84 style='width:63.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US><o:p>
	<font size=\"2\">&nbsp;</font></o:p></span><span
  style='font-size:10.0pt;font-family:新細明體;color:#222200;letter-spacing:1.5pt'>".$main_filetxt."</font></span></p>
  </td>
  <td width=84 style='width:63.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US><o:p>
	<font size=\"2\">&nbsp;</font></o:p></span><span
  style='font-size:10.0pt;font-family:新細明體;color:#222200;letter-spacing:1.5pt'>".$main_excerpttxt."</font></span></p>
  </td>
  <td width=65 style='width:48.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=EN-US><o:p>
	<font size=\"2\">&nbsp;</font></o:p></span><span style='font-size:10.0pt;font-family:新細明體'>".$authorizetxt."</font></span></p>
  </td>
 </tr>
";
      }
   }
$content3="
</table>
</div>
<p class=MsoNormal><span lang=EN-US style='font-size:14.0pt'><o:p>此信件由研討會系統自動寄發，請勿回覆！</o:p></span></p>
</div>
</body>
</html>
";
$maincontent=$content1.$content2.$content3;

$headers = "From: ILT2018@ncut.edu.tw\nContent-Type: text/html; charset=UTF-8";
$mail_title=$name."  [".$typenumber."]尚未回傳定稿資料之名單";

mail("$email","$mail_title","$maincontent","$headers");
?>
信件已經寄發！