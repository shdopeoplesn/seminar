<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require "db.php";

$id=$_POST["id"];
$passwd=$_POST["passwd"];

new \Pixie\Connection('mysql', $config, 'QB');
$query = QB::table('members')->select(['id'])->where('id','=', $id)
											 ->where('passwd','=', $passwd);
											 
if($query->count() > 0){
	$answer=$query->get();
	$id = $answer[0]->id;
	
	$id = strtoupper($id);
    //session_register("id");
	$_SESSION['id'] = $id;
    header("location:happy.php?act=login");
	exit();
}else{
	header("location:happy.php?act=error");
	exit();
}

?>