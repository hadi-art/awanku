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


				$q="SELECT subject_id FROM ilearn_content WHERE id=$id";
				list($sub_id)=mysql_fetch_row(mysql_query($q));

				$q="SELECT class_id FROM ilearn_content WHERE id=$id";
				list($class_id)=mysql_fetch_row(mysql_query($q));


	if ($sub_id == "12" || $sub_id == "14" || $sub_id == "16" || $sub_id == "18" || $sub_id == "10" || $sub_id == "8" || $sub_id == "19" || $sub_id == "7" || $sub_id == "6" || $sub_id == "20" || $sub_id == "4" || $sub_id == "37")
{
 				$q="SELECT * FROM class_set WHERE flag ='1' and subject_id=$sub_id and id=$class_id";
				$file=mysql_fetch_array(mysql_query($q));	
					
				$gset = $file["group_set"];
				$form = $file["form"];
				$class_name=$file["clas_name"];
				$name = 'Form '.$form.$class_name.'-'.$gset;

}
else {
	$q="SELECT name FROM classlist_v2 where id=$class_id";
	list($name)=mysql_fetch_row(mysql_query($q));
}


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


$datee = $rw['date'];

				$q="SELECT subject FROM ktube_subject WHERE subject_id ='$sub_id'";
				list($subject)=mysql_fetch_row(mysql_query($q));

$datee = $rw['date'];?>
<b><?php echo $subject;?></b><br><br>


<table border="1" style="height:auto; border-collapse:collapse;" cellspacing="5">
	
	<tr>
		<td><b>Date	: </b><label name="date" cols="50" rows="4" wrap="hard" ><?php echo date('d-m-Y', strtotime($datee)); ?></label></td>
</td>
		<td><b>Time	: </b><input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>"></td>
		<td><b>Class	:</b><?php echo $name; ?>
		
		
		<td><b>Week	:	</b><?php echo $rw['week']; ?>

		<b>Sem	:</b>	<?php echo $rw['sem']; ?></td>
		
		<td><b>Attandance	:</b>	<?php echo $rw['atten']; ?> / <?php echo $rw['atten_all']; ?></td>
		
	</tr>
	
	<tr>
		<td colspan="2"><b>Global Context :</b> <br><br />
		<label name="global" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['global_context']) ?></label></td>
		<td colspan="2"><b>Key &amp; Related Concepts :</b><br>
		  <br />
		<label name="concept" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['concept']) ?></label></td>
		<td rowspan="9"><br /><br /><p><b>21st Century Learning Skill
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
		
		
		<br /><br />
		
		<b>Toolkit(s) IBMYP</b><br>
		
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
	
		<br /> &nbsp;&nbsp;&nbsp;<textarea name="toolkit_others" cols="22" rows="2" wrap="hard" placeholder="Others" ><?php echo $rw['toolkit_others'] ?></textarea>
        
		<?php if ($sub_id=='5')
		{
			
		?>	<br /><br />
				<b>Toolkit(s) EMK	 <br />	</b>
		
        <?php

		
	
			$q="SELECT name, emk_id FROM ilearn_emk";
			$title=mysql_query($q);
			
			 
			$qq=explode(",",$rw['emk_id']); 
			$ct= count($qq)-1;
			$y=0;
		 
		
			$count=0;
			
			while ($row = mysql_fetch_array($title)) 
			{
		
		
			
			for($i=0; $i<$ct; $i++)
			{
				if($qq[$i]==$row['emk_id'])
				{
					echo "&nbsp";
					echo "<input type='checkbox' id='file' name='ilearn_emk[]' value='" . $row['emk_id'] ."' checked>" . $row['name'] ." ";
					echo "<br>" ;
					$y=1;
	
				}		
			}
		
		
			
			if($y==0)
			{
				
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='ilearn_emk[]' value='" . $row['emk_id'] ."' >" . $row['name'] ." ";
				echo "<br>" ;
				}
				$count++;
				$y=0;
				
			}
		?>
        <br />
        &nbsp;&nbsp;&nbsp;<textarea name="emk_others" cols="22" rows="2" wrap="hard" placeholder="Others" ><?php echo $rw['emk_others'] ?></textarea>
        <br />
        <br />
        <?php

	   		
		}// end if subject
		?>
		<br> <br></td>
		
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
		<td colspan="3"><b><br> <br></b>
		  <label name="desc1" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['description1']) ?></label> <br> <br> <br>
	    <br>		  <br>
	    <br> 
	    <br> <br></td>
	  </tr>
	
	
	


</table>
</form>
</center>
