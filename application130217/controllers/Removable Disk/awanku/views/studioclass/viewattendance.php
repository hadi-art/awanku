
<?php


function atten($studid)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studid' order by fullname asc";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


	function gettotalflag($cid)
	{
		$harini = date("Y/m/d");
		$f=mysql_query("SELECT COUNT(*) FROM tbl_attendat WHERE class_id = '$_GET[cid]' AND flag='1' AND tarikh='$harini' ");
		list($m)=mysql_fetch_row($f); 		
		return $m;	
	}
	
?>





<div class="attendance">
<b style="color:#0033CC">Attendance : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <?php echo date("H:i:s"); ?></b>
<br />
<table border="1" style="border-collapse:collapse; width=50%" id="tablektube">
	<tr>
		<td width="34" align="center" style="font-family: 'Amarante', Tahoma, sans-serif; color:#0033CC"><strong>Bil</strong></td>
		<td width="82" align="center" style="font-family: 'Amarante', Tahoma, sans-serif; color:#0033CC"><strong>Nama</strong></td>
		
	    <td width="82" align="center" style="font-family: 'Amarante', Tahoma, sans-serif; color:#0033CC"><strong>Time</strong></td>
        	    <td width="82" align="center" style="font-family: 'Amarante', Tahoma, sans-serif; color:#0033CC"><strong>Manage</strong></td>

	</tr>


<?php

	$id = $_GET["cid"];
	$today = date("Y/m/d");
	$q = mysql_query("select a.*, b.fullname,b.id from tbl_attendat a, tbl_userinfo b where a.class_id='$id' and a.tarikh='$today' and a.student_id=b.id order by b.fullname asc");
	$count=1;
	while($s = mysql_fetch_array($q))
	{

?>

<tr>
		<td align="center" style="font-size:small"><?php echo $count?>.</td>
		<?php 
		

		if($s["flag"] ==1)
		{
 		?>
 			<td style="color:green; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;"><?php echo $s["fullname"]; ?></td>
 
			 <td style="color:green; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;">&nbsp;<?php echo $s["waktudatang"]; ?></td>
			 <?php
			 }//if flag 1
			 ?>
 
 			<?php 
 
 		if($s["flag"] ==0)
 		{
 		?>
 
 			<td style="color:red; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;" ><?php echo atten($s["student_id"]); ?></td>
			<td style="color:green; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;">&nbsp;</td>
 
 		<?php
		 }//if flag o
 		?>
        <td><center>
        <a href="<?php echo base_url('index.php/studioclass_control/manage?id='.$s["id"].''); ?>" title="<?php echo $s["fullname"]; ?>" target="_blank"><img src ="<?php echo $base; ?>/images/view.png" width = "30" height = "30"/></a> </center>
        </td>
	</tr>



<?php
$count++;
} //while

	$newcount = $count - 1;
	$totalflag= gettotalflag($cid);
	$avg = ($totalflag /  $newcount) * 100;
	$newaverage = number_format("$avg",1); 

?>
</table><br />

<b style="color:#0033CC"> Attendance today : <?php echo $newaverage;?> %</b>
</div>