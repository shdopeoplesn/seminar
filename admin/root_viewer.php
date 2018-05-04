<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 17pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
   .paperstyle 
   {  
    text-decoration: underline;
   }
 </style>
</head>
<body>
<?php
$str = "select paperman,papername,paperchinesename,category,papernumber,reviewer1,reviewer2,final_rawfile,final_rawabstract from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($paperman,$papername,$paperchinesename,$category,$papernumber,$reviewer1,$reviewer2,$final_rawfile,$final_rawabstract) = mysql_fetch_row($list);
?>

<div align="center">
	<table border="0" width="450">
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="135" class=title>論文英文名稱</td>
			<td width="355" class=content><?php=$papername?></td>
		</tr>
		<tr>
			<td width="135" class=title>論文中文名稱</td>
			<td width="355" class=content><?php=$paperchinesename?></td>
		</tr>		
		<tr>
			<td width="135" class=title>論文作者</td>
			<td class=content><?php=$paperman?></td>
		</tr>
                <tr>
			<td width="135" class=title>定稿論文</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#6666FF';" onClick="dwindow.location.href='main_paper_download.php?serial=<?php=$serial?>'"><?php=$final_rawfile?></span></td>
		</tr>
                <tr>
			<td width="135" class=title>定稿摘要</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_excerpt_download.php?serial=<?php=$serial?>'"><?php=$final_rawabstract?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
<?php		
$str="select id,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15,chktime1,chktime2,chktime3,chktime4,chktime5,chktime6,chktime7,chktime8,chktime9,chktime10,chktime11,chktime12,chktime13,chktime14,chktime15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15,paper_chk1,paper_chk2,paper_chk3,paper_chk4,paper_chk5,paper_chk6,paper_chk7,paper_chk8,paper_chk9,paper_chk10,paper_chk11,paper_chk12,paper_chk13,paper_chk14,paper_chk15,abstract_chk1,abstract_chk2,abstract_chk3,abstract_chk4,abstract_chk5,paper_chk6,paper_chk7,paper_chk8,paper_chk9,paper_chk10,paper_chk11,paper_chk12,paper_chk13,paper_chk14,paper_chk15 from reviewer where id='$reviewer1' ";
$list=mysql_query($str,$link);
list($reviewer_id,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15,$chktime1,$chktime2,$chktime3,$chktime4,$chktime5,$chktime6,$chktime7,$chktime8,$chktime9,$chktime10,$chktime11,$chktime12,$chktime13,$chktime14,$chktime15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15,$paper_chk1,$paper_chk2,$paper_chk3,$paper_chk4,$paper_chk5,$paper_chk6,$paper_chk7,$paper_chk8,$paper_chk9,$paper_chk10,$paper_chk11,$paper_chk12,$paper_chk13,$paper_chk14,$paper_chk15,$abstract_chk1,$abstract_chk2,$abstract_chk3,$abstract_chk4,$abstract_chk5,$abstract_chk6,$abstract_chk7,$abstract_chk8,$abstract_chk9,$abstract_chk10,$abstract_chk11,$abstract_chk12,$abstract_chk13,$abstract_chk14,$abstract_chk15)=mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment=$comment1;$chktime=$chktime1;$recommend=$recommend1;$paper_chk=$paper_chk1;$abstract_chk=$abstract_chk1;}
if ($papernumber==$paperno2){$comment=$comment2;$chktime=$chktime2;$recommend=$recommend2;$paper_chk=$paper_chk2;$abstract_chk=$abstract_chk2;}
if ($papernumber==$paperno3){$comment=$comment3;$chktime=$chktime3;$recommend=$recommend3;$paper_chk=$paper_chk3;$abstract_chk=$abstract_chk3;}
if ($papernumber==$paperno4){$comment=$comment4;$chktime=$chktime4;$recommend=$recommend4;$paper_chk=$paper_chk4;$abstract_chk=$abstract_chk4;}
if ($papernumber==$paperno5){$comment=$comment5;$chktime=$chktime5;$recommend=$recommend5;$paper_chk=$paper_chk5;$abstract_chk=$abstract_chk5;}	

