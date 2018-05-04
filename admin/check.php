<?php
if( !isset($_SESSION['adminid'])  || is_null($_SESSION['adminid']) )
{   // 未登入
	header("location:login.php");
        exit;
}
else
{            //已登入 放行
}   // end if session
?>

