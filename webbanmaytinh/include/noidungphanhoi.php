<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></meta>
<style type="text/css">
<!--
.style13 {
	font-size: 12px;
	color: #993300;
}
.style16 {font-size: 10px}
.style17 {font-size: 12px}
-->
</style>
 
 <?
	$pid = $_GET['pid'];
	$sql = "select * from thongtinphanhoi where MaSP=".$pid." and TrangThai = 1";
	$save = mysql_query($sql , $connect);
?>
<?
     $count=0;
	while ($raw = mysql_fetch_array ($save))
		{
		$count++;
		$MaKH=$raw['MaKH'];
?>
<style type="text/css">
<!--
.style7 {font-size: 14px}
.style9 {color: #000000}
-->
</style>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></meta>
<style type="text/css">
<!--
.style10 {color: #990066}
-->
</style>
 
<table width="100%" border="0" align="center">
  <tr>
    <td height="27" colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><hr></hr></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Ý Kiến Góp Y Khách </td>
  </tr>
  <tr>
    <td width="107" align="left" valign="top" bgcolor="#FFFFFF"><span class="style16">T&agrave;i Kho&#7843;n:</span></td>
    <td width="960" height="27" align="left" valign="top" bgcolor="#FFFFFF"><span class="style16"> </span>
    <h5><? echo($r1['TaiKhoan']);?></h5></td>
  </tr>
  <?
       $sql1="Select * from khachhang where MaKH=".$MaKH;
	   $s1=mysql_query($sql1,$connect);
	   $r1=mysql_fetch_array($s1);
  ?>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><div align="left"><span class="style17" style="color:#993300">Ti&ecirc;u Đ&#7873; Tin</span></div></td>
    <td height="25" align="right" bgcolor="#FFFFFF"><div align="left"><span class="style13"> </span><a title="<? echo($raw['NoiDung'])?>"><strong style="color:#993300"> <? echo($raw['TieuDe'])?></strong></a></div></td>
  </tr>
</table>
<?
		}
?>

