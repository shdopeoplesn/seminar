<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["reminss"];
$adminid=$_SESSION["reminid"];
$adminpw=$_SESSION["reminpw"];


require "../db.php";

//抓取使用者的reviewer.sn
$str="select papername,paperchinesename,papernumber from papers where serial='$serial'";
$list=mysql_query($str,$link);
list($papername,$paperchinesename,$papernumber)=mysql_fetch_row($list);


$str="select comment1,comment2,comment3,comment4,comment5,comment6,comment7,comment8,comment9,comment10,comment11,comment12,comment13,comment14,comment15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,recommend1,recommend2,recommend3,recommend4,recommend5,recommend6,recommend7,recommend8,recommend9,recommend10,recommend11,recommend12,recommend13,recommend14,recommend15,chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15  from reviewer where id='$adminid'";
$list=mysql_query($str,$link);
list($comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$comment7,$comment8,$comment9,$comment10,$comment11,$comment12,$comment13,$comment14,$comment15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$recommend1,$recommend2,$recommend3,$recommend4,$recommend5,$recommend6,$recommend7,$recommend8,$recommend9,$recommend10,$recommend11,$recommend12,$recommend13,$recommend14,$recommend15,$chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15)=mysql_fetch_row($list); 



if ($papernumber==$paperno1) {$comment_temp_show=$comment1;$recommend_show=$recommend1;$excellent_show=$excellent1;$accept_show=$accept1;$chk_state=$chk_state1;}
if ($papernumber==$paperno2) {$comment_temp_show=$comment2;$recommend_show=$recommend2;$excellent_show=$excellent2;$accept_show=$accept2;$chk_state=$chk_state2;}
if ($papernumber==$paperno3) {$comment_temp_show=$comment3;$recommend_show=$recommend3;$excellent_show=$excellent3;$accept_show=$accept3;$chk_state=$chk_state3;}
if ($papernumber==$paperno4) {$comment_temp_show=$comment4;$recommend_show=$recommend4;$excellent_show=$excellent4;$accept_show=$accept4;$chk_state=$chk_state4;}
if ($papernumber==$paperno5) {$comment_temp_show=$comment5;$recommend_show=$recommend5;$excellent_show=$excellent5;$accept_show=$accept5;$chk_state=$chk_state5;}

if ($papernumber==$paperno6) {$comment_temp_show=$comment6;$recommend_show=$recommend6;$excellent_show=$excellent6;$accept_show=$accept6;$chk_state=$chk_state6;}
if ($papernumber==$paperno7) {$comment_temp_show=$comment7;$recommend_show=$recommend7;$excellent_show=$excellent7;$accept_show=$accept7;$chk_state=$chk_state7;}
if ($papernumber==$paperno8) {$comment_temp_show=$comment8;$recommend_show=$recommend8;$excellent_show=$excellent8;$accept_show=$accept8;$chk_state=$chk_state8;}
if ($papernumber==$paperno9) {$comment_temp_show=$comment9;$recommend_show=$recommend9;$excellent_show=$excellent9;$accept_show=$accept9;$chk_state=$chk_state9;}
if ($papernumber==$paperno10) {$comment_temp_show=$comment10;$recommend_show=$recommend10;$excellent_show=$excellent10;$accept_show=$accept10;$chk_state=$chk_state10;}

if ($papernumber==$paperno11) {$comment_temp_show=$comment11;$recommend_show=$recommend11;$excellent_show=$excellent11;$accept_show=$accept11;$chk_state=$chk_state11;}
if ($papernumber==$paperno12) {$comment_temp_show=$comment12;$recommend_show=$recommend12;$excellent_show=$excellent12;$accept_show=$accept12;$chk_state=$chk_state12;}
if ($papernumber==$paperno13) {$comment_temp_show=$comment13;$recommend_show=$recommend13;$excellent_show=$excellent13;$accept_show=$accept13;$chk_state=$chk_state13;}
if ($papernumber==$paperno14) {$comment_temp_show=$comment14;$recommend_show=$recommend14;$excellent_show=$excellent14;$accept_show=$accept14;$chk_state=$chk_state14;}
if ($papernumber==$paperno15) {$comment_temp_show=$comment15;$recommend_show=$recommend15;$excellent_show=$excellent15;$accept_show=$accept15;$chk_state=$chk_state15;}
//-----捉IP位址--------
$ip=$REMOTE_ADDR;

//$str = "insert into action(ip,id,action,time) values('$ip','$adminid','在審查的首頁',now())";
//mysql_query($str,$link);

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

<form name="form1" method="post" action="result_insert.php">
  <table width="400" border="1" align="center">
    <tr>
      <td  width="110" height="25" nowrap>英文論文名稱</td>
	  <td class=content><?php=$papername?></td>

    </tr>
	    <tr>
      <td  width="110" height="25" nowrap>中文論文名稱</td>
	  <td class=content><?php=$paperchinesename?></td>
    </tr>

    <tr>
      <td height="25" nowrap>論文編號</td>
	  <td class=content><?php=$papernumber?></td>	  
    </tr>
    <tr>
      <td >綜合評論</td>
	  <?php if ($chk_state=="1") { ?> 
  	  <td class=content><?php=$comment_temp_show?></td>	  
	  <?php } else { ?>
      <td><textarea name="comment"  cols="33" rows="5"><?php echo $comment_temp_show ?></textarea></td>
	  <?php } ?>
    </tr>
    <tr>
      <td nowrap>推薦程度</td>
  	  <?php if ($chk_state=="1") { ?> 
	    	  <td class=content><?php=$recommend_show?></td>	  
	  <?php } else { ?>
      <td>
	  
	  <select name="recommend">
        <option value="極力推薦" <?php if ($recommend_show=="極力推薦") { ?> selected   <?php } ?>   >1. 極力推薦</option>
        <option value="推薦"     <?php if ($recommend_show=="推薦") { ?> selected   <?php } ?> >2. 推薦</option>
        <option value="不予推薦" <?php if ($recommend_show=="不予推薦") { ?> selected   <?php } ?>  >3. 不予推薦</option>
      </select>
      </td>	  
	  <?php } ?>


    </tr>
  </table>
  <center>
  <p>
   	  <?php if ($chk_state=="0"){ ?>
    <input type="submit" name="Submit"  value="送出" onClick="return confirm('確定要送出資料？\n送出後，當無法再修改！')"><input type="hidden" name="papernumber" value="<?php=$papernumber?>">
    <input type="submit" name="Submit2" value="暫存"><input type="hidden" name="papernumber" value="<?php=$papernumber?>">
    
	<?php }?>
  </p>
  </center>
</form>
</html>