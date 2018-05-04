<?php
$link=mysql_connect("localhost","root","root");
mysql_select_db("ilt2018",$link);
//mysql_query("set character set 'big5'");//避免中文亂碼
mysql_query("SET NAMES 'utf8'");
?>