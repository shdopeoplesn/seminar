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
		
         
			<td align="center" width="130" class=title>最佳論文審查結果</td>
            	<td align="center" width="130" class=title>最佳論文審查總分</td>					
			<td align="center" width="75" class=title>評審1</td>
			<td align="center" width="45" class=title>狀態1</td>
			<td align="center" width="75" class=title>評審2</td>
			<td align="center" width="45" class=title>狀態2</td>
		<!--	<td align="center" width="70"  class=title>詳細資料</td>-->
			<td align="center" width="70"  class=title>設定</td>
		</tr>
          <tr>
              <td colspan="7" background="table_line.gif" height="1"></td>
          </tr>
<?php
$str = "select category from session where session_id='$id'";
$list = mysql_query($str,$link);
list($category) = mysql_fetch_row($list);


$str = "select serial,papername,papernumber,bestreviewer1,bestreviewer2,accept,notify,excellent,bestpaper  from papers where category='$category' and excellent='1' order by papernumber ";
$list = mysql_query($str,$link);
while(list($serial,$papername,$papernumber,$bestreviewer1,$bestreviewer2,$accept,$notify,$excellent,$bestpaper) = mysql_fetch_row($list))
{

$straa="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15 from bestreviewer where id='$bestreviewer1'";
$listaa=mysql_query($straa,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15)=mysql_fetch_row($listaa);

if ($papernumber==$paperno1){$a=$recommend1;$chk_state=$chk_state1;}
if ($papernumber==$paperno2){$a=$recommend2;$chk_state=$chk_state2;}
if ($papernumber==$paperno3){$a=$recommend3;$chk_state=$chk_state3;}
if ($papernumber==$paperno4){$a=$recommend4;$chk_state=$chk_state4;}
if ($papernumber==$paperno5){$a=$recommend5;$chk_state=$chk_state5;}

if ($papernumber==$paperno11){$a=$recommend11;$chk_state=$chk_state11;}
if ($papernumber==$paperno12){$a=$recommend12;$chk_state=$chk_state12;}
if ($papernumber==$paperno13){$a=$recommend13;$chk_state=$chk_state13;}
if ($papernumber==$paperno14){$a=$recommend14;$chk_state=$chk_state14;}
if ($papernumber==$paperno15){$a=$recommend15;$chk_state=$chk_state15;}

if ($papernumber==$paperno6){$a=$recommend6;$chk_state=$chk_state6;}
if ($papernumber==$paperno7){$a=$recommend7;$chk_state=$chk_state7;}
if ($papernumber==$paperno8){$a=$recommend8;$chk_state=$chk_state8;}
if ($papernumber==$paperno9){$a=$recommend9;$chk_state=$chk_state9;}
if ($papernumber==$paperno10){$a=$recommend10;$chk_state=$chk_state10;}

if ($chk_state=="1"){$chk_state="已評";$set_flagX="1";}else{$chk_state="未評";$set_flag="0";}



$strbb="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15 from bestreviewer where id='$bestreviewer2'  ";
$listbb=mysql_query($strbb,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15)=mysql_fetch_row($listbb);

if ($papernumber==$paperno1){$b=$recommend1;$chk_state1=$chk_state1;}
if ($papernumber==$paperno2){$b=$recommend2;$chk_state1=$chk_state2;}
if ($papernumber==$paperno3){$b=$recommend3;$chk_state1=$chk_state3;}
if ($papernumber==$paperno4){$b=$recommend4;$chk_state1=$chk_state4;}
if ($papernumber==$paperno5){$b=$recommend5;$chk_state1=$chk_state5;}

if ($papernumber==$paperno11){$b=$recommend11;$chk_state1=$chk_state11;}
if ($papernumber==$paperno12){$b=$recommend12;$chk_state1=$chk_state12;}
if ($papernumber==$paperno13){$b=$recommend13;$chk_state1=$chk_state13;}
if ($papernumber==$paperno14){$b=$recommend14;$chk_state1=$chk_state14;}
if ($papernumber==$paperno15){$b=$recommend15;$chk_state1=$chk_state15;}

if ($papernumber==$paperno6){$b=$recommend6;$chk_state1=$chk_state6;}
if ($papernumber==$paperno7){$b=$recommend7;$chk_state1=$chk_state7;}
if ($papernumber==$paperno8){$b=$recommend8;$chk_state1=$chk_state8;}
if ($papernumber==$paperno9){$b=$recommend9;$chk_state1=$chk_state9;}
if ($papernumber==$paperno10){$b=$recommend10;$chk_state1=$chk_state10;}

if ($chk_state1=="1"){$chk_state1="已評";if ($set_flagX=="1"){$set_flag="1";}}else{$chk_state1="未評";}



$re1=substr($bestreviewer1,5,3);
if ($re1=="000"){$bestreviewer1="無";}
$re2=substr($bestreviewer2,5,3);
if ($re2=="000"){$bestreviewer2="無";}
if ($bestreviewer1==""){$bestreviewer1="未指定";}
if ($bestreviewer2==""){$bestreviewer2="未指定";}
$set_flag="1";
if ($accept=="2"){$accept="口頭";}
if ($accept=="1"){$accept="壁報";}
if ($accept=="0"){$accept="拒絕";}
if ($bestpaper=="1"){$bestpaper="是";}
if ($bestpaper=="0"){$bestpaper="否";}
if ($notify=="0"){$notify="未審查";
$accept="未審查";
$excellent="未審查";
}
if ($notify=="1"){$notify="已審查";$set_flag="0";}



?>
		<tr onmouseover="this.style.backgroundColor='#F0F7DD';" onmouseout="this.style.backgroundColor='';">
			<td class=content align="center"><?php=$papernumber?></td>
			<td class=content align="center"><?php=$bestpaper?></td>
			<td class=content align="center"><?php=$a+$b ?></td>				
			<td class=content width="80" align="center"><?php=$bestreviewer1?></td>
			<td class=content width="50" align="center"><?php=$chk_state?></td>
			<td class=content width="80" align="center"><?php=$bestreviewer2?></td>
			<td class=content width="50" align="center"><?php=$chk_state1?></td>
			<!--<td width="80" class=content align="center"><a href="root_viewer.php?serial=<?php//=$serial?>"><img src="images/view.gif" border="0"></a></td>-->
			
			<td width="80" class=content align="center"><a href="<?php  if ($bestpaper=="") { echo"bestpaper_set.php?serial=$serial";} 
			if ($bestpaper=="是" or $bestpaper=="否") { echo"bestpaper_show.php?serial=$serial";} ?>">   進入</a></td>			
			
		</tr>
          <tr>
              <td colspan="7" background="table_line.gif" height="1"></td>
          </tr>
<?php
}
?>
	</table>
</div>
