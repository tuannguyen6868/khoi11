  <?
         $action=$_REQUEST['action'];
		 $MaTH=$_REQUEST['MaTH'];
		 if($action=='edit')
		 {
		      $sql=mysql_query("Select * from hinhthucthanhtoan where MaThanhToan=".$MaTH."",$cnn);
		 }
		 if($action=='update')
		 {
		        $MaThanhToan=$_REQUEST['MaThanhToan'];
		        $LoaiThanhToan=$_REQUEST['LoaiThanhToan'];
				$sql="Update hinhthucthanhtoan set MaThanhToan=$MaThanhToan,LoaiThanhToan='$LoaiThanhToan' where MaThanhToan=".$MaTH;
				mysql_query($sql,$cnn);
				Redirect("pay.php");
		 
		 }
 ?>

<?
     if($action=='edit')
	 {
	 while($row=mysql_fetch_array($sql))
	 {
?>
<form name="form1" method="post" action="?go=editpay&action=update&MaTH=<? echo($row['MaThanhToan']);?>">
  <table width="98%"  border="1">
    <tr>
      <td colspan="2"><div align="center">Edit Hinh Thuc Thanh Toan </div></td>
    </tr>
    <tr>
      <td><div align="right">MaThanhToan</div></td>
      <td><input name="MaThanhToan" type="text" id="MaThanhToan" value="<? echo($row['MaThanhToan']);?>">
      </td>
    </tr>
    <tr>
      <td><div align="right">LoaiThanhToan</div></td>
      <td><input name="LoaiThanhToan" type="text" id="LoaiThanhToan" value="<? echo($row['LoaiThanhToan']);?>"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="Submit" value="Update">
        <input type="reset" name="Reset" value="Reset">
      </div></td>
    </tr>
  </table>
</form>
<?
}
}
?>
 