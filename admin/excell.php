<?php
require "../db.php";
$data=date("nd");
header("Content-Disposition: attachment; filename=$data.xls;");

echo '<HTML xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">'."\n";
echo '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"></head>'."\n";
echo "<body><table border=1>\n";
echo '
  <tr>
    <td>會員編號</td>
    <td x:str>會員資料</td>
	<td>應繳金額</td>
	<td>寄款人代號</td>
	<td>銷帳號碼</td>	
	<td>郵撥專戶帳號</td>
	<td>匯入日期</td>
	<td>實繳金額</td>
	<td>繳款人代碼</td>
	  </tr>';
//
$str="Select * from account ";
$list =mysql_query($str,$link);        
while(list($serial) = mysql_fetch_row($list))
//
{
$stra = "select  id,idchange,money,atmchk,time from account where serial='$serial' ";      
        $lista =mysql_query($stra,$link);  
        list($id,$inidchange,$inmoney,$inatmchk,$intime) = mysql_fetch_row($lista);
		
		$stra = "select  name from members where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($nameo) = mysql_fetch_row($lista);
		$name = iconv("big5","UTF-8","$nameo");
		$stra = "select  money,idchange,atmchk from register where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($money,$idchange,$atmchk) = mysql_fetch_row($lista);
echo "
  <tr>
    <td>$id</td>
    <td>$name</td>
	<td>$money</td>
	<td>$idchange</td>
	<td>$atmchk</td>
	<td>22634991</td>
	<td>$intime</td>
	<td>$inmoney</td>
	<td>$inidchange</td>
  </tr>";
}
echo '</table></body></html>';
?>