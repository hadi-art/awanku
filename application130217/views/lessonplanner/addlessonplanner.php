<div style="width:auto; background:#FFFFFF">

<br>
<br>
<br>

<center>
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


if(isset($_POST['insert'])) 
{
//print_r($_POST);

//die();
	//strpos($_POST,'video')
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
	
	
	
	$bil_ibprofile=count($_POST["ibprofile"]);
	$id_ibprofile="";
	for($a=0;$a<$bil_ibprofile;$a++)
	{
	$id_ibprofile.=$_POST["ibprofile"][$a].",";
	}
	
	
	$bil_toolkit=count($_POST["toolkit"]);
	$id_toolkit="";
	for($a=0;$a<$bil_toolkit;$a++)
	{
	$id_toolkit.=$_POST["toolkit"][$a].",";
	}

	$bil_emk=count($_POST["ilearn_emk"]);
	$emk_id="";
	for($a=0;$a<$bil_emk;$a++)
	{
	$emk_id.=$_POST["ilearn_emk"][$a].",";
	}

	
	//echo $idcontent;
	//die(); 
		$upload_id = $_POST['upload_id'];
		 $subject_id = $subject;
		//echo "<br>";
		 $date = $_POST["date"];
		//echo "<br>";
		 $Ftime = $_POST["Ftime"];
		//echo "<br>";
		 $Ttime = $_POST["Ttime"];
		//echo "<br>";
		 $classid = $_POST["class_id"];
		//echo "<br>";
		 $week=$_POST['week'];
		//echo "<br>";
		 $sem = $_POST['sem'];
		//echo "<br>";

		
	
		 $global = mysql_real_escape_string($_POST['global']);
		 $global2 = strip_tags($global);
		//cho "<br>";
		 $concept = mysql_real_escape_string($_POST['concept']);
		 $concept2 = strip_tags($concept);
		//echo "<br>";
		 $inquiry = mysql_real_escape_string($_POST['inquiry']);
		 $inquiry2 = strip_tags($inquiry);
		//echo "<br>";
		 $approaches = mysql_real_escape_string($_POST['approaches']);
		 $approaches2 = strip_tags($approaches);
		//echo "<br>";
		 $existing = mysql_real_escape_string($_POST['existing']);
		 $existing2 = strip_tags($existing);
		//echo "<br>";
		 $activity = mysql_real_escape_string($_POST['activity']);
		 $outcome2 = strip_tags($outcome);
		//echo "<br>";
		 $source = mysql_real_escape_string($_POST['source']);
		 $activity2 = strip_tags($activity);
		//echo "<br>";
		 $desc1 = mysql_real_escape_string($_POST['desc1']);
		 $desc1_2 = strip_tags($desc1);
		//echo "<br>";
		 $desc2 = mysql_real_escape_string($_POST['desc2']);
		 $desc2_2 = strip_tags($desc2);
		//echo "<br>";
		 $desc3 = mysql_real_escape_string($_POST['desc3']);
		 $desc3_2 = strip_tags($desc3);
		//echo "<br>";
		 $topic = mysql_real_escape_string($_POST['topic']);
		 $topic2 = strip_tags($topic);
		
		 $objective = mysql_real_escape_string($_POST['objective']);
		 $objective2 = strip_tags($objective);
		
		 $outcome = mysql_real_escape_string($_POST['outcome']);
		 $outcome2 = strip_tags($outcome);
		
		 $remark=mysql_real_escape_string($_POST['remark']);
		 $remark2 = strip_tags($remark);
		//echo "<br>";
		
		$toolkit_others = mysql_real_escape_string($_POST['toolkit_others']);
		
		$emk_others = mysql_real_escape_string($_POST['emk_others']);

		 $today = $_POST['datePost'];
		  
		 $file=$_POST['file'];
		 $quiz=$_POST['quiz'];
		
		 $file=$_POST['file'];
		 $quiz=$_POST['quiz'];
		 
		
	#echo $id_toolkit_leap;
	#print_r($_POST);
	
	$sql ="INSERT INTO ilearn_content set subject_id ='$subject_id', 
	upload_id ='$upload_id', 
	file_id='$idcontent', 
	topic ='$topic2', 
	objective ='$objective2', 
	activity ='$activity2', 
	outcome ='$outcome2', 
	class_id ='$_POST[class_id]', 
	week ='$_POST[week]', 
	sem ='$sem',
	year='$_POST[tahun]', 
	datePost ='$today',
	date ='$_POST[planner_date]',
	Ftime='$Ftime', 
	Ttime='$Ttime', 
	flag ='1', 
	quiz_id='$idtitle', 
	ibprofile_id='$id_ibprofile', 
	toolkit_id='$id_toolkit',
	emk_id='$emk_id',
	emk_others = '$emk_others',
	toolkit_others='$toolkit_others',
	global_context ='$global2', 
	concept ='$concept2', 
	inquiry ='$inquiry2', 
	approaches ='$approaches2',
	existing_knowledge ='$existing2', 
	source ='$source2', 
	description1 ='$desc1_2',
	description2 ='$desc2_2', 
	description3 ='$desc3_2', 
	remarks='$remark2' ";
	
	//die();

	if(mysql_query($sql))
	{
		?>
		<script type="text/Javascript">
			<!--
				alert("Save Successful!");
				
			</script>
			
		<?php
	}
	else
	{
	?>

		<script type="text/Javascript">
			
				alert("Save Unseccessful!");
				
			</script>
			
	<?php
	}

	echo "<script>window.close();</script>";
}

