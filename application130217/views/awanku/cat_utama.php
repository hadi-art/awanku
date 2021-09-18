
<style>

html
{
	font-family:Arial;
	font-size:small;
}


.menu img{
opacity:0.8;
filter:alpha(opacity=40); /* For IE8 and earlier */
}
.menu img:hover{
opacity:1.0;
filter:alpha(opacity=100); /* For IE8 and earlier */
}

a:link {color:#000000;}      /* unvisited link */
a:visited {color:#000000;}  /* visited link */
a:hover {color:#000000;}  /* mouse over link */
a:active {color:#000000;}

</style>
<div class="topmenu" style=" min-height:10%;">



<!--
<ul id="nav">
	<?php
	foreach ($menu as $key => $value){
		echo "<li><a href=\"#\">$key</a>";
		echo "<ul>";
		for($i=1;$i<count($value);$i++){
			echo "<li><a href=\"#\">".$value[$i]."</a></li>";
		}
		echo "</ul>";
		echo  "</li>";
	}
	?>	
</ul>
-->

<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>

</div>

<?php
	$a = $_SESSION["log"]["username"];
	$l = mysql_query("select level_id from tbl_userinfo where username='$a'");
	list ($r) = mysql_fetch_row($l);
  ?>
<div class="content">
<div align="center">

<?php 
  if ($r=="1")
	 {	
	 ?>
<table border="0">
  
  <tr>
    <td align="center"><a href="<?php echo $site; ?>/awanku_control/category1"><img src="<?php echo $base; ?>images/awankublue.png" width="20%" height="20%"/></a></td>
    <td><span class="style1"><a href="<?php echo $site; ?>/awanku_control/category1" style="text-decoration: none; color:#333">HIGH IMPACT EDUCATION</a></span></td>
    </tr>
  <tr>
    <td align="center"><a href="<?php echo $site; ?>/awanku_control/category2"><img src="<?php echo $base; ?>images/awankured.png" width="20%" height="20%" /></a></td>
    <td><span class="style1"><a href="<?php echo $site; ?>/awanku_control/category2" style="text-decoration: none; color:#333">INTERGRATED SERVICES FACILITIES </a></span></td>
  </tr>
  <tr>
    <td align="center"><a href="<?php echo $site; ?>/awanku_control/category3"><img src="<?php echo $base; ?>images/awankukuning.png" width="20%" height="20%" /></a></td>
    <td><span class="style1"><a href="<?php echo $site; ?>/awanku_control/category3" style="text-decoration: none; color:#333">WELL INFORMED CULTURE & SECURE ENVIRONMENT</a></span></td>
    </tr>
    
</table>
<?php } 
	else {
		header("Location: $site/awanku_control/category1");
	}

?>
</div>	



<?php /*?>
  <div class="menu" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;"> 
    <p><a href="<?php echo $site; ?>/main/category1">1hight</a></p>
    <p> 2--- </p>
    <p>3--- </p>
  </div>
  <?php */?>

</div>
