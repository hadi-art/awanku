<div style="width:auto; background:#FFFFFF">

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


if(isset($_POST['update'])) 
{
#echo "<pre>";

#print_r($_POST);

	$bilcontent=count($_POST["file"]);
	$idcontent="";
	for($a=0;$a<$bilcontent;$a++)
	{
		$idcontent.=$_POST["file"][$a].",";
	}


	$biltitle=count($_POST["quiz"]);
	$idtitle="";
	for($a=0;$a<$biltitle;$a++)
	{
		$idtitle.=$_POST["quiz"][$a].",";
	}



	$bil_ibprofile=count($_POST["ibprofile_id"]);
	$id_ibprofile="";
	for($a=0;$a<$bil_ibprofile;$a++)
	{
		$id_ibprofile.=$_POST["ibprofile_id"][$a].",";
	}
	

	$bil_toolkit=count($_POST["toolkit_id"]);
	$id_toolkit="";
	for($a=0;$a<$bil_toolkit;$a++)
	{
		$id_toolkit.=$_POST["toolkit_id"][$a].",";
	}

	$bil_emk=count($_POST["ilearn_emk"]);
		$emk_id="";
		for($a=0;$a<$bil_emk;$a++)
		{
		$emk_id.=$_POST["ilearn_emk"][$a].",";
		}


	 $global = mysql_real_escape_string($_POST['global']);
		 $global2 = strip_tags($global);
		
		 $concept = mysql_real_escape_string($_POST['concept']);
		 $concept2 = strip_tags($concept);
		
		 $inquiry = mysql_real_escape_string($_POST['inquiry']);
		 $inquiry2 = strip_tags($inquiry);
		
		 $approaches = mysql_real_escape_string($_POST['approaches']);
		 $approaches2 = strip_tags($approaches);
		
		 $existing = mysql_real_escape_string($_POST['existing']);
		 $existing2 = strip_tags($existing);
		
		 $activity = mysql_real_escape_string($_POST['activity']);
		 $activity2 = strip_tags($activity);
		
		 $source = mysql_real_escape_string($_POST['source']);
		 $source2 = strip_tags($source);
		
		 $desc1 = mysql_real_escape_string($_POST['desc1']);
		 $desc1_2 = strip_tags($desc1);
		
		 $desc2 = mysql_real_escape_string($_POST['desc2']);
		 $desc2_2 = strip_tags($desc2);
		
		 $desc3 = mysql_real_escape_string($_POST['desc3']);
		 $desc3_2 = strip_tags($desc3);
		
		 $topic = mysql_real_escape_string($_POST['topic']);
		 $topic2 = strip_tags($topic);
		
		 $objective = mysql_real_escape_string($_POST['objective']);
		 $objective2 = strip_tags($objective);
		
		 $outcome = mysql_real_escape_string($_POST['outcome']);
		 $outcome2 = strip_tags($outcome);
		
		 $remark=mysql_real_escape_string($_POST['remark']);
		 $remark2 = strip_tags($remark);
	 
	 
	$dateStr = '$_POST[date]';
	$dateArray = date_parse_from_format('Y-m-d', $dateStr);
	$yee=date( 'Y', strtotime( $_POST[date] ) );;
	$toolkit_others = mysql_real_escape_string($_POST['toolkit_others']);
	
	$emk_others = mysql_real_escape_string($_POST['emk_others']);

		$update="UPDATE ilearn_content SET date='$_POST[date]',
		Ftime='$_POST[Ftime]',
		Ttime='$_POST[Ttime]',
		class_id='$_POST[class_id]',
		week='$_POST[week]',
		year='$yee',
		sem='$_POST[sem]',
		global_context='$global2',
		concept='$concept2',
		inquiry='$inquiry2',
		approaches='$approaches2',
		topic='$topic2',
		outcome='$outcome2',
		objective='$objective2',
		existing_knowledge='$existing2',
		activity='$activity2',
		source='$source2',
		description1='$desc1_2',
		description2='$desc2_2',
		description3='$desc3_2',
		remarks='$remark2',
		file_id='$idcontent',
		quiz_id='$idtitle',
		ibprofile_id='$id_ibprofile',
		toolkit_id='$id_toolkit',
		toolkit_leap_id='$id_toolkit_leap', 
		toolkit_others='$toolkit_others',
		emk_id='$emk_id',
		emk_others = '$emk_others',
		atten='$_POST[atten]',
		atten_all='$_POST[atten_all]'
		WHERE id='$_POST[id]'";
		//die();
		mysql_query($update);
		?>
			<script type="text/Javascript">
			
				alert("Edit Successful!");
				
			</script>	
		<?php	
			
					echo"<script language='javascript'> 
					opener.location.reload(true);
					   self.close();
					</script>";

}//if isset

