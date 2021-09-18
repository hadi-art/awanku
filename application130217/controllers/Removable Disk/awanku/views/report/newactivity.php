<html>
<head>
<title>AWANKU</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}


</style>
<br>
<br>

<body>
<form method="post" action="">
<?php

	date_default_timezone_set('Asia/Kuala_Lumpur'); 
	$today = date('d/m/Y');
	
?>
<input name="datepost" type="hidden" value="<?php print $today  ?>">


<table style="width:auto" cellpadding="1" cellspacing="0">
<tr>
<td>Activity Name</td><td>:</td><td><input name="name" type="name"></td>
<td>&nbsp;</td>
<td>Start Date</td><td>:</td><td><input name="date" type="date"></td>
<td>&nbsp;</td>
<td>Venue</td><td>:</td><td><input name="venue" type="venue"></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td>Teacher In Charge</td><td>:</td>
<td>
<select name="idp">
          <option value="">-Choose Profile-</option>
		  <?php 
		  $q="select * from tbl_userinfo where level_id='1'";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  ?>
          <option value="<?php echo $dataprofile["id"]; ?>"><?php echo $dataprofile["fullname"]; ?></option>
		  <?php
		  }//while
		  ?>
      </select>
</td>
<td>&nbsp;</td>
<td>End Date</td><td>:</td><td><input name="date" type="date"></td>

</tr>


</table>

</form>


	<div class="bottominfo" style="clear:both;">
		<div class="bottominfoleft" style="float:left;padding: 5px; border-width: 1px;  border-style: solid; border-color: #000000; width:47%;">
	<iframe src="http://192.168.1.20/awanku/index.php/report_control/studentlist" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
		</div> 
        
		<div class="bottominfoblank" style="float:left;padding: 5px;"></div>
		<div class="bottominforight" style="float:right;padding: 5px; border-width: 1px;  border-style: solid; border-color: #000000; width:47%;">
		
        	<iframe src="selectedstudent" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
		</div>
	</div>


</body>
</html>
