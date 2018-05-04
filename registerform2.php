<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
$position = $_SESSION["position"];
include "chksession.php"; 
require "db.php";
include "index_up.php";
/*
需更改的地方有 postoffice4.php
webatm.php
webatm已沒用
*/

$str = "select serial from register where id='$id'";
$list = mysql_query($str,$link);
list($serial) = mysql_fetch_row($list);
if ($serial==""){
session_destroy();
header("location:happy.php?act=destroy");
exit;}

$str = "select time from account where id='$id'"; //accout找資料
$list = mysql_query($str,$link);
list($time) = mysql_fetch_row($list);
$str = "select testmoney from register where id='$id'"; //register找資料
$list = mysql_query($str,$link);
list($testmoney) = mysql_fetch_row($list);
$data=date("Ymd");


$str = "select name,email,unit,tel from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$email,$unit,$tel) = mysql_fetch_row($list);
if($position==1)
{$position="教授";}
elseif($position==2)
{$position="研究生";}
elseif($position==3)
{$position="大學生";}
elseif($position==4)
{$position="一般社會人士";}


$str = "select reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,position1,position2,position3,position4,position5,position6,papername1,papername2,papername3,papername4,papername5,papername6,paperchinesename1,paperchinesename2,paperchinesename3,paperchinesename4,paperchinesename5,paperchinesename6,category1,category2,category3,category4,category5,category6,papernumber1,papernumber2,papernumber3,papernumber4,papernumber5,papernumber6,status,receipt1,receipt2,receipt3,receipt4,receipt5,receipt6,uniformno1,uniformno2,uniformno3,uniformno4,uniformno5,uniformno6,money,eat1,eat2,eat3,eat4,eat5,eat6 from register where id='$id'";
$list = mysql_query($str,$link);
list($reportman1,$reportman2,$reportman3,$reportman4,$reportman5,$reportman6,$position1,$position2,$position3,$position4,$position5,$position6,$papername1,$papername2,$papername3,$papername4,$papername5,$papername6,$paperchinesename1,$paperchinesename2,$paperchinesename3,$paperchinesename4,$paperchinesename5,$paperchinesename6,$category1,$category2,$category3,$category4,$category5,$category6,$papernumber1,$papernumber2,$papernumber3,$papernumber4,$papernumber5,$papernumber6,$status,$receipt1,$receipt2,$receipt3,$receipt4,$receipt5,$receipt6,$uniformno1,$uniformno2,$uniformno3,$uniformno4,$uniformno5,$uniformno6,$money,$eat1,$eat2,$eat3,$eat4,$eat5,$eat6 ) = mysql_fetch_row($list);

if ($data>=config('settings.paymentdeadline') )  //註冊後超過繳費期限更變金額
{
    if($time==""&&$testmoney!=1)  //有人工作業時間問題，有可能已繳費但time抓不到資料，再從資料庫做修改
    {
        $money = 2000;
        $sql="update register set money=$money,testmoney=1 where id='$id'";
        mysql_query($sql);
    }
}
?>
<style type="text/css">
<!--
.style4 {
	font-size: 20px;
}
a {
}
.cent {
	text-align: center;
}
-->
</style>


<table width="100%" border="1"><tr><td width="697"><table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center"><span class="style4">研討會資訊</span></div></td>
  </tr>
  <tr>
    <td width="176" rowspan="2">匯款方式：</td>
    <td width="314"><p>1.虛擬帳號繳費 <br />
      (產生個別用戶的虛擬帳號用於實體ATM轉帳)</p>
        
      <p>2.便利商店繳款<br />
        (列印條碼之後可以在四大超商繳款)<br />
        <img src="images/shop.gif" alt="" width="151" height="35" /> <br />
      </p></td>
    <td width="128"><a target="_blank" href="test.php"><br />
          <img src="images/print.png" width="128" height="128" /><span >產生條碼及匯款帳號</span></a><!--<a target="_blank" href="webatm.php"><img src="images/webatm.jpg" alt="WEBATM" width="128" height="128" /><br />
          <span >webATM付款(需有ATM讀卡機)</span></a>--></td>
  </tr>
  <tr> </tr>
  <tr>
    <td width="176" rowspan="2">列印格式設定：</td>
    <td width="314">請使用雷射印表機列印條碼</td>
  </tr>
  <tr>
    <td width="314">檢視設定：請選擇檢視→選擇字型→選擇適中</td>
  </tr>
  <!--<tr>
      <td width="151">自行收納統一收據：</td>
      <td width="532"><a target="content" href="account.php"> 列印自行收納統一收據</a>請務必按照列印格式設定</td>
    </tr>-->
<!--  <tr>
    <td width="176">停車證：</td>
    <td width="314"><a target="_blank" href="stop.php">點我下載</a></td>
  </tr> -->
  
  <?php
 /* $data=date("Ymd");
if ($data> config('settings.paymentdeadline') )  //註冊後超過繳費期限更變金額 舊的
{
   $money = ($money/1500)*2000;
    $money = $money;
}*/
  ?>
  
  <tr>
    <td width="176">總繳金額：</td>
    <td width="314">$<?php echo $money ?>元 (請注意核對金額，若有誤請通知網站人員)</td>
  </tr>
  <?php
$meat=0;
$no_meat=0;
if ($eat1=="葷"){$meat=$meat+1;}
if ($eat2=="葷"){$meat=$meat+1;}
if ($eat3=="葷"){$meat=$meat+1;}
if ($eat4=="葷"){$meat=$meat+1;}
if ($eat5=="葷"){$meat=$meat+1;}
if ($eat6=="葷"){$meat=$meat+1;}
if ($eat1=="素"){$no_meat=$no_meat+1;}
if ($eat2=="素"){$no_meat=$no_meat+1;}
if ($eat3=="素"){$no_meat=$no_meat+1;}
if ($eat4=="素"){$no_meat=$no_meat+1;}
if ($eat5=="素"){$no_meat=$no_meat+1;}
if ($eat6=="素"){$no_meat=$no_meat+1;}

$eat="葷：".$meat."位 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 素：".$no_meat."位";
?>
  <tr>
    <td>用餐情形：</td>
    <td><?php echo $eat ?></td>
  </tr>
</table>  <a target="_blank" href="test.php"></a></td>
  </tr>
</table>
<br>
<table width="100%" border="0">
  <tr>
    <th colspan="2" bgcolor="#FFCCFF" scope="col">代收服務手續費</th>
  </tr>
  <tr>
    <th bgcolor="#FFCCFF" scope="row">玉山銀行櫃檯繳費</th>
    <td bgcolor="#FFCCFF">每筆10元</td>
  </tr>
  <tr>
    <th bgcolor="#FFCCFF" scope="row">匯款</th>
    <td bgcolor="#FFCCFF">依各銀行收費標準</td>
  </tr>
  <tr>
    <th bgcolor="#FFCCFF" scope="row">ATM/WebATM轉帳、及時付</th>
    <td bgcolor="#FFCCFF">每筆17元</td>
  </tr>
  <tr>
    <th bgcolor="#FFCCFF" scope="row">四大超商</th>
    <td bgcolor="#FFCCFF">每筆12元</td>
  </tr>
  
</table>
<p>&nbsp;</p>
<?php
include "index_down.php";
?>