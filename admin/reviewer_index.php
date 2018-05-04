<?php
require "../db.php";
?>

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
    text-align:center;
    background-color: rgb(249, 249, 249);
  }
</style>
</head>
<body>
<div align="center">
	<table border="0" width="600" cellspacing="1" cellpadding="0">
		<tr>
			<td class=title>名稱</td>
			<td class=title width="102">英文簡稱</td>
			<td class=title width="82">評審人數</td>
			<td class=title width="36">設定</td>
		</tr>
<?php
$str="select sn,name,typenumber from numbers order by sn ";
$list =mysql_query($str,$link);
while(list($sn,$name,$typenumber) = mysql_fetch_row($list))
{

   //計算評審人數
   $stra="select count(sn) from reviewer where suid='$sn' ";
   $lista =mysql_query($stra,$link);
   list($sncount) = mysql_fetch_row($lista);
?>
		<tr>
			<td class=content><?php=$name?></td>
			<td class=content width="102"><?php=$typenumber?></td>
			<td class=content width="82"><?php=$sncount?></td>
			<td class=content width="36"><a href="reviewer_setup.php?numbers_sn=<?php=$sn?>"><img border="0" src="edit.gif" width="12" height="12"></a></td>
		</tr>
<?php
}
?>
	</table>
</div>
</body>
</html>