<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</meta>
<?php
if(isset($submit) && $submit == "Thêm mới")
{
	$noidung = $_REQUEST['txtcauhoi'];
	$sql = "INSERT INTO cauhoibimat(Noidungcauhoi) values('$noidung')";
	$oke = mysql_query($sql,$connect);
	if($oke)
	{
		?>
		<script language="javascript">alert("Thêm thành công"); window.location.href='admin.php?go=danhsachcauhoi';</script>
		<?php
	}
	else
	{
		$baocao = "<font color='red'>Câu hỏi đã tồn tại nghị nhập lại</font>";
	}
}
?>

<p>
<h1 align="center">Thêm câu hỏi bí mật </h1>
</p>
<p>&nbsp;</p>
<script language="javascript">
	function kt()
	{
		with(a)
		{
			cauhoi = txtcauhoi.value;
			alert(cauhoi);
			if(txtcauhoi.value == "" )
			{
				document.getElementById('showtext').innerHTML = "<font color='red'>Mật khẩu không được nhỏ hơn 4 ký tự</font>";
				txtcauhoi.focus();
				return false;
			}
		}
	}
</script>
<form name="frm" method="post" action="" enctype="multipart/form-data">
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" height="30" valign="middle"><div align="center" id="showtext" style="color:#FF0000"><?=$baocao?></div></td>
  </tr>
  <tr>
    <td width="150" valign="top">Nội dung câu hỏi (*) </td>
    <td width="369"><textarea name="txtcauhoi" cols="50" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><br><input name="submit" type="submit" value="Thêm mới" onClick="cauhoi = window.document.frm.txtcauhoi.value; if(window.document.frm.txtcauhoi.value == '' || cauhoi.length >100){ document.getElementById('showtext').innerHTML = 'Nội dung không được để trống và nhỏ hơn 100 ký tự'; txtcauhoi.focus(); return false; }">
      <input type="reset" value="Huy Bo" name="submit2"/></td>
  </tr>
</table>
</form>
 