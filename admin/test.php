<?php
require "../db.php";

$str = "select name,email,unit,tel,address from members where sn='$sn' ";
$list = mysql_query($str,$link);
list($name,$email,$unit,$tel,$address) = mysql_fetch_row($list);
?>

姓名：<?php=$name?><br>
電子信箱：<?php=$email?><br>
服務單位：<?php=$unit?><br>
聯絡電話：<?php=$tel?><br>
住址：<?php=$address?>