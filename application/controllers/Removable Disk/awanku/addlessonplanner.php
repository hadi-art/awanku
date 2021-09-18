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
if(isset($_POST['submit'])) 
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

	$bil_toolkit_leap=count($_POST["toolkit_leap"]);
$id_toolkit_leap="";
for($a=0;$a<$bil_toolkit_leap;$a++)
{
$id_toolkit_leap.=$_POST["toolkit_leap"][$a].",";
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
	//cho "<br>";
	 $concept = mysql_real_escape_string($_POST['concept']);
	//echo "<br>";
	 $inquiry = mysql_real_escape_string($_POST['inquiry']);
	//echo "<br>";
	 $approaches = mysql_real_escape_string($_POST['approaches']);
	//echo "<br>";
	 $existing = mysql_real_escape_string($_POST['existing']);
	//echo "<br>";
	 $activity = mysql_real_escape_string($_POST['activity']);
	//echo "<br>";
	 $source = mysql_real_escape_string($_POST['source']);
	//echo "<br>";
	 $desc1 = mysql_real_escape_string($_POST['desc1']);
	//echo "<br>";
	 $desc2 = mysql_real_escape_string($_POST['desc2']);
	//echo "<br>";
	 $desc3 = mysql_real_escape_string($_POST['desc3']);
	//echo "<br>";
	 $topic = mysql_real_escape_string($_POST['topic']);
	//echo "<br>";
	 $objective = mysql_real_escape_string($_POST['objective']);
	//echo "<br>";
	 $outcome = mysql_real_escape_string($_POST['outcome']);
	//echo "<br>";
	 $remark=mysql_real_escape_string($_POST['remark']);
	
	 $today = $_POST['datePost'];
	 $file=$_POST['file'];
	 $quiz=$_POST['quiz'];
	
	 $file=$_POST['file'];
	 $quiz=$_POST['quiz'];
	
	
	#echo $id_toolkit_leap;
	#print_r($_POST);
	
	
	
	
	
	
$sql ="INSERT INTO ilearn_content set subject_id ='$subject_id', upload_id ='$upload_id', file_id='$idcontent', topic ='$topic', objective ='$objective', 
	activity ='$activity', outcome ='$outcome', class_id ='$_POST[class_id]', week ='$_POST[week]', sem ='$sem', datePost ='$today',date ='$date',
	Ftime='$Ftime', Ttime='$Ttime', flag ='1', quiz_id='$idtitle', ibprofile_id='$id_ibprofile', toolkit_id='$id_toolkit',toolkit_leap_id='$id_toolkit_leap',global_context ='$global', concept ='$concept', inquiry ='$inquiry', approaches ='$approaches', existing_knowledge ='$existing', source ='$source', description1 ='$desc1',description2 ='$desc2', description3 ='$desc3', remarks='$remark' ";
	
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

	
}




?>


<center>
<form method="post" action="">

<?php

	date_default_timezone_set('Asia/Kuala_Lumpur'); 
	$today = date('d-m-Y');
	
?>
<input name="datePost" type="hidden" value="<?php print $today  ?>">

<?php

 	$query="Select subject from ktube_subject where subject_id='$subject'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	
?>
<h3><?php echo getnama($subject,"subject","ktube_subject","subject_id"); ?></h3>
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
</td>
		
		
		
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
		<td colspan="2">Global Context <br>
		<textarea name="global" cols="50" rows="4" wrap="hard" ></textarea></td>
		<td colspan="2">Key &amp; Related Concepts<br>
		<textarea name="concept" cols="50" rows="4" wrap="hard" ></textarea></td>
		<td rowspan="4"><p>21st Century Learning Skill
		<br>
		IB Learner Profile(s)<br>
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
		<td rowspan="4">Toolkit(s) <br>IBMYP	 <br />	
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
		
		<br />LEAP ED<br />
		<?php		

		$q="SELECT toolkit_leap_id, toolkit_leap FROM ilearn_toolkit_leap";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$rw['toolkit_leap']); 
		$ct= count($qq)-1;
		$y=0;
		 	
		$count=0;
		
		while ($row = mysql_fetch_array($title)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['toolkit_leap'])
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
		<input name="submit" type="submit" value="Submit">
		</center>
		</td>
	</tr>
	





</table>
</form>
</center>

</div>