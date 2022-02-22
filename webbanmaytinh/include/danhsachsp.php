<?
$record_per_page = 4;
$pagenum = $_GET["page"];
$page = "index.php?go=prolist";
?>
<?php
$MaHang=$_REQUEST['MaHang'];
 
if(!empty($MaHang))
{
	$page = $page."& MaHang=".$MaHang;
	$_SESSION['url']="index.php?go=prolist&MaHang=".$MaHang;
	$sql="select * from sanpham where TrangThai=1 and MaHang=".$MaHang;
}
 
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
	//die();
$re=mysql_query($sql,$connect);

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></meta>
<link type="text/css" rel="stylesheet" href="../style.css">
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
					<td width="150" align="center" ><img src="anh/<? echo($row['HinhAnh'])?>" width="120" height="140" alt="Product image" title="<? echo($row['ThongTinSP']);?>"></td>
				    <td align="left" valign="top"  ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <th height="69" colspan="2" align="left" scope="col"><a href="?go=prodetail&pid=<? echo($row['MaSP'])?>"><? echo($row['TenSP'])?></a></th>
                      </tr>
                      <tr>
                        <td height="35">Gi&aacute;</td>
                        <td>:<? echo(number_format($row['Gia']));?>(<span id="ctl00_wpM_gwppD_pD_fD_lVpr" class="dprice">VN&#272;</span>) </td>
                      </tr>
                      <tr>
                        <td height="38">T&igrave;nh Tr&#7841;ng</td>
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
                        <td height="38">B&#7843;oH&agrave;nh</td>
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
		 if(mysql_num_rows($re)==0){
		       echo("");
		 }
		 else{
		             echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
					 }
		?></td>
    </tr>
</table>
