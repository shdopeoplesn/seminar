<?php
require "../db.php";
include "../Classes/PHPExcel.php"; 
require_once "../Classes/PHPExcel.php"; 
require_once "../Classes/PHPExcel/IOFactory.php";

$objPHPExcel = new PHPExcel(); 
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);

$objPHPExcel->getActiveSheet()->setCellValue('A1','會員編號');
$objPHPExcel->getActiveSheet()->setCellValue('B1','論文題目');
$objPHPExcel->getActiveSheet()->setCellValue('C1','論文作者'); 
$objPHPExcel->getActiveSheet()->setCellValue('D1','投稿類別');
$objPHPExcel->getActiveSheet()->setCellValue('E1','國科會編號');
$objPHPExcel->getActiveSheet()->setCellValue('F1','論文編號');
$objPHPExcel->getActiveSheet()->setCellValue('G1','論文狀況');
$objPHPExcel->getActiveSheet()->setCellValue('H1','最佳論文');
$objPHPExcel->getActiveSheet()->setCellValue('I1','審稿者');
$objPHPExcel->getActiveSheet()->setCellValue('J1','評論狀況');
$objPHPExcel->getActiveSheet()->setCellValue('K1','審稿者');
$objPHPExcel->getActiveSheet()->setCellValue('L1','評論狀況');
$objPHPExcel->getActiveSheet()->setCellValue('M1','定稿狀況');
$objPHPExcel->getActiveSheet()->setCellValue('N1','國科主持人');
$objPHPExcel->getActiveSheet()->setCellValue('O1','國科計畫');
$objPHPExcel->getActiveSheet()->setCellValue('P1','單位');
$objPHPExcel->getActiveSheet()->setCellValue('Q1','論文中文名稱');
$objPHPExcel->getActiveSheet()->setCellValue('R1','E-mail');

$i=2;
if(empty($sort))$sort="serial";
$str = "select serial,papername,paperman,category,papernumber,raw_file,raw_abstract,notify,accept,nsc_number,id,excellent,final_file,reviewer1,reviewer2,nsc_usename,nsc_papername,paperchinesename from papers order by serial";
$list = mysql_query($str,$link);
while(list($serial,$papername,$paperman,$category,$papernumber,$raw_file,$raw_abstract,$notify,$accept,$nsc_number,$id,$excellent,$final_file,$reviewer1,$reviewer2,$nsc_usename,$nsc_papername,$paperchinesename) = mysql_fetch_row($list))
{
      
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
      
      if($notify == "1")
        {
         if( $accept=="2"){$notify="口說";}
	 if( $accept=="1"){$notify="壁報";}
         if( $accept=="0"){$notify="拒絕";}
        }
      if($notify == "0"){$notify="審查中";}
      if($excellent == "1"){$excellent="最佳論文";}
      else{$excellent="";}

        if ($final_file!=""){$final_file="已上傳"; $objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
        else{$final_file="未上傳";$objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);}
   $straa="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,name from reviewer where id='$reviewer1'";
$listaa=mysql_query($straa,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$name1)=mysql_fetch_row($listaa);

if ($papernumber==$paperno1){$chk_state=$chk_state1;}
if ($papernumber==$paperno2){$chk_state=$chk_state2;}
if ($papernumber==$paperno3){$chk_state=$chk_state3;}
if ($papernumber==$paperno4){$chk_state=$chk_state4;}
if ($papernumber==$paperno5){$chk_state=$chk_state5;}

if ($papernumber==$paperno11){$chk_state=$chk_state11;}
if ($papernumber==$paperno12){$chk_state=$chk_state12;}
if ($papernumber==$paperno13){$chk_state=$chk_state13;}
if ($papernumber==$paperno14){$chk_state=$chk_state14;}
if ($papernumber==$paperno15){$chk_state=$chk_state15;}

if ($papernumber==$paperno6){$chk_state=$chk_state6;}
if ($papernumber==$paperno7){$chk_state=$chk_state7;}
if ($papernumber==$paperno8){$chk_state=$chk_state8;}
if ($papernumber==$paperno9){$chk_state=$chk_state9;}
if ($papernumber==$paperno10){$chk_state=$chk_state10;}
if(!isset($chk_state)){
	$chk_state = '0';
}

if ($chk_state=="1"){
    $chk_state="已評";
    $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
    if ($set_flagX=="1"){
		$set_flag="1"; 
		}
    }
   else
       {$chk_state="未評";
       $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
       }
$strbb="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,name from reviewer where id='$reviewer2'  ";
$listbb=mysql_query($strbb,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$name2)=mysql_fetch_row($listbb);

if ($papernumber==$paperno1){$chk_state1=$chk_state1;}
if ($papernumber==$paperno2){$chk_state1=$chk_state2;}
if ($papernumber==$paperno3){$chk_state1=$chk_state3;}
if ($papernumber==$paperno4){$chk_state1=$chk_state4;}
if ($papernumber==$paperno5){$chk_state1=$chk_state5;}

if ($papernumber==$paperno11){$chk_state1=$chk_state11;}
if ($papernumber==$paperno12){$chk_state1=$chk_state12;}
if ($papernumber==$paperno13){$chk_state1=$chk_state13;}
if ($papernumber==$paperno14){$chk_state1=$chk_state14;}
if ($papernumber==$paperno15){$chk_state1=$chk_state15;}

if ($papernumber==$paperno6){$chk_state1=$chk_state6;}
if ($papernumber==$paperno7){$chk_state1=$chk_state7;}
if ($papernumber==$paperno8){$chk_state1=$chk_state8;}
if ($papernumber==$paperno9){$chk_state1=$chk_state9;}
if ($papernumber==$paperno10){$chk_state1=$chk_state10;}

if ($chk_state1=="1"){
    $chk_state1="已評";
     $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
   if ($set_flagX=="1"){
                        $set_flag="1"; 
                       
                        }
   }
   else
       {$chk_state1="未評";
       $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
       }
if ($reviewer1==""){$reviewer1="未指定";}else{$reviewer1=$name1;}
if ($reviewer2==""){$reviewer2="未指定";}else{$reviewer2=$name2;}

$strbb="select unit,email from members where id='$id'";
$listbb=mysql_query($strbb,$link);
list($unit,$email)=mysql_fetch_row($listbb);


    $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $reviewer1);
    $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $chk_state);
    $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $reviewer2);
    $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $chk_state1);
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $papername);
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $paperman);
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $category_name);
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $nsc_number);
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $papernumber);
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $notify);
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $excellent);
    $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $final_file);
    $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $nsc_usename);
    $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $nsc_papername);
    $objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $unit);
    $objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $paperchinesename);
    $objPHPExcel->getActiveSheet()->setCellValue('R' . $i, $email);
    $i=$i+1;
}

