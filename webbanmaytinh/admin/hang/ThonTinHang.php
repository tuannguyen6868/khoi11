<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=danhsachhang";
	$sql="SELECT * FROM hang order by MaHang desc";
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
<form id="form1" name="f1" method="post" action="">
  <table width="564" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">T&ugrave;y Ch&#7881;nh </div></td>
      <td width="107" bgcolor="#000000"><div align="center" class="style1">MaHang </div></td>
      <td width="128" bgcolor="#000000"><div align="center" class="style1">TenHang </div></td>
      <td width="103" bgcolor="#000000"><div align="center" class="style1">MaLoaiHang</div></td>
      <td width="89" bgcolor="#000000"><div align="center" class="style1">TrangThai</div></td>
    </tr>
	<?
		$i=0;
		while($raw = mysql_fetch_array($save)) 
			{
				$i++;
	?>
    <tr>
      <td><div align="center">
        <label>        </label>
      </div>        <div align="center"><img onclick="location.href='admin.php?go=doithongtinhang&action=edit&MaHang=<? echo($raw['MaHang'])?>'" src="adminimages/b_edit.png" width="16" height="16" title="Sua Hang" /></div></td>
      <td width="31"><div align="center">
	  <?
	        $sql1="Select * from sanpham where MaHang=".$raw['MaHang'] ;
			$re=mysql_query($sql1,$connect);
			 if(mysql_num_rows($re)>0)
			{
				echo('|||');
			}
		else{
	  
	   
	  ?>
	  <img src="adminimages/b_drop.png" width="16" height="16" onclick="if(confirm('ban muon xoa k?')) location.href = 'admin.php?go=danhsachhang&action=delete&MaHang=<? echo($raw['MaHang'])?>&i=<? echo($i)?>'" title="Xoa Hang" /></div></td>
       <? 
	  	}
	  ?>
	  <td><? echo($raw['MaHang'])?></td>
      <td><? echo($raw['TenHang'])?></td>
      <td><? echo($raw['MaLoaiHang'])?></td>
      <td><p>
	    <select onChange="location.href ='?go=danhsachhang&action=updatetrangthai&MaHang=<? echo($raw['MaHang'])?>&i=<? echo($i)?>&TrangThai='+this.value" name="s">
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
      </p>
      </td>
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
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		?>
  
  
  </div>
  </div>
  <script>
  		function tich(i) {
			for (n = 0 ; n < i ; n++) 
				f1.c[n].checked = true;
		}
  </script>
  <script>
  		function botich(i) {
			for (n = 0 ; n < i ; n++) 
				f1.c[n].checked = false;
		}
  </script>
  <p align="center"><span onClick="tich(<? echo($i)?>)" style="color:#0000FF;cursor:hand"><U> </U></span></p>
</form>
</body>
<?
	$action = $_GET['action'];
	
	if($action == "updatetrangthai") {
	$TrangThai = $_GET['TrangThai'];
	$geti = $_GET['i'];
	$MaHang = $_GET['MaHang'];
?>
	<script> f1.c[<? echo($geti - 1 )?>].checked = true; </script>
<?
	$sql = "update hang set TrangThai=".$TrangThai."  where MaHang=".$MaHang;
	if(mysql_query($sql,$connect)) {
	     echo('<script>alert("Update Thanh Cong");</script>'); 
		linkto("admin.php?go=danhsachhang");
	}
	}
	if($action == "delete") {
		$MaHang = $_GET['MaHang'];
		$sql = "delete from hang where MaHang='".$MaHang."'";
		if(mysql_query($sql,$connect)){
		        echo('<script>alert("Xoa Thanh Cong");</script>'); 
			    linkto("admin.php?go=danhsachhang");
			}
	}
?>
</html>
 