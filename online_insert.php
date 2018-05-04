<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
//session_register('position');
$position = $_POST["position1"];
$_SESSION["position"]=$position;
if($id!="")
{

require "db.php";

$str = "select serial from register where id='$id'";
$list = mysql_query($str,$link);
list($serial) = mysql_fetch_row($list);
if ($serial!=""){
   header("location:registerform2.php");
   exit;
}
 //echo $position2;
 
if ($count<2){
	if  ($report1==""){
    header("location:happy.php?act=online_error");
	exit;
	}
}
if ($count==2){
	if  ($report1=="" || $report2==""){
    header("location:happy.php?act=online_error");
	exit;
	}
}
if ($count==3){
	if  ($report1=="" || $report2=="" || $report3=="" ){
    header("location:happy.php?act=online_error");
	exit;
	}
}
if ($count==4){
	if  ($report1=="" || $report2=="" || $report3=="" || $report4=="" ){
    header("location:happy.php?act=online_error");
	exit;
	}
}
if ($count==5){
	if  ($report1=="" || $report2=="" || $report3=="" || $report4=="" || $report5==""){
    header("location:happy.php?act=online_error");
	exit;
	}
}
if ($count==6){
	if  ($report1=="" || $report2=="" || $report3=="" || $report4=="" || $report5=="" || $report6==""){
    header("location:happy.php?act=online_error");
	exit;
	}
}

// 論文有被接受者
$i=0;
$j=0;
$xxx=0;//判斷金錢是1500還是2000
$str = "select papername,paperchinesename,papernumber,category,accept,nsc_papername,nsc_number,nsc_usename from papers where id='$id'";
$list = mysql_query($str,$link);
$data=date("Ymd");
 if ($data<=config('settings.earlybirddeadline')) //早鳥優惠截止日期   
   {
     $xxx=$xxx+0;//時間前
   }
   else
   {
     $xxx=$xxx+1;
   }
while(list($papername,$paperchinesename,$papernumber,$category,$accept,$nsc_papername,$nsc_number,$nsc_usenam) = mysql_fetch_row($list))
{
 if ($accept!=0)
  {$j=$j+1;
		 // $papername=addslashes($papername);


		  $loop=0; 
          $namereg="";
          $namelth=strlen($papername);
		  while($loop<$namelth)
		  {  		  
		     $onechar=substr($papername,$loop,1);
             if ($onechar=="'")
			     {$namereg=$namereg."'";}			 
			 $namereg=$namereg.$onechar;
			 $loop=$loop+1;		    
		  }
		  $papername=$namereg;
        
          
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
          
   if ($j==1){$papername1=$papername;$paperchinesename1=$paperchinesename;$papernumber1=$papernumber;$category1=$category;}
   if ($j==2){$papername2=$papername;$paperchinesename2=$paperchinesename;$papernumber2=$papernumber;$category2=$category;}
   if ($j==3){$papername3=$papername;$paperchinesename3=$paperchinesename;$papernumber3=$papernumber;$category3=$category;}
   if ($j==4){$papername4=$papername;$paperchinesename4=$paperchinesename;$papernumber4=$papernumber;$category4=$category;}
   if ($j==5){$papername5=$papername;$paperchinesename5=$paperchinesename;$papernumber5=$papernumber;$category5=$category;}
   if ($j==6){$papername6=$papername;$paperchinesename6=$paperchinesename;$papernumber6=$papernumber;$category6=$category;}
   if ($j==7){$papername7=$papername;$paperchinesename7=$paperchinesename;$papernumber7=$papernumber;$category7=$category;}
   if ($j==8){$papername8=$papername;$paperchinesename8=$paperchinesename;$papernumber8=$papernumber;$category8=$category;}
   if ($j==9){$papername9=$papername;$paperchinesename9=$paperchinesename;$papernumber9=$papernumber;$category9=$category;}
   if ($j==10){$papername10=$papername;$paperchinesename10=$paperchinesename;$papernumber10=$papernumber;$category10=$category;}
   if ($j==11){$papername11=$papername;$paperchinesename11=$paperchinesename;$papernumber11=$papernumber;$category11=$category;}
   if ($j==12){$papername12=$papername;$paperchinesename12=$paperchinesename;$papernumber12=$papernumber;$category12=$category;}
   if ($j==13){$papername13=$papername;$paperchinesename13=$paperchinesename;$papernumber13=$papernumber;$category13=$category;}
   if ($j==14){$papername14=$papername;$paperchinesename14=$paperchinesename;$papernumber14=$papernumber;$category14=$category;}
    
   if ($data<=config('settings.earlybirddeadline')) //錢的日期(早鳥優惠)
   {
     $i=$i+1500;
     
   }
   else
   {
     $i=$i+2000; //後端顯示價錢會錯誤 (如果送 後註冊的其他人1800 > 2700)
     
   }
  }
}
//參與者(無論文被接受)
if ($j==0)
{
if ($data<=config('settings.earlybirddeadline'))	 //錢的日期(早鳥優惠)      
   {
     $i=1500;
     
   }
   else
   {
     $i=2000;
    
   }
}
// 參加者身分
if ($j==0)
{$status=0;} //一般人士(無論文被接受)
else
{$status=1;} //有論文被接受

$str = "insert into register(id,reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,position1,position2,position3,position4,position5,position6,papername1,papername2,papername3,papername4,papername5,papername6,paperchinesename1,paperchinesename2,paperchinesename3,paperchinesename4,paperchinesename5,paperchinesename6,category1,category2,category3,category4,category5,category6,papernumber1,papernumber2,papernumber3,papernumber4,papernumber5,papernumber6,eat1,eat2,eat3,eat4,eat5,eat6,receipt1,receipt2,receipt3,receipt4,receipt5,receipt6,uniformno1,uniformno2,uniformno3,uniformno4,uniformno5,uniformno6,plate,money,time,status,eattotal,testmoney) 
values('$id','$report1','$report2','$report3','$report4','$report5','$report6','$position1','$position2','$position3','$position4','$position5','$position6','$papername1','$papername2','$papername3','$papername4','$papername5','$papername6','$paperchinesename1','$paperchinesename2','$paperchinesename3','$paperchinesename4','$paperchinesename5','$paperchinesename6','$category1','$category2','$category3','$category4','$category5','$category6','$papernumber1','$papernumber2','$papernumber3','$papernumber4','$papernumber5','$papernumber6','$eat1','$eat2','$eat3','$eat4','$eat5','$eat6','$title1','$title1','$title1','$title1','$title1','$title1','$number1','$number1','$number1','$number1','$number1','$number1','$plate','$i',now(),'$status','$eattotal','$xxx')";
mysql_query($str,$link);





/*

$str = "select name,email from members where id='$id'";
$list = mysql_query($str,$link);
list($name,$email) = mysql_fetch_row($list);



$mail_title="智慧生活科技研討會-參加研討會";
$mail_content="親愛的".$name."教授/先生 您好：歡迎您參加「".config('settings.titleC')."」，您已線上報名成功。以下為您的基本資料，<br>
出席者：".$author1."<br>
報告者：".$select."<br>
發表方式：".$publish."<br>
用餐情形：".$eat."<br>
收據抬頭名稱：".$title."<br>
機關統一編號：".$number."<br>
============================================================<br>
若需要更改資訊請登入本研討會網站即可";
//include "mail.php";
*/
  
header("location:registerform2.php?act=online");
//header("location:happy.php?act=online");
//include "mail.php";//暫時
}
else
{

  header("location:systembusy.php");
   exit;
}
?>
