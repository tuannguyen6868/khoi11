<? 
        $sql="Select * from sanpham where TrangThai=1 order by Gia desc limit 0,5 " ;
		$result=mysql_query($sql,$connect);
?>
<? 
    while($row=mysql_fetch_array($result))
	{
?>
<table width="100%" border="0">
<marquee direction="up" width="20" height="20" scrollAmount=5  scrollDelay=100>
  <tr>
    <td width="85" rowspan="3" align="center"><img src="anh/<? echo($row['HinhAnh'])?>" width="30" height="30" onClick="location.href='index.php?go=prodetail&pid=<? echo($row['MaSP']);?>'" title="<? echo($row['ThongTinSP'])?>"></td>
    <td width="461">&nbsp;</td>
  </tr>
  <tr>
    <td onmouseover="this.className='over'" onmouseout="this.className='out'" onclick="location.href='index.php?go=prodetail&pid=<? echo($row['MaSP'])?>'"><? echo($row['TenSP'])?></td>
  </tr>
  <tr>
    <td><? echo number_format(($row['Gia']))?>(VN&#272;)</td>
  </tr>
</marquee>
</table>
<?
}
?>
  