<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminid=$_SESSION["reminid"];
$adminpw=$_SESSION["reminpw"];
if( empty($adminid) or empty($adminpw) )
{
header("location:login.php");
exit;
}

?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ILT2018研討會後端管理系統</title>
<script language="JavaScript">
<!--
var txt = "ILT2018研討會後端管理系統";

//-->
</script>
</head>
<FRAMESET rows="86,*" FRAMEBORDER="0" BORDER="0" framespacing="0"> 
<FRAME src="images/title.jpg" marginwidth="0" marginheight="0" scrolling="no" noresize name="title"> 
<FRAMESET colS="160,*">
<FRAME SRC="menu.php" NAME="menu">
<frame src="a.htm" name="content"> 
 </FRAMESET> 
 </frameset><noframes></noframes>
</html>
