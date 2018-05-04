<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
require_once("./config.php");	//載入環境設定檔

$id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
require "db.php";
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?php echo config('settings.keywords');?>">
<script>
var dragswitch=0
var nsx
var nsy
var nstemp

function drag_dropns(name){
	temp=eval(name)
	temp.captureEvents(Event.MOUSEDOWN | Event.MOUSEUP)
	temp.onmousedown=gons
	temp.onmousemove=dragns
	temp.onmouseup=stopns
}

function gons(e){
	temp.captureEvents(Event.MOUSEMOVE)
	nsx=e.x
	nsy=e.y
}
function dragns(e){
	if (dragswitch==1){
		temp.moveBy(e.x-nsx,e.y-nsy)
		return false
	}
}

function stopns(){
	temp.releaseEvents(Event.MOUSEMOVE)
}

//drag drop function for IE 4+////

var dragapproved=false

function drag_dropie(){
	if (dragapproved==true){
		document.all.showimage.style.pixelLeft=tempx+event.clientX-iex
		document.all.showimage.style.pixelTop=tempy+event.clientY-iey
		return false
	}
}

function initializedragie(){
	iex=event.clientX
	iey=event.clientY
	tempx=showimage.style.pixelLeft
	tempy=showimage.style.pixelTop
	dragapproved=true
	document.onmousemove=drag_dropie
}

if (document.all){
	document.onmouseup=new Function("dragapproved=false")
}

////drag drop functions end here//////

function hidebox(){
	if (document.all)
	showimage.style.visibility="hidden"
	else if (document.layers)
	document.showimage.visibility="hide"
}
</script>
<title><?php echo config('settings.titleC');?></title>

<style>
  .menu_title {
	color: rgb(255, 255, 255);
    font-size: 10pt;
    letter-spacing: 5px;
  }
  .menu_txt {
	color: rgb(64, 99, 129);
    font-size: 9pt;
    letter-spacing: 2px;
    height:20px;
  }
  .menu_sub {
	color: rgb(38, 58, 78);
    font-size: 8pt;
    letter-spacing: 2px;
    height:20px;
  }
  .menu_txt1 {
	color: rgb(51, 51, 255);
    font-size: 9pt;
    letter-spacing: 2px;
    height:20px;
  }
  .menu_index {
	color: #000;
	font-size: 9pt;
	letter-spacing: 2px;
	height:20px;
	text-align:center;
	text-decoration: underline;
  }
  .information {
    color: rgb(102, 102, 102);
    font-size: 9pt;
   }
  .menu_paperstyle {
    color: rgb(64, 99, 129);
    font-size: 9pt;
    letter-spacing: 2px;
    height:20px;
   }
  .style2 {
	font-family: "新細明體";
	font-weight: bold;
	font-size: 12px;
	}
  .style3 {
	  color: #FF0000
	}
  .menu_txt2 {
	color: rgb(64, 99, 129);
    font-size: 9pt;
    letter-spacing:0px;
    height:20px;
  }
</style>

<!-- <LINK href="data/schadule.css" type=text/css rel=stylesheet>
<script language=JavaScript src="../calendar_javascript/change.js" type=text/JavaScript></SCRIPT> -->
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"bgcolor="#007FFF">
<iframe name="menu_dwindow" id="menu_dwindow" width=0 height=0 style="display: none;"></iframe>
<DIV class=dek id=dek></DIV>
<script>
	//<!--
	Xoffset= 16; // modify these values to ...
	Yoffset= -6; // change the popup position.

	var nav;
	var old;
	var iex=(document.all);
	var yyy=-1000;

	if(navigator.appName=="Netscape"){(document.layers)?nav=true:old=true;}

	if(!old){
		var skn = (nav)?document.dek:dek.style;
		if(nav)document.captureEvents(Event.MOUSEMOVE);
		document.onmousemove=get_mouse;
	}

	function popup(msg,bak){
		var content="<table width='135' border='0' bordercolor='#CCCCCC' bgcolor='"+ bak +"' cellpadding='6' cellspacing='0'>"+ msg +"</table>";

		if(old){
			alert(msg);

			return;
		} else {
			yyy=Yoffset;
			if(nav){skn.document.write(content);skn.document.close();skn.visibility="visible"}
			if(iex){document.all("dek").innerHTML=content;skn.visibility="visible"}
		}
	}

	function get_mouse(e){
		var x=(nav)?e.pageX:event.x+document.body.scrollLeft;skn.left=x+Xoffset;
		var y=(nav)?e.pageY:event.y+document.body.scrollTop;skn.top=y+yyy;
	}

	function kill(){
		if(!old){
			yyy=-1000;
			skn.visibility="hidden";
		}
	}
	//-->
