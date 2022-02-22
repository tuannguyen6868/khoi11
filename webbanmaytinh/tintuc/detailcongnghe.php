<?
         $p=$_REQUEST['Kieutin'];
		 $sql="Select * from tintuc where Kieutin=".$p;
		 $save=mysql_query($sql,$connect);
		 $row=mysql_fetch_array($save);
 ?>
<form action="Trangchu.php?go=detailcongnghe&Kieutin=<? echo($Kieutin)?>">
<table width="100%" border="0">
  <tr>
    <td width="13%" height="135"><img src="anh/<? echo($row['Anh'])?>" width="200"></td>
    <td width="87%"><b style="color:#0099FF "><? echo($row['Tieudetin']);?></b></td>
  </tr>
  <tr>
    <td colspan="2"><? echo($row['Noidungtin'])?></td>
  </tr>
</table>
</form>
 