$objPHPExcel->getActiveSheet()->setTitle('全部類別');

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
$objPHPExcel->getActiveSheet()->setTitle($category_name);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->setCellValue('A1','會員編號'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','論文題目'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','論文作者'); 
$objPHPExcel->getActiveSheet()->setCellValue('D1','投稿類別');
$objPHPExcel->getActiveSheet()->setCellValue('E1','國科會編號');
$objPHPExcel->getActiveSheet()->setCellValue('F1','論文編號');
$objPHPExcel->getActiveSheet()->setCellValue('G1','論文狀況');
$objPHPExcel->getActiveSheet()->setCellValue('H1','最佳論文');
$objPHPExcel->getActiveSheet()->setCellValue('I1','審稿者');
$objPHPExcel->getActiveSheet()->setCellValue('J1','評論狀況');
$objPHPExcel->getActiveSheet()->setCellValue('K1','審稿者');
$objPHPExcel->getActiveSheet()->setCellValue('L1','評論狀況');
$objPHPExcel->getActiveSheet()->setCellValue('M1','定稿狀況');

$i=2;
if(empty($sort))$sort="serial";
$str = "select serial,papername,paperman,papernumber,raw_file,raw_abstract,notify,accept,nsc_number,id,excellent,final_file,reviewer1,reviewer2 from papers where category='$category' order by serial";
$list = mysql_query($str,$link);
while(list($serial,$papername,$paperman,$papernumber,$raw_file,$raw_abstract,$notify,$accept,$nsc_number,$id,$excellent,$final_file,$reviewer1,$reviewer2) = mysql_fetch_row($list))
{
      if($notify == "1")
        {
         if( $accept=="2"){$notify="口說";}
	 if( $accept=="1"){$notify="壁報";}
         if( $accept=="0"){$notify="拒絕";}
        }
      if($notify == "0")
        { 
          $notify="審查中";
        }
      if($excellent == "1"){$excellent="最佳論文";}
      else{$excellent="";}        
              if ($final_file!=""){$final_file="已上傳"; $objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);}
        else{$final_file="未上傳";$objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);}
                
