<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];

if( empty($id) or empty($password) )
{
 echo "請先登入！";
 exit;
}

require "../db.php";

//讀取評審的sn
$str = "select sn from reviewer where re_id='$id' and re_password='$password'";
$list = mysql_query($str,$link);
list($numbers_sn) = mysql_fetch_row($list);

//驗證評審權限
$str = "select paperman,papername,category,number,propose,chktime,chkstate,reviewer_sn,reviewer_sn1 from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($paperman,$papername,$category,$number,$propose,$chktime,$chkstate,$reviewer_sn,$reviewer_sn1) = mysql_fetch_row($list);

if( $reviewer_sn  == $numbers_sn )$gg++;
if( $reviewer_sn1 == $numbers_sn )$gg++;

if( $gg==0 )
{
  echo "很抱歉，這不屬於您的範圍哦！";
  exit;
}

  //-----------------類別名稱、代號----------------------
  $strn = "select name,typenumber,email from numbers where sn='$category'"; 
  $listn = mysql_query($strn,$link); 
  list($category_name,$typenumber,$type_email) = mysql_fetch_row($listn);

$propose=nl2br($propose);
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo config('settings.titleC');?></title>
<style>
<!--
table.MsoTableGrid
	{border:1.0pt solid windowtext;
	font-size:10.0pt;
	font-family:"Times New Roman";
	}
-->
</style>
</head>
<body>
<div align="center">
	<table border="0" width="650" cellspacing="0" cellpadding="0">
		<tr>
			<td height="40" width="650" colspan="2"><p align="center"><span style="font-size: 16pt"><?php echo config('settings.titleC');?></span></td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2"><font size="4">論文名稱：<?php echo $papername;?></font></td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2"><font size="4">論文編號：<?php echo $typenumber.$number;?></font></td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2"><font size="4">綜合評論：</font></td>
		</tr>
		<tr>
			<td width="650" colspan="2">

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:73.05pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext' id="table2">
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:153.75pt'>
  <td width=428 valign=top style='width:320.7pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:153.75pt'>
  <p class=MsoNormal><span lang=EN-US style='font-size:12.0pt;mso-bidi-font-size:
  12.0pt;font-family:新細明體'><o:p><?php echo $propose;?></o:p></span></p>
  </td>
 </tr>
</table>

			</td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2">　</td>
		</tr>
		<tr>
			<td height="40" width="102" valign="top"><font size="4">評審結果：</font></td>
			<td height="40" width="548">
<?php
$str = "select sn,name from chkstate order by sn";
$list = mysql_query($str,$link);
while(list($chks_sn,$chks_name) = mysql_fetch_row($list))
{
   if( $chkstate == $chks_sn )
   {
      echo "			 ■ " . $chks_name . "<br>\n";
   }
   else
   {
      echo "			 □ " . $chks_name . "<br>\n";
   }
}
?>
                        </td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2">　</td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2"><p align="center"><font size="4">審稿簽名：<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp; 日期：</font><u><font size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></u></td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2">　</td>
		</tr>
		<tr>
			<td height="25" width="650" colspan="2">敬請<b>簽名</b>後，於5月06日前，以下列三種方式之ㄧ寄回：</td>
		</tr>
		<tr>
			<td height="25" width="102">　</td>
			<td height="25" width="548">　</td>
		</tr>
		<tr>
			<td height="35" width="102" align="right">(1)</td>
			<td height="35" width="548">掃描成.pdf或者.jpg Email至：<?php echo $type_email;?></td>
		</tr>
		<tr>
			<td height="35" width="102" align="right">(2)</td>
			<td height="35" width="548">傳真：<?php echo config('settings.fax');?></td>
		</tr>
		<tr>
			<td height="35" width="102" align="right">(3)</td>
			<td height="35" width="548">411台中市太平區中山路一段215巷35號<br>
			國立勤益科技大學&nbsp; 資訊工程系 收(請註明<?php echo config('settings.titleB');?>研討會文件)</td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2">　</td>
		</tr>
		<tr>
			<td height="40" width="650" colspan="2" align="center"><a href="javascript:window.print()">列印本頁</a></td>
		</tr>
	</table>
</div>
</body>
</html>