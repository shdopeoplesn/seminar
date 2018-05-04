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
   { 
     font-size: 15pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 20pt;
     letter-spacing:2px;
     text-align:center;
   }
 .content 
   { 
     font-size: 12pt;
     color: rgb(65, 65, 65);
     line-height: 15pt;
     text-align:center;
   }
    .content1
   { 
     color: rgb(65, 65, 65);
     font-size: 12pt;
     line-height: 15pt;
   }
    .sp
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
</style>
</head>

<body>

<?php
$str = "select papername,number,propose,chkstate from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papername,$number,$propose,$chkstate_1) = mysql_fetch_row($list);

    $state[$chkstate_1]=checked;

$str = "select typenumber from numbers where sn='$number' ";
$list = mysql_query($str,$link);
list($typenumber) = mysql_fetch_row($list);
?>
<div align="center">
	<table border="0" width="500" id="table1">
		<tr>
			<td colspan="2" class=title><?php echo config('settings.titleC');?><p></td>
		</tr>
		<tr>
			<td colspan="2" class=title>　</td>
		</tr>
		<tr>
			<td width="90" class=content>論文名稱：</td>
			<td width="400" class=content1><?php=$papername?></td>
		</tr>
		<tr>
			<td width="90" class=content>論文編號：</td>
			<td width="400" class=content1><?php=$typenumber.$number?></td>
		</tr>
		<tr>
			<td width="90" class=content>綜合評論：</td>
			<td width="400" class=content1><?php=$propose?></td>
		</tr>
		<tr>
			<td width="90" class=content>評審結果：</td>
			<td width="400" class=content1><?php
                                                          $str = "select sn,name from chkstate";
                                                          $list = mysql_query($str,$link);
                                                          while(list($chk_sn,$name) = mysql_fetch_row($list))
                                                           {
                                                               if( $chk_sn == $chkstate_1 )
                                                                {echo " ■ " . $name . "<br>"; }
                                                               else
                                                                {echo " □ " . $name. "<br>" ; }

                                                           }
                                                         ?></td>
		</tr>
		<tr>
			<td width="90" height="70" class=content>審稿簽名：</td>
			<td width="400"></td>
		</tr>
		<tr>
			<td width="90" height="70" class=content></td>
			<td width="400"></td>
		</tr>
		<tr>
			<td width="484" colspan="2" class=sp>（＊敬護審稿教授將此審稿意見表列印後親筆簽章，再以傳真或掛號郵寄的方式於<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5月14日前寄回本校。<br>傳真電話：04-23917426<br>本校地址：41101&nbsp;&nbsp;台中市太平區中山路一段215巷35號&nbsp;&nbsp;智慧生活科技研發中心收）</td>
		</tr>
	</table>
        <P>
	<table border="0" width="500" id="table2">
		<tr>
			<td align="center" width="574"><a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a></td>
		</tr>
	</table>
</div>



</body>

</html>