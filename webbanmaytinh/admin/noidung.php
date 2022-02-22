<?
	$go=$_REQUEST["go"];
	switch($go)
	{
		case 'xemthongtinhang': require("loaihang/ThongTinLoaiHang.php");	 break;
		case 'themloaihang': require("loaihang/themloaihang.php");	  break;
		case 'suathongtinloaihang' : require('loaihang/ThayDoiTTLoaiHang.php'); break;
		case 'themhang' : require("hang/themhang.php");    break;
		case 'danhsachhang': require("hang/ThonTinHang.php");   break;
		case 'doithongtinhang' : require("hang/ThayDoiTTHang.php"); break;
		case 'danhsachsp': require("sanpham/ThongTinSP.php");   break;
		case 'themsp'  :   require("sanpham/ThemSP.php"); break;
		case 'changesp' :  require("sanpham/ThayDoiTTSP.php"); break;
		case 'danhsachHD' : require("hoadon/danhsachhoadon.php");  break;
		case 'edithoadon'  : require("hoadon/edithoadonban.php");  break;
		case 'orderdetail' :  require("hoadon/chitiethoadonban.php");   break ;
		case 'history' : require("hoadon/orderhistory.php"); break;
		case 'pending' : require("hoadon/orderpending.php"); break;
		case 'process' : require("hoadon/orderprocessing.php"); break;
		case 'danhsachtintuc': require("tintuc/Thongtintintuc.php");  break;
	    case 'khachhang':  require("khachhang/ThongTinKhachHang.php");  break;
		case 'thaydoithongtinkh' : require("khachhang/ThayDoiTTKH.php"); break;
		case 'phanhoi' : require("feedback/Quanlyphanhoi.php");    break;
		case 'themtin' : require("tintuc/Themtintuc.php");     break;
		case 'Thaydoitttintuc':require("tintuc/Thaydoitttintuc.php");break;
		case 'ThayDoiTTSP':require ("sanpham/ThayDoiTTSP.php");break;
		case 'cauhoi'  : require("cauhoibimat/themcauhoi.php"); break;
		case 'danhsachcauhoi' : require("cauhoibimat/danhsachcauhoi.php"); break;
		default : require("start.php"); break;
	}
?>