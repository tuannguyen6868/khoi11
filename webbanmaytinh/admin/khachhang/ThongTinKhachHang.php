<?
$tentv = $_REQUEST['tentv'];
$trangthai = $_REQUEST["trangthai"];
if($trangthai > 1 || $trangthai < 0 || $trangthai == "" ) $trangthai = 1;
	$SoTVTrenTrang = 5;
	$sql = "SELECT COUNT(*) AS TongSo FROM khachhang WHERE TrangThai= $trangthai ";
	if($tentv != "")
		$sql = $sql . " AND TaiKhoan LIKE '%$tentv%' ";
	$qr = mysql_query($sql);
	$rowdem = mysql_fetch_array($qr);
	$TongSoTV = $rowdem['TongSo'];
     
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFF00}
-->
</style>
</head>
<body>
<form name="f1" method="post" action="">
<table width="800" border="0" align="center" cellpadding="3" cellspacing="3" style="border-collapse:collapse">
	<tr>
		<td>
Tài khoản thành viên
		  <input name="tentv" type="text" id="tentv" value="<? echo $tentv ;?>"/>
		  Trạng thái
			<select name="trangthai" id="trangthai">
				<option value="1" <? if($trangthai == 1 ) {?> selected="selected" <? }?> >KhongKhoa</option>
				<option value="0" <? if($trangthai == 0 ) {?> selected="selected" <? }?> >Khoa</option>
			</select>
		  <input name="timkiem" type="submit" id="timkiem" value="Tìm kiếm"/>
	  </td>
	</tr>
