<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";


$str = "select abbr from session where session_id='$id'";
$list = mysql_query($str,$link);
list($abbr) = mysql_fetch_row($list);




   $sn=0;
   $stra="select id from bestreviewer where id like '$abbr%'order by id ";
   $lista =mysql_query($stra,$link);
   while(list($id) = mysql_fetch_row($lista))
   { 
   $sn=$sn+1;
   $element[$sn]=0;
   }

$counts=count($papersn);
$error=0;
$show="";

for($i=0 ; $i<$counts ; $i++)
{
	$sn=1;
	if ($reviewer_sn[$i]==$reviewer_sn1[$i] and $reviewer_sn[$i]!=0){
	
	   $stra="select name from bestreviewer where id like '$abbr%' order by id ";
	   $lista =mysql_query($stra,$link);
	   while(list($name) = mysql_fetch_row($lista))
	   { 
	   		if($reviewer_sn[$i]==$sn){
				if ($reply[$sn]!="1"){
				$show.=$name."的審查論文重複，請重新設定!<br>";}
				$error=1;
				$reply[$sn]="1";
			}
	     $sn=$sn+1; 
		}
	
	
		//header("location:happy.php?act=repeat_error");
		//exit;
	}
}

//技術審查人物審稿數
$counts=count($papersn);
for($i=0 ; $i<$counts ; $i++)
{
$element[$reviewer_sn[$i]]=$element[$reviewer_sn[$i]]+1;
$element[$reviewer_sn1[$i]]=$element[$reviewer_sn1[$i]]+1;
}

   $sn=0;
   $stra="select name from bestreviewer where id like '$abbr%' order by id ";
   $lista =mysql_query($stra,$link);
   while(list($name) = mysql_fetch_row($lista))
   { 
	   $sn=$sn+1;
	   if ($element[$sn]>15) {
   			$error=1;
		    $show.=$name."的審查篇數已超過15篇，請重新設定、或是重新申請一組新帳號給予審稿者<br>";
	   }
   }
   
   if ($error==1){
?>
<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
 .title 
 { 
   color: rgb(0, 0, 173);
   font-size: 10pt;
   letter-spacing:2px;
   line-height:15pt;
 }
</style>

   <br>
<div align="center">
<table class=title cellspacing="1" width="320" cellpadding="2">
<tr>
   <td width="320" bgcolor="#FFCCFF">
	<p align="center">系統訊息</td>
</tr>
<tr>
   <td class=content><?php=$show?></td>
</tr>                
</table>
</div>
   
   
  <?php 
	exit;
   }
   
   
//更新資料
$id = $_SESSION["adminid"];
$str = "select category,abbr from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category,$abbr) = mysql_fetch_row($list);
$abbr="$abbr"."BR";
$i=0;


	/*除除資料庫
   $empty="";
   $straa="select id from reviewer where id like '$abbr%' ";
   $listaa =mysql_query($straa,$link);
   while(list($re_id) = mysql_fetch_row($listaa))
   { 
		 $strbb="update reviewer set paperno1='$empty',paperno2='$empty',paperno3='$empty',paperno4='$empty',paperno5='$empty' where id='$re_id' ";
	     mysql_query($strbb,$link);   
	 }
	*/



$str="select papernumber from papers where category='$category' and excellent!='0' order by papernumber";
$list =mysql_query($str,$link);
while(list($papernumber) = mysql_fetch_row($list))
{

$num1=$reviewer_sn[$i];
$num2=$reviewer_sn1[$i];

if ($num1<10){$num1="00"."$num1";}
if ($num1<100 and $num1>9){$num1="0"."$num1";}

if ($num2<10){$num2="00"."$num2";}
if ($num2<100 and $num2>9){$num2="0"."$num2";}

$reviewer_select1="$abbr$num1";
$reviewer_select2="$abbr$num2";

if ($num1=="000") {$reviewer_select1="";}
if ($num2=="000") {$reviewer_select2="";}

$str="update papers set bestreviewer1='$reviewer_select1',bestreviewer2='$reviewer_select2' where papernumber='$papernumber' ";
mysql_query($str,$link);

// reviewer1
$stra = "select paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from bestreviewer where id='$reviewer_select1'";
$lista = mysql_query($stra,$link);
list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15) = mysql_fetch_row($lista);

$updata_flag="0";
if ($papernumber==$paperno1 or $papernumber==$paperno2 or $papernumber==$paperno3 or $papernumber==$paperno4 or $papernumber==$paperno5 or $papernumber==$paperno6 or $papernumber==$paperno7 or $papernumber==$paperno8 or $papernumber==$paperno9 or $papernumber==$paperno10 or $papernumber==$paperno11 or $papernumber==$paperno12 or $papernumber==$paperno13 or $papernumber==$paperno14 or $papernumber==$paperno15){
$updata_flag="1";
}

