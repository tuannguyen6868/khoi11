<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script>
	setInterval("location.href='admin.php'",5000)
</script>
<style type="text/css">
<!--
body,td,th {
	color: #00FFFF;
}
body {
	background-color: #333333;
}
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {
	color: #0000FF;
	font-style: italic;
}
.style3 {color: #FFFFFF; font-weight: bold; }
.style4 {color: #FFFFFF; font-style: italic; }
.style5 {color: #FFFFFF}
-->
</style></head>

<body>
<table width="533" height="187" border="1" align="center">
  <tr>
    <td bgcolor="#000000" align="center" valign="top"><p class="style1">&nbsp;</p>
      <p class="style3">Ch&agrave;o m&#7915;ng b&#7841;n <? echo($_SESSION['acc'])?> &#273;&atilde; tr&#7903; l&#7841;i</p>
      <p class="style4">&#273;ang t&#7843;i d&#7919; li&#7879;u... </p>
      <p class="style2"><img src="anh/loading.gif" width="90" height="90" /></p>
      <p><a href="admin.php" class="style5">Click v&agrave;o &#273;&acirc;y n&#7871;u b&#7841;n kh&ocirc;ng mu&#7889;n ch&#7901; l&acirc;u.</a></p></td>
  </tr>
</table>
</body>
</html>
