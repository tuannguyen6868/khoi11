<?
	$sql="Select * From loaihang";
	$save=mysql_query($sql,$connect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thong Tin Loai Hang</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form id="form1" name="f1" method="post" action="">
  <table width="490" border="1" align="center">
    <tr>
      <td width="408" bgcolor="#000000"><div align="center" class="style1">Thong Tin Loai Hang </div></td>
    </tr>
  </table>
  <table width="494" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">&#272;i&#7873;u khi&#7875;n </div></td>
      <td width="110" bgcolor="#000000"><div align="center" class="style1">MaLoaiHang</div></td>
      <td width="142" bgcolor="#000000"><div align="center" class="style1">TenLoaiHang</div></td>
      <td width="124" bgcolor="#000000"><div align="center" class="style1">TrangThai</div></td>
    </tr>
    <tr>
	<?		 
			while($raw = mysql_fetch_array($save)) 
				{	
					 
	?>
      <td width="56"><div align="center">
        <label>        </label>
      </div>        <div align="center"><img onclick="location.href='admin.php?go=suathongtinloaihang&action=edit&MaLoaiHang=<? echo($raw['MaLoaiHang'])?>'" src="adminimages/b_edit.png" width="16" height="16" title="Edit Hang" /></div></td>
      <td width="28"><div align="center"><img src="adminimages/b_drop.png" width="16" height="16" onclick="if(confirm('ban muon xoa k?')){ location.href = 'admin.php?go=xemthongtinhang&action=delete&MaLoaiHang=<? echo($raw['MaLoaiHang'])?>&i=<? echo($i)?>' }" title="Xoa"/></div></td>
      <td><div align="center">
	  <?
	  		echo($raw['MaLoaiHang']);
	  ?>
	  </div></td>
      <td><div align="center">
	  <?
	  		echo($raw['TenLoaiHang']);
	  ?>
	  </div></td>
      <td><div align="center">
        <label>
	    <select onChange="location.href ='?go=xemthongtinhang&action=updatetrangthai&MaLoaiHang=<? echo($raw['MaLoaiHang'])?>&TrangThai='+this.value" name="s">
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
	<?
		}
	?>
  </table>
   
  
</form>
<?
	$action = $_GET['action'];
	
	if($action == "updatetrangthai") {
	$TrangThai = $_GET['TrangThai'];
	$geti = $_GET['i'];
	$MaLoaiHang = $_GET['MaLoaiHang'];
	$sql = "update loaihang set TrangThai=".$TrangThai."  where MaLoaiHang=".$MaLoaiHang;
	if(mysql_query($sql,$connect)) {
	   echo('<script>alert("Update thanh cong");</script>');
		linkto("admin.php?go=xemthongtinhang");
	}
	}
	if($action == "delete") {
		$MaLoaiHang = $_GET['MaLoaiHang'];
		$sql = "delete from loaihang where MaLoaiHang='".$MaLoaiHang."'";
		if(mysql_query($sql,$connect)) 
		    echo('<script>alert("Delete thanh cong");</script>');
			linkto("admin.php?go=xemthongtinhang");
	}

?>
</body>
</html>
