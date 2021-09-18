<SCRIPT LANGUAGE="JavaScript">


//javascript:window.print();

</script>



<?php $id=$_GET["id"]; 

function getsub($uname)
{

	$q="SELECT subject_id FROM ilearn_content  WHERE id='$id'";
			list($sub_id)=mysql_fetch_row(mysql_query($q));
			
	return $sub_id;

}

function getnama($id,$var1,$table,$fk){
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}
	
		
$uid = $_SESSION["log"]["userid"];

if(isset($_POST['submit']))
{ 
	$date = date('Y-m-d H:i:s');
	echo '<script language="javascript">';
	echo 'alert("Lesson Planner Approved")';
	echo '</script>';

	$title_id = $_POST['id'];
	
		 $remark=mysql_real_escape_string($_POST['remark']);

	$query="update ilearn_content set approve_status='1', approve_remark='$remark',approve_by='$uid', approve_date='$date' where id='$title_id'";
	$result=mysql_query($query);
	
	
	//-------------------------------- ilearn_status -----------------------------------------------------------------------------
	
	$r="SELECT upload_id,week,sem,year from ilearn_content where id='$title_id'";
	list($uuid,$week,$sem,$year)=mysql_fetch_row(mysql_query($r));

	$sta="select approve from ilearn_status where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";
	list($approve)=mysql_fetch_row(mysql_query($sta));
	
			$rqstat="SELECT COUNT(*) FROM ilearn_content WHERE upload_id='$uuid' AND sem='$sem' AND week='$week' AND year='$year' AND flag='1' AND approve_status='1'";
			list($tot_app)=mysql_fetch_row(mysql_query($rqstat));
					
			$sql ="update ilearn_status set approve='$tot_app' where teacher_id ='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";	 
			 mysql_query($sql);

			
			echo"<script language='javascript'> 
					opener.location.reload(true);
					   self.close();
					</script>";

}
?>
<title>Details To Approve</title>

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

$datee = $rw['date'];

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
				$name = 'Form '.$form.'-'.$gset;
}
else {
	$q="SELECT name FROM classlist_v2 where id=$class_id";
	list($name)=mysql_fetch_row(mysql_query($q));
}

				$q="SELECT subject FROM ktube_subject WHERE subject_id ='$sub_id'";
				list($subject)=mysql_fetch_row(mysql_query($q));

$datee = $rw['date'];?>
<b><?php echo $subject;?></b><br><br>

<table border="1" style="height:auto; border-collapse:collapse;" cellspacing="5">
	
	<tr>
		<td><b>Date	: </b><label name="date" cols="50" rows="4" wrap="hard" ><?php echo date('d-m-Y', strtotime($datee)); ?></label></td>
		<td><b>Time	: </b><input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>" readonly="readonly"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>" readonly="readonly"></td>
		<td><b>Class	:</b><?php echo $name; ?>
		
		
		<td><b>Week	:	</b><?php echo $rw['week']; ?>

		<b>Sem	:</b>	<?php echo $rw['sem']; ?></td>
		
		<td><b>Attandance	:</b>	<?php echo $rw['atten']; ?> / <?php echo $rw['atten_all']; ?></td>
		
	</tr>
	
	<tr>
		<td colspan="2"><b><br />Global Context :</b> <br><br />
		<label name="global" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['global_context']) ?></label></td>
		<td colspan="2"><b>Key &amp; Related Concepts :</b><br />
		<label name="concept" cols="50" rows="4" wrap="hard" ><br /><?php echo nl2br($rw['concept']) ?></label></td>
		<td rowspan="8" valign="top"><br /><p><b>21st Century Learning Skill
		<br>
		IB Learner Profile(s)</b><br>
		<?php

		if($rw['ibprofile_id']!=""){
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
						echo "<br>";
						echo "&nbsp - ".$row['profile'] ." ";
						
						$y=1;
		
					}
					
					
				}
				
				$count++;
				$y=0;
				
				}
		} else { echo "<br>"."&nbsp - Non selection "; }
		?>
		
		
		<br /><br />
		<b>Cooperative Learning Structure / Toolkit(s) </b><br>
		
		<?php
		if($rw['toolkit_id']!=""){
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
						echo "<br>";
						echo "&nbsp - ".$row['toolkit'] ." ";
						$y=1;
		
					}
				}		
			
				$count++;
				$y=0;
				
				}
				} else { echo "<br>"."&nbsp - Non selection "; }
echo "<br>";
		?>
		
		
		
		<br /><?php /*?><textarea name="toolkit_others" cols="22" rows="2" wrap="hard" placeholder="Others" ><?php echo $rw['toolkit_others'] ?></textarea><?php */?><br /><br />
        
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
					echo "<br>";
					echo "&nbsp - ".$row['name'] ." ";
					
					$y=1;
	
				}		
			}
		$count++;
				$y=0;
				
			}
		?>
        
       <br />
        &nbsp;&nbsp;&nbsp;<?php /*?><textarea name="emk_others" cols="22" rows="2" wrap="hard" placeholder="Others" ><?php echo $rw['emk_others'] ?></textarea><?php */?>
        <br />
        <br />
        
        <?php	
	   
		}// end if subject
		?>
        
        
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2"><b><br />Statement of Inquiry :</b><br />
		  <br>
		<label name="inquiry" cols="50" rows="4" wrap="hard" ><?php echo nl2br($rw['inquiry']) ?></label></td>
		<td colspan="2"><b><br />Approaches to Learning  :</b><br />
		  <br>
		<label name="approaches" cols="50" rows="4" wrap="hard" ><?php echo $rw['approaches'] ?></label></td>
		
	</tr>
	
	<tr>
		<td><b>Learning Area(s) </b><br /></td>
		<td colspan="3" height="100%"> 
		<label name="topic" cols="80" rows="4" wrap="hard"><?php echo nl2br($rw['topic']) ?></label></td>
		
	</tr>
	
	<tr>
		<td><b>Learning Objective(s)</b></td>
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
		<td colspan="3"><b><br></b>
	    <label name="desc1" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['description1']) ?></label>		  <br></td>
		<td><b>Notes :</b><br>
	    <label name="remark" cols="30" rows="3" wrap="hard" ><?php echo nl2br($rw['remarks']) ?></label></td>
	</tr>
</table>
<br /><br />
<table border="0" style="height:auto; border-collapse:collapse;" cellspacing="5">
        <tr>
                <td><textarea name="remark" cols="100" rows="4" wrap="hard" placeholder="REMARK" ></textarea>
                </td>
                <td>
                <input name="id" type="hidden" value="<?php echo $id; ?>">
         		<input name="submit" type="submit" alt="submit" value="CHECK" style="height:60%">
               </td>             
        </tr>
</table>

</form>
</center>
