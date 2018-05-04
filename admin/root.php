<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
require "../db.php";

?>


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
</style>

<div align="center">

<table cellspacing="3" width="700">
 <tr>
   <td class=title width="207">類別名稱</td>
   <td class=title width="66">類別ID</td>
   <td class=title width="68">Password</td>
   <td class=title width="90">管理者姓名</td>
   <td class=title>管理者Email</td>
   <td class=title width="40">修改</td>
 </tr>
<?php
$str = "select category,session_id,passwd,session_name,session_email from session";
$list = mysql_query($str,$link);
while(list($category,$session_id,$passwd,$session_name,$session_email) = mysql_fetch_row($list))
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
  <tr>
           <td class=content width="207"><?php echo $category; ?></td>
           <td class=content width="66"><?php echo $session_id; ?></td>
           <td class=content width="68"><?php echo $passwd; ?></td>
           <td class=content width="90"><?php echo $session_name; ?></td>
           <td class=content><?php echo $session_email; ?></td>
           <td class=content width="40"><a href="root_edit.php?session_id=<?php echo $session_id;?>"><img src="images/edit.gif" border="0"></a></td>
         </tr>
</div>
<?php
}
?>