$straa="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,name from reviewer where id='$reviewer1'";
$listaa=mysql_query($straa,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$name1)=mysql_fetch_row($listaa);

if ($papernumber==$paperno1){$chk_state=$chk_state1;}
if ($papernumber==$paperno2){$chk_state=$chk_state2;}
if ($papernumber==$paperno3){$chk_state=$chk_state3;}
if ($papernumber==$paperno4){$chk_state=$chk_state4;}
if ($papernumber==$paperno5){$chk_state=$chk_state5;}

if ($papernumber==$paperno11){$chk_state=$chk_state11;}
if ($papernumber==$paperno12){$chk_state=$chk_state12;}
if ($papernumber==$paperno13){$chk_state=$chk_state13;}
if ($papernumber==$paperno14){$chk_state=$chk_state14;}
if ($papernumber==$paperno15){$chk_state=$chk_state15;}

if ($papernumber==$paperno6){$chk_state=$chk_state6;}
if ($papernumber==$paperno7){$chk_state=$chk_state7;}
if ($papernumber==$paperno8){$chk_state=$chk_state8;}
if ($papernumber==$paperno9){$chk_state=$chk_state9;}
if ($papernumber==$paperno10){$chk_state=$chk_state10;}



if ($chk_state=="1"){
    $chk_state="已評";
     $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
   if ($set_flagX=="1"){
                        $set_flag="1"; 
                       
                        }
   }
   else
       {$chk_state="未評";
       $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
       }
$strbb="select chk_state1,chk_state2,chk_state3,chk_state4,chk_state5,chk_state6,chk_state7,chk_state8,chk_state9,chk_state10,chk_state11,chk_state12,chk_state13,chk_state14,chk_state15,paperno1,paperno2,paperno3,paperno4,paperno5,paperno6,paperno7,paperno8,paperno9,paperno10,paperno11,paperno12,paperno13,paperno14,paperno15,name from reviewer where id='$reviewer2'  ";
$listbb=mysql_query($strbb,$link);
list($chk_state1,$chk_state2,$chk_state3,$chk_state4,$chk_state5,$chk_state6,$chk_state7,$chk_state8,$chk_state9,$chk_state10,$chk_state11,$chk_state12,$chk_state13,$chk_state14,$chk_state15,$paperno1,$paperno2,$paperno3,$paperno4,$paperno5,$paperno6,$paperno7,$paperno8,$paperno9,$paperno10,$paperno11,$paperno12,$paperno13,$paperno14,$paperno15,$name2)=mysql_fetch_row($listbb);

if ($papernumber==$paperno1){$chk_state1=$chk_state1;}
if ($papernumber==$paperno2){$chk_state1=$chk_state2;}
if ($papernumber==$paperno3){$chk_state1=$chk_state3;}
if ($papernumber==$paperno4){$chk_state1=$chk_state4;}
if ($papernumber==$paperno5){$chk_state1=$chk_state5;}

if ($papernumber==$paperno11){$chk_state1=$chk_state11;}
if ($papernumber==$paperno12){$chk_state1=$chk_state12;}
if ($papernumber==$paperno13){$chk_state1=$chk_state13;}
if ($papernumber==$paperno14){$chk_state1=$chk_state14;}
if ($papernumber==$paperno15){$chk_state1=$chk_state15;}

if ($papernumber==$paperno6){$chk_state1=$chk_state6;}
if ($papernumber==$paperno7){$chk_state1=$chk_state7;}
if ($papernumber==$paperno8){$chk_state1=$chk_state8;}
if ($papernumber==$paperno9){$chk_state1=$chk_state9;}
if ($papernumber==$paperno10){$chk_state1=$chk_state10;}

if ($chk_state1=="1"){
    $chk_state1="已評";
     $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
   if ($set_flagX=="1"){
                        $set_flag="1"; 
                       
                        }
   }
   else
       {$chk_state1="未評";
       $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
       }
if ($reviewer1==""){$reviewer1="未指定";}else{$reviewer1=$name1;}
if ($reviewer2==""){$reviewer2="未指定";}else{$reviewer2=$name2;}

    $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $reviewer1);
    $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $chk_state);
    $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $reviewer2);
    $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $chk_state1);
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $papername);
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $paperman);
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $category_name);
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $nsc_number);
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $papernumber);
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $notify);
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $excellent);
    $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $final_file);
    $i=$i+1;
}

}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('test1.xlsx'); 
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=product.xlsx");
header("Pragma:no-cache");
header("Expires:0");
readfile("../admin/test1.xlsx");
?>
