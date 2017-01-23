	var date , hour , min , sec , time,day,year,dt;
        function clock() {
            date = new Date();
            hour = date.getHours();
            min = date.getMinutes();
            sec = date.getSeconds();
            time = hour + ':' + min + ':' + sec;
            document.getElementById("inner").innerHTML = time;
			document.getElementById("time").innerHTML = time;
        }
        setInterval("clock()" , 1000);
		function print_date()
		{
			//dt=new Date();
			//day=dt.getDay();
			document.getElementById("show").innerHTML=Date();
		}
	function find_name()
	{
		str=document.getElementById("pax").value;
		var card1="find.php?name="+str;
		xmlHttp=GetXmlHttpObject1(showval)
		xmlHttp.open("GET", card1 , true)
		xmlHttp.send(null)
	}
	
	function showval() 
	{ 
	
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById("areaHint").innerHTML=xmlHttp.responseText 
		} 
	}
	function find_date()
	{
		var str=document.getElementById("sdate").value;
		var str1=document.getElementById("edate").value;
		var card1="findthing.php?name="+str+"&edate="+str1;
		xmlHttp=GetXmlHttpObject1(showdate)
		xmlHttp.open("GET", card1 , true)
		xmlHttp.send(null)
	}
	
	function showdate() 
	{ 
	
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById("areaHint").innerHTML=xmlHttp.responseText 
		} 
	}
	function show_res(str)
	{
		var card1="../include/search_result.php?date="+str;
		xmlHttp=GetXmlHttpObject1(showres)
		xmlHttp.open("GET", card1 , true)
		xmlHttp.send(null)
	}
	function showres() 
	{ 
	
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			//alert(xmlHttp.responseText);
			document.getElementById("myres").innerHTML=xmlHttp.responseText 
		} 
	}
//	####################################################

function GetXmlHttpObject1(handler)
{ 
var objXmlHttp=null

if (navigator.userAgent.indexOf("Opera")>=0)
{
alert("This example doesn't work in Opera") 
return 
}
if (navigator.userAgent.indexOf("MSIE")>=0)
{ 
var strName="Msxml2.XMLHTTP"
if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
{
strName="Microsoft.XMLHTTP"
} 
try
{ 
objXmlHttp=new ActiveXObject(strName)
objXmlHttp.onreadystatechange=handler 
return objXmlHttp
} 
catch(e)
{ 
alert("Error. Scripting for ActiveX might be disabled") 
return 
} 
} 
if (navigator.userAgent.indexOf("Mozilla")>=0)
{
objXmlHttp=new XMLHttpRequest()
objXmlHttp.onload=handler
objXmlHttp.onerror=handler 
return objXmlHttp
}
} 
// ##################################################