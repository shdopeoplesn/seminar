<?php
require "../db.php";

$str="update reviewer set re_name='$re_name',re_id='$re_id',re_password='$re_password' where sn='$sn' ";
mysql_query($str,$link);

@mysql_close($link);
header("location:reviewer_information_root1.php");
?>