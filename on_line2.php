<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
//session_register('position1');

require "db.php";
include "chksession.php";

$str = "select serial from register where id='$id'";
$list = mysql_query($str,$link);
list($serial) = mysql_fetch_row($list);
if ($serial!=""){
   header("location:registerform2.php");
   exit;
}
include "index_up.php";
?>
<style type="text/css">
 .content 
   {  
    color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
    text-align:left;
   }
    .contentright 
   {  
    color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
    text-align:right;
   }
.title 
 { 
   color: rgb(0, 0, 173);
   font-size: 10pt;
   letter-spacing:2px;
   line-height:15pt;
 }
.choose 
 { 
   color: rgb(48, 48, 48);
   font-size: 10pt;
 }
.style1 {color: rgb(48, 48, 48)}
.red10{
    font-size: 10pt;
    color: #FF0000}
.up 
{
	border-top:thin dashed #000000; 
	border-right: none;
	border-bottom:none; 
	border-left: none;
}
</style>


<SCRIPT language=javascript>


function formcheck() {
if ( document.Regist.name.value == "" ) {
alert("請輸入姓名！");
document.Regist.name.focus();
return false;	
}
if ( document.Regist.unit.value == "" ) {
alert("請輸入服務單位！");
document.Regist.tel.focus();
return false;	
}
if ( document.Regist.career.value == "" ) {
alert("請輸入職稱！");
document.Regist.career.focus();
return false;	
}
if ( document.Regist.email.value == "" ) {
alert("請輸入電子信箱！");
document.Regist.email.focus();
return false;	
}
if ( document.Regist.tel.value == "" ) {
alert("請輸入聯絡電話！");
document.Regist.tel.focus();
return false;	
}
if ( document.Regist.eat.value == "" ) {
alert("請選擇用餐情形！");
document.Regist.eat.focus();
return false;	
}
return true;
}

</SCRIPT>
  <?php
	 $str = "select name from members where id='$id'";
	 $list = mysql_query($str,$link);
	 list($name) = mysql_fetch_row($list);
	?>

<div align="center">
<table width="400" align="center" cellpadding="2" cellspacing="1" class=title>
<tr>
   <td width="400" bgcolor="#FFCCFF">
	<p align="center">線上報名參加研討會</td>
  </tr>
</table>
<table width="400" align="center" cellpadding="2" cellspacing="1"  class=title>

</table>
<form action="online_insert.php"  method="post" name="Regist" onsubmit="return formcheck();">

  <table width="550" align="center" cellspacing="1">
    <?php
   $i="0";
   $str = "select paperman,papername,paperchinesename,papernumber,category,accept,nsc_papername,nsc_number,nsc_usename from papers where id='$id' order by papernumber";
   $list = mysql_query($str,$link);  
   while(list($paperman,$papername,$paperchinesename,$papernumber,$category,$accept,$nsc_papername,$nsc_number,$nsc_usename) = mysql_fetch_row($list))
    {  
       if ($accept!=0){
         $i=$i+1;
         
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
    <tr>
      <td width="150" class=content>論文編號：</td>
      <td  colspan="4" class=choose><?php echo $papernumber ?></td>
    </tr>
    <tr>
      <td width="150" class=content>投稿類別：</td>
      <td colspan="4" class=choose><?php echo $category ?></td>
    </tr>
         <tr>
      <td width="160" class=content>國科會計畫名稱：</td>
      <td colspan="4" class=choose><?php echo $nsc_papername ?></td>
    </tr>
     <tr>
      <td width="150" class=content>國科會NSC編號：</td>
      <td colspan="4" class=choose><?php echo $nsc_number ?></td>
    </tr>
     <tr>
      <td width="150" class=content>NSC計畫主持人：</td>
      <td colspan="4" class=choose><?php echo $nsc_usename ?></td>
    </tr>
    <tr>
      <td width="150" class=content>論文中文名稱：</td>
      <td colspan="4" class=choose><?php echo $paperchinesename ?></td>
    </tr>
    <tr>
      <td width="150" class=content>論文英文名稱：</td>
      <td colspan="4" class=choose><?php echo $papername ?></td>
    </tr>
    <tr>
      <td width="150" class=content>作者：</td>
      <td colspan="4" class=choose><?php echo $paperman ?></td>
    </tr>
    <tr>
      <td width="150" class=content>論文發表方式：</td>
      <?php if ($accept==1) {?>
      <td class=content>壁報</td>
      <?php }?>
      <?php if ($accept==2) {?>
      <td class=content>口頭</td>
      <?php }?>
    </tr>
    <tr>
      <?php if ($i==1){?>
      <td width="150" class=content>出席者：</td>
      <td width="150"class=choose><input type="text" name="report1" /></td>  
      <td width="70" class=contentright>職稱：</td>
      <td width="100"><select name="position1" id="position1">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>

      <?php }elseif ($i==2){?>
      <td width="150"  class=content>出席者：</td>
      <td width="150" class=choose><input type="text" name="report2" /></td>
      <td width="70" class=content>職稱：</td>
      <td width="100"><select name="position2" id="position2">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>

      <?php }elseif ($i==3){?>
      <td width="150" class=content>出席者：</td>
      <td width="150" class=choose><input type="text" name="report3" /></td>
      <td width="70" class=content>職稱：</td>
      <td width="100"><select name="position3" id="position3">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>

      <?php }elseif ($i==4){?>
      <td width="150" class=content>出席者：</td>
      <td width="150" class=choose><input type="text" name="report4" /></td>
      <td width="70" class=content>職稱：</td>
      <td width="100"><select name="position4" id="position4">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>

      <?php }elseif ($i==5){?>
      <td width="150" class=content>出席者：</td>
      <td width="150" class=choose><input type="text" name="report5" /></td>
      <td width="70" class=content>職稱：</td>
      <td width="100"><select name="position5" id="position5">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>

      <?php }elseif ($i==6){?>
      <td width="150" class=content>出席者：</td>
      <td width="150" class=choose><input type="text" name="report6" /></td>
      <td width="70" class=content>職稱：</td>
      <td width="100"><select name="position6" id="position6">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>
      
      
	 <!-- <tr>
      <td colspan="2" class="red10" >請注意，出席者的姓名同收據上的姓名</td>
      </tr>-->
      <?php }?>
    </tr>
    <tr>
      <td width="150" class=content>用餐情形：</td>
      <td width="350"><span class="choose">
        <?php if ($i==1){?>
        <input type="radio" name= "eat1" value="葷" checked />
        </span> 葷<span class="style1">
        <input type="radio" name="eat1" value="素" />
        </span> 素
        <?php }elseif ($i==2){?>
        <input type="radio" name= "eat2" value="葷" checked />
      葷<span class="style1">
      <input type="radio" name="eat2" value="素" />
      </span> 素
      <?php }elseif ($i==3){?>
      <input type="radio" name= "eat3" value="葷" checked />
      葷<span class="style1">
      <input type="radio" name="eat3" value="素" />
      </span> 素
      <?php }elseif ($i==4){?>
      <input type="radio" name= "eat4" value="葷" checked />
      葷<span class="style1">
      <input type="radio" name="eat4" value="素" />
      </span> 素
      <?php }elseif ($i==5){?>
      <input type="radio" name= "eat5" value="葷" checked />
      葷<span class="style1">
      <input type="radio" name="eat5" value="素" />
      </span> 素
	  <?php }elseif ($i==6){?>
      <input type="radio" name= "eat6" value="葷" checked />
      葷<span class="style1">
      <input type="radio" name="eat6" value="素" />
      </span> 素
      
      <?php }?>
	  
      </td>
    </tr>
   <!--<tr>
      <td width="150" class=content>收據抬頭名稱：</td>
      <?php if ($i==1){?>
      <td class=choose><input type="text" name="title1" /></td>
      <?php }elseif ($i==2){?>
      <!--<td class=choose><input type="text" name="title2" /></td>-->
      <?php }elseif ($i==3){?>
      <!--<td class=choose><input type="text" name="title3" /></td>-->
      <?php }elseif ($i==4){?>
      <!--<td class=choose><input type="text" name="title4" /></td>-->
      <?php }elseif ($i==5){?>
      <!--<td class=choose><input type="text" name="title5" /></td>-->
      <?php }elseif ($i==6){?>
      <!--<td class=choose><input type="text" name="title6" /></td>-->
      <?php }?>
    <!--  </tr>
    <tr>
      <td colspan="2" class=choose style3>若須2張(含)以上收據者, 會議當天請至報到處處理</td>
    </tr>-->
    <!--<tr>
      <td width="150" class=content>機關統一編號：</td>-->
      <?php if ($i==1){?>
      <!--<td class=choose><input type="text" name="number1" /></td>-->
      <?php }elseif ($i==2){?>
      <!--<td class=choose><input type="text" name="number2" /></td>-->
      <?php }elseif ($i==3){?>
      <!--<td class=choose><input type="text" name="number3" /></td>-->
      <?php }elseif ($i==4){?>
      <!--<td class=choose><input type="text" name="number4" /></td>-->
      <?php }elseif ($i==5){?>
      <!--<td class=choose><input type="text" name="number5" /></td>-->
      <?php }elseif ($i==6){?>
      <!--<td class=choose><input type="text" name="number6" /></td>-->
      <?php }?>
  <!--  </tr>
    <tr>
      <td width="150" >&nbsp;</td>
    </tr>-->
    <?php
}}	
?>
    <?php 
if ($i==0)
{
?>
    <tr>
      <td width="150" class=content>參與者：</td>  
      <td width="150"class=choose><input type="text" name="report1" /></td>
      <td width="70" class=contentright>職稱：</td>
      <td width="100"><select name="position1" id="position1">
          <option value="1">1. 教授</option>
          <option value="2">2. 研究生</option>
          <option value="3">3. 大學生</option>
          <option value="4">4. 一般社會人士</option>
        </select>
      </td>
    </tr>

    <tr>
      <td width="150" class=content>用餐情形：</td>
      <td width="350"><span class="choose">
        <input type="radio" name= "eat1" value="葷" checked />
        </span> 葷<span class="style1">
        <input type="radio" name="eat1" value="素" />
      </span> 素 </td>
    </tr>
<!---->
    <?php 
} 
?>      <tr>
      <td width="150" class=content>收據抬頭名稱：</td>
      <td class=choose><input type="text" name="title1" /></td>
    </tr>

    <tr>
      <td width="150" class=content>機關統一編號：</td>
      <td class=choose><input type="text" name="number1" /></td>
    </tr>

	<tr>
      <td colspan="2" class="red10" >若需要更多的停車證請mail至智慧生活科技研討會</td>
    </tr>
    <tr>
      <input type="hidden" name="count" value="<?php=$i?>">
      <td colspan="2" align="center" class=choose><input name="submit" type="submit" value="報名" onClick="return confirm('一但確定後，就不可再進來修改？')" />
      </td>
    </tr>
  </table>
</form>

<?php
include "index_down.php";
?>