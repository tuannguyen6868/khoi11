 
<?
	$sql = "select * from hang where MaLoaiHang = 3 and TrangThai = 1";
	$save = mysql_query($sql ,$connect );
?>
 
<table width="100%" border="0" cellpadding="0">
	<?
		while ($raw = mysql_fetch_array($save))
			{
	?>
  <tr>
    <td height="19" onmouseover="this.className='over'" onmouseout="this.className='out'"  onclick="location.href='index.php?go=prolist&MaHang=<? echo($raw['MaHang']);?>&page=1'">
		<? echo($raw['TenHang'])?>
	</td>
  </tr>
  <?
  			}
  ?>
</table>
 