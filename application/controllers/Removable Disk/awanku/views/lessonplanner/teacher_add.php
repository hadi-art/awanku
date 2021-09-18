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

<!--submit button-->
<?php 
if(isset($_POST['submit'])) {
//print_r($_POST);

//die();
//strpos($_POST,'video')
$bilcontent=count($_POST["file"]);
$idcontent="";
for($a=0;$a<$bilcontent;$a++){
$idcontent.=$_POST["file"][$a].",";
}


$biltitle=count($_POST["quiz"]);
$idtitle="";
for($a=0;$a<$biltitle;$a++)
{
$idtitle.=$_POST["quiz"][$a].",";
}
	

//echo $idcontent;
//die(); 
	$upload_id = $_POST['upload_id'];
	$subject_id = $subject;
	$topic = $_POST['topic'];
	$objective = $_POST['objective'];
	$activity = $_POST['activity'];
	$outcome = $_POST['outcome'];
	$sem = $_POST['sem'];
	$today = $_POST['datePost'];
	$Ftime = $_POST["Ftime"];
	$Ttime = $_POST["Ttime"];
	$date = $_POST["date"];
	$file=$_POST['file'];
	$quiz=$_POST['quiz'];
	
  	$sql ="INSERT INTO ilearn_content set subject_id ='$subject_id', upload_id ='$upload_id', file_id='$idcontent', topic ='$topic', objective ='$objective', 
	activity ='$activity', outcome ='$outcome', class_id ='$_POST[class_id]', week ='$_POST[week]', sem ='$sem', datePost ='$today',date ='$date',
	Ftime='$Ftime', Ttime='$Ttime', flag ='1', quiz_id='$idtitle'";
	
	//die();

	 if(mysql_query($sql))
	{
		?>
		<script type="text/Javascript">
			<!--
				alert("Submit Successful!");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
		<?php
	}
	else
	{
	?>
		<script type="text/Javascript">
			<!--
				alert("Submit Unseccessful!");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
	<?php
	}
}




?>
<!--submit button-->


<!--edit button-->
<?php
if(isset($_POST['edit']))
{

	$id = $_POST['id'];
	$upload_id = $_POST['upload_id'];
	$subject_id = $subject;
	$topic = $_POST['topic'];
	$objective = $_POST['objective'];
	$activity = $_POST['activity'];
	$outcome = $_POST['outcome'];
	$date = $_POST["date"];
	$ftime = $_POST["Ftime"];
	$ttime = $_POST["Ttime"];
	$file=$_POST['file'];
	$quiz=$_POST['quiz'];
	$class=$_POST['class_id'];

	$bilcontent=count($_POST["file"]);
	$idcontent="";
	for($a=0;$a<$bilcontent;$a++)
	{
		$idcontent.=$_POST["file"][$a].",";
	}


	$biltitle=count($_POST["quiz"]);
	$idtitle="";
	for($b=0;$b<$biltitle;$b++)
	{
		$idtitle.=$_POST["quiz"][$b].",";
	}
	
	
  	$sqll ="update ilearn_content set upload_id ='$upload_id',subject_id ='$subject_id', file_id='$idcontent', topic ='$topic', objective ='$objective', activity ='$activity', outcome ='$outcome', flag ='1', quiz_id='$idtitle', week='$_POST[week]', class_id='$_POST[class_id]', date='$date', datePost='$date', Ftime='$ftime', Ttime='$ttime' where id='$id'";
	//die();
 
 
	if(mysql_query($sqll))
	{
?>
		<script type="text/Javascript">
			<!--
				alert("Edit Successful!");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">

<?php
	}
	
	else
	{
?>
	<script type="text/Javascript">
			<!--
				alert("Edit Unsuccessfull");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
	
<?php
	}
	}
?>
<!--edit button-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>


<!--edit form-->

<?php
if($action=="edit")
{	
	//$id=$_GET['id'];
	
	$query="SELECT * FROM ilearn_content WHERE id = $id";
	$query_run=mysql_query($query);
	$rw=mysql_fetch_array($query_run);

?>

<form method="post" action="">


<?php

 	$query="Select subject from ktube_subject where subject_id='$subject'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	
?>
<br><br>
<table width=50% border = 1 class="one">

<tr>
	<td>
		&nbsp;&nbsp;Date: <input name="date" type="date" value="<?php echo $rw['date'];?>">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Time: <input type="time" name="Ftime" value="<?php echo $rw['Ftime'];?>"> To <input type="time" name="Ttime" value="<?php echo $rw['Ttime'];?>">

		<br><br>
		&nbsp;&nbsp;Class:
		
    	
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
		
		
		&nbsp;&nbsp;Week: 
		
		<select name = "week" >
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
		

		&nbsp;&nbsp;Sem:
		
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
	

	
			
<br><br>
&nbsp;Topic : 
<input name="topic" type="text" size="80" maxlength="100" wrap="hard" value="<?php echo $rw['topic'];?>">
<br>
<br>
&nbsp;Objective : 
<textarea name="objective" cols="80" rows="5" wrap="hard" ><?php echo $rw['objective'];?></textarea>
<br>
<br>
&nbsp;Activity : 
<textarea name="activity" cols="80" rows="5" wrap="hard"><?php echo $rw['activity'];?></textarea>
<br>
<br>
&nbsp;Outcome : 
<textarea name="outcome" cols="80" rows="5" wrap="hard"><?php echo $rw['outcome'];?></textarea>
<br>
<br>
<br>

&nbsp;Files:
<?php
		

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
		
		
		<br>
<br>			
&nbsp;Quizes:
<?php

		

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
		</div>


				
			
		
		
		
		<input name="upload_id" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>">
        <input name="subject_id" type="hidden" value="<?php echo $subject; ?>">
		<input name="id" type="hidden" value="<?php echo $rw['id']; ?>">
		<center>			
		<input name="edit" type="submit" value="Edit">
		<!--<input name="submit" type="submit" value="Submit">-->
		</center>
		<br>
		</td>
		</tr>

		

</table>

</form>
<?php

}
?>
<!--edit form-->



