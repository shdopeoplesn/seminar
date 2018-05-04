<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style type="text/css">
  .title
  { color: rgb(204, 204, 255);
    background-color: rgb(51, 51, 153);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:3px;
    text-align:center;
  }
  .content
  { color: rgb(131, 131, 131);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    background-color: rgb(249, 249, 249);	
  }

  
</style>

</head>
<body>
<div align="center" >
	<table border="0"  cellspacing="1" cellpadding="0">
	    <tr>
			<td  colspan="2" class=title>繳費情形</td>			
		</tr>				
		<tr>
			<td width="70" class=title>序號</td>
			<td width="70" class=title>ID</td>
			<td width="70" class=title>EMAIL1</td>
			<td width="70" class=title>EMAIL2</td>
			<td width="70" class=title>EMAIL3</td>
			<td width="70" class=title>EMAIL4</td>
		</tr>
<?php 
require "../db.php";
$total=1;
$email_total=0;
$total_email="";
$str="Select id from members order by id ";
$list=mysql_query($str,$link);
while(list($id_reg) = mysql_fetch_row($list))
   {
    $accept_reg="0";
	$stra="Select id,accept from papers where id='$id_reg' ";
	$lista =mysql_query($stra,$link);
	while(list($id_temp,$accept) = mysql_fetch_row($lista))   
	{
		if ($accept>"0")
		{
		$accept_reg="1";
		$id_act=$id_temp;
		}
	}
   if ($accept_reg=="1"){
   
	$strb="Select email,email2,email3,email4 from members where id='$id_act' ";
	$listb =mysql_query($strb,$link);
	list($email,$email2,$email3,$email4) = mysql_fetch_row($listb);

$total=$total+1;

$total_email=$total_email.$email.";";
$email_total=$email_total+1;

if($email2!=""){
$total_email=$total_email.$email2.";";
$email_total=$email_total+1;
}

if($email3!=""){
$total_email=$total_email.$email3.";";
$email_total=$email_total+1;
}

if($email4!=""){
$total_email=$total_email.$email4.";";
$email_total=$email_total+1;
}

if ($email_total>10){
echo $total_email;
?>
<p>
<?php
$total_email="";
$email_total=0;
}


}
}
?>


</body>
</html>
