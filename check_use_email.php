<?php
require "db.php";
if(!ereg("^.+@.+\\..+$",$chkid))
{
   $msg="emailer";
}
else
{
   $str = "select count(*) from members where email='$chkid'";
   $list = mysql_query($str,$link);
   list($count) = mysql_fetch_row($list);
   if($count == 1)
   {
      $msg="emailhvae";
   }
   else
   {
      $msg="emailok";
   }
}
?>
s<?php echo $msg;?>
