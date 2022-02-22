 
  
<style type="text/css">
<!--
.welcome {color:#FFCC00}
-->
</style>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
<table width="100%" border="0">
  <tr>
  <?
      if(session_is_registered('tien'))
 {
  ?>
    <td colspan="2"><div align="center">
      <p>Xin Chào:<? echo($_SESSION['CusName'])?>|||<a href="index.php?go=logout" onclick="if(confirm('are you logout !')) return true ; else return false ;">ĐăngXuất</a></p>
      
      <p><span class="welcome"> <a href="index.php?go=editinfo">S&#7917;a th&ocirc;ng tin</a> | <a href="index.php?go=cuspass">&#272;&#7893;i m&#7853;t kh&#7849;u</a></span></p>
    </div></td>
	 
  </tr>
  <tr>
  <?
  }
  else
  {
  ?>
    <td colspan="2"><a href="index.php?go=login">&#272;ăng Nhập</a> |||| <a href="index.php?go=register">Đăng Ký</a></td>
	<?
	}
	?>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 