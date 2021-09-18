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

	function gettotalflag($class)
	{
			$today = $_GET['date'];
		
		 $datebaru = str_replace('-', '/', $today); 
		//echo date('Y/m/d', strtotime($datebaru));
		
		
		 $harini = date("d-m-Y", strtotime($today));
		
		$f=mysql_query("SELECT COUNT(*) FROM tbl_attendat WHERE class_id='$class' AND flag='1' AND tarikh='$datebaru' ");
		list($m)=mysql_fetch_row($f); 		
		return $m;	
		
	}
?>





<div id='container' align="center" style="background-color:#CCCCFF; width:75%">
<br />
<br />
<form name="report">
<table width="276" height="127">
<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php

		
		
		$q="SELECT id, name FROM classlist_v2 where id='11' or id='12' or id='13' or id='14' or id='15'";
		$name=mysql_query($q);
		
		echo "<select name = 'class_id' )'>";
		echo "<option value ='null'></option>";
		while ($row = mysql_fetch_array($name)) {
		
  		echo "<option value='" . $row['id'] ."'>" . $row['name'] ."</option>";
  		}		
		echo "</select>";

		
		
		?>
		</td>
</tr>

<tr>
		<td>Tarikh</td>
		<td>:</td>
		<td><input name="date" type="date" ></td>
</tr>

	<tr>
		<td height="50">&nbsp;</td>	
		<td></td>								
		<td align="right"><input class="button" type="submit" name="submit" value="Submit">
		</td>
	</tr>

</table>
		
</form>


<?php if(isset($_GET['submit']))
{


//convert to word
#header("Content-type: application/vnd.ms-word");
#header("Content-Disposition: attachment;Filename=document_name.doc");


//convert to excell
#header("Content-type: application/vnd.ms-excel");
#header("Content-Disposition: attachment;Filename=document_name.xls");


		$class = $_GET['class_id'];
		$tarikh = $_GET['date'];
		
		$datebaru = str_replace('-', '/', $tarikh);
		//echo date('Y/m/d', strtotime($datebaru));
		
		
		$newDate = date("d-m-Y", strtotime($tarikh));
		

	
		
					
		
		
		
		
			
		
 ?>

<div> 
<table width="70%">
<tr>
	<td width="11%">Nama Kelas</td>
	<td width="2%">:</td>
	<td width="87%"><?php echo getclass($class);?></td>	
</tr>

<tr>
	<td>Tarikh</td>
	<td>:</td>
	<td><?php echo $newDate;?></td>	
</tr>

</table>

<table width="80%" border="1" cellspacing="5%" cellpadding="4%" style="background-color:#FFFFFF; width:70%; border-collapse:collapse;">

<tr>
	<td width="41" height="30" align="center"><b>BIL.</b></td>
	<td width="164" align="center"><b>NAMA PELAJAR</b></td>
	<td align="center"><b>KEHADIRAN</b></td>
</tr>
<?php
 
	
	$query = mysql_query("select student_id,flag from tbl_attendat where class_id='$class' and tarikh='$datebaru' ");
	$count=1;
	while($s = mysql_fetch_array($query))
	{
	

?>


		<tr>
			<td align="center"><?php echo $count; ?>.</td>
			<td><?php echo getname($s['student_id']); ?></td>
			<td align="center" style="color:red; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;">
			<?php 
			if($s["flag"] ==1)
		{
 		?>
			<a style="color:#009933"> H</a>
			
		<?php }
		
		if($s["flag"] ==0)
 		{
		?>
		
		<a style="color:#FF0000"> TH</a>
		
		<?php }?>	
			
			
			
			</td>
		</tr>
	

<?php

$count++; }
$newcount = $count - 1;
$totalflag= gettotalflag($class);
			$avg = ($totalflag /  $newcount) * 100;
			$newaverage = number_format("$avg",1);
?>
</table>

<br />
Peratusan Kehadiran : <?php echo $newaverage;?> %
<br />
<br />
<?php
		$class = $_GET['class_id']; 
		$tarikh = $_GET['date'];
?>
<a href="<?php echo base_url('index.php/report_control/classroomresult?class_id='.$class.'&date='.$tarikh.''); ?>">
	
Export to Excel</a>

<?php
}
?>


<br />
<br />
<br />

</div>
</div> <!-- container -->
