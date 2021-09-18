
<?php


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