<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["adminss"];
$adminid=$_SESSION["adminid"];
$adminpw=$_SESSION["adminpw"];
require "../db.php";

$str="select papername,paperchinesename,papernumber,accept,excellent,bestreviewer1,bestreviewer2,bestpaper from papers where serial='$serial'";
$list=mysql_query($str,$link);
list($papername,$paperchinesename,$papernumber,$accept,$excellent,$bestreviewer1,$bestreviewer2,$bestpaper)=mysql_fetch_row($list);


$str="select id,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15,chk_state1,chk_state2 ,chk_state3 ,chk_state4 ,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15   from bestreviewer where id='$bestreviewer1' ";
$list=mysql_query($str,$link);
list($reviewer_id,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15,$chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15)=mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment=$comment1;$recommenda=$recommend1;$chk_statea=$chk_state1;}
if ($papernumber==$paperno2){$comment=$comment2;$recommenda=$recommend2;$chk_statea=$chk_state2;}
if ($papernumber==$paperno3){$comment=$comment3;$recommenda=$recommend3;$chk_statea=$chk_state3;}
if ($papernumber==$paperno4){$comment=$comment4;$recommenda=$recommend4;$chk_statea=$chk_state4;}
if ($papernumber==$paperno5){$comment=$comment5;$recommenda=$recommend5;$chk_statea=$chk_state5;}
if ($papernumber==$paperno6){$comment=$comment6;$recommenda=$recommend6;$chk_statea=$chk_state6;}
if ($papernumber==$paperno7){$comment=$comment7;$recommenda=$recommend7;$chk_statea=$chk_state7;}
if ($papernumber==$paperno8){$comment=$comment8;$recommenda=$recommend8;$chk_statea=$chk_state8;}
if ($papernumber==$paperno9){$comment=$comment9;$recommenda=$recommend9;$chk_statea=$chk_state9;}
if ($papernumber==$paperno10){$comment=$comment10;$recommenda=$recommend10;$chk_statea=$chk_state10;}

if ($papernumber==$paperno11){$comment=$comment11;$recommenda=$recommend11;$chk_statea=$chk_state11;}
if ($papernumber==$paperno12){$comment=$comment12;$recommenda=$recommend12;$chk_statea=$chk_state12;}
if ($papernumber==$paperno13){$comment=$comment13;$recommenda=$recommend13;$chk_statea=$chk_state13;}
if ($papernumber==$paperno14){$comment=$comment14;$recommenda=$recommend14;$chk_statea=$chk_state14;}
if ($papernumber==$paperno15){$comment=$comment15;$recommenda=$recommend15;$chk_statea=$chk_state15;}

$str="select id,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15,chk_state1,chk_state2 ,chk_state3 ,chk_state4 ,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15  from bestreviewer where id='$bestreviewer2' ";
$list=mysql_query($str,$link);
list($reviewer_id,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15,$chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15)=mysql_fetch_row($list);

if ($papernumber==$paperno1){$comment1=$comment1;$recommendb=$recommend1;$chk_stateb=$chk_state1;}
if ($papernumber==$paperno2){$comment1=$comment2;$recommendb=$recommend2;$chk_stateb=$chk_state2;}
if ($papernumber==$paperno3){$comment1=$comment3;$recommendb=$recommend3;$chk_stateb=$chk_state3;}
if ($papernumber==$paperno4){$comment1=$comment4;$recommendb=$recommend4;$chk_stateb=$chk_state4;}
if ($papernumber==$paperno5){$comment1=$comment5;$recommendb=$recommend5;$chk_stateb=$chk_state5;}
if ($papernumber==$paperno6){$comment1=$comment6;$recommendb=$recommend6;$chk_stateb=$chk_state6;}
if ($papernumber==$paperno7){$comment1=$comment7;$recommendb=$recommend7;$chk_stateb=$chk_state7;}
if ($papernumber==$paperno8){$comment1=$comment8;$recommendb=$recommend8;$chk_stateb=$chk_state8;}
if ($papernumber==$paperno9){$comment1=$comment9;$recommendb=$recommend9;$chk_stateb=$chk_state9;}
if ($papernumber==$paperno10){$comment1=$comment10;$recommendb=$recommend10;$chk_stateb=$chk_state10;}