if ($papernumber==$paperno11){$comment=$comment11;$chktime=$chktime11;$recommend=$recommend11;$paper_chk=$paper_chk11;$abstract_chk=$abstract_chk11;}
if ($papernumber==$paperno12){$comment=$comment12;$chktime=$chktime12;$recommend=$recommend12;$paper_chk=$paper_chk12;$abstract_chk=$abstract_chk12;}
if ($papernumber==$paperno13){$comment=$comment13;$chktime=$chktime13;$recommend=$recommend13;$paper_chk=$paper_chk13;$abstract_chk=$abstract_chk13;}
if ($papernumber==$paperno14){$comment=$comment14;$chktime=$chktime14;$recommend=$recommend14;$paper_chk=$paper_chk14;$abstract_chk=$abstract_chk14;}
if ($papernumber==$paperno15){$comment=$comment15;$chktime=$chktime15;$recommend=$recommend15;$paper_chk=$paper_chk15;$abstract_chk=$abstract_chk15;}	

if ($papernumber==$paperno6){$comment=$comment6;$chktime=$chktime6;$recommend=$recommend6;$paper_chk=$paper_chk6;$abstract_chk=$abstract_chk6;}
if ($papernumber==$paperno7){$comment=$comment7;$chktime=$chktime7;$recommend=$recommend7;$paper_chk=$paper_chk7;$abstract_chk=$abstract_chk7;}
if ($papernumber==$paperno8){$comment=$comment8;$chktime=$chktime8;$recommend=$recommend8;$paper_chk=$paper_chk8;$abstract_chk=$abstract_chk8;}
if ($papernumber==$paperno9){$comment=$comment9;$chktime=$chktime9;$recommend=$recommend9;$paper_chk=$paper_chk9;$abstract_chk=$abstract_chk9;}
if ($papernumber==$paperno10){$comment=$comment10;$chktime=$chktime10;$recommend=$recommend10;$paper_chk=$paper_chk10;$abstract_chk=$abstract_chk10;}			
?>
		
                <tr>
			<td width="135" class=title>評審1</td>
			<td class=content><?php=$reviewer1?></td>
		</tr>
		<?php if (reviewer1==""){$recommend="";} ?>
		<tr>
			<td width="135" nowrap class=title>評審結果1</td>
			<td class=content><?php=$recommend?></td>
		</tr>
		<tr>
			<td width="135" nowrap class=title>綜合評論1</td>
			<td class=content><?php=$comment?></td>
		</tr>
		<?php if ($paper_chk=="1"){$paper_chk="是";}  if ($paper_chk=="0"){$paper_chk="否";} ?>						
		<tr>
			<td width="135" nowrap class=title>論文是否被下載1</td>
			<td class=content><?php=$paper_chk?></td>
		</tr>
		<?php if ($abstract_chk=="1"){$abstract_chk="是";}  if ($abstract_chk=="0"){$abstract_chk="否";} ?>				
		<tr>
			<td width="135" nowrap class=title>摘要是否被下載1</td>
			<td class=content><?php=$abstract_chk?></td>
		</tr>				
		<tr>
			<td width="135" nowrap class=title>評審時間1</td>
			<td class=content><?php=$chktime?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		
<?php		


$str="select id,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15,chktime1,chktime2,chktime3,chktime4,chktime5,chktime6,chktime7,chktime8,chktime9,chktime10,chktime11,chktime12,chktime13,chktime14,chktime15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15,paper_chk1,paper_chk2,paper_chk3,paper_chk4,paper_chk5,paper_chk6,paper_chk7,paper_chk8,paper_chk9,paper_chk10,paper_chk11,paper_chk12,paper_chk13,paper_chk14,paper_chk15,abstract_chk1,abstract_chk2,abstract_chk3,abstract_chk4,abstract_chk5,paper_chk6,paper_chk7,paper_chk8,paper_chk9,paper_chk10,paper_chk11,paper_chk12,paper_chk13,paper_chk14,paper_chk15 from reviewer where id='$reviewer2' ";
$list=mysql_query($str,$link);
list($reviewer_id,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15,$chktime1,$chktime2,$chktime3,$chktime4,$chktime5,$chktime6,$chktime7,$chktime8,$chktime9,$chktime10,$chktime11,$chktime12,$chktime13,$chktime14,$chktime15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15,$paper_chk1,$paper_chk2,$paper_chk3,$paper_chk4,$paper_chk5,$paper_chk6,$paper_chk7,$paper_chk8,$paper_chk9,$paper_chk10,$paper_chk11,$paper_chk12,$paper_chk13,$paper_chk14,$paper_chk15,$abstract_chk1,$abstract_chk2,$abstract_chk3,$abstract_chk4,$abstract_chk5,$abstract_chk6,$abstract_chk7,$abstract_chk8,$abstract_chk9,$abstract_chk10,$abstract_chk11,$abstract_chk12,$abstract_chk13,$abstract_chk14,$abstract_chk15)=mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment2=$comment1;$chktime2=$chktime1;$recommend2=$recommend1;$paper_chk2=$paper_chk1;$abstract_chk2=$abstract_chk1;}
if ($papernumber==$paperno2){$comment2=$comment2;$chktime2=$chktime2;$recommend2=$recommend2;$paper_chk2=$paper_chk2;$abstract_chk=$abstract_chk2;}
if ($papernumber==$paperno3){$comment2=$comment3;$chktime2=$chktime3;$recommend2=$recommend3;$paper_chk2=$paper_chk3;$abstract_chk2=$abstract_chk3;}
if ($papernumber==$paperno4){$comment2=$comment4;$chktime2=$chktime4;$recommend2=$recommend4;$paper_chk2=$paper_chk4;$abstract_chk2=$abstract_chk4;}
if ($papernumber==$paperno5){$comment2=$comment5;$chktime2=$chktime5;$recommend2=$recommend5;$paper_chk2=$paper_chk5;$abstract_chk2=$abstract_chk5;}	
	
