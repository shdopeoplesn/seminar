<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["adminss"];
$adminid=$_SESSION["adminid"];
$adminpw=$_SESSION["adminpw"];

require "../db.php";

//抓取使用者的reviewer.sn
$str="select sn from reviewer where re_id='$adminid' and re_password='$adminpw' ";
$list=mysql_query($str,$link);
list($reviewer_sn)=mysql_fetch_row($list);

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
<table width="820" cellspacing="1" cellpadding="0">
 <tr>
     <td colspan="6" background="table_line.gif" height="1"></td>
 </tr>
 <tr>
     <td width="250" class=title>論文名稱</a></td>
     <td width="235" class=title>論文作者</td>
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
$str = "select serial,papername,paperman,category,papernumber,number,chkstate from my_papers where reviewer_sn='$reviewer_sn' order by number ";
$list = mysql_query($str,$link);
while(list($serial,$papername,$paperman,$category,$papernumber,$number,$chkstate) = mysql_fetch_row($list))
 {
?>        
         <tr onmouseover="this.style.backgroundColor='#F0F7DD';" onmouseout="this.style.backgroundColor='';">
              <td class=content1><?php=$papername?></td>
              <td class=content1><?php=$paperman?></td>
<?php
  //-----------------類別名稱、代號----------------------
      $strn = "select name,typenumber from numbers where sn='$category'"; 
      $listn = mysql_query($strn,$link); 
      list($category_name,$typenumber) = mysql_fetch_row($listn);
?>    
              <td class=content><?php=$category_name?></a></td>
              <td class=content><?php=$typenumber.$number?></td>
<?php
  //-----------------------審查狀態----------------
      $strs = "select chkstate from my_papers where serial='$serial'";
      $lists = mysql_query($strs,$link);
      list($chkstate) = mysql_fetch_row($lists);
      if($chkstate != 0)
        {
          $strk = "select name from chkstate where sn='$chkstate'";
          $listk = mysql_query($strk,$link);
          list($chkstate) = mysql_fetch_row($listk);
          $state="<a href=\"reviewer_print.php?serial=$serial\">列印</a>";
        }
      else 
        { 
          $chkstate="審查中";
          $state="<a href=\"examine.php?serial=$serial\">審查</a>";
        }
?>
              <td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">論文</span><br>
                                <span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'">摘要</span></td>
              <td class=content><?php=$state?></td>
          </tr>
          <tr>
              <td colspan="6" background="table_line.gif" height="1"></td>
          </tr>
<?php
 }
?>
<?php
//評審2
$str = "select serial,papername,paperman,category,papernumber,number,chkstate1 from my_papers where reviewer_sn1='$reviewer_sn' order by number ";
$list = mysql_query($str,$link);
while(list($serial,$papername,$paperman,$category,$papernumber,$number,$chkstate1) = mysql_fetch_row($list))
 {
?>        
         <tr onmouseover="this.style.backgroundColor='#F0F7DD';" onmouseout="this.style.backgroundColor='';">
              <td class=content1><?php=$papername?></td>
              <td class=content1><?php=$paperman?></td>
<?php
  //-----------------類別名稱、代號----------------------
      $strn = "select name,typenumber from numbers where sn='$category'"; 
      $listn = mysql_query($strn,$link); 
      list($category_name,$typenumber) = mysql_fetch_row($listn);
?>    
              <td class=content><?php=$category_name?></a></td>
              <td class=content><?php=$typenumber.$number?></td>
<?php
  //-----------------------審查狀態----------------
      $strs = "select chkstate1 from my_papers where serial='$serial'";
      $lists = mysql_query($strs,$link);
      list($chkstate1) = mysql_fetch_row($lists);
      if($chkstate1 != 0)
        {
          $state="<a href=\"reviewer_print1.php?serial=$serial\">列印</a>";
        }
      else 
        { 
          $chkstate="審查中";
          $state="<a href=\"examine1.php?serial=$serial\">審查</a>";
        }
?>
              <td class=content><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'">論文</span><br>
                                <span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'">摘要</span></td>
              <td class=content><?php=$state?></td>
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