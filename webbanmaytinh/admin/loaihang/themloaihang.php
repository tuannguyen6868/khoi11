 
 
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
-->
</style>
 <?
	$TenLoaiHang = $_REQUEST["t1"];
	 
	$TrangThai = $_REQUEST["s"];
	$s1="Select * from  loaihang where TenLoaiHang='".$TenLoaiHang."'";
	$re1=mysql_query($s1,$connect);
	$count1=mysql_num_rows($re1);
	if($count1>=1)
	{
	        echo("<script>alert('Loai Hang nay da co roi !');</script>");
		    echo("<script>window.location='admin.php?go=themloaihang';</script>");
	}
	else{
	$sql = "Insert Into loaihang(TenLoaiHang,TrangThai) values('".$TenLoaiHang."',".$TrangThai.")";
	  if(mysql_query($sql,$connect))
	  {
	       linkto("admin.php?go=xemthongtinhang");
	  }
	 }
?>
<script>
	function test() {
		if (f1.t1.value == '') {
			alert('nhap ten loai hang');
			f1.t1.focus();
			f1.t1.select();
			return false
		}
		 
	}
</script>
 

<body>
<form id="f1" name="f1" onsubmit="return test();" method="post" action="">
  <table width="478" border="1" align="center" cellpadding="0">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">Th&ecirc;m Loai H&agrave;ng </div></td>
    </tr>

    <tr>
      <td width="152"><div align="right">Tên Loại Hàng: </div></td>
      <td width="316"><div align="left">
        <label>
        <input name="t1" type="text" id="t1" size="50" />
        </label>
      </div></td>
    </tr>
     
    <tr>
      <td><div align="right">TrangThai</div></td>
      <td><div align="left">
        <label>
        <select name="s" id="s" >
          <option value="1">Hiện</option>
          <option value="0">Ẩn</option>
        </select>
        </label>
      </div></td>
    </tr>
    <tr>
      <td><div align="right">&nbsp;</div></td>
      <td><div align="left">
        <label>
        <input type="submit" name="Submit" value="Lưu" />
        </label>
        <input type="reset" name="Submit2" value="Hủy" />
      </div></td>
    </tr>
  </table>
</form>
   
 
 
