<? session_start();?>
<?
	require("connectdb.php");
?>

<?
	$action = $_GET['action'];
	if($action == "login") {
		$acc = $_REQUEST['t1'];
		$pass = $_REQUEST['t2'];
		$sql = "select * from admin where taikhoan ='".$acc."' and password ='".$pass."'";
		$save = mysql_query($sql,$connect);
		if(mysql_fetch_row($save)>=1) {
			$_SESSION["acc"] = $acc;
			linkto("welcomeadmin.php");
		}
		linkto("?err=loidangnhap");
	}
	$err=$_GET['err'];
?>
<script>
	function test() {
		if (f1.t1.value == '') {
			alert('nhap tai khoan');
			f1.t1.focus();
			return false;
		}
		if (f1.t2.value == '') {
			alert('nhap password');
			f1.t2.focus();
			return false;
		}
		return true;
	}
</script>
<style type="text/css">
<!--
body {
	background-color: #000000;
}
.style2 {color: #00FFFF}
.style4 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: larger;
}
.style5 {
	font-size: larger;
	color: #FFFFFF;
}
.style7 {color: #FFFFFF; font-weight: bold; }
.style8 {color: #FFFFFF; font-weight: bold; font-size: larger; }
.style9 {font-family: Arial, Helvetica, sans-serif}
-->
</style><form name="f1" onSubmit="return test();" method="post" action="?action=login">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h1 align="center"><span class="style4">...Welcome to my site</span><span class="style4">...</span></h1>
  <p align="center"><span class="style4">...<span class="style9">Ch&agrave;o m&#7915;ng b&#7841;n &#273;&#7871;n v&#7899;i website c&#7911;a ch&uacute;ng t&ocirc;i </span>...</span></p>
  <table width="408" border="0" align="center" bgcolor="#333333" >
    <tr>
      <td colspan="2"><div align="center" class="style8">H&#7879; th&#7889;ng &#273;&#259;ng nh&#7853;p </div></td>
    </tr>
    <tr>
      <td width="99"><div align="right"><span class="style7">T&agrave;i kho&#7843;n</span></div></td>
      <td width="293"><div align="left">
        <label>
        <input name="t1" type="text" id="t1" size="30">
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right" class="style2"><span class="style7">M&#7853;t kh&#7849;u </span> </div></td>
      <td><div align="left">
        <input name="t2" type="password" id="t2" size="30">
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">
        <label>
        <input name="s1" type="submit" id="s1" value="&#272;&#259;ng nh&#7853;p">
        </label>
        <label>
        <input name="s2" type="reset" id="s2" value="H&#7911;y b&#7887;">
        </label>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><? echo($err)?>&nbsp;</td>
    </tr>
  </table>
  <h1 align="center"><span class="style5">.......................................</span></h1>
</form>


