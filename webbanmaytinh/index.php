<? require("connectdb.php");?>
<? session_start();?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Computers Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="Javascript/PopCalendar.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

</head>
<body>
<div id="main_container">
  <div id="header">
    <div class="top_right">
      <div class="languages">
        <div class="lang_text"></div>
        <a href="" class="lang"><img src="images/en.gif" alt="" border="0" /></a> <a href="" class="lang"><img src="images/de.gif" alt="" border="0" /></a> </div>
      <div class="big_banner"> <a href=""><img src="image/notebook_computer_banner.jpg" alt="" width="600" border="0" /></a> </div>
    </div>
    <div id="logo"><img src="image/TweakxpSZ.png" alt="" border="0" width="182" height="85" /></div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
        <li><a href="index.php?go=home" class="nav"> Trang Chủ </a></li>
        <li class="divider"></li>
        <li><a href="index.php?go=allpro" class="nav">Sản Phẩm</a></li>
        <li class="divider"></li>
        <li><a href="index.php?go=news" class="nav">Tin Tức</a></li>
        <li class="divider"></li>
        <li><a href="index.php?go=lienhe" class="nav">Liên Hệ</a></li>
        <li class="divider"></li>
        <li><a href="index.php?go=hehe" class="nav">Tư Vấn Kỹ Thuật</a></li>
        <li class="divider"></li>
        <li><a href="index.php?go=tintuyendung" class="nav">Tuyển Dụng</a></li>
        <li class="divider"></li>
        <li><a href="index.php?go=hehe" class="nav">Forum</a></li>
      
      </ul>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span></div>
    <div class="left_content">
      <div class="title_box">DANH MỤC SẢN PHẨM</div> 
      <ul class="left_menu">
         <div> <? require("left.php") ?></div>
      </ul>
      <div class="title_box">Danh Mục Tin Tức</div>
      <div class="border_box">
       <div><? require("tintuc/menunews.php")?></div>
      </div>
      <div class="title_box">Sản Phẩm Đặc Biệt</div>
	   <div class="border_box"><? require("include/spdacbiet.php")?></div>
      
	  <div class="border_box">
	  
      </div><div class="banner_adds"><a href="http://phucanh.vn"><img src="image/logo Phuc anh.jpg" alt="" border="0" weight="180" height="180"/></a></div>
    </div>
	 
    <!-- end of left content -->
    <div class="center_content">
      <div class="oferta"> <img src="image/01.jpg" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">San pham hot Asus Lamborghini </div>
          <div class="oferta_text"> 
            <p>CPU Core i7 3.0 GHz, Mainboard Gigabyte G90, Ram DDRIII 8G bus 1333, VGA ATI HD T9000 1GB DDR3, HDD 1 T, DVD Bruray, LED 15&quot; HD 16:9, vỏ làm băng sơi carbon sieu ben. Gia: 100 USD </p>
            <p>&nbsp; </p>
          </div>
          <a href="" class="prod_buy">Chi Tiet </a> </div>
      </div>
      
      <div class="center_title_bar">Danh sach san pham may tinh </div>
	   <div>
	  <? require("noidung.php")?></div>
	 </div>
	  
	 
	  
    <!-- end of center content -->
    <div class="right_content">
	  <div class="title_box">Thành viên đăng nhập</div>
	  <div class="border_box">
          <? require("menu1.php")?>
      </div>
      <div class="title_box">T&igrave;m Ki&#7871;m</div>
      <div class="border_box">
        <? require("search/searchleft.php")?>
      </div>
      <div class="shopping_cart">
        <div class="title_box">Giỏ Hàng Của Bạn</div>
        <div class="cart_details"><br/>
          <span class="border_cart"></span><span class="price"></span> </div>
        <div class="cart_icon"><a href="index.php?go=shoppingcart"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">Top 10 Sản Phẩm Mới</div>
      <div class="border_box">
         <? require("include/top10newsp.php") ?>
      </div>
      <div class="title_box">Top 10 Sản Phẩm Bán Chạy</div>
       <? require("include/top10sp.php")?>
      <div class="banner_adds"><img src="anh/images.jpg" alt="" width="180" height="180" border="0" /></div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Template name. All Rights Reserved 2008<br />
      <a href=""><img src="" alt="csscreme" title="" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="">Trangchu</a> <a href="">about</a> <a href="">so do website</a> <a href="">rss</a> <a href="">lien he</a> </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
