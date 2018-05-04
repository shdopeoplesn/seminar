<?php
function CreatBarcode($argv,$id,$count,$type){
	//設定
		$argv = array($argv);
	//抬頭
//		header ("Content-type: image/png");
	//將字串轉成陣列
		$text = implode($argv, " "); // Join array elements with a string
	//設定條碼長寬
		$barcodeheight=40;
		$barcodethinwidth=1;
		$barcodethickwidth=$barcodethinwidth*3;
	//using code 39
		$codingmap = Array( "0"=> "000110100", "1"=> "100100001",
		"2"=> "001100001", "3"=> "101100000", "4"=> "000110001",
		"5"=> "100110000", "6"=> "001110000", "7"=> "000100101",
		"8"=> "100100100", "9"=> "001100100", "A"=> "100001001",
		"B"=> "001001001", "C"=> "101001000", "D"=> "000011001",
		"E"=> "100011000", "F"=> "001011000", "G"=> "000001101",
		"H"=> "100001100", "I"=> "001001100", "J"=> "000011100",
		"K"=> "100000011", "L"=> "001000011", "M"=> "101000010",
		"N"=> "000010011", "O"=> "100010010", "P"=> "001010010",
		"Q"=> "000000111", "R"=> "100000110", "S"=> "001000110",
		"T"=> "000010110", "U"=> "110000001", "V"=> "011000001",
		"W"=> "111000000", "X"=> "010010001", "Y"=> "110010000",
		"Z"=> "011010000", " "=> "011000100", "$"=> "010101000",
		"%"=> "000101010", "*"=> "010010100", "+"=> "010001010",
		"-"=> "010000101", "."=> "110000100", "/"=> "010100010");
	//設定
		$text = strtoupper($text); //Make a string uppercase
		$text = "*$text*"; // add start/stop chars.
		$textlen = strlen($text);
		$barcodewidth = ($textlen)*(7*$barcodethinwidth + 3*$barcodethickwidth)-$barcodethinwidth;
	//建立一個圖型
		$im = @ImageCreate($barcodewidth,$barcodeheight) or die ("Cannot Initialize new GD image stream");
	//分配圖形顏色
		$black = imagecolorallocate($im,0,0,0);//Allocate a color for an image
		$white = imagecolorallocate($im,255,255,255);
	//將圖形著色(先著成白色)
		imagefill($im,0,0,$white); //Flood fill
	//開始繪製條碼
		$xpos=0;
		for ($idx = 0 ; $idx < $textlen ; $idx++) {
			$char = substr($text,$idx,1);//Return part of a string
			// make unknown chars a '-';
			if (!isset($codingmap[$char])) $char = "-";
			for ($baridx=0;$baridx<=8;$baridx++) {
				$elementwidth = (substr($codingmap[$char],$baridx,1)) ? $barcodethickwidth : $barcodethinwidth;
				//建立一個矩形並塗上顏色
					if (($baridx+1)%2) imagefilledrectangle($im,$xpos,0,$xpos + $elementwidth-1,$barcodeheight,$black);
				$xpos+=$elementwidth;
			}
			$xpos+=$barcodethinwidth;
		}
	//產生的圖形檔案
	    $id="codebar/".$id .$type ."_" .$count .".png";
		ImagePng($im,$id);
}
?>
