<? 
	$sql1 = "select MaLoaiHang , TenLoaiHang from loaihang";
	$save1= mysql_query($sql1,$connect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
-->
</style>
<script>
	function test101() {
		 if(frmH1.t2.value==""){
		     alert("Truong nay khong duoc de trong!!!");
			 frmH1.t2.focus();
			 return false;
		 }
		 if(frmH1.s1.value==0){
		      alert("Ban chua chon loai hang!!!");
			  return false;
		 }
		 
		 
		return true;
	 }
</script>
</head>
<?
	$action = $_GET['action'];
	$MaHang=$_REQUEST['MaHang'];
	if($action=="edit")
	{
	      $sql=mysql_query("Select * from hang where MaHang=".$MaHang." ",$connect);
	}
	if($action == "update") {
		 
		$TenHang= $_REQUEST['t2'];
		$MaLoaiHang =$_REQUEST['s1'];
		$TrangThai = $_REQUEST['s2'];
		$sql = "update hang set TenHang='".$TenHang."',TrangThai=".$TrangThai.",MaLoaiHang=".$MaLoaiHang." Where MaHang = ".$MaHang ;
		// echo($sql);
		 //die();
		if(mysql_query($sql,$connect)){
		    echo('<script>alert("Update thanh cong !!!");</script>');
			linkto("admin.php?go=danhsachhang");
		}
		
	}
?>
<?
    
     if($action=="edit")
	 {
	 $raw=mysql_fetch_array($sql);
?>
<body>
<form id="frmH1" name="frmH1" onsubmit="return test101();" method="post" action="?go=doithongtinhang&action=update&MaHang=<? echo($MaHang)?>">
  <table width="367" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Thay &#272;&#7893;i Th&ocirc;ng Tin H&agrave;ng </div></td>
    </tr>
    <tr>
      <td width="137"><div align="right"><strong>Tên Hàng </strong></div></td>
      <td width="214"><div align="left">
        <input name="t2" type="text" id="t2" value="<? echo($raw['TenHang'])?>" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Mã Loại Hàng </strong></div></td>
      <td><div align="left">
        <label>
        <select name="s1">
		       
					<option value="<? echo($raw['MaLoaiHang'])?>"><? echo($raw['TenLoaiHang'])?></option>
			<? 
				while($raw1 = mysql_fetch_array($save1))
				 {
				 	if($raw['MaLoaiHang'] == $raw1['TenLoaiHang']) continue;
			?>
				<option value="<? echo($raw1['MaLoaiHang'])?>" ><? echo($raw1['TenLoaiHang'])?></option>
			<?
				 }
			?>
        </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Trạng Thái </strong></div></td>
      <td><div align="left">
        <label>
        <select name="s2" id="s2">
			<? 
				if ($raw['TrangThai']==1) {
			?>
				<option value="1">Hiện</option>
				<option value="0">Ẩn</option>
			<?
				}else{
			?>
				<option value="0">Ẩn</option>
				<option value="1">Hiển</option>
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
        <input type="submit" name="Submit" value="&#272;&#7893;i" />
        </label>
        <label>
        <input type="submit" name="Submit2" value="Kh&ocirc;ng &#273;&#7893;i" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<?
 
}
?>
</body>
</html>
