<?php session_start(); ?>
<? 
	require("connectdb.php");
?>
<?
    $user = $_SESSION['acc'];
	if($_SESSION['acc']=='')
		linkto("login.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="adminstyle.css" />
<style type="text/css" >
<!--
body {
	background-color:#000000;
}
.style1 {color: #FFFF00}
.style2 {color: #FFFF00; font-style: italic; }
-->
</style></head>
<script src="../Javascript/PopCalendar.js"></script>
<script src="../js/myconfig.js"></script>
<body>
<table width="974" height="504" border="1" align="center" bgcolor="#CCCCCC">
  <tr>
    <td width="177" height="91"><p class="style1"><strong>Chào bạn </strong>: <? echo($user)?></p>
    <p><a href="login.php" class="style2">Đăng xuất </a></p>
    <p><img src="../images/bar_bg.gif" width="199" /></p></td>
    <td width="781" align="center" bordercolor="#000000"  bgcolor="#000000"><strong>
      <h2 class="style1">Hệ Thống Quản Trị Của Website</h2>
    </strong></td>
  </tr>
  <tr valign="top">
    <td height="356">
	<?
		require("menu1.php");
	 ?>
    </td>
    <td>
	<?
		require("noidung.php");
	?></td>
  </tr>
  <tr valign="top">
    <td height="47">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