if ($papernumber==$paperno11){$comment1=$comment11;$recommendb=$recommend11;$chk_stateb=$chk_state11;}
if ($papernumber==$paperno12){$comment1=$comment12;$recommendb=$recommend12;$chk_stateb=$chk_state12;}
if ($papernumber==$paperno13){$comment1=$comment13;$recommendb=$recommend13;$chk_stateb=$chk_state13;}
if ($papernumber==$paperno14){$comment1=$comment14;$recommendb=$recommend14;$chk_stateb=$chk_state14;}
if ($papernumber==$paperno15){$comment1=$comment15;$recommendb=$recommend15;$chk_stateb=$chk_state15;}


if ($chk_statea=="0"){
$recommenda="尚未評審";
}

echo $paper_chkb;
if ($chk_stateb=="0"){
$recommendb="尚未評審";
}


if ($paperchinesename=="")
{$paperchinesename="無";}
if ($papername=="")
{$papername="無";}
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>審查編輯</title>
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

<SCRIPT language=javascript>
function formcheck() {
//if ( document.setting.accept[0].checked !=true) {
//	if ( document.setting.excellent[0].checked ==true) {
//		alert("審查結果非口頭時，不可為優良論文！");
//		document.setting.focus();
//		return false;	
//	}
//}

return true;
	}

</SCRIPT>
</head>
<body>

<form name="setting" method="post" action="bestpaper_set_insert.php" onSubmit="return formcheck();">
  <table width="470" border="1" align="center">
    <tr>
    	<td width="150">英文論文名稱</td>
	  	<td class=content width="250" ><div align="left"><?php echo $papername;?></div></td>
    </tr>
	<tr>
    	<td width="150">中文論文名稱</td>
		<td class=content width="250" ><div align="left"><?php echo $paperchinesename;?></div></td>
    </tr>

	
    <tr>
      <td>論文編號</td>
	  	<td class=content width="250" ><div align="left"><?php echo $papernumber;?></div></td>
    </tr>
<?php
  $recommend_77 = substr($recommenda,0,2);
  if ($recommend_77=="極"){
    $recommend_77  =  "極力推薦";
  } 
  if ($recommend_77=="推"){
    $recommend_77  =  "推薦";
  }
  if ($recommend_77=="不"){
    $recommend_77  =  "不予推薦";
  } 

  ?>
	<tr>
      <td>bestreviewer1評審分數</td>
	  	<td class=content width="250" ><div align="left"><?php echo $recommenda;?></div></td>
    </tr>
     </tr>
    	<tr>
			<td width="135" class=conten>bestreviewer1綜合評論</td>
			<td class=content><?php echo $comment;?></td>
		</tr>
	<tr>
	<?php
  $recommend_66=substr($recommendb,0,2);
  if ($recommend_66=="極"){
    $recommend_66  =  "極力推薦";
  } 
  if ($recommend_66=="推"){
    $recommend_66  =  "推薦";
  }
  if ($recommend_66=="不"){
    $recommend_66  =  "不予推薦";
  } 

  ?>-->
	<tr>
      <td>bestreviewer2評審分數</td>
	  	<td class=content width="250" ><div align="left"><?php echo $recommendb;?></div></td>
    </tr>		
	
   <tr>
			<td width="135" class=conten>bestreviewer2綜合評論</td>
			<td class=content><?php echo $comment1;?></td>
		</tr>
        
  	
	
	    <tr>
      <td>最佳論文</td>
      <td><input name="bestpaper" type="radio" value="1" <?php if ($bestpaper=="1"){ ?> checked  <?php } ?> >
        是
        <input name="bestpaper" type="radio" value="0" <?php if ($bestpaper=="0"){ ?> checked  <?php } ?> >
        否
	</td>
	    </tr>
        

  </table>


  <center>
  <p>
    <input type="submit" name="Submit"  value="送出" onClick="return confirm('確定要送出資料？\n送出後，當無法在進來修改！')" >
    <input type="button" value="上一頁" onClick="history.go(-1)">
  </p>
  </center>
    <input type="hidden" name="serial" value="<?php echo $serial;?>">
</form>
</html>
