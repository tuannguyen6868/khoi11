<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chi tiết hóa đơn bán</title>
<style type="text/css">
<!--
.style1 {color: #FFFF00}
-->
</style>
<?
	$SoHD = $_GET['SoHD'];
	$sql1 = "select * from hoadonban where SoHD = $SoHD ";
	$save1 = mysql_query($sql1 , $connect);
	$raw1 = mysql_fetch_array($save1);
?>
<?
	$sql2 = "select * from khachhang where MaKH in (select MaKH from hoadonban where SoHD = $SoHD)";
	$save2 = mysql_query($sql2 , $connect);
	$raw2 = mysql_fetch_array($save2);
?>
<?
	$sql3 = "select * from hoadonban where SoHD = $SoHD";
	$save3 = mysql_query($sql3 , $connect);
	$raw3 = mysql_fetch_array($save3);
?>
<?
        $SoHD=$_REQUEST['SoHD'];
		$sql="Select hinhthucthanhtoan.* from hinhthucthanhtoan , hoadonban where hinhthucthanhtoan.MaThanhToan=hoadonban.MaThanhToan and hoadonban.SoHD=".$SoHD;
		$save=mysql_query($sql,$connect);
		$raw=mysql_fetch_array($save);
?>
</head>

<body>
<table width="705" height="240" border="1" align="center">
  <tr>
    <td height="36" colspan="3" align="center" bgcolor="#000000"><span class="style1">CHI TIẾT HÓA ĐƠN BÁN</span> </td>
  </tr>
  <tr>
    <td width="254" height="54" align="center" bgcolor="#000000"><span class="style1">HÓA ĐƠN </span></td>
    <td width="229" align="center" bgcolor="#000000"><span class="style1">KHÁCH HÀNG </span></td>
    <td width="200" align="center" bgcolor="#000000"><span class="style1">NGƯỜI NHẬN </span></td>
  </tr>
  <tr>
    <td height="140" valign="top">
	
<!-- 

	Bang thong tin cua hoa don
	
-->

	<table width="254" height="133" border="0">
      <tr>
        <td width="76" align="left">Số HĐ: </td>
        <td width="136"><? echo($raw1['SoHD'])?></td>
      </tr>
      <tr>
        <td height="21" align="left">HT Thanh Toán: </td>
        <td width="136"><? echo($raw['LoaiThanhToan'])?></td>
      </tr>
      <tr>
        <td align="left">Trang Thái: </td>
        <td> <select name="TrangThai" onChange="location.href='?go=orderdetail&action=update&SoHD=<? echo($raw1['SoHD']);?>&status='+this.value">
		<?
		        if($raw1['TrangThai']==2)
				{
		?>
		 
		<option value="2">Da Xu Ly</option>
		 <?
	  	}else{
		if($raw1['TrangThai']==1){
	  ?>
		  <option value="1">Dang Xu Ly</option>
		  <option value="0">Chua Xu Ly</option>
		  <option value="2">Da Xu Ly</option>
		 <?
		}else{
		?>
		  <option value="0">Chua Xu Ly</option>
		  <option value="1">Dang Xu Ly</option>
		<?
		}}
		?>
		 
        </select></td>
      </tr>
      <tr>
        <td align="left">Ngày Lập: </td>
        <td><? echo($raw1['NgaylapHD'])?></td>
      </tr>
      <tr>
        <td height="25" align="left">Ngày Gửi: </td>
        <td><? echo($raw1['NgayxulyHD'])?></td>
      </tr>
    </table>
	</td>
    <td valign="top">
<!--

	bang thong tin ve khach hang
	
-->
	<table width="229" height="105" border="0">
      <tr>
        <td width="94" align="left">Tên:</td>
        <td width="115"><? echo($raw2['TenKH'])?></td>
      </tr>
      <tr>
        <td align="left">Địa Chỉ: </td>
        <td><? echo($raw2['DiaChi'])?></td>
      </tr>
      <tr>
        <td align="left">Điện Thoại: </td>
        <td><? echo($raw2['DienThoai'])?></td>
      </tr>
      <tr>
        <td align="left">Email:</td>
        <td><? echo($raw2['Email'])?></td>
      </tr>
    </table>
	</td>
    <td valign="top">
	<!--
	
		bang chi tiet khach hang nhan
	
	-->
	<table width="200" height="79" border="0">
      <tr>
        <td width="78" align="left">Tên:</td>
        <td width="112"><? echo($raw3['TenKH'])?></td>
      </tr>
      <tr>
        <td height="22" align="left">Địa Chỉ: </td>
        <td><? echo($raw3['DiachiKH'])?></td>
      </tr>
      <tr>
        <td align="left">Điện Thoại: </td>
        <td><? echo($raw3['DienThoaiKH'])?></td>
      </tr>
    </table>
	</td>
  </tr>
</table>
<?
	$sql = "select chitiethoadonban.SoHD , chitiethoadonban.MaSP , chitiethoadonban.Soluong , chitiethoadonban.Dongia , chitiethoadonban.Dongia*chitiethoadonban.Soluong as tongtien , TenSP from chitiethoadonban , sanpham where chitiethoadonban.MaSP = sanpham.MaSP and chitiethoadonban.SoHD = $SoHD";
	$save = mysql_query($sql , $connect);
?>
  <table width="702" border="1" align="center">
    <tr>
      <td align="center" bgcolor="#000000"><span class="style1">Số</span></td>
      <td align="center" bgcolor="#000000"><span class="style1">Mã SP </span></td>
      <td align="center" bgcolor="#000000"><span class="style1">Tên SP </span></td>
      <td align="center" bgcolor="#000000"><span class="style1">Số Lượng </span></td>
      <td align="center" bgcolor="#000000"><span class="style1">Đơn Giá </span></td>
      <td align="center" bgcolor="#000000"><span class="style1">Thành Tiền </span></td>
    </tr>
	<?
		$i = 1;
		$tong = 0.0;
		while ($re = mysql_fetch_array($save))
			{
	?>
    <tr>
      <td align="center"><? echo($i)?></td>
      <td align="center"><? echo($re['MaSP'])?></td>
      <td align="center"><? echo($re['TenSP'])?></td>
      <td align="center"><? echo($re['Soluong'])?></td>
      <td align="center"><? echo(number_format($re['Dongia']))?></td>
      <td align="center"><? echo($re['tongtien'])?></td>
    </tr>
	<?
				$i++;
				$tong +=$re['Soluong']*$re['tongtien'];
			}
	?>
    <tr>
      <td colspan="5" align="right">Tổng Tiền: </td>
      <td><? echo(number_format($tong))?></td>
    </tr>
  </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
          $SoHD=$_REQUEST['SoHD'];
		  $TrangThai=$_REQUEST['status'];
		  if($action=="update")
		  {
		        $sql="Update hoadonban set TrangThai=".$TrangThai." where SoHD=".$SoHD;
				if(mysql_query($sql,$connect))
		        {
			            linkto("admin.php?go=orderdetail&SoHD=$SoHD");
		        }	
		  }
?>
