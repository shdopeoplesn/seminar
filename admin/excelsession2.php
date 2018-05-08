<?php
require "../db.php";
include "../Classes/PHPExcel.php"; 
require_once "../Classes/PHPExcel.php"; 
require_once "../Classes/PHPExcel/IOFactory.php";

$objPHPExcel = new PHPExcel(); 
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);

$objPHPExcel->getActiveSheet()->setCellValue('A1','會員編號'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','會員姓名'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','會員電話'); 
$objPHPExcel->getActiveSheet()->setCellValue('D1','收據抬頭');
$objPHPExcel->getActiveSheet()->setCellValue('E1','統一編號');
$objPHPExcel->getActiveSheet()->setCellValue('F1','金額');
$objPHPExcel->getActiveSheet()->setCellValue('G1','論文編號1');
$objPHPExcel->getActiveSheet()->setCellValue('H1','論文編號2');
$objPHPExcel->getActiveSheet()->setCellValue('I1','論文編號3');
$objPHPExcel->getActiveSheet()->setCellValue('J1','論文編號4');

/*$objPHPExcel->getActiveSheet()->setCellValue('F1','葷食數量');
//$objPHPExcel->getActiveSheet()->setCellValue('G1','素食數量');
$objPHPExcel->getActiveSheet()->setCellValue('H1','出席者1');
$objPHPExcel->getActiveSheet()->setCellValue('I1','出席者2');
$objPHPExcel->getActiveSheet()->setCellValue('J1','出席者3');
$objPHPExcel->getActiveSheet()->setCellValue('K1','出席者4');
$objPHPExcel->getActiveSheet()->setCellValue('L1','出席者5');
$objPHPExcel->getActiveSheet()->setCellValue('M1','出席者6');
$objPHPExcel->getActiveSheet()->setCellValue('N1','攜伴1');
$objPHPExcel->getActiveSheet()->setCellValue('O1','攜伴2');
$objPHPExcel->getActiveSheet()->setCellValue('P1','攜伴3');
$objPHPExcel->getActiveSheet()->setCellValue('Q1','攜伴4');
$objPHPExcel->getActiveSheet()->setCellValue('R1','攜伴5');
$objPHPExcel->getActiveSheet()->setCellValue('S1','單位');
$objPHPExcel->getActiveSheet()->setCellValue('T1','類別1');
$objPHPExcel->getActiveSheet()->setCellValue('U1','類別2');
$objPHPExcel->getActiveSheet()->setCellValue('V1','類別3');
$objPHPExcel->getActiveSheet()->setCellValue('W1','類別4');
$objPHPExcel->getActiveSheet()->setCellValue('X1','類別5');
$objPHPExcel->getActiveSheet()->setCellValue('Y1','類別6');
$objPHPExcel->getActiveSheet()->setCellValue('Z1','論文名稱1');
$objPHPExcel->getActiveSheet()->setCellValue('AA1','論文名稱2');
$objPHPExcel->getActiveSheet()->setCellValue('AB1','論文名稱3');
$objPHPExcel->getActiveSheet()->setCellValue('AC1','論文名稱4');
$objPHPExcel->getActiveSheet()->setCellValue('AD1','論文名稱5');
$objPHPExcel->getActiveSheet()->setCellValue('AE1','論文名稱6');*/