</SCRIPT>

<script>
	function fmenu5(){
	if( menu5.style.display == "none")
	menu5.style.display = "block";
	else
	menu5.style.display = "none";}
	function fmenu6(){
	if( menu6.style.display == "none")
	menu6.style.display = "block";
	else
	menu6.style.display = "none";}
	function fmenu7(){
	if( menu7.style.display == "none")
	menu7.style.display = "block";
	else
	menu7.style.display = "none";}
</SCRIPT>

<div align="center">
	<table border="0" width="780" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2" height="220"  background="images/ilt2018.jpg" valign="bottom"> <!-- 圖片 -->
			<div align="right">
				<table border="0" width="300" cellspacing="1" height="22">
					<tr>
						<td width="80">　</td>
                                            <!--    <td width="70" class=menu_index style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#CCCCCC';" onClick="location.href='index1.php';">English</td>          -->
	<!--首頁圖片2013-->       		<td width="80" class=menu_index style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#CCCCCC';" onClick="location.href='index.php';">回到首頁</td>
					        <td width="10">　</td>
                                                <td width="80" class=menu_index style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#CCCCCC';" onClick="location.href='http://www.ncut.edu.tw';">勤益首頁</td>
					        <td width="30">　</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
		<tr>
		  <td width="159" valign="top" bgcolor="#FFCC66">
			<table border="0" width="159" cellspacing="0" cellpadding="0">
			<tr>
			  <td colspan="2" background="images/menu1.jpg" height="49">


