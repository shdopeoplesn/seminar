<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

$chk_id=strtoupper(substr($id,0,7));
if ($chk_id!="ILT2011"){
session_destroy();
header("location:login.php");
exit;
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
<form action="bestreviewer_update.php" method="post" name="bestreviewer_update" >
<div align="center">
	<table border="0" width="650" cellspacing="1" cellpadding="0">
		<tr>
			<td class=title>編號</td>
			<td class=title>論文名稱</td>
			<td class=title width="90">評審1</td>
			<td class=title width="90">評審2</td>
		</tr>
<?php
$str = "Select category,abbr From session where session_id='$id'";
$list = mysql_query($str,$link);
list($category,$abbr) = mysql_fetch_row($list);


$str="select papernumber,papername,bestreviewer1,bestreviewer2 from papers where category='$category' and excellent!='0' order by papernumber ";
$list =mysql_query($str,$link);
while(list($papernumber,$papername,$bestreviewer1,$bestreviewer2) = mysql_fetch_row($list))
{



$reviewer1_sn="";

$reviewer1_temp=substr($bestreviewer1,5,3);

if ($reviewer1_temp>="100" and $reviewer1_temp<"1000"){$reviewer1_sn=$reviewer1_sn.$reviewer1_temp;}

if ($reviewer1_temp>="10" and $reviewer1_temp<"100"){$reviewer1_temp=substr($bestreviewer1,6,2);

$reviewer1_sn=$reviewer1_sn.$reviewer1_temp;}

if ($reviewer1_temp>="0" and $reviewer1_temp<"10"){$reviewer1_temp=substr($bestreviewer1,7,1);

$reviewer1_sn=$reviewer1_sn.$reviewer1_temp;}

//例外狀況
if(substr($bestreviewer1,0,4) == "3CBR")
{

$reviewer1_temp=substr($bestreviewer1,4,3);

$reviewer1_sn="";

if ($reviewer1_temp>="100" and $reviewer1_temp<"1000"){$reviewer1_sn=$reviewer1_sn.$reviewer1_temp;}

if ($reviewer1_temp>="10" and $reviewer1_temp<"100"){
	
$reviewer1_temp=substr($bestreviewer1,5,2);

$reviewer1_sn=$reviewer1_sn.$reviewer1_temp;}

if ($reviewer1_temp>="0" and $reviewer1_temp<"10"){$reviewer1_temp=substr($bestreviewer1,6,1);

$reviewer1_sn=$reviewer1_sn.$reviewer1_temp;}


}









$reviewer2_sn="";


$reviewer1_temp=substr($bestreviewer2,5,3);


if ($reviewer1_temp>=100 and $reviewer1_temp<1000){$reviewer2_sn=$reviewer2_sn.$reviewer1_temp;}


if ($reviewer1_temp>=10 and $reviewer1_temp<100){$reviewer1_temp=substr($bestreviewer2,6,2);


$reviewer2_sn=$reviewer2_sn.$reviewer1_temp;}


if ($reviewer1_temp>=0 and $reviewer1_temp<10){$reviewer1_temp=substr($bestreviewer2,7,1);


$reviewer2_sn=$reviewer2_sn.$reviewer1_temp;}





//例外狀況
if(substr($bestreviewer2,0,4) == "3CBR")
{

$reviewer1_temp=substr($bestreviewer1,4,3);

$reviewer2_sn="";

if ($reviewer1_temp>="100" and $reviewer1_temp<"1000"){$reviewer2_sn=$reviewer2_sn.$reviewer1_temp;}

if ($reviewer1_temp>="10" and $reviewer1_temp<"100"){$reviewer1_temp=substr($bestreviewer2,5,2);

$reviewer2_sn=$reviewer2_sn.$reviewer1_temp;}

if ($reviewer1_temp>="0" and $reviewer1_temp<"10"){$reviewer1_temp=substr($bestreviewer2,6,1);


$reviewer2_sn=$reviewer2_sn.$reviewer1_temp;}

}



//評審1

$reviewerseld[$reviewer1_sn]="selected";

//評審2

$reviewerseld1[$reviewer2_sn]="selected";
?>

<?php


?>

		<tr><input type="hidden" name="papersn[]" value="<?php=$papersn?>">


			<td class=content><?php=$papernumber?></td>
			<td class=content><?php=$papername?></td>

          <td class=content width="90">
		    <select size="1" name="reviewer_sn[]"  <?php if($bestreviewer1!=""){ ?> style="display:none" <?php }?>  >
            <option value="0">尚未指定</option>
            
			<?php
//	$result=mysql_query("Select * from reviewer where id like '$abbr%'");
//	$category_count=mysql_num_rows($result)+1;
	$sn=0;
   $stra="select name  from bestreviewer where id like '$abbr%' order by id";
   $lista =mysql_query($stra,$link);
   while(list($id) = mysql_fetch_row($lista))
   { 
   $sn=$sn+1;
   echo "			<option value=\"$sn\" $reviewerseld[$sn]>$id</option>\n"; 
   $reviewer1_sn="";
   }
?>
          </select>
<?php
 if($bestreviewer1!=""){ 
   $stra="select name  from bestreviewer where id='$bestreviewer1' ";
   $lista =mysql_query($stra,$link);
   while(list($name) = mysql_fetch_row($lista))
 echo $name; } ?> 

		  </td>
			<td class=content width="90">
			<select size="1" name="reviewer_sn1[]" <?php if($bestreviewer2!=""){ ?> style="display:none" <?php } ?> >
			<option value="0">尚未指定</option>
<?php
$sn1=0;
   $stra="select name  from bestreviewer where id like '$abbr%' order by id";
   $lista =mysql_query($stra,$link);
   while(list($id1) = mysql_fetch_row($lista))
   { 
   $sn1=$sn1+1;
   echo "			<option value=\"$sn1\" $reviewerseld1[$sn1]>$id1</option>\n"; 
   $reviewer2_sn="";
   }
?>
	</select>
    
<?php
 if($bestreviewer2!=""){ 
   $stra="select name  from bestreviewer where id='$bestreviewer2' ";
   $lista =mysql_query($stra,$link);
   while(list($name) = mysql_fetch_row($lista))
 echo $name;} ?> 
 
			</td>
		</tr>
<?php
unset($reviewerseld1);
unset($reviewerseld);
$i++;
}

?>

 
		<tr>
			<td class=content></td>
			<td class=content></td>
			<td class=content></td>
			<td class=content width="90"><input type="submit" value="更新評審"></td>
		</tr>
      
	</table>
</div>
</form>
</body>
</html>