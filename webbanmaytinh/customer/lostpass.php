<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$oke = 0;
if(isset($submit) && $submit = "Reset mật khẩu")
{
	$tk = $_REQUEST["txttaikhoan"];
	$em = $_REQUEST["txtemail"];
	$ch = $_REQUEST["txtcauhoi"];
	$tl = $_REQUEST["txttraloi"];
	$mk=$_REQUEST["txtmatkhau1"];
	 
	$sql = "select * from khachhang where TaiKhoan='$tk'";
	$qr = mysql_query($sql,$connect);
	if($qr)
	{
		$dem = mysql_num_rows($qr);
	}
	if($dem == 1)
	{
		$row = mysql_fetch_array($qr);
		if($row['Email'] == $em && $row['Macauhoi'] == $ch && $row['Traloi'] == $tl)
		{
			$sql = "Update khachhang Set MatKhau='$mk' where TaiKhoan = '$tk'";
			$qr = mysql_query($sql,$connect);
			$oke = 1;
		}
		else
		{
			$showtext = "Thông tin về tài khoản $tk không đúng, đề nghị nhập lại !";
			$oke = 0;
		}
	}
	else
	{
		$showtext = "Thông tin tài khoản không đúng";
		$oke = 0;
	}
}
?>

<?
/*
$h = "From: Mr. Nguyen Viet Dung";
$h .="<vietdungvn88@gmail.com>\n";
$h .="X-Mailer:PHP\n";
$h .="X-Priority: 1\n";
$h .="Return-Path:<vietdungvn88@gmail.com>\n";
$h .="Content-Type:text/html;";
$h .="charset=UTF-8\n";

$sub = "Test thử";
$mess = "Hello Mr.Viet Dũng";
$email = "vietdungvn88@yahoo.com";
if(mail($email,$sub,$mess,$h))
	return true;
else
	return false;
*/
?>

<?
if($oke == 0)
{
?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="2" style="background:url(image/sidep-handle.gif); padding-left:5px"><b>Quên mật khẩu
    </b></td>
  </tr>

  <tr>
  	<td>
		<script>
		function kt()
		{
			 
			 
				if(frm.txttaikhoan.value == "")
				{
					 alert("Ban chua nhap tai khoan!");
					 frm.txttaikhoan.focus();
					 return false;
				}
				if(frm.txtmatkhau.value=="")
				{
				      alert("Ban hay nhap mat khau moi!");
					  frm.txtmatkhau.focus();
					  return false;
				}
				
				if(frm.txtmatkhau.value !=frm.txtmatkhau1.value)
				{
				            alert("Mat khau khong giong nhau !");
							frm.txtmatkhau1.focus();
							return false;	
				}
				if(frm.txtemail.value=="")
				{
				     alert("Ban nhap email !");
					 frm.txtemail.focus();
					 return false;
				}
			  t71=frm.txtemail.value;
			  regemail=/^[a-z]+\w*(\.\w+)*@[a-z]+\w*(\.[a-z]+)+/;
			  if(regemail.test(t71)==false)
			  {
			       alert("Email khong dung dinh dang!");
				   frm.txtemail.select();
				   return false;
			  }
				if(frm.txttraloi.value=="")
				{
				     alert("Ban chua nhap cau tra loi!");
					 frm.txttraloi.focus();
					 return false;
				}
			 		
		}
		</script>
		<form name="frm" action="" method="post" id="frm" onSubmit="return kt();">
		  <table width="500" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td colspan="2" align="center"><div align="center" id="showtext" style="color:#FF0000; font-weight:bold"><?=$showtext?></div></td>
            </tr>
            <tr>
              <td width="200">Tên tài khoản : </td>
              <td width="450"><input name="txttaikhoan" type="text" id="txttaikhoan" size="40" />              </td>
            </tr>
            <tr>
              <td>Mat khau moi : </td>
              <td><input name="txtmatkhau" type="password" id="txtmatkhau" size="40"></td>
            </tr>
            <tr>
              <td>Nhap lai mat khau moi : </td>
              <td><input name="txtmatkhau1" type="password" id="txtmatkhau1" size="40"></td>
            </tr>
            <tr>
              <td>Email : </td>
              <td><input name="txtemail" type="text" id="txtemail" size="40" /></td>
            </tr>
            <tr>
              <td>Câu hỏi bí mật : </td>
              <td><select name="txtcauhoi">
                  <?
						$sqlch = "select * from cauhoibimat";
						$qrch = mysql_query($sqlch,$connect);
						while($rowch = mysql_fetch_array($qrch))
						{
						?>
                  <option value="<? echo($rowch['Macauhoi'])?>">
                    <? echo($rowch['Noidungcauhoi'])?>
                </option>
                  <?
						}
						?>
                </select>              </td>
            </tr>
            <tr>
              <td>Câu trả lời : </td>
              <td><input name="txttraloi" type="text" id="txttraloi" size="40" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="50" valign="middle"><input type="submit" name="submit" value="Reset mật khẩu" /> <input type="button" value="Đăng nhập" onClick="window.location.href='index.php?go=login'" /></td>
            </tr>
          </table>
		</form>	</td>
  </tr>
</table>
<?
}
else
{
?>
<table width="600" align="center" cellpadding="3" cellspacing="3">
	<tr>
		<td  height="50" style="background:url(image/sidep-handle.gif); padding-left:5px"><b>Quên mật khẩu</b>
		</td>
	</tr>
            <tr>
              <td align="center">Reset mật khẩu thành công.Ban hay dang nhap bang mat khau moi!</td>
            </tr>
</table>
<?
}
?>