if(isset($_POST['submit'])) 
{
	$id=$_GET["id"];
	
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
	
	
	
	$bil_ibprofile=count($_POST["ibprofile"]);
	$id_ibprofile="";
	for($a=0;$a<$bil_ibprofile;$a++)
	{
	$id_ibprofile.=$_POST["ibprofile"][$a].",";
	}
	
	
	$bil_toolkit=count($_POST["toolkit"]);
	$id_toolkit="";
	for($a=0;$a<$bil_toolkit;$a++)
	{
	$id_toolkit.=$_POST["toolkit"][$a].",";
	}

	$bil_emk=count($_POST["ilearn_emk"]);
	$emk_id="";
	for($a=0;$a<$bil_emk;$a++)
	{
	$emk_id.=$_POST["ilearn_emk"][$a].",";
	}

	
	//echo $idcontent;
	//die(); 
		$upload_id = $_POST['upload_id'];
		 $subject_id = $subject;
		//echo "<br>";
		 $date = $_POST["date"];
		//echo "<br>";
		 $Ftime = $_POST["Ftime"];
		//echo "<br>";
		 $Ttime = $_POST["Ttime"];
		//echo "<br>";
		 $classid = $_POST["class_id"];
		//echo "<br>";
		 $week=$_POST['week'];
		//echo "<br>";
		 $sem = $_POST['sem'];
		//echo "<br>";

	
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

		 $today = $_POST['datePost'];
		 
		 $file=$_POST['file'];
		 $quiz=$_POST['quiz'];
		
		 $file=$_POST['file'];
		 $quiz=$_POST['quiz'];
		 
		
	#echo $id_toolkit_leap;
	#print_r($_POST);
	
	$qqq="SELECT * FROM ilearn_content WHERE id='$id'";
	$rr=mysql_query($qqq);
	$rw=mysql_fetch_array($rr);
	
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
	
	else if ($subject== 9 or $subject == 2 or $subject == 3 or $subject == 15 or $subject == 11)
	{
		#$approve_by = '23';
		$req1='699';
		$req2='22';
		$req3='23';
		
		//kemanusiaan
		
	}
	
	else if ($subject== 4 or $subject == 13 or $subject == 17 or $subject == 23 or $subject == 20)
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
	
	
	if ($id=="")
	{
		$sql ="INSERT INTO ilearn_content set 
		subject_id ='$subject_id', 
		upload_id ='$upload_id', 
		file_id='$idcontent', 
		topic ='$topic2', 
		objective ='$objective2', 
		activity ='$activity2', 
		outcome ='$outcome2', 
		class_id ='$_POST[class_id]', 
		week ='$_POST[week]', 
		sem ='$sem',
		year='$_POST[tahun]', 
		datePost ='$today',
		date ='$_POST[planner_date]',
		Ftime='$Ftime', 
		Ttime='$Ttime', 
		flag ='1', 
		quiz_id='$idtitle', 
		ibprofile_id='$id_ibprofile', 
		toolkit_id='$id_toolkit',
		emk_id='$emk_id',
		emk_others = '$emk_others',
		toolkit_others='$toolkit_others',
		global_context ='$global2', 
		concept ='$concept2', 
		inquiry ='$inquiry2', 
		approaches ='$approaches2', 
		existing_knowledge ='$existing2', 
		source ='$source2', 
		description1 ='$desc1_2',
		description2 ='$desc2_2', 
		description3 ='$desc3_2', 
		remarks='$remark2', 
		req_app_1='$req1', 
		req_app_2='$req2', 
		req_app_3='$req3', 
		approve_by='$approve_by',
		approve_status='3'";
	
	//die();

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

	echo "<script>window.close();</script>";
} //if xde id	
	
	}//insert

