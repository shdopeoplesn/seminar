<?php
require "../db.php";

   $stra="select count(*) from reviewer where id='$reviewer_id' and passwd='$re_password' ";
   $lista =mysql_query($stra,$link);
   list($tcount) = mysql_fetch_row($lista);

   if( $tcount==1 )
   {
      //session_register("reminss","reminid","reminpw");	  
      $reminss="reviewer";
      $reminid=$reviewer_id;
      $reminpw=$re_password;
	  $_SESSION["reminss"]=$reminss;
	  $_SESSION["reminid"]=$reminid;
	  $_SESSION["reminpw"]=$reminpw;

      header("location:index.php");
      exit;
   }

header("location:login_error.php");
?>