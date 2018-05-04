<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

/*
if ($id!="crossaccoun"){
session_destroy();
header("location:login.php");
exit;
}
$str = "select serial from account ";
$list = mysql_query($str,$link);
list($serial) = mysql_fetch_row($list);
if ($serial==""){
include  "account_insert.php";

}
*/
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style type="text/css">
  .title
  { color: rgb(204, 204, 255);
    background-color: rgb(51, 51, 153);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:3px;
    text-align:center;
  }
  .content
  { color: rgb(131, 131, 131);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    background-color: rgb(249, 249, 249);	
  }

  
</style>

</head>
<body>
<div align="center" >
	<table border="0"  cellspacing="1" cellpadding="0">
	    <tr>
			<td  colspan="2" class=title>繳費情形</td>			
		</tr>				
		<tr>
			<td width="70" class=title>序號</td>
			<td width="70" class=title>ID</td>
			<td width="70" class=title>EMAIL1</td>
			<td width="70" class=title>EMAIL2</td>
			<td width="70" class=title>EMAIL3</td>
			<td width="70" class=title>EMAIL4</td>
			<td width="70" class=title>繳費方式</td>
		</tr>
<?php 
$total=1;
$str="Select idchange,method from postoffice order by method ";
$list =mysql_query($str,$link);
while(list($idchange,$method) = mysql_fetch_row($list))
   {
	$num=substr($idchange,7,3);
	$id_num="ILT".$num;
	$stra="Select email,email2,email3,email4 from members where id='$id_num' ";
	$lista =mysql_query($stra,$link);
	list($email,$email2,$email3,$email4) = mysql_fetch_row($lista);
?>
		<tr>
			<td width="50" class=content><?php=$total?></td>
			<td width="50" class=content><?php=$id_num?></td>
			<td width="50" class=content><?php=$email?></td>
			<td width="70" class=content><?php=$email2?></td>
			<td width="70" class=content><?php=$email3?></td>
		    <td width="70" class=content><?php=$email4?></td>
		    <td width="70" class=content><?php=$method?></td>
		</tr>
<?php
$total=$total+1;
}
?>


</body>
</html>
