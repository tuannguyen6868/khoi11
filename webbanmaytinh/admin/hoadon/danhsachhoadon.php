<?
      $txtdate1=$_REQUEST['txtdate1'];
	  $txtdate2=$_REQUEST['txtdate2'];
	  $expression=" 1=1 ";
	  if($txtdate1!=""){
	  $expression=$expression. " and NgaylapHD >= '".$txtdate1."'";
	  } 
	   
	  $sql="Select count(*) as TongSo from hoadonban where ".$expression." ";
	  $re=mysql_query($sql,$connect);
	  $rowhd=mysql_fetch_array($re);
	  $TongSoHD=$rowhd['TongSo'];
	  
?>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body bgcolor="#999999">
<form name="form1" method="post" action="">
  <table width="639" border="0" align="center">
    <tr>
      <td width="203"><div align="center">Ngày Nhập Hóa &#272;&#417;n:
      </div></td>
      <td width="252">
        <div align="left">
          <input name="txtdate1" type="text" id="txtdate1" value="<? echo $txtdate1 ?>" onkeypress="popUpCalendar(this, document.forms.form1.txtdate1, 'yyyy-mm-dd', 0)">
          <img src="../image/calendar.png" width="16" height="16"  onclick="popUpCalendar(this, document.forms.form1.txtdate1,'yyyy-mm-dd', -100)">        </div></td>
      <td width="170"><input type="submit" name="Submit" value="Tìm Kiếm" onClick="OderDate()"></td>
    </tr>
    <tr>
      <td colspan="3"> <div align="center"></div>        </td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <table width="500" border="1" align="center">
    <tr>
      <td colspan="8"><div align="center">List Hoa Don Ban </div></td>
    </tr>
    <tr>
      <td height="35" colspan="2"><div align="center">Action</div></td>
      <td width="232"><div align="center">SoHD</div></td>
      <td width="209"><div align="center">NgayxulyHD</div></td>
      <td width="216"><div align="center">NgaylapHD</div></td>
      <td width="114"><div align="center">MaKH</div></td>
      <td width="114"><div align="center">TenKhachHang</div></td>
      <td width="220"><div align="center">Mathanhtoan</div></td>
      <td width="175"><div align="center">TrangThai</div></td>
    </tr>
	 <?
	     if($TongSoHD==0){
	 ?>
    <tr>
      <td colspan="9"><div align="center"><b style="color:#FF0000">Không có hoá don nào ca</b></div></td>
    </tr>
	<?
	  }
	  else
	  {
	    
    $record_per_page =6;
    $pagenum = $_GET["page"];
 
    $page = "admin.php?go=danhsachHD";
	$_SESSION['url']="admin.php?go=danhsachHD";
      if($txtdate1=="") {    
	  $sql="Select * from hoadonban Order by SoHD DESC";
	  }
	  else{
	  $sql="Select * from hoadonban where ".$expression." Order By SoHD DESC ";
	  }
	  //echo($sql);
	  //die(); 
	  $re=mysql_query($sql,$connect);	
      $totalpage =ceil( mysql_num_rows($re) / $record_per_page);
 if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage)
 {
	$pagenum = 1;
 } 
 if($pagenum == 1)
 {
	$from = 0;
 }else{
	$from = ($pagenum-1)*$record_per_page;
}
$sql =$sql." LIMIT ".$from.",".$record_per_page;
//echo($sql);
	//die();
   $re=mysql_query($sql,$connect);
 
	      while($row=mysql_fetch_array($re))
		  {
	 ?>
    <tr>
      <td><div align="center">
      </div>        <div align="center"></div>        <div align="center"><img src="adminimages/detail.png" width="16" height="16" border="0" title="Chi Tiet Hoa Don" onClick="location.href='admin.php?go=orderdetail&SoHD=<? echo($row['SoHD'])?>'"></div></td>
      <td width="64"><?
				if($row['TrangThai']==0)
				{
			?>
          <div align="center"><a href="admin.php?go=danhsachHD&action=delete&SoHD=<? echo($row['SoHD'])?>"><img src="adminimages/b_drop.png" width="16" height="16" border="0" title="Xoa Hoa Don" onClick="if(confirm('Th&#7921;c s&#7921; mu&#7889;n x&oacute;a?')) return true; else return false;"></a> </div>
          <?
				}else echo("|||");
			?>
      </td>
      <td><div align="center"><? echo($row['SoHD']);?></div></td>
      <td><div align="center"><? echo($row['NgayxulyHD']);?></div></td>
      <td><div align="center"><? echo($row['NgaylapHD']);?></div></td>
      <td><div align="center"><a href="admin.php?go=khachhang&MaKH=<? echo($row['MaKH']);?>"><? echo($row['MaKH']);?></a></div></td>
      <td><div align="center"><? echo($row['TenKH']);?></div></td>
      <td><div align="center"><? echo($row['MaThanhToan']);?></div></td>
      <td><div align="center">
          <select name="TrangThai" onChange="location.href='?go=danhsachHD&action=update&SoHD=<? echo($row['SoHD']);?>&status='+this.value">
            <?
		        if($row['TrangThai']=='2')
				{
		?>
            <option value="2">Da Xu Ly</option>
            <?
	  	}else{
		if($row['TrangThai']==1){
	  ?>
            <option value="1">Dang Xu Ly</option>
            <option value="0">Chua Xu Ly</option>
            <option value="2">Da Xu Ly</option>
            <?
		}else{
		?>
            <option value="0">Chua Xu Ly</option>
            <option value="1">Dang Xu Ly</option>
            <?
		}}
		?>
          </select>
      </div></td>
    </tr>
    <?
	}
	 }
	?>
  </table>
  <div align="center">
      <?
		for($i =1; $i<=$totalpage;$i++)
		{
			if ($i==1){
				echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
			}else{
				echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
			}
		}
		if($TongSoHD==0){
		echo("");
		}
		else{
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		}
		?>
      
  </div>
