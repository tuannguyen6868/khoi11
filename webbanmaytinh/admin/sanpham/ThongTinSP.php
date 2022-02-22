<?
$record_per_page =5;
$pagenum = $_GET['page'];
$MaHang=$_REQUEST['MaHang'];
$page = "admin.php?go=danhsachsp&MaHang=$MaHang";
?>
<?
//find
$find_proname=$_REQUEST['find_proname'];
$expression=" 1=1 ";
	
	if(!empty($find_proname))
	{
		$expression =$expression." and TenSP Like '%".$find_proname."%'";
		$page =$page."&TenSP=".$find_proname;
	}
?>
<?php
if($MaHang==0)
	{
		$sql="SELECT * FROM sanpham where ".$expression."  order by MaSP DESC";
	}
else
	{
		$sql="SELECT * FROM sanpham where ".$expression." and MaHang=".$MaHang." order by MaSP DESC";
	}
?>
<?
$re = mysql_query($sql,$connect);	
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

$save=mysql_query($sql,$connect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFF00}
-->
</style>
</head>

<body>
<form id="form1" name="f1" method="post" action="admin.php?go=danhsachsp&MaHang=<? echo($MaHang)?>&page=<? echo($pagenum)?>">
  <table width="694" border="1" align="center">
    <tr bgcolor="#FFFF00">
	<th width="29">
      <td colspan="14"> <strong>Chon San Pham</strong>:<select name="sanpham" onchange="location.href='admin.php?go=danhsachsp&MaHang='+this.value+'&page=<? echo($pagenum)?>'">
          <option>---All Category---</option>
          <?
		       $sql_category=" Select * from hang ";
			   $re_category=mysql_query($sql_category,$connect);
			   while($row_category=mysql_fetch_array($re_category))
				{
					if($row_category['MaHang']==$MaHang)
					{
			?>
          <option value="<? echo($row_category['MaHang'])?>" selected="selected"> <? echo($row_category['TenHang'])?> </option>
          <?
					}else{
			?>
          <option value="<? echo($row_category['MaHang'])?>"> <? echo($row_category['TenHang'])?> </option>
          <?
					}
				}
			?>
        </select>	  
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <strong>Ten San Pham</strong>:
	  <input name="find_proname" type="text" id="find_proname"  value="<? if(empty($find_proname)) echo('Keyword'); else echo($find_proname);?>"  onFocus="if(this.value=='Keyword') this.value=''" onBlur="if(this.value=='') this.value='Keyword'" style="color:#999999"/>
        <input type="submit" name="btprosearch" value="Search" /></th>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#000000"><div align="center" class="style1">&#272;I&#7872;U KHI&#7874;N </div></td>
      <td width="39" bgcolor="#000000"><div align="center" class="style1">M&atilde;SP</div></td>
      <td width="41" bgcolor="#000000"><div align="center" class="style1">T&ecirc;nSP</div></td>
      <td width="81" bgcolor="#000000"><div align="center" class="style1">Th&ocirc;ngTinSP</div></td>
      <td width="85" bgcolor="#000000"><div align="center" class="style1">H&igrave;nh &#7842;nh </div></td>
      <td width="76" bgcolor="#000000"><div align="center" class="style1">Th&#7901;iGianBH</div></td>
      <td width="33" bgcolor="#000000"><div align="center" class="style1">Gia</div></td>
      <td width="53" bgcolor="#000000"><div align="center" class="style1">Ng&agrave;y Nh&#7853;p </div></td>
      <td width="37" bgcolor="#000000"><div align="center"><span class="style1">TinhTrang </span></div></td>
      <td width="37" bgcolor="#000000"><div align="center" class="style1">Xu&#7845;t S&#7913; </div></td>
      <td width="58" bgcolor="#000000"><div align="center" class="style1">Tr&#7841;ng Th&aacute;i </div></td>
      <td width="50" bgcolor="#000000"><div align="center" class="style1">M&atilde; H&atilde;ng </div></td>
    </tr>
		<?
			 
			while($raw = mysql_fetch_array($save))
				{ 
					 
		?>
    <tr>
      <td height="84" colspan="2"><div align="center">
        <label>        </label>
      </div>        <div align="center"><a href="admin.php?go=changesp&action=edit&MaSP=<? echo($raw['MaSP'])?>;"><img  src="adminimages/b_edit.png" width="16" height="16" border="0" title="Sua San Pham" /></a></div></td>
      <td width="33"><div align="center">
	  <?
	        $sql="Select * from chitiethoadonban  where MaSP=".$raw['MaSP'];
			$re_check=mysql_query($sql,$connect);
			$ok=0;
			while($row_check=mysql_fetch_array($re_check))
		{
			$ok=1;
		}
		if($ok==1)
		{
			echo("||||");
		}
		else{
	  
	  ?>
        <img onclick="if(confirm('ban muon xoa k?')){ location.href = 'admin.php?go=danhsachsp&action=delete&MaSP=<? echo($raw['MaSP'])?>&i=<? echo($i)?>' } else {f1.c[<? echo($i - 1 )?>].checked = false}" src="adminimages/b_drop.png" width="16" height="16"  title="Xoa San Pham"/> </div></td> 
      <? 
	  	}
	  ?>
	  <td><? echo($raw['MaSP'])?></td>
      <td><? echo($raw['TenSP'])?></td>
      <td><? echo($raw['ThongTinSP'])?>&nbsp;</td>
      <td><div align="center"><img height="80" width="80" src="../admin/anh/<? echo($raw['HinhAnh'])?>" /></div></td>
      <td><? echo($raw['ThoiGianBH'])?></td>
      <td><? echo(number_format($raw['Gia']))?></td>
      <td><? echo($raw['NgayNhap'])?></td>
      <td><select name="select1" onchange="location.href='?go=danhsachsp&action=updatesp&MaSP=<? echo($raw['MaSP'])?>&TinhTrang='+this.value">
	      <?    if($raw['TinhTrang']==1){
         ?>
	        <option value="1">C&ograve;n H&agrave;ng</option>
            <option value="0">H&#7871;t H&agrave;ng</option>
		 <?
	   }else {
	   ?>
	       <option value="0">H&#7871;t H&agrave;ng</option>
		   <option value="1">C&ograve;n H&agrave;ng</option>
		   <?
	   }
		?>
      </select></td>
      <td><? echo($raw['XuatSu'])?></td>
      <td><div align="center">
        <label>
        <select name="select" onchange="location.href='?go=danhsachsp&action=updatetrangthai&MaSP=<? echo($raw['MaSP'])?>&TrangThai='+this.value">
						<? 
				if($raw['TrangThai']==1) {
			?>
          			<option value="1">Hi&#7879;n</option>
					<option value="0">&#7848;n</option>
			<?
				}
				else {
			?>
         			<option value="0">&#7848;n</option>
					<option value="1">Hi&#7879;n</option>
			<?
				
				}
			?>
        </select>
        </label>
      </div></td>
      <td><? echo($raw['MaHang'])?></td>
    </tr>
	<?
		}
	?>

  </table>
   <div align="center"><?
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
		?></div>
