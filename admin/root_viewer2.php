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
$str = "select sn from numbers where id='$id' and password='$password'";
$list = mysql_query($str,$link);
list($numbers_sn) = mysql_fetch_row($list);

$str = "select paperman,papername,category,propose,chktime,chkstate,reviewer_sn,reviewer_sn1,propose1,chktime1,chkstate1,main_rawfile,main_rawexcerpt,raw_authorize from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($paperman,$papername,$category,$propose,$chktime,$chkstate,$reviewer_sn,$reviewer_sn1,$propose1,$chktime1,$chkstate1,$main_rawfile,$main_rawexcerpt,$raw_authorize) = mysql_fetch_row($list);

$propose=nl2br($propose);
$propose1=nl2br($propose1);

if($numbers_sn != $category)
{
 echo "很抱歉，這不屬於您的範圍！";
 exit;
}
//評審1
$stra = "select re_name from reviewer where sn='$reviewer_sn' ";
$lista = mysql_query($stra,$link);
list($re_name) = mysql_fetch_row($lista);
if( empty($re_name) )$re_name="無";

$stra = "select name from chkstate where sn='$chkstate' ";
$lista = mysql_query($stra,$link);
list($chkstate) = mysql_fetch_row($lista);

//評審2
$stra = "select re_name from reviewer where sn='$reviewer_sn1' ";
$lista = mysql_query($stra,$link);
list($re_name2) = mysql_fetch_row($lista);
if( empty($re_name2) )$re_name2="無";

$stra = "select name from chkstate where sn='$chkstate1' ";
$lista = mysql_query($stra,$link);
list($chkstate1) = mysql_fetch_row($lista);
?>
<div align="center">
	<table border="0" width="400">
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>論文名稱</td>
			<td class=content><?php=$papername?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>論文作者</td>
			<td class=content><?php=$paperman?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
                <tr>
			<td width="71" class=title>定稿論文</td>
			<td class=content><?php=$main_rawfile?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
                <tr>
			<td width="71" class=title>定稿摘要</td>
			<td class=content><?php=$main_rawexcerpt?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
                <tr>
			<td width="71" class=title>授權書</td>
			<td class=content><?php=$raw_authorize?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
                <tr>
			<td width="71" class=title>評審1</td>
			<td class=content><?php=$re_name?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>評審結果1</td>
			<td class=content><?php=$chkstate?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>綜合評論1</td>
			<td class=content><?php=$propose?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>評審時間1</td>
			<td class=content><?php=$chktime?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>評審2</td>
			<td class=content><?php=$re_name2?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>評審結果2</td>
			<td class=content><?php=$chkstate1?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>綜合評論2</td>
			<td class=content><?php=$propose1?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>評審時間2</td>
			<td class=content><?php=$chktime1?></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>論文下載</td>
			<td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">下載</span></td>
		</tr>
		<tr>
			<td colspan="2" background="table_line.gif" height="1"></td>
		</tr>
		<tr>
			<td width="71" class=title>摘要下載</td>
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