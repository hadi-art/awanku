<SCRIPT LANGUAGE="JavaScript">


javascript:window.print();

</script>



<?php $id=$_GET["id"]; ?>
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

?>

<table border="1" style="height:auto; border-collapse:collapse;" cellspacing="5">
	
	<tr>
		<td>Date: <input name="date" type="date" value="<?php echo $rw['date'];?>"></td>
		<td>Time: <input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>"></td>
		<td>Class:
		
    	
		<?php

		
		
		$q="SELECT id, name FROM classlist_v2 where flag='1'";
		$name=mysql_query($q);
		
		echo "<select name = 'class_id' )'>";
		//echo "<option value ='null'></option>";
		while ($row = mysql_fetch_array($name)) {
		if($row['id']==$rw['class_id'])
		{
  			echo "<option value='" . $row['id'] ."' selected>" . $row['name'] ."</option>";
		}
		else
		{
			echo "<option value='" . $row['id'] ."'>" . $row['name'] ."</option>";
		}
  		}		
		echo "</select>";

		
		
		?>

		
		
		
		<td>Week :<select name = "week" >
		<?php
		for($i=1; $i<=52; $i++)
		{
			if($i==$rw['week'])
		{
  			echo "<option value='" . $i ."' selected>" . $i ."</option>";
		}
		else
		{
			echo "<option value='" . $i ."'>" . $i ."</option>";
		}
		}
		?>
		</select>
		
		
		Sem:
		
        <select name = "sem" >
		<?php
		for($i=1; $i<=2; $i++)
		{
			if($i==$rw['sem'])
		{
  			echo "<option value='" . $i ."' selected>" . $i ."</option>";
		}
		else
		{
			echo "<option value='" . $i ."'>" . $i ."</option>";
		}
		}
		?>
        </select>
		</td>
		
		<td></td>
		
	</tr>
	
	<tr>
		<td colspan="2"><b>Global Context :</b> <br><br />
		<label name="global" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['global_context']) ?></label></td>
		<td colspan="2"><b>Key &amp; Related Concepts :</b><br>
		  <br />
		<label name="concept" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['concept']) ?></label></td>
		<td rowspan="4"><p><b>21st Century Learning Skill
		<br>
		IB Learner Profile(s)</b><br>
		<?php

		

		$q="SELECT profile_id, profile FROM ktube_ibprofile";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$rw['ibprofile_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($title)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['profile_id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='ibprofile_id[]' value='" . $row['profile_id'] ."' checked>" . $row['profile'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='file' name='ibprofile_id[]' value='" . $row['profile_id'] ."' >" . $row['profile'] ." ";
		echo "<br>" ;
		}
		$count++;
		$y=0;
		
		}

		
		
		?>
		
		
		
		
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2"><b>Statement of Inquiry :</b><br />
		  <br>
		<label name="inquiry" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['inquiry']) ?></label></td>
		<td colspan="2"><b>Approaches to Learning  :</b><br />
		  <br>
		<label name="approaches" cols="50" rows="4" wrap="hard" ><?php echo $rw['approaches'] ?></label></td>
		
	</tr>
	
	<tr>
		<td><b>Learning Area(s) </b><br /></td>
		<td colspan="3"> 
		<label name="topic" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['topic']) ?></label></td>
		
	</tr>
	
	<tr>
		<td><b>Learning Outcome(s)</b></td>
		<td colspan="3"><label name="outcome" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['outcome']) ?></label></td>
	</tr>
	
	<tr>
		<td><b>Succeess Criteria</b></td>
		<td colspan="3"><label name="objective" cols="80" rows="5" wrap="hard" ><?php echo nl2br($rw['objective']) ?></label></td>
		<td rowspan="4"><b>Toolkit(s)<br /> IBMYP</b><br>
		
				<?php

		

		$q="SELECT toolkit_id, toolkit FROM ilearn_toolkit";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$rw['toolkit_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($title)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['toolkit_id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='toolkit_id[]' value='" . $row['toolkit_id'] ."' checked>" . $row['toolkit'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='file' name='toolkit_id[]' value='" . $row['toolkit_id'] ."' >" . $row['toolkit'] ." ";
		echo "<br>" ;
		}
		$count++;
		$y=0;
		
		}

		
		
		?>
		
		
		
		<br /><b>LEAP ED</b><br />
        <?php

		

		$q="SELECT toolkit_leap_id, toolkit_leap FROM ilearn_toolkit_leap";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$rw['toolkit_leap_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($title)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['toolkit_leap_id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='toolkit_leap[]' value='" . $row['toolkit_leap_id'] ."' checked>" . $row['toolkit_leap'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='file' name='toolkit_leap[]' value='" . $row['toolkit_leap_id'] ."' >" . $row['toolkit_leap'] ." ";
		echo "<br>" ;
		}
		$count++;
		$y=0;
		
		}

		
		
		?>
		</td>
		
	</tr>
	
	<tr>
		<td><b>Prior Knowledge</b></td>
		<td colspan="3"> 
		<label name="existing" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['existing_knowledge']) ?></label></td>
		
		
	</tr>
	
	<tr>
		<td><b>Learning Activities</b></td>
		<td colspan="3"> 
		<label name="activity" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['activity']) ?></label></td>
		
	</tr>
	

	
	<tr>
		<td><b>Resource / Teaching Aids</b></td>
		<td colspan="3"> 
		<label name="source" cols="80" rows="4" wrap="hard" ><?php echo nl2br($rw['source']) ?></label></td>	
	</tr>
	
	<tr>
		<td><b>Assessment / Reflection</b></td>
		<td><b>Who didn't meet the objective(s): <br></b>
		<label name="desc1" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['description1']) ?></label></td>
		<td><b>What would I change :</b><br>
		<label name="desc2" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['description2']) ?></label></td>
		<td><b>How did I differentiate :</b> <br>
		<label name="desc3" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['description3']) ?></label></td>
		<td><b>Notes :</b><br>
		<label name="remark" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['remarks']) ?></label></td>
	</tr>
	
	
	


</table>
</form>
</center>
