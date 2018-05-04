<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require("check.php");

$adminss=$_SESSION["reminss"];
$adminid=$_SESSION["reminid"];
$adminpw=$_SESSION["reminpw"];


require "../db.php";
//抓取使用者的reviewer.sn
$str="select id,chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15 from reviewer where id='$adminid' and passwd='$adminpw' ";
$list=mysql_query($str,$link);
list($reviewer_id,$chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15)=mysql_fetch_row($list);


//-----捉IP位址--------
$ip=$REMOTE_ADDR;

$str = "insert into action(ip,id,action,time) values('$ip','$adminid','在審查的首頁',now())";
mysql_query($str,$link);

?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>論文審查</title>
 <style type="text/css">
  .title 
   { 
     background-color: rgb(255, 255, 180);
     font-size: 10pt;
     color: rgb(34, 34, 0);
     text-align:center;
     line-height: 20pt;
     letter-spacing:2px;
   }
 .content 
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
     text-align:center;
   }
    .content1
   { 
     color: rgb(65, 65, 65);
     font-size: 10pt;
     line-height: 15pt;
   }
 .up_next 
   { 
     color: rgb(51, 51, 255);
     font-size: 10pt;
     text-align:center;
   }
 .paperstyle 
   {  
    text-decoration: underline;
   }

 </style>
</head>
<body>

<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>

<div align="center">
<table width="576" cellspacing="1" cellpadding="0">
 <tr>
     <td colspan="6" background="table_line.gif" height="1"></td>
 </tr>
 <tr>
     <td width="250" class=title>論文名稱</a></td>
     <td width="139" class=title>投稿類別</td>
     <td width="68" class=title>論文編號</td>
     <td width="40" class=title>下載</td>
     <td width="79" class=title>審查意見表</td>     
 </tr>
 <tr>
     <td colspan="6" background="table_line.gif" height="1"></td>
 </tr>
<?php
//評審1
//$str = "select serial,papername,paperman,category,papernumber from papers where reviewer_id='$reviewer_id' order by number ";
$str = "select serial,papername,paperman,category,papernumber,chk_state from papers where reviewer1='$reviewer_id' or reviewer2='$reviewer_id'";
$list = mysql_query($str,$link);
while(list($serial,$papername,$paperman,$category,$papernumber,$chk_state) = mysql_fetch_row($list))
 {
?>        
         <tr onMouseOver="this.style.backgroundColor='#F0F7DD';" onMouseOut="this.style.backgroundColor='';">
              <td class=content1><?php=$papername?></td>

<?php

switch ($category)
{
case 1: $category_name="電能與節能技術"; break;
case 2: $category_name="智慧型控制系統"; break;
case 3: $category_name="積體電路設計"; break;
case 4: $category_name="消費性家電產品開發與設計"; break;
case 5: $category_name="嵌入式系統開發與應用"; break;
case 6: $category_name="通訊技術"; break;
case 7: $category_name="網路技術開發與應用"; break;
case 8: $category_name="多媒體與數位內容技術"; break;
case 9: $category_name="居家照護產品開發與設計"; break;
case 10: $category_name="多媒體安全與應用"; break;
case 11: $category_name="雲端與物聯網應用技術";break;
case 12: $category_name="系統整合與應用";break;
case 13: $category_name="其他領域";break;
case 14: $category_name="Invited Sessions(智慧型自動化與智慧生活)";break;
default:
}
?>    

              <td class=content><?php=$category_name?></a></td>
              <td class=content><?php=$papernumber?></td>
<?php
if ($papernumber==$paperno1){$chk_state=$chk_state1;}
if ($papernumber==$paperno2){$chk_state=$chk_state2;}
if ($papernumber==$paperno3){$chk_state=$chk_state3;}
if ($papernumber==$paperno4){$chk_state=$chk_state4;}
if ($papernumber==$paperno5){$chk_state=$chk_state5;}

if ($papernumber==$paperno6){$chk_state=$chk_state6;}
if ($papernumber==$paperno7){$chk_state=$chk_state7;}
if ($papernumber==$paperno8){$chk_state=$chk_state8;}
if ($papernumber==$paperno9){$chk_state=$chk_state9;}
if ($papernumber==$paperno10){$chk_state=$chk_state10;}

if ($papernumber==$paperno11){$chk_state=$chk_state11;}
if ($papernumber==$paperno12){$chk_state=$chk_state12;}
if ($papernumber==$paperno13){$chk_state=$chk_state13;}
if ($papernumber==$paperno14){$chk_state=$chk_state14;}
if ($papernumber==$paperno15){$chk_state=$chk_state15;}		
?>
              <td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#6666FF';" onClick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">論文</span><br>
                                <span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#6666FF';" onClick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'">摘要</span></td>
			  <td class=paper_content1 style="padding:2 0 0 5; cursor:hand; font-size:14px;"onmouseout="this.style.color='';" onMouseOver="this.style.color='#FF00FF';"onclick="location.href='result.php?serial=<?php=$serial?>';"><div align="center">進入</div></td>

    </tr>
          <tr>
              <td colspan="6" background="table_line.gif" height="1"></td>
          </tr>
  
<?php
 }
?>
</table>
</div>
</html>