</table>
  <table width="748" border="1" align="center">
    <tr>
      <td colspan="9" align="center" bgcolor="#000000"><span class="style1">THÔNG TIN KHÁCH HÀNG </span></td>
    </tr>
    <tr>
      <td width="63" align="center" bgcolor="#000000"><span class="style1">ĐIỀU KHIỂN </span></td>
      <td width="57" align="center" bgcolor="#000000"><span class="style1">MaKH </span></td>
      <td width="66" align="center" bgcolor="#000000"><span class="style1">TenKH</span></td>
      <td width="60" align="center" bgcolor="#000000"><span class="style1">TaiKhoan</span></td>
      <td width="66" align="center" bgcolor="#000000"><span class="style1">DiaChi</span></td>
      <td width="66" align="center" bgcolor="#000000"><span class="style1">DienThoai</span></td>
      <td width="47" align="center" bgcolor="#000000"><span class="style1">Email</span></td>
      <td width="64" align="center" bgcolor="#000000"><span class="style1">GioiTinh</span></td>
      <td width="126" align="center" bgcolor="#000000"><span class="style1">TrangThai</span></td>
    </tr>
	 <?
	 if($TongSoTV==0){
	 ?>
    <tr>
      <td height="26" colspan="9" align="center"> 
	   <b style="color:#FF0000">Không có thành viên nào cả</b>
	  </td>
	 
    </tr>
	<?
	}
	 else{
      
	$record_per_page = 8;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=khachhang";
	$sql="SELECT * FROM khachhang where TrangThai=$trangthai";
	if($tentv != "")
	 $sql = "SELECT * FROM khachhang where TrangThai=$trangthai and TaiKhoan LIKE '%$tentv%'" ;
	 $sql= $sql." ORDER BY MaKH DESC";
		 
	$save=mysql_query($sql,$connect);
	$totalpage =ceil( mysql_num_rows($save) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sql =$sql." LIMIT ".$from.",".$record_per_page;
	$save=mysql_query($sql,$connect);
      $i=0;
   while($raw = mysql_fetch_array($save))
		{
		$i++;
		?>
	 
    <tr>
      <td height="26" align="center"><label>
      </label>        <img src="adminimages/b_drop.png" width="16" height="16" onclick="if(confirm('ban muon xoa k?')){ location.href = 'admin.php?go=khachhang&action=delete&MaKH=<? echo($raw['MaKH'])?>&i=<? echo($i)?>' } else {f1.c[<? echo($i - 1 )?>].checked = false}" title="Xoa Khach Hang"></td>
      <td><? echo($raw['MaKH'])?></td>
      <td><? echo($raw['TenKH'])?></td>
      <td><? echo($raw['TaiKhoan'])?></td>
      <td><? echo($raw['DiaChi'])?> &nbsp;</td>
      <td><? echo($raw['DienThoai'])?></td>
      <td><? echo($raw['Email'])?></td>
      <td align="center"><label>
        <select name="select" onchange="location.href ='?go=khachhang&action=updategioitinh&MaKH=<? echo($raw['MaKH'])?>&i=<? echo($i)?>&GioiTinh='+this.value">
		<? if($raw['GioiTinh'] == 1) 
			{ 
		?>
          <option value="1">Nam</option>
          <option value="0">Nu</option>
		 <? } 
		 	else {
		 ?>
		  <option value="0">Nu</option>
		  <option value="1">Nam</option>
		  <?
		  	}
		  ?>
        </select>
      </label></td>
      <td align="center"><label>
        <select name="select2" onchange="location.href ='?go=khachhang&action=updatetrangthai&MaKH=<? echo($raw['MaKH'])?>&i=<? echo($i)?>&TrangThai='+this.value">
		<? if($raw['TrangThai'] == 1)
		 {
		?>
          <option value="1">KhongKhoa</option>
          <option value="0">Khoa</option>
		 <?
		 	} 
			else {
		 ?>
		  <option value="0">Khoa</option>
		  <option value="1">KhongKhoa</option>
		  <? 
		  	}
		  ?> 
        </select>
      </label></td>
    </tr>
	<?
	}
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
	
	   if($TongSoTV==0){  
	        echo("");
	   }
	   else{
		     echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
			 }
		?>
  
  
  </div>
</form>
<?
	$action = $_GET['action'];
	 
	if($action == "updatetrangthai") {
		$TrangThai = $_GET['TrangThai'];
		$geti = $_GET['i'];
		$MaKH = $_GET['MaKH'];
		$sql = "update khachhang set TrangThai=".$TrangThai."  where MaKH=".$MaKH;
		if(mysql_query($sql,$connect)) {
		    echo("<script>alert('Update thanh cong!!!')</script>");
			linkto("admin.php?go=khachhang");
		}
	}
	if($action == "updategioitinh") {
		$Gioitinh = $_GET['GioiTinh'];
		$geti = $_GET['i'];
		$MaKH = $_GET['MaKH'];
		$sql = "update khachhang set GioiTinh=".$GioiTinh."  where MaKH=".$MaKH;
		if(mysql_query($sql,$connect)) {
		    echo("<script>alert('Update thanh cong!!!')</script>");
			linkto("admin.php?go=khachhang");
		}
	}
	if($action == "delete"){
	
		$MaKH = $_REQUEST['MaKH'];
		$sql1="Select * from hoadonban where MaKH=".$MaKH;
		$re1=mysql_query($sql1,$connect);
		$row1=mysql_num_rows($re1);
		$sql2="Select * from thongtinphanhoi where MaKH=".$MaKH;
		$re2=mysql_query($sql2,$connect);
		$row2=mysql_num_rows($re2);
		if(($row1>=1)||($row2 >=1)){
		        echo("<script>alert('Ban khong the xoa khach hang nay vi ma khach hang ton tai trong bang hoa don hoac feedback.Ban co the chuyen trang thai khach hang thanh khoa!');</script>");
			    $s1="Update khachhang set TrangThai=0 where MaKH=".$MaKH;
				if(mysql_query($s1,$connect))
				{
			         linkto("admin.php?go=khachhang");
				}
			}
		else{
		       $sql = "delete from khachhang where MaKH=".$MaKH;
			   //echo($sql);
			  // die();
		       if(mysql_query($sql,$connect)) {
		        echo("<script>alert('Ban da xoa thanh cong!');</script>");
			    linkto("admin.php?go=khachhang");
			    
			}
	   }
}
?>
</body>
</html>
