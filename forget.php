<?php
include "index_up.php";
?>
<style type="text/css">
  .content
   {
    font-size: 10pt;
    line-height: 20pt;
    color: rgb(0, 40, 0);
    letter-spacing:2px;
    text-align:center;
   }
 .title 
 { 
   color: rgb(0, 0, 173);
   font-size: 10pt;
   letter-spacing:2px;
   line-height:15pt;
 }
.style2 {font-size: 10pt; line-height: 20pt; color: #FF0000; letter-spacing: 2px; text-align: center; }
</style>

<br>
<div align="center">
<table cellspacing="1" width="314" cellpadding="2">
<tr>
   <td width="308" bgcolor="#FFCCFF" align="center" class=title>
	<p align="center">忘記密碼</td>  
</tr>
</table>
<form action="forget_send.php" method="post">
<table width="326">
<tr>
  <td class=content width="98">請輸入帳號：</td>
  <td width="218"><input type="text" name="id" size="28"></td>
</tr>
<tr>
  <td class=content width="98">請輸入Email：</td>
  <td width="218"><input type="text" name="email" size="28"></td>
</tr>

<tr>
  <td colspan="2" align="center"><input type="submit" value="送出"></td>
</tr>
</table>
</form>
<span class="style2">如果帳號和密碼都忘記，請將個人基本資料(包含姓名、電話等)寄到<br><a href="mailto:ILT2018@ncut.edu.tw">ILT2018@ncut.edu.tw</a></span>

<?php
include "index_down.php";
?>
