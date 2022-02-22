<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-size: 18px;
}
.style2 {color: #000000}
-->
</style>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
	<tr>
	  <td>
			<form name="frmsearch" method="post" action="index.php?go=search&page=1" onSubmit="return check999();"/>
			<span class="style2">Keyword:</span><br>
			<input type="text" name="keyword" size="20" class="input" title="Product name is ...">
            <input type="submit" name="btsearch" value="TìmKiếm"   />			
        </form>
	  </td>
	</tr>
	<tr>
		<td>
			<a href="?go=searchadvanced">
				<i>Tìm Kiếm Nâng Cao    *</i>			</a>		</td>
	</tr>
	
</table>
<script>
           function check999(){
		      if(frmsearch.keyword.value==''){
			  alert("Ban chua nhap tu khoa!!!");
			  return false;
			  }
		   }
</script>