if(isset($_POST['submit'])) 
{		

$bilcontent=count($_POST["file"]);
	$idcontent="";
	for($a=0;$a<$bilcontent;$a++)
	{
		$idcontent.=$_POST["file"][$a].",";
	}


	$biltitle=count($_POST["quiz"]);
	$idtitle="";
	for($a=0;$a<$biltitle;$a++)
	{
		$idtitle.=$_POST["quiz"][$a].",";
	}



	$bil_ibprofile=count($_POST["ibprofile_id"]);
	$id_ibprofile="";
	for($a=0;$a<$bil_ibprofile;$a++)
	{
		$id_ibprofile.=$_POST["ibprofile_id"][$a].",";
	}
	

	$bil_toolkit=count($_POST["toolkit_id"]);
	$id_toolkit="";
	for($a=0;$a<$bil_toolkit;$a++)
	{
		$id_toolkit.=$_POST["toolkit_id"][$a].",";
	}

	$bil_emk=count($_POST["ilearn_emk"]);
		$emk_id="";
		for($a=0;$a<$bil_emk;$a++)
		{
		$emk_id.=$_POST["ilearn_emk"][$a].",";
		}



	 $global = mysql_real_escape_string($_POST['global']);
		 $global2 = strip_tags($global);
		
		 $concept = mysql_real_escape_string($_POST['concept']);
		 $concept2 = strip_tags($concept);
		
		 $inquiry = mysql_real_escape_string($_POST['inquiry']);
		 $inquiry2 = strip_tags($inquiry);
		
		 $approaches = mysql_real_escape_string($_POST['approaches']);
		 $approaches2 = strip_tags($approaches);
		
		 $existing = mysql_real_escape_string($_POST['existing']);
		 $existing2 = strip_tags($existing);
		
		 $activity = mysql_real_escape_string($_POST['activity']);
		 $activity2 = strip_tags($activity);
		
		 $source = mysql_real_escape_string($_POST['source']);
		 $source2 = strip_tags($source);
		
		 $desc1 = mysql_real_escape_string($_POST['desc1']);
		 $desc1_2 = strip_tags($desc1);
		
		 $desc2 = mysql_real_escape_string($_POST['desc2']);
		 $desc2_2 = strip_tags($desc2);
		
		 $desc3 = mysql_real_escape_string($_POST['desc3']);
		 $desc3_2 = strip_tags($desc3);
		
		 $topic = mysql_real_escape_string($_POST['topic']);
		 $topic2 = strip_tags($topic);
		
		 $objective = mysql_real_escape_string($_POST['objective']);
		 $objective2 = strip_tags($objective);
		
		 $outcome = mysql_real_escape_string($_POST['outcome']);
		 $outcome2 = strip_tags($outcome);
		
		 $remark=mysql_real_escape_string($_POST['remark']);
		 $remark2 = strip_tags($remark);
	 
	 
	 
	$toolkit_others = mysql_real_escape_string($_POST['toolkit_others']);
	
	$emk_others = mysql_real_escape_string($_POST['emk_others']);



	if ($subject== 1 or $subject == 10 or $subject == 12 or $subject == 14 or $subject == 16 or $subject == 18)
	{
		#$approve_by = '26';
		$req1='699';
		$req2='22';
		$req3='26';
		//bahasa
		
	}
	
	else if ($subject== 8 or $subject == 5 or $subject == 6 or $subject == 7 or $subject == 19 )
	{
		#$approve_by = '39';
		$req1='699';
		$req2='22';
		$req3='39';

		//sc
	}
	
	else if ($subject== 9 or $subject == 2 or $subject == 3 or $subject == 15 or $subject == 11 or $subject == 13 or $subject == 17)
	{
		#$approve_by = '23';
		$req1='699';
		$req2='22';
		$req3='23';
		
		//kemanusiaan
		
	}
	
	else if ($subject== 4 or $subject == 23 or $subject == 20)
	{
		#$approve_by = '25';
		$req1='699';
		$req2='22';
		$req3='25';

		//vocasional
		
	}
	
	else if ($subject== 24 or $subject == 25 or $subject == 26 or $subject == 27 or $subject == 28 or $subject == 29 or $subject == 30 or $subject == 31 or $subject == 32 or $subject == 33 or $subject == 34 or $subject == 35)
	{
		#$approve_by = '76';
		$req1='699';
		$req2='22';
		$req3='76';

		//ib
		
	}


		$sql="UPDATE ilearn_content SET date='$_POST[date]',
		Ftime='$_POST[Ftime]',
		Ttime='$_POST[Ttime]',
		class_id='$_POST[class_id]',
		week='$_POST[week]',
		sem='$_POST[sem]',
		global_context='$global2',
		concept='$concept2',
		inquiry='$inquiry2',
		approaches='$approaches2',
		topic='$topic2',
		outcome='$outcome2',
		objective='$objective2',
		existing_knowledge='$existing2',
		activity='$activity2',
		source='$source2',
		description1='$desc1_2',
		description2='$desc2_2',
		description3='$desc3_2',
		remarks='$remark2',
		file_id='$idcontent',
		quiz_id='$idtitle',
		ibprofile_id='$id_ibprofile',
		toolkit_id='$id_toolkit',
		toolkit_leap_id='$id_toolkit_leap',
		toolkit_others='$toolkit_others', 
		emk_id='$emk_id',
		emk_others = '$emk_others',
		atten='$_POST[atten]',
		atten_all='$_POST[atten_all]', 
		req_app_1='$req1', 
		req_app_2='$req2', 
		req_app_3='$req3', 
		approve_by='$approve_by',
		approve_status='3'
		WHERE id='$_POST[id]'";
		
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
			
				alert("Submit Unseccessful!");
				
			</script>
			
	<?php
	}
	
	//------------------------------------------------------------  ilearn_status  -------------------------------------------------------------
		$uuid = $_SESSION["log"]["userid"];
		
		 $stat = "select teacher_id from ilearn_status where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$_POST[year]'";
		 list($tid)=mysql_fetch_row(mysql_query($stat));
	 
		 if($tid==''){
			 $sql ="INSERT INTO ilearn_status set teacher_id ='$uuid', approve='', week='$week', sem='$sem', year='$_POST[year]', submit='1', waiting='1'";	 
			 mysql_query($sql);}
		 	else {
				/*$q = "select submit, waiting from ilearn_status where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$_POST[year]'";
				list($sub,$wait)=mysql_fetch_row(mysql_query($q));

				$fsub = $sub+1;
				$fwait = $wait+1;
				
			 $sql ="update ilearn_status set submit='$fsub', waiting='$fwait' where teacher_id ='$uuid' AND week='$week' AND sem='$sem' AND year='$_POST[year]'";	 
			 mysql_query($sql);*/
			 	 
			 	$rqstat="SELECT COUNT(*) FROM ilearn_content WHERE upload_id='$uuid' AND sem='$sem' AND week='$week' AND year='$_POST[year]' AND flag='1' AND (approve_status='1' or approve_status='3')";
				list($tot_app)=mysql_fetch_row(mysql_query($rqstat));
					
				$sql ="update ilearn_status set submit='$tot_app', waiting='$tot_app' where teacher_id ='$uuid' AND week='$week' AND sem='$sem' AND year='$_POST[year]'";	 
				mysql_query($sql);

			}
					echo"<script language='javascript'> 
					opener.location.reload(true);
					   self.close();
					</script>";
}//if ade id



