<?php
require "../db.php";

$session_id = filter_var($_GET['session_id'],FILTER_SANITIZE_STRING);
$passwd = filter_var($_POST["passwd"],FILTER_SANITIZE_STRING);
$session_name = filter_var($_POST["session_name"],FILTER_SANITIZE_STRING);
$session_email = filter_var($_POST["session_email"],FILTER_SANITIZE_EMAIL);


//--------------驗証email格式是否正確------------
if(!ereg("^.+@.+\\..+$",$session_email))
{
   echo "Email格式錯誤";
   exit;
}

$str = "update session set passwd='$passwd',session_name='$session_name',session_email='$session_email' where session_id='$session_id' ";
$result = mysql_query($str,$link);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
header("location:root.php");
?>