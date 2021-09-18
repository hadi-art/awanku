
<style type="text/css">
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
$image1 = array(
          'src' => 'images/1a_ktube.jpg',
          'alt' => 'K tube',
          'class' => 'post_images',
          'width' => '247',
          'height' => '154',          
		  'title' => 'K tube',
          'rel' => 'lightbox',
);

$image4 = array(
          'src' => 'images/4.png',
          'alt' => 'Collaborative Multimedia Library',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Collaborative Multimedia Library',
          'rel' => 'lightbox',
);

$image5 = array(
          'src' => 'images/1c_lessonplanner.jpg',
          'alt' => 'Lesson Planner',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Lesson Planner',
          'rel' => 'lightbox',
);

$image6 = array(
          'src' => 'images/7.png',
          'alt' => 'Studio classrooms',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Studio classrooms',
          'rel' => 'lightbox',
);

$image9 = array(
          'src' => 'images/1c_lessonplan.jpg',
          'alt' => 'Well Maintained Facilities',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Lesson Plan',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image11 = array(
          'src' => 'images/e-learning_from_istock.jpg',
          'alt' => 'E-assesment',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'E-assesment',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image11x = array(
          'src' => 'images/11x.jpg',
          'alt' => 'Food And Beverages',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Food And Beverages(Order)',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image12 = array(
          'src' => 'images/3c_infobcast.jpg',
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



<table>
<tr>
  <td>
  <a href="<?php echo "$site/ktube_control"; ?>"><?php echo img($image1); ?></a>
  </td>
  <td>
  
  <a href="<?php echo "$site/mmlib_control"; ?>"><?php echo img($image4); ?></a>
  
  <?php /*?><a href="<?php echo base_url('index.php/multimedialibs?klik=utama&title=&search=Cari+Tajuk'); ?>"><?php echo img($image4); ?></a><?php */?></td>

   <td><a href=""><?php echo img($image6); ?></a></td>
</tr>
<tr>
  <td>
  
  
  <a href=""><?php echo img($image9); ?></a></td>
     <td>
   <a href="<?php echo "$site/lessonplanner_control"; ?>"><?php echo img($image5); ?></a>
  </td>
  <td><a href="<?php echo "$site/assesment_control"; ?>"><?php echo img($image11); ?></a></td>
 
</tr>
</table>
</div>

</div>
</body>
</html>
