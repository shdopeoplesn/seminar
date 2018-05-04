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
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_paper_download.php?serial=<?php=$serial?>'"><?php=$final_rawfile?></span></td>
		</tr>
                <tr>
			<td width="135" class=title>定稿摘要</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_excerpt_download.php?serial=<?php=$serial?>'"><?php=$final_rawabstract?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
<?php		
$str="select id,paperno1,paperno2,paperno3,paperno4,paperno5,comment1,comment2,comment3,comment4,comment5,chktime1,chktime2,chktime3,chktime4,chktime5,recommend1,recommend2,recommend3,recommend4,recommend5,paper_chk1,paper_chk2,paper_chk3,paper_chk4,paper_chk5,abstract_chk1,abstract_chk2,abstract_chk3,abstract_chk4,abstract_chk5 from reviewer where id='$reviewer1' ";
$list=mysql_query($str,$link);
list($reviewer_id,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$comment1,$comment2,$comment3,$comment4,$comment5,$chktime1,$chktime2,$chktime3,$chktime4,$chktime5,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$paper_chk1,$paper_chk2,$paper_chk3,$paper_chk4,$paper_chk5,$abstract_chk1,$abstract_chk2,$abstract_chk3,$abstract_chk4,$abstract_chk5)=mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment=$comment1;$chktime=$chktime1;$recommend=$recommend1;$paper_chk=$paper_chk1;$abstract_chk=$abstract_chk1;}
if ($papernumber==$paperno2){$comment=$comment2;$chktime=$chktime2;$recommend=$recommend2;$paper_chk=$paper_chk2;$abstract_chk=$abstract_chk2;}
if ($papernumber==$paperno3){$comment=$comment3;$chktime=$chktime3;$recommend=$recommend3;$paper_chk=$paper_chk3;$abstract_chk=$abstract_chk3;}
if ($papernumber==$paperno4){$comment=$comment4;$chktime=$chktime4;$recommend=$recommend4;$paper_chk=$paper_chk4;$abstract_chk=$abstract_chk4;}
if ($papernumber==$paperno5){$comment=$comment5;$chktime=$chktime5;$recommend=$recommend5;$paper_chk=$paper_chk5;$abstract_chk=$abstract_chk5;}	
		
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


$str="select id,paperno1,paperno2,paperno3,paperno4,paperno5,comment1,comment2,comment3,comment4,comment5,chktime1,chktime2,chktime3,chktime4,chktime5,recommend1,recommend2,recommend3,recommend4,recommend5,paper_chk1,paper_chk2,paper_chk3,paper_chk4,paper_chk5,abstract_chk1,abstract_chk2,abstract_chk3,abstract_chk4,abstract_chk5 from reviewer where id='$reviewer2' ";
$list=mysql_query($str,$link);
list($reviewer_id,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$comment1,$comment2,$comment3,$comment4,$comment5,$chktime1,$chktime2,$chktime3,$chktime4,$chktime5,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$paper_chk1,$paper_chk2,$paper_chk3,$paper_chk4,$paper_chk5,$abstract_chk1,$abstract_chk2,$abstract_chk3,$abstract_chk4,$abstract_chk5)=mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment2=$comment1;$chktime2=$chktime1;$recommend2=$recommend1;$paper_chk2=$paper_chk1;$abstract_chk2=$abstract_chk1;}
if ($papernumber==$paperno2){$comment2=$comment2;$chktime2=$chktime2;$recommend2=$recommend2;$paper_chk2=$paper_chk2;$abstract_chk=$abstract_chk2;}
if ($papernumber==$paperno3){$comment2=$comment3;$chktime2=$chktime3;$recommend2=$recommend3;$paper_chk2=$paper_chk3;$abstract_chk2=$abstract_chk3;}
if ($papernumber==$paperno4){$comment2=$comment4;$chktime2=$chktime4;$recommend2=$recommend4;$paper_chk2=$paper_chk4;$abstract_chk2=$abstract_chk4;}
if ($papernumber==$paperno5){$comment2=$comment5;$chktime2=$chktime5;$recommend2=$recommend5;$paper_chk2=$paper_chk5;$abstract_chk2=$abstract_chk5;}	
		
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
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">下載</span></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="135" class=title>摘要下載</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'">下載</span></td>
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