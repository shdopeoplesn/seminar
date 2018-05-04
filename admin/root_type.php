<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

$chk_id=strtoupper(substr($id,0,7));
if ($chk_id!="ILT2018"){
session_destroy();
header("location:login.php");
exit;
}
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");
?>

 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 17pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
 </style>

<div align="center">
	<table border="0" width="740">
          <tr>
              <td colspan="7" background="table_line.gif" height="1"></td>
          </tr>
		<tr>
			<td align="center" width="50" class=title>編號</td>
			<td align="center" width="80" class=title>審查狀況</td>
			<td align="center" width="80" class=title>審查結果</td>
			<td align="center" width="120" class=title>是否為優良論文</td>			
			<td align="center" width="75" class=title>評審1</td>
			<td align="center" width="45" class=title>狀態1</td>
			<td align="center" width="75" class=title>評審2</td>
			<td align="center" width="45" class=title>狀態2</td>
			<td align="center" width="70"  class=title>詳細資料</td>
			<td align="center" width="70"  class=title>設定</td>
		</tr>
          <tr>
              <td colspan="7" background="table_line.gif" height="1"></td>
          </tr>
<?php
$str = "select category from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category) = mysql_fetch_row($list);


$str = "select serial,papername,papernumber,reviewer1,reviewer2,accept,notify,excellent  from papers where category='$category' order by papernumber ";
$list = mysql_query($str,$link);
while(list($serial,$papername,$papernumber,$reviewer1,$reviewer2,$accept,$notify,$excellent) = mysql_fetch_row($list))
{

$straa="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from reviewer where id='$reviewer1'";
$listaa=mysql_query($straa,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15)=mysql_fetch_row($listaa);

if ($papernumber==$paperno1){$chk_state=$chk_state1;}
if ($papernumber==$paperno2){$chk_state=$chk_state2;}
if ($papernumber==$paperno3){$chk_state=$chk_state3;}
if ($papernumber==$paperno4){$chk_state=$chk_state4;}
if ($papernumber==$paperno5){$chk_state=$chk_state5;}

if ($papernumber==$paperno11){$chk_state=$chk_state11;}
if ($papernumber==$paperno12){$chk_state=$chk_state12;}
if ($papernumber==$paperno13){$chk_state=$chk_state13;}
if ($papernumber==$paperno14){$chk_state=$chk_state14;}
if ($papernumber==$paperno15){$chk_state=$chk_state15;}

if ($papernumber==$paperno6){$chk_state=$chk_state6;}
if ($papernumber==$paperno7){$chk_state=$chk_state7;}
if ($papernumber==$paperno8){$chk_state=$chk_state8;}
if ($papernumber==$paperno9){$chk_state=$chk_state9;}
if ($papernumber==$paperno10){$chk_state=$chk_state10;}

if ($chk_state=="1"){$chk_state="已評";$set_flagX="1";}else{$chk_state="未評";$set_flag="0";}


$strbb="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from reviewer where id='$reviewer2'  ";
$listbb=mysql_query($strbb,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15)=mysql_fetch_row($listbb);

if ($papernumber==$paperno1){$chk_state1=$chk_state1;}
if ($papernumber==$paperno2){$chk_state1=$chk_state2;}
if ($papernumber==$paperno3){$chk_state1=$chk_state3;}
if ($papernumber==$paperno4){$chk_state1=$chk_state4;}
if ($papernumber==$paperno5){$chk_state1=$chk_state5;}

if ($papernumber==$paperno11){$chk_state1=$chk_state11;}
if ($papernumber==$paperno12){$chk_state1=$chk_state12;}
if ($papernumber==$paperno13){$chk_state1=$chk_state13;}
if ($papernumber==$paperno14){$chk_state1=$chk_state14;}
if ($papernumber==$paperno15){$chk_state1=$chk_state15;}

if ($papernumber==$paperno6){$chk_state1=$chk_state6;}
if ($papernumber==$paperno7){$chk_state1=$chk_state7;}
if ($papernumber==$paperno8){$chk_state1=$chk_state8;}
if ($papernumber==$paperno9){$chk_state1=$chk_state9;}
if ($papernumber==$paperno10){$chk_state1=$chk_state10;}

if ($chk_state1=="1"){$chk_state1="已評";if ($set_flagX=="1"){$set_flag="1";}}else{$chk_state1="未評";}

$re1=substr($reviewer1,4,3);
if ($re1=="000"){$reviewer1="無";}
$re2=substr($reviewer2,4,3);
if ($re2=="000"){$reviewer2="無";}
if ($reviewer1==""){$reviewer1="未指定";}
if ($reviewer2==""){$reviewer2="未指定";}
$set_flag="1";
if ($accept=="2"){$accept="口頭";}
if ($accept=="1"){$accept="壁報";}
if ($accept=="0"){$accept="拒絕";}
if ($excellent=="1"){$excellent="是";}
if ($excellent=="0"){$excellent="否";}
if ($notify=="0"){$notify="未審查";
$accept="未審查";
$excellent="未審查";
}
if ($notify=="1"){$notify="已審查";$set_flag="0";}



?>
		<tr onmouseover="this.style.backgroundColor='#F0F7DD';" onmouseout="this.style.backgroundColor='';">
			<td class=content align="center"><?php=$papernumber?></td>
			<td class=content align="center"><?php=$notify?></td>
			<td class=content align="center"><?php=$accept?></td>
			<td class=content align="center"><?php=$excellent?></td>						
			<td class=content width="80" align="center"><?php=$reviewer1?></td>
			<td class=content width="50" align="center"><?php=$chk_state?></td>
			<td class=content width="80" align="center"><?php=$reviewer2?></td>
			<td class=content width="50" align="center"><?php=$chk_state1?></td>
			<td width="80" class=content align="center"><a href="root_viewer.php?serial=<?php=$serial?>"><img src="images/view.gif" border="0"></a></td>
			
			<td width="80" class=content align="center"><a href="<?php  if ($set_flag=="1") { echo"paper_set.php?serial=$serial";} 
			if ($set_flag=="0") { echo"paper_show.php?serial=$serial";} ?>">   進入</a></td>			
			
		</tr>
          <tr>
              <td colspan="7" background="table_line.gif" height="1"></td>
          </tr>
<?php
}
?>
	</table>
</div>
