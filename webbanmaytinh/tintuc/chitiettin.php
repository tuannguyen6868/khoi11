<?
  $Matinmoi=$_REQUEST['Matinmoi'];
  $sql="select * from tintuc where Matinmoi=".$Matinmoi;
  $result=mysql_query($sql,$connect);
  $save =mysql_fetch_array($result);
?>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="3">
    <tr>
      <th width="20%" rowspan="3" scope="col"><div align="left"><img src="anh/<? echo($save['Anh']);?>"  width="150" height="172"/></div></th>
      <th width="80%" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td><div align="left"></div></td>
    </tr>
    <tr>
      <td height="94" valign="bottom" style="color:#FF0000; font-size:24px"><? echo($save['Tieudetin']);?></td>
    </tr>
    <tr>
      <td colspan="2"><? echo($save['Noidungtin']);?></td>
    </tr>
  </table>
</form>