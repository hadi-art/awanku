<script type="text/javascript" language="javascript"> 

function goBack() 
{
 window.history.back()
}

window.onkeyup = function (e) 
{
 if (e.keyCode == 27) window.history.back();
}
</script>

<script>
function goForward() {
    window.history.forward();
}
</script>



<?php
#print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<title>AWANKU</title>
	
	<style>
	
		body	{ width:100%; margin:0 auto; font-family:Calibri, sans-serif; }
		#nav{
			border:1px solid #ccc;
			border-width:1px 0;
			list-style:none;
			margin:0;
			padding:0;
			text-align:center;
			background-color:#000000;
		}
		#nav li{
			position:relative;
			display:inline;
			
		}
		#nav a{
			display:inline-block;
			padding:10px;
			color:#fff;
			
		}
		#nav ul{
			position:absolute;
			/*top:100%; Uncommenting this makes the dropdowns work in IE7 but looks a little worse in all other browsers. Your call. */
			left:-9999px;
			margin:0;
			padding:0;
			text-align:left;
		}
		#nav ul li{
			display:block;
		}
		#nav li:hover ul{
			left:0;
		}
		#nav li:hover a{
			text-decoration:none;
			background:#1B46D1;
		}
		#nav li:hover ul a{
			text-decoration:none;
			background:#000000;
		}
		#nav li:hover ul a:hover{
			text-decoration:underline;
			background:#1B46D1;
		}
		#nav ul a{
			white-space:nowrap;
			display:block;
			border-bottom:1px solid #ccc;
		}
		a{
			color:#c00;
			text-decoration:none;
			font-weight:bold;
		}
		a:hover{
			text-decoration:underline;
			background:#f1f1f1;
		}
		
	</style>
	
</head>

<body>

	<ul id="nav">
		<li><a style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/home.png" alt=""/>Awanku</a>
			<ul>
				<li><a href="<?php echo $site."/awanku_control/category1"?>">High Impact Education</a></li>
				<li><a href="<?php echo $site."/awanku_control/category2"?>">Integrated Services Facilities</a></li>
                <li><a href="<?php echo $site."/awanku_control/category3"?>">Well Informed Society</a></li>
			</ul>
		</li>
		<li><a onClick="goBack()" style="height:32px;line-height:32px; cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-redo.png" alt="Undo"/>&nbsp </a></li>
		<li><a onClick="goForward()" style="height:32px;line-height:32px; cursor:pointer;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/256base-rundo.png" alt="Redo"/>&nbsp </a></li>
		<li><a style="height:32px;line-height:32px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" alt=""/><?php echo $_SESSION["log"]["fullname"]; ?></a>
        <ul>
        <?php 
		 $a = $_SESSION["log"]["username"];
	$l = mysql_query("select level_id,class_id from tbl_userinfo where username='$a'");
	list ($r,$classid) = mysql_fetch_row($l);
	
  if ($r=="1")
	 {	
	 ?>
		<li><a href="<?php echo $site."/awanku_control/profail"?>">Profail</a></li>
        <?php
	 } 
	 
	
	if($r=="2") 
	 { 	 
  ?>
  		<li><a href="<?php echo $site."/awanku_control/profail_student"?>">Profail</a></li>
<?php
	 }?>
		<li><a href="<?php echo $site."/main_control/logout" ?>">Logout</a></li>
		</ul>
	</li>

	</ul>
	
	<p>&nbsp;</p>

	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-1856861-4");
		pageTracker._trackPageview();
		} catch(err) {}
	</script>
</body>
<br><br>
</html>