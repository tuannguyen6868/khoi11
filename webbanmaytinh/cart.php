 <?
	$cart = $_SESSION["CART"];
	$action = $_REQUEST["action"];
	switch($action){
		case "add":
				$pid = $_REQUEST["pid"];	
				if($cart){
					if(array_key_exists($pid,$cart))
					{
						$cart[$pid] +=1;
					}else{
						$cart[$pid]=1;
					}
				}else{
					$cart[$pid]=1;
				}
				$_SESSION["CART"] = $cart;
				linkto('index.php?go=shoppingcart');
			break;
		case "update":		
			foreach(array_keys($cart) as $value) 
		 {
            if((is_numeric($_REQUEST["Qty_".$value]) == false) or ($_REQUEST["Qty_".$value] <= 0) or ($_REQUEST["Qty_".$value]-round($_REQUEST["Qty_".$value])!=0))
        {
      ?>
<script>
alert('Ban Phai Nhap So Nguyen Duong!');
</script>
<?
break 1;
}
else
{
$cart[$value] = $_REQUEST["Qty_".$value];
}
}
$_SESSION["CART"] = $cart;
break;
		case "del":
			$pid = $_REQUEST["pid"];
			if($cart)
			{
				foreach(array_keys($cart) as $value){
					if($value != $pid){
						$newcart[$value] = $cart[$value];
					}
				}
				$_SESSION["CART"] = $newcart;	
				$cart=$newcart;
			}
			linkto('index.php?go=shoppingcart');
			break;		
		case "delall":
			$_SESSION["CART"]='';
			linkto('index.php?go=shoppingcart');
			break;
	}
	
?>