</form>
<p>
  <?
	$action = $_GET['action'];
	if($action == "updatetrangthai") {
		$MaSP = $_GET['MaSP'];
		$TrangThai = $_GET['TrangThai'];
		$sql ="update sanpham set TrangThai = $TrangThai where MaSP =".$MaSP;
		if(mysql_query($sql,$connect)) {
		    echo("<script>alert('Update trang thai thanh cong');</script>");
			linkto("admin.php?go=danhsachsp");
		}
	}
	if($action == "updatesp"){
	    $MaSP = $_GET['MaSP'];
		$TinhTrang=$_GET['TinhTrang'];
		$sql ="update sanpham set TinhTrang=$TinhTrang where MaSP =".$MaSP;
		if(mysql_query($sql,$connect)) {
		    echo('<script>alert("Update thanh cong!!!");</script>');
			linkto("admin.php?go=danhsachsp");
		}
		
	}
	if($action == "delete") {
		$MaSP = $_GET['MaSP'];
		$sql123="Select * from thongtinphanhoi where TrangThai=1 and MaSP=".$MaSP;
		$r123=mysql_query($sql123,$connect);
		$row123=mysql_num_rows($r123);
		if($row123>=1){
		     echo("<script>alert('Ban khong the xoa san pham nay!');<script>");
			  $s123="Update sanpham set TrangThai=0 where MaSP=".$MaSP;
			  if(mysql_query($s123,$connect)){
			        echo("<script>alert('Update thanh cong!!!');</script>");
			  }
			  }
		 
		else{
		$sql = "delete from sanpham where MaSP=".$MaSP;
		if(mysql_query($sql,$connect)) {
		    echo('<script>alert("Xoa thanh cong");</script>');
			linkto("admin.php?go=danhsachsp");
			}
			} 
	}
?>
 
 
</body>
</html>