</td>
				</tr>
				<tr>
					<td colspan="2"><img border="0" src="images/line.jpg" width="159" height="1"></td>
				</tr>
                <?php


                              if(empty($id))
                               {



			    ?>

				<tr>
				   <td colspan="2" background="images/menu2.jpg" height="25">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0">
							<tr>
								<td width="25">　</td>
								<td valign="bottom" class=menu_title>論文上傳登入</td>
							</tr>
						</table>
					</div>
				  </td>
				</tr>
				<tr>
					<td width="159" colspan="2"  bgcolor="#FFCC66">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0" id="table1">
  						     <form action="login_check.php" method="post">
							<tr>
								<td width="40"  class=menu_txt><p align="center">ID</td>
								<td width="110" class=menu_txt ><input type="text" name="id" szie="3" size="13"></td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt height="21"><p align="center">密碼</td>
								<td width="110" class=menu_txt height="21"><input type="password" name="passwd" szie="5" size="13"></td>
							</tr>
							<tr>
								<td width="150"  class=menu_txt colspan="2" align="center">
								<p align="center">
								<p><input type="submit" value="確定"></td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt height="21"></td>
								<td width="110" height="21" class=menu_txt style2>欲投稿者請先登錄為本大會會員</br>(登入帳號請輸入英文小寫)								</td>
							   </tr>
															<tr>
								<td width="40"  class=menu_txt eight="21"></td>
								<td width="110" class=menu_txt height="21">
                                                               <a href="add.php"><font color="#FF0000">會員註冊</font></a> </td>
						   	</tr>
			                <tr>
								<td width="40"  class=menu_txt height="21"></td>
								<td width="110" class=menu_txt height="21"><a href="forget.php">忘記密碼</a></td>
						    </tr>
						    </form>
						</table>
					</div>
					</td>
				</tr>

				<?php
				 }
				else
                                 {
			      ?>
				<tr>
				   <td colspan="2" background="images/menu2.jpg" height="25">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0">
							<tr>
								<td width="25">　</td>
								<td valign="bottom" class=menu_title>論文管理</td>
							</tr>
						</table>
					</div>
				  </td>
				</tr>
				<tr>
					<td width="159" colspan="2" bgcolor="#FFCC66">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0" id="table1">
							<tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='edit_data.php';">修改基本資料</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt height="21">
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='edit_password.php';" height="21">修改登入密碼</td>
							</tr>
							<?php $data=date("Ymd");
if ($data>=config('settings.draftuploadbegin') and $data<=config('settings.draftuploadend')  ) {  ?><!--投稿其間-->
								<tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='authority.php';">論文資料上傳</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='paper_index.php';">論文資料查詢</td>
							</tr>
							<?php }

else
{
	$accept_chk=0;$aa="";
	$str = "select accept from papers where id='$id'";
	$list = mysql_query($str,$link);
	while(list($accept) = mysql_fetch_row($list))
	{
		if($accept >0){
		$accept_chk=1;}
	}

		$data=date("Ymd");

		if ($data>=config('settings.paperuploadbegin') and $data<=config('settings.paperuploadend')) {  $aa="showend";	?>
		<!-- 定稿 -->
<tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='final_index.php';">定稿資料上傳</td>
						  </tr>


									<tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='paper_index.php';">論文資料查詢</td>
							</tr>				                                                  <?php
 						  	}
						  ?>


<?php
		if($data>=config('settings.paperuploadend') and $aa!="showend"){	?>
<tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='paper_index.php';">論文資料查詢</td>
							</tr>
		<tr>
								<!--
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='happy.php?act=time';">定稿資料上傳</td>
                                -->
								<?php }}?>
                                                         <tr>
								<td width="40"  class=menu_txt>
								<p align="center"></td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='destroy.php';">登出</td>
						  </tr>
						</table>
					</div>
					</td>
				</tr>
								 <?php
                   }











			    ?>
				<tr>
					<td width="159" colspan="2" bgcolor="#FFCC66">
					</td>
				</tr>
				<tr>
					<td colspan="2" background="images/menu2.jpg" height="25">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0">
							<tr>
								<td width="25">　</td>
								<td valign="bottom" class=menu_title>大會資訊</td>
							</tr>
						</table>
					</div>
					</td>
				</tr>
				<tr>
					<td width="159" colspan="2" bgcolor="#FFCC66">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0" id="table1">
						    <tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='index.php';">最新公告</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='purpose.php';">會議目的</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt height="21">　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='Progrmmer.php';" height="21">會議組織</td>
							</tr>
							<tr>
				 			<!--
								<td width="40"  class=menu_txt height="21">　</td>
                            	<td width="110" class="menu_txt2" style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='keynote.php';" height="21">Keynote Speaker</td>
							-->

						</table>
					</div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><img border="0" src="images/line.jpg" width="159" height="1"></td>
				</tr>
				<tr>
					<td colspan="2" background="images/menu2.jpg" height="25">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0">
							<tr>
								<td width="25">　</td>
								<td valign="bottom" class=menu_title>論文投稿</td>
							</tr>
						</table>
					</div>
					</td>
				</tr>
				<tr>
					<td width="159" colspan="2" bgcolor="#FFCC66">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0" id="table1">
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='TopicAreas.php';">論文徵稿</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='Guidelines.php';">投稿方式</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='Format.php';">論文格式</td>

							</tr>
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='Date.php';">論文重要日期</td>
							</tr>

						</table>
					</div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><img border="0" src="images/line.jpg" width="159" height="1"></td>
				</tr>

                <?php
  if($id)
                               {

		$data=date("Ymd");
		if ($data>config('settings.onlineapplybegin') and $data<config('settings.onlineapplyend')) {  	?>
		<!--報名期間 -->
				<tr>
					<td colspan="2" background="images/menu2.jpg" height="25">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0">
							<tr>
								<td width="25">　</td>
								<td valign="bottom" class=menu_title>線上報名</td>
							</tr>
						</table>
					</div>
					</td>
				</tr>
				<tr>
					<td width="159" colspan="2" bgcolor="#FFCC66">

					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0" id="table1">
							<tr>
								<td width="40"  class=menu_txt>　</td>
							<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='on_line2.php';">線上報名</td>
						  </tr>
						</table>
					</div>

					</td>
				</tr>
				<?php
				}
				}
				?>

				<tr>
					<td colspan="2"><img border="0" src="images/line.jpg" width="159" height="1"></td>
				</tr>
				<tr>
					<td colspan="2" background="images/menu2.jpg" height="25">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0">
							<tr>
								<td width="25">　</td>
								<td valign="bottom" class=menu_title>其它資訊</td>
							</tr>
						</table>
					</div>
					</td>
				</tr>
				<tr>
					<td width="159" colspan="2" bgcolor="#FFCC66">
					<div align="center">
						<table border="0" width="150" cellspacing="0" cellpadding="0" id="table1">
						<tr>
								<td width="40"  class=menu_txt>　</td>
                                                                <td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('help1.php');">網站教學</td>
						  </tr>
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='mailto:ilt2018@ncut.edu.tw';">聯絡我們</td>
							</tr>
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onMouseDown="fmenu5()" >交通資訊</td>
							</tr>
						</table>

