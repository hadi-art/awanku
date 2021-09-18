
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

$image1 = array(
          'src' => 'images/2a_wellmaintain.png',
          'alt' => 'Well maintained facilities',
          'class' => 'post_images',
          'width' => '247',
          'height' => '154',          
		  'title' => 'Well maintained facilities',
          'rel' => 'lightbox',
);

$image2 = array(
          'src' => 'images/2b_assetmgt.jpg',
          'alt' => 'Asset management',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Asset management',
          'rel' => 'lightbox',
);

$image3 = array(
          'src' => 'images/2e_mtgorg.jpg',
          'alt' => 'Cafe',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Cafe',
          'rel' => 'lightbox',
);

$image4 = array(
          'src' => 'images/2d_timemgt.jpg',
          'alt' => 'Time management',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Time management',
          'rel' => 'lightbox',
);

$image5 = array(
          'src' => 'images/2e_mtgorg.jpg',
          'alt' => 'Meeting Organizer',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Meeting Organizer',
          'rel' => 'lightbox',
);

$image6 = array(
          'src' => 'images/2c_cafe.jpg',
          'alt' => 'cafe',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'cafe',
          'rel' => 'lightbox',
);

$image7 = array(
          'src' => 'images/1f_studiomobile.jpg',
          'alt' => 'Studio Mobile',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Studio Mobile',
          'rel' => 'lightbox',
);

$image8 = array(
          'src' => 'images/8.png',
          'alt' => 'Always Connected Communications',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Always Connected Communications',
          'rel' => 'lightbox',
);

$image9 = array(
          'src' => 'images/9.png',
          'alt' => 'Well Maintained Facilities',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Well Maintained Facilities',
          'rel' => 'lightbox',
		  'class' => 'imghover imghoverx',
);

$image11 = array(
          'src' => 'images/11.jpg',
          'alt' => 'Food And Beverages',
          'class' => 'post_images',          
		  'width' => '247',
          'height' => '154',
		  'title' => 'Food And Beverages(Cafe)',
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

<div class="content">

<div>

</div>



<div class="menu" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
<?php
$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );

#echo anchor_popup('news/local/123', 'Click Me!', $atts);
?>
<div align="center"> 
<table border="0">
  <tr>
    <td><img src="<?php echo $base; ?>images/awankured.png" width="50" height="50"/></td>
    <td>
    <span class="style1">| INTERGRATED SERVICES FACILITIES |</span></td>
	<td>
	  
</td>
  </tr>
</table>

</div> 

<table>
<tr>
  <td><?php echo img($image1); ?></td>
  <td><?php echo img($image2); ?></td>
  <td><a href="<?php echo base_url('index.php/fnb_controller'); ?>"><?php echo img($image3); ?></a></td>
</tr>
<tr>
  <td><?php echo img($image4); ?></td>
  <td><a href="<?php echo base_url('index.php/fnbcafe_controller'); ?>"><?php echo img($image6); ?></a></td>
  <td><a href="<?php echo base_url('index.php/fnbcafe_controller'); ?>"></a></td>
</tr>
</table>
</div>

</div>
</body>
</html>