<!--add form-->

<?php
#echo $action;
if($action=="add")
{	
		
	//$sem = $_GET['sem'];
	//$week=$_GET['week'];

?>

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
<br><br>
<table width=50% border = 1 class="one">

<tr>
	<td>
		&nbsp;&nbsp;Date: <input name="date" type="date">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Time: <input type="time" name="Ftime"> To <input type="time" name="Ttime">

		<br><br>
		&nbsp;&nbsp;Class:
		
    	
		<?php

		
		
		$q="SELECT id, name FROM classlist_v2 where flag='1'";
		$name=mysql_query($q);
		
		echo "<select name = 'class_id' )'>";
		echo "<option value ='null'></option>";
		while ($row = mysql_fetch_array($name)) {
		
  		echo "<option value='" . $row['id'] ."'>" . $row['name'] ."</option>";
  		}		
		echo "</select>";

		
		
		?>
		
		
				&nbsp;&nbsp;Week: <?php echo $week; ?>
		
		<!--<select name = "week" >
		//<?php
//		for($i=1; $i<=52; $i++)
//		{
//			if($i==$week)
//		{
//  			echo "<option value='" . $i ."' selected>" . $i ."</option>";
//		}
//		else
//		{
//			echo "<option value='" . $i ."'>" . $i ."</option>";
//		}
//		}
//		?>

		</select>-->


		

		&nbsp;Sem: <?php echo $sem; ?>
		
     <!-- <select name = "sem" >
		//<?php
//		for($i=1; $i<=2; $i++)
//		{
//			if($i==$sem)
//		{
//  			echo "<option value='" . $i ."' selected>" . $i ."</option>";
//		}
//		else
//		{
//			echo "<option value='" . $i ."'>" . $i ."</option>";
//		}
//		}
//		?>
        </select>-->
	

	
			
<br><br>
&nbsp;Topic : 
<input name="topic" type="text" size="80" maxlength="100" wrap="hard">
<br>
<br>
&nbsp;Objective : 
<textarea name="objective" cols="80" rows="5" wrap="hard" ></textarea>
<br>
<br>
&nbsp;Activity : 
<textarea name="activity" cols="80" rows="5" wrap="hard"></textarea>
<br>
<br>
&nbsp;Outcome : 
<textarea name="outcome" cols="80" rows="5" wrap="hard"></textarea>
<br>
<br>
&nbsp;Files:
<?php

		

		$q="SELECT id, title FROM ktube_content WHERE subj_id='$subject' and flag='1' ORDER BY id DESC";
		$title=mysql_query($q);
		
		 
		$qq=explode(",",$row['file_id']); 
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
		
		
		
			
<br>
<br>			
&nbsp;Quizes:
<?php

		

		$query="SELECT  title_id, title FROM elearning_title WHERE subject='$subject'";
		$q=mysql_query($query);
		
		 
		$qq=explode(",",$row['quiz_id']); 
		$ct= count($qq)-1;
		$y=0;
		 
		
		echo "<div class='container'>";
		
		
		
		$count=0;
		
		while ($row = mysql_fetch_array($q)) {
		
		
		
		for($i=0; $i<$ct; $i++)
		{
			if($qq[$i]==$row['id'])
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
		$count++;
		$y=0;
		
		}

		
		
		?>
		</div>

		<input name="upload_id" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>">	
		<input name="subject_id" type="hidden" value="<?php echo $subject; ?>">
		<input name="id" type="hidden" value="<?php echo $row['id']; ?>">
        <input name="week" type="hidden" value="<?php echo $week; ?>">
        <input name="sem" type="hidden" value="<?php echo $sem; ?>">
		<center>			
		<br>
		<input name="submit" type="submit" value="Submit">
		</center>
		<br>
		</td>
		</tr>

		

</table>

</form>
<?php

}
?>
<!--add form-->

<?php
if($action=="delete")
{
//$id=$_GET['delete'];

$q="delete from tbl_content where id='$id'";

mysql_query($q);
?>
		<script type="text/Javascript">
			<!--
				//alert("Delete Succesfull");
				
			</script>
			

<?php



} //delete

?>

</center>