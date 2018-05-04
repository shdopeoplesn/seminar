<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}


require "../db.php";
$chk_id="root";
$chk_password="512104";

$chk_id2="ILT2018";
$chk_password2="72107210";

//for PHP 5.4 and newer version
if(isset($_POST['admid'])){
	$admid = filter_var($_POST['admid'],FILTER_SANITIZE_STRING);
}
if(isset($_POST['password'])){
	$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
}


if( $chk_id2 == strtoupper($admid) and $chk_password2 == $password )
{
   //for PHP 5.4 and newer version
   //session_register("adminss","adminid","adminpw");
   $_SESSION['adminss'] = "root1";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;
   header("location:index.php");
   exit;
}

//管理員
if( $chk_id == $admid and $chk_password == $password )
{
   $_SESSION['adminss'] = "root1";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;



   header("location:index.php");
   exit;
}

//定稿資料
if( $admid == "final_data" and  $password == "final_data" )
{
   $_SESSION['adminss'] = "final_text";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}


//發票
if( $admid == "fund" and  $password == "fund" )
{
   $_SESSION['adminss'] = "fund";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}

//車牌
if( $admid == "cars" and  $password == "cars" )
{
   $_SESSION['adminss'] = "cars";
   $_SESSOPM['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}

//用餐
if( $admid == "meal" and  $password == "meal" )
{
   $_SESSION['adminss'] = "meal";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}

//簽到
if( $admid == "registration" and  $password == "registration" )
{
   $_SESSION['adminss'] = "registration";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}

//收款情形
if( $admid == "payment" and  $password == "payment" )
{
   $_SESSION['adminss'] = "payment";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}

//銷帳核對
if( $admid == "crossaccoun" and  $password == "crossaccoun" )
{
   $_SESSION['adminss'] = "crossaccoun";
   $_SESSION['adminid'] = $admid;
   $_SESSION['adminpw'] = $password;

   header("location:index.php");
   exit;
}


   //9個root
   $stra="select count(*) from session where session_id ='$admid' and passwd='$password'";
   $lista =mysql_query($stra,$link);
   list($tcount) = mysql_fetch_row($lista);

   if( $tcount==1 )
   {
      $_SESSION['adminss'] = "root2";
      $_SESSION['adminid'] = $admid;
      $_SESSION['adminpw'] = $password;
      $stra="select category from session where session_id ='$admid' ";
      $lista =mysql_query($stra,$link);
      list($category) = mysql_fetch_row($lista);
	  
      header("location:index.php");
      exit;
   }

header("location:login_error.php");?>
