<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
require "db.php";

$str = "select id,papername,paperman from papers where serial='$serial'";
$list = mysql_query($str,$link);
list($original_id,$papername,$paperman) = mysql_fetch_row($list);

if ($original_id!==$id){
if (session_status() == PHP_SESSION_NONE) {session_start();}
session_destroy();
header("location:happy.php?act=destroy");
exit;
}

include "index_up.php";
?>
<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(255, 00, 00);
    letter-spacing:2px;
    text-align:center;
   }
 .title 
 { 
   color: rgb(0, 0, 173);
   font-size: 10pt;
   letter-spacing:2px;
   line-height:15pt;
 }

</style>

<?php
/*
$str = "select suid from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($suid) = mysql_fetch_row($list);


$str = "select email from members where sn='$suid'";
$list = mysql_query($str,$link);
list($semail) = mysql_fetch_row($list);

if($id !=$semail)
{
   echo "<br>
       <div align=\"center\">
       <table cellspacing=\"1\" width=\"253\" cellpadding=\"2\">
       <tr>
         <td width=\"247\" bgcolor=\"#FFCCFF\" class=title>
	 <p align=\"center\">系統訊息</td>
       </tr>
       <tr>
       <td class=content>這不是您的檔案哦！</td>
       </tr>                
       </table>
       </div>";
 exit;
}
*/
?>
<style type="text/css">
  .paper_title
  { color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing: 2px;
    text-align:center;
    height:20px;
    background-color: rgb(255, 204, 255);
  }
  .paper_content
  { color: rgb(51, 51, 51);
    font-size: 10pt;
    letter-spacing: 2px;
    text-align:center;
  }
 .paperstyle 
   {  
    text-decoration: underline;
   }
</style>

<iframe name="dwindow" id="dwindow" width=0 height=0 style="display: none;"></iframe>
<?php
   $str = "select serial,papername,paperman,papernumber,category,nscno,raw_file,raw_abstract,edittime,final_rawfile,final_rawabstract,accept,final_edittime from papers where serial='$serial'";
   $list = mysql_query($str,$link);
   list($serial,$papername,$paperman,$papernumber,$category,$nscno,$raw_file,$raw_abstract,$edittime,$final_rawfile,$final_rawabstract,$accept,$final_edittime) = mysql_fetch_row($list);
      
/*
  $str = "select typenumber from numbers where sn='$category'";
  $list = mysql_query($str,$link);
  list($typenumber) = mysql_fetch_row($list);
*/  
  $numbers=$typenumber.$number;
  
      if($category=="1")$category="電能與節能技術";      
      if($category=="2")$category="智慧型控制系統";
      if($category=="3")$category="積體電路設計";
      if($category=="4")$category="消費性家電產品開發與設計";      
      if($category=="5")$category="嵌入式系統開發與應用";
      if($category=="6")$category="通訊技術";
      if($category=="7")$category="網路技術開發與應用";      
      if($category=="8")$category="多媒體與數位內容技術";
      if($category=="9")$category="居家照護產品開發與設計";
      if($category=="10")$category="多媒體安全與應用";
      if($category=="11")$category="雲端與物聯網應用技術";
      if($category=="12")$category="系統整合與應用";
      if($category=="13")$category="其他領域";
      if($category=="14")$category="Invited Sessions(智慧型自動化與智慧生活)";
?>
<br>
<div align="center">
<table border="0" width="510" id="table1" cellspacing="1" cellpadding="0">
	<tr>
		<td nowrap class=paper_title>論文名稱</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$papername?></td>
	</tr>
	<tr>
		<td nowrap class=paper_title>論文編號</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$papernumber?></td>
	</tr>	
	<tr>
		<td nowrap class=paper_title>論文作者</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$paperman?></td>
	</tr>
	<tr>
		<td nowrap class=paper_title>論文類別</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$category?></td>
	</tr>
	<tr>
		<td nowrap  class=paper_title>國科會計劃編號</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$nsc_number?></td>
	</tr>
	<tr>
		<td nowrap class=paper_title>論文</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='paper_download.php?serial=<?php=$serial?>'"><?php=$raw_file?></span></td>
	</tr>
	<tr>
		<td width="120" nowrap class=paper_title>摘要</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='excerpt_download.php?serial=<?php=$serial?>'"><?php=$raw_abstract?></span></td>
	</tr>
<?php
     if($accept >=1 )
      {
?>
	<tr>
		<td width="120" nowrap class=paper_title>定稿論文</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_file_download.php?serial=<?php=$serial?>'"><?php=$final_rawfile?></span></td>
	</tr>
	<tr>
		<td width="120" nowrap class=paper_title>定稿摘要</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><span class=paperstyle style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#6666FF';" onclick="dwindow.location.href='main_excerpt_download.php?serial=<?php=$serial?>'"><?php=$final_rawabstract?></span></td>
	</tr>
<?php
      }
?>
	<tr>
		<td width="120" nowrap class=paper_title>最後編修時間</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$edittime?></td>
	</tr>
	<tr>
		<td width="120" nowrap class=paper_title>最後定稿時間</td>
		<td width="10">　</td>
		<td width="380" class=paper_content style="text-align: left"><?php=$final_edittime?></td>
	</tr>	
	
	
	<tr>
		<td colspan="3" align="center"><input type="button" value="上一頁" onClick="history.go(-1)"></td>
	</tr>
</table>

</div>


<?php
include "index_down.php";
?>