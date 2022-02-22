<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ThayDoiThongTinLoaiHang</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
-->
</style>
<script>
	function test() {
		re = /^\d+$/;
		if(form.t1.value!='')
		if (form.t1.value.match(re)==null) {
			alert('chi nhap so cho ma loai hang');
			form.t1.focus();
			form.t1.select();
			return false;
		}
		return true;
	}
</script>
</head>
<?
	$action = $_GET['action'];
	$MaLoaiHang=$_REQUEST['MaLoaiHang'];
	if($action=="edit")
	{
	     $sql=mysql_query("Select * from loaihang where MaLoaiHang=".$MaLoaiHang." ",$connect);
	}
	if($action == "update") {
		 
		$TenLH = $_REQUEST['t2'];
		$TrangThai = $_REQUEST['s'];
		$sql = "update loaihang set TenLoaiHang='".$TenLH."',TrangThai=".$TrangThai." Where MaLoaiHang = ".$MaLoaiHang ;
		if(mysql_query($sql,$connect)){ 
		 echo('<script>alert("Update thanh cong!!!")</script>');
		linkto('admin.php?go=xemthongtinhang');
	    }
		}
?>

 <?
      if($action=="edit")
	  {
	  while($raw=mysql_fetch_array($sql))
	  {
 ?>
<body>
<form id="form1" onsubmit="return test();" name="form" method="post" action="?go=suathongtinloaihang&action=update&MaLoaiHang=<? echo($MaLoaiHang)?>">
  <table width="485" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Thay Doi Thong Tin Loai Hang </div></td>
    </tr>
    <tr>
      <td width="127"><div align="right"><strong>Ten Loai Hang </strong></div></td>
      <td width="342"><div align="left">
        <input name="t2" type="text" id="t2" size="50" value="<? echo($raw['TenLoaiHang'])?>" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Trang Thai </strong></div></td>
      <td><div align="left">
        <label>
        <select name="s">
			<? 
				if($raw['TrangThai']==1) {
			?>
          			<option value="1">Hi&#7879;n</option>
					<option value="0">&#7848;n</option>
			<?
				}
				else {
			?>
         			<option value="0">&#7848;n</option>
					<option value="1">Hi&#7879;n</option>
			<?
				
				}
			?>
        </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><div align="left">
        <label>
        <input type="submit" name="Submit" value="Đổi" />
        </label>
        <input type="reset" name="Submit2" value="Không đổi" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?
}
}
?>
</html>
