<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$id = $_SESSION["id"];
//include "chksession.php"; 
require "db.php";
include "index_up.php";
?>

<style type="text/css">
.content 
   {   
    color: rgb(0, 40, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
   }
.content1 
   {   
    color: rgb(255, 0, 0);
    font-size: 10pt;
    letter-spacing:1px;
    line-height:15pt;
   }
.title 
   {  
    color: rgb(0, 51, 0);
    font-size: 12pt;
    letter-spacing: 2px;
    text-align:center;
    height:20px;
    background-color: rgb(255, 204, 255);
   }
</style>

<br>
<div align="center">
	<table border="0" width="502" id="table1" cellspacing="0">
		<tr>
			<td width="500" colspan="2" class=title>定稿論文資料</td>
		</tr>
<?php
$strb = "select serial,papername,category,final_rawfile,final_rawabstract from papers where id='$id' and accept='1' or  id='$id' and accept='2' ";
$listb = mysql_query($strb,$link);
while(list($serial,$papername,$category,$final_rawfile,$final_rawabstract) = mysql_fetch_row($listb))
{

 if($final_rawfile=="" and $final_rawabstract=="")  
  {
  $aa="<a href=\"final_upload.php?serial=$serial\">上傳定稿資料</a>";
   echo"	<tr>
			<td height=\"19\" width=\"500\" colspan=\"2\" class=content>
			<div align=\"center\">
				<table border=\"0\" width=\"500\" cellspacing=\"0\">
					<tr>
						<td width=\"400\" class=content1>".$papername."</td>
						<td width=\"100\" class=content>".$aa."</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>";
  }
else
  {
  $aa="<a href=\"final_upload.php?serial=$serial\">置換定稿資料</a>";
  echo"
		<tr>
			<td height=\"19\" width=\"500\" colspan=\"2\" class=content>
			<div align=\"center\">
				<table border=\"0\" width=\"500\" cellspacing=\"0\">
					<tr>
						<td width=\"400\" class=content1>".$papername."</td>
						<td width=\"100\" class=content>".$aa."</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
		<tr>
			<td width=\"81\" class=content>定稿論文：</td>
			<td width=\"417\" class=content>".$final_rawfile."</td>
		</tr>
		<tr>
			<td width=\"81\" class=content>定稿摘要：</td>
			<td width=\"417\" class=content>".$final_rawabstract."</td>
		</tr>
                <tr>
			<td width=\"81\" class=content>&nbsp;</td>
			<td width=\"417\" class=content>&nbsp;</td>
		</tr>";
  }
  
}

?>
	</table>
</div>
<?php
include "index_down.php";
?>