<?php
require "../db.php";
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
    text-align:center;
    background-color: rgb(249, 249, 249);
  }
  .content1
  { color: rgb(131, 131, 131);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    background-color: rgb(249, 249, 249);
  }
</style>
</head>
<body>
<div align="center">
	<table border="0" width="620" cellspacing="1" cellpadding="0">
		<tr>
			<td class=title>名稱</td>
			<td class=title width="73">英文簡稱</td>
			<td class=title width="78">投稿篇數</td>
			<td class=title width="78">報告篇數</td>
			<td class=title width="78">壁報篇數</td>
			<td class=title width="78">拒絕篇數</td>
		</tr>
<?php
$total=0;
$str="select abbr,category from session order by category  ";
$list =mysql_query($str,$link);
while(list($abbr,$category) = mysql_fetch_row($list))
{
$result=mysql_query("Select * from papers where category='$category' and category=category");
$category_count=mysql_num_rows($result);
$total=$total+$category_count;

$result=mysql_query("Select * from papers where category='$category' and accept='2'");
$report_count=mysql_num_rows($result);

$result=mysql_query("Select * from papers where category='$category' and accept='1'");
$post_count=mysql_num_rows($result);

$result=mysql_query("Select * from papers where category='$category' and accept='0' and notify='1' ");
$rejust_count=mysql_num_rows($result);




       if($category=="1")$category_name="電能與節能技術";   
      if($category=="2")$category_name="智慧型控制系統";	
      if($category=="3")$category_name="積體電路設計";	
      if($category=="4")$category_name="消費性家電產品開發與設計";     
      if($category=="5")$category_name="嵌入式系統開發與應用";	 
      if($category=="6")$category_name="通訊技術";		
      if($category=="7")$category_name="網路技術開發與應用"; 
      if($category=="8")$category_name="多媒體與數位內容技術";	 
      if($category=="9")$category_name="居家照護產品開發與設計";	
      if($category=="10")$category_name="多媒體安全與應用";		
      if($category=="11")$category_name="雲端與物聯網應用技術";	
      if($category=="12")$category_name="系統整合與應用";		
      if($category=="13")$category_name="其他領域";		
      if($category=="14")$category_name="Invited Sessions(智慧型自動化與智慧生活)";	
      

   //計算評審人數
   //$stra="select count(*) from papers where category='$sncount'";
   //$lista =mysql_query($stra,$link);
   //list($sncount) = mysql_fetch_row($lista);
?>
		<tr>
			<td class=content1><?php echo $category_name; ?></td>
			<td class=content width="73"><?php echo $abbr; ?></td>
			<td class=content width="78"><?php echo $category_count; ?></td>
			<td class=content width="78"><?php echo $report_count; ?></td>
			<td class=content width="78"><?php echo $post_count; ?></td>
			<td class=content width="78"><?php echo $rejust_count; ?></td>
		</tr>
<?php
$total=$total;
}
?>
	</table>
</div>
<p align="center">總數：<?php echo $total; ?></p>
<p align="center"><a href="excelsession.php" >論文詳細資訊Excel </a></p>
<p align="center"><a href="excelsession1.php" >繳費詳細資訊Excel </a></p>
<p align="center"><a href="excelsession2.php" >報名詳細資訊Excel </a></p>
</body>
</html>