</form>
<?
          $action=$_REQUEST['action'];
		  $SoHD=$_REQUEST['SoHD'];
		  $TrangThai=$_REQUEST['status'];
		  if($action=="update")
		  {
		        $sql="Update hoadonban set TrangThai=".$TrangThai." where SoHD=".$SoHD;
				if(mysql_query($sql,$connect))
		        {       
				        echo('<script>alert("Update thanh cong!!!");</script>');
			            linkto("admin.php?go=danhsachHD");
		        }	
		  }
		  if($action=="delete"){
		             $s2="Delete from chitiethoadonban where SoHD=".$SoHD;
		             $s1="Delete from hoadonban where SoHD=".$SoHD;
					if(mysql_query($s2,$connect)){
					      if(mysql_query($s1,$connect))
					             echo('<script>alert("Xoa Thanh Cong");</script>');
					             linkto("admin.php?go=danhsachHD");
					      }
		  }
?>
<p>&nbsp;</p>
</body>
 <script>
          function OderDate(){
		         var tdate=form1.txtdate1.value;
				 var ddate=form1.txtdate2.value;
		        if((tdate!='')&& (ddate !='')){
				       var StartDate=document.getElementById("txtdate1").value;
					   var EndDate=document.getElementById("txtdate2").value;
					   var arr1=StartDate.split("-");
					   var arr2=EndDate.split("-");
					   var start=new Date();
					   var End= new Date();
					   start=Date.parse(StartDate);
					   End=Date.parse(End);
					   if(End <= start){
					       alert("Ngay Nhap phai Nho Hon Ngay Hien Tai");
						   return false;
					   }
					/*  if(eval(arr1[0])>eval(arr2[0])){
					         alert("Ngay nhap phai nho hon ngay ket thuc!!");
							 return false;
					   }
					   if(eval(arr1[0])<= eval(arr2[0]))&&(eval(arr1[1])>eval(arr2[1])){
					       alert("Ngay nhap phai nho hon ngay ket thuc ");
						   return false;
					   }
					   if(eval(arr1[0])<=eval(arr2[0]))&&(eval(arr1[1])<=eval(arr2[1]))&&(eval(arr1[2])>=eval(arr2[2])){
					        alert("Ngay nhap phai nho hon ngay ket thuc ");
							return false;
					   }*/
					   return true;
				} 
		  }
 </script>