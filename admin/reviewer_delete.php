<?php
require "../db.php";

//清除評審1
$str="update my_papers set reviewer_sn='' where reviewer_sn='$sn' ";
mysql_query($str,$link);

//清除評審2
$str="update my_papers set reviewer_sn1='' where reviewer_sn1='$sn' ";
mysql_query($str,$link);

//刪除評審
$str="delete from reviewer where sn='$sn' ";
mysql_query($str,$link);

@mysql_close($link);
header("location:reviewer_information_root1.php");
?>