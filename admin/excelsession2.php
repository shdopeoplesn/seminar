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
$objPHPExcel->getActiveSheet()->setCellValue('F1',iconv("big5","UTF-8",'金額'));
$objPHPExcel->getActiveSheet()->setCellValue('G1',iconv("big5","UTF-8",'論文編號1'));
$objPHPExcel->getActiveSheet()->setCellValue('H1',iconv("big5","UTF-8",'論文編號2'));
$objPHPExcel->getActiveSheet()->setCellValue('I1',iconv("big5","UTF-8",'論文編號3'));
$objPHPExcel->getActiveSheet()->setCellValue('J1',iconv("big5","UTF-8",'論文編號4'));

/*$objPHPExcel->getActiveSheet()->setCellValue('F1',iconv("big5","UTF-8",'葷食數量'));
//$objPHPExcel->getActiveSheet()->setCellValue('G1',iconv("big5","UTF-8",'素食數量'));
$objPHPExcel->getActiveSheet()->setCellValue('H1',iconv("big5","UTF-8",'出席者1'));
$objPHPExcel->getActiveSheet()->setCellValue('I1',iconv("big5","UTF-8",'出席者2'));
$objPHPExcel->getActiveSheet()->setCellValue('J1',iconv("big5","UTF-8",'出席者3'));
$objPHPExcel->getActiveSheet()->setCellValue('K1',iconv("big5","UTF-8",'出席者4'));
$objPHPExcel->getActiveSheet()->setCellValue('L1',iconv("big5","UTF-8",'出席者5'));
$objPHPExcel->getActiveSheet()->setCellValue('M1',iconv("big5","UTF-8",'出席者6'));
$objPHPExcel->getActiveSheet()->setCellValue('N1',iconv("big5","UTF-8",'攜伴1'));
$objPHPExcel->getActiveSheet()->setCellValue('O1',iconv("big5","UTF-8",'攜伴2'));
$objPHPExcel->getActiveSheet()->setCellValue('P1',iconv("big5","UTF-8",'攜伴3'));
$objPHPExcel->getActiveSheet()->setCellValue('Q1',iconv("big5","UTF-8",'攜伴4'));
$objPHPExcel->getActiveSheet()->setCellValue('R1',iconv("big5","UTF-8",'攜伴5'));
$objPHPExcel->getActiveSheet()->setCellValue('S1',iconv("big5","UTF-8",'單位'));
$objPHPExcel->getActiveSheet()->setCellValue('T1',iconv("big5","UTF-8",'類別1'));
$objPHPExcel->getActiveSheet()->setCellValue('U1',iconv("big5","UTF-8",'類別2'));
$objPHPExcel->getActiveSheet()->setCellValue('V1',iconv("big5","UTF-8",'類別3'));
$objPHPExcel->getActiveSheet()->setCellValue('W1',iconv("big5","UTF-8",'類別4'));
$objPHPExcel->getActiveSheet()->setCellValue('X1',iconv("big5","UTF-8",'類別5'));
$objPHPExcel->getActiveSheet()->setCellValue('Y1',iconv("big5","UTF-8",'類別6'));
$objPHPExcel->getActiveSheet()->setCellValue('Z1',iconv("big5","UTF-8",'論文名稱1'));
$objPHPExcel->getActiveSheet()->setCellValue('AA1',iconv("big5","UTF-8",'論文名稱2'));
$objPHPExcel->getActiveSheet()->setCellValue('AB1',iconv("big5","UTF-8",'論文名稱3'));
$objPHPExcel->getActiveSheet()->setCellValue('AC1',iconv("big5","UTF-8",'論文名稱4'));
$objPHPExcel->getActiveSheet()->setCellValue('AD1',iconv("big5","UTF-8",'論文名稱5'));
$objPHPExcel->getActiveSheet()->setCellValue('AE1',iconv("big5","UTF-8",'論文名稱6'));*/

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
if ($ceat1=="葷"){$eat=$eat+1;}
if ($ceat2=="葷"){$eat=$eat+1;}
if ($ceat3=="葷"){$eat=$eat+1;}
if ($ceat4=="葷"){$eat=$eat+1;}
if ($ceat5=="葷"){$eat=$eat+1;}

