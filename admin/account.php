<?php 
if (session_status() == PHP_SESSION_NONE) {session_start();}
require "../db.php";
$str = "select money from register where id='$id'";
$list = mysql_query($str,$link);
list($money) = mysql_fetch_row($list);
$idchange="1030010".substr($id,3,3);
//echo $idchange;
///number to chinesenumber
$t= strlen($money);
$t2=$t-1;
$count=0;
$chinesemoney="";
$chin="元十佰仟萬";
$chin2="零壹貳參肆伍陸柒捌玖";
$zero=0;
$zerostart=0;
while($count<$t){
   $tt=substr($money,$count,1);
   if ($tt!=0)
     {
      $zero=0;
	  $zerostart=1;
	  if ($count!=($t-1))
       {$chinesemoney=$chinesemoney.substr($chin2,$tt*2,2).substr($chin,$t2*2,2);}
	  if ($count==($t-1))
       {$chinesemoney=$chinesemoney.substr($chin2,$tt*2,2);} 
     }
   else
     {
      if($zero==0 and $zerostart==1)
         {
          $chinesemoney=$chinesemoney."零";
	      $zero=1;
         } 
     }   
   $t2=$t2-1;
   $count=$count+1;
   }

$t= strlen($chinesemoney);
if (substr($chinesemoney,$t-2,2)=="零")
  {$chinesemoney=substr($chinesemoney,0,$t-2);}
  
$str = "select name,unit from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$unit) = mysql_fetch_row($list);
$atm2='62127'.'1030010'.substr($id,3,3);
$wt='135142753869263';
$wt2='13241631';
//echo $atm2;
$sum2=0;
$wtlth=strlen($wt);
for ($loop=0;$loop<$wtlth;$loop++)
  {    
	//echo substr($atm2,$loop,1);
	//echo substr($wt,$loop,1);
	$sum2=$sum2+substr($atm2,$loop,1)*substr($wt,$loop,1);	
  }
$sum3=0;
$moneylth=strlen($money);
$wt2lth=strlen($wt2);
for ($loop=0;$loop<$moneylth;$loop++)
  { 
	//echo substr($money,$loop,1);
	//echo substr($wt2,$loop+$wt2lth-$moneylth,1);
	$sum3=$sum3+substr($money,$loop,1)*substr($wt2,$loop+$wt2lth-$moneylth,1);
  }
$sum4=$sum2+$sum3;
$sumlth=strlen($sum4);
//echo $sum4.'-';
if ($sumlth==1) {$chk=$sum4;}
while ($sumlth!=1)
 { 
  $sum5=0;
  for ($loop=0;$loop<$sumlth;$loop++)
    { 
	 //echo substr($sum4,$loop,1).'-';	 	 
	 $sum5=$sum5+substr($sum4,$loop,1);
    }
   $sumlth=strlen($sum5);
  // echo '-'.$sum5.'-';
   $sum4=$sum5;
   if ($sumlth==1) {$chk=$sum4;}
 }
//echo $chk;
$atmchk=$atm2.$chk;
$atmchk=substr($atmchk,0,4).'-'.substr($atmchk,4,4).'-'.substr($atmchk,8,4).'-'.substr($atmchk,12,4);
//echo $atmchk;
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style type="text/css">
<!--
.col {
	font-size: 14px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
}
.colnoalign {
	font-size: 14px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
}
.col33 {
	font-size: 14px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: left;
}
.colrightdashed {
	font-size: 16px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
	border-right-style: dashed;
}
.col55 {
	font-size: 11px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: left;
	border-right-style: dashed;
}
.col66 {	
	border-top:none;
	border-left:none;	
	border-right: none;	
	border-bottom: none;
}
.col68 {
	font-size: 14px;
	border-top:none;	
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;	
}
.col67 {	
	border-top:none;
	border-left:none;	
	border-right: none;	
	border-bottom-style: dashed;
}
.col77 {
	border-top:none;
	border-left:none;		
	border-right:solid windowtext 1.4pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;	
	border-right-style: dashed;
	border-bottom-style: dashed;
}
.col78 {
	border-bottom:none;
	border-left:none;	
	border-right:none;			
	mso-border-bottom-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-right-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;		
	border-top-style: dashed;
}
.col78bottom {
	border-top:none;
	border-left:none;	
	border-right:none;			
	mso-border-bottom-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-right-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;			
}
.col78bottomdash {
	border-top:none;
	border-left:none;	
	border-right:none;			
	mso-border-bottom-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-right-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	border-bottom-style: dashed;				
}

.col99 {
	font-size: 7px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
}
.colTopPadding {
	font-size: 14px;
	border-top:none;
	border-left:none;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
	padding-top: 5px;
	border-right-style: dashed;
}
.colBottomleftNBCopy {
	font-size: 12px;
	border-top:0;
	border-left:0;	
	border-right-style: dashed;	
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
	
}
.colUpNB {
	font-size: 12px;
	border-top:0;
	border-left:0;
	
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
	border-right: 0;
}
.colUpNBleft {
	font-size: 12px;
	border-top:0;
	border-left:0;
	
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
}
.colBottomNBCopy {
	font-size: 12px;
	border-top:0;
	border-left:0;
	border-right:0;
	border-bottom: 0;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;	
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
	
}
.colBottomRightNBCopy {
	font-size: 12px;
	border-top:0;
	border-left:0;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;	
	border-right: 0;
}

