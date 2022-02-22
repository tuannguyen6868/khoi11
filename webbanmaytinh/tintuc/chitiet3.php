  <?
         $p=$_REQUEST['Matinmoi'];
		 $sql="Select * from tintuc where Kieutin=3 and Matinmoi=".$p;
		 $save=mysql_query($sql,$connect);
		 $row=mysql_fetch_array($save);
 ?>
<form action="index.php?go=detailtuyendung&Matinmoi=<? echo($Matinmoi)?>">
<table width="100%" border="0">
  <tr>
    <td width="15%">&nbsp; </td>
    <td width="85%"><b style="color:#0099FF "><? echo($row['Tieudetin']);?></b></td>
  </tr>
  <tr>
    <td colspan="2"><? echo($row['Noidungtin'])?></td>
  </tr>
</table>
</form>
 