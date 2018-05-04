<?php
require "../db.php";


//-------------------計算投稿總筆數------------
$str="select count(*) from register ";
$list=mysql_query($str,$link);
list($disscuss_count)=mysql_fetch_row($list);

//-------------------抓取頁數------------------
$read_num="10";
$all_page=ceil($disscuss_count/$read_num);
?>

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
     text-align:center;
   }
 .up_next 
   { 
     color: rgb(51, 51, 255);
     font-size: 10pt;
     text-align:center;
   }

 </style>

<div align="center">
<table>
 <tr>
    <td width="70" class=title>ID</td>
    <td width="180" class=title>姓名</td>
    <td width="110" class=title>Email</td>
    <td width="70" class=title>列印</td>
 </tr>
<?php

//--------抓取投稿筆數分析------------
if(empty($page_num))$page_num="1";
$start_num=$read_num*($page_num-1);

$str = "select id from register order by id limit $start_num,$read_num ";
$list = mysql_query($str,$link);
while(list($id) = mysql_fetch_row($list))
 {
 
$stra = "select name,email from members where id='$id'";
$lista = mysql_query($stra,$link);
list($name,$email) = mysql_fetch_row($lista);
 
 
   echo " <tr>
             <td class=content>".$id."</td>
             <td class=content>".$name."</td>
             <td class=content>".$email."</td>
             <td class=content ><a href=\"account.php?id=$id\" target=\"_blank\"   ><img src=\"images/view.gif\" border=\"0\"></a></td>
          </tr> ";
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
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='account_in.php?page_num=$pre';\" class=up_next>上一頁</td>\n";
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
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='account_in.php?page_num=$next';\" class=up_next>下一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
?>
</tr>
</table>
</div>


