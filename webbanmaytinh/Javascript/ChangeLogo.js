// JavaScript Document
// JavaScript Document

function getXmlHttpRequestObject()
{
	if (window.XMLHttpRequest) 
	{
		return new XMLHttpRequest();
	} 
	else if(window.ActiveXObject) 
	{
		return new ActiveXObject("Microsoft.XMLHTTP");
	} 
	else 
	{
		alert("Trình duyệt của bạn không hỗ trợ AJax");
	}
}
 var xmlHttp

function ChangeLogo(str)
{
	xmlHttp=getXmlHttpRequestObject()
	var url="include/ChangeLogo.php";
	url=url+"?img="+str;
	//url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChangeLogo;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
} 

function stateChangeLogo() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState == 0)
	{ 
		document.getElementById("imgLogo").innerHTML=xmlHttp.responseText;
	}
}

