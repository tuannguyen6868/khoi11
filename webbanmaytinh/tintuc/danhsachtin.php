<?
$record_per_page =4;
$pagenum = $_GET["page"];
?>
<?php
$page = "index.php?go=news";
	$_SESSION['url']="index.php?go=news";

	$sql="select * from tintuc where Trangthai=1";
	$re=mysql_query($sql,$connect);	
$totalpage =ceil( mysql_num_rows($re) / $record_per_page);
if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage)
{
	$pagenum = 1;
} 
if($pagenum == 1)
{
	$from = 0;
}else{
	$from = ($pagenum-1)*$record_per_page;
}
$sql =$sql." LIMIT ".$from.",".$record_per_page;
//echo($sql);
//	die();
$re=mysql_query($sql,$connect);
?>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="3">
  <? 
    while($row=mysql_fetch_array($re))
	 {
	?>
    <tr>
      <th width="16%" rowspan="4" scope="col"><div align="right"><img src="anh/<? echo($row['Anh']);?>"  width="80" height="80"/></div></th>
      <th width="84%" scope="col"><div align="left"></div></th>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Title :<span style="color:#FF0000; font-size:24px"> <? echo($row['Tieudetin']); ?> </span></td>
    </tr>
    <tr>
      <td><a href="index.php?go=newsdetail&Matinmoi=<? echo($row['Matinmoi']);?>">N&#7897;idung...</a></td>
    </tr>
	<?
	  }
	?>
  </table>
</form>
<?
		for($i =1; $i<=$totalpage;$i++)
		{
			if ($i==1){
				echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
			}else{
				echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
			}
		}
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		?>