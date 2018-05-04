<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
include "chksession.php";
include "index_up.php";
?>
<script language="javascript">
function event1()
{
if( confirm("若不同意, 則此論文將不收錄於論文集及論文光碟中"))
{
location="destroy.php"
}
}
</script>
<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(85, 85, 85);
    letter-spacing:2px;
   }
  .content1
   {
    font-size: 10pt;
    line-height: 15pt;
    color: rgb(85, 85, 85);
    letter-spacing:2px;
   }
  .title
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(51, 51, 51);
    letter-spacing:2px;
   }
    .new
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(0, 102, 255);
    letter-spacing:2px;
   }
.style2 {
	color: #FF0000;
	font-weight: bold;
}
</style>
<script type="text/JavaScript">
<!--
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>
<br>

<table width="500" border="2" align="center" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <p align="center">第十三屆智慧生活研討會論文授權書 </p></td>
	</tr>
	<tr>
		<td  colspan="2" >
	    <p >1. 本授權書所授權之論文為本人在<?php echo config('settings.titleC');?>投稿之論文。</p>
	    <p >2. 本人具有著作財產權之論文全文資料，授予<?php echo config('settings.titleC');?>，得不限地域、時間與次數以微縮、光碟或數位化等各種方式重製後散布發行或上載網路。</p>
	    <p >3. 上述授權內容均無須訂立讓與及授權契約書。依本授權之發行權為非專屬性發行權利。依本授權所為之收錄、重製、發行及學術研發利用均為無償。</p>
	    </td>	  
	</tr>
		<tr>	
		<td colspan="2" >
		<div align="center">
	    <form id="form1" name="form1" method="post" action="paper_upload.php">
	      <input type="submit" name="Submit" value="同意" />
          <input name="disagree" type="button" id="disagree" onclick="event1()" value="不同意" />
	    </form>	    <p>&nbsp;</p></td>

	</tr>
</table>



<?php
include "index_down.php";
?>