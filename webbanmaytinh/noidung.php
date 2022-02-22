<?
$go=$_REQUEST['go'];
switch($go)
{
     case 'login':
	              require("log/login.php");
				  break;
	case 'logout':
	              require("log/logout.php");
				  break;
    case 'loginprocess':
				  require("log/loginprocess.php");
				  break;
    case 'register':
	              require("include/dangky.php");
				  break;
	case 'cuspass' :require("customer/thaypass.php");
	         break;
	case 'succesful':
	              require("include/dangkythanhcong.php");
				  break;
	case 'allpro':  require("include/Allsp.php");
	               break;			  
	case 'prolist':
	              require("include/danhsachsp.php");
	              break;
	 case 'prodetail':
	              require("include/chitietsp.php");
	              break;
	case 'shoppingcart':
			      require('Giohang/shoppingcart.php');			
			      break;
	case 'shoppingcart_send1':
			      require('Giohang/shoppingcart_send1.php');			
			      break;
	case 'shoppingcart_send2':
			      require('Giohang/shoppingcart_send2.php');			
			      break;
	case 'shoppingcart_send3':
			      require('Giohang/shoppingcart_send3.php');			
			      break;	
	 
	
  case 'shoppingcart_login':
			      require('Giohang/shoppingcart_login.php');			
			      break;
  case 'search':
			require('search/search.php');			
			break;
  case 'searchadvanced':
			require('search/searchadvanced.php');			
			break;
  case 'news':
			require("tintuc/danhsachtin.php");
			break;
  case 'tincongnghe':  require("tintuc/tincongnghe.php");
            break;
  case 'tinkhuyenmai': require("tintuc/salenews.php");
	        break;
  case 'tintuyendung' : require("tintuc/tintuyendung.php");
            break;
  case 'detailcongnghe': require("tintuc/detailcongnghe.php");
	        break;
  case 'detailkhuyenmai': require("tintuc/chitiet2.php");
            break;
  case 'detailtuyendung': require("tintuc/chitiet3.php");
            break;
  case 'newsdetail':
			require("tintuc/chitiettin.php");
			break;
  case 'lienhe' :
            require("include/lienhe.php");
			break;
 case 'home' : require("include/home.php");
             break;
 case 'changepass' :
			 require("customer/madeup.php");
			 break;
 case 'misspass': require("customer/lostpass.php");
			break;
 case 'changesuceesful': require("customer/changesucees.php");
		    break;
 case 'editinfo':
			require("customer/editinfo.php");			
			 break;	
			 case 'hehe':
			       require("include/hehe.php"); 
				   break;
  default :
	    require("include/home.php");
		break;
				  
				 
}
?>