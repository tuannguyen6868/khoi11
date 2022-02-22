 <?
  $sql="select * from admin";
  $re= mysql_query($sql,$connect);
?>

<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="">
  <?
     while($row=mysql_fetch_array($re))
	 {
  ?>
    <tr>
      <th width="8%" scope="col"><a href=" ymsgr:sendim?<? echo($row['admYahoo']);?>"><img src="image/cuoi.gif" width="24" height="24" border="0" /></a></th>
      <th width="92%" scope="col" onclick="location.href='ymsgr:sendim?<? echo($row['admYahoo']);?>'" onmouseover="this.className='proin'" onmouseout="this.className='proout'"><? echo($row['admName']);?></th>
    </tr>
    <tr>
      <td><div align="center"><img src="image/con_mobile[1].png" width="19" height="21" /></div></td>
      <td><div align="left" style="color:#0000FF; font-weight:bold"><? echo($row['admPhone']);?></div></td>
    </tr>
	<tr>
	<td colspan="2">
	<hr>
	<td width="0%">	</tr>
	<?
	  }
	?>
  </table>
</form>
