<?php
if( !isset($_SESSION['reminid'])  || is_null($_SESSION['reminid']) )
{   // 未登入
	header("location:login.php");
        exit;
}
else
{            //已登入 放行
}   // end if session
?>

