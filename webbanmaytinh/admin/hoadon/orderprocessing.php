 <?
$record_per_page =6;
$pagenum = $_GET["page"];
?>
<?php
$page = "admin.php?go=process";
	$_SESSION['url']="admin.php?go=process";

	$sql="select * from hoadonban where TrangThai=1 order by SoHD Desc ";
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
<body bgcolor="#999999">
<form name="form1" method="post" action="">
  <table width="500" border="1" align="center">
    <tr>
      <td colspan="9"><div align="center" class="style1">List Hoa Don Ban </div></td>
    </tr>
    <tr>
      <td height="35" colspan="3"><div align="center" class="style2">Action</div></td>
      <td width="232"><div align="center" class="style2">SoHD</div></td>
      <td width="209"><div align="center" class="style2">NgayxulyHD</div></td>
      <td width="216"><div align="center" class="style2">NgaylapHD</div></td>
      <td width="114"><div align="center" class="style2">MaKH</div></td>
	  <td width="114"><div align="center" class="style2">TenKhachHang</div></td>
      <td width="220"><div align="center" class="style2">Mathanhtoan</div></td>
      <td width="175"><div align="center" class="style2">TrangThai</div></td>
    </tr>
	<?
	if(mysql_num_rows($re)==0){
	?>
    <tr>
      <td colspan="10"><div align="center"><b style="color:#FF0000">Khong Co Hoa Don Nao Ca</b></div></td>
    </tr>
	 <?
	}
	else
	 {
	      while($row=mysql_fetch_array($re))
		  {
	?>
    <tr>
      <td width="91"><div align="center">
        <input type="checkbox" name="checkbox" value="checkbox">
      </div></td>
      <td><div align="center"></div>        <div align="center"><img src="adminimages/detail.png" width="16" height="16" border="0" onclick="location.href='admin.php?go=orderdetail&SoHD=<? echo($row['SoHD'])?>'"></div></td>
      <td width="64">
	  <?
				if($row['TrangThai']==0)
				{
			?>
	  <div align="center"><a href="admin.php?go=danhsachHD&action=delete&SoHD=<? echo($row['SoHD'])?>" onClick="if(confirm('xac nhan xoa hoa don nay?')) return true; else return false;"><img src="adminimages/b_drop.png" width="16" height="16" border="0"></a> </div>
	  <?
				}else echo("|||");
			?>		
	  </td>
      <td><div align="center"><? echo($row['SoHD']);?></div></td>
      <td><div align="center"><? echo($row['NgayxulyHD']);?></div></td>
      <td><div align="center"><? echo($row['NgaylapHD']);?></div></td>
      <td><div align="center"><? echo($row['MaKH']);?></div></td>
	    <td><div align="center"><? echo($row['TenKH']);?></div></td>
      <td><div align="center"><? echo($row['MaThanhToan']);?></div></td>
      <td><div align="center">
        <select name="TrangThai" onChange="location.href='?go=danhsachHD&action=update&SoHD=<? echo($row['SoHD']);?>&status='+this.value">
		<?
		        if($row['TrangThai']=='2')
				{
		?>
		 
		<option value="2">Da Xu Ly</option>
		 <?
	  	}else{
		if($row['TrangThai']==1){
	  ?>
		  <option value="1">Dang Xu Ly</option>
		  <option value="0">Chua Xu Ly</option>
		  <option value="2">Da Xu Ly</option>
		 <?
		}else{
		?>
		  <option value="0">Chua Xu Ly</option>
		  <option value="1">Dang Xu Ly</option>
		<?
		}}
		?>
		 
        </select>
      </div></td>
    </tr>
	<?
	}
	}
	?>
  </table>
  <div align="center">
      <?
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
		?>
      
  </div>
</form>
<?
          $action=$_REQUEST['action'];
		   $SoHD=$_REQUEST['SoHD'];
		  $TrangThai=$_REQUEST['status'];
		  if($action=="update")
		  {
		        $sql="Update hoadonban set TrangThai=".$TrangThai." where SoHD=".$SoHD;
				if(mysql_query($sql,$connect))
		        {
			            linkto("admin.php?go=danhsachHD");
		        }	
		  }
		  if($action=="delete"){
		            $s1="Delete from hoadonban where SoHD=".$SoHD;
					if(mysql_query($s1,$connect))
					{
					     linkto("admin.php?go=danhsachHD");
					}
		  }
?>
<p>&nbsp;</p>
</body>
 