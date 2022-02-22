 <html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<center>
<?
	$Thumuc = $_REQUEST["Thumuc"];
	$form = $_REQUEST["form"];
	$input = $_REQUEST["input"];
	$anh1 = $_REQUEST["anh1"];
	
	$d = $_FILES["f11"]["type"];
	$a = $_FILES["f11"]["tmp_name"];
	if ($_REQUEST["cmd"] =="Upload"){
		
		if (substr($d,0,5)=="anh"){
		move_uploaded_file($a,"$Thumuc".$_FILES["f11"]["name"]);
		echo "Upload thanh cong file <b>{$tenfile}</b>!";
		$error=1;
		} else {
		echo "Upload khong thanh cong!";
		$error=0;
		}
	} else {
?>

<form enctype="multipart/form-data" method="post">
 <div align="center">
   <h1>Upload file 
   </h1>
 </div>
 <table width="400" border="0" align="center" cellpadding="3" cellspacing="3">
    <tr>
      <td>Chon file 1: </td>
      <td><input name="f11" type="file" id="f11"></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><input name="cmd" type="submit" id="cmd" value="Upload">
      <input type="reset" name="Reset" value="Reset"></td>
    </tr>
  </table>
</form>
<? } ?>
<br>
<input type="button" value="Dong cua so" onClick="window.opener.document.<? echo $form?>.<? echo $input?>.value='<?  if ($error==1) echo $_FILES["f11"]["name"];?>'; 
window.opener.document.<? echo $anh1?>.src='<?  if ($error==1) echo $Thumuc.'/'.$_FILES["f11"]["name"];?>';
window.close();">
</body>
</html>
