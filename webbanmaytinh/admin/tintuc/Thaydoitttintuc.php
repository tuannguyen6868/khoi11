 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thay doi thong tin tin tuc</title>
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
		if(f1.t1.value!='')
		if (f1.t1.value.match(re)==null) {
			alert('chi nhap so cho ma tin moi');
			f1.t1.focus();
			f1.t1.select();
			return false;
		}
		return true;
	}
</script>
</head>
<? 
	 
	$sql = "Select * from tintuc where Matinmoi =".$Matinmoi;
	$save = mysql_query($sql , $connect);
	$raw = mysql_fetch_array($save);
?>
<?php

$action=$_REQUEST['action'];
$Matinmoi = $_REQUEST['Matinmoi'];
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
		 
	 
		 
		$Tieudetin= $_REQUEST['t2'];
		$Ngayduatin= $_REQUEST['t3'];
		$Noidungtin= $_REQUEST['t4'];
		$newimage=$target_soure;
		$Nguon= $_REQUEST['t6'];
		$KieuTin=$_REQUEST['t5'];
		$TrangThai = $_REQUEST['s1'];
		$sql = "update tintuc set Tieudetin='".$Tieudetin."',Trangthai=".$TrangThai.",Noidungtin='".$Noidungtin."',Anh='".$newimage."',Nguon='".$Nguon."',Kieutin=".$KieuTin." Where Matinmoi = ".$Matinmoi ;
		//echo($sql);
		//die();
		if(mysql_query($sql,$connect)) {
		    echo('<script>alert("Sua thanh cong!!");</script>');
			linkto("admin.php?go=danhsachtintuc");
		}
	}
	?>
<body>
<form action="?go=Thaydoitttintuc&action=add&Matinmoi=<? echo($Matinmoi)?>" method="post" enctype="multipart/form-data" name="f1" id="form1" onsubmit="return test();">
  <table width="100%" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Thay &#272;&#7893;i Th&ocirc;ng Tin Tin Tuc </div></td>
    </tr>
    <tr>
      <td width="222"><div align="right">Tieudetin</div></td>
      <td width="661"><div align="left">
        <input name="t2" type="text" id="t2" value="<? echo($raw['Tieudetin'])?>" />
      </div></td>
    </tr>
    
    <tr>
      <td><div align="right">Ngayduatin</div></td>
      <td><div align="left">
        <label></label>
        <input name="t3" type="text" id="t3" onkeypress="popUpCalendar(this, document.forms.f1.t3, 'yyyy-mm-dd', 0)" readonly="true"/>
<img src="../image/calendar.png" onclick="popUpCalendar(this, document.forms.f1.t3, 'yyyy-mm-dd', -100)"/>
</div></td>
    </tr>
    <tr>
      <td height="514"><div align="right">Noidungtin</div></td>
      <td><label>
      <textarea name="t4" cols="80" rows="30"><? echo($raw['Noidungtin']) ?></textarea>
</label></td>
    </tr>
    <tr>
      <td><div align="right">Anh</div></td>
      <td><label>
      <input name="f" type="file" id="f" value="<? echo($raw['Anh'])?>"/>
</label></td>
    </tr>
    <tr>
      <td><div align="right">Kieutin</div></td>
      <td><input name="t5" type="text" id="t5" value="<? echo($raw['Kieutin']);?>" size="15"/></td>
    </tr>
    <tr>
      <td><div align="right">Nguon</div></td>
      <td><label>
        <input name="t6" type="text" id="t6" value="<? echo($raw['Nguon'])?>" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">TrangThai</div></td>
      <td><div align="left">
        <label>
        <select name="s1" id="s1">
			<? 
				if ($raw['Trangthai']==1) {
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
</body>
 
</html>
