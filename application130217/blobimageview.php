<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("awanku");
header("Content-type: image/jpeg");
  
//echo "sajshd";

//die();
 $q2="select img from fnbsublist where id='$_GET[id]'";
list($img)=mysql_fetch_row(mysql_query($q2));

echo $img;

?>

<?php //echo '<img src="data:image/jpeg;base64,' . base64_encode($img['img']) . '" width="90" height="90"/>'; ?>
 <?php 
  	if($img['img']=="")
	{
  ?>
    <img src="<?php echo $base?>images/no_image.png" width="200"/> 
	<br />
   <?php  
	}
/*	else
	{
 	 $data = $img['img'];
	 
	 $data2= array(
		'base' => $base,
		'site' => $site,
		'nama' => $nama
		);
   echo '<img src="data:image/jpeg;base64,' . base64_encode($img['img']) . '" width="70%" height="50%"/>' ;
   #$this->load->view('awanku/profile_picture',$data2);
	}*/
   ?>