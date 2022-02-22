<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></meta>
 <?php
 $loi='';
 if(isset($_REQUEST['TaiKhoan']))
 {
	$CusUser=$_REQUEST['TaiKhoan'];
	$CusPass=$_REQUEST['CusPass'];
	 
	$sql="Select * from khachhang where TaiKhoan='".$CusUser."' and TrangThai=1";
	$rs=mysql_query($sql,$connect);
	$num_row=mysql_num_rows($rs);
	if($num_row>0)
	{
	while($row=mysql_fetch_array($rs))
	{
	    if($CusPass==$row['MatKhau'])
		{
		 session_register('tien');
		$_SESSION['tien']=$row['TenKH'];
		$_SESSION["CusUser"] =$_REQUEST["TaiKhoan"];
		$_SESSION["CusName"]=$row["TenKH"];
		$_SESSION["CusID"] = $row["MaKH"];
		$_SESSION["MatKhau"]=$row["MatKhau"];
		 echo("<script>alert('Ban da dang nhap thanh cong');</script>");
		 linkto("index.php");
		}
		else
		{
		$loi="Login False!";
		}
	 }
   }
   else
   {
   $loi="Login False!";
   }
  }
?>
 <script>
      function test(){
	       if(frmlogin.TaiKhoan.value=="")
		   {
		         alert("Moi ban nhap tai khoan dang nhap!");
				 frmlogin.TaiKhoan.focus();
				 return false;
		   }
		   if(frmlogin.CusPass.value=="")
		   {
		        alert("Ban hay nhap mat khau!");
				frmlogin.TaiKhoan.focus();
				return false;
		   }
	  }
 </script>
 <form action="" method="post" name="frmlogin" id="frmlogin" onSubmit="return test();">
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <th colspan="2" scope="col">&#272;&#259;ng Nh&#7853;p H&#7879; Th&#7889;ng </th>
    </tr>
    <tr>
      <td align="right"><img src="image/images1.jpg" width="121" height="121"></td>
      <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td align="right">T&agrave;iKho&#7843;n: </td>
            <td><input name="TaiKhoan" type="text" id="TaiKhoan" class="input"></td>
          </tr>
          <tr>
            <td align="right">M&#7849;tKh&#7849;u:</td>
            <td><input name="CusPass" type="password" id="CusPass" class="input"></td>
          </tr>
          <tr>
            <td align="right"><input type="checkbox" name="checkbox" value="checkbox"></td>
            <td><a href="index.php?go=misspass">Qu&ecirc;n m&#7853;t kh&#7849;u ? </a></td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td><input type="submit" name="Submit" value="ÐăngNhập">
            <input type="reset" name="Submit2" value="Xóa"></td>
          </tr>
      </table></td>
    </tr>
  </table>
    <p><? echo($loi);?></p>
</form>
