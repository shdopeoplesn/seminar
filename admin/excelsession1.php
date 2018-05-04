<?php
require "../db.php";
include "../Classes/PHPExcel.php"; 
require_once "../Classes/PHPExcel.php"; 
require_once "../Classes/PHPExcel/IOFactory.php";

$objPHPExcel = new PHPExcel(); 
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);

$objPHPExcel->getActiveSheet()->setCellValue('A1',iconv("big5","UTF-8",'會員編號')); 
$objPHPExcel->getActiveSheet()->setCellValue('B1',iconv("big5","UTF-8",'會員姓名')); 
$objPHPExcel->getActiveSheet()->setCellValue('C1',iconv("big5","UTF-8",'會員電話')); 
$objPHPExcel->getActiveSheet()->setCellValue('D1',iconv("big5","UTF-8",'收據抬頭'));
$objPHPExcel->getActiveSheet()->setCellValue('E1',iconv("big5","UTF-8",'統一編號'));
$objPHPExcel->getActiveSheet()->setCellValue('F1',iconv("big5","UTF-8",'論文金額'));
//$objPHPExcel->getActiveSheet()->setCellValue('G1',iconv("big5","UTF-8",'攜眷金額'));
$objPHPExcel->getActiveSheet()->setCellValue('G1',iconv("big5","UTF-8",'繳費狀況'));
$objPHPExcel->getActiveSheet()->setCellValue('H1',iconv("big5","UTF-8",'信箱'));

$i=2;
$str="Select id,name,tel,email from members ";
$list =mysql_query($str,$link);        
while(list($id,$name,$tel,$email) = mysql_fetch_row($list))
   {
   $reg_result=mysql_query("Select * from register where id='$id'");
   $reg_count=mysql_num_rows($reg_result);   
    	
   $result=mysql_query("Select * from papers where id='$id'");
   $accept_count=mysql_num_rows($result);

	if ($accept_count!=0 or $reg_count!=0 )       
   {
        $reg_result=mysql_query("Select * from register where id='$id'");
    	$reg_count=mysql_num_rows($reg_result);      			    		 
		if ($reg_count!=0){$matriculate='已註冊';
                        $stra = "select  money from account where id='$id' ";      
                        $lista =mysql_query($stra,$link);  
                        list($money) = mysql_fetch_row($lista);  
                        
                        
                        $strb="Select receipt1,uniformno1,money from register where id='$id' "; //companion攜伴 
                        $listb =mysql_query($strb,$link);        
                        list($receipt,$uniformno,$incomemoney,$companion) = mysql_fetch_row($listb);     
		if (($money==$incomemoney)&&$incomemoney==!"")//
		   { $matriculate='已繳清'; $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
		elseif ( $money=="") 
		   {$matriculate='未繳清'; $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);}
		elseif($money>$incomemoney or $money<$incomemoney)
		   {   $matriculate='資料有問題，請查證資料庫';  }  
                   
                   
                   }
		else {$stra = "select accept from papers where id='$id' ";      
    			$lista =mysql_query($stra,$link);  
    			list($accept) = mysql_fetch_row($lista);
				if ($accept==0){$matriculate='未通過審查';}
                                else{$matriculate='未註冊'; $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_GREEN);
                                     $companion=0;
                                     $incomemoney=0;
                                }
		}			
	
        
       
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);//會員編號
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, iconv("big5","UTF-8",$name));//姓名
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, iconv("big5","UTF-8",$tel));//電話
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, iconv("big5","UTF-8",$receipt));//抬頭
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $uniformno);//統一編號
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $incomemoney-$companion*600);//論文金額
   // $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$companion*600));//攜眷金額
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, iconv("big5","UTF-8",$email));
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$matriculate));//繳費狀況
                   }
  else{
      $matriculate='未投稿';
      $companion=0;
      $incomemoney=0;
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);//會員編號
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, iconv("big5","UTF-8",$name));//姓名
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, iconv("big5","UTF-8",$tel));//電話
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, iconv("big5","UTF-8",$receipt));//抬頭
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $uniformno);//統一編號
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $incomemoney-$companion*600);//論文金額
   // $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$companion*600));//攜眷金額
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, iconv("big5","UTF-8",$email));
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$matriculate));//繳費狀況
  }
                   $uniformno="";
                   $receipt="";
                   $i=$i+1;
   }
   
   $objPHPExcel->getActiveSheet()->setTitle(iconv("big5","UTF-8",'全部類別'));
   
   
   
