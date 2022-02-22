 <?
        $sql="Select * from hang where TrangThai=1 and MaLoaiHang=1";
		$r=mysql_query($sql,$connect);
 ?>
 <table width="100%" border="0" cellpadding="0">
<?
   while($save = mysql_fetch_array($r))
   {
?>
  <tr>
    <th scope="col" onmouseover="this.className='over'" onmouseout="this.className='out'"  onclick="location.href='index.php?go=prolist&MaHang=<? echo($save['MaHang']);?>&page=1'"><div align="left">-<? echo($save['TenHang']);?></div></th>
  </tr>
  <?
    }
  ?>
</table>
