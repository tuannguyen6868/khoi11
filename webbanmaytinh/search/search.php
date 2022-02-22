 <p>
<?
	$keyword=$_REQUEST['keyword'];
	echo('Product name is contain:<i>'.$keyword.'</i>');
	echo('<p> Result set:</p>');
?>
<?
$record_per_page = 3;
$pagenum = $_GET["page"];
$page = "index.php?go=search&keyword=".$keyword;
?>
<?
$sql = "SELECT * FROM sanpham where TenSP Like '%".$keyword."%'";
//echo($sql);	
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
</p>
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr class="title">
    <th width="15%" height="25"  >M&atilde; S&#7843;n Ph&#7849;m</th>
    <th width="32%"  >T&ecirc;n S&#7843;n Ph&#7849;m </th>
    <th width="18%"  >Gi&aacute;</th>
    <th width="21%"  >B&#7843;o H&agrave;nh</th>
    <th width="14%"  >Action</th>
  </tr>
  <?php
  	while($rs=mysql_fetch_array($re))
	{
  ?>
  <tr>
    <td>&nbsp;<?php echo($rs['MaSP'])?></td>
    <td>&nbsp;
	<a href="index.php?go=prodetail&pid=<? echo($rs['MaSP'])?>" title="<? echo($rs['ThongTinSP'])?>"><?php echo($rs['TenSP'])?>
	</a>
	</td>
    <td align="right"><?php echo(number_format($rs['Gia']))?>(VND)</td>
    <td align="center">&nbsp;<?php echo($rs['ThoiGianBH'])?> <i>(th&aacute;ng)</i></td>
    <td align="center">
	<a href="index.php?go=prodetail&pid=<? echo($rs['MaSP'])?>">	
	  Chiti&#7871;t </a>	</td>
  </tr>
  <?
  }
  ?>
  <tr>
  	<td colspan="5">
	<hr>
	</td>
  </tr>
  <tr>      
	  <td colspan="5" align="center" valign="bottom" class="row"><?
		/*
		Vong lap de tao ra cac link lien ket den cac trang du lieu.
		Output: 	1 | 2 | 3 | 4 
		*/
		for($i =1; $i<=$totalpage;$i++)
		{
			if ($i==1){
				echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
			}else{
			if($pagenum==$i)			
				echo " | <a href='".$page."&page=".$i."'><B><font color=red><u>".$i."</u></font></B></a>";
			else
				echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
			}
		}
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		?></td>
    </tr>
</table>
<p>&nbsp;</p>