for($category=1;$category<=13;$category++){
    
      if($category=="1")$category_name="電能與節能技術";   
      if($category=="2")$category_name="智慧型控制系統";	
      if($category=="3")$category_name="積體電路設計";	
      if($category=="4")$category_name="消費性家電產品開發與設計";     
      if($category=="5")$category_name="嵌入式系統開發與應用";	 
      if($category=="6")$category_name="通訊技術";		
      if($category=="7")$category_name="網路技術開發與應用"; 
      if($category=="8")$category_name="多媒體與數位內容技術";	 
      if($category=="9")$category_name="居家照護產品開發與設計";	
      if($category=="10")$category_name="多媒體安全與應用";		
      if($category=="11")$category_name="雲端與物聯網應用技術";	
      if($category=="12")$category_name="系統整合與應用";		
      if($category=="13")$category_name="其他領域";		
      if($category=="14")$category_name="Invited Sessions(智慧型自動化與智慧生活)";

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex($category);
$objPHPExcel->getActiveSheet()->setTitle(iconv("big5","UTF-8",$category_name));
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->setCellValue('A1',iconv("big5","UTF-8",'會員編號')); 
$objPHPExcel->getActiveSheet()->setCellValue('B1',iconv("big5","UTF-8",'會員姓名')); 
$objPHPExcel->getActiveSheet()->setCellValue('C1',iconv("big5","UTF-8",'會員電話')); 
$objPHPExcel->getActiveSheet()->setCellValue('D1',iconv("big5","UTF-8",'收據抬頭'));
$objPHPExcel->getActiveSheet()->setCellValue('E1',iconv("big5","UTF-8",'統一編號'));
$objPHPExcel->getActiveSheet()->setCellValue('F1',iconv("big5","UTF-8",'論文金額'));
//$objPHPExcel->getActiveSheet()->setCellValue('G1',iconv("big5","UTF-8",'攜眷金額'));
$objPHPExcel->getActiveSheet()->setCellValue('H1',iconv("big5","UTF-8",'繳費狀況'));       
       
       
   $i=2;
   if(empty($sort))$sort="serial";
$str = "select id from papers where category='$category' order by serial";
$list =mysql_query($str,$link); 
while(list($id,$name,$tel) = mysql_fetch_row($list)){
    
    $strd="Select name,tel from members where id='$id' ";
    $listd =mysql_query($strd,$link); 
    list($name,$tel) = mysql_fetch_row($listd);
   $reg_result=mysql_query("Select * from register where id='$id'");
   $reg_count=mysql_num_rows($reg_result);   
    	
   $result=mysql_query("Select * from papers where id='$id'");
   $accept_count=mysql_num_rows($result);

	if ($accept_count!=0 or $reg_count!=0 ){
        $reg_result=mysql_query("Select * from register where id='$id'");
    	$reg_count=mysql_num_rows($reg_result);      			    		 
		if ($reg_count!=0){$matriculate='已註冊';
                        $stra = "select  money from account where id='$id' ";      
                        $lista =mysql_query($stra,$link);  
                        list($money) = mysql_fetch_row($lista);  
                        $strb="Select receipt1,uniformno1,money from register where id='$id' "; //companion攜伴
                        $listb =mysql_query($strb,$link);        
                        list($receipt,$uniformno,$incomemoney,$companion) = mysql_fetch_row($listb);     
		if (($money==$incomemoney)&&$incomemoney==!"")//
		   { $matriculate='已繳清'; $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
		elseif ( $money=="") 
		   {$matriculate='未繳清'; $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);}
		elseif($money>$incomemoney or $money<$incomemoney)
		   {   $matriculate='資料有問題，請查證資料庫';  }     
                }
		else {$stra = "select accept from papers where id='$id' ";      
    			$lista =mysql_query($stra,$link);  
    			list($accept) = mysql_fetch_row($lista);
				if ($accept==0){$matriculate='未通過審查';}
                                else{$matriculate='未註冊'; $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_GREEN);
                                     $companion=0;
                                     $incomemoney=0;
                                }
		}			
	
        
       
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);//會員編號
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, iconv("big5","UTF-8",$name));//姓名
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, iconv("big5","UTF-8",$tel));//電話
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, iconv("big5","UTF-8",$receipt));//抬頭
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $uniformno);//統一編號
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $incomemoney-$companion*600);//論文金額
   // $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$companion*600));//攜眷金額
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, iconv("big5","UTF-8",$matriculate));//繳費狀況
                   }
  else{
      $matriculate='未投稿';
      $companion=0;
      $incomemoney=0;
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);//會員編號
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, iconv("big5","UTF-8",$name));//姓名
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, iconv("big5","UTF-8",$tel));//電話
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, iconv("big5","UTF-8",$receipt));//抬頭
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $uniformno);//統一編號
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $incomemoney-$companion*600);//論文金額
   // $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$companion*600));//攜眷金額
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, iconv("big5","UTF-8",$matriculate));//繳費狀況
  }
                   $uniformno="";
                   $receipt="";
                   $i=$i+1;
   }
   
   }
   
   


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('test.xlsx'); 
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=productregister.xlsx");
header("Pragma:no-cache");
header("Expires:0");
readfile("../admin/test.xlsx");


?>
