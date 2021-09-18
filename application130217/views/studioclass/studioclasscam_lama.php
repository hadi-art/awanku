
<?php
function guru($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


function atten($studid)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studid'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


function alist($alist)
{
	$q="SELECT attendance_flag FROM tbl_userinfo WHERE id='$alist'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}

?>







<meta name="viewport" content="width=device-width, , initial-scale=1.0, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/css.css'); ?>" />
<link rel="stylesheet" type="text/css" href="include/css.css" />
<title>Untitled Document</title>

<div class="content">
<div class="title" style="float:left; width:40%">
<?php

		$id = $_GET["cid"];
		$q = mysql_query("select * from classlist_v2 where id='$id'");
		$data = mysql_fetch_array($q);
			
		
			
		
			

			

?>
<table>
<tr>
  <td>Class</td>
  <td>:</td>
  <td><?php echo $data["name"]; ?>
  </td>
</tr>
<tr>
  <td>Teacher</td>
  <td>:</td>
  <td><?php echo guru($data["guru_id"]); ?></td>  
</tr>

<tr>
  <td>Session time</td>
  <td>:</td>
<td><?php echo date("d/m/Y H:i:s"); ?></td>
</tr>
</table>
</div>


<div class="attendance" style="float:right; padding: 10px; width:40%;">
<strong>Attendance :
<br />
<br />
<table border="1" style="border-collapse:collapse;">
	<tr>
		<td width="34" align="center"><strong>Bil</td>
		<td width="82" align="center"><strong>Nama</td>
		<td align="center"><strong>Attendance</td>
	</tr>


<?php

	$id = $_GET["cid"];
	$today = date("Y/m/d");
	$q = mysql_query("select student_id from tbl_attendat where class_id='$id' and tarikh='$today'");
	$count=1;
	while($s = mysql_fetch_array($q))
	{

?>

	<tr>
		<td align="center" style="font-size:small"><?php echo $count ?>.</td>
		<td style="font-size:small"><?php echo atten($s["student_id"]); ?></td>
		<td style="font-size:small" align="center">
		<?php 

		if(alist($s["student_id"]) ==1)
		{
 		?>
 			Hadir
 
			 <?php
			 }?>
 
 			<?php 
 
 		if(alist($s["student_id"]) ==0)
 		{
 		?>
 
 			Tidak hadir
 
 		<?php
		 }
 		?>
 
		
		</td>





	</tr>



<?php
$count++;
} //while
?>
</table>
</div>

<div class="camera" style="float:left; padding: 10px; width:50%">
<?php /*?><img src="<?php echo $cam["cam1"]; ?>" height="300" width="550"/><?php */?>
<img src="<?php echo $data["cam_url"]; ?>" height="300" width=""></img>

</div>


</div>

