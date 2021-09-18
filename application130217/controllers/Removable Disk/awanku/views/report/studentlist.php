
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../include/css.css" />
<script type="text/javascript" src="../include/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../include/jquery/jquery.validate.min.js"></script>
<script type="text/JavaScript" src="../include/js.js"></script>
<script type="text/javascript" src="../include/jquery/jquery.tablescroll.js"></script>

<script>
/*<![CDATA[*/

jQuery(document).ready(function($)
{
	$('#thetableclick').tableScroll({height:500});

	$('#thetable2').tableScroll();
});
</script>

<script>

function showC_class(str)
{
if (str=="")
  {
  document.getElementById("showClass").innerHTML=""; 
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showClass").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $site."/report_control/show_class"; ?>?q="+str,true);
xmlhttp.send();
}
</script>

<style>
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}
</style>
<script>

function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<title>AWANKU</title>
</head>
<?php

if($_POST){ 
//input ke kanan
echo "<pre>";
print_r($_POST);
echo "</pre>";

	$_SESSION["update"] = 1;
	$_SESSION["updateright"] = 1;
	#$_SESSION["purchase"] = 1;
	#echo "<script>alert('dsasad');</script>";
}
	?>
<?php
$disabled="";
$disabledx="";
$disabledy="";
$disabledinsert="";
?>

<body>

<div style="padding:5px; text-align:center; font-weight:bold;">Student List Name</div>
<form name="studentlist" action="" method="POST">
<table width="100%">
<tr>
<td width="80%">
		<select name="class" onchange="showC_class(this.value)">
          <option value="">-Choose Class-</option>
		  <?php 
		  $q="select * from classlist_v2 where flag=1";
		  $r=mysql_query($q);
		  
		  while($class=mysql_fetch_array($r)){ 
		  ?>
          <option value="<?php echo $class["id"]; ?>"><?php echo $class["name"]; ?></option>
		  <?php
		  }//while
		  ?>
      </select>

</td>
<td width="20%"><input type="submit" name="Submit" value="Insert to Selected Student >>" <?php echo $disabledinsert; ?>/></td>
</tr>
</table>
 
<br />
 <div class="showClass"></div>
<br />

<div align="right"><input type="submit" name="Submit" value="Insert to Selected Student >>" <?php echo $disabledinsert; ?>/></div>
</form>

<?php /* ?>echo $jq->RefreshPage("refresh.php","refresh"); <?php */?>
</body>
</html>