<SCRIPT LANGUAGE="JavaScript">


//javascript:window.print();

</script>



<?php $id=$_GET["id"];

function getnama($id,$var1,$table,$fk){
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}

 ?>
<br>
<br>
<br>
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

$qqq="SELECT * FROM ilearn_content  WHERE id='$id'";
$rr=mysql_query($qqq);
$rw=mysql_fetch_array($rr);
$rw['date'];

?>
<!--submit button-->

<center>
<form method="post" action="">

<?php

	date_default_timezone_set('Asia/Kuala_Lumpur'); 
	$today = date('d-m-Y');
	
?>
<input name="datePost" type="hidden" value="<?php print $today  ?>">

<?php

 	#$query="Select subject from ktube_subject where subject_id='$subject'";
	#$result=mysql_query($query);
	#$row=mysql_fetch_array($result);
	
?>
<?php 
$rw["subject_id"]=$sub_id;
$r="SELECT * FROM ktube_subject WHERE subject_id ='$sub_id'";
$r2=mysql_query($r);
$r3=mysql_fetch_array($r3);

$datee = $rw['date'];

?>

<div id="tablektube">

<table border="1" style="height:auto; border-collapse:collapse;" cellspacing="5">
	
	<tr>
		<td><b>Date:</b> <label name="date" cols="50" rows="4" wrap="hard" ><?php echo date('d-m-Y', strtotime($datee)); ?></label></td>

		<td><b>Time:</b> <input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>"></td>
		<td><b>Class:</b><?php echo getnama($rw["class_id"],"name","classlist_v2","id"); ?>
	
		<td><b>Week :</b><?php echo $rw['week']; ?>
		<br>
		
		<b>Sem	:</b><?php echo $rw['sem']; ?>
		</td>
	</tr>
	
	<tr>
	  <td><b>Global Context </b></td>
	  <td colspan="3"><?php echo nl2br($rw['global_context']) ?></td>
	  </tr>
	<tr>
		<td><b>Key &amp; Related Concepts </b><br><br /></td>
		<td colspan="3"><label name="concept" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['concept']) ?></label></td>
		</tr>
	
	<tr>
	  <td><b>Statement of Inquiry </b></td>
	  <td colspan="3"><?php echo nl2br($rw['inquiry']) ?></td>
	  </tr>
	<tr>
		<td><b>Approaches to Learning  </b><br />
		  <br></td>
		<td colspan="3"><label name="approaches" cols="50" rows="4" wrap="hard" ><?php echo $rw['approaches'] ?></label></td>
		
	</tr>
	
	<tr>
		<td><b>Learning Area(s)  </b><br /></td>
		<td colspan="3"> 
		<label name="topic" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['topic']) ?></label></td>
		
	</tr>
	
	<tr>
		<td><b>Learning Outcome(s) </b></td>
		<td colspan="3"><label name="outcome" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['outcome']) ?></label></td>
	</tr>
	
	<tr>
		<td><b>Succeess Criteria </b></td>
		<td colspan="3"><label name="objective" cols="80" rows="5" wrap="hard" ><?php echo nl2br($rw['objective']) ?></label></td>

		
	</tr>
	
</table>
</div>
</form>

</center>
