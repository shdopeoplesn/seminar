<?php
require "../db.php";

//-------------------計算投稿總筆數------------
$str="select count(traffic) from on_line where traffic = '自行開車'";
$list=mysql_query($str,$link);
list($disscuss_count)=mysql_fetch_row($list);


//-------------------抓取頁數------------------
$read_num="15";
$all_page=ceil($disscuss_count/$read_num);
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
 .content1
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 18pt;
   }
 .content
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 18pt;
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
<table border="0" width="600" id="table1" cellspacing="0">
	<tr>
		<td align="right"><font color="#FF8409">開車人數：<?php=$disscuss_count?>人</font></td>
	</tr>
</table>
<table width="600">
<tr>
  <td width="107" class=title>姓名</td>
  <td width="166" class=title><a href="guard.php?sort=unit">單位</a></td>
  <td width="103" class=title>職稱</td>
  <td width="130" class=title>電話</td>
  <td width="82" class=title>車號</td>
</tr>
<tr>
   <td colspan="5" background="table_line.gif" height="1"></td>
</tr>
<?php

//--------抓取投稿筆數分析------------
if(empty($page_num))$page_num="1";
$start_num=$read_num*($page_num-1);

if(empty($sort))$sort="sn";
$str = "select name,unit,career,tel,plate from on_line where traffic ='自行開車' order by $sort";
$list = mysql_query($str,$link);
while(list($name,$unit,$career,$tel,$plate) = mysql_fetch_row($list))
 {
   if(!empty($plate))
   {
     echo "<tr>
             <td class=content>".$name."</td>
             <td class=content1>".$unit."</td>
             <td class=content>".$career."</td>
             <td class=content1>".$tel."</td>
             <td class=content>".$plate."</td>
           </tr>
          <tr>
              <td colspan=\"5\" background=\"table_line.gif\" height=\"1\"></td>
          </tr>";
   }
 }
?>
<tr>
  <td colspan="5"  class=content>　</td>
</tr>
<tr>
  <td colspan="5"  class=content><a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a></td>
</tr>
</table>
<br>
<table>
 <tr>
<?php
/*
//------------------上、下頁----------------------------
if($page_num>1)
{
   $pre=$page_num-1;
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='guard.php?page_num=$pre&sort=$sort';\" class=up_next>上一頁</td>\n";
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
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='guard.php?page_num=$next&sort=$sort';\" class=up_next>下一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
*/
?>
</tr>
</table>
</div>