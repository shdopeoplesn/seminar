<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";
require("check.php");
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
<br><br>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#000000">
	<tr>
		<td align="center">序號</td>
		<td align="center">姓名</td>
		<td align="center">單位</td>
		<td align="center">用餐</td>
	</tr>
<?php
$str = "select category from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category) = mysql_fetch_row($list);
$i=1;
$str="select id,reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,position1,position2,position3,position4,position5,position6,eat1,eat2,eat3,eat4,eat5,eat6  from  register order by serial";
$list =mysql_query($str,$link);
while(list($member_id,$reportman1,$reportman2,$reportman3,$reportman4,$reportman5,$reportman6,$position1,$position2,$position3,$position4,$position5,$position6,$eat1,$eat2,$eat3,$eat4,$eat5,$eat6) = mysql_fetch_row($list))
{


$stra="select unit from  members where id='$member_id'";
$lista =mysql_query($stra,$link);
list($unit) = mysql_fetch_row($lista);

{
if ($reportman1!="" and $position1=='1')
{$name=$reportman1;

?>
	<tr>
		<td align="center"><?php echo $i;?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $eat1; ?></td>
  </tr>
<?php
$i=$i+1;
}

if ($reportman2!="" and $position2=='1' and $reportman1!=$reportman2)
{$name=$reportman2;

?>
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $eat2; ?></td>
  </tr>
<?php
$i=$i+1;
}


if ($position3=='1' and $reportman3!=""and $reportman1!=$reportman3)
{$name=$reportman3;

?>
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $eat3; ?></td>
  </tr>
<?php
$i=$i+1;
}

if ($position4=='1' and $reportman4!=""and $reportman1!=$reportman4)
{$name=$reportman4;

?>
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $eat4; ?></td>
  </tr>
<?php
$i=$i+1;
}
if ($position5=='1' and $reportman5!=""and $reportman1!=$reportman5)
{$name=$reportman5;

?>
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $eat5; ?></td>
  </tr>
<?php
$i=$i+1;
}
if ($position6=='1' and $reportman6!=""and $reportman1!=$reportman6)
{$name=$reportman6;

?>
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td align="center"><?php echo $name; ?></td>
		<td align="center"><?php echo $unit; ?></td>
		<td align="center"><?php echo $eat6; ?></td>
  </tr>
<?php
$i=$i+1;
}
}



}
?>
</table>
</body>
</html>