$qqq="SELECT a.* FROM ilearn_content a WHERE id='$id'";
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
	echo $year = $rw["year"];
?>
<input name="datePost" type="hidden" value="<?php print $today  ?>">
<input name="year" type="hidden" value="<?php print $year  ?>">

<?php

 	#$query="Select subject from ktube_subject where subject_id='$subject'";
	#$result=mysql_query($query);
	#$row=mysql_fetch_array($result);
	
?>
<h3><?php echo getnama($subject,"subject","ktube_subject","subject_id"); ?></h3>

<table border="1" style="height:auto; border-collapse:collapse;" cellspacing="5">
	
	<tr>
		<td>Date: <input name="date" type="date" value="<?php echo $rw['date'];?>"></td>
		<td>Time: <input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>"></td>
		<td>Class:
		
    	
		<?php
if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")

{
	
$q="SELECT * FROM class_set WHERE flag ='1' and subject_id=$subject";
		$name=mysql_query($q);
		
		echo "<select name = 'class_id' )'>";

		while ($row = mysql_fetch_array($name)) {
			
				if($row['id']==$rw['class_id'])
				{
					echo "<option value='" . $row['set_id'] ."' selected>" ."form"." ".$row['form'] .$row['clas_name'] ." - ". $row['group_set'] ."</option>";
				}
				else
				{
					echo "<option value='" . $row['set_id'] ."'>" ."form"." ".$row['form']  .$row['clas_name'] ." - ". $row['group_set'] ."</option>";
				}
				}		
				echo "</select>";	}

