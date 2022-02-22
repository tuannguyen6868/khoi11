<? 
      $sql1="Select * from khachhang where TaiKhoan='".$_SESSION['CusUser']."'";
	  $re=mysql_query($sql1,$connect);
?>  
<?
	$action=$_REQUEST['action'];
	if($action=='update')
		{
		$name=$_REQUEST['cusname'];
		$address=$_REQUEST['cusaddress'];
		$phone=$_REQUEST['cusphone'];
		$gender=$_REQUEST['cusgender'];
		$sql="update khachhang set TenKH ='" . $name . "',DienThoai='" . $phone . "',DiaChi ='" . $address . "',GioiTinh='" . $gender . "' where  TaiKhoan= '" .$_SESSION['CusUser']."'" ;
		if(mysql_query($sql,$connect)){
				echo("<script>alert('Cap nhat thong tin ca nhan thanh cong !');</script>");
				linkto("index.php");
			}
		}
?>
<?
 
	while($row=mysql_fetch_array($re))
		{
?>
<form id="frmcusedit" name="frmcusedit" method="post" action="index.php?go=editinfo&action=update" onSubmit="return checkedit();">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#c0b59a">
    <tr>
      <td colspan="2"><div align="center" class="custt">C&#7853;p nh&#7853;t th&ocirc;ng tin c&aacute; nh&acirc;n<hr /></div></td>
    </tr>
    <tr>
      <td width="42%"><div align="right"><strong>H&#7885; t&#7879;n :&nbsp;&nbsp;&nbsp;</strong></div></td>
      <td width="58%">
        <div align="left">
          <input name="cusname" type="text" id="cusname" size="30" maxlength="30" value="<? echo ($row['TenKH']);?>" onFocus="style.backgroundColor='yellow'" onBlur="style.backgroundColor='white'"  />
        </div>      </td>
    </tr>
    <tr>
      <td><div align="right"><strong>&#272;&#7883;a ch&#7881; :&nbsp;&nbsp;&nbsp;</strong></div></td>
      <td><div align="left">
        <input name="cusaddress" type="text" id="cusaddress" size="30" maxlength="50" value="<? echo ($row['DiaChi']);?>" onFocus="style.backgroundColor='yellow'" onBlur="style.backgroundColor='white'"  />
      </div></td>
    </tr>
    <tr>
      <td><div align="right"><strong>&#272;i&#7879;n tho&#7841;i :&nbsp;&nbsp;&nbsp;</strong></div></td>
      <td><div align="left">
        <input name="cusphone" type="text" id="cusphone" size="25" maxlength="20" value="<? echo ($row['DienThoai']);?>" onFocus="style.backgroundColor='yellow'" onBlur="style.backgroundColor='white'"  />
      </div></td>
    </tr>
    
    <tr>
      <td><div align="right"><strong>Gi&#7899;i t&iacute;nh :&nbsp;&nbsp;&nbsp;</strong></div></td>
      <td>
        <div align="left">
          <select name="cusgender" id="cusgender">
            <?
			if($row['TrangThai']==1){
			?>
            <option value="1">Nam</option>
            <option value="0">Nu</option>
            <?
			 }else{
			?>
            <option value="0">Nu</option>
            <option value="1">Nam</option>
            <?
			}
			?>
          </select>
        </div>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="left">
        <input name="Submit" type="submit" value="C&#7853;p nh&#7853;t" />
        <input name="Reset" type="reset" id="Reset" value="H&#7911;y b&#7887;" onClick="location.href='index.php'" />
      </div></td>
    </tr>
  </table>
</form>
<?
		}
	 
?>
<script>
	function checkedit()
		{
		// kiem tra ten
		cusname=frmcusedit.cusname.value;
		re_cusname=/^[a-zA-Z][a-zA_Z\s]*/;
		if(cusname == "" || !re_cusname.test(cusname))
			{
			alert('Ten khong dung quy tac !');
			frmcusedit.cusname.select();
			return false;
			}
		// kiem tra dia chi
		if(cusaddress == "")
			{
			alert('nhap dia chi !');
			frmcusedit.cusaddress.select();
			return false;
			}
		}
</script>