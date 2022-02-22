<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {
	color: #FF0066;
	font-weight: bold;
}
.style2 {
	color: #000000;
	font-size: 24px;
}
.style4 {color: #FF0000}
-->
</style>
 <?

 			   $action=$_REQUEST['action'];
			   if($action=='send')
			   {
			    $t1=$_REQUEST['t1'];
			  	$t2=$_REQUEST['t2'];
			  	$t3=$_REQUEST['t3'];
			  	$t4=$_REQUEST['t4'];
			  	$t5=$_REQUEST['t5'];
			  	$t6=$_REQUEST['t6'];
				$cauhoi = $_REQUEST['txtcauhoi'];
				$t100=$_REQUEST['t100'];
			  	$s=$_REQUEST['s'];
				$t7=$_REQUEST['t7'];
				 
				$ck1="Select * from khachhang where TaiKhoan='".$t1."'";
				$re_ck1=mysql_query($ck1,$connect);
				$row1=mysql_num_rows($re_ck1);
				$ck2="Select * from khachhang where Email='".$t7."'";
				$re_ck2=mysql_query($ck2,$connect);
				$row2=mysql_num_rows($re_ck2);
				
				if(($row1>=1)&&($row2>=1))
				{
				     echo("<script>alert('Tai khoan va email da ton tai');</script>");
					 echo("<script>window.location='index.php?go=register';</script>");
				}
			   if($row1>=1){
				         echo("<script>alert('Tai Khoan Nay Da Ton Tai!');</script>");
						 echo("<script>window.location='index.php?go=register';</script>");
			    }
			   if($row2>=1)
			   { 
				       
					       echo("<script>alert('Email da ton tai !');</script>");
				           echo("<script>window.location='index.php?go=register';</script>");
			    }
				 
				else{
			  	$sql="Insert into khachhang (TenKH,TaiKhoan,MatKhau,DiaChi,DienThoai,Email,GioiTinh,TrangThai,Macauhoi,Traloi) values ('".$t4."','".$t1."','".$t2."','".$t5."','".$t6."','".$t7."',".$s.",1,".$cauhoi.",'".$t100."')";
			    if(mysql_query($sql,$connect))
			  	{
				   echo("<script>alert('Dang ky thanh cong !');</script>");
			       linkto("index.php?go=succesful");
			  	}
			  }
	}
?>
 
 
 
 	 
 
 
<script>

      function check100()
	  {
	          if(f1.t1.value=="")
			  {
			         alert("Ten dang nhap khong duoc de trong!");
					 f1.t1.focus();
					 f1.t1.select();
					 return false;
			  }
			  if(f1.t2.value=="")
			  {
			       alert("Mat khau khong duoc de trong!");
				   f1.t2.focus();
				   f1.t2.select();
				   return false;
			  }
			 
			  if(f1.t3.value != f1.t2.value)
			  {
			        alert ("Mat khau khong giong nhau!");
					f1.t3.focus();
					 
					return false;
			  }
			  if(f1.t4.value=="")
			  {
			       alert("Ban hay nhap ten !");
				   f1.t4.focus();
				   f1.t4.select();
				   return false;
			  }
			 
			  t71=f1.t7.value;
			  regemail=/^[a-z]+\w*(\.\w+)*@[a-z]+\w*(\.[a-z]+)+/;
			  if(regemail.test(t71)==false)
			  {
			       alert("Email khong dung dinh dang!");
				   f1.t7.select();
				   return false;
			  }
			 if(f1.txtcauhoi.value==0)
			  {
			       alert("ban chua chon cau hoi");
				   return false;
			  }
			  if(f1.t100.value=="")
			  {
			       alert("Ban chua tra loi cau hoi!");
				   f1.t100.focus();
				   return false;
			  }
			 if(f1.t6.value=="")
			  {
			        alert("Ban hay nhap dien thoai nhe!");
					f1.t6.focus();
					return false;
			  }
			     phone =/^[0-9]{8,12}$/;
	        if(!phone.test(f1.t6.value))
	         {
	           alert("Ban hay nhap lai so dien thoai !");
	             f1.t6.select();
	           return false;
			   }
			   
			   
	       }

</script>
<form action="?go=register&action=send" method="post" name="f1" id="f1" onSubmit="return check100();">
  <table width="100%"  border="0">
    <tr>
      <td colspan="2"><div align="center"><span class="style1 style2">&#272;ăng Ký Tài Khoản </span></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center" class="style1 style2">
	        
	  
	   </div></td>
    </tr>
    <tr>
      <td width="49%"><div align="right">T&ecirc;n &#272;&#259;ng Nh&#7853;p: </div></td>
      <td width="51%"><input name="t1" type="text" id="t1" size="25" maxlength="25">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td><div align="right">M&#7853;tKh&#7849;u: </div></td>
      <td><input name="t2" type="password" id="t2" size="30" maxlength="30">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td><div align="right">Nh&acirc;p L&#7841;i M&#7853;t Kh&#7849;u: </div></td>
      <td><input name="t3" type="password" id="t3" size="30" maxlength="30">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td><div align="right">T&ecirc;n Kh&aacute;ch H&agrave;ng: </div></td>
      <td><input name="t4" type="text" id="t4" size="40" maxlength="30">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td><div align="right">&#272;ia Ch&#7881;: </div></td>
      <td><textarea name="t5" cols="50" id="t5"></textarea></td>
    </tr>
    <tr>
      <td><div align="right">Gi&#7899;i T&iacute;nh</div></td>
      <td><select name="s" id="s" >
        <option value="1">Nam</option>
        <option value="0">Nu</option>
      </select></td>
    </tr>
    <tr>
      <td><div align="right">Email</div></td>
      <td><input name="t7" type="text" id="t7" size="50">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
	<?
	      $sql="Select * from cauhoibimat";
		  $re=mysql_query($sql,$connect);
	?>
      <td><div align="right">C&acirc;u h&#7887;i</div></td>
      <td><select name="txtcauhoi" id="txtcauhoi">
        <option value="0" selected="selected">-Ch&#7885;n c&acirc;u h&#7887;i-</option>
		<?
			while($rows = mysql_fetch_array($re))
			{
		?>
		<option value="<? echo($rows['Macauhoi']); ?>"><? echo($rows['Noidungcauhoi']);?></option>
		<?
			}
		?>
      </select>
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td><div align="right">Tr&#7843; l&#7901;i </div></td>
      <td><input name="t100" type="text" id="t100" size="50">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td><div align="right">&#272;i&#7879;n Th&#7885;ai:</div></td>
      <td><input name="t6" type="text" id="t6" size="20" maxlength="20">
      (<span class="style4">*</span>)</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="Submit" value="ÐăngKý" />
        </label>
        <input type="reset" name="Reset" value="Hủy">
      </div></td>
	 
    </tr>
  </table>
</form>
 
 
 
 
