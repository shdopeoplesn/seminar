<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

//if ($id!="payment"){
//session_destroy();
//header("location:login.php");
//exit;
//}

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
<form action="payment_insert.php" method="post" name="payment_insert" >
<div align="center">
	<table border="0"  cellspacing="1" cellpadding="0">
	    <tr>
			<td width="70" class=content></td>
			<td width="70" class=content></td>
			<td width="70" class=content></td>
			<td width="150" class=content></td>
		  <td width="70"  class=content>&nbsp;</td>
		  <td width="70"  class=content>&nbsp;</td>
		  <td width="70" align="right"   class=content><input name="submit" type="submit" value="儲存"></td>
	    </tr>
		<tr>
			<td width="70" class=title>會員編號</td>
			<td width="70" class=title>會員姓名</td>
			<td width="70" class=title>是否繳費</td>
			<td class=title width="150">進帳時間</td>
			<td class=title width="70">應繳金額</td>
		    <td class=title width="70">已繳金額</td>
		    <td class=title width="70">未收金額</td>
		</tr>
<?php
$str = "select id,money,incomemoney,incometime from register";
$list =mysql_query($str,$link);
while(list($id,$money,$incomemoney,$incometime) = mysql_fetch_row($list))
{
$str2 = "select name from members where id='$id'";
$list2 =mysql_query($str2,$link);
list($name) = mysql_fetch_row($list2);

if ($incomemoney==0)
{$incomeshow="未繳費";}
if ($money==$incomemoney)
{$incomeshow="已繳清";}
if (($money>$incomemoney) and ($incomemoney>0))
{$incomeshow="未繳清";}

$incometimeseld[$incometime]="selected";

?>
		<tr>
			<td width="70" class=content><?php=$id?></td>
			<td width="70" class=content><?php=$name?></td>
		    <td width="70" class=content><?php=$incomeshow?></td>
	        <td class=choose width="150">5月
			<select name="timesn[]"  <?php if($money==$incomemoney){ ?> style="display:none" <?php }?> >		 			 	
            <option></option>
			<?php			
			for($i=1 ; $i<32 ; $i++)
               {
	             echo "<option value=\"$i\"$incometimeseld[$i]>$i</option>\n"; 				
               }
            ?>                                   
              </select>
			<?php			
            if($money==$incomemoney){             
                 echo $incometime; 			 
				 }
				 
				 ?> 			
        	日</td> 
			<td width="70" class=content><?php=$money?></td>
		    <td width="70" class=content>
			<input  type="text"  name="moneysn[]"  <?php if($money==$incomemoney){ ?> 
			 style="display:none"    <?php } ?> value= <?php=$incomemoney?>  >
			 <?php if($money==$incomemoney){ echo $incomemoney; }?> 			 
			  </td>
			<td width="70" class=content><?php=$money-$incomemoney?></td>
		</tr>
<?php
$incometimeseld[$incometime]="";
}
?>
	</table>
</div>
</form>
</body>
</html>