if ($eat1=="素"){$eeat=$eeat+1;}
if ($eat2=="素"){$eeat=$eeat+1;}
if ($eat3=="素"){$eeat=$eeat+1;}
if ($eat4=="素"){$eeat=$eeat+1;}
if ($eat5=="素"){$eeat=$eeat+1;}
if ($eat6=="素"){$eeat=$eeat+1;}
if ($ceat1=="素"){$eeat=$eeat+1;}
if ($ceat2=="素"){$eeat=$eeat+1;}
if ($ceat3=="素"){$eeat=$eeat+1;}
if ($ceat4=="素"){$eeat=$eeat+1;}
if ($ceat5=="素"){$eeat=$eeat+1;}

    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $id);//會員編號
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, iconv("big5","UTF-8",$name));//會員姓名
    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, iconv("big5","UTF-8",$tel));//電話
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, iconv("big5","UTF-8",$receipt));//抬頭
    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $uniformno);//統一編號
    $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $money);//金額
    $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$papernumber1));//論文編號1
    $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, iconv("big5","UTF-8",$papernumber2));//論文編號2
    $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, iconv("big5","UTF-8",$papernumber3));//論文編號3
    $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, iconv("big5","UTF-8",$papernumber4));//論文編號4
   // $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $eat);//葷食數量
    //$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, iconv("big5","UTF-8",$eeat));//素食數量
    /*$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, iconv("big5","UTF-8",$reportman1));//出席者1
    $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, iconv("big5","UTF-8",$reportman2));//出席者2
    $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, iconv("big5","UTF-8",$reportman3));//出席者3
    $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, iconv("big5","UTF-8",$reportman4));//出席者4
    $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, iconv("big5","UTF-8",$reportman5));//出席者5
    $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, iconv("big5","UTF-8",$reportman6));//出席者6
    
    $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, iconv("big5","UTF-8",$cname1));//攜伴1
    $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, iconv("big5","UTF-8",$cname2));//攜伴2
    $objPHPExcel->getActiveSheet()->setCellValue('P' . $i, iconv("big5","UTF-8",$cname3));//攜伴3
    $objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, iconv("big5","UTF-8",$cname4));//攜伴4
    $objPHPExcel->getActiveSheet()->setCellValue('R' . $i, iconv("big5","UTF-8",$cname5));//攜伴5 
    
    $objPHPExcel->getActiveSheet()->setCellValue('S' . $i, iconv("big5","UTF-8",$unit));//單位
    $objPHPExcel->getActiveSheet()->setCellValue('T' . $i, iconv("big5","UTF-8",$category1));//類別1
    $objPHPExcel->getActiveSheet()->setCellValue('U' . $i, iconv("big5","UTF-8",$category2));//類別2
    $objPHPExcel->getActiveSheet()->setCellValue('V' . $i, iconv("big5","UTF-8",$category3));//類別3
    $objPHPExcel->getActiveSheet()->setCellValue('W' . $i, iconv("big5","UTF-8",$category4));//類別4
    $objPHPExcel->getActiveSheet()->setCellValue('X' . $i, iconv("big5","UTF-8",$category5));//類別5
    $objPHPExcel->getActiveSheet()->setCellValue('Y' . $i, iconv("big5","UTF-8",$category6));//類別6
    $objPHPExcel->getActiveSheet()->setCellValue('Z' . $i, iconv("big5","UTF-8",$paperchinesename1));//論文題目1
    $objPHPExcel->getActiveSheet()->setCellValue('AA' . $i, iconv("big5","UTF-8",$paperchinesename2));//論文題目2
    $objPHPExcel->getActiveSheet()->setCellValue('AB' . $i, iconv("big5","UTF-8",$paperchinesename3));//論文題目3
    $objPHPExcel->getActiveSheet()->setCellValue('AC' . $i, iconv("big5","UTF-8",$paperchinesename4));//論文題目4
    $objPHPExcel->getActiveSheet()->setCellValue('AD' . $i, iconv("big5","UTF-8",$paperchinesename5));//論文題目5
    $objPHPExcel->getActiveSheet()->setCellValue('AE' . $i, iconv("big5","UTF-8",$paperchinesename6));//論文題目6*/

    
    $i=$i+1;
 
   }
   
   $objPHPExcel->getActiveSheet()->setTitle(iconv("big5","UTF-8",'全部類別'));

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('test.xlsx'); 
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=product3.xlsx");
header("Pragma:no-cache");
header("Expires:0");
readfile("../admin/test.xlsx");
?>
