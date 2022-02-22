<? 
	$sql1 = "select MaHang,TenHang from hang where MaLoaiHang=1";
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
	function test() {
		if(f1.t1.value == '') {
			alert('mã sản phẩm không được để trống');
			f1.t1.focus();
			f1.t1.select();
			return false;
		}
		if(f1.t4.value != '')
			if(isNaN(f1.t4.value)) {
				alert('nhap so');
				f1.t4.focus();
				f1.t4.select();
				return false
			}
		if(f1.t5.value != '')
			if(isNaN(f1.t5.value)) {
				alert('nhap so');
				f1.t5.focus();
				f1.t5.select();
				return false
			}
		if(f1.t7.value != '')
			if(isNaN(f1.t7.value)) {
				alert('nhap so');
				f1.t7.focus();
				f1.t7.select();
				return false
			}
		if(f1.s2.value==0){
		    alert("Ban chua chon hang!");
			return false;
		}
		if(f1.s2.value==1){
		    alert("Ban chua chon hang!");
			return false;
		}
		 
	}
</script>
</head>
<?
	  if($action = "update")
	    {
		  $target = "../admin/anh/";
		  $target = $target . basename( $_FILES['f']['name']) ;
		  $target_soure = basename( $_FILES['f']['name']);
		  $ok=1;
		
		//This is our size condition
		if ($uploaded_size > 5000000)
		{
			echo "Your file is too large.<br>";
			$ok=0;
		}
		
		//This is our limit file type condition
		if ($uploaded_type =="text/php")
		{
			echo "No PHP files<br>";
			$ok=0;
		}
		
		//Here we check that $ok was not set to 0 by an error
		if ($ok==0)
		{
			Echo "Sorry your file was not uploaded";
		}
		
		//If everything is ok we try to upload it
		else
		{
			if(move_uploaded_file($_FILES['f']['tmp_name'], $target))
			{
				echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
				echo("<br>");
			}
			else
			{
				echo "Sorry, there was a problem uploading your file.";
			}
			
		}
			 
			$TenSP = $_REQUEST['t2'];
			$ThongTinSP =$_REQUEST['te'];
			$HinhAnh = $target_soure;
			$ThoiGianBH = $_REQUEST['t4'];
			$Gia = $_REQUEST['t5'];
			$NgayNhap =  $_REQUEST['t6'];
			$SoLuong = $_REQUEST['t7'];
			$XuatSu = $_REQUEST['t8'];
			$TrangThai = $_REQUEST['s1'];
			//$MaHang = $_REQUEST['s2'];
			if($HinhAnh==""){
			$sql2 = "Update sanpham Set TenSP='".$TenSP."' , ThongTinSP='".$ThongTinSP."', ThoiGianBH=".$ThoiGianBH.", Gia='".$Gia."',XuatSu='".$XuatSu."',TrangThai=".$TrangThai."  Where  MaSP =".$MaSP;
			}else{
			$sql2 = "Update sanpham Set TenSP='".$TenSP."' , ThongTinSP='".$ThongTinSP."',HinhAnh='".$HinhAnh."' , ThoiGianBH=".$ThoiGianBH.", Gia='".$Gia."',XuatSu='".$XuatSu."',TrangThai=".$TrangThai."  Where  MaSP =".$MaSP;
			}
            //echo($sql2);
			//die();
			 if(mysql_query($sql2,$connect)){
			     echo("<script>alert('Sua thanh cong!');</script>");
				 linkto('admin.php?go=danhsachsp');
				}
			
		}
?>
<?
		 
		 $sql3 = "select MaHang,TenHang from hang where MaLoaiHang = 3";
	     $save3= mysql_query($sql3,$connect);	     
?>
 
 
<body>
<?
         $action = $_REQUEST['action'];
	     $MaSP=$_REQUEST['MaSP'];
	 
	     $sql="Select * from sanpham where MaSP=".$MaSP;
         $row=mysql_query($sql,$connect);
	     $raw=mysql_fetch_array($row);
	     $MaSP=$raw['MaSP'];
		 $ten =$raw["TenSP"];
		 $ThongTinSP=$raw['ThongTinSP'];
		 $anh=$raw['HinhAnh'];
	     $ThoiGianBH=$raw['ThoiGianBH'];
	     
?>
<form action="?go=changesp&action=update&MaSP=<? echo($MaSP) ?>" method="post" enctype="multipart/form-data" name="f1" id="f1" onsubmit="return test();">
  <table width="488" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Thay Đổi Thông Tin Sản Phẩm </div></td>
    </tr>
    <tr>
      <td width="145"><div align="right">Tên SP </div></td>
      <td width="327"><input name="t2" type="text" id="t2" value="<?=$ten?>" /></td>
    </tr>
    <tr>
      <td height="46"><div align="right">ThôngTin SP </div></td>
      <td><label>
        <textarea  name="te" cols="40" id="te"><?=$ThongTinSP?></textarea>
      </label></td>
    </tr>
    <tr>
      <td height="110"><div align="right">Hình Ảnh </div></td>
      <td align="left" valign="middle">
        <div align="left">
          <input name="f" type="file" id="f" value="<?=$anh?>" />        
        <img src="../admin/anh/<?=$anh?>" name="AnhSP" width="100" height="100" align="absmiddle" id="AnhSP" /></div></td>
	  
    </tr>
    <tr>
      <td><div align="right">Thời Gian BH </div></td>
      <td><input name="t4" type="text" id="t4" value="<?=$ThoiGianBH?>" /></td>
    </tr>
    <tr>
      <td><div align="right">Giá</div></td>
      <td><input name="t5" type="text" id="t5" value="<? echo($raw['Gia'])?>" /></td>
    </tr>
    <tr>
      <td><div align="right">Ngày Nhập </div></td>
      <td><input name="t6" type="text" id="t6" value="<? echo($raw['NgayNhap'])?>" /></td>
    </tr>
    <tr>
      <td><div align="right">Xuất Sứ </div></td>
      <td><input name="t8" type="text" id="t8" value="<? echo($raw['XuatSu'])?>" /></td>
    </tr>
    <tr>
      <td><div align="right">Trạng Thái </div></td>
      <td><label>
        <select name="s1" id="s1">
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
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Tên Hãng </div></td>
      <td>  <select name="s2">
          <option value="0">MayTinhXachTay</option>
		  <option>---------------------------------</option>
		  	<? 
				while($raw1 = mysql_fetch_array($save1))
				 {
			?>
		        <option value="<? echo($raw1['MaHang'])?>"><? echo($raw1['TenHang'])?></option>
			<?
				 }
			?>
		  <option>---------------------------------</option>
          <option value="1">MayTinhDeban</option>
		  <option>---------------------------------</option>
		  	<? 
				while($raw3 = mysql_fetch_array($save3))
				 {
			?>
		        <option value="<? echo($raw3['MaHang'])?>"><? echo($raw3['TenHang'])?></option>
			<?
				 }
			?>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Luu" />
        <input type="reset" name="Submit2" value="Hủy" />
      </label></td>
    </tr>
  </table>
</form>
</body>
 </html>
