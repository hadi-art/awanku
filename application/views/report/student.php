<style>


html {
 font-family:tahoma;
}



</style>

<br />
<br />

<?php
function getname($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


function getclass($id)
{


$q="SELECT name FROM classlist_v2 WHERE id='$id'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

return $name;

}

?>





<div id='container' align="center" style="background-color:#CCCCFF; width:75%">
<br />
<br />
<form name="report" >
<table width="30%" height="127">
<tr>
		<td>Nama Pelajar</td>
		<td>:</td>
		<td height="26"><input type="text" name="pelajar" id="search" required></td>
</tr>

<tr>
		<td>Bulan</td>
		<td>:</td>
		<td><select id="month" name="month">
	<option value="0">Bulan</option>
	<option value="1">Januari</option>
	<option value="2">Februari</option>
	<option value="3">Mac</option>
	<option value="4">April</option>
	<option value="5">Mei</option>
	<option value="6">Jun</option>
	<option value="7">Julai</option>
	<option value="8">Ogos</option>
	<option value="9">September</option>
	<option value="10">Oktober</option>
	<option value="11">November</option>
	<option value="12">Disember</option>
</select></td>
</tr>

<tr>
		<td>Tahun</td>
		<td>:</td>
		<td><select id="year" name="year">
	<option value="0">Tahun</option>
	<option value="2014">2014</option>
	<option value="2015">2015</option>
	<option value="2016">2016</option>

	</select>
	</td>
</tr>

	<tr>
		<td height="50">&nbsp;</td>	
		<td></td>								
		<td align="right"><input class="button" type="submit" name="submit" value="Submit" id="submit">
		</td>
	</tr>

</table>
		
</form>

<?php if(isset($_GET['submit']))

{


		$pelajar = $_GET['pelajar'];
		$month = $_GET['month'];
		$year = $_GET['year'];
		


		$q="SELECT * FROM tbl_userinfo WHERE fullname LIKE '%$pelajar%' and level_id='2'";
		$r=mysql_query($q);
?>


<table width="50%">
<tr>
	<td width="11%"><b>Bulan</b></td>
	<td width="2%"><b>:</b></td>
	<td width="87%"><b><?php 
	
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
			echo "December";?></b></td>	
</tr>

<tr>
	<td><b>Tahun</b></td>
	<td><b>:</b></td>
	<td><b><?php echo $year;?></b></td>	
</tr>

</table>

<br />

<table align="center" border="1" style="background-color:#FFFFFF; width:50%; border-collapse:collapse;" cellpadding="3%" cellspacing="5%">
	<tr>
		<th align="center">List of Student</th>
	</tr>
<?php		
		while ($myrow = mysql_fetch_assoc($r))
		{
			
		?>	
			
			<tr>
				<td align="center"><a href="?search=<?php echo $myrow['id']; ?>&month=<?php echo $month?>&year=<?php echo $year?>" id="category" style="text-decoration:none; color:#000000"><?php echo $myrow['fullname']; ?></a></td>
			</tr>
			
		
<?php			
		}
	
 ?>
 	
</table>
<br />
<br />

<?php } ?>


<?php
if(isset($_GET['search']))
{ 


	$studentid=$_GET['search'];
	
	$month = $_GET['month'];
	$year = $_GET['year'];
	?>
<table width="60%">

<tr>
	<td><b>Nama Pelajar</b></td>
	<td><b>:</b></td>
	<td><b><?php echo getname($studentid);?></b></td>	
</tr>

<tr>
	<td width="21%"><b>Bulan</b></td>
	<td width="2%"><b>:</b></td>
	<td width="77%"><b><?php 

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
			echo "December";?></b></td>	
</tr>

<tr>
	<td><b>Tahun</b></td>
	<td><b>:</b></td>
	<td><b><?php echo $year;?></b></td>	
</tr>

</table>
<br />

<?php

		$q="SELECT * FROM tbl_attendat WHERE student_id ='$studentid' and  month(tarikh)='$month' and year(tarikh)='$year'";
		$r=mysql_query($q);
		$count=1;
		?>
<table border="1" style="background-color:#FFFFFF; width:60%; border-collapse:collapse;">
	<tr>
	<td width="30%" height="30" align="center"><b>HARI</b></td>
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
<BR />


<br />
<?php
	$studentid=$_GET['search'];
	
	$month = $_GET['month'];
	$year = $_GET['year'];
?>

<a href="<?php //echo base_url('index.php/report_control/studentresult?studentid='.$studentid.'&month='.$month.'&year='.$year.''); ?>">
	
Export to Excel</a>



<br />
<br />


<?php
}
?>

</div>
