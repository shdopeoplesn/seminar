<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

$chk_id=strtoupper(substr($id,0,7));
if ($chk_id!="ILT2018"){
session_destroy();
header("location:login.php");
exit;
}
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
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
  }
  .content
  { color: rgb(131, 131, 131);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    text-align:center;
    background-color: rgb(249, 249, 249);
  }
</style>
<style type="text/css">
      a:link    {text-decoration:underline;color:#0000ff;}
      a:visited {text-decoration:underline;color:#0000ff;}
      a:hover   {text-decoration:underline;color:#FF0000;}
</style> 
</head>
<body>
<?php
$str = "select category,abbr from session where session_id='$id' ";
$list = mysql_query($str,$link);
list($category,$abbr) = mysql_fetch_row($list);

if($category=="1")$category="電能與節能技術";   
if($category=="2")$category="智慧型控制系統";	
if($category=="3")$category="積體電路設計";	
if($category=="4")$category="消費性家電產品開發與設計";  
if($category=="5")$category="嵌入式系統開發與應用";	
if($category=="6")$category="通訊技術";		
if($category=="7")$category="網路技術開發與應用";  
if($category=="8")$category="多媒體與數位內容技術";	
if($category=="9")$category="居家照護產品開發與設計";	
if($category=="10")$category="多媒體安全與應用";		
if($category=="11")$category="雲端與物聯網應用技術";	
if($category=="12")$category="系統整合與應用";		
if($category=="13")$category="其他領域";		
if($category=="14")$category="Invited Sessions(智慧型自動化與智慧生活)";
{
?>
<div align="center">
	<table border="0" width="720" cellspacing="1" cellpadding="0">
		<tr>
			<td colspan="7" class=title>領域：<?php=$category?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php=$abbr?></td>
		</tr>
		<tr>

			<td width="90" class=content>評審ID</td>
			<td width="90" class=content>密碼</td>
			<td width="90" class=content>評審姓名</td>			
			<td width="190" class=content>評審Email</td>			
			<td width="100" class=content>Email回函</td>						
			<td width="80"  class=content>評審篇數</td>
			<td width="80"  class=content>Email重送</td>
		</tr>
<?php
   $stra="select id,passwd,name,email,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,reply from reviewer where id like '$abbr%' order by id";
   $lista =mysql_query($stra,$link);
   while(list($re_id,$passwd,$name,$email,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$reply) = mysql_fetch_row($lista))
   {
$total=0;
if ($paperno1!=""){$total=$total+1;}
if ($paperno2!=""){$total=$total+1;}
if ($paperno3!=""){$total=$total+1;}
if ($paperno4!=""){$total=$total+1;}
if ($paperno5!=""){$total=$total+1;}

if ($paperno6!=""){$total=$total+1;}
if ($paperno7!=""){$total=$total+1;}
if ($paperno8!=""){$total=$total+1;}
if ($paperno9!=""){$total=$total+1;}
if ($paperno10!=""){$total=$total+1;}

if ($paperno11!=""){$total=$total+1;}
if ($paperno12!=""){$total=$total+1;}
if ($paperno13!=""){$total=$total+1;}
if ($paperno14!=""){$total=$total+1;}
if ($paperno15!=""){$total=$total+1;}
if ($reply=="1"){$reply="已點選";}else{$reply="未點選";}


?>
		<tr>
			<td width="90" class=content><a href="reviewer_view.php?re_id=<?php=$re_id?>"><?php=$re_id?></a></td>
			<td width="90"  class=content><?php=$passwd?></td>
			<td width="90"  class=content><?php=$name?></td>
			<td width="190"  class=content><?php=$email?></td>			
			<td width="100"  class=content><?php=$reply?></td>
			<td width="80"  class=content><?php=$total?></td>
			<td width="80" class=content><a href="email_resend.php?re_id=<?php=$re_id?>">重新發送</a></td>			
		</tr>
<?php
   }
?>
		<tr>
			<td width="397" colspan="2">　</td>
		</tr>
	</table>
</div>
<?php
}
?>
</body>
</html>