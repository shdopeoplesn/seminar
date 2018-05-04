<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}

$temp=$id;
$id = $_SESSION["id"];
//include "chksession.php";
require "db.php";
include "index_up.php";
   $str = "select papername,paperchinesename,paperman,accept,notify,addtime,edittime from papers where serial='$serial'";
   $list = mysql_query($str,$link);
   while(list($papername,$paperchinesename,$paperman,$accept,$notify,$addtime,$edittime) = mysql_fetch_row($list))
{
?>
<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(85, 85, 85);
    letter-spacing:2px;
   }
  .content1
   {
    font-size: 10pt;
    line-height: 15pt;
    color: rgb(85, 85, 85);
    letter-spacing:2px;
   }
  .title
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(51, 51, 51);
    letter-spacing:2px;
   }
    .new
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(0, 102, 255);
    letter-spacing:2px;
   }
    .cont
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(48, 58, 255);
    letter-spacing:2px;
   }   
.style1 {
	font-size: 12pt;
	font-weight: bold;
}

.style7 {font-size: 10pt; color: #0066FF; }
.style12 {
	font-size: 12pt;
	color: #0000FF;
	font-weight: bold;
}
.style14 {
	font-size: 12;
	font-weight: bold;
}
.style17 {font-size: 12px; color: #000000; font-weight: bold; }
.style18 {font-size: 12px; color: #ff0000; font-weight: bold; }

.style20 {font-size: 16px; color: #ff0000; font-weight: bold; }
</style>

<?php
   $str = "select papernumber,papername,paperchinesename,reviewer1,reviewer2,accept  from papers where serial='$serial'";
   $list = mysql_query($str,$link);
   list($papernumber,$papername,$paperchinesename,$reviewer1,$reviewer2,$accept) = mysql_fetch_row($list);
   $str = "select name,email from members where id='$id'";
   $list = mysql_query($str,$link);
   list($name,$email) = mysql_fetch_row($list);
if ($id==$temp) {   
/*
$str = "select paperno1,paperno2,paperno3,paperno4,paperno5,comment1,comment2,comment3,comment4,comment5 from reviewer where id='$reveiwer1'";
   $list = mysql_query($str,$link);
   list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$comment1,$comment2,$comment3,$comment4,$comment5) = mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment_one=$comment1;}
if ($papernumber==$paperno2){$comment_one=$comment2;}
if ($papernumber==$paperno3){$comment_one=$comment3;}
if ($papernumber==$paperno4){$comment_one=$comment4;}
if ($papernumber==$paperno5){$comment_one=$comment5;}
      

   $stra = "select paperno1,paperno2,paperno3,paperno4,paperno5,comment1,comment2,comment3,comment4,comment5 from reviewer where id='$reviewer2'";
   $lista = mysql_query($stra,$link);
   list($paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$comment1,$comment2,$comment3,$comment4,$comment5) = mysql_fetch_row($lista);

if ($papernumber==$paperno1){$comment_two=$comment1;}
if ($papernumber==$paperno2){$comment_two=$comment2;}
if ($papernumber==$paperno3){$comment_two=$comment3;}
if ($papernumber==$paperno4){$comment_two=$comment4;}
if ($papernumber==$paperno5){$comment_two=$comment5;}
*/

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

?>
<p align="center" bgcolor=#C0C0C0>
<span class="style1"><?php echo config('settings.titleC');?>論文審核通知</span>
</span></p>
<p><BR>
  <span class="style14"><span class="style12">
  <?php echo $name;?>
  </span></span><span class="style7">教授/先生 您好：
      您投稿<?php echo config('settings.titleC');?>的論文<br>
  <br>
  論文編號：</span><span class="style18">
  <?php=$papernumber?>
        </span><span class="style7">	
        <br>
        <br>
        論文作者：</span><span class="style12">
        <?php=$paperman?>
            </span><span class="style7">
            <br>
            <br>
            英文論文題目：</span><span class="style18">
            <?php=$papername?>
                </span><span class="style7">
                <br>
                <br>
                中文論文題目：</span><span class="style12">
                <?php=$paperchinesename?>
                    </span><span class="style7">
                    <br>
                    <br>
                    <?php
$url="ilt2018.ncut.edu.tw";
if ($accept=="2"){
?>	              
經過議程委員會審查後決議接受您的論文在會中</span><span class="style20">口頭</span><span class="style7">發表。</span></p>
<p>            <span class="style7">審查委員意見1：<br>
  <span class="style17">
  <?php=$comment_one?>
  </span></span>
</p>
<p class="style7">  
審查委員意見2：<br><span class="style17"><?php=$comment_two?><p class="style7"><?php }
 if ($accept=="1"){
?>		
經過議程委員會審查後決議接受您的論文在會中<span class="style20">壁報</span><span class="style7">展示。</span></p>

<span class="style7">審查委員意見1：<br>
<span class="style17">
<?php=$comment_one?>
</span></span>
<p class="style7">  
審查委員意見2：<br><span class="style17"><?php=$comment_two?><p class="style7"><?php
}
if ($accept=="0"){
?>
經過議程委員會審查後，您的論文未獲審查通過，雖然本次會議無法收編您的論文，仍然歡迎您參與本研討會。
		   
<p class="style7"><span class="style7">審查委員意見1：<br>
  <span class="style17">
  <?php=$comment_one?>
      </span></span>
<p class="style7">  
審查委員意見2：<br><span class="style17"><?php=$comment_two?><p class="style7"> </span>

<?php }}}$id=$temp;?>
<?php
include "index_down.php";
?>
