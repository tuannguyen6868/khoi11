<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</meta>
<style type="text/css">
<!--
.style1 {color: #FFFF00}
-->
</style>
<p>
<h1 align="center">Danh sách câu hỏi bí mật</h1>
</p>
<table width="811" border="1" align="center" cellpadding="3" cellspacing="3" style="border-collapse:collapse">
  <tr>
    <td width="80" bgcolor="#000000" height="30"><div align="center" class="style1">Mã</div></td>
    <td width="632" bgcolor="#000000"><div align="center" class="style1">Câu hỏi bí mật </div></td>
    <td width="61" bgcolor="#000000"><div align="center" class="style1"> Xử Lý</div></td>
  </tr>
  <?php
  		$sql = "select * from cauhoibimat order by Macauhoi ASC";
		$qr = mysql_query($sql);
		while($row = mysql_fetch_array($qr))
		{
		?>
  <tr>
    <td height="20" align="center"><?php echo $row['Macauhoi']; ?></td>
    <td><?php echo $row['Noidungcauhoi']; ?></td>
    <td align="center"> <a onclick="return confirm('X�c nh?n x�a hay kh�ng ?');" href="admin.php?go=danhsachcauhoi&action=xoa&Macauhoi=<? echo($row['Macauhoi']);?>"><img src="adminimages/b_drop.png" width="16" height="16" border="0" title="Xoa Cau Hoi"></a></td>
  </tr>
  <?php
  		}
	?>
</table>
<p>&nbsp;</p>
<? 

         $action=$_REQUEST['action'];
 		 if($action=="xoa")
		 {
		        $Macauhoi=$_REQUEST['Macauhoi'];
				$s1="Select * from khachhang where Macauhoi=".$Macauhoi;
				$row=mysql_query($s1,$connect);
				$num=mysql_num_rows($row);
				if($num>=1)
				{
				     echo("<script>alert('Cau hoi ton tai trong bang khach hang , ban khong the xoa!');</script>");
					 linkto("admin.php?go=danhsachcauhoi");
				}
				else
				{
				      $sql1="Delete from cauhoibimat where Macauhoi=".$Macauhoi;
					//  echo($sql1);
					 // die();
					  echo("<script>alert('Ban da xoa thanh cong!');</script>");
					  if(mysql_query($sql1,$connect))
					  {
					        linkto("admin.php?go=danhsachcauhoi");
					  }
				}
		 }
?>
