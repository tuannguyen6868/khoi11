<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {color: #FFFF00}
-->
</style>
 <?
	$action = $_GET['action'];
	$MaKH=$_REQUEST['MaKH'];
	if($action=='edit')
	{
	       $sql=mysql_query("Select * from khachhang where MaKH=".$MaKH." ",$connect);
	}
	if($action == "updatethongtin") {
	//	$MaKH = $_GET['MaKH'];
		$TenKH = $_REQUEST['t1'];	
		$Matkhau = $_REQUEST['t2'];
		$diachi= $_REQUEST['t4'];
		$dienthoai = $_REQUEST['t5'];
		$email = $_REQUEST['t6'];
		$gioitinh = $_REQUEST['s1'];
		$MaKH1 = $_REQUEST['t11'];
		$TrangThai =$_REQUEST['s2'];
		$sql2="update khachhang set MaKH ='$MaKH1' , TenKH='$TenKH' , MatKhau = '$Matkhau' , DiaChi = '$diachi' , DienThoai = '$dienthoai' , Email = '$email' , GioiTinh = '$gioitinh' , TrangThai = '$TrangThai' Where MaKH = '$MaKH'";
		$re=mysql_query($sql2,$connect);
			linkto("admin.php?go=khachhang");
		
	}
?>
<script>
	function test() {
		re=/^\w+@(\w+.{2,3})+\w{1,3}$/;
		if(f1.t11.value == '') {
			alert('Ten khach hang khong duoc de trong');
			f1.t11.focus();
			return false;
		}
		if(f1.t1.value=='') {
			alert('ten khach hang khong duoc de trong');
			f1.t1.focus();
			return false;
		}
		if(f1.t8.value == '') {
			alert('tai khoan khong duoc de trong');
			f1.t8.focus();
			return false;
		}
		if(f1.t2.value == '') {
			alert('mat khau khong duoc de trong');
			f1.t2.focus();
			return false;
		}
		if(f1.t3.value == '') {
			alert('xac nhan lai mat khau');
			f1.t3.focus();
			return false;
		}
		if(f1.t3.value != f1.t2.value) {
			alert('mat khau xac nhan khong dung');
			f1.t3.focus();
			f1.t3.select();
			return false;
		}
		if(f1.t5.value == '') {
			alert('so dien thoai khong duoc de trong');
			f1.t5.focus();
			return false;
		}
		if(isNaN(f1.t5.value)) {
			alert('nhap so');
			f1.t5.focus();
			f1.t5.select();
			return false;
		}
		if(f1.t6.value == '') {
			alert('email khong duoc de trong');
			f1.t6.focus();
			return false;
		}
		if(re.test(f1.t6.value) == false) {
			alert('nhap sai email');
			f1.t6.focus();
			f1.t6.select();
			return false;
		}
		if(f1.t7.value == '') {
			alert('xac nhan lai email');
			f1.t7.focus();
			return false;
		}
		if(f1.t7.value != f1.t6.value) {
			alert('xac nhan sai email');
			f1.t7.focus();
			f1.t7.select();
			return false;
		}
	return true;
	}
</script>
</head>
<?
    if($action=="edit")
	{
	while($raw=mysql_fetch_array($sql))
	{
?>
<body>
<form name="f1" onsubmit="return test();" method="post" action="?go=thaydoithongtinkh&action=updatethongtin&MaKH=<? echo($MaKH)?>">
  <table width="464" border="1" align="center">
    <tr>
      <td colspan="2" align="center" bgcolor="#000000"><span class="style2">THAY ĐỔI THÔNG TIN KHÁCH HÀNG </span></td>
    </tr>
    <tr>
      <td align="right">MaKH:</td>
      <td align="left"><label>
        <input name="t11" value="<? echo($raw['MaKH'])?>" type="text" id="t11">
      </label></td>
    </tr>
    <tr>
      <td width="142" align="right">TênKH:</td>
      <td width="306" align="left"><label>
        <input name="t1" type="text" value="<? echo($raw['TenKH'])?>" id="t1">
      </label></td>
    </tr>
    <tr>
      <td align="right">TaiKhoan:</td>
      <td align="left"><label>
        <input name="t8" type="text" value="<? echo($raw['TaiKhoan'])?>" id="t8" />
      </label></td>
    </tr>
    <tr>
      <td align="right">MậtKhẩu:</td>
      <td align="left"><input name="t2" type="password" value="<? echo($raw['MatKhau'])?>" id="t2"></td>
    </tr>
    <tr>
      <td align="right">Xác Nhận Mật Khẩu:</td>
      <td align="left"><input name="t3" type="password" value="<? echo($raw['MatKhau'])?>" id="t3"></td>
    </tr>
    <tr>
      <td align="right">Địa Chỉ: </td>
      <td align="left"><input name="t4" value="<? echo($raw['DiaChi'])?>" type="text" id="t4" size="50"></td>
    </tr>
    <tr>
      <td align="right">Điện Thoại: </td>
      <td align="left"><input name="t5" type="text" value="<? echo($raw['DienThoai'])?>" id="t5"></td>
    </tr>
    <tr>
      <td align="right">Email:</td>
      <td align="left"><input name="t6" type="text" id="t6" value="<? echo($raw['Email'])?>" size="30"></td>
    </tr>
    <tr>
      <td align="right">Xác Nhận Email: </td>
      <td align="left"><input name="t7" type="text" id="t7" value="<? echo($raw['Email'])?>" size="30"></td>
    </tr>
    <tr>
      <td align="right">Giới Tính: </td>
      <td align="left"><label>
        <select name="s1" id="s1">
		<? if($raw['GioiTinh'] == 1) 
			{ 
		?>
          <option value="1">Nam</option>
          <option value="0">Nu</option>
		 <? } 
		 	else {
		 ?>
		  <option value="0">Nu</option>
		  <option value="1">Nam</option>
		  <?
		  	}
		  ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">TrangThai:</td>
      <td align="left"><label>
        <select name="s2" id="s2">
<? if($raw['TrangThai'] == 1)
		 {
		?>
          <option value="1">KhongKhoa</option>
          <option value="0">Khoa</option>
		 <?
		 	} 
			else {
		 ?>
		  <option value="0">Khoa</option>
		  <option value="1">KhongKhoa</option>
		  <? 
		  	}
		  ?> 
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="left"><label>
        <input type="submit" name="Submit" value="Lưu">
        <input type="reset" name="Submit2" value="Hủy">
      </label></td>
    </tr>
  </table>
</form>
</body>
<? 
}
}
?>
</html>
