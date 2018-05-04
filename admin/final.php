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
</head>

<body>
<br>
<div align="center">
	<table border="0" width="260" id="table1">
		<tr>
			<td class=title>請選擇類別</td>
		</tr>
<?php
$str = "select category,abbr from session";
$list = mysql_query($str,$link);
while(list($category,$abbr) = mysql_fetch_row($list))
 {
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
	  
    echo      " <tr>
			<td class=content><a href=\"final_file.php?category=$category\">".$category_name."&nbsp;&nbsp;[".$abbr."]</a></td>
		</tr>";
 }
?>
	</table>
</div>

</body>

</html>
