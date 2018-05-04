<?php
require "../db.php";


?>

<style type="text/css">
  .title 
   { 
     background-color: rgb(235, 255, 165);
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
<table width="700">
<tr>
  <td width="100" class=title>姓名</td>
  <td width="150" class=title>email</td>
  <td width="130" class=title>單位</td>
  <td width="70" class=title>職稱</td>
  <td width="100" class=title>電話</td>
  <td width="100" class=title>車號</td>
</tr>
<?php
//-------------------計算投稿總筆數------------
$str="select count(traffic) from on_line where traffic ='自行開車'";
$list=mysql_query($str,$link);
list($disscuss_count)=mysql_fetch_row($list);

//-------------------抓取頁數------------------
$read_num="15";
$all_page=ceil($disscuss_count/$read_num);


//--------抓取投稿筆數分析------------
if(empty($page_num))$page_num="1";
$start_num=$read_num*($page_num-1);

$str = "select name,unit,career,email,tel,plate from on_line where traffic ='自行開車' limit $start_num,$read_num";
$list = mysql_query($str,$link);
while(list($name,$unit,$career,$email,$tel,$plate) = mysql_fetch_row($list))
 {
     echo "<tr>
             <td class=content>".$name."</td>
             <td class=content>".$email."</td>
             <td class=content>".$unit."</td>
             <td class=content>".$career."</td>
             <td class=content>".$tel."</td>
             <td class=content>".$plate."</td>
           </tr>";

 }
?>
<tr>
  <td colspan="5"  class=content>&nbsp;</td>
</tr>
<tr>
  <td colspan="5"  class=content><a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a></td>
</tr>
</table>
<br>
<table>
 <tr>
<?php
//------------------上、下頁----------------------------
if($page_num>1)
{
   $pre=$page_num-1;
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='guard.php?page_num=$pre';\" class=up_next>上一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
?>
			<td width="35" class=up_next><?php echo $page_num; ?> / <?phpecho $all_page;?></td>
<?php
if($page_num<$all_page)
{
   $next=$page_num+1;
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='guard.php?page_num=$next';\" class=up_next>下一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
?>
</tr>
</table>
</div>