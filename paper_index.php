<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
//include "chksession.php"; 
require "db.php";
include "index_up.php";
$temp=$id;
?>

<style type="text/css">
 .title 
  { 
    color: rgb(39, 39, 198);
    font-size: 10pt;
    letter-spacing:2px;
  }
 .content
  {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(85, 85, 85);
  }
 .use
  {
    font-size: 9pt;
    color: rgb(51, 51, 255);
    letter-spacing:1px;
  }
 .time
  {
    font-size: 9pt;
    color: rgb(85, 85, 85);
  }
</style>
<?php
$paper_count=0;
   $str = "select serial,papername,paperchinesename,accept,notify,addtime,edittime from papers where id='$id'";
   $list = mysql_query($str,$link);
   while(list($serial,$papername,$paperchinesename,$accept,$notify,$addtime,$edittime) = mysql_fetch_row($list))

   {$paper_count=$paper_count+1;}
$str = "select name from members where id='$id'";
$list = mysql_query($str,$link);
list($name) = mysql_fetch_row($list);

    $result=mysql_query("Select * from papers where  id='$id'");
    $accept_count=mysql_num_rows($result);
	if ($accept_count!=0)       
       {
        $stra = "select  money,atmchk from account where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($money,$atmchk) = mysql_fetch_row($lista);  
		  
    	$reg_result=mysql_query("Select * from register where id='$id'");
    	$reg_count=mysql_num_rows($reg_result);
		if ($reg_count!=0){$matriculate='已註冊';}
		else {$matriculate='未註冊';}
		
		$total_money=$total_money+$money;		
		$summoney=0;
        $strb="Select money from account where id='$id' ";
        $listb =mysql_query($strb,$link);        
        while(list($incomemoney) = mysql_fetch_row($listb))
           { $summoney=$summoney+$incomemoney;}
		   $total_summoney=$total_summoney+$summoney;
		if (($money==$summoney)&&($idchange!=""))
		   { $pay='已繳清';$payX=$pay;}
		elseif ($money<$summoney) 
		   { $pay='資料有問題，請查證資料庫';}
		else
		   {  if ($idchange=="") {$stra = "select  money from register where id='$id' ";      
       							  $lista =mysql_query($stra,$link);  
       							  list($money) = mysql_fetch_row($lista);
								  $pay='未繳金額';$payX='未繳金額'.($money*$paper_count);}	
								  if ($matriculate=='未註冊'){$payX="無";}else
		     {
							$pay='未繳金額';
							if(($money-$summoney)==0){
								$payX='已繳費';
							}else{
							$payX='未繳金額'.($money-$summoney);}
							}
		   } 
		   }
?>
帳號：<span class=use><?php echo $id;?></span> 
使用者：<span class=use><?php echo $name;?></span>   繳款情形：<span class=use><?php=$payX?></span>   研討會註冊情形:<span class=use><?php=$matriculate?></span>
<a href="account_upload.php" target="_blank">上傳繳費單據</a>
<p>
<style type="text/css">
  .paper_title
  { color: rgb(0, 51, 0);
    font-weight: bold;
    font-size: 10pt;
    letter-spacing: 2px;
    text-align:center;
    height:20px;
    background-color: rgb(255, 204, 255);
  }
  .paper_content
  { color: rgb(51, 51, 51);
    font-size: 9pt;
    letter-spacing: 2px;
    text-align:center;
  }
  .paper_content1
  { color: rgb(51, 51, 153);
    font-size: 9pt;
    letter-spacing: 2px;
    height:20px;
    text-decoration: underline;
  }
</style>
<div align="center">
	<table id="table1" width="620" cellspacing="1" cellpadding="0">
		<tr>
			<td class=paper_title width="66">論文編號</td>
			<td class=paper_title>論文名稱</td>
			<td class=paper_title width="66"><div align="center">審查狀況</div></td>
			<td class=paper_title width="100"><div align="center">原始上傳時間</div></td>
			<td class=paper_title width="100"><div align="center">最後編修時間</div></td>
			<td class=paper_title width="38"><div align="center">編輯</div></td>
		</tr>
<?php

   $str = "select serial,papername,paperchinesename,papernumber,accept,notify,addtime,edittime from papers where id='$id'";
   $list = mysql_query($str,$link);
   while(list($serial,$papername,$paperchinesename,$papernumber,$accept,$notify,$addtime,$edittime) = mysql_fetch_row($list))

   {
    $edittime=substr($edittime,0,10);
    $addtime=substr($addtime,0,10);
	if ($notify==0){$notify="未審查";}
	if ($notify==1){$notify="<a href=paper_review.php?serial=$serial>已審查(點一下觀看審查結果)</a>";}
?>

		<tr onmouseover="this.style.backgroundColor='#FFF3E7';" onmouseout="this.style.backgroundColor='';">
		<td width="66" rowspan="2" class=paper_content><?php echo $papernumber?></td>
			<td class=paper_content1 style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#FF00FF';" onclick="location.href='paper_index2.php?serial=<?php=$serial?>';">英文：<?php=$papername?></td>
			<td width="100" rowspan="2" class=paper_content><?php echo $notify; ?></td>
			<td width="100" rowspan="2" class=paper_content><?php echo $addtime?></td>
			<td width="100" rowspan="2" class=paper_content><?php echo $edittime?></td><?php if ($notify==未審查){?>
			<td width="38" rowspan="2" class=paper_content><a href="paper_edit.php?serial=<?php echo $serial?>"><img onclick="return confirm('確定編輯這筆資料？')" src="images/edit.jpg" border="0"></a></td><?php }?>
<?php if($notify!=未審查){ ?><td width="38" rowspan="2" class=paper_content>不可更改</td><?php }?>


		<tr onmouseover="this.style.backgroundColor='#FFF3E7';" onmouseout="this.style.backgroundColor='';">
			<td class=paper_content1 style="padding:2 0 0 5;cursor:hand;" onmouseout="this.style.color='';" onmouseover="this.style.color='#FF00FF';" onclick="location.href='paper_index2.php?serial=<?php=$serial?>';">中文：<?php=$paperchinesename?></td>
		  <?php
}
$id=$temp;
?>

	</table>
</div>

<?php
include "index_down.php";
?>
