<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

//if ($id!="crossaccoun"){
//session_destroy();
//header("location:login.php");
//exit;
//}

$pay1 = "全部";
$pay2 = "全部";
$categoryX ="全部";
$total_money=0;
$total_summoney=0;
if(isset($_POST["pay1"])){
	if ($_POST["pay1"] != "")
	{$pay1 = $_POST["pay1"];$pay2 = $pay1;}
}
if(isset($_POST["category"])){
	if ($_POST["category"] == ""  )
	{$category="全部";$categoryX ="全部";}
	$category = $_POST["category"];
}else{
	$category="全部";
}
if ($category=="" or $category=="全部"){$category="全部";$categoryX ="全部";}
if ($category=="1"){$categoryX="電能與節能技術";}
if ($category=="2"){$categoryX="智慧型控制系統";}    
if ($category=="3"){$categoryX="積體電路設計";}	
if ($category=="4"){$categoryX="消費性家電產品開發與設計";}
if ($category=="5"){$categoryX="嵌入式系統開發與應用";}
if ($category=="6"){$categoryX="通訊技術";}
if ($category=="7"){$categoryX="網路技術開發與應用";}
if ($category=="8"){$categoryX="多媒體與數位內容技術";}
if ($category=="9"){$categoryX="居家照護產品開發與設計";}
if ($category=="10"){$categoryX="資訊安全與應用";}
if ($category=="11"){$categoryX="雲端與物聯網應用技術";}
if ($category=="12"){$categoryX="系統整合與應用";}
if ($category=="13"){$categoryX="其他領域";}
if ($category=="14"){$categoryX="Invited Sessions智慧型自動化與智慧生活";}



//$str = "select serial from account ";
//$list = mysql_query($str,$link);
//list($serial) = mysql_fetch_row($list);
//if ($serial==""){
//include  "account_insert.php";

?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style type="text/css">
  .title
  { color: rgb(204, 204, 255);
    background-color: rgb(51, 51, 153);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:3px;
    text-align:center;
  }
  .content
  { color: rgb(131, 131, 131);
    font-size: 10pt;
    line-height: 20px;
    letter-spacing:1px;
    background-color: rgb(249, 249, 249);
    text-align:center;
  }
