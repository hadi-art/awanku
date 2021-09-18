<?php
function getname($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


function getic($id)
{
	$q="SELECT noic FROM tbl_userinfo WHERE id='$id'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}
?>

<?php	

	$studentid=$_GET['studentid'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	?>



	<b>Nama Pelajar : <?php echo getname($studentid);?>	
	<br>
	Bulan : <?php 

		if ($month == '1')
			echo "January";
		
		if ($month == '2')
			echo "February";
		
		if ($month == '3')
			echo "March";
			
		if ($month == '4')
			echo "April";
		
		if ($month == '5')
			echo "May";
		
		if ($month == '6')
			echo "June";
		
		if ($month == '7')
			echo "July";
		
		if ($month == '8')
			echo "August";
			
		if ($month == '9')
			echo "September";

		if ($month == '10')
			echo "October";
		
		if ($month == '11')
			echo "November";
		
		if ($month == '12')
			echo "December";?>
	<br>
	
	Tahun : <?php echo $year;?></b>
<br />
<br />
<?php

		$q="SELECT * FROM tbl_attendat WHERE student_id ='$studentid' and  month(tarikh)='$month' and year(tarikh)='$year'";
		$r=mysql_query($q);
		$count=1;
		?>
<table border="1" style="background-color:#FFFFFF; width:60%; border-collapse:collapse;">
	<tr>
	<td width="30%" height="30" align="center"><b>TARIKH</b></td>
	<td width="70%" align="center"><b>KEHADIRAN</b></td>
	</tr>
<?php				
		while ($row = mysql_fetch_assoc($r))
		{		
		
		$date = $row['tarikh'];
		$day = date('d', strtotime($date));
?>
		<tr>
		
		<td align="center"><?php $date = $row['tarikh'];
		echo $day = date('d', strtotime($date));
		
		echo " ";
		if ($month == '1')
			echo "January";
		
		if ($month == '2')
			echo "February";
		
		if ($month == '3')
			echo "March";
			
		if ($month == '4')
			echo "April";
		
		if ($month == '5')
			echo "May";
		
		if ($month == '6')
			echo "June";
		
		if ($month == '7')
			echo "July";
		
		if ($month == '8')
			echo "August";
			
		if ($month == '9')
			echo "September";

		if ($month == '10')
			echo "October";
		
		if ($month == '11')
			echo "November";
		
		if ($month == '12')
			echo "December";

		?></td>
		
		<td align="center" style="color:red; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;">
			<?php 
		if($row["flag"] ==1)
		{
 		?>
			<a style="color:#009933"> Hadir</a>
			
		<?php }
		
		if($row["flag"] ==0)
 		{
		?>
		
		<a style="color:#FF0000"> Tak Hadir</a>
		
		<?php }?>	
			
			
			
			</td>
		
		</tr>
		
<?php	
	}	
?>

</table>

<?php

		$studentid=$_GET['studentid'];
		$month = $_GET['month'];
		$year = $_GET['year'];
		
		$studentic = getic($studentid);
		
		$string = str_replace('-', '', $studentic);

	 
		$todaydate = date("Y-m-d");
		 
		$year2 = date('Y', strtotime($todaydate));
		$month2 = date("m",strtotime($todaydate));
		$day2 = date("d",strtotime($todaydate));
		 
		 $final = $string . '_' . $year . $month . '_'  . $year2 . $month2 . $day2;
	
	
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=$final.xls");

?>