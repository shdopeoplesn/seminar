<?php
require "../db.php";
?>
 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 17pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
     text-align:center;
   }
  .title_paper
   { 
     background-color: rgb(220, 255, 185);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 17pt;
     letter-spacing:2px;
   }
 </style>

<div align="center">
<table width="800">
 <tr>
    <td width="60" class=title>姓名</td>
    <td width="150" class=title>Email</td>
    <td width="50" class=title>密碼</td>
    <td width="130" class=title>服務單位</td>
    <td width="90" class=title>聯絡電話</td>
    <td width="210" class=title>聯絡住址</td>
    <td width="110" class=title>註冊時間</td>
 </tr>
<?php

$str = "select name,email,passwd,unit,tel,addtime from members where id='$id' ";
$list = mysql_query($str,$link);
while(list($name,$email,$password,$unit,$tel,$addtime) = mysql_fetch_row($list))
 {
   echo " <tr>
             <td width=\"60\" class=content>".$name."</td>
             <td width=\"150\" class=content>".$email."</td>
             <td width=\"50\" class=content>".$password."</td>
             <td width=\"130\" class=content>".$unit."</td>
             <td width=\"90\" class=content>".$tel."</td>
             <td width=\"210\" class=content>".$address."</td>
             <td width=\"110\" class=content>".$addtime."</td>
          </tr> ";
 }
?>
</table></div>
<p>
<br>

<div align="center">
<table width="800">
 <tr>
    <td width="157" class=title_paper>論文名稱</td>
    <td width="130" class=title_paper>論文作者</td>
    <td width="191" class=title_paper>投稿類別</td>
       <td width="120" class=title_paper>科技部計畫編號</td>
    <td width="79" class=title_paper>論文編號</td>
    <td width="107" class=title_paper>論文狀態</td>
    <td width="110" class=title_paper>最後編修時間</td>
 </tr>
<?php
$str = "select papername,paperman,category,papernumber,notify,excellent,edittime,nsc_number from papers where id='$id'";
$list = mysql_query($str,$link);
while(list($papername,$paperman,$category,$papernumber,$notify,$excellent,$edittime,$nsc_number) = mysql_fetch_row($list))
 {
/*   $stra = "select name,typenumber from numbers where sn='$category'";
   $lista = mysql_query($stra,$link);
   list($name,$typenumber) = mysql_fetch_row($lista);
*/
   if( $notify == 0 )
   {
      $notify="審查中";
   }
   else
   {
      $notify=$excellent;
   }

 //---------論文編號------------
    $numbers = $typenumber.$number;

     
   echo " <tr>
             <td width=\"157\" class=content>".$papername."</td>
             <td width=\"134\" class=content>".$paperman."</td>
             <td width=\"184\" class=content>".$category."</td>
			 <td width=\"120\" class=content>".$nsc_number."</td>
             <td width=\"79\" class=content>".$papernumber."</td>
             <td width=\"107\" class=content>".$notify."</td>
             <td width=\"110\" class=content>".$edittime."</td>
           </tr>";
 }
?>
</table>
</div>

<form>
<div align="center">
<table width="800">
 <tr>
    <td align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
 </tr>
</table>
</div>
</form>