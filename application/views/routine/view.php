<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AWANKU</title>
<link rel="stylesheet" type="text/css" href="jquery.asmselect.css" />

<style type="text/css">

.TFtable
{
	width:60%; 
	border-collapse:collapse; 
}

.TFtable td
{ 
	padding:7px; border:#000000 1px solid;
}

table.one
{
border-style:ridge;
border-color:#98bf21;
} 

.container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }

body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<?php 
date_default_timezone_set('Asia/Kuala_Lumpur'); 

	$date = new DateTime();
	$datex =  $date->format('H:i:s d-m-Y');

?>


</head>

<body>
<center>
<?php
$sql="select * from daily_report where id='$_GET[id]'";
$rr=mysql_query($sql);
$rw=mysql_fetch_array($rr);

$datee=$rw["date"];
$datee = str_replace('/', '-', $datee);

$sql1="select * from tbl_userinfo where id='$rw[teacher_id]'";
$rr1=mysql_query($sql1);
$rw1=mysql_fetch_array($rr1);

?>

<div id="tablektube">
<center><br /><br />
Kolej Tunku Kurshiah, Bandar Enstek, Seremban<br /><br />
<b>LAPORAN GURU BERTUGAS HARIAN</b><br /><br />
</center>
<table border="0" style="height:auto; border-collapse:collapse;" width="60%" cellspacing="5">

		<tr>
		  <td width="14%"><b>Hari</b></td>
		  <td width="5%"><b>:</b></td>
			<td width="74%"><label name="day" cols="50" rows="4" wrap="hard" ><b><?php echo $rw['day'];?></b></label></td>
        </tr>
        <tr>
          <td><b>Tarikh</b></td>
          <td><b>:</b>
          <label name="date" cols="50" rows="4" wrap="hard" ></label></td>
			<td><label name="date" cols="50" rows="4" wrap="hard" ><b><?php echo date('d-m-Y', strtotime($datee));?></b></label></td>
        </tr>
		<tr>
		  <td><b>Guru Bertugas</b></td>
		  <td><b>:</b></td>
			<td><b><?php echo $rw1['fullname']; ?></b></td>
		</tr>
</table><br /><br />
<table border="0" style="height:auto; border-collapse:collapse;" width="60%" cellspacing="5">

		<tr>
        <td width="11%" style="background-color:#CCC; text-align:center"><strong>1.0</strong></td>
        	<td colspan="6" style="background-color:#CCC"><br />
       	    <strong>Perhimpunan Pagi </strong><br /><br /></td>
        </tr>
		<tr><br />
			<td>&nbsp;</td>
		  <td colspan="4"><br /><br /><?php echo nl2br($rw['assembly']) ?><br /><br /></td>
          <td width="1%">&nbsp;</td>
          <td width="20%" colspan="2" style="font-style:italic"><?php echo nl2br($rw['respon_a']) ?></td>
	  </tr>
        
        <tr>
            <td style="background-color:#CCC; text-align:center"><strong>2.0</strong></td>
        	<td colspan="6" style="background-color:#CCC"><br />
       	    <strong>Disiplin Pelajar </strong><br /><br /></td>
        </tr>
		<tr>
			<td>&nbsp;</td>
       	 	<td colspan="4"><br /><br /><?php echo nl2br($rw['disiplin']) ?><br /><br /></td>
            <td colspan="2" style="font-style:italic"><?php echo nl2br($rw['respon_d']) ?></td>

        </tr>
 
 		<tr>
	        <td style="background-color:#CCC; text-align:center"><strong>3.0</strong></td>
        	<td colspan="6" style="background-color:#CCC"><br />
       	    <strong>Aktiviti Sepanjang Hari </strong><br /><br /></td>
        </tr>
		<tr>
        	<td>&nbsp;</td>
           <td colspan="4"><br /><br /><?php echo nl2br($rw['activities']) ?><br /><br /></td>
          <td colspan="2" style="font-style:italic"><?php echo nl2br($rw['respon_ac']) ?></td>

        </tr>

		<tr>
	        <td style="background-color:#CCC; text-align:center"><strong>4.0</strong></td>
        	<td colspan="6" style="background-color:#CCC"><br />
       	    <strong>Kes Kecemasan </strong><br /><br /></td>
        </tr>
		<tr>
        <td>&nbsp;</td>
           <td colspan="4"><br /><br /><?php echo nl2br($rw['emergency']) ?><br /><br /></td>
          <td colspan="2" style="font-style:italic"><?php echo nl2br($rw['respon_e']) ?></td>
        </tr>

		<tr>
	        <td style="background-color:#CCC; text-align:center"><strong>5.0</strong></td>
        	<td colspan="6" style="background-color:#CCC"><br />
       	    <strong>Laporan Kerosakan </strong><br /><br /></td>
        </tr>
		<tr>
        <td>&nbsp;</td>
           <td colspan="4"><br /><br /><?php echo nl2br($rw['damage']) ?><br /><br /></td>
          <td colspan="2" style="font-style:italic"><?php echo nl2br($rw['respon_da']) ?></td>
        </tr>
        
        <tr>
 	        <td style="background-color:#CCC; text-align:center"><strong>6.0</strong></td>
       	<td colspan="6" style="background-color:#CCC"><br />
       	    <strong>Lain - Lain </strong><br /><br /></td>
        </tr>
		<tr>
        <td>&nbsp;</td>
           <td colspan="4"><br /><br /><?php echo nl2br($rw['etc']) ?><br /><br /></td>
          <td colspan="2" style="font-style:italic"><?php echo nl2br($rw['respon_etc']) ?></td>
        </tr>
        		<tr>
		  <td colspan="5">&nbsp;</td>
	  </tr>
      </table>
      <br /><br />
<table border="0" style="height:auto; border-collapse:collapse;" width="60%" cellspacing="5">
        <tr>
        <td colspan="6">
        Disediakan oleh,<br /><br />


<br /><br /><br />
(<?php echo $rw1['fullname']; ?>)
        
        </td>
        </tr>
        
</table>

</div>

</center>


</body>
</html>
