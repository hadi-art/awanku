<br />
<title>AWANKU</title>
<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}


<!--
.style1 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>



<?php
#print_r($_SESSION);
#print_r($this->session->all_userdata());
$fname=$_SESSION["log"]["username"];
$uuid = $_SESSION["log"]["userid"];

$image1 = array(
          'src' => 'images/Ktube.png',
          'alt' => 'K tube',
          'class' => 'post_images',
          'width' => '247',
          'height' => '154',          
		  'title' => 'K tube',
          'rel' => 'lightbox',
);

$image2 = array(
          'src' => 'images/mmlib.png',
          'alt' => 'Collaborative Multimedia Library',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Collaborative Multimedia Library',
          'rel' => 'lightbox',
);

$image3 = array(
		  'src' => 'images/1studioclass.png',
          'alt' => 'Studio classrooms',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Studio classrooms',
          'rel' => 'lightbox',
          
);

$image4 = array(
		
          'src' => 'images/lessonplan.png',
          'alt' => 'Well Maintained Facilities',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Lesson Plan',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image5 = array(
		'src' => 'images/lessonplanner.png',
          'alt' => 'Lesson Planner',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Lesson Planner',
          'rel' => 'lightbox',
		
);

$image6 = array(
          'src' => 'images/1assess.png',
          'alt' => 'E-assesment',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'E-assesment',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image7 = array(
          'src' => 'images/frog-vle.jpg',
          'alt' => 'Food And Beverages',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Food And Beverages(Order)',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image8 = array(
          'src' => 'images/google.jpg',
          'alt' => 'Google',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Google',
          'rel' => 'lightbox',
);

$image9 = array(
          'src' => 'images/youtube.png',
          'alt' => 'Youtube',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Youtube',
          'rel' => 'lightbox',
);

$image10 = array(
          'src' => 'images/2d_timemgt.jpg',
          'alt' => 'Time management',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Time management',
          'rel' => 'lightbox',
);

$image11 = array(
          'src' => 'images/infobroadcast.png',
          'alt' => 'Information Broadcast',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Information Broadcast',
          'rel' => 'lightbox',
);


?>
<style>
.menu img{
opacity:0.8;
filter:alpha(opacity=40); /* For IE8 and earlier */
}
.menu img:hover{
opacity:1.0;
filter:alpha(opacity=100); /* For IE8 and earlier */
}
</style>
<div class="topmenu">
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
</div>
<?php /*?><div class="content" align="right">

    <a href="<?php echo $site."/awanku_control/profail"?>" style="text-align:right; width:350px;"><img src="<?php echo $base."include/menubar/"; ?>menubar_files/css3menu1/service.png" width="35px" height="35px" alt=""/> <?php echo $_SESSION["log"]["fullname"]; ?></a>
    
     <a href="<?php echo $site."/main_control/logout"?>"  style="text-align:right; width:350px;">Logout</a>
     
     </div><?php */?>
     
<div class="content" align="center">

<div class="menu" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">

<table border="0">
  <tr>
    <td><img src="<?php echo $base; ?>images/awankublue.png" width="50" height="50"/></td>
    <td>
    <span class="style1">| HIGH IMPACT EDUCATION |</span></td>
	<td>
	  
</td>
  </tr>
</table>
<br />
<?php
	$a = $_SESSION["log"]["username"];
	$l = mysql_query("select level_id,class_id from tbl_userinfo where username='$a'");
	list ($r,$classid) = mysql_fetch_row($l);
 
	

  ?>

<table>
<tr>
<td>
 <?php 
  if ($r=="1")
	 {	if ($uuid=='7'){
	 ?>
        <a href="<?php echo "$site/lessonplanner_control/lessonPlannerTeacher"; ?>"><?php echo img($image5); ?></a>

     <?php } else { ?>
   <a href="<?php echo "$site/lessonplanner_control/plannerlesson_subject"; ?>"><?php echo img($image5); ?></a> <?php } ?>
  </td>
  <td>
 
  <a href="<?php echo "$site/ktube_control"; ?>"><?php echo img($image1); ?></a>
  </td>
  <?php /*?><td>
  
  <a href="<?php echo "$site/mmlib_control"; ?>"><?php echo img($image2); ?></a>
  
  <a href="<?php echo base_url('index.php/multimedialibs?klik=utama&title=&search=Cari+Tajuk'); ?>"><?php echo img($image4); ?></a></td><?php */?>

   <td><a href="<?php echo "$site/studioclass_control"; ?>"><?php echo img($image3); ?></a></td>
</tr>
<tr>
  <td><a href="<?php echo "$site/assesment_control"; ?>"><?php echo img($image6); ?></a></td>

  <td><a href="<?php echo "$site/report_control"; ?>"><?php echo img($image10); ?></a></td>

  <td><?php echo img($image11); ?></td>
    
 
</tr>



</tr>
<tr>
  <td>
  
  
  <a href="<?php echo "http://neb4096.1bestarinet.net"; ?>" target="_blank"><?php echo img($image7); ?></a></td>
     <td>
   <a href="<?php echo "https://www.google.com/"; ?>" target="_blank"><?php echo img($image8); ?></a>
  </td>
  <td><a href="<?php echo "https://www.youtube.com/"; ?>" target="_blank"><?php echo img($image9); ?></a></td>
 
</tr>





</table>
<?php
	 } 
	 
	
	if($r=="2") 
	 { 	 
  ?>
  <table>
<tr>
  <td><a href="<?php echo "$site/mmlib_control"; ?>"><?php echo img($image2); ?></a></td>

  <td><a href="<?php echo "$site/lessonplan_control/planlesson_subject/?cid=$classid"; ?>"><?php echo img($image4); ?></a></td>
 </tr>
</table>
<?php 
}
?>
</div>

</div>
</body>
</html>
