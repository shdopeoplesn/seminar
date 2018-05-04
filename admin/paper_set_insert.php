<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
//$excellent
require "../db.php";
$str="update papers set notify='1',accept='$accept',excellent='$excellent' where serial='$serial' ";
mysql_query($str,$link);

   $str = "select id,papername,paperchinesename,papernumber,reviewer1,reviewer2 from papers where serial='$serial'";
   $list = mysql_query($str,$link);
   list($id,$papername,$paperchinesename,$papernumber,$reviewer1,$reviewer2) = mysql_fetch_row($list);

   $str = "select name,email from members where id='$id'";
   $list = mysql_query($str,$link);
   list($name,$email) = mysql_fetch_row($list);

   $str = "select paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15 from reviewer where id='$reviewer1'";
   $list = mysql_query($str,$link);
   list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15) = mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment_one=$comment1;}
if ($papernumber==$paperno2){$comment_one=$comment2;}
if ($papernumber==$paperno3){$comment_one=$comment3;}
if ($papernumber==$paperno4){$comment_one=$comment4;}
if ($papernumber==$paperno5){$comment_one=$comment5;}

if ($papernumber==$paperno6){$comment_one=$comment6;}
if ($papernumber==$paperno7){$comment_one=$comment7;}
if ($papernumber==$paperno8){$comment_one=$comment8;}
if ($papernumber==$paperno9){$comment_one=$comment9;}
if ($papernumber==$paperno10){$comment_one=$comment10;}  

if ($papernumber==$paperno11){$comment_one=$comment11;}
if ($papernumber==$paperno12){$comment_one=$comment12;}
if ($papernumber==$paperno13){$comment_one=$comment13;}
if ($papernumber==$paperno14){$comment_one=$comment14;}
if ($papernumber==$paperno15){$comment_one=$comment15;}    
/*
   $stra = "select paperno1,paperno2,paperno3,paperno4,paperno5,comment1,comment2,comment3,comment4,comment5 from reviewer where id='$reviewer2'";
   $lista = mysql_query($stra,$link);
   list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$comment1,$comment2,$comment3,$comment4,$comment5) = mysql_fetch_row($lista);

if ($papernumber==$paperno1){$comment_two=$comment1;}
if ($papernumber==$paperno2){$comment_two=$comment2;}
if ($papernumber==$paperno3){$comment_two=$comment3;}
if ($papernumber==$paperno4){$comment_two=$comment4;}
if ($papernumber==$paperno5){$comment_two=$comment5;}
*/
$str = "select paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15 from reviewer where id='$reviewer2'";
   $list = mysql_query($str,$link);
   list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15) = mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment_two=$comment1;}
if ($papernumber==$paperno2){$comment_two=$comment2;}
if ($papernumber==$paperno3){$comment_two=$comment3;}
if ($papernumber==$paperno4){$comment_two=$comment4;}
if ($papernumber==$paperno5){$comment_two=$comment5;}

if ($papernumber==$paperno6){$comment_two=$comment6;}
if ($papernumber==$paperno7){$comment_two=$comment7;}
if ($papernumber==$paperno8){$comment_two=$comment8;}
if ($papernumber==$paperno9){$comment_two=$comment9;}
if ($papernumber==$paperno10){$comment_two=$comment10;}  

if ($papernumber==$paperno11){$comment_two=$comment11;}
if ($papernumber==$paperno12){$comment_two=$comment12;}
if ($papernumber==$paperno13){$comment_two=$comment13;}
if ($papernumber==$paperno14){$comment_two=$comment14;}
if ($papernumber==$paperno15){$comment_two=$comment15;}

