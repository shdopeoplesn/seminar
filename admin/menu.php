<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss=$_SESSION["adminss"];

//For PHP5.4 and newer version
if(isset($_SESSION["category"])){
	$category=$_SESSION["category"];
}


?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
  <style type="text/css">
  .menu 
    {
      font-size: 10pt;
    }
  </style>
<style type="text/css">
      a:link    {text-decoration:underline;color:#0000ff;}
      a:visited {text-decoration:underline;color:#0000ff;}
      a:hover   {text-decoration:underline;color:#FF0000;}
.style1 {color: #FF0000}
</style> 
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table border="0" width="140" id="table1">
  <tr>
    <td colspan="2" bgcolor="#E6FFFF">　</td>
  </tr>
  <?php
if( $adminss=="root1" )
{
?>
    <tr>
    <th colspan="2"><span class="style1">人員資料管理</span></th>
  </tr>
    <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="session_add.php">新增類別管理者</a></td>
</tr>
    <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="root.php">類別管理者設定</a></td>
</tr>
<tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF">　</td>
  </tr>
  <tr>
    <th colspan="2"><span class="style1">審查者資料查詢</span></th>
  </tr>

    <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="reviewer_information_root1.php">所有審查者</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF">　</td>
  </tr>
    <tr>
    <th colspan="2"><span class="style1">會員資料查詢</span></th>
  </tr>
 <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="member.php">報名者資料</a></td>
  </tr> 
<tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="no_paper_index.php">論文未回傳名單</a></td>
  </tr>
   <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF">　</td>
  </tr> 
    <tr>
    <th colspan="2"><span class="style1">論文資料查詢</span></th>
  </tr>
<?php } 

if( $adminss=="root1" or $adminss=="final_text")
{
?>

    <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="final.php">定稿資料</a></td>
  </tr>
<?php } 

if( $adminss=="root1")
{
?>  
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="paper_root1.php">論文資料</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="paper_count.php">論文篇數統計</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF"></td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="paper1.php">以類別檢視論文</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"></td>
  </tr>
<tr>
    <th colspan="2"><span class="style1">研討會資料查詢</span></th>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="on_line.php">參加者資料</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="eat_namelist.php">葷素食名單</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="code_namelist.php">統一編號名單</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="teacher_list.php">教授出席名單</a></td>
  </tr>
  <!-- <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="../account.php">繳費收據</a></td>
  </tr> -->
  <?php
}
if( $adminss=="root2" )
{
?>
<tr>
    <td width="20" bgcolor="#E6FFFF"></td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="pw_edit.php">修改密碼</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="reviewer_add.php">新增審查者</a></td>
  </tr>
 <!--   <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="bestreviewer_add.php">新增最佳論文審查者</a></td>
  </tr> -->
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="reviewer_setup.php">審查稿件設定</a></td>
  </tr>
 <!--   <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="bestreviewer_setup.php">最佳論文審查稿件設定</a></td>
  </tr> -->
<?php /*  
  <tr>
    <th colspan="2"><span class="style1">審稿進度查詢</span></th>
  </tr> */
?>
<tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><?php echo "<a target=\"content\" href=\"no_paper_view.php?category=$category\">"?>論文定稿名單</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="root_type.php">論文資訊</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="reviewer_information_root2.php">審稿者資訊</a></td>
  </tr>
<!--  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="bestreviewer_information_root2.php">最佳論文審稿者資訊</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="root_brtype.php">最佳論文資訊</a></td>
  </tr> -->
    <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="excellent.php">最佳論文名單</a></td>
  </tr>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="change_reviewer.php">變更審稿者</a></td>
  </tr>
  
<?php
}
//發票
if( $adminss=="fund" )
{
?>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="code_namelist.php">統一編號名單</a></td>
  </tr>
  <?php
}
//車牌
if( $adminss=="cars" )
{
?>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="guard_namelist.php">自行開車名單</a></td>
  </tr>
  <?php
}
//用餐
if( $adminss=="meal" )
{
?>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="eat_namelist.php">葷素食名單</a></td>
  </tr>
  <?php
}
//簽到
if( $adminss=="registration" or $adminss=="root1")
{
?>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="registration_list.php?category=全部">簽到單</a></td>
  </tr>
  <?php
}
//收款情形
if( $adminss=="payment" or $adminss=="root1"  )
{
?>
  <!--<tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="payment_list.php">收款情形</a></td>
  </tr>-->
   <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="account_a.php">入帳上傳</a></td>
  </tr>  
  <?php
}
//銷帳核對
if( $adminss=="crossaccoun" or $adminss=="root1" )
{
?>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="content" href="crossaccoun_list.php?pay1=全部?category=全部">銷帳核對</a></td>
  </tr>
  <?php
}
?>
  <tr>
    <td width="20" bgcolor="#E6FFFF">　</td>
    <td class=menu bgcolor="#E6FFFF"><a target="_top" href="login_out.php">登出系統</a></td>
  </tr>
</table>
</body>
</html>