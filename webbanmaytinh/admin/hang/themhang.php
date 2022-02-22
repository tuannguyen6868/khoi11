 <? 
	$sql1 = "select MaLoaiHang,TenLoaiHang from loaihang";
	$save1= mysql_query($sql1,$connect);
?>
 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
	function test() {
		if (f1.t1.value == '') {
			alert('ten hang khong duoc de trong');
			f1.t1.select();
			f1.t1.focus()
			return false;
		}
		 
	}
</script>
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form name="f1" onSubmit="return test();" method="post" action="">
  <table width="435" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Th&ecirc;m H&agrave;ng </div></td>
    </tr>

    <tr>
      <td width="167"><div align="right"><strong>T&ecirc;n H&atilde;ng:</strong></div></td>
      <td width="252"><input name="t1" type="text" id="t1" /></td>
    </tr>
    <tr>
      <td><div align="right"><strong>T&ecirc;n H&agrave;ng:</strong></div></td>
      <td><div align="left">
        <label>
        <select name="s1">
			<? 
				while($raw1 = mysql_fetch_array($save1))
				 {
			?>
				<option value="<? echo($raw1['MaLoaiHang'])?>"><? echo($raw1['TenLoaiHang'])?></option>
			<?
				 }
			?>
        </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>Tr&#7841;ng Thai </strong></div></td>
      <td><div align="left">
        <select name="s2">
          
          <option value="1">Hi&#7879;n</option>
		  <option value="0">&#7848;n</option>
                </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><div align="left">
        <label>
        <input type="submit" name="Submit" value="L&#432;u" />
        </label>
        <label>
        <input type="reset" name="Submit2" value="H&#7911;y b&#7887;" />
        </label>
      </div></td>
    </tr>
  </table>
  
</form>
<p>
  <?
	$TenHang = $_REQUEST['t1'];
	$MaLoaiHang = $_REQUEST['s1'];
	$TrangThai = $_REQUEST['s2'];
    $sql = "insert into hang(TenHang,MaLoaiHang,TrangThai) values('".$TenHang."',".$MaLoaiHang.",".$TrangThai.")";
       	        if(mysql_query($sql,$connect))
		       {   
			        echo('<script>alert("Them thanh cong!!!");</script>');
		            linkto("admin.php?go=danhsachhang");
		       }
	 
?>
</p>
 
</body>
</html>
