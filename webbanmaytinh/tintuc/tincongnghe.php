<?
      $sql="Select * from tintuc where Kieutin=1 and Trangthai=1 ";
	  $result=mysql_query($sql,$connect);
?>
 <?
      while($row=mysql_fetch_array($result))
	  {
 ?>
 <style type="text/css">
<!--
.style2 {color: #FF0000}
.style3 {color: #0099FF}
-->
 </style>
 
<form name="form1" method="post" action="">
  <table width="98%" border="0" align="center">
    <tr>
      <td width="150"><img src="anh/<? echo($row['Anh']);?>" width="150" onClick="location.href='index.php?go=detailcongnghe&Kieutin=<? echo($row['Kieutin'])?>'"></td>
      <td colspan="2"> <div align="left">Ti&ecirc;u &#273;&#7873; tin :<span class="style3"><a href="index.php?go=detailcongnghe&Kieutin=<? echo($row['Kieutin']);?>"><? echo($row['Tieudetin'])?></a></span></div></td>
    </tr>
    <tr>
      <td height="42" colspan="3"><hr>
      </hr>      <span class="style2"> </span></td>
    </tr>
  </table>
</form>
<?
}
?>
