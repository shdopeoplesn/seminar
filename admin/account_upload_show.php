<STYLE>
.table_data
{
	border-style:ridge;
	border-width:1;
}
.tab_base
{
	background:#C5D0DD;
	font-weight:bold;
	border-style:ridge;
	border-width:1;
	cursor:pointer;
}
.table_sub_heading
{
	background:#CCCCCC;
	font-weight:bold;
	border-style:ridge;
	border-width:1;
}
.table_body
{
	background:#F0F0F0;
	font-wieght:normal;
	font-size:12;
	font-family:sans-serif;
	border-style:ridge;
	border-width:1;
	border-spacing: 0px;
	border-collapse: collapse;
}
.tab_loaded
{
	background:#222222;
	color:white;
	font-weight:bold;
	border-style:groove;
	border-width:1;
	cursor:pointer;
}
.style01{
background-color:#00ff00;	
font-weight:bold;
border-style:ridge;
border-width:1;
}
.style02{
background-color:#ff0000;	
font-weight:bold;
border-style:ridge;
border-width:1;}
</STYLE>
<TABLE CLASS='table_body'>
<tr><td CLASS='table_sub_heading' ALIGN=CENTER>ILT帳戶</td>
<TD CLASS='table_sub_heading' ALIGN=CENTER>匯入時間</TD>
<TD CLASS='table_sub_heading' ALIGN=CENTER>匯入帳號</TD>
<TD CLASS='table_sub_heading' ALIGN=CENTER>匯入金額</TD>
<TD CLASS='table_sub_heading' ALIGN=CENTER>匯款人代號</TD>
<TD CLASS='table_sub_heading' ALIGN=CENTER>資料庫資料核對</TD>
</TR>
<?php
require_once './phpexcelreader/Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->setDefaultFormat('%.0f');
$data->read("./phpexcelreader/寄款人資料.xls");

error_reporting(E_ALL ^ E_NOTICE);
$XC="";

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		$account[$i][$j]=$data->sheets[0]['cells'][$i][$j];
	}
}

for ($ii=0;$ii<=$i;$ii++){echo"<tr>";

 $stra = "select id,idchange,money,atmchk from account where serial='$ii'-1 ";      
        $lista =mysql_query($stra,$link);  
        list($id,$idchange,$money,$atmchk) = mysql_fetch_row($lista);  
		
	if ($account[$ii][4]==$money and $account[$ii][5]==$idchange)
		$XC=1;
	if ($account[$ii][4]!=$money and $account[$ii][5]==$idchange)
		$XC=3;		
	if ($account[$ii][4]!=$money and $account[$ii][5]!=$idchange)
		{	$idx="ILT".substr($account[$ii][5],7,3);
		$str = "select * from register where id='$idx'";
		$list = mysql_query($str,$link);
		if (mysql_fetch_row($list)){$XC=2;}
		else {$XC="無此註冊人";}
		$str = "select * from account where id='$idx'";
		$list = mysql_query($str,$link);	
		if (mysql_fetch_row($list)){$XC=1;}
		}
	for ($jj=0;$jj<=$j;$jj++){
	if ($account[$ii][$jj]!=""){echo"<TD CLASS='table_sub_heading' ALIGN=CENTER>";echo $account[$ii][$jj];echo"</td>";}}
	if ($XC==1){$XC="已有相同資料";$color=style01;}
	if ($XC==3){$XC="金額有誤";$color=style01;}
	if ($XC==2){$XC="新增該筆資料";$ix=$ii;$XT="insert";$color=style02;}
	if($account[$ii][5]!=""){echo "<TD CLASS='$color'  ALIGN=CENTER>";echo $XC;echo"</td>";}
	
echo"</tr>";	


if ($XT=="insert"){$id="ILT".substr($account[$ii][5],7,3);
//echo $id;
$str = "select money from register where id='$id'";
$list = mysql_query($str,$link);
list($money) = mysql_fetch_row($list);
  $moneyx=$money;$idx=$id;
$str = "select name,unit from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$unit) = mysql_fetch_row($list);
$atm2='62127'.'1030010'.substr($id,3,3);
$wt='135142753869263';
$wt2='13241631';
//echo $atm2;echo "<BR>";
$sum2=0;
$wtlth=strlen($wt);
for ($loop=0;$loop<$wtlth;$loop++)
  {    
	$sum2=$sum2+substr($atm2,$loop,1)*substr($wt,$loop,1);	
  }
$sum3=0;
$moneylth=strlen($money);
$wt2lth=strlen($wt2);
for ($loop=0;$loop<$moneylth;$loop++)
  { 
	$sum3=$sum3+substr($money,$loop,1)*substr($wt2,$loop+$wt2lth-$moneylth,1);
  }
$sum4=$sum2+$sum3;
$sumlth=strlen($sum4);

if ($sumlth==1) {$chk=$sum4;}
while ($sumlth!=1)
 { 
  $sum5=0;
  for ($loop=0;$loop<$sumlth;$loop++)
    { 
	 $sum5=$sum5+substr($sum4,$loop,1);
    }
   $sumlth=strlen($sum5);
   $sum4=$sum5;
   if ($sumlth==1) {$chk=$sum4;}
 }
//echo $atmchk=substr($account[$ix][5],0,15).$chk;echo "<BR>";

$time=$account[$ix][2];$money=$account[$ix][4];$idchange=$account[$ix][5];$atmchk='62127'.'1030010'.substr($account[$ii][5],7,3).$chk;
if ($money==$moneyx){
	$str="insert into account(id,idchange,money,atmchk,time) 
	values('$idx','$idchange','$money','$atmchk','$time')";
	mysql_query($str,$link);$XT="";}
else {echo $idx;echo "<H1>金額有誤無法寫入</H1>";}
}}

/*
for ($ii=0;$ii<=$i;$ii++){echo"<tr>";

 $stra = "select id,idchange,money,atmchk from account where serial='$ii' ";      
        $lista =mysql_query($stra,$link);  
        list($id,$idchange,$money,$atmchk) = mysql_fetch_row($lista);  

	if ($account[$ii][0]!=$id and $account[$ii][1]!=$idchange and $account[$ii][2]!=$money and $account[$ii][3]!=$atmchk)
		$XC="新增資料成功";	

	for ($jj=0;$jj<=$j;$jj++){
	if ($account[$ii][$jj]!=""){echo"<TD CLASS='table_sub_heading' ALIGN=CENTER>";echo $account[$ii][$jj];echo"</td>";}}
	if (($XC=="新增資料成功")&&($account[$ii][5]!="")){echo "<TD CLASS='table_sub_heading' ALIGN=CENTER>";echo $XC;echo"</td>";}
echo"</tr>";
}
*/


?>
<tr><td><a href="excell.php">回報報表</a></td></tr>
</table>
