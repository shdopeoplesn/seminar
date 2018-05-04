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
</style>
</head>
<body>
<div align="center">
	<table border="0" width="750" cellspacing="1" cellpadding="0">
		<tr>
			<td class=title width="300">名稱</td>
			<td class=title width="80">簡稱</td>
			<td class=title width="150">未上傳定稿人數</td>
			<td class=title width="80">檢視未回傳名單</td>
<!--			<td class=title width="150">自動寄發Email</td> -->
		</tr>
<?php
$str="select category,abbr  from session  order by category  ";
$list =mysql_query($str,$link);
while(list($category ,$abbr ) = mysql_fetch_row($list))
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
      

$no_paper=0;

$stra="select paperchinesename,final_file  from papers where category='$category' and accept >'0'  ";
$lista =mysql_query($stra,$link);
while(list($paperchinesename,$final_file) = mysql_fetch_row($lista))
{

	if ($final_file=="" and $paperchinesename!="error")
	{
		$no_paper=$no_paper+1;
	}


}
?>
		<tr>
			<td class=content><?php echo $category_name; ?></td>
			<td class=content><?php echo $abbr; ?></td>
			<td class=content><?php echo $no_paper; ?></td>			
			<td class=content><a href="no_paper_view.php?category=<?php echo $category; ?>"><img border="0" src="edit.gif" width="12" height="12"></a></td>
<!--			<td class=content><a href="no_paper_email.php?category=<?php //=$category?>"><img border="0" src="edit.gif" width="12" height="12"></a></td> -->
		</tr>
<?php
}
?>
	</table>
</div>
</body>
</html>