$i=2;
$str="Select id,reportman1,reportman2,reportman3,reportman4,reportman5,reportman6,position1,position2,position3,position4,position5,position6,category1,category2,category3,category4,category5,category6,papernumber1,papernumber2,papernumber3,papernumber4,papernumber5,papernumber6,eat1,eat2,eat3,eat4,eat5,eat6,receipt1,money,uniformno1,paperchinesename1,paperchinesename2,paperchinesename3,paperchinesename4,paperchinesename5,paperchinesename6 from register ";
$list =mysql_query($str,$link);        
while(list($id,$reportman1,$reportman2,$reportman3,$reportman4,$reportman5,$reportman6,$position1,$position2,$position3,$position4,$position5,$position6,$category1,$category2,$category3,$category4,$category5,$category6,$papernumber1,$papernumber2,$papernumber3,$papernumber4,$papernumber5,$papernumber6,$eat1,$eat2,$eat3,$eat4,$eat5,$eat6,$receipt,$money,$uniformno,$paperchinesename1,$paperchinesename2,$paperchinesename3,$paperchinesename4,$paperchinesename5,$paperchinesename6) = mysql_fetch_row($list)){
	$strd="Select name,tel,unit from members where id='$id' ";
    $listd =mysql_query($strd,$link);
    list($name,$tel,$unit) = mysql_fetch_row($listd);

$eat=0;
$eeat=0;
if ($eat1=="葷"){$eat=$eat+1;}
if ($eat2=="葷"){$eat=$eat+1;}
if ($eat3=="葷"){$eat=$eat+1;}
if ($eat4=="葷"){$eat=$eat+1;}
if ($eat5=="葷"){$eat=$eat+1;}
if ($eat6=="葷"){$eat=$eat+1;}
/*
if ($ceat1=="葷"){$eat=$eat+1;}
if ($ceat2=="葷"){$eat=$eat+1;}
if ($ceat3=="葷"){$eat=$eat+1;}
if ($ceat4=="葷"){$eat=$eat+1;}
if ($ceat5=="葷"){$eat=$eat+1;}
*/
if ($eat1=="素"){$eeat=$eeat+1;}
if ($eat2=="素"){$eeat=$eeat+1;}
if ($eat3=="素"){$eeat=$eeat+1;}
if ($eat4=="素"){$eeat=$eeat+1;}
if ($eat5=="素"){$eeat=$eeat+1;}
if ($eat6=="素"){$eeat=$eeat+1;}
/*
if ($ceat1=="素"){$eeat=$eeat+1;}
if ($ceat2=="素"){$eeat=$eeat+1;}
if ($ceat3=="素"){$eeat=$eeat+1;}
if ($ceat4=="素"){$eeat=$eeat+1;}
if ($ceat5=="素"){$eeat=$eeat+1;}
*/
    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);//會員編號
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $name);//會員姓名
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $tel);//電話
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $receipt);//抬頭
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $uniformno);//統一編號
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $money);//金額
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $papernumber1);//論文編號1
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $papernumber2);//論文編號2
    $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $papernumber3);//論文編號3
    $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $papernumber4);//論文編號4
   // $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $eat);//葷食數量
    //$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $eeat);//素食數量
    /*$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $reportman1);//出席者1
    $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $reportman2);//出席者2
    $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $reportman3);//出席者3
    $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $reportman4);//出席者4
    $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $reportman5);//出席者5
    $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $reportman6);//出席者6
    
    $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $cname1);//攜伴1
    $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $cname2);//攜伴2
    $objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $cname3);//攜伴3
    $objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $cname4);//攜伴4
    $objPHPExcel->getActiveSheet()->setCellValue('R' . $i, $cname5);//攜伴5 
    
    $objPHPExcel->getActiveSheet()->setCellValue('S' . $i, $unit);//單位
    $objPHPExcel->getActiveSheet()->setCellValue('T' . $i, $category1);//類別1
    $objPHPExcel->getActiveSheet()->setCellValue('U' . $i, $category2);//類別2
    $objPHPExcel->getActiveSheet()->setCellValue('V' . $i, $category3);//類別3
    $objPHPExcel->getActiveSheet()->setCellValue('W' . $i, $category4);//類別4
    $objPHPExcel->getActiveSheet()->setCellValue('X' . $i, $category5);//類別5
    $objPHPExcel->getActiveSheet()->setCellValue('Y' . $i, $category6);//類別6
    $objPHPExcel->getActiveSheet()->setCellValue('Z' . $i, $paperchinesename1);//論文題目1
    $objPHPExcel->getActiveSheet()->setCellValue('AA' . $i, $paperchinesename2);//論文題目2
    $objPHPExcel->getActiveSheet()->setCellValue('AB' . $i, $paperchinesename3);//論文題目3
    $objPHPExcel->getActiveSheet()->setCellValue('AC' . $i, $paperchinesename4);//論文題目4
    $objPHPExcel->getActiveSheet()->setCellValue('AD' . $i, $paperchinesename5);//論文題目5
    $objPHPExcel->getActiveSheet()->setCellValue('AE' . $i, $paperchinesename6);//論文題目6*/

    
    $i=$i+1;
 
   }
   
   $objPHPExcel->getActiveSheet()->setTitle('全部類別');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//clear all notice message to save excel file
ob_end_clean(); 

$objWriter->save('test.xlsx'); 
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=product3.xlsx");
header("Pragma:no-cache");
header("Expires:0");
readfile("../admin/test.xlsx");
?>
