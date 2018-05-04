<?php
require "../db.php";

//-------------------計算報名總筆數------------
$str="select count(*) from on_line";
$list=mysql_query($str,$link);
list($disscuss_count)=mysql_fetch_row($list);

//-------------------抓取頁數------------------
$read_num="15";
$all_page=ceil($disscuss_count/$read_num);
?>

 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 220, 255);
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
 .content1
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
 .up_next 
   { 
     color: rgb(51, 51, 255);
     font-size: 10pt;
     text-align:center;
   }
 </style>


<div align="center">
<table border="0" width="700" id="table1" cellspacing="0">
	<tr>
		<td align="right" class=contnet><font color="#FF8409">報名總人數：<?php=$disscuss_count?>人</font></td>
	</tr>
</table>
<table width="770">
<tr>
  <td width="81" class=title>姓名</td>
  <td width="164" class=title>email</td>
  <td width="174" class=title><a href="on_line.php?sort=unit">單位</a></td>
  <td width="83" class=title>職稱</td>
  <td width="113" class=title>電話</td>
  <td width="51" class=title>用餐</td>
  <td width="72" class=title>交通</td>
</tr>

<?php
//--------抓取投稿筆數分析------------
if(empty($page_num))$page_num="1";
$start_num=$read_num*($page_num-1);

if(empty($sort))$sort="sn";
$str = "select name,unit,career,email,tel,eat,traffic,report,pubish,papername,category from on_line order by $sort limit $start_num,$read_num";
$list = mysql_query($str,$link);
while(list($name,$unit,$career,$email,$tel,$eat,$traffic,$report,$pubish,$papername,$category) = mysql_fetch_row($list))
 {
   echo "<tr>
           <td class=content>".$name."</td>
           <td class=content1>".$email."</td>
           <td class=content1>".$unit."</td>
           <td class=content>".$career."</td>
           <td class=content>".$tel."</td>
           <td class=content>".$eat."</td>
           <td class=content>".$traffic."</td>
         </tr>";
   if($report == "是")
    {
         echo "<tr>
                 <td width=\"125\" class=title>報告者</td>
                 <td width=\"125\" class=title>報名方式</td>
                 <td width=\"125\" class=title>投稿類別</td>
                 <td width=\"125\" class=title colspan=\"5\">論文名稱</td>
               </tr>
               <tr>
                 <td class=content>".$report."</td>
                 <td class=content>".$pubish."</td>
                 <td class=content1>".$category."</td>
                 <td class=content1 colspan=\"4\">".$papername."</td>
               </tr> ";
    }
  echo"  <tr>
            <td colspan=\"7\" background=\"table_line.gif\" height=\"1\"></td>
         </tr>";
 }
?>
</table>
</div>
<br>
<div align="center">
<table>
 <tr>
<?php
//------------------上、下頁----------------------------
if($page_num>1)
{
   $pre=$page_num-1;
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='on_line.php?page_num=$pre&sort=$sort';\" class=up_next>上一頁</td>\n";
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
   echo "			<td width=\"50\" style=\"padding:2 0 0 5;cursor:hand;\" onmouseover=\"this.style.color='#FF0000';\" onmouseout=\"this.style.color='';\" onclick=\"location.href='on_line.php?page_num=$next&sort=$sort';\" class=up_next>下一頁</td>\n";
}
else
{
   echo "			<td width=\"50\">     </td>\n";
}
?>
</tr>
</table>

</div>


</html>