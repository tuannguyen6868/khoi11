  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<?
       $pid=$_REQUEST['pid'];
	   $sql_join="Select * from sanpham where TrangThai=1 and MaSP=".$pid;
	   $re_join=mysql_query($sql_join,$connect);
	   $row_join=mysql_fetch_array($re_join);
	   $rowMH=$row_join['MaHang'];
?>
<?
$record_per_page = 4;
$pagenum = $_GET["page"];
$page = "index.php?go=home";
?>
 <?php
$sql=" select * from sanpham where TrangThai=1 and MaHang=".$rowMH."";
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
<table width="100%" border="0" cellspacing="3" cellpadding="3" align="center" bordercolor="#999999" >
	<tr>
	<?php
	$i=0;
	while($row=mysql_fetch_array($re))
	{
	?>
		<td width="33%">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				
				<tr>
					<td width="150" align="center" >
						<img src="anh/<? echo($row['HinhAnh'])?>" alt="Product image" width="92" height="116" border="0" title="<? echo($row['ThongTinSP']);?>"></td>
				    <td align="left" valign="top"  ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <th colspan="2" align="left" scope="col"><a href="?go=prodetail&pid=<? echo($row['MaSP'])?>"><? echo($row['TenSP'])?></a></th>
                      </tr>
                      <tr>
                        <td>Gi&aacute;</td>
                        <td>: <? echo(number_format($row['Gia']));?> (VN&#272;) </td>
                      </tr>
                      <tr>
                        <td>Tình Trạng</td>
                        <td><? 
						      if($row['TinhTrang']==1)
							  {    
							     echo("Còn Hàng");
								 ?>
								 <?
							  }else{
							      echo("Hết Hàng");
							  }
						?></td>
                      </tr>
                      <tr>
                        <td>B&#7843;oH&agrave;nh</td>
                        <td>: <? echo($row['ThoiGianBH'])?> (th&aacute;ng) </td>
                      </tr>
                    </table></td>
				</tr>
				<tr>
					<td class="border_bottom">&nbsp;</td>
				    <td class="border_bottom">
					<span id=link>
					<a href="?go=shoppingcart&action=add&pid=<? echo($row['MaSP'])?>"><? if($row['TinhTrang']==1) echo("Cho V&agrave;o Gi&#7887; ||"); ?></a></span><span id=detail> <a href="?go=prodetail&pid=<? echo($row['MaSP'])?>">Chi Ti&#7871;t</a></span></td>
				</tr>
			</table>
		</td>
		<?php
			$i++;
			if($i%2==0)
				echo("</tr>");
		?>	
	<?php
 	}
	?>
	
	<?
		if($i%2!=0)
			echo("</tr>");
	?>
	
	<tr>
  	<td colspan="2">
	<hr>
	</td>
  </tr>
  <tr>
      
	  <td colspan="2" align="center" valign="bottom" class="row"><?
		/*
		Vong lap de tao ra cac link lien ket den cac trang du lieu.
		Output: 	1 | 2 | 3 | 4 
		*/
		for($i =1; $i<=$totalpage;$i++)
		{
			if ($i==1){
				echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
			}else{
				echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
			}
		}
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		?></td>
    </tr>
</table>
