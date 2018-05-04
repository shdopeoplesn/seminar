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
    background-color: rgb(249, 249, 249);
  }
</style>
</head>
<body>

<div align="center">
	<table border="0" width="600" cellspacing="1" cellpadding="0">
          <tr>
              <td colspan="4" background="table_line.gif" height="1"></td>
          </tr>
		<tr>

			<td width="100" class=title>編號</td>
			<td width="400" class=title>論文名稱</td>
			<td width="100" class=title>詳細資料</td>
		</tr>
          <tr>
              <td colspan="4" background="table_line.gif" height="1"></td>
          </tr>
<?php
//評審1
$str = "select serial,papername,papernumber from papers where reviewer1='$re_id' or reviewer2='$re_id' order by papernumber ";
$list = mysql_query($str,$link);
while(list($serial,$papername,$papernumber) = mysql_fetch_row($list))
 {
?>
   		<tr onmouseover="this.style.backgroundColor='#F0F7DD';" onmouseout="this.style.backgroundColor='';">
			<td width="50" class=content align=center><?php=$papernumber?></td>
			<td width="400" class=content><?php=$papername?></td>
			<td width="100" class=content align="center"><a href="reviewer_view_detail.php?serial=<?php=$serial?>"><img src="images/view.gif" border="0"></td>
		</tr>
          <tr>
              <td colspan="4" background="table_line.gif" height="1"></td>
          </tr>
<?php
 }
?>
                <tr>
                        <td colspan="4" align="center"><br></td>
                <tr>
                <tr>
                        <td colspan="4" align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
                <tr>
	</table>
</div>








</body>
</html>