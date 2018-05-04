<?php
  include "index_up.php";
?>
<style>
.hint {
  color: green;
  font-size: 9pt;
  letter-spacing:1px;
 }
 .note {
  color: rgb(249, 32, 18);
  font-size: 9pt;
  letter-spacing:1px;
 }
.title {
   color: rgb(0, 0, 173);
   font-weight: bold;
   /* font-size: 10pt; */
   letter-spacing:2px;
   line-height:15pt;
}
</style>

<SCRIPT>
var ic = [];
stat_ok = new Image()
stat_ok.src = "images/ok.jpg"
stat_no = new Image()
stat_no.src = "images/no.jpg"
stat_have = new Image()
stat_have.src = "images/have.jpg"

function jb()
{
	var A=null;
	try
	{
	A=new ActiveXObject("Msxml2.XMLHTTP")
	}
	catch(e)
	{
	try
		{
		A=new ActiveXObject("Microsoft.XMLHTTP")
		}
		catch(oc)
		{
		A=null
		}
	}
	if ( !A && typeof XMLHttpRequest != "undefined" ) {
	  A=new XMLHttpRequest()
	}
  return A
}

function uname_check(email)
{
  var result;
  var oHttpReq = new jb();
  oHttpReq.open("GET", "check_use_email.php?chkid="+email, false);
  oHttpReq.send("");
  result = oHttpReq.responseText;
  if (result!="semailer") {
    if (result=="semailhvae") document.images['stat'].src=stat_have.src
    if (result=="semailok") document.images['stat'].src=stat_ok.src
  } else {
    document.images['stat'].src=stat_no.src
  }

}
</SCRIPT>
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'dup' ) { ?>
<script>alert('您的email重覆了，請重新填寫！');</script>
<?php } ?>
<div align="center">
<h1 class="title">會員註冊</h1>
<form action="insert.php" method="post" id="RegistForm" name="RegistForm">
<table width="90%" border="2" cellspacing="1" bordercolor="#000000">
<tr>
   <td width="88">
    <span class="note">*</span>
    <label for="name">姓名：</label>
   </td>
   <td width="281">
    <input type="text" id="name" name="name" maxlength="50">
    <span class="hint"> ex:王大明</span>
   </td>
</tr>
<tr>
   <td width="88">
    <span class="note">*</span>
    <label for="email">Email：</label>
   </td>
   <td width="281">
    <input type="email" id="email" name="email" maxlength="122" onBlur="uname_check(document.RegistForm.email.value);">
   </td>
</tr>
<tr>
    <td width="88">
      <span class="note">*</span>
      <label for="unit">機關單位：</label>
    </td>
    <td width="281">
      <input type="text" id="unit" name="unit" maxlength="255">
      <span class="hint"> ex:國立勤益科技大學</span>
    </td>
</tr>
<!--<tr>
   <td width="88"><span class="hint">*</span>職稱</td>
   <td width="281"><select name="position" id="position">
     <option value="1">1. 教授</option>
     <option value="2">2. 研究生</option>
     <option value="3">3. 大學生</option>
     <option value="4">4. 一般社會人士</option>
   </select>   </td>
</tr>-->
<tr>
    <td width="88">
      <span class="note">*</span>
      <label for="tel">聯絡電話：</label>
    </td>
    <td width="281">
      <input type="text" name="tel" maxlength="20" />
      <span class="hint"> ex:09xx-yyyzzz</span>
    </td>
</tr>
<tr>
  <td colspan="2">
    (<span class="note">*</span>為必填欄位)
  </td>
</tr>
<tr>
  <td colspan="2" align="center">
    <input type="reset" id="clear" value="清除" >
    <input type="submit" id="send" value="確定">
	</td>
  </tr>
<!--
<tr>
   <td width="81"><span class=hint>*</span>聯絡住址：</td>
   <td width="281"><input type="text" name="address" maxlength="122" size="28" /></td>
</tr>
<tr>
   <td width="81">&nbsp;&nbsp;指導教授：</td>
   <td width="281"><input type="text" name="boss" maxlength="50" /></td>
</tr>-->
</table>
</form>
</div>

<?php
  include "index_down.php";
?>
<script>
$(function(){
	$("#RegistForm").validate({
    rules: {
      name: { required: true },
      email: { required: true, email: true	},
      unit: { required: true },
      tel: { required: true }
    },
    errorClass: "note"
  })
  $("#clear").click(function() {
    $("#RegistForm").validate().resetForm();
  });
})
</script>