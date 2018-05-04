<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$adminss = $_SESSION["adminss"];
$id = $_SESSION["adminid"];
$password = $_SESSION["adminpw"];
require "../db.php";

//讀取評審的sn
$str = "select sn from reviewer where re_id='$id' and re_password='$password' ";
$list = mysql_query($str,$link);
list($sn) = mysql_fetch_row($list);

//驗證評審權限
$gg=0;
$str = "select papername,chkstate,reviewer_sn,reviewer_sn1 from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($papername,$paper_chkstate,$reviewer_sn,$reviewer_sn1) = mysql_fetch_row($list);

if( $reviewer_sn  == $sn )$gg++;
if( $reviewer_sn1 == $sn )$gg++;

if( $gg==0 )
{
  echo "很抱歉，這不屬於您的範圍哦！";
  exit;
}

//驗整是否已經審查
if( $paper_chkstate!=0 )
{
  echo "很抱歉，此篇論文已經審查過了！";
  exit;
}
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
</head>

<body>
<?php
$ip=$REMOTE_ADDR;
$str = "insert into action(ip,id,action,time) values('$ip','$id','進入 $papername 審查頁面',now())";
mysql_query($str,$link);
?>
<Script Language="javascript">
function formcheck()
{
if (document.Regist.chkstate[0].checked == false && document.Regist.chkstate[1].checked == false && document.Regist.chkstate[2].checked == false && document.Regist.chkstate[3].checked == false && document.Regist.chkstate[4].checked == false )
{
			alert("請選擇評審結果！");
                        return false;
   }
			return ture;
}
</script>

<style type="text/css">
  .title 
    { font-size: 10pt;
      color: rgb(0, 45, 0);
      background-color: rgb(255, 255, 180);
      text-align:center;
      line-height: 15pt;
      letter-spacing:1px;
    }
 .content 
    { 
      color: rgb(36, 36, 36);
      font-size: 9pt;
    }

</style>


<?php
$str = "select serial,papername,paperman,category,number,papernumber,chkstate,propose from my_papers where serial='$serial'";
$list = mysql_query($str,$link);
list($serial,$papername,$paperman,$category,$number,$papernumber,$chkstate,$propose) = mysql_fetch_row($list);

 //-----------------類別名稱、代號----------------------
      $strn = "select name,typenumber from numbers where sn='$category'"; 
      $listn = mysql_query($strn,$link); 
      list($category,$typenumber) = mysql_fetch_row($listn);

 //-----------------------審查狀態----------------
      $strk = "select name from chkstate where sn='$chkstate'";
      $listk = mysql_query($strk,$link);
      list($chkstate) = mysql_fetch_row($listk);
?>

<form action="examine_update.php" method="post" name="Regist" onsubmit="return formcheck();">
<div align="center">
<table>
 <tr>
    <td width="120" class=title>論文名稱</td>
    <td class=content><?php=$papername?></td>
 </tr>
 <tr>
    <td width="120" class=title>論文作者</td>
    <td class=content><?php=$paperman?></td>
 </tr>
 <tr>
    <td width="120" class=title>投稿類別</td>
    <td class=content><?php=$category?></td>
 </tr>
 <tr>
    <td width="120" class=title>論文編號</td>
    <td class=content><?php=$typenumber.$number?></td>
 </tr>
 <tr>
    <td width="120" class=title>國科會計劃編號</td>
    <td class=content><?php=$papernumber?></td>
 </tr>
 <tr>
    <td width="120" class=title>論文審查</td>
    <td class=content><?php
                        $str = "select sn,name from chkstate";
                        $list = mysql_query($str,$link);
                        while(list($chk_sn,$name) = mysql_fetch_row($list))
                         {
                           echo "<input type=\"radio\" name=\"chkstate\" value=\"$chk_sn\">$name<br>";           
                         }
                       ?></td>
                      
 </tr>
 <tr>
    <td width="120" class=title>建議</td>
    <td class=content><textarea name=propose cols="30" rows="10"><?php=$propose?></textarea></td>
 </tr>
 <tr>
    <td colspan="2" align="center"><input type="button" value="上一頁" onClick="history.go(-1)">&nbsp;&nbsp;<input type="submit" value="上傳審查結果" onclick="return confirm('確定要上傳審查結果？只能審查一次，若確定上傳後將無法修改！')"></td>
    <input type="hidden" name="serial" value="<?php=$serial?>">
 </tr>
</table>
</div>
</form>

</body>
</html>

