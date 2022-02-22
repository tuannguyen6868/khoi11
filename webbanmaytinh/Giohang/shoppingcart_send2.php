 <?php
if($_SESSION["tien"]==""){
linkto('index.php?go=shoppingcart_login');
}
?>
<?php
	$cart = $_SESSION["CART"];
	
if($cart){
	//request value in form
	 
	$OrdShipDate=$_REQUEST['ordShipDate'];
	$TenKH=$_SESSION["CusName"];
	$OrdName=$_REQUEST['ordName'];
	$OrdAdd=$_REQUEST['ordAdd'];
	$OrdPhone=$_REQUEST['ordPhone'];
	$PayID=$_REQUEST['MaThanhToan'];
	$CusID = $_SESSION["CusID"];
	//Create new order
	if($OrdName==""){
	     $sql = "INSERT INTO hoadonban(NgaylapHD,NgayxulyHD,TrangThai,MaThanhToan,MaKH,TenKH,DiachiKH,DienThoaiKH) values(now(),'$OrdShipDate',0,$PayID,$CusID,'$TenKH','$OrdAdd','$OrdPhone')";
		 }
		 else{
	     $sql = "INSERT INTO hoadonban(NgaylapHD,NgayxulyHD,TrangThai,MaThanhToan,MaKH,TenKH,DiachiKH,DienThoaiKH) values(now(),'$OrdShipDate',0,$PayID,$CusID,'$OrdName','$OrdAdd','$OrdPhone')";
		  }
	//echo($sql);
	//die();
	if(mysql_query($sql,$connect)){
	       echo("<script>alert('Gui hoa don thanh cong');</script>");
	}
	 
	  
	 
				
	//Select Max(OrdID)		
	$sql = "SELECT SoHD FROM hoadonban ORDER BY SoHD DESC LIMIT 0,1";
	$res = mysql_query($sql,$connect);
	while($row = mysql_fetch_array($res))
	{
		$OrdID = $row['SoHD'];
	}
	//Insert into Order Detail
	foreach(array_keys($cart) as $value)
	{
		//Select ProPrice 
		$sql = "SELECT * FROM sanpham WHERE MaSP= ".$value;
		$res = mysql_query($sql,$connect);
		while($row = mysql_fetch_array($res))
		{
			$ProPrice = $row["Gia"];
		}

		//Insert into order detail
		$sql = "INSERT INTO chitiethoadonban(SoHD,MaSP,Soluong,Dongia) VALUES($OrdID,$value,".GetQuantity($value).",$ProPrice)";
		mysql_query($sql,$connect);
	}
	//Xoa shopping cart
	$_SESSION["CART"] = "";
	linkto('index.php?go=shoppingcart_send3');					
}

?>