 
<?php

$action=$_REQUEST['action'];
 if($action=='add')
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
		
	$TenSP = $_REQUEST['t1'];
	$ThongTinSP = $_REQUEST['te'];
	$newimage=$target_soure;
	$ThoiGianBH = $_REQUEST['t3'];
	$Gia = $_REQUEST['t4'];
	$NgayNhap = $_REQUEST['t5'];
	$SoLuong = $_REQUEST['t6'];
	$XuatSu = $_REQUEST['t7'];
	$TinhTrang=$_REQUEST['s'];
	$TrangThai = $_REQUEST['s1'];
	$MaHang = $_REQUEST['s2'];
	$sp="Select * from sanpham where TenSP='".$TenSP."'";
	$resp=mysql_query($sp,$connect);
	$rowsp=mysql_num_rows($resp);
	if($rowsp>=1)
	{
	        echo("<script>alert('Ten San Pham nay da co roi !');</script>");
		    echo("<script>window.location='admin.php?go=themsp';</script>");
	}
	else{
	$sql = "insert into sanpham(TenSP,ThongTinSP,HinhAnh,ThoiGianBH,Gia,NgayNhap,TinhTrang,XuatSu,TrangThai,MaHang) values('$TenSP','$ThongTinSP','$newimage',$ThoiGianBH,$Gia,now(),$TinhTrang,'$XuatSu',$TrangThai,$MaHang);";
	//echo($sql);
	//die();
	if(mysql_query($sql,$connect));
	{
	   echo("<script>alert('Them thanh cong!');</script>");
	   linkto("admin.php?go=danhsachsp");
	}
	}
	}
?>
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
			alert('tên sản phẩm không được để trống');
			f1.t1.focus();
			f1.t1.select();
			return false;
		}
		if(f1.te.value == '') {
			alert('thong tin của sản phẩm không được để trống');
			f1.te.focus();
			f1.te.select();
			return false;
		}
		if(f1.f.value==""){
		    alert("Ban chua uplaod anh!!!");
			return false;
		}
		if(f1.t3.value == '') {
			alert('thời gian bảo hành của sản phẩm không được để trống');
			f1.t3.focus();
			f1.t3.select();
			return false;
		}
		if(f1.t3.value<0) {
			alert('thời gian bảo hành của sản phẩm phai lon hon 0');
			f1.t3.focus();
			f1.t3.select();
			return false;
		}
		if(isNaN(f1.t3.value))	{
			alert('nhap so');
			f1.t3.focus();
			f1.t3.select();
			return false;
		}
		if(f1.t4.value == '') {
			alert('giá của sản phẩm không được để trống');
			f1.t4.focus();
			f1.t4.select();
			return false;
		}
		if(f1.t4.value<=0) {
			alert('giá cua san pham phai la so duong');
			f1.t4.focus();
			 
			return false;
		}
		if(isNaN(f1.t4.value))	{
			alert('nhap so');
			f1.t4.focus();
			f1.t4.select();
			return false;
		}
		
		if(f1.t7.value =='') {
			alert('xuất sứ không được để trống');
			f1.t7.focus();
			f1.t7.select();
			return false;
		}
		if(f1.s2.value==0){
		    alert('Ban chua chon ten hang');
			return false;
		}
		if(f1.s2.value==1){
		    alert('Ban chua chon ten hang');
			return false;
		}
		 
	}
</script>
</head>
<? 
	$sql1 = "select MaHang,TenHang from hang where MaLoaiHang = 1";
	$save1= mysql_query($sql1,$connect);
	$sql2 = "select MaHang,TenHang from hang where MaLoaiHang = 3";
	$save2= mysql_query($sql2,$connect);
?>
<body>
<form action="?go=themsp&action=add" method="post" enctype="multipart/form-data" name="f1" id="f1" onSubmit="return test();">
  <table width="598" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Thêm Thông Tin Sản Phẩm </div></td>
    </tr>
    <tr>
      <td width="151"><div align="right"><strong>Tên SP</strong>: </div></td>
      <td width="431"><div align="left">
        <label>
        <input name="t1" type="text" id="t1" size="50" />
        </label>
      </div></td>
    </tr>
    <tr>
      <td height="59"><div align="right"><strong>Thông Tin SP </strong></div></td>
      <td><div align="left">
        <label>
        <textarea name="te" cols="50" rows="10" id="te"></textarea>
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Hình ảnh </strong></div></td>
      <td><div align="left">
        <label>
        <input name="f" type="file" id="f" />
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Thời GianBH </strong></div></td>
      <td><div align="left">
        <input name="t3" type="text" id="t3" size="20" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Giá</strong></div></td>
      <td><div align="left">
        <input name="t4" type="text" id="t4" size="20" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Tình Trạng</strong></div></td>
      <td><select name="s" id="s">
        <option value="1">Con Hang</option>
        <option value="0">Het Hang</option>
      </select></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Xuất Sư </strong></div></td>
      <td><div align="left">
        <input name="t7" type="text" id="t7" size="15" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Trạng Thái </strong></div></td>
      <td><div align="left">
        <label>
        <select name="s1">
          
          <option value="1">Hi&#7879;n</option>
		  <option value="0">&#7848;n</option>
        </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td height="32"><div align="right"><strong>Tên Hãng </strong></div></td>
      <td><div align="left">
        <select name="s2" id="s2">
          <option value="0" selected>MayTinhXachTay</option>
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
				while($raw2 = mysql_fetch_array($save2))
				 {
			?>
		        <option value="<? echo($raw2['MaHang'])?>"><? echo($raw2['TenHang'])?></option>
			<?
				 }
			?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Luu" />
        <input type="reset" name="Submit2" value="Huy" />
      </label></td>
    </tr>
  </table>
</form>
 
</body>

</html>

