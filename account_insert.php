<?php
require "db.php";
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
$boss=$_POST["boss"];
  //取得檔案名稱
  $new_file=$_FILES["boss"]["name"];
  $time=date("YmdHis");
  $main=substr($new_file,-4,4);
  //取得ID(@之前)
  list($ids,$aa)=explode("@",$id);
  //指派檔案名稱
  $raw_file=$new_file;
  $new_files=$ids."_".$time.$main;
  //轉換小寫
  $main=strtolower($main);
   if($main!=".bmp" and $main!=".jpg" and $main!=".png")
    {
		header("location:happy.php?act=file_error1");
      exit;
    }
copy($_FILES["boss"]["tmp_name"],"accountfile/".$new_files); 

$str = "UPDATE members set boss='$new_files' where id='$id'";
mysql_query($str,$link); 
header("location:happy.php?act=account_upload");

	?>