else {
		
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

}
		
		
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
		
		<td>Attendance : <input type="text" name="atten" style="width: 20px;" value="<?php echo $rw['atten']; ?>"> / <input type="text" name="atten_all" style="width: 20px;" value="<?php echo $rw['atten_all']; ?>"></td>
		
	</tr>
	
	<tr>
		<td colspan="2">Global Context <br>
		<select name = "global" >
		<?php
		$q="SELECT * FROM globalcontext WHERE flag ='1'";
		$name=mysql_query($q);
		echo "<option value='' selected>" . "- Select Global Context -" ."</option>";
			while ($row = mysql_fetch_array($name)) {
				if ($rw['global_context']==$row['name']){
					echo "<option value='" . $row['name'] ."' selected>"."". $row['name'] ."  "."</option>";
				}else{
					echo "<option value='" . $row['name'] ."'>" ."". $row['name'] ."  "."</option>";
				}
			}
		?>
        </select></td>
		<td colspan="2">Key &amp; Related Concepts<br>
		<textarea name="concept" cols="50" rows="4" wrap="hard" >		
		<?php echo $rw['concept'] ?></textarea></td>
		<td rowspan="8"><br /><br /><b><p>21st Century Learning Skill <br />IB Learner Profile(s)</p></b>
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
		
		
		<b>Toolkit(s) IBMYP</b><br />
		
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
	<br />
    &nbsp;&nbsp;&nbsp;<textarea name="toolkit_others" cols="22" rows="2" wrap="hard" ><?php echo $rw['toolkit_others'] ?></textarea>
    <br /><br />
    
    <?php if ($subject=='5')
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
    	&nbsp;&nbsp;&nbsp;<textarea name="emk_others" cols="22" rows="2" wrap="hard" placeholder="EMK Others" ><?php echo $rw['emk_others'] ?></textarea>
		
		<?php
	   
		}// end if subject
		?><br />
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2">Statement of Inquiry <br>
		<textarea name="inquiry" cols="50" rows="4" wrap="hard" ><?php echo $rw['inquiry'] ?></textarea></td>
		<td colspan="2">Approaches to Learning  <br>
		<textarea name="approaches" cols="50" rows="4" wrap="hard" ><?php echo $rw['approaches'] ?></textarea></td>
		
	</tr>
	
	<tr>
		<td>Learning Area(s)</td>
		<td colspan="3"> 
		<textarea name="topic" cols="80" rows="4" wrap="hard" ><?php echo strip_tags($rw['topic']) ?></textarea></td>
		
	</tr>
	
	<tr>
		<td>Learning Outcome(s)</td>
		<td colspan="3"><textarea name="outcome" cols="80" rows="4" wrap="hard" ><?php echo strip_tags($rw['outcome']) ?></textarea></td>
	</tr>
	
	<tr>
		<td>Success Criteria</td>
		<td colspan="3"><textarea name="objective" cols="80" rows="5" wrap="hard" ><?php echo strip_tags($rw['objective']) ?></textarea></td>
		</tr>
	
	<tr>
		<td>Prior Knowledge</td>
		<td colspan="3"> 
		<textarea name="existing" cols="80" rows="4" wrap="hard" ><?php echo strip_tags($rw['existing_knowledge']) ?></textarea></td>
		
		
	</tr>
	
	<tr>
		<td>Learning Activities</td>
		<td colspan="3"> 
		<textarea name="activity" cols="80" rows="4" wrap="hard" ><?php echo strip_tags($rw['activity']) ?></textarea></td>
		
	</tr>
	

	
	<tr>
		<td>Resources / Teaching Aids</td>
		<td colspan="3"> 
		<textarea name="source" cols="80" rows="4" wrap="hard" ><?php echo strip_tags($rw['source']) ?></textarea></td>	
	</tr>
	
	<tr>
		<td>Assessment / Reflection</td>
		<td colspan="3"><br>
		  <textarea name="desc1" cols="80" rows="4" wrap="hard" ><?php echo $rw['description1'] ?></textarea></td>
		<td>Notes:<br>
		  <textarea name="remark" cols="30" rows="3" wrap="hard" ><?php echo $rw['remarks'] ?></textarea></td>
	</tr>
	
	
	<tr>
		<td></td>
		<td colspan="2">Files :<?php
		

		$q="SELECT id, title FROM ktube_content WHERE subj_id='$subject' AND flag='1' ORDER BY id DESC";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$rw['file_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		echo "<div class='container'>";
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($title)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='file[]' value='" . $row['id'] ."' checked>" . $row['title'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='file' name='file[]' value='" . $row['id'] ."' >" . $row['title'] ." ";
		echo "<br>" ;
		}
		$count++;
		$y=0;
		
		}

		
		
		?>
		</td>
		<td colspan="2">Quizes :<?php

		

		$quiz="SELECT  title_id, title FROM elearning_title WHERE subject='$subject'";
		$getquiz=mysql_query($quiz);
		
		
		 
		$qz=explode(",",$rw['quiz_id']); 
		$cq= count($qz)-1;
		$a=0;
		 
		
		echo "<div class='container'>";
		
		
		
		$countq=0;
		
		while ($row = mysql_fetch_array($getquiz)) 
		{
		
		
		
		for($i=0; $i<$cq; $i++)
		{
			if($qz[$i]==$row['title_id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='quiz' name='quiz[]' value='" . $row['title_id'] ."' checked>" . $row['title'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='quiz' name='quiz[]' value='" . $row['title_id'] ."' >" . $row['title'] ." ";
		echo "<br>" ;
		}
		$countq++;
		$y=0;
		
		}

		
		
		
		?>
		</td>
	
	
	
	</tr>
	
	<tr>
	
		<td colspan="5">
		<input name="upload_id" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>">
        <input name="subject_id" type="hidden" value="<?php echo $subject; ?>">
		<input name="id" type="hidden" value="<?php echo $rw['id']; ?>">
		<?php $rw['approve_status'];  
			if($rw['approve_status'] == 0)
			{
				
					if ($subject== 1 or $subject == 10 or $subject == 12 or $subject == 14 or $subject == 16 or $subject == 18)
	{
		$approve_by = '26';
		//bahasa
		
	}
	
	else if ($subject== 8 or $subject == 5 or $subject == 6 or $subject == 7 or $subject == 19 )
	{
		$approve_by = '39';
		//sc
	}
	
	else if ($subject== 9 or $subject == 2 or $subject == 3 or $subject == 15 or $subject == 11 or $subject == 13 or $subject == 17)
	{
		$approve_by = '23';
		//kemanusiaan
		
	}
	
	else if ($subject== 4 or $subject == 23 or $subject == 20)
	{
		$approve_by = '25';
		//vocasional
		
	}
	
	else if ($subject== 24 or $subject == 25 or $subject == 26 or $subject == 27 or $subject == 28 or $subject == 29 or $subject == 30 or $subject == 31 or $subject == 32 or $subject == 33 or $subject == 34 or $subject == 35)
	{
		$approve_by = '76';
		//ib
		
	}
				$app_status ="3";
				//$approve_by ="2";
			
			}
			else
			{
				$app_status = $rw['approve_status'];
				$approve_by = $rw['approve_by'];
			}
			
		
		?>
		<input name="app_status" type="hidden" value="<?php echo $app_status; ?>">
		<input name="app_by" type="hidden" value="<?php echo $approve_by; ?>">
		<center>
        <input name="update" type="submit" value="Save">	
        <?php if($rw['approve_status']=='0'){ ?>
        <input name="submit" type="submit" value="Submit">	
        <?php }
		else {
			
			
		}
		?>	
		</center>
		</td>
	</tr>
	





</table>
</form>
</center>
</div>