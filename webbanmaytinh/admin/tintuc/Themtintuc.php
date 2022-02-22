<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm thông tin tin tức</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
-->
</style>
<script>
	function test7() {
		if(frmNew.t1.value =='') {
			alert('Tiêu đề tin tức không được để trống');
			frmNew.t1.select();
			return false;
		}
		if(frmNew.t2.value =='') {
			alert('Nội dung tin tức không được để trống');
			frmNew.t2.focus();
			frmNew.t2.select();
			return false;
		
		}
		if(frmNew.f1.value==''){
		     alert("Ban Chua upload anh");
			 return false;
		}
		if(frmNew.t3.value =='') {
			alert('Nguồn tin tức không được để trống');
			frmNew.t3.focus();
			frmNew.t3.select();
			return false;
		}
		 return true;
		 
		 
	}
</script>
</head>
<?php

 $action=$_REQUEST['action'];
 if($action=='add')
  {
        $target = "../admin/anh/";
		$target = $target . basename( $_FILES['f1']['name']) ;
		$target_soure = basename( $_FILES['f1']['name']);
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
			echo "Sorry your file was not uploaded";
		}
		
		//If everything is ok we try to upload it
		else
		{
			if(move_uploaded_file($_FILES['f1']['tmp_name'], $target))
			{
				echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
				echo("<br>");
			}
			else
			{
				echo "Sorry, there was a problem uploading your file.";
			}
			
		 }
	$Tieudetin = $_REQUEST['t2'];
	$Ngayduatin = $_REQUEST['t3'];
	$Noidungtin = $_REQUEST['t4'];
	$newimage=$target_soure;
	$Nguon = $_REQUEST['t6'];
	$Kieutin=$_REQUEST['s'];
	$TrangThai = $_REQUEST['s1'];
	$sql = "insert into tintuc (Tieudetin,Ngayduatin,Noidungtin,Anh,Kieutin,Nguon,Trangthai)  values ('$Tieudetin',now(),'$Noidungtin','$newimage',$Kieutin,'$Nguon',$TrangThai);";
	//echo($sql);
	//die();
	if(mysql_query($sql,$connect)){
	    echo("<script>alert('Them tin tuc thanh cong');</script>");
	}
	          
} 
?>
<body>
<form action="?go=themtin&action=add" method="post" enctype="multipart/form-data" name="frmNew" id="frmNew" onSubmit="return test7();">
  <table width="598" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Thêm Thông Tin Tin Tuc </div></td>
    </tr>
    
    <tr>
      <td width="151"><div align="right"><strong>Tieudetin</strong></div></td>
      <td width="431"><div align="left">
        <input name="t1" type="text" id="t1" size="50" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Noidungtin</strong></div></td>
      <td><div align="left">
        <textarea name="t2" cols="50" rows="5" id="t2"></textarea>
</div></td>
    </tr>
    <tr>
      <td><div align="right">KieuTin</div></td>
      <td><select name="s">
        <option value="1">Tin Cong Nghe</option>
        <option value="2">Tin Khuyen Mai </option>
        <option value="3">Tin Tuyen Dung</option>
      </select></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Anh</strong></div></td>
      <td><div align="left">
        <input name="f1" type="file" id="f1" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Nguon</strong></div></td>
      <td><div align="left">
        <input name="t3" type="text" id="t3" size="20" />
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
