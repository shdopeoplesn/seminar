<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];

//for PHP5.4 and newer version
if(isset($_GET['category'])){
	$category = $_GET['category'];
}else{
	$category = '';
}
require "../db.php";
?>
 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 15pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
 </style>

<div align="center">
	<table border="0" width="750" id="table1">
		<tr>
			<td class=title>論文名稱</td>
			<td class=title width="100">論文編號</td>
			<td class=title width="180">定稿論文</td>
			<td class=title width="180">定稿摘要</td>

		</tr>
<?php
//$str = "select typenumber from numbers where sn='$sn'";
//$list = mysql_query($str,$link);
//list($typenumber) = mysql_fetch_row($list);

$str = "select serial,papername,final_rawfile,final_rawabstract,papernumber from papers where category='$category' and accept>'0'";
$list = mysql_query($str,$link);
while(list($serial,$papername,$final_rawfile,$final_rawabstract,$papernumber) = mysql_fetch_row($list))
{
?> 
        <tr>
			<td class=content><?php echo $papername; ?></td>
			<td class=content width="80" align="center"><?php echo $papernumber; ?></td>
			<td class=content width="150" align="center"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_paper_download.php?serial=<?phpecho $serial; ?>'"><?php echo $final_rawfile; ?></span></td>
			<td class=content width="150" align="center"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_excerpt_download.php?serial=<?php echo $serial; ?>'"><?php echo $final_rawabstract; ?></span></td>
		</tr>	
<?php
}
?>	
		<tr>
			<td class=content colspan="4" align="center">　</td>
		</tr>
		<tr>
			<td class=content colspan="4" align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
		</tr>
	</table>
	<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>
</div>






