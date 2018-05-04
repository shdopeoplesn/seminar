<?php
require "../db.php";
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
</head>
<body>
<?php
$str="select category,abbr from session order by category  ";
$list =mysql_query($str,$link);
while(list($category,$abbr) = mysql_fetch_row($list))
{
     
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

?>
<div align="center">
	<table border="0" width="562" cellspacing="1" cellpadding="0">
		<tr>
			<td colspan="6" class=title>領域：<?php echo $category; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $abbr; ?></td>
		</tr>
		<tr>
			<td width="144" class=content>評審姓名(代號)</td>
			<td width="125" class=content>帳號</td>
			<td width="125" class=content>密碼</td>
            <td width="125" class=content>Mail</td>
			<td width="79"  class=content>評審篇數</td>
		</tr>
<?php
   $stra="select name,id,passwd,email,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from reviewer where id like '$abbr%' ";
   $lista =mysql_query($stra,$link);
   while(list($name,$id,$passwd,$email,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15) = mysql_fetch_row($lista))
   {
   
      /*計算評審1人數
      $strb="select count(*) from my_papers where reviewer_sn='$reviewer_sn' ";
      $listb =mysql_query($strb,$link);
      list($sncount) = mysql_fetch_row($listb);
      //計算評審2人數
      $strb="select count(*) from my_papers where reviewer_sn1='$reviewer_sn' ";
      $listb =mysql_query($strb,$link);
      list($sncount1) = mysql_fetch_row($listb);*/
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
?>
		<tr>
			<td width="144" class=content><?php echo $name; ?></td>
			<td width="125" class=content><?php echo $id; ?></td>
			<td width="125" class=content><?php echo $passwd; ?></td>
            <td width="125" class=content><?php echo $email; ?></td>
			<td width="79"  class=content><?php echo $total; ?></td>
		</tr>
<?php
   }
?>
		<tr>
			<td width="560" colspan="6">　</td>
		</tr>
	</table>
</div>
<?php
}
?>
</body>
</html>