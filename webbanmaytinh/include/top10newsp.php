 <?
 //  $sql=" select count(oQuantity) orderdetail where proStatus =1  group by proID   order by  desc limit 0,5  ";
    $sql="select * from sanpham where  TrangThai =1  order by NgayNhap  limit 0,10  ";
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
