<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

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
			<td  colspan="2" class=title>以論文註冊者</td>			
		</tr>				
		<tr>
			<td width="50" class=title>序號</td>
			<td width="70" class=title>會員編號</td>
			<td width="120" class=title>會員姓名</td>
			<td width="70" class=title>應繳金額</td>
			<td width="70" class=title>註冊情形</td>
			<td class=title width="100">寄款人代號</td>	
			<td class=title width="150">銷帳號碼</td>
			<td class=title width="100">已繳金額</td>
			<td class=title width="100">繳費情形</td>				
		</tr>
<?php 
$total=0;



$str="Select id,name from members ";
$list =mysql_query($str,$link);
while(list($id,$name) = mysql_fetch_row($list))
   {
    $result=mysql_query("Select * from papers where accept!='0' and notify='1' and id='$id' ");
    $accept_count=mysql_num_rows($result);
	if ($accept_count!=0)       
       {
	    $total=$total+1;		
		
        $stra = "select  idchange,money,atmchk from account where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($idchange,$money,$atmchk) = mysql_fetch_row($lista);         			    		 
		if ($idchange==""){$matriculate='未註冊';}
		else {$matriculate='已註冊';}
		$summoney=0;
        $strb="Select money from postoffice where idchange='$idchange' ";
        $listb =mysql_query($strb,$link);        
        while(list($incomemoney) = mysql_fetch_row($listb))
           { $summoney=$summoney+$incomemoney;}
		
		if (($money==$summoney)&&($idchange!=""))
		   { $pay='已繳清';}
		elseif ($money<$summoney) 
		   { $pay='資料有問題，請查證資料庫';}
		else
		   {  if ($idchange=="") {$pay='未繳金額'.($accept_count*1000);}		   
		      else {$pay='未繳金額'.($money-$summoney);}
		   }   
		   
		if (($matriculate=="已註冊")&($pay=='已繳清'))
		   {
?>
		<tr>
			<td width="50" class=content><?php=$total?></td>
			<td width="70" class=content><?php=$id?></td>
			<td width="120" class=content><?php=$name?></td>
		    <td width="70" class=content><?php=$money?></td>
			<td width="70" class=content><?php=$matriculate?></td>
	        <td class=content width="100"><?php=$idchange?></td> 
			<td class=content width="150"><?php=$atmchk?></td>
			<td class=content width="100"><?php=$summoney?></td>
			<td class=content width="100"><?php=$pay?></td> 			
		</tr>
<?php
}
}
}
?>
         <tr>
			<td  colspan="3" class=title>未註冊或未繳清者</td>			
		</tr>			
<?php
$str="Select id,name from members ";
$list =mysql_query($str,$link);
while(list($id,$name) = mysql_fetch_row($list))
   {
    $result=mysql_query("Select * from papers where accept!='0' and notify='1' and id='$id' ");
    $accept_count=mysql_num_rows($result);
	if ($accept_count!=0)       
       {
	    $total=$total+1;		
		
        $stra = "select  idchange,money,atmchk from account where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($idchange,$money,$atmchk) = mysql_fetch_row($lista);         			    		 
		if ($idchange==""){$matriculate='未註冊';}
		else {$matriculate='已註冊';}
		$summoney=0;
        $strb="Select money from postoffice where idchange='$idchange' ";
        $listb =mysql_query($strb,$link);        
        while(list($incomemoney) = mysql_fetch_row($listb))
           { $summoney=$summoney+$incomemoney;}
		
		if (($money==$summoney)&&($idchange!=""))
		   { $pay='已繳清';}
		elseif ($money<$summoney) 
		   { $pay='資料有問題，請查證資料庫';}
		else
		   {  if ($idchange=="") {$pay='未繳金額'.($accept_count*1000);}		   
		      else {$pay='未繳金額'.($money-$summoney);}
		   }   
		   
		if (($matriculate=="未註冊")|($pay!='已繳清'))
		   {
?>
        
		<tr>
			<td width="50" class=content><?php=$total?></td>
			<td width="70" class=content><?php=$id?></td>
			<td width="120" class=content><?php=$name?></td>
		    <td width="70" class=content><?php=$money?></td>
			<td width="70" class=content><?php=$matriculate?></td>
	        <td class=content width="100"><?php=$idchange?></td> 
			<td class=content width="150"><?php=$atmchk?></td>
			<td class=content width="100"><?php=$summoney?></td>
			<td class=content width="100"><?php=$pay?></td> 			
		</tr>
<?php
}
}
}
?>

        <tr>
			<td  colspan="2" class=title>以會員註冊者</td>			
		</tr>				
<?php 
$str= "select  id,idchange,money,atmchk from account "; 
$list =mysql_query($str,$link);        
while(list($id,$idchange,$money,$atmchk) = mysql_fetch_row($list))
   {
    $result=mysql_query("Select * from papers where accept!='0' and notify='1' and id='$id' ");
    $accept_count=mysql_num_rows($result);
	if ($accept_count==0)       
       {
	    $total=$total+1;		
        $stra ="Select name from members where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($name) = mysql_fetch_row($lista);         			    		 
		
		$matriculate='已註冊';
		
		$summoney=0;
        $strb="Select money from postoffice where idchange='$idchange' ";
        $listb =mysql_query($strb,$link);        
        while(list($incomemoney) = mysql_fetch_row($listb))
           { $summoney=$summoney+$incomemoney;}
		if (($money==$summoney)&&($idchange!=""))
		   { $pay='已繳清';}
		elseif ($money<$summoney) 
		   { $pay='資料有問題，請查證資料庫';}
		else
		   {  if ($idchange=="") {$pay='未繳金額'.($accept_count*1000);}		   
		      else {$pay='未繳金額'.($money-$summoney);}
		   }   
		   
?>
		<tr>
			<td width="50" class=content><?php=$total?></td>
			<td width="70" class=content><?php=$id?></td>
			<td width="120" class=content><?php=$name?></td>
		    <td width="70" class=content><?php=$money?></td>
			<td width="70" class=content><?php=$matriculate?></td>
	        <td class=content width="100"><?php=$idchange?></td> 
			<td class=content width="150"><?php=$atmchk?></td>
			<td class=content width="100"><?php=$summoney?></td>
			<td class=content width="100"><?php=$pay?></td> 			
		</tr>
<?php
}
}
?>		
	</table>

</body>
</html>
