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