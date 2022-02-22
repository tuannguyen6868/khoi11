<?
if($_REQUEST['act']=="search")
{
	$keyword=$_REQUEST['keyword'];
	$from_price=$_REQUEST['from_price'];
	$to_price=$_REQUEST['to_price'];
	$chkProName=$_REQUEST['chkproName'];	
	$chkDesc=$_REQUEST['chkDesc'];	
}	
?>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
<tr>
<td>
<form method="post" name="frmsearchadvanced" id="frmsearchadvanced" action="index.php?go=searchadvanced&act=search" onSubmit="return checksearch(this);">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
    <tr class="title">
      <td colspan="3" >&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input name="keyword" type="text" value="<? echo($keyword);?>" class="input" id="keyword" size="45" />
	  &nbsp;&nbsp;&nbsp;<i><font color="#990000"> trong:-----></font></i>	  </td>
      <td rowspan="2" style="background-color:#CCCCCC;font-stretch:expanded;"><label>
        <input name="chkproName" type="checkbox" id="chkproName" value="1" <? if($chkproName==1){?> checked="checked" <? }?> />
        Ten San Pham <br>
        <input name="chkDesc" type="checkbox" id="chkDesc" value="2"  <? if($chkDesc==2){?> checked="checked" <? }?>/> 
        Mieu Ta San Pham</label></td>
      </tr>
    <tr>
      <td align="right">Gia San Pham</td>
      <td>Tu:
        <input name="from_price" type="text" class="input" id="from_price" size="13" value="<? echo($from_price);?>" /> 
        (VND) Den:
        <input name="to_price" type="text" class="input" id="to_price" size="13" value="<? echo($to_price);?>" />
(VND)</td>
      </tr>
    <tr>
      <td align="right"><input type="submit" name="Submit" value="Tim Kiem" /></td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
  </table>
</form>
</td>
</tr>
<tr>
<td>
<?
if($_REQUEST['act']=="search")
{
echo("Result set:");
$record_per_page = 3;
$pagenum = $_GET["page"];
$page = "index.php?go=searchadvanced&act=search";
?>
<?
	$expression=" 1=1 ";
	
	if(!empty($keyword))
	{
		if(!($chkproName==1) && ($chkDesc==2))
			$expression =$expression." and TenSP Like '%".$keyword."%'";
		else
		{
		if(($chkproName==1) && ($chkDesc==2))
			$expression =$expression." and (TenSP Like '%".$keyword."%' Or ThongTinSP Like '%".$keyword."%')";
		else
		{
			if($chkproName==1)
				$expression =$expression." and TenSP Like '%".$keyword."%'";
			if($chkDesc==2)	
				$expression =$expression." and   ThongTinSP Like '%".$keyword."%'";
		}
		}
		 $page =$page."&keyword=".$keyword."&chkproName=".$_REQUEST['chkproName']."	
	&chkDesc=".$_REQUEST['chkDesc'];
	}
	if(!empty($from_price))
	{
		$expression =$expression." and Gia >='".$from_price."'";
		$page =$page."&from_price=".$from_price;
	}
	if(!empty($to_price))
	{
		$expression =$expression." and Gia<='".$to_price."'";
		$page =$page."&to_price=".$to_price;
	}

?>
<?
$sql = "SELECT * FROM sanpham where " .$expression." Order By Gia DESC";
//echo($sql);	
$re=mysql_query($sql,$connect);

$totalpage =ceil(mysql_num_rows($re)/ $record_per_page);

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
//	die();
 $re=mysql_query($sql,$connect);
 ?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr class="title">
    <th  >ID</th>
    <th  >Ten San Pham </th>
    <th  >Gia</th>
    <th  > Bao Hanh </th>
    <th  >Action</th>
  </tr>
  <?php
  	while($rs=mysql_fetch_array($re))
	{
  ?>
  <tr>
    <td>&nbsp;<?php echo($rs['MaSP'])?></td>
    <td>&nbsp;
	<a href="index.php?go=prodetail&pid=<? echo($rs['MaSP'])?>" title="View detail...."><?php echo($rs['TenSP'])?></a>
	</td>
    <td align="right"><?php echo(number_format($rs['Gia']))?>(VND) </td>
    <td align="center">&nbsp;<?php echo($rs['ThoiGianBH'])?> <i>(thang)</i></td>
    <td align="center">
	<a href="index.php?go=prodetail&pid=<? echo($rs['MaSP'])?>">	
		Detail
	</a>
	</td>
  </tr>
  <?
  }
  ?>
  <tr>
  	<td colspan="5">
	<hr>
	</td>
  </tr>
  <tr>
      
	  <td colspan="5" align="center" valign="bottom" class="row"><?
		/*
		Vong lap de tao ra cac link lien ket den cac trang du lieu.
		Output: 	1 | 2 | 3 | 4 
		*/
		for($i =1; $i<=$totalpage;$i++)
		{
			if ($i==1){
				echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
			}else{
			if($pagenum==$i)			
				echo " | <a href='".$page."&page=".$i."'><B><font color=red><u>".$i."</u></font></B></a>";
			else
				echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
			}
		}
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		?></td>
    </tr>
</table>
<?
}
?>
</td>
</tr>
</table>
<p>&nbsp;</p>
<script>
function checksearch(frm)
{
	//price is numeric
	Valid=true;
	fprice=frm.from_price.value;
	tprice=frm.to_price.value;

	if(fprice!='')
	{
		if(isNaN(fprice))
		{
			alert('from price must be numeric.');
			frm.from_price.focus();
			Valid=false;
		}
		else
			if(eval(fprice)<0)
			{
				alert('from price must be numeric >=0.');
				frm.from_price.focus();
				Valid=false;
			}
	}
	if(tprice!='')
	{
		if(isNaN(tprice))
		{
			alert('to price must be numeric.');
			frm.to_price.focus();
			Valid=false;
		}
		else
			if(eval(tprice)<0)
			{
				alert('to price must be numeric >=0.');
				frm.to_price.focus();
				Valid=false;
			}
	}
	
	
	if((fprice!='') && (tprice!=''))
	{
		if(!isNaN(tprice) && !isNaN(fprice))
		{
			if(eval(tprice)<eval(fprice))
			{
				alert('toprice>=fromprice')
				Valid=false;
			}
		} 
	}
	return Valid;
}
</script>