<?
      $action=$_REQUEST['action'];
	  $SoHD=$_REQUEST['SoHD'];
	  if($action=='edit'){
	        $sql=mysql_query("Select * from hoadonban where SoHD=".$SoHD."",$connect);	
	  }
	  if($action=='update')
	  {
           	  $NgayxulyHD=$_REQUEST['NgayxulyHD'];
			   $TrangThai=$_REQUEST['TrangThai'];
			   $NgaylapHD=$_REQUEST['NgaylapHD'];
			   $TenKH=$_REQUEST['TenKH'];
			   $EmailKH=$_REQUEST['EmailKH'];
			   $DiachiKH=$_REQUEST['DiachiKH'];
			   $DienthoaiKH=$_REQUEST['DienthoaiKH'];
			   $MaKH=$_REQUEST['MaKH'];
			   $Mathanhtoan=$_REQUEST['Mathanhtoan'];
			   $sql="Update hoadonban set  NgayxulyHD='$NgayxulyHD',TrangThai='$TrangThai',NgaylapHD='$NgaylapHD',TenKH='$TenKH',EmailKH='$EmailKH',DiachiKH='$DiachiKH',DienthoaiKH='$DienthoaiKH',MaKH='$MaKH',Mathanhtoan='$Mathanhtoan' where SoHD=".$SoHD; 
			   mysql_query($sql,$connect); 
			   linkto('admin.php?go=danhsachHD');
		}
	  
?>
 
<?
if($action=='edit')
{
while($row=mysql_fetch_array($sql))
{
?>
 <form name="form1" method="post" action="?go=edithoadon&action=update&SoHD=<? echo($row['SoHD']);?>">
  <table width="649" border="0" align="center">
    <tr bgcolor="#000000">
      <td colspan="2" ><div align="center" class="style1">ADD NEW HOA DON BAN </div></td>
    </tr>
    <tr>
      <td width="299"><div align="right">TenKH</div></td>
      <td width="340"><input name="TenKH" type="text" id="TenKH" value="<? echo($row['TenKH'])?>"> </td>
    </tr>
    <tr>
      <td><div align="right">MaKH</div></td>
      <td><input name="MaKH" type="text" id="MaKH" value="<? echo($row['MaKH'])?>"> </td>
    </tr>
    <tr>
      <td><div align="right">EmailKH</div></td>
      <td><input name="EmailKH" type="text" id="EmailKH" value="<? echo($row['EmailKH'])?>" ></td>
    </tr>
    <tr>
      <td><div align="right">DiaChiKH</div></td>
      <td><textarea name="DiachiKH" id="DiachiKH"> <? echo($row['DiachiKH']) ;?> </textarea></td>
    </tr
    ><tr>
      <td><div align="right">DienThoaiKH</div></td>
      <td><input name="DienthoaiKH" type="text" id="DienthoaiKH" value="<? echo ($row['DienThoaiKH']);?>" ></td>
    </tr>
    <tr>
      <td><div align="right">MaThanhToan</div></td>
      <td><input name="Mathanhtoan" type="text" id="Mathanhtoan" value="<? echo($row['MaThanhToan']);?>"></td>
    </tr>
    <tr>
      <td><div align="right">NgaylapHoaDon</div></td>
      <td><input name="NgaylapHD" type="text" id="NgaylapHD" value="<? echo($row['NgaylapHD'])?>"></td>
    </tr>
    <tr>
      <td><div align="right">TrangThai</div></td>
      <td><select name="TranThai" id="TrangThai">
        <option value="0">Chua xu ly</option>
        <option value="1">Da xu ly</option>
      </select></td>
    </tr>
    <tr>
      <td><div align="right">NgayxulyHoaDon</div></td>
      <td><input name="NgayxulyHD" type="text" id="NgayxulyHD" value="<? echo($row['NgayxulyHD'])?>"> </td>
    </tr>
    <tr>
      <td><div align="right">
        <input type="submit" name="Submit" value="AddNew">
      </div></td>
      <td><input type="reset" name="Reset" value="Cancel"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
}
?>