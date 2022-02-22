<?
if($_SESSION["tien"]==""){
linkto('index.php?go=shoppingcart_login');
}
?>
<form name="frmsendcart" method="post" action="index.php?go=shoppingcart_send2" onSubmit="return tien();">
<?php
	//read information customer
	$sql="Select * from khachhang where TaiKhoan='".$_SESSION["CusUser"]."'";
	$res=mysql_query($sql,$connect);
	$row=mysql_fetch_array($res);
?>
<table>
<tr>
<td>
 
<fieldset>
<legend>Thong Tin Khach Hang </legend>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="200" align="right">Ten Khach Hang: </td>
    <td width="799"><? echo($row['TenKH'])?></td>
  </tr>
  <tr>
    <td align="right">Dia Chi Khach Hang: </td>
    <td><? echo($row['DiaChi'])?></td>
  </tr>
  <tr>
    <td align="right">Dien Thoai: </td>
    <td><? echo($row['DienThoai'])?></td>
  </tr>
  <tr>
    <td align="right">Email: </td>
    <td><? echo($row['Email'])?></td>
  </tr>
</table>
</fieldset>
<fieldset>
<legend>&nbsp;Ngay Giao Hang Va Thanh Toan </legend>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td>Ngay Giao Hang
        <input name="ordShipDate" type="text" class="input" id="ordShipDate" style="color:#990000" size="20" onkeypress="popUpCalendar(this, document.forms.frmsendcart.ordShipDate, 'yyyy-mm-dd', 0)" readonly="true" /><img src="image/calendar.png" height="20" onclick="popUpCalendar(this, document.forms.frmsendcart.ordShipDate, 'yyyy-mm-dd', -100)"></td>
<?php
	//read information payment
	$sql="Select * from hinhthucthanhtoan";
	$res=mysql_query($sql,$connect);	
?>
	  <td>Hinh Thuc Thanh Toan:
	  <?php while($row=mysql_fetch_array($res)){?>
	      <input name="MaThanhToan" type="radio" value="<?php echo($row['MaThanhToan'])?>" checked="checked">
		  	<?php echo($row['LoaiThanhToan'])?>
		<? }?>	 </td>
    </tr>
  </table>
</fieldset>
<fieldset>
<legend>Thong Tin Nguoi Nhan </legend>

  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td width="200" align="right">Ten:</td>
      <td><input class="input" name="ordName" type="text" id="ordName" size="50"></td>
    </tr>
    <tr>
      <td align="right">Dia Chi:</td>
      <td><input class="input" name="ordAdd" type="text" id="ordAdd" size="50"></td>
    </tr>
    <tr>
      <td align="right">So Dien Thoai:</td>
      <td><input class="input" name="ordPhone" type="text" id="ordPhone" size="50"></td>
    </tr>
  </table>
</fieldset>
</div>
<p align="center">
<input type="submit" name="send" value="Gui" onClick="return checkshipdate(frmsendcart.ordShipDate.value);">
<input type="button" name="back" value="QuayLai" onClick="history.back();"> 
</td>
</tr>
</table>
</form>
<script>
	function checkshipdate(val)
	{
		//alert(val);
			
	 
		var date= new Date;
		//alert(date);
		
		var y=date.getFullYear();
		var m=date.getMonth()+1;
		var d=date.getDate();
		var arr=val.split("-");
		//alert(y+"/"+m+"/"+d);
		
		//for(i=0;i<arr.length;i++)
//			alert(arr[i]);
//		
		//
		if(eval(arr[0])<y)
		{
			alert('Ngay nhan hang phai sau ngay hien tai 1 ngay');
			return  false;
		}	
		if((eval(arr[1])<m)&&(eval(arr[0])==y))
		{
			alert('Ngay nhan hang phai sau ngay hien tai 1 ngay');
			return  false;
		}
		 if((eval(arr[0])<=y)&&(eval(arr[1])<=m)&&(eval(arr[2])<d+1))
		     {
			     alert('Ngay nhan hang phai sau ngay hien tai 1 ngay');
			     return  false;
		    }
		
		return true;	
	}
	function tien()
	{
	     if(frmsendcart.ordShipDate.value=="")
		 {
		     alert("Ban Chua Chon Ngay Giao Hang!");
			 frmsendcart.ordShipDate.focus();
			 return false;
		 }
	}
</script> 
   