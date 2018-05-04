<?php
require "../db.php";
?>
<Script Language="javascript">
function formcheck()
{
    if ( document.Regist.id.value == "" )
    {
	 alert("請輸入ID！");
	 document.Regist.id.focus();
          return false;	
    }
    if ( document.Regist.password.value == "" )
    {
	 alert("請輸入Password！");
	 document.Regist.password.focus();
          return false;	
    }
    if ( document.Regist.email.value == "" )
    {
	 alert("請輸入Email！");
	 document.Regist.email.focus();
          return false;	
    }
          return true;  
}
</script>

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
   }
</style>
<?php
	$session_id = filter_var($_GET['session_id'],FILTER_SANITIZE_STRING);

?>
<div align="center">
<br>
<table border="0" width="400" id="table1">
<form action="root_update.php?session_id=<?php echo $session_id; ?>" method="post" name="Regist" onsubmit="return formcheck();">
<?php
$str = "select category,session_id,passwd,session_name,session_email from session where session_id='$session_id'" ;
$list = mysql_query($str,$link);
list($category,$session_id,$passwd,$session_name,$session_email) = mysql_fetch_row($list);

      
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
		<td align="center" width="119" class=title>類別名稱</td>
		<td class=content><?php echo $category; ?></td>
	</tr>
	<tr>
		<td align="center" width="119" class=title>類別ID</td>
		<td class=content><?php echo $session_id; ?></td>		
	</tr>
	<tr>
		<td align="center" width="119" class=title>Password</td>
		<td class=content><input type="text" name="passwd" value="<?php echo $passwd; ?>"></td>
	</tr>
	<tr>
		<td align="center" width="119" class=title>管理者姓名</td>
		<td class=content><input type="text" name="session_name" value="<?php echo $session_name; ?>"></td>
	</tr>
	<tr>
		<td align="center" width="119" class=title>管理者Email</td>
		<td class=content><input type="text" name="session_email" value="<?php echo $session_email; ?>"></td>
	</tr>
	<tr>
		<td align="center" class=content colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" class=content colspan="2"><input type="submit" value="修改"><input type="hidden" name="session_id" value="<?php echo $session_id; ?>"></td>
	</tr>

</form>
</table>
</div>