$url="ilt2018.ncut.edu.tw/";
if ($accept=="2"){
$mail_title = config('settings.titleC')."通知函";
$mail_content="<center>".config('settings.titleC')."通知函<br>".config('settings.titleE')."</center><br><br>
		".$name."教授/先生 您好：<br><br>
		感謝您投稿".config('settings.titleC')."的論文<br><br>
		論文編號：".$papernumber."<br><br>
		英文論文題目：".$papername."<br><br>
		中文論文題目：".$paperchinesename."<br><br>
		
		經過議程委員會審查後決議接受您的論文在會中口頭發表，隨函附上審查委員意見，敬請參考修正。<p>
        為了能夠讓您的論文順利刊登於論文集並於大會發表，敬請注意以下事項：<p>
        1. 請於5月6日(星期日)前，以PDF、DOC檔(若為科技部計畫請務必填上計畫編號)上傳，上傳網址";
$mail_content.="<a href=\"http://".$url."\">http://ilt2018.ncut.edu.tw/ </A>";	
$mail_content.="<p>為加速大會作業，完稿的頁數請與初稿的頁數一致。<p>2. 請於5月6日(星期日)前完成報名程序(可線上報名，註冊費含隨身碟)，以確定本論文可以被刊登於論文集。詳細報名及註冊費用等資料，請詳閱大會網<br>
		   頁：";
$mail_content.="<a href=\"http://".$url."\">http://ilt2018.ncut.edu.tw/ </A>";				   
$mail_content.="，若於5月6日(含)前註冊，註冊費為新台幣壹仟貳佰元，5月5日後註冊費為新台幣壹仟捌佰元。<p>
           最後，再一次感謝您對於".config('settings.titleC')."的支持，也期盼能在6月2日(星期五)研討會中與您在國立勤益科技大學見面。<p>
  <pre>
           敬祝
		                   順心如意
		   
		    第十三屆智慧生活科技研討會(ILT2018)議程委員會 敬上
 </pre>
		   
審查委員意見1：<br>".$comment_one."<p>  
審查委員意見2：<br>".$comment_two."<p>"  ;
include "mail.php";
}





if ($accept=="1"){
$mail_title=config('settings.titleC')."通知函";
$mail_content="<center>".config('settings.titleC')."通知函<br>".config('settings.titleE')."</center><br><br>
		".$name."教授/先生 您好：<br><br>
		感謝您投稿".config('settings.titleC')."的論文<br><br>
		論文編號：".$papernumber."<br><br>
		英文論文題目：".$papername."<br><br>
		中文論文題目：".$paperchinesename."<br><br>
		經過議程委員會審查後決議接受您的論文在會中壁報展示，隨函附上審查委員意見，敬請參考修正。<p>
        為了能夠讓您的論文順利刊登於論文集並於大會發表，敬請注意以下事項：<p>
        1. 請於5月6日(星期日)前，以PDF、DOC檔(若為科技部計畫請務必填上計畫編號)上傳，上傳網址";
$mail_content.="<a href=\"http://".$url."\">http://ilt2018.ncut.edu.tw/  </A>";
$mail_content.="<p>為加速大會作業，完稿的頁數請與初稿的頁數一致。<p>2. 請於5月6日(星期日)前完成線上註冊程序，以確定本論文可以被刊登於論文集。詳細報名及註冊費用等資料，請詳閱大會網<br>
		   頁：";
$mail_content.="<a href=\"http://".$url."\">http://ilt2018.ncut.edu.tw/  </A>";				   
$mail_content.="，若於5月6日(含)前註冊，註冊費為新台幣壹仟貳佰元，5月5日後註冊費為新台幣壹仟捌佰元。<p>
        3. 壁報展示規格說明：&nbsp;&nbsp;&nbsp;&nbsp;'A1'大小。 <p>
           最後，再一次感謝您對於".config('settings.titleC')."的支持，也期盼能在6月2日(星期五)研討會中與您在國立勤益科技大學見面。<p>
  <pre>
           敬祝
		                   順心如意
		   
		    第十三屆智慧生活科技研討會(ILT2018)議程委員會 敬上
 </pre>			
		   
審查委員意見1：<br>".$comment_one."<p>  
審查委員意見2：<br>".$comment_two."<p>"  ;
include "mail.php";
}




if ($accept=="0"){
$mail_title=config('settings.titleC')."通知函";
$mail_content="<center>".config('settings.titleC')."通知函<br>".config('settings.titleE')."</center><br><br>
		".$name."教授/先生 您好：<br><br>
		感謝您投稿".config('settings.titleC')."的論文<br><br>
		論文編號：".$papernumber."<br><br>
		英文論文題目：".$papername."<br><br>
		中文論文題目：".$paperchinesename."<br><br>
		經過議程委員會審查後，您的論文未獲審查通過，隨函附上審查委員意見。雖然本次會議無法收編您的論文，仍然歡迎您參與本研討會。<p>
        最後，再一次感謝您對於".config('settings.titleC')."的支持，也期盼您能繼續支持。<p>
  <pre>
           敬祝
		                   順心如意
		   
		    第十三屆智慧生活科技研討會(ILT2018)議程委員會 敬上
 </pre>			
		   
審查委員意見1：<br>".$comment_one."<p>  
審查委員意見2：<br>".$comment_two."<p>"  ;
include "mail.php";
}


header("location:happy.php?act=paper_set");
?>