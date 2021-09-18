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

/** page structure **/
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

##tablektubekeywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#tablektubekeywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#tablektubekeywords thead tr th { 
  font-weight: bold;
  padding: 5px 4px;
  
}
#tablektubekeywords thead tr th span { 
  
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#tablektubekeywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

/*#tablektubekeywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#tablektubekeywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}*/


#tablektubekeywords tbody tr { 
  color: #555;
}
#tablektubekeywords tbody tr td {
  text-align: center;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
}
</style>

<script>
$(function(){
  $('#keywords').tablesorter(); 
});

$(function() {
    $("textarea").allowTabChar();
});
</script>

<?php 
date_default_timezone_set('Asia/Kuala_Lumpur'); 

	$date = new DateTime();
	$datex =  $date->format('H:i:s d-m-Y');

	#$new_date = date('d-m-Y', strtotime('$_POST[date]'));

if(isset($_POST['submit'])) 
{
		$assembly = mysql_real_escape_string($_POST['assembly']);
		$r_a = mysql_real_escape_string($_POST['respon_a']);
		$disiplin = mysql_real_escape_string($_POST['disiplin']);
		$r_d = mysql_real_escape_string($_POST['respon_d']);
		$activities = mysql_real_escape_string($_POST['activities']);
		$r_ac = mysql_real_escape_string($_POST['respon_ac']);
		$emergency = mysql_real_escape_string($_POST['emergency']);
		$r_e = mysql_real_escape_string($_POST['respon_e']);
		$damage = mysql_real_escape_string($_POST['damage']);
		$r_da = mysql_real_escape_string($_POST['respon_da']);
		$etc = mysql_real_escape_string($_POST['etc']);
		$r_etc = mysql_real_escape_string($_POST['respon_etc']);

	$sql ="INSERT INTO daily_report set teacher_id ='$_POST[teacher_id]', day ='$_POST[day]', date='$_POST[date]', assembly ='$assembly', disiplin ='$disiplin', activities='$activities', emergency='$emergency', damage='$damage', etc='$etc', datetimestamp='$datex', respon_a='$r_a', respon_d='$r_d', respon_ac='$r_ac', respon_e='$r_e', respon_da='$r_da', respon_etc='$r_etc'";

#echo "INSERT INTO daily_report set teacher_id ='$_POST[teacher_id]', day ='$_POST[day]', date='$new_date', assembly ='$assembly', disiplin ='$disiplin', activities='$activities', emergency='$emergency', damage='$damage', etc='$etc', datetimestamp='$datex', respon_a='$r_a', respon_d='$r_d', respon_ac='$r_ac', respon_e='$r_e', respon_da='$r_da', respon_etc='$r_etc'";

#die();
if(mysql_query($sql))
	{
		?>
		<script type="text/Javascript">
			<!--
				alert("Submit Successful!");
				
			</script>
			
		<?php
	}
	else
	{
	?>
		<script type="text/Javascript">
			
				alert("Submit Unsuccessful!");
				
			</script>
			
	<?php
	}

	echo "<script>window.close();</script>";
}



?>


</head>

<body>
<center><br /><br />
 <div id="tablektube">
<form method="post" action="">
<h2>LAPORAN GURU BERTUGAS HARIAN</h2>
<br /><br />
<table border="0" style="height:auto; border-collapse:collapse;" cellspacing="5">

		<tr>
<?php /*?>        <td>Guru Bertugas : <?php echo $_SESSION["log"]["fullname"]; ?></td>
<?php */?>		<td width="248">Hari: <input name="day" type="day"></td>
		<td width="486">Tarikh: <input type="date" name="date"></td>
        </tr>

		<tr>
        	<td colspan="3"><br />1.0 Perhimpunan Pagi <br /><br />
        	  
        	  <textarea name="assembly" cols="100" rows="25" wrap="hard" ></textarea>
        	  <br /><br />
           <input type="text" width="100%" id="respon_a" name="respon_a" placeholder="Respon" /></td>
        </tr>
        
        <tr>
        	<td colspan="3"><br />2.0 Disiplin Pelajar <br /><br />
            <textarea name="disiplin" cols="100" rows="4" wrap="hard" ></textarea><br /><br />
           <input type="text" width="100%" id="respon_d" name="respon_d" placeholder="Respon" /></td>
        </tr>
 
 		<tr>
        	<td colspan="3"><br />3.0 Aktiviti Sepanjang Hari <br /><br />
            <textarea name="activities" cols="100" rows="4" wrap="hard" ></textarea><br /><br />
           <input type="text" width="100%" id="respon_ac" name="respon_ac" placeholder="Respon" /></td>
        </tr>

		<tr>
        	<td colspan="3"><br />4.0 Kes Kecemasan <br /><br />
            <textarea name="emergency" cols="100" rows="4" wrap="hard" ></textarea><br /><br />
           <input type="text" width="100%" id="respon_e" name="respon_e" placeholder="Respon" /></td>
        </tr>

		<tr>
        	<td colspan="3"><br />5.0 Laporan Kerosakan <br /><br />
            <textarea name="damage" cols="100" rows="4" wrap="hard" ></textarea><br /><br />
           <input type="text" width="100%" id="respon_da" name="respon_da" placeholder="Respon" /></td>
        </tr>
        
        <tr>
        	<td colspan="3"><br />6.0 Lain - Lain <br /><br />
            <textarea name="etc" cols="100" rows="4" wrap="hard" ></textarea><br /><br />
           <input type="text" width="100%" id="respon_etc" name="respon_etc" placeholder="Respon" /></td>
        </tr>
        
</table>

<input name="teacher_id" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>">
<input name="submit" type="submit" value="Submit">
</form>
</div>
</center>

<a href="<?php echo base_url('index.php/dailyreport_control/view'); ?>">VIEW</a>
</body>
</html>
