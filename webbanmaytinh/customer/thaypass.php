 <?
	$err="";
	$sql="SELECT MatKhau FROM khachhang WHERE  TaiKhoan='".$_SESSION["CusUser"]."'";
	mysql_query($sql,$connect); 
	if(isset($_REQUEST['old'])){
		if($_REQUEST['old']==$_SESSION["MatKhau"]){
			$n=$_REQUEST['regp'];
			$sql_pass="Update khachhang set MatKhau='".$n."' where TaiKhoan='".$_SESSION["CusUser"]."'" ;
			if(mysql_query($sql_pass,$connect)){
				echo("<script>alert('Doi mat khau thanh cong');</script>");
				linkto("index.php");
			}
		}else{
			$err="Mat khau cu khong dung !";
		}
	}else{
		//$err="Mat khau cu chua nhap !";
	}
?>
<style type="text/css">
<!--
.s1 {
	color: #006600;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
<script>
         function check()
		 {
		      if(frm.newpass.value=="")
			  {
			      alert ("Ban hay nhap mat khau moi vao!");
				  frm.newpass.focus();
				  return false;
			  }
			  if(frm.regp.value=="")
			  {
			      alert("Ban chua nhap lai mat khau moi!");
				  frm.regp.focus();
				  return false;
			  }
			  if(frm.regp.value != frm.newpass.value)
			  {
			     alert("Hay nhap lai mat khau moi!");
				 frm.regn.focus();
				 return false;
			  }
		 }
</script>
<form id="frm" name="frm" method="post" action="" onsubmit="return check();" style="margin:0px;">
  <table width="100%" border="1" cellspacing="1" cellpadding="1" bgcolor="#c0b59a">
    <tr>
      <td><div align="center" class="s1">&#272;&#7892;I M&#7852;T KH&#7848;U </div></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#c0b59a">
    <tr>
      <td><div align="right"><strong>M&#7853;t kh&#7849;u c&#361; : </strong></div></td>
      <td><label>
        <div align="left">
          <input name="old" type="password" id="old" size="30" maxlength="30" onFocus="style.backgroundColor='yellow'" onBlur="style.backgroundColor='white'"/>
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="right"><strong>M&#7853;t kh&#7849;u m&#7899;i : </strong></div></td>
      <td><div align="left">
        <input name="newpass" type="password" id="newpass" size="30" maxlength="30" onFocus="style.backgroundColor='yellow'" onBlur="style.backgroundColor='white'"  />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>X&aacute;c nh&#7853;n m&#7853;t kh&#7849;u m&#7899;i : </strong></div></td>
      <td><div align="left">
        <input name="regp" type="password" id="regp" size="30" maxlength="30" onFocus="style.backgroundColor='yellow'" onBlur="style.backgroundColor='white'"  />
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
      <div align="left"><? echo($err);?></div></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td>
        <div align="left">
          <input type="submit" name="Submit" value="X&aacute;c nh&#7853;n"/>
          <input name="Reset" type="reset" id="Reset" value="Nh&#7853;p l&#7841;i" />
        </div>
      </td>
    </tr>
  </table>
</form>