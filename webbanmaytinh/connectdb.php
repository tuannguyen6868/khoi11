<?
	$connect = mysql_connect("localhost","root","1234567");
	if(!$connect)
		{
			echo("loi ket noi co so du lieu");
		}
	else 
		{
			mysql_select_db("webbanmaytinh",$connect);
		}
?>
<? 
	function linkto ($url)	{
?>
	<script>
		window.location.href = '<? echo($url)?>';
	</script>
<?
	};
?>
<?
function GetQuantity($pid)
{
	$cart = $_SESSION["CART"];
	$quantity=0;
	foreach(array_keys($cart) as $value)
	{
		if($value == $pid)
		{
			$quantity = $cart[$pid];
			break;
		}
	}
	return $quantity;
} 
?>
