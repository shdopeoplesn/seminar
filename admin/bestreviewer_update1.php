<?php
require "../db.php";

$str="update bestreviewer set re_name='$re_name',re_id='$re_id',re_password='$re_password' where sn='$sn' ";
mysql_query($str,$link);

@mysql_close($link);
header("location:bsetreviewer_information_root1.php");
?>