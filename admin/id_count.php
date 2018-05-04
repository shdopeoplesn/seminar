<?php
require "../db.php";
$money_sum=0;
$not_accept=0;
$str="Select money,idchange from postoffice ";
$list =mysql_query($str,$link);        
while(list($money,$idchange) = mysql_fetch_row($list))
   { 
     $result=mysql_query("Select * from account where idchange='$idchange' ");
     $rejust_count=mysql_num_rows($result);
     if ($rejust_count==0)
	 {echo $idchange ;?><br> <?php }
	 
     $money_sum=$money_sum+$money;
     $total=0;
     $stra="Select serial,idchange from postoffice ";
     $lista =mysql_query($stra,$link);        
     while(list($serial,$idchange2) = mysql_fetch_row($lista))
	{
	 if ($idchange==$idchange2)
       {$total=$total+1;
	    if ($total>1)
	      {//echo $serial;
	       //echo $idchange;
		  ?>
		  <br>
		  <?php
		  }
	   }
    }
}
echo $money_sum;
?>
	