if ($papernumber==$paperno11){$comment2=$comment11;$chktime2=$chktime11;$recommend2=$recommend11;$paper_chk2=$paper_chk11;$abstract_chk2=$abstract_chk11;}
if ($papernumber==$paperno12){$comment2=$comment12;$chktime2=$chktime12;$recommend2=$recommend12;$paper_chk2=$paper_chk12;$abstract_chk=$abstract_chk12;}
if ($papernumber==$paperno13){$comment2=$comment13;$chktime2=$chktime13;$recommend2=$recommend13;$paper_chk2=$paper_chk13;$abstract_chk2=$abstract_chk13;}
if ($papernumber==$paperno14){$comment2=$comment14;$chktime2=$chktime14;$recommend2=$recommend14;$paper_chk2=$paper_chk14;$abstract_chk2=$abstract_chk14;}
if ($papernumber==$paperno15){$comment2=$comment15;$chktime2=$chktime15;$recommend2=$recommend15;$paper_chk2=$paper_chk15;$abstract_chk2=$abstract_chk15;}

if ($papernumber==$paperno6){$comment2=$comment6;$chktime2=$chktime6;$recommend2=$recommend6;$paper_chk2=$paper_chk6;$abstract_chk2=$abstract_chk6;}
if ($papernumber==$paperno7){$comment2=$comment7;$chktime2=$chktime7;$recommend2=$recommend7;$paper_chk2=$paper_chk7;$abstract_chk=$abstract_chk7;}
if ($papernumber==$paperno8){$comment2=$comment8;$chktime2=$chktime8;$recommend2=$recommend8;$paper_chk2=$paper_chk8;$abstract_chk2=$abstract_chk8;}
if ($papernumber==$paperno9){$comment2=$comment9;$chktime2=$chktime9;$recommend2=$recommend9;$paper_chk2=$paper_chk9;$abstract_chk2=$abstract_chk9;}
if ($papernumber==$paperno10){$comment2=$comment10;$chktime2=$chktime10;$recommend2=$recommend10;$paper_chk2=$paper_chk10;$abstract_chk2=$abstract_chk10;}	
?>		
		
		<tr>
			<td width="135" class=title>評審2</td>

			<td class=content><?php=$reviewer2?></td>
		</tr>
		<tr>
			<td width="135" nowrap class=title>評審結果2</td>
			<td class=content><?php=$recommend2?></td>
		</tr>
		<tr>
			<td width="135" nowrap class=title>綜合評論2</td>
			<td class=content><?php=$comment2?></td>
		</tr>
		<tr>
		<?php if ($paper_chk2=="1"){$paper_chk2="是";} if ($paper_chk2=="0"){$paper_chk2="否";} ?>
			<td width="135" nowrap class=title>論文是否被下載2</td>
			<td class=content><?php=$paper_chk2?></td>
		</tr>
		<?php if ($abstract_chk2=="1"){$abstract_chk2="是";}  if ($abstract_chk2=="0"){$abstract_chk2="否";} ?>		
		<tr>
			<td width="135" nowrap class=title>摘要是否被下載2</td>
			<td class=content><?php=$abstract_chk2?></td>
		</tr>						
		<tr>
			<td width="135" nowrap class=title>評審時間2</td>
			<td class=content><?php=$chktime2?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="135" class=title>論文下載</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#6666FF';" onClick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">下載</span></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="135" class=title>摘要下載</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#6666FF';" onClick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'">下載</span></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td class=content colspan="2" align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
		</tr>
  </table>
</div>
<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>
</body>
</html>