.style2 {font-size: 12pt}
.style3 {color: #0066CC}
.style4 {color: #00ffCC}
div.MsoNormal {mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:none;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:新細明體;
	mso-font-kerning:1.0pt;}
li.MsoNormal {mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:none;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:新細明體;
	mso-font-kerning:1.0pt;}
p.MsoNormal {mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:none;
	font-size:12.0pt;
	font-family:"Times New Roman";
	mso-fareast-font-family:新細明體;
	mso-font-kerning:1.0pt;}
</style>
</head>
<body>
<p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
normal'><span style='font-size:14.0pt;font-family:標楷體'><?php echo config('settings.titleC');?> 繳款單</span></b></p>
<p class=MsoNormal align=center style='text-align:center'><span class="style3">目前依照:</span>
 <?php
 if ($pay1 == "未繳金額")
{$pay2 = "未繳清";}
 ?>
 <span class="style4"><?php echo $pay2; ?></span><span class="style3">及</span><span class="style4"><?php echo $categoryX; ?></span>
 <span class="style3">顯示</span>　</p>
<form action="crossaccoun_list.php"   method="POST" name="Regist" ><div align="center"><span class="style25 style2">繳費情形:</span> 
      <select name="pay1" id="pay1"  >
        <option value="全部">全部</option>
		<option value="已繳清">已繳清</option>
        <option value="未繳金額">未繳清</option>
      </select>
	  <span class="style25 style2">依照類別:</span> 
	  <select name="category" id="category">
        <option value="全部"> 全部</option>
             <option value="1"> 電能與節能技術</option>
             <option value="2"> 智慧型控制系統</option>        
             <option value="3"> 積體電路設計</option>		
             <option value="4"> 消費性家電產品開發與設計</option>		
             <option value="5"> 嵌入式系統開發與應用</option>
             <option value="6"> 通訊技術</option>
             <option value="7"> 網路技術開發與應用</option>
             <option value="8"> 多媒體與數位內容技術</option>
             <option value="9"> 居家照護產品開發與設計</option>
             <option value="10"> 資訊安全與應用</option>
             <option value="11"> 雲端與物聯網應用技術</option>
             <option value="12"> 系統整合與應用</option>
             <option value="13"> 其他領域</option>
             <option value="14"> Invited Sessions(智慧型自動化與智慧生活)</option>
                          
    </select>
	  <input name="submit" type="submit" value="顯示" >
    </div>
</form></p>
<table border="0"  cellspacing="1" cellpadding="0" >
	    
		<tr>
			<td width="70" class=title >序號</td>
			<td width="100" class=title>會員編號</td>
			<td width="100" class=title>應繳金額</td>
			<td width="100" class=title>註冊情形</td>
			<td class=title width="150">寄款人代號</td>	
			<td class=title width="150">收據狀況</td>
			<td class=title width="150">已繳金額</td>
			<td class=title width="150">繳費情形</td>				
		</tr>
<?php 
if ($category !="全部"){
?>
<?php 
//echo $category;
$total=0;
$paper_count=0;
$str="Select id from members ";
$list =mysql_query($str,$link);        
while(list($id) = mysql_fetch_row($list))
   {
    $result=mysql_query("Select accept from papers where  id='$id' and category='$category'");
    $accept_count=mysql_num_rows($result);
    
    //$stra = "select accept from papers where id='$id' ";      
    //$lista =mysql_query($stra,$link);  
    //list($accept) = mysql_fetch_row($lista);

	if ($accept_count!=0)       
       {
	    		
		//$paper_count=$paper_count+1;
        $stra = "select  idchange,money,atmchk from account where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($idchange,$money,$atmchk) = mysql_fetch_row($lista);   
	$reg_result=mysql_query("Select * from register where id='$id'");
    	$reg_count=mysql_num_rows($reg_result);   
        $strc = "select boss from members where id='$id' ";      
        $listc =mysql_query($strc,$link);  
        list($boss) = mysql_fetch_row($listc);         
		if ($reg_count!=0){$matriculate='已註冊';
                    if($boss!=""){$atmchk="已上傳";}
                    else{$atmchk="未上傳";}
                }
		else {
			    $stra = "select accept from papers where id='$id' ";      
    			$lista =mysql_query($stra,$link);  
    			list($accept) = mysql_fetch_row($lista);
				if ($accept==0){$matriculate='未通過審查';}else{$matriculate='未註冊';}}
				
		$summoney=0;
       	$summoney=0;
        $strb="Select money from register where id='$id' ";
        $listb =mysql_query($strb,$link);        
         list($incomemoney) = mysql_fetch_row($listb);
           $total_money=$total_money+$incomemoney;
           $total_summoney=$total_summoney+$money;
           
		if (($money==$incomemoney)&&$incomemoney==!"")//
		   { $pay='已繳清';}
		elseif ($money=="") 
		   { $pay='未繳清';}
		elseif($money>$incomemoney || $money<$incomemoney  )
		   {    $pay='資料有問題，請查證資料庫';
		   }    
		if ($pay1==$pay or $pay1=='全部' or $pay2==$pay){ $total=$total+1;
?>
		<tr>
			<td width="70" class=content><?php echo $total; ?></td>
			<td width="70" class=content><?php echo $id; ?></td>
		    <td width="70" class=content><?php echo $incomemoney; ?></td>
			<td width="70" class=content><?php echo $matriculate; ?></td>
	        <td class=content width="150"><?php echo $idchange; ?></td> 
			<td class=content width="150"><?php echo $atmchk; ?></td>
			<td class=content width="150"><?php echo $money; ?></td>
			<td class=content width="150"><?php echo $pay; ?></td> 			
		</tr>
<?php
}

}
}
?>
<tr>
			<td  colspan="2" class=title>總計</td>			
  </tr>
		<tr>
			<td width="50" class=content></td>
			<td width="70" class=content></td>
			<td width="70" class=content>應收金額</td>
		    <td width="70" class=content><?php echo $total_money; ?></td>
			<td width="70" class=content></td>
	        <td class=content width="120"></td> 
			<td width="150" align="right" class=content>實收金額&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class=content width="120"><?php echo $total_summoney; ?></td>
			<td class=content width="150"></td> 			
		</tr>
</table>
<?php 
}?>
<?php
if ($category =="全部"){
?>
<?php 
$total=0;

$str="Select id from members ";
$list =mysql_query($str,$link);        
while(list($id) = mysql_fetch_row($list))
   {
   $reg_result=mysql_query("Select * from register where id='$id'");
   $reg_count=mysql_num_rows($reg_result);   
    	
   $result=mysql_query("Select * from papers where id='$id'");
   $accept_count=mysql_num_rows($result);
    
	if ($accept_count!=0 or $reg_count!=0 )       
       {
        $stra = "select  idchange,money,atmchk from account where id='$id' ";      
        $lista =mysql_query($stra,$link);  
        list($idchange,$money,$atmchk) = mysql_fetch_row($lista);  
        $strc = "select boss from members where id='$id' ";      
        $listc =mysql_query($strc,$link);  
        list($boss) = mysql_fetch_row($listc); 
	$reg_result=mysql_query("Select * from register where id='$id'");
    	$reg_count=mysql_num_rows($reg_result);    
                
		if ($reg_count!=0){
                    $matriculate='已註冊';
                  if($boss!=""){$atmchk="已上傳";}
                  else{$atmchk="未上傳";}
                }
		else {$stra = "select accept from papers where id='$id' ";      
    		      $lista =mysql_query($stra,$link);  
    	        list($accept) = mysql_fetch_row($lista);
		if ($accept==0){$matriculate='未通過審查';}else{$matriculate='未註冊';}
		}			
		$summoney=0;
        $strb="Select money from register where id='$id' ";
        $listb =mysql_query($strb,$link);        
         list($incomemoney) = mysql_fetch_row($listb);
           $total_money=$total_money+$incomemoney;
           $total_summoney=$total_summoney+$money;
           
		if (($money==$incomemoney)&&$incomemoney==!"")//
		   { $pay='已繳清';}
		elseif ($money=="") 
		  { $pay='未繳清';} 
		elseif($money>$incomemoney || $money<$incomemoney  )
		   {    $pay='資料有問題，請查證資料庫';
		   }     
		if ($pay1==$pay or $pay1=='全部' or $pay2==$pay ) { $total=$total+1;
?>
		<tr>
			<td width="70" class=content><?php echo $total; ?></td>
			<td width="70" class=content><?php echo $id; ?></td>
		    <td width="70" class=content><?php echo $incomemoney; ?></td>
			<td width="70" class=content><?php echo $matriculate; ?></td>
	        <td class=content width="150"><?php echo $idchange; ?></td> 
			<td class=content width="150"><?php echo $atmchk; ?></td>
			<td class=content width="150"><?php echo $money; ?></td>
                     <?phpif($pay=='已繳清'){?>
                        <td class=content width="150"><font color="#0300FA"><?php echo $pay; ?></font></td> 			
                     <?php  }elseif($pay=='未繳清'){ ?>
                         <td class=content width="150"><font color="#FF0000"><?php echo $pay; ?></font></td> 
                     <?php  }else{ ?>
                        <td class=content width="150"><font color="#00FA03"><?php echo $pay; ?></font></td>
                     <?php } ?>
                </tr>

<?php
}

}
}
?>
<tr>
			<td  colspan="2" class=title>總計</td>			
</tr>
		<tr>
			<td width="50" class=content></td>
			<td width="70" class=content></td>
			<td width="70" class=content>應收金額</td>
		        <td width="70" class=content><?php echo $total_money; ?></td>
			<td width="70" class=content></td>
	                <td class=content width="120"></td> 
			<td width="150" align="right" class=content>實收金額&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class=content width="120"><?php echo $total_summoney; ?></td>
			<td class=content width="150"></td> 			
		</tr>				
	</table>

<?php 

?>
</body>
</html>
