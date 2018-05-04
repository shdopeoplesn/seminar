<?php
require "../db.php";

$str = "select  serial,id,money from register";
$list =mysql_query($str,$link);
while(list($serial,$id,$money) = mysql_fetch_row($list))
 { 

$idchange="1000010".substr($id,3,3);
  

$atm2='62127'.'1000010'.substr($id,3,3);
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
//$atmchk=substr($atmchk,0,4).'-'.substr($atmchk,4,4).'-'.substr($atmchk,8,4).'-'.substr($atmchk,12,4);
//echo $atmchk;

   $str = "insert into account(serial,id,idchange,money,atmchk) 
   values('$serial','$id','$idchange','$money','$atmchk')";
   mysql_query($str,$link);	  	  	    
}
?>