<TABLE id=menu5 style="display:none" border="0" width="150" colspan="2">
<tr>
<td width="40"  class=menu_txt></td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='http://web2.ncut.edu.tw/files/11-1000-25.php';">&nbsp;&nbsp;公車路線圖</td>
</tr>
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='http://web2.ncut.edu.tw/files/11-1000-24.php';">&nbsp;&nbsp;公路駕駛路線圖</td>
</tr>
<!--
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='123.pdf'"> &nbsp;&nbsp;勤益新地圖</td>
</tr>
-->
</TABLE>



				  <table border="0" width="150" cellspacing="0" cellpadding="0" id="table2">
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onMouseDown="fmenu6()" >研討會地點</td>
							</tr>
						</table>

<TABLE id=menu6 style="display:none" border="0" width="150" colspan="2">
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="location.href='http://web2.ncut.edu.tw/files/11-1000-23-1.php';">&nbsp;&nbsp;勤益平面地圖</td>
</tr>
<!--
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('http://ilt2008.ncut.edu.tw/3F-post_place.php','_style');return false;">&nbsp;&nbsp;三樓壁報發表</td>
</tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('http://ilt2008.ncut.edu.tw/3F-Oral_place.php','_style');return false;">&nbsp;&nbsp;三樓口頭發表</td>
</tr>
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('http://ilt2008.ncut.edu.tw/4F-post_place.php','_style');return false;">&nbsp;&nbsp;四樓壁報發表</td>
</tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('http://ilt2008.ncut.edu.tw/4F-Oral_place.php','_style');return false;">&nbsp;&nbsp;四樓口頭發表</td>
</tr>
-->
</TABLE>
<table border="0" width="150" cellspacing="0" cellpadding="0" id="table3">
							<tr>
								<td width="40"  class=menu_txt>　</td>
								<td width="110" class=menu_txt style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onMouseDown="fmenu7()" >後端網頁</td>
							</tr>
						</table>

<TABLE id=menu7 style="display:none" border="0" width="150" colspan="2">
<tr>
<td width="40"  class=menu_txt></td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('admin','_style');return false;">&nbsp;&nbsp;類別管理者</tr>
</tr>
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('review','_style');return false;">&nbsp;&nbsp;審稿者</td>
</tr>
<!--
<tr>
<td width="40"  class=menu_txt>　</td>
<td width="110" class=menu_sub style="padding:2 0 0 5;cursor:hand;" onMouseOut="this.style.color='';" onMouseOver="this.style.color='#823516';" onClick="window.open('http://ilt2011.ncut.edu.tw/bestreview/','_style');return false;">&nbsp;&nbsp;最佳論文審稿者</td>
</tr>
-->
</TABLE>


					</div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><img border="0" src="images/line.jpg" width="159" height="1"></td>
				</tr>
				<tr>
				</tr>

			</table>

			</td>
<!--
<script language="JavaScript">
var dismissafter=0
var initialvisible=0

function followcursor() {
	//move cursor function for IE
	if (initialvisible==0){
		curscroll.style.visibility="visible"
		initialvisible=1
	}
	curscroll.style.left=document.body.scrollLeft+event.clientX+10
	curscroll.style.top=document.body.scrollTop+event.clientY+10
}

function dismissmessage() {
	curscroll.style.visibility="hidden"
}


if (document.all){
	document.onmousemove=followcursor
	document.ondblclick=dismissmessage
	if (dismissafter!=0)
		setTimeout("dismissmessage()",dismissafter*1000)
	}

</script>
//-->
 <td width="621" bgcolor="#EEFBFF" valign="top">
<p>
<!--
<div id="curscroll" style="position: absolute; width: 200; left: 406px; top: 88px">
<table CLASS="alpht" border="1" width="250" bgcolor="#555555" cellspacing="0" cellpadding="2">
<tr><td width="250"><table border="0" width="250" cellspacing="0" cellpadding="2" height="1">
<tr><td CLASS="alpht" onMousedown="initializedragie()" width="501" height="1"><font size="2">
<ilayer width="100%" onSelectStart="return false">
<layer width="100%" onMouseover="dragswitch=1;drag_dropns(showimage)" onMouseout="dragswitch=0"></layer></ilayer>
<font color="f5f5f5" face="新細明體">重要公告</font></font></td></tr>
<tr><td CLASS="alpht" bgcolor="#ffffff" colspan="2" height="1" width="600" valign="top">
<font size="2" color="#008000">敬請於5月26前註冊完畢</font></td></tr>
<tr><td CLASS="alpht" bgcolor="#ffffff" colspan="2" height="1" width="600" valign="top">
<font size="2" color="#008000">開放線上註冊研討會</font></td></tr>
<tr><td CLASS="alpht" bgcolor="#ffffff" colspan="2" height="1" width="600" valign="top">
<font size="2" color="#008000">審稿結果於論文資料查詢處公佈</font></td></tr>
</table></table></div>
-->
</p>