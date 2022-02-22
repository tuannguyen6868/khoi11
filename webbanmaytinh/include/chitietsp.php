 <?
   $proid=$_REQUEST['pid'];
   $sql="select * from sanpham where MaSP=".$proid;
   $result = mysql_query($sql,$connect);
   $save = mysql_fetch_array($result);
      
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></meta>
<form id="frm" name="frm" method="post" action="index.php?go=prodetail&action=com&MaSP=<? echo $pid ;?>" >
<table width="100%" border="0" cellpadding="3">
  <tr>
    <th width="30%" scope="col"><div align="left">
      <p>&nbsp;</p>
      <? echo($save['TenSP']);?></div></th>
    <th width="70%" valign="top" scope="col"><div align="left">
      <p>&nbsp;</p>
       <? echo($save['ThongTinSP']);?> </div></th>
	 
  </tr>
  <tr>
    <td rowspan="4" valign="top"><div align="left"><a href="anhlon/<? echo($save['HinhAnh']);?>" rel="lightbox"><img src="anh/<? echo($save['HinhAnh']);?>" width="151" height="159" border="0"  /></div></td>
  </a></tr>
  
  <tr>
    <td height="30">Gi&aacute; : <? echo(number_format($save['Gia']));?>(<span id="ctl00_wpM_gwppD_pD_fD_lVpr" class="dprice">VN&#272;</span>)</td>
  </tr>
  <tr>
    <td  height="30">T&igrave;nh Tr&#7841;ng:<? 
						      if($save['TinhTrang']==1){echo("Còn Hàng");
							?>
						     <?
							  }else{
							            echo("Hết Hàng");
							       }
						    ?></td>
  </tr>
  <tr>
    <td  height="30">B&#7843;o H&agrave;nh : <? echo($save['ThoiGianBH']);?>(th&aacute;ng)</td>
  </tr>
  <tr>
    <td align="center"><a href="?go=shoppingcart&action=add&pid=<? echo($save['MaSP'])?>"><? if($save['TinhTrang']==1){echo("&#272;ặt H&agrave;ng");} ?></a></td>
    <td></td>
  </tr>
  <tr>
    </tr>
</table>
<br />
</form>
<? 
if(session_is_registered('tien')) {  require ("phanhoi.php"); } else  { echo("Ban Hay Dang Nhap De Gop Y Cho San Pham Cua Chung Toi ");}
 
?>
<? 
	require("noidungphanhoi.php");
?>

<div class="center_title_bar">Sản Phẩm Cùng Hãng </div>
<? require("joinpro.php")?>