 <?
	$record_per_page = 5;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=phanhoi";
	$sql="SELECT * FROM thongtinphanhoi order by Matin desc";
	$re=mysql_query($sql,$connect);
	$totalpage =ceil(mysql_num_rows($re) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sql =$sql." LIMIT ".$from.",".$record_per_page;
	$re=mysql_query($sql,$connect);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {
	color: #0033FF;
	font-weight: bold;
}
.style2 {color: #FFFF00}
-->
</style>
</head>
 
<body>
<form name="frm1" method="post" action="" id="frm1">
  <table width="710" border="1" align="center">
    <tr bgcolor="#000000">
      <td colspan="8"><div align="center" class="style1 style2">
        <div align="center">Thong Tin Phan Hoi </div>
      </div></td>
    </tr>
    <tr>
      <td width="40"><div align="center">MaTin</div></td>
      <td width="44"><div align="center">TieuDe</div></td>
      <td width="74"><div align="center">NgayDang</div></td>
      <td width="187"><div align="center">NoiDung</div></td>
      <td width="108"><div align="center">TrangThai</div></td>
      <td width="62"><div align="center">MaSP</div></td>
      <td width="62"><div align="center">MaKH</div></td>
      <td width="81"><div align="center">ChucNang</div></td>
    </tr>
	<? 
	        while($row=mysql_fetch_array($re))
			{
	?>
    <tr>
      <td><div align="center"><? echo($row['MaTin']);?></div></td>
      <td><div align="center"><? echo($row['TieuDe']);?></div></td>
      <td><div align="center"><? echo ($row['NgayDang']);?></div></td>
      <td><div align="center">
        <textarea name="textarea" cols="25" rows="5"><? echo($row['NoiDung']);?></textarea>
</div></td>
      <td><div align="center">
        <select name="TrangThai" id="TrangThai" onChange="location.href='admin.php?go=phanhoi&action=update&MaTin=<? echo($row['MaTin']);?>&status='+this.value">
		<? 
		       if($row['TrangThai']==1){
		?>
		<option value="1">da xu ly</option>
		<option value="0">chua xu ly</option>
		<?
		   } else {
		?>
		    <option value="0">chua xu ly</option>
		    <option value="1">Da xu ly</option>
			<?
			}
			?>
        </select>
      </div></td>
      <td><div align="center"><? echo($row['MaSP'])?></div></td>
      <td><div align="center"><? echo($row['MaKH']);?></div></td>
      <td><div align="center"><a href="?go=phanhoi&action=delete&MaTin=<? echo($row['MaTin']);?>" onClick="if(confirm('Th&#7921;c s&#7921; mu&#7889;n x&oacute;a?')) return true; else return false;"><img src="adminimages/b_drop.png" border="0" title="Chuc nang xoa"></a></div> <div align="center"></div></td>
    </tr>
    
	<?
	}
	?>
  </table>
  <div align="center">
  <?
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
		if(mysql_num_rows($re)==0){
		    echo("");
		}
		else{
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		}
		?>
  
  
  </div>
</form>
 
 
<?
            $action=$_REQUEST['action'];
            $MaTin=$_REQUEST['MaTin'];
			$TrangThai=$_REQUEST['status'];
			if($action=='update')
			{
			      $sql="Update thongtinphanhoi set TrangThai = ".$TrangThai." where MaTin=".$MaTin;
				   if(mysql_query($sql,$connect))
				   {
				         echo("<script>alert('Update thanh cong!!!')</script>");
				         linkto("admin.php?go=phanhoi");
				   }
				   
			}
			if($action=='delete'){
			$sql ="DELETE FROM thongtinphanhoi WHERE MaTin =".$MaTin;
			 if(mysql_query($sql,$connect))
			 {
			 
			     echo("<script>alert('Xoa thanh cong!!!!')</script>");
			     linkto('admin.php?go=phanhoi');
			 }
			}
			
?>