if ($updata_flag=="0"){

if ($paperno1==""){
$strb="update bestreviewer set paperno1='$papernumber' where id='$reviewer_select1' ";
 mysql_query($strb,$link);
}
else
{
	if ($paperno2==""){
	$strc="update bestreviewer set paperno2='$papernumber' where id='$reviewer_select1' ";
	 mysql_query($strc,$link);
	}
	else
	{
		if ($paperno3==""){
		$strd="update bestreviewer set paperno3='$papernumber' where id='$reviewer_select1' ";
		 mysql_query($strd,$link);
		}
		else
		{
			if ($paperno4==""){
			$stre="update bestreviewer set paperno4='$papernumber' where id='$reviewer_select1' ";
			mysql_query($stre,$link);
			}
			else
			{
				if ($paperno5==""){
				$strf="update bestreviewer set paperno5='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}
				else
				{
				if ($paperno6==""){
				$strf="update bestreviewer set paperno6='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}
				else
			    {
				if ($paperno7==""){
				$strf="update bestreviewer set paperno7='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}
			    else
				{
				if ($paperno8==""){
				$strf="update bestreviewer set paperno8='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}
				else
				{
				if ($paperno9==""){
				$strf="update bestreviewer set paperno9='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);}
				else
				{
				if ($paperno10==""){
				$strf="update bestreviewer set paperno10='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}else
				{
				if ($paperno11==""){
				$strf="update bestreviewer set paperno11='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}else
				{
				if ($paperno12==""){
				$strf="update bestreviewer set paperno12='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}else
				{
				if ($paperno13==""){
				$strf="update bestreviewer set paperno13='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}else
				{
				if ($paperno14==""){
				$strf="update bestreviewer set paperno14='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}else
				{
				if ($paperno15==""){
				$strf="update bestreviewer set paperno15='$papernumber' where id='$reviewer_select1' ";
				mysql_query($strf,$link);
				}}}}}}
			}
			}
		}}}}
	}
}
}
}


//reviewer2
$str1 = "select paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from bestreviewer where id='$reviewer_select2'";
$list1 = mysql_query($str1,$link);
list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15) = mysql_fetch_row($list1);

$updata_flag="0";
if ($papernumber==$paperno1 or $papernumber==$paperno2 or $papernumber==$paperno3 or $papernumber==$paperno4 or $papernumber==$paperno5 or $papernumber==$paperno6 or $papernumber==$paperno7 or $papernumber==$paperno8 or $papernumber==$paperno9 or $papernumber==$paperno10 or $papernumber==$paperno11 or $papernumber==$paperno12 or $papernumber==$paperno13 or $papernumber==$paperno14 or $papernumber==$paperno15 ){
$updata_flag="1";
}

if ($updata_flag=="0"){

if ($paperno1==""){
$str2="update bestreviewer set paperno1='$papernumber' where id='$reviewer_select2' ";
 mysql_query($str2,$link);
}
else
{
	if ($paperno2==""){
	$str3="update bestreviewer set paperno2='$papernumber' where id='$reviewer_select2' ";
	 mysql_query($str3,$link);$new="1";$bestrevieweris=$reviewer_select2;
	}
	else
	{
		if ($paperno3==""){
		$str4="update bestreviewer set paperno3='$papernumber' where id='$reviewer_select2' ";
		 mysql_query($str4,$link);
		}
		else
		{
			if ($paperno4==""){
			$str5="update bestreviewer set paperno4='$papernumber' where id='$reviewer_select2' ";
			mysql_query($str5,$link);
			}
			else
			{
				if ($paperno5==""){
				$str6="update bestreviewer set paperno5='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}
				else
			{
				if ($paperno6==""){
				$str6="update bestreviewer set paperno6='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno7==""){
				$str6="update bestreviewer set paperno7='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno8==""){
				$str6="update bestreviewer set paperno8='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno9==""){
				$str6="update bestreviewer set paperno9='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno10==""){
				$str6="update bestreviewer set paperno10='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno11==""){
				$str6="update bestreviewer set paperno11='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno12==""){
				$str6="update bestreviewer set paperno12='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno13==""){
				$str6="update bestreviewer set paperno13='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno14==""){
				$str6="update bestreviewer set paperno14='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}else
			{
				if ($paperno15==""){
				$str6="update bestreviewer set paperno15='$papernumber' where id='$reviewer_select2' ";
				mysql_query($str6,$link);
				}}}}}}
			}
			}
			}
			}
			}
			}
		}
	}
}
}

$i=$i+1;

}

@mysql_close($link);
header("location:happy.php?act=bestreveiwer_update");
?>


