<?
	$record_per_page = 5;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=danhsachtintuc";
	$sql="SELECT * FROM tintuc order by Matinmoi desc";
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
<title>Thong tin tin tuc</title>
<style type="text/css">
<!--
.style1 {color: #FFFF00}
-->
</style>
</head>

<body>
<form id="form1" name="f1" method="post" action="">
  <table width="778" border="1" align="center">
    <tr>
      <td colspan="2" bgcolor="#000000"><div align="center" class="style1">T&ugrave;y Ch&#7881;nh </div></td>
      <td width="128" bgcolor="#000000"><div align="center" class="style1">Tieudetin </div></td>
      <td width="103" bgcolor="#000000"><div align="center"><span class="style1">Ngayduatin</span></div></td>
      <td width="104" bgcolor="#000000"><div align="center"><span class="style1">Noidungtin</span></div></td>
      <td width="50" bgcolor="#000000"><div align="center"><span class="style1">Anh</span></div></td>
      <td width="50" bgcolor="#000000"><div align="center"><span class="style1">Kieutin</span></div></td>
      <td width="103" bgcolor="#000000"><div align="center" class="style1">Nguon</div></td>
      <td width="89" bgcolor="#000000"><div align="center" class="style1">TrangThai</div></td>
    </tr>
	<?
		$i=0;
		while($raw = mysql_fetch_array($save)) 
			{
				$i++;
	?>
    <tr>
      <td width="50"><div align="center">
        <label>        </label>
      </div>        <div align="center"><img src="adminimages/b_edit.png" onClick="location.href='admin.php?go=Thaydoitttintuc&Matinmoi=<? echo($raw['Matinmoi'])?>'" width="16" height="16"></div></td>
      <td width="43"><div align="center"><img src="adminimages/b_drop.png" onClick="if(confirm('ban muon xoa k?')) location.href = 'admin.php?go=danhsachtintuc&action=delete&Matinmoi=<? echo($raw['Matinmoi'])?>&i=<? echo($i)?>'" width="16" height="16" /></div></td>
      <td><? echo($raw['Tieudetin'])?></td>
      <td><? echo($raw['Ngayduatin'])?></td>
      <td><? echo($raw['Noidungtin'])?></td>
      <td><div align="center"><img src="../admin/anh/<? echo($raw['Anh'])?>"/></div></td>
      <td><? echo($raw['Kieutin']);?></td>
      <td><? echo($raw['Nguon'])?></td>
      <td><p>
	    <select onChange="location.href ='?go=danhsachtintuc&action=updatetrangthai&Matinmoi=<? echo($raw['Matinmoi'])?>&i=<? echo($i)?>&TrangThai='+this.value" name="s">

			<? 
				if($raw['Trangthai']==1) {
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
      </p>      </td>
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
  
   
</form>
</body>
<?
	$action = $_GET['action'];
	
	if($action == "updatetrangthai") {
	$TrangThai = $_GET['TrangThai'];
	$geti = $_GET['i'];
	$Matinmoi = $_GET['Matinmoi'];
?>
	<script> f1.c[<? echo($geti - 1 )?>].checked = true; </script>
<?
	$sql2 = "update tintuc set Trangthai=".$TrangThai."    where Matinmoi=".$Matinmoi;
//	echo($sql);
//	die();
		if(mysql_query($sql2,$connect))  {
		     echo("<script>alert('Update thanh cong!!!')</script>");
			linkto("admin.php?go=danhsachtintuc");
	}
	}
	if($action == "delete") {
		$Matinmoi = $_GET['Matinmoi'];
		$sql1 = "delete from tintuc where Matinmoi='".$Matinmoi."'";
		if(mysql_query($sql1,$connect)) {
		    echo("<script>alert('Xoa thanh cong!!!')</script>");
			linkto("admin.php?go=danhsachtintuc");
			}
	}
?>
</html>