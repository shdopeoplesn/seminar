<?php
require "../db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];

if ($id!="payment"){
session_destroy();
header("location:login.php");
exit;
}

$i=0;
$str = "select id,money,income,incomemoney,incometime from register";
$list =mysql_query($str,$link);
while(list($id,$money,$income,$incomemoney,$incometime) = mysql_fetch_row($list))
 { 
 if(($moneysn[$i]!=0) and ($timesn[$i]!="") and ($income==0))
   {
    if(($moneysn[$i]!=$incomemoney) or ($timesn[$i]!=$incometime))
	  {
       if(($money>=$moneysn[$i]))
         { 
	      if($money==$moneysn[$i]) {$income=1;}  	   	  
          $str2 ="update register set income='$income',incomemoney='$moneysn[$i]',incometime='$timesn[$i]' where id='$id' ";
          mysql_query($str2,$link);	
		  
		  $str3 = "select name,email from members where id='$id'";
          $list3 =mysql_query($str3,$link);
          list($name,$email) = mysql_fetch_row($list3);		 
		  $url="eecs.ncut.edu.tw/2015ilt/index.php";
          $mail_title="智慧生活科技研討會";
          $mail_content="敬愛的".$name."教授/先生 您好，以下為您的繳費資料，請確認：<br>
		  應繳金額：".$money."<br> 	  	
		  已繳金額：".$moneysn[$i]."<br> 
		  謝謝您對智慧生活科技研討會的支持<br> 	  
          ============================================================<br>
          智慧生活科技研討會：" ;
          $mail_content.="<a href=\"http://ilt2015.ncut.edu.tw\">http://ilt2015.ncut.edu.tw/ </A><br>
		  
          若需要更改資訊請登入本研討會網站即可<p>";
          include "mail.php";

         }
       else
         {
	      echo $id."的已繳金額大於應繳金額，請重新輸入";?> <br> <?php
         }  
      }
   }
 if (($moneysn[$i]==0) and ($timesn[$i]!=""))
   {
     echo $id."的已繳金額未設定，請重新輸入";?> <br> <?php
   }	 
 if (($moneysn[$i]!=0) and ($timesn[$i]==""))
   {
     echo $id."的進帳時間未設定，請重新輸入";?><br> <?php
   }	   
 $i=$i+1;
 }
?>

