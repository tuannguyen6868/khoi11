<?
	require("cart.php");
?>
<table width="100%" border="3" cellspacing="0" cellpadding="0">
  <tr>
    <td><form id="frm" name="frm" method="post" action="index.php?go=shoppingcart" onSubmit="return testform();">
	<input type="hidden" id="action" name="action" value="update" />
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="6"><strong>Chi ti&#7871;t gi&#7887; h&agrave;ng </strong></td>
          </tr>
        <tr>
          <td width="4%"><div align="center">No.</div></td>
          <td width="28%"><div align="left">T&ecirc;n san pham </div></td>
          <td width="21%"><div align="center">S&#7889; l&#432;&#7907;ng </div></td>
          <td width="23%"><div align="center">&#272;&#417;n gi&aacute; </div></td>
          <td width="17%"><div align="center">T&#7893;ng ti&#7873;n </div></td>
          <td width="7%"><div align="center">x&oacute;a</div></td>
        </tr>
<?
	if($cart)
	{
		$idlist = "";
		$total=0;
		foreach(array_keys($cart) as $value)
		{
			$idlist = $idlist.$value.",";
		}
		$idlist = $idlist."0";
		$sql = "SELECT * FROM sanpham WHERE MaSP IN (".$idlist.")";
		$rscart = mysql_query($sql,$connect);
		$stt=0;
		while($row = mysql_fetch_array($rscart))
		{
			$stt++;
?>
        <tr>
          <td><div align="center"><? echo($stt);?></div></td>
          <td><div align="left"><? echo($row['TenSP']);?></div></td>
          <td><div align="center">
            <input name="Qty_<? echo $row["MaSP"]?>" type="text" id="Qty_<? echo $row["MaSP"]?>" value="<? echo GetQuantity($row["MaSP"])?>" size="3" maxlength="3" />
          </div></td>
          <td><div align="center"><? echo(number_format($row['Gia']))?></div></td>
          <td><div align="center">
		  	<?
	  			echo(number_format($row['Gia']*GetQuantity($row['MaSP'])));
				$total +=$row['Gia']*GetQuantity($row['MaSP']);
	  	  	?>
		</div></td>
          <td><div align="center"><a href="index.php?go=shoppingcart&action=del&pid=<? echo($row['MaSP'])?>"><img src="admin/adminimages/b_drop.png" width="16" height="16" border="0" /></a></div></td>
        </tr>
<?
	}
?>
        <tr>
          <td colspan="3"><div align="right"></div></td>
          <td><div align="center">T&#7893;ng ti&#7873;n:</div></td>
          <td><div align="center"><?php echo(number_format($total))?></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6"><label>
            <div align="center">
              <input name="Continue" type="button" id="Continue" value="Mua ti&#7871;p" onclick="location.href='<? echo($_SESSION['url'])?>'" />
              <input name="Update" type="submit" id="Update" value="C&#7853;p nh&#7853;t gi&#7887; h&agrave;ng" />
              <input name="Delete" type="button" id="Delete" value="X&oacute;a gi&#7887; h&agrave;ng" onClick="if(confirm('Xac nhan xoa')) {location.href='index.php?go=shoppingcart&action=delall';}else return false;" />              
              <input name="Order" type="button" id="Order" value="&#272;&#7863;t h&agrave;ng" onclick="location.href='index.php?go=shoppingcart_send1'" />
              </div>
          </label></td>
          </tr>
<?
	}
?>
      </table>
            </form>
    </td>
  </tr>
</table>
<script>
function IsNumeric(txt)
{
	sText = txt.value;
	var IsNumber=true;
	var s1=String(sText);
	
	var re=/\ /;
	if(s1=='')
	{
		alert('chua nhap so luong');
		txt.focus();
		IsNumber=false;
		a=false;
	}
	else
		if(isNaN(s1))
		{
			alert('so luong dat phai là so');
			txt.focus();
			IsNumber=false;
			a=false;
		}else
			if(re.test(s1))
			{
				alert('so luong dat phai là so');
				txt.focus();
				IsNumber=false;
				a=false;
			}else
			{
				
				s2=parseInt(s1);
				if(s2<=0 || s2!=eval(s1))
				{
					alert('so luong dat phai là so nguyen duong');
					txt.value=s2;
					IsNumber=false;
					a=false;			
				}
			}
	a=IsNumber;	
	return IsNumber;
	}
	function testform()
{
	if(a){
		return true;}
	else
	{
		alert('Kiem tra lai');
		return false;
	}
}
function ShoppingCartSend()
{
	if(a){
		return true;
	}
	else
	{
		alert('Kiem tra lai');
		return false;
	}
}
 
</script>

<div style="text-align:left ; font-style:italic ; margin-top:15px">
*Nhap so luong can mua vao o so luong <br />
*De tinh lai tien cho gio hang chon nut "Update gio hang" <br />
*Xoa toan bo gio hang chon chuc nang "Xoa gio hang"<br />
*Lap hoa don chon chuc nang "Dat hang"
</div>
 