?>


<center>
<form method="post" action="">

<?php

	date_default_timezone_set('Asia/Kuala_Lumpur'); 
	$today = date('d-m-Y');
	
	$year_now = date('Y');
	
?>
<input name="datePost" type="hidden" value="<?php print $today;  ?>">

<input name="tahun" type="hidden" value="<?php print $year_now;  ?>">


<?php

 	$query="Select subject from ktube_subject where subject_id='$subject'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	
			//echo $subject;

?>
<h3><?php echo getnama($subject,"subject","ktube_subject","subject_id"); ?></h3>
<table border="1" style="height:auto; border-collapse:collapse;" cellspacing="5">
	
	<tr>
		<td>Date: <input name="planner_date" type="date" value="<?php echo $rw['date'];?>"></td>
		
		<td>Time: <input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>"></td>
		<td>Class:
		
    	
		<?php
if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")

{
	
		$q="SELECT * FROM class_set WHERE flag ='1' and subject_id=$subject";
		$name=mysql_query($q);
		
		echo "<select name = 'class_id' )'>";

		while ($row = mysql_fetch_array($name)) {
			
				if($row['id']==$rw['form'])
				{
					echo "<option value='" . $row['set_id'] ."' selected>" ."form"." ".$row['form'] ." ". $row['group_set'] ."  "."</option>";
				}
				else
				{
					echo "<option value='" . $row['set_id'] ."'>" ."form"." ".$row['form'] ." - ". $row['group_set'] ."</option>";
				}
				}		
				echo "</select>";	
}

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
</td>
		
		
		
		<td>
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
		
		
		
		Week :<select name = "week" >
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
		
		
		
		</td>
		
		<td></td>
		
	</tr>
	
	<tr>
		<td colspan="2">Global Context <br>
		<textarea name="global" cols="50" rows="4" wrap="hard" ></textarea></td>
		<td colspan="2">Key &amp; Related Concepts<br>
		<textarea name="concept" cols="50" rows="4" wrap="hard" ></textarea></td>
		<td rowspan="8"><br /><b><p>21st Century Learning Skill
		<br>
		IB Learner Profile(s)<br></p></b>
		<?php

		

		$q="SELECT profile_id, profile FROM ktube_ibprofile";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$row['ibprofile_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($title)) 
		{
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['profile_id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='ibprofile[]' value='" . $row['profile_id'] ."' checked>" . $row['profile'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='file' name='ibprofile[]' value='" . $row['profile_id'] ."' >" . $row['profile'] ." ";
		echo "<br>" ;
		}
		$count++;
		$y=0;
		
		}

		
		
		?>
		
		
		<br /> <br />
		
		<b>Toolkit(s) IBMYP	 <br />	</b>
		<?php

		

		$q="SELECT toolkit_id, toolkit FROM ilearn_toolkit";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$row['toolkit_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($title)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['toolkit_id'])
			{
				echo "&nbsp";
				echo "<input type='checkbox' id='file' name='toolkit[]' value='" . $row['toolkit_id'] ."' checked>" . $row['toolkit'] ." ";
				echo "<br>" ;
				$y=1;

			}
			
			

			
		}
		
		
		
		if($y==0)
		{
		
		echo "&nbsp";
		echo "<input type='checkbox' id='file' name='toolkit[]' value='" . $row['toolkit_id'] ."' >" . $row['toolkit'] ." ";
		echo "<br>" ;
		}
		$count++;
		$y=0;
		
		}
	
		?>
		<br />
        &nbsp;&nbsp;&nbsp;<textarea name="toolkit_others" cols="22" rows="2" wrap="hard" placeholder="Others" ></textarea>
		<br />
				
		<?php if ($subject=='5'){  ?>
        <b>Toolkit(s) EMK	 <br />	</b>
        <?php
			
		$q="SELECT name, emk_id FROM ilearn_emk";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$row['emk_id']); 
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
		} // if subjek
		
		
		?>
        <br />
        <br />
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2">Statement of Inquiry <br>
		<textarea name="inquiry" cols="50" rows="4" wrap="hard" ></textarea></td>
		<td colspan="2">Approaches to Learning  <br>
		<textarea name="approaches" cols="50" rows="4" wrap="hard" ></textarea></td>
		
	</tr>
	
	<tr>
		<td>Learning Area(s)</td>
		<td colspan="3"> 
		<textarea name="topic" cols="80" rows="4" wrap="hard" ></textarea></td>
		
	</tr>
	
	<tr>
		<td>Learning Outcome(s)</td>
		<td colspan="3"><textarea name="outcome" cols="80" rows="4" wrap="hard" ></textarea></td>
	</tr>
	
	<tr>
		<td>Success Criteria</td>
		<td colspan="3"><textarea name="objective" cols="80" rows="5" wrap="hard" ></textarea></td>
	  </tr>
	
	<tr>
		<td>Prior Knowledge</td>
		<td colspan="3"> 
		<textarea name="existing" cols="80" rows="4" wrap="hard" ></textarea></td>
		
		
	</tr>
	
	<tr>
		<td>Learning Activities</td>
		<td colspan="3"> 
		<textarea name="activity" cols="80" rows="4" wrap="hard" ></textarea></td>
		
	</tr>
	

	
	<tr>
		<td>Resources / Teaching Aids</td>
		<td colspan="3"> 
		<textarea name="source" cols="80" rows="4" wrap="hard" ></textarea></td>	
	</tr>
	
	<tr>
		<td>Assessment / Reflection</td>
		<td>Who didn't meet the objective(s)? <br>
		<textarea name="desc1" cols="30" rows="3" wrap="hard" ></textarea></td>
		<td>What would I change?<br>
		<textarea name="desc2" cols="30" rows="3" wrap="hard" ></textarea></td>
		<td>How did I differentiate<br>
		<textarea name="desc3" cols="30" rows="3" wrap="hard" ></textarea></td>
		<td>Notes:<br>
		<textarea name="remark" cols="30" rows="3" wrap="hard" ></textarea></td>
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
		</div>
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
		</div></td>
	
	
	
	</tr>
	
	<tr>
	
		<td colspan="5">
		<input name="upload_id" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>">
        <input name="subject_id" type="hidden" value="<?php echo $subject; ?>">
		<input name="id" type="hidden" value="<?php echo $rw['id']; ?>">
		<center>			
        <input name="insert" type="submit" value="Save">
		<input name="submit" type="submit" value="Submit">
		</center>
		</td>
	</tr>
	





</table>
</form>
</center>

</div>