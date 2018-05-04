<?php
include "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");

if( empty($start) )$start=0;
if( empty($ends) )$ends=999;

$str="select count(serial) from register where eat1='葷' ";
$list =mysql_query($str,$link);
list($eats1) = mysql_fetch_row($list);

$str="select count(serial) from register where eat2='葷' ";
$list =mysql_query($str,$link);
list($eats2) = mysql_fetch_row($list);

$str="select count(serial) from register where eat3='葷' ";
$list =mysql_query($str,$link);
list($eats3) = mysql_fetch_row($list);

$str="select count(serial) from register where eat4='葷' ";
$list =mysql_query($str,$link);
list($eats4) = mysql_fetch_row($list);

$str="select count(serial) from register where eat5='葷' ";
$list =mysql_query($str,$link);
list($eats5) = mysql_fetch_row($list);

$str="select count(serial) from register where eat6='葷' ";
$list =mysql_query($str,$link);
list($eats6) = mysql_fetch_row($list);

$str="select count(serial) from register where eat1='素'";
$list =mysql_query($str,$link);
list($eatn1) = mysql_fetch_row($list);

$str="select count(serial) from register where eat2='素'";
$list =mysql_query($str,$link);
list($eatn2) = mysql_fetch_row($list);

$str="select count(serial) from register where eat3='素'";
$list =mysql_query($str,$link);
list($eatn3) = mysql_fetch_row($list);

$str="select count(serial) from register where eat4='素'";
$list =mysql_query($str,$link);
list($eatn4) = mysql_fetch_row($list);

$str="select count(serial) from register where eat5='素'";
$list =mysql_query($str,$link);
list($eatn5) = mysql_fetch_row($list);
$str="select count(serial) from register where eat6='素'";
$list =mysql_query($str,$link);
list($eatn6) = mysql_fetch_row($list);
$meat_count=$eats1+$eats2+$eats3+$eats4+$eats5+$eats6;
$no_meat_count=$eatn1+$eatn2+$eatn3+$eatn4+$eatn5+$eatn6;


?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<form method="POST" action="eat_namelist.php">
<div align="center">
	<table border="0" width="345" cellspacing="1" cellpadding="0">
		<tr>
			<td width="341" colspan="3">
			<p align="center"><font size="6" face="標楷體">2018ILT用??單</font></td>
		</tr>
		<tr>
			<td width="119" bgcolor="#F8F8F8"><p align="right">????序號?</td>
			<td width="65" bgcolor="#F8F8F8"><input type="text" name="start" size="7" value="<?php echo $start?>"></td>
			<td width="157" align="right">葷食總?數?<?php echo $meat_count?></td>
		</tr>
		<tr>
			<td width="119" bgcolor="#F8F8F8"><p align="right">讀取資料筆數：</td>
			<td width="65" bgcolor="#F8F8F8"><input type="text" name="ends" size="7" value="<?php echo $ends?>"></td>
			<td width="157" align="right">素食總?數?<?php echo $no_meat_count?></td>
		</tr>
		<tr>
			<td colspan="2" width="185" bgcolor="#F8F8F8"><p align="center"><input type="submit" value="??" name="B1"></td>
			<td width="157"><p align="center"><a href="javascript:window.print()">??</a></td>
		</tr>
	</table>
</div>
</form>
<font color="#CC0000">※請自??除重覆之名單</font><br>
<br>
<table border="1" width="100%" bordercolorlight="#000000" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center">序號</td>
		<td align="center">??</td>
		<td align="center">單?</td>
		<td align="center">身份</td>
		<td align="center">?絡?話</td>
		<td align="center">用?</td>
	</tr>
<?php
$str="select serial,id,position1,position2,position3,position4,position5,position6,eat1,eat2,eat3,eat4,eat5,eat6 from register order by serial limit $start,$ends ";
$list =mysql_query($str,$link);
while(list($serial,$id,$position1,$position2,$position3,$position4,$position5,$position6,$eat1,$eat2,$eat3,$eat4,$eat5,$eat6) = mysql_fetch_row($list))
{

$stra="select name,unit,tel from members where id='$id' ";
$lista =mysql_query($stra,$link);
list($name,$unit,$tel) = mysql_fetch_row($lista);
$positionH=0;
$positionE=0;
if($position1==1){$positionH=$positionH+1;}
if($position1==2){$positionE=$positionE+1;}
if($position1==3){$positionE=$positionE+1;}
if($position1==4){$positionE=$positionE+1;}
if($position2==5){$positionH=$positionH+1;}
if($position2==2){$positionE=$positionE+1;}
if($position2==3){$positionE=$positionE+1;}
if($position2==4){$positionE=$positionE+1;}
if($position3==1){$positionH=$positionH+1;}
if($position3==2){$positionE=$positionE+1;}
if($position3==3){$positionE=$positionE+1;}
if($position3==4){$positionE=$positionE+1;}
if($position4==1){$positionH=$positionH+1;}
if($position4==2){$positionE=$positionE+1;}
if($position4==3){$positionE=$positionE+1;}
if($position4==4){$positionE=$positionE+1;}
if($position5==1){$positionH=$positionH+1;}
if($position5==2){$positionE=$positionE+1;}
if($position5==3){$positionE=$positionE+1;}
if($position5==4){$positionE=$positionE+1;}
if($position6==1){$positionH=$positionH+1;}
if($position6==2){$positionE=$positionE+1;}
if($position6==3){$positionE=$positionE+1;}
if($position6==4){$positionE=$positionE+1;}
$position="教授?".$positionH."? &nbsp;&nbsp; 其??".$positionE."?";

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
$eat="葷?".$meat."? &nbsp;&nbsp; 素：".$no_meat."?";



?>
	<tr>
		<td align="center"><?php echo $serial;?></td>
		<td align="center"><?php echo $name;?></td>
		<td align="center"><?php echo $unit;?></td>
		<td align="center"><?php echo $position;?></td>
		<td align="center"><?php echo $tel;?></td>
		<td align="center"><?php echo $eat;?></td>
	</tr>
<?php
}
?>
</table>
</body>
</html>