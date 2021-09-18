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

<?php


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
		
		$year = date('Y', strtotime($newDate));
		$month = date("m",strtotime($newDate));
		$day = date("d",strtotime($newDate));
		
		$classname = getclass($class);
		 
		$todaydate = date("Y-m-d");
		 
		$year2 = date('Y', strtotime($todaydate));
		$month2 = date("m",strtotime($todaydate));
		$day2 = date("d",strtotime($todaydate));
		 
		 echo $final = $classname . '_' . $year . $month . $day . '_'  . $year2 . $month2 . $day2;
			
		
 ?>

<div> 

	Nama Kelas : <?php echo getclass($class);?>	
	<br />
	Tarikh : <?php echo $newDate;?>

<br /><br />

<table width="80%" border="1" style="background-color:#FFFFFF; width:70%; border-collapse:collapse;">

<tr>
	<td width="5%" height="30" align="center"><b>BIL.</b></td>
	<td width="70%" align="center"><b>NAMA PELAJAR</b></td>
	<td width="25%" align="center"><b>KEHADIRAN</b></td>
</tr>
<?php
 
	
	$query = mysql_query("select student_id,flag from tbl_attendat where class_id='$class' and tarikh='$datebaru' ");
	$count=1;
	while($s = mysql_fetch_array($query))
	{
	

?>


		<tr>
			<td align="center"><?php echo $count; ?></td>
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
<br />Peratusan Kehadiran : <?php echo $newaverage;?> %
<br />
<?php
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=$final.xls");

?>
<br />


