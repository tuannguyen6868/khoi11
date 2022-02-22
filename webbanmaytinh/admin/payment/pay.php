 <?
         $sql="Select * from hinhthucthanhtoan";
		 $re=mysql_query($sql,$cnn);
 ?>
<body>
<form name="form1" method="post" action="">
  <table width="85%"  border="1">
    <tr>
      <td colspan="3"><div align="center">Action</div>        <div align="center"> </div>        <div align="center"> </div></td>
      <td width="29%"><div align="center">MaThanhToan</div></td>
      <td width="52%"><div align="center">HinhThucThanhToan</div></td>
    </tr>
	<?
            while($row=mysql_fetch_array($re))
			{
	?>
    <tr>
      <td width="5%"><div align="center">
        <input type="checkbox" name="checkbox" value="checkbox">
      </div></td>
      <td width="7%"><div align="center"><a href="editpay.php?go=editpay&action=edit&MaTH=<? echo($row['MaThanhToan']);?>"><img src="../anh/b_edit.png" width="16" height="16" border="0"></a></div></td>
      <td width="7%"><div align="center"><a href="pay.php?go=pay&action=delete&MaTH=<? echo($row['MaThanhToan']);?>"><img src="../anh/b_drop.png" width="16" height="16" border="0"></a></div></td>
      <td><div align="center"><? echo($row['MaThanhToan'])?></div></td>
      <td><div align="center"><? echo($row['LoaiThanhToan'])?></div></td>
    </tr>
	<?
	}
	?>
  </table>
 <a href="thempay.php">Add them hinh thuc thanh toan</a>
</form>
<?
        $action=$_REQUEST['action'];
		$MaTH=$_REQUEST['MaTH'];
		if($action=='delete')
		{
		       $sql="Delete from hinhthucthanhtoan where MaThanhToan=".$MaTH;
			   if(mysql_query($sql,$cnn))
			   {
			        Redirect("pay.php");
			   }
		}

?>

 