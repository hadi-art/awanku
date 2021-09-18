
<?php


function atten($studid)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studid'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}



?>





<div class="attendance" padding: 10px;">
<b>Attendance :</b>
<br />
<table border="1" style="border-collapse:collapse; width=30%">
	<tr>
		<td width="34" align="center"><strong>Bil</td>
		<td width="82" align="center"><strong>Nama</td>
		
	</tr>


<?php

	$id = $_GET["cid"];
	$today = date("Y/m/d");
	$q = mysql_query("select * from tbl_attendat where class_id='$id' and tarikh='$today'");
	$count=1;
	while($s = mysql_fetch_array($q))
	{

?>

<tr>
		<td align="center" style="font-size:small"><?php
		
		if ($count <18)
		echo $count
		 
		 
		 
		 ?>.</td>
		<?php 
		
		if ($count <18)
		{

		if($s["flag"] ==1)
		{
 		?>
 			<td style="color:green; font-size:small; "><?php echo atten($s["student_id"]); ?></td>
 
			 <?php
			 }//if flag 1
			 ?>
 
 			<?php 
 
 		if($s["flag"] ==0)
 		{
 		?>
 
 			<td width="17" style="color:red; font-size:small" ><?php echo atten($s["student_id"]); ?></td>
 
 		<?php
		 }//if flag o
 		?>
	
		<?php
		}//count <18
		?>

	</tr>



<?php
$count++;
} //while
?>
</table>
</div>