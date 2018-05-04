<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "CreatBarcode2011.php";
require "db.php";

$re_id = preg_split('//', $id); //將會員編號的每個數字拆開放入陣列 $re_id
$str = "select money from register where id='$id'";
$list = mysql_query($str,$link);

list($money) = mysql_fetch_row($list);
if($money==""){
header("location:happy.php?act=relogin");
exit;
}

//-----若要依照<<列印繳費單的日期>>決定金額請使用此段落定義 $money------------------
//*****若要依照<<報名日期>>        決定金額請 <<註解>> 此段落定義 $money************

if ($data>config('settings.earlybirddeadline') )  //註冊後超過繳費期限更變金額(早鳥優惠)
{   
    $money = 2000;  //一篇1500換成2000
	$str = "UPDATE  register SET `money` = '$money' WHERE id='$id'";	//更改資料庫金額為2000
	$list = mysql_query($str,$link);
}
else
{
	$money = 1500;  //一篇2000換成1500
	$str = "UPDATE  register SET `money` = '$money' WHERE id='$id'";	//更改資料庫金額為1500
	$list = mysql_query($str,$link);
}
//-----------------段落結束-------------------------------------------
$re_money = preg_split('//', $money);

//if($re_id[4].$re_id[5].$re_id[6]<247){
$a[0]=9; /*前面五碼為企業識別碼*/
$a[1]=8;
$a[2]=4;
$a[3]=3;
$a[4]=0;
/*}
else
{
$a[0]=9; /*前面五碼為企業識別碼*/
/*$a[1]=8;
$a[2]=4;
$a[3]=3;
$a[4]=0;
}*/

$a[5]=7; //年度編碼 100年=0 101年=1

$a[6]=$re_money[1]; //繳費金額
$a[7]=$re_money[2];
$a[8]=$re_money[3];  

$a[9]=$re_money[4];      
$a[10]=$re_id[4]; //會員流水號
$a[11]=$re_id[5];
$a[12]=$re_id[6];

//計算公式

$a[13]=($a[0]*4+$a[1]*3+$a[2]*2+$a[3]*1+$a[4]*9+$a[5]*8+$a[6]*7+$a[7]*6+$a[8]*5+$a[9]*4+$a[10]*3+$a[11]*2+$a[12]*1 + $re_money[1]*4+$re_money[2]*3+$re_money[3]*2+$re_money[4]*1)%10;
$account=join($a);



//--------------------------------------------------------------------------------//

if ($data<config('settings.earlybirddeadline') )  //註冊單列印後繳費期限(早鳥優惠)
{ 
	$shop1 = "0706026F0"; // 第一段(9)yymmdd+代收項目三碼視銀行簽合約而定  繳費期限(民國) 同 繳款期限(SHOP3)日期 
	$shop2 = $account ."00"; //補滿16位(16) 個人轉帳帳號 
	$shop3[0] = substr(config('settings.earlybirddeadline'), -4);	//早鳥優惠期限(4)
}
else
{
	$shop1 = "0706026F0"; // 第一段(9)yymmdd+代收項目三碼視銀行簽合約而定
	$shop2 = $account ."00"; //補滿16位(16) 個人轉帳帳號
	$shop3[0] = substr(config('settings.paymentdeadline'), -4); 	//繳費截止期限(4)
}

$shop3[1] = "";//空兩碼出來
$shop3[2] = "";
$shop3[3] = "00000" .$money; //(9)
$tempshop3 = $shop3[0] .$shop3[3];
$rs1 = preg_split('//', $shop1);
$rs2 = preg_split('//', $shop2);
$rs3 = preg_split('//', $tempshop3);

$shop3[1]=($rs1[1]+$rs1[3]+$rs1[5]+$rs1[7]+$rs1[9]+$rs2[1]+$rs2[3]+$rs2[5]+$rs2[7]+$rs2[9]+$rs2[11]+$rs2[13]+$rs2[15]+$rs3[1]+$rs3[3]+$rs3[5]+$rs3[7]+$rs3[9]+$rs3[11]+$rs3[13])%11; //製作檢查碼1

