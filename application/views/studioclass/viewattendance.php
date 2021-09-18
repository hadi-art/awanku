
<?php


function atten($studid)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studid' AND class_id='$cid' order by fullname asc";
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

<br />
<table border="1" style="border-collapse:collapse; width=50%" id="tablektube">
	<tr>
		<td width="34" align="center" style="font-family: 'Amarante', Tahoma, sans-serif; color:#0033CC"><strong>Bil</strong></td>
		<td width="82" align="center" style="font-family: 'Amarante', Tahoma, sans-serif; color:#0033CC"><strong>Nama</strong></td>
	</tr>


<?php

	$id = $_GET["cid"];
	$today = date("Y/m/d");
	$ccid = $_GET["cid"];
	$q="SELECT fullname FROM tbl_userinfo WHERE class_id='$ccid' AND flag='1' order by fullname asc";

$r=mysql_query($q);
	$count=1;

while($s=mysql_fetch_array($r)){

?>

<tr>
		<td align="center" style="font-size:small"><?php echo $count?>.</td>
		<td style="color:green; font-size:small;   font-family: 'Amarante', Tahoma, sans-serif;"><?php echo $s["fullname"]; ?></td>
 
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

<?php /*?><b style="color:#0033CC"> Attendance today : <?php echo $newaverage;?> %</b>
<?php */?></div>