<html>

<head>
<script type="text/javascript">
function Ajax(){
var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
			xmlHttp = null;
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				

			}
			catch (e){
				alert("No AJAX!?");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById('content').innerHTML=xmlHttp.responseText;
		xmlHttp = null;
		setTimeout('Ajax()',1000);
		}
}
xmlHttp.open("GET","<?php echo $site."/studioclass_control/viewattendance?cid=$_GET[cid]"; ?>" );
xmlHttp.send(null);
}






window.onload=function(){
	setTimeout('Ajax()',1000);
}


</script>

</head>
<body>



<div id="content">

</div>

</body>
</html>

