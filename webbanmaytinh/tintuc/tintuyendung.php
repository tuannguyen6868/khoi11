 <?
       $sql="Select * from tintuc where Kieutin=3 and Trangthai=1";
	   $result=mysql_query($sql,$connect);
 ?>
 <?
       while($row=mysql_fetch_array($result))
	   {
 ?>
<table width="633" border="0">
  <tr>
    <td width="126" rowspan="2"><img src="anh/<? echo($row['Anh']);?>" onclick="location.href='index.php?go=detailtuyendung&Matinmoi=<? echo($row['Matinmoi'])?>'" /></td>
    <td width="497" height="29">&nbsp;</td>
  </tr>
  <tr>
    <td height="87"><a href="index.php?go=detailtuyendung&Matinmoi=<? echo($row['Matinmoi'])?>"><? echo($row['Tieudetin']);?></a></td>
  </tr>
  <tr>
    <td height="42" colspan="2"><hr></hr></td>
  </tr>
</table>
<?
}
?>
  