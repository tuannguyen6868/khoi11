 <style type="text/css">
<!--
.comment {
	color: #006600;
	font-weight: bold;
	font-size: 18px;
}
.style1 {color: #990066}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?  
   if((isset($submit) && $submit == "Gửi ý kiến")){
	$pid=$_REQUEST['pid'];
	$cusid=$_SESSION['CusID']; 
	$com_title=$_REQUEST['comtitle'];
	$com_content=$_REQUEST['comcontent'];
    $sql_comment="insert into thongtinphanhoi(MaKH,MaSP,TieuDe,TrangThai,NoiDung,NgayDang) values ($cusid,$pid,'$com_title',0,'$com_content',now())";
	//echo($sql_comment);
	//die();
	if(mysql_query($sql_comment,$connect))
				{
				echo("<script> alert('Gui y kien thanh cong !');</script>");
				}
		    
			 }
		 
?>
	
<script>
function checkcommen()
{
   if(frmcom.comtitle.value=="")
   {
     alert("Title not empty !");
	 frmcom.comtitle.focus();
	 return false;
   }
   if(frmcom.comcontent.value=="")
   {
      alert("Content not empty");
	  frmcom.comcontent.focus();
	  return false;
   }
}
</script>
<form name="frmcom" id="frmcom" method="post" onSubmit="return checkcommen() "> 
  <table width="99%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" align="right" valign="top"><div align="center">Góp Ý Cho Sản Phẩm</div></td>
    </tr>
    <tr>
      <td width="24%" align="right" valign="top"><div align="right"><strong>Ti&ecirc;u &#273;&#7873; :&nbsp;&nbsp;&nbsp; </strong></div></td>
      <td width="76%" align="left" valign="top">
        <div align="left">
          <input name="comtitle" type="text" id="comtitle" size="40" maxlength="30">
        </div>      </td>
    </tr>
    <tr>
      <td align="right" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="top"><div align="right"><strong>N&#7897;i dung  :&nbsp;&nbsp;&nbsp; </strong></div></td>
      <td align="left" valign="top">
        <div align="left">
          <textarea name="comcontent" cols="40" rows="8" id="comcontent"></textarea>
        </div>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td><div align="left">
       
        <input type="submit" name="submit" value="Gửi ý kiến"  >
        
        <input name="Reset" type="reset" id="Reset" value="Làm Lại"  >
      </div></td>
    </tr>
  </table>
</form>