.colUpRightNBCopy {
	font-size: 12px;
	border-top:0;
	border-left:0;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
}
.colUpNB1 {
	font-size: 12px;
	border-top:0;
	border-left:0;
	border-right:0;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	padding-left: 20px;	
}
/*
.col {
	font-size: 11px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
}
*/
.style1 {
	font-size: 11px;
	border-top-width: 0px;
	border-left-width: 0px;
}
.style2 {font-size: x-small}
.col14 {
	
	border-top:none;	
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
	border-left:1;
	border-left-style: dashed;
}

.style11 {font-size: 14px}
.style14 {font-size: 12px}
.col88 {
	border-left-style: dashed;
}
.style17 {border-top: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; text-align: center; border-left: 1; border-left-style: dashed; font-size: 12px; }
.style18 {border-top: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; text-align: center; border-left: 1; border-left-style: dashed; font-size: 12px; }
.style19 {border-top: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; text-align: center; border-left: 1; border-left-style: dashed; font-size: 14px; }
.style20 {
	font-size: 24px;
	font-weight: bold;
}
.style21 {font-size: 16px}
.col1 {	font-size: 14px;
	border-top:none;
	border-left:0;
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;
	text-align: center;
}
.clearbottom{
    border-bottom:none;
}
.clearbottomtop{
    border-bottom:none;
	border-top:none;
}
.cleartop{    
	border-top:none;
}
.style22 {
font-size: 16px;
color: #FF0000}
.col681 {	font-size: 14px;
	border-top:none;	
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;	
}
.col682 {	font-size: 14px;
	border-top:none;	
	border-bottom:solid windowtext 1.0pt;
	border-right:solid windowtext 1.0pt;
	mso-border-top-alt:solid windowtext .5pt;
	mso-border-left-alt:solid windowtext .5pt;
	mso-border-alt:solid windowtext .5pt;	
}
-->
</style>
</head>

<body>
<?php $str = "select reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,receipt1,receipt2,receipt3,receipt4,receipt5,receipt6,uniformno1,uniformno2,uniformno3,uniformno4,uniformno5,uniformno6 from register where id='$id'";
$list = mysql_query($str,$link);
list($reportman1,$reportman2,$reportman3,$reportman4,$reportman5,$reportman6,$receipt1,$receipt2,$receipt3,$receipt4,$receipt5,$receipt6,$uniformno1,$uniformno2,$uniformno3,$uniformno4,$uniformno5,$uniformno6 ) = mysql_fetch_row($list);
 $i="0";
 $str = "select accept from papers where id='$id' ";
   $list = mysql_query($str,$link);
   while(list($accept) = mysql_fetch_row($list))
    {
     if ($accept!=0)
	 { 
	   $i=$i+1;
	   if ($i==1){$reportman=$reportman1;$receipt=$receipt1;$uniformno=$uniformno1;}
	   if ($i==2){$reportman=$reportman2;$receipt=$receipt2;$uniformno=$uniformno2;}
	   if ($i==3){$reportman=$reportman3;$receipt=$receipt3;$uniformno=$uniformno3;}
	   if ($i==4){$reportman=$reportman4;$receipt=$receipt4;$uniformno=$uniformno4;}
	   if ($i==5){$reportman=$reportman5;$receipt=$receipt5;$uniformno=$uniformno5;}
	   if ($i==6){$reportman=$reportman6;$receipt=$receipt6;$uniformno=$uniformno6;}
      
?>

<table  border="1" class="col78bottomdash" cellspacing="0"  bordercolor="#000000">

  <tr align="center">
    <td colspan="9" align="right" class="col78bottom"><strong>國立勤益科技大學</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>自行收納統一收據</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;會員收執聯</td>
  </tr>
  
  <tr>
    <td colspan="5" align="center" class="col68">轉&nbsp;&nbsp;&nbsp;&nbsp;入&nbsp;&nbsp;&nbsp;&nbsp;帳&nbsp;&nbsp;&nbsp;&nbsp;號</td>
    <td colspan="3" class="col">戶&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</td>
    <td width="400" class="col">會&nbsp;&nbsp;&nbsp;&nbsp;員&nbsp;&nbsp;&nbsp;&nbsp;資&nbsp;&nbsp;&nbsp;&nbsp;料</td>
  </tr>
  <tr>
    <td colspan="5" align="center" class="col68">22634991</td>
    <td colspan="3" class="col">國立勤益科技大學(研討會)</td>
    <td width="399" rowspan="2" align="left" valign="top"  class="colnoalign">姓名：<?php=$reportman?><br>
    收據編號：<?php=substr($id,3,3).'-'.$i?>
    <br>
    收據抬頭名稱：<?php=$receipt?>
    <br>
    機關統一編號：<?php=$uniformno?></td>
  </tr>
  <tr>
    <td width="40" colspan="1" align="center" class="col68">金額大寫</td>
    <td colspan="4"  class="colnoalign">新台幣<?php=$chinesemoney?>元整</td>
    <td width="55" class="col">金額<br>
小寫</td>
    <td colspan="2" align="right" class="colnoalign">$<?php=$money?></td>
  </tr>
  <tr>
    <td colspan="8" align="right" class="col68">ATM轉帳：銷帳號碼<?php=$atmchk?></td>
    <td width="250" rowspan="3" valign="top" class="col">經辦局收款戳</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="col68">繳納項目</td>
    <td width="95" colspan="2" class="col">金額</td>
    <td colspan="3" class="col">繳款項目</td>
    <td width="105" class="col">金額</td>
  </tr>
  <tr>
    <td height="60" colspan="2" align="center" class="col68"><span class="col681">ILT2010</span><br>
    研討會<br>
    報名費</td>
    <td width="95" colspan="2"  align="right" valign="top" class="colnoalign">$<?php=$money?></td>
    <td colspan="3" class="col">&nbsp;</td>
    <td width="105" class="col">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" align="center" class="col66">校<br>
    長</td>
    <td width="55" class="col66"> 陳坤盛</td>
    <td width="32" align="center" class="col66">會<br>
    計</td>
    <td width="55" class="col66">糠秀捉</td>
    <td align="center" class="col66">出<br>
    納</td>
    <td width="55" class="col66">鍾月麗</td>
    <td class="col66">&nbsp;</td>
    <td width="105" class="col66">&nbsp;</td>
    <td width="255" valign="top" class="col66">&nbsp;</td>
  </tr>
</table>
<p>
<?php }}
if ($i==0)
{  $i=1;
  ?>
<table  border="1" class="col78bottomdash" cellspacing="0"  bordercolor="#000000">

  <tr align="center">
    <td colspan="9" align="right" class="col78bottom"><strong>國立勤益科技大學</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>自行收納統一收據</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;會員收執聯</td>
  </tr>
  
  <tr>
    <td colspan="5" align="center" class="col68">轉&nbsp;&nbsp;&nbsp;&nbsp;入&nbsp;&nbsp;&nbsp;&nbsp;帳&nbsp;&nbsp;&nbsp;&nbsp;號</td>
    <td colspan="3" class="col">戶&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</td>
    <td width="400" class="col">會&nbsp;&nbsp;&nbsp;&nbsp;員&nbsp;&nbsp;&nbsp;&nbsp;資&nbsp;&nbsp;&nbsp;&nbsp;料</td>
  </tr>
  <tr>
    <td colspan="5" align="center" class="col68">22634991</td>
    <td colspan="3" class="col">國立勤益科技大學(研討會)</td>
    <td width="400" rowspan="2" align="left" valign="top"  class="colnoalign">姓名：<?php=$reportman1?><br>
    收據編號：<?php=substr($id,3,3).'-'.$i?>
    <br>
    收據抬頭名稱：<?php=$receipt1?>
    <br>
    機關統一編號：<?php=$uniformno1?></td>
  </tr>
  <tr>
    <td width="40" colspan="1" align="center" class="col68">金額大寫</td>
    <td colspan="4"  class="colnoalign">新台幣<?php=$chinesemoney?>元整</td>
    <td width="51" class="col">金額<br>
小寫</td>
    <td colspan="2" align="right" class="colnoalign">$<?php=$money?></td>
  </tr>
  <tr>
    <td colspan="8" align="right" class="col68">ATM轉帳：銷帳號碼<?php=$atmchk?></td>
    <td width="255" rowspan="3" valign="top" class="col">經辦局收款戳</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="col68">繳納項目</td>
    <td width="95" colspan="2" class="col">金額</td>
    <td colspan="3" class="col">繳款項目</td>
    <td width="105" class="col">金額</td>
  </tr>
  <tr>
    <td height="60" colspan="2" align="center" class="col68"><span class="col682">ILT2009</span><br>
    研討會<br>
    報名費</td>
    <td width="95" colspan="2"  align="right" valign="top" class="colnoalign">$<?php=$money?></td>
    <td colspan="3" class="col">&nbsp;</td>
    <td width="105" class="col">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" class="col66">校<br>
    長</td>
    <td class="col66">陳坤盛</td>
    <td width="47" align="center" class="col66">會<br>
    計</td>
    <td width="50" class="col66">糠秀捉</td>
    <td align="center" class="col66">出<br>
    納</td>
    <td width="51" class="col66">鍾月麗</td>
    <td class="col66">&nbsp;</td>
    <td width="105" class="col66">&nbsp;</td>
    <td width="255" valign="top" class="col66">&nbsp;</td>
  </tr>
</table>

<?php }?>
</body>
</html>
<?php

?>

