<?
      $err='';
	  $sql="Select MatKhau from khachhang where  TrangThai=1 and Email='".$_SESSION['Email']."'";
	  mysql_query($sql,$connect);
	  if(isset($_REQUEST['t3'])){
	       if($_REQUEST['t3']==$_SESSION['MatKhau']){
		       $repass=$_REQUEST['t5'];
			   $tk=$_REQUEST['t2'];
			   $sql1="Update khachhang set MatKhau='".$repass."',TaiKhoan='".$tk."' where Email='".$_SESSION['Email']."'";
			   if(mysql_query($sql1,$connect))
			   {
			        echo("<script>alert('Doi mat khau thanh cong');</script>");
					linkto("index.php?go=changesuceesful");
			   }else{
			       $err="Mat khau cu khong dung!";
			   }
		   }else{
		   }
		   }
?>
 
<form name="form1" method="post" action="">
  <table width="347" border="0" align="center">
    <tr>
      <td colspan="2"><div align="center">Thay Doi Mat Khau </div></td>
    </tr>
    <tr>
      <td><div align="right">Pass Cu </div></td>
      <td><input name="t3" type="text" id="t3" readonly="true"></td>
    </tr>
    <tr>
      <td><div align="right">Pass moi </div></td>
      <td><input name="t5" type="password" id="t5"></td>
    </tr>
    <tr>
      <td><div align="right">Nhaplaipassmoi</div></td>
      <td><input name="t6" type="password" id="t6"></td>
    </tr>
    <tr>
      <td colspan="2"> <div align="center">
        <input type="submit" name="Submit" value="Xac Nhan">
        <input type="reset" name="Reset" value="Huy">
      </div></td>
    </tr>
  </table>
</form>
 