if($shop3[1]==0)	$shop3[1]= "A";
if($shop3[1]==10)	$shop3[1]= "B";

$shop3[2]=($rs1[2]+$rs1[4]+$rs1[6]+6+$rs2[2]+$rs2[4]+$rs2[6]+$rs2[8]+$rs2[10]+$rs2[12]+$rs2[14]+$rs2[16]+$rs3[2]+$rs3[4]+$rs3[6]+$rs3[8]+$rs3[10]+$rs3[12])%11;//製作檢查碼2

if($shop3[2]==0)	$shop3[2]= "X";
if($shop3[2]==10)	$shop3[2]= "Y";

$shop3 = join($shop3);

CreatBarcode($shop1,$id,1,"s");
CreatBarcode($shop2,$id,2,"s");
CreatBarcode($shop3,$id,3,"s");

//--------------------------------------------------------------------------------//
$post1="50079841";//設定郵局劃撥帳號

$post2[0]="1010603" .$account ."00"; //有繳款期限注意

$post3=$money+15;
$rp1 = preg_split('//', $post1);
$rp2 = preg_split('//', $post2[0]);
$rp3 = preg_split('//', $post3);
$post2[1]= (array_sum($rp1)+array_sum($rp2)+array_sum($rp3))%10;
$post2=join($post2);
CreatBarcode($post1,$id,1,"p");
CreatBarcode($post2,$id,2,"p");
CreatBarcode($post3,$id,3,"p");



//--------------------------------------------------------------------------------//
?>
<p><br>
  網站帳號:<?php echo $id?>
  <br>
  轉帳金額:<?php echo $money; ?>
  <br>
  銀行代碼: 808
  <br>
  您的個人轉帳帳號:<?php echo $account;?>
  <br>
請至四大超商繳費，7-11、全家、萊爾富、OK <BR>
請注意如果帳號或是金額錯誤情重新登入再試，或聯絡網站管理員<BR> 
繳費後請於三天後上網檢查是否繳費成功</p>
<p>&nbsp;</p>
<table width="500" border="0" >
<!--  <tr>
    <th width="19%" scope="col">郵局條碼1:</th>
    <th width="81%" scope="col"><div align="center"><img src="codebar/<?php echo $id."p_1.png";?>"   height="35" /></div></th>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><div align="center"><?php echo $post1; ?></div></td>
  </tr>
  <tr>
    <th scope="row">郵局條碼2: </th>
    <td><div align="center"><div align="center"><img src="codebar/<?php echo $id."p_2.png";?>"   height="35" /></div></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><div align="center"><?php echo $post2; ?></div></td>
  </tr>
  <tr>
    <th scope="row">郵局條碼3: </th>
    <td><div align="center"><img src="codebar/<?php echo $id."p_3.png";?>"   height="35" /></div></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><div align="center"><?php echo $post3; ?></div></td>
  </tr> -->
</table>
<br>
<table width="500" border="0" >
  <tr>
    <th width="19%" scope="col">超商條碼1:</th>
    <th width="81%" scope="col"><div align="center"><img src="codebar/<?php echo $id."s_1.png";?>"   height="35" /></div></th>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><div align="center"><?php echo $shop1; ?></div></td>
  </tr>
  <tr>
    <th scope="row">超商條碼2: </th>
    <td><div align="center"><div align="center"><img src="codebar/<?php echo $id."s_2.png";?>"   height="35" /></div></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><div align="center"><?php echo $shop2; ?></div></td>
  </tr>
  <tr>
    <th scope="row">超商條碼3: </th>
    <td><div align="center"><img src="codebar/<?php echo $id."s_3.png";?>"   height="35" /></div></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><div align="center"><?php echo $shop3; ?></div></td>
  </tr>
</table>
<a href="javascript:window.print()"><img border="0" src="images/print.jpg"></a>
