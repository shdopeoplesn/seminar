<?php
require "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
//-----捉IP位址--------
// for PHP5.4 and newer version
if(isset($REMOTE_ADDR)){
	$ip=$REMOTE_ADDR;
}
//$str = "insert into action(ip,action,time) values('$ip','在審查的首頁',now())";
//mysql_query($str,$link);

//-------------------計算投稿總筆數------------
//$str="select count(*) from my_papers";
//$list=mysql_query($str,$link);
//list($disscuss_count)=mysql_fetch_row($list);

$result=mysql_query("Select * from papers");
$disscuss_count=mysql_num_rows($result);


//-------------------抓取頁數------------------
$read_num="10";
$all_page=ceil($disscuss_count/$read_num);
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>論文審查</title>
 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 20pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
     text-align:center;
   }
 .up_next 
   { 
     color: rgb(51, 51, 255);
     font-size: 10pt;
     text-align:center;
   }

 </style>
</head>
<body>

<div align="center">
<table width="800" cellspacing="3">
 <tr>
     <td width="165" class=title>論文名稱</a></td>
     <td width="165" class=title>論文作者</td>
     <td width="200" class=title><a href="paper1.php?sort=category">投稿類別</a></td>
     <td width="100" class=title>檔案名稱</td>
     <td width="100" class=title>論文摘要</td>
 </tr>

<?php

//--------抓取投稿筆數分析------------
if(empty($page_num))$page_num="1";
$start_num=$read_num*($page_num-1);

if(empty($sort))$sort="serial";
$str = "select serial,papername,paperman,category,filename,abstract  from papers order by $sort limit $start_num,$read_num";
$list = mysql_query($str,$link);
while(list($serial,$papername,$paperman,$category,$filename,$abstract ) = mysql_fetch_row($list))
{
?>         <tr>
              <td class=content><?php echo $papername; ?></td>
              <td class=content><?php echo $paperman; ?></td>
<?php
//      $stra = "select name from numbers where sn='$category'"; 
//      $lista = mysql_query($stra,$link); 
//     list($category_name) = mysql_fetch_row($lista);

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
      
?>      
              <td class=content><?php echo $category_name; ?></td>
              <td class=content><?php echo $filename; ?></td>
              <td class=content><?php echo $abstract; ?></td>
          </tr>
<?php
 }
?>
</table>
<br>
<table>
 <tr>
<?php
//------------------上、下頁----------------------------
if($page_num>1)
{
   $pre=$page_num-1;
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='paper1.php?page_num=$pre&sort=$sort';\" class=up_next>上一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
?>
			<td width="35" class=up_next><?php echo $page_num; ?> / <?php echo $all_page;?></td>
<?php
if($page_num<$all_page)
{
   $next=$page_num+1;
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='paper1.php?page_num=$next&sort=$sort';\" class=up_next>下一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
?>
</tr>
</table>
</div>

</html>