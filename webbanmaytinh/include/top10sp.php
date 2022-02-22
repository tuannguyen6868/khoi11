 <?
     $sql="Select sanpham.* from sanpham,chitiethoadonban where sanpham.MaSP=chitiethoadonban.MaSP group by (chitiethoadonban.MaSP) order by sum(chitiethoadonban.Soluong) desc limit 0,10";
     $result=mysql_query($sql,$connect);
?>
  <table width="100%" border="0" cellpadding="3">
<?
   while($row = mysql_fetch_array($result))
   {
?>
  <tr>
    <th scope="col" onmouseover="this.className='over'" onmouseout="this.className='out'" onclick="location.href='index.php?go=prodetail&pid=<? echo($row['MaSP']);?>'">    
      <div align="left"><? echo($row['TenSP']);?></div>
      <div align="center"></div><div align="center"></div></th>
  </tr>
  <?
     }
  ?>
</table>
<div align="center"></div>
 