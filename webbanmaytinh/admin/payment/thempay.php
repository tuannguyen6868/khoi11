 <?
        $action=$_REQUEST['action'];
		if($action=='add')
		{
		    $MaThanhToan=$_REQUEST['MaThanhToan'];
			$LoaiThanhToan=$_REQUEST['LoaiThanhToan'];
			$sql="Insert into hinhthucthanhtoan(MaThanhToan,LoaiThanhToan) values ('$MaThanhToan','$LoaiThanhToan');";
			mysql_query($sql,$cnn);
		}      
 ?>
<form action="?go=thempay.php&action=add" method="post" name="f1" id="f1" onSubmit="return test();">
  <table width="57%"  border="1" align="center">
    <tr>
      <td colspan="2"><div align="center">Them Hinh Thuc Thanh Toan </div></td>
    </tr>
    <tr>
      <td><div align="center">MaThanhToan</div></td>
      <td><input name="MaThanhToan" type="text" id="MaThanhToan"></td>
    </tr>
    <tr>
      <td height="40"><div align="center">LoaiThanhToan</div></td>
      <td><input name="LoaiThanhToan" type="text" id="LoaiThanhToan" size="30 " maxlength="30"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="Submit" value="Add New">
         <input type="reset" name="Reset" value="Cancel">
      </div></td>
    </tr>
  </table>
</form>
<script>
    function test(){
	        if(f1.MaThanhToan.value=='')
			{
			      alert("Ma thanh toan khong duoc de trong !");
				  f1.MaThanhToan.focus();
				  f1.MaThanhToan.select();
				  return false;
			}
			if(isNaN(f1.MaThanhToan.value))
			{
			    alert("Ma thanh toan phai la so");
				f1.MaThanhToan.focus();
			    f1.MaThanhToan.select();
				return false;
			}
			if(f1.LoaiThanhToan.value=='')
			{
			       alert("Loai thanh toan khong dc de trong");
				   f1.LoaiThanhToan.focus();
				   f1.LoaiThanhToan.select();
				   return false;
			}
			alert("Thanh cong!");
			return true;
	}    
</script>
 
 