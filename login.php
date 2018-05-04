<?php
include "index_up.php";
?>

<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>會員登入</title>
<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
</style>
</head>
<body>
<br>
<div align="center">
	<table border="0" width="550" id="table1" cellspacing="0" class=content>
		<tr>
			<td><?php echo $error; ?></td>
		</tr>
	</table>
</div>
</br>
</body>
<?php
include "index_down.php";
?>