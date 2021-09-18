<?php
	function getsubject($id)
	{
	
	
	
	$q="SELECT subject FROM ktube_subject WHERE subject_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>

<?php if(isset($_POST['submittrue']))
{
		
		$question_type = $_GET['type'];
		
		$truefalse=$_POST["truefalse"];
		$answerone=$_POST["answerone"];
		$answertwo =$_POST["answertwo"];
		$correctanswer =$_POST["correctanswer"];
		$id = $_GET['true'];
		
		
		
		$insert=mysql_query("insert into elearning_question set title_id='$id', question='$truefalse', answer_one='$answerone', answer_two='$answertwo', correct_answer='$correctanswer', question_type = '$question_type'")or die(mysql_error());


}

?>



<?php if(isset($_POST['submitchoice']))
{
		
		$question_type = $_GET['type'];
		
		$choice=$_POST["choice"];
		$answerone=$_POST["answerone"];
		$answertwo =$_POST["answertwo"];
		$answerthree =$_POST["answerthree"];
		$answerfour =$_POST["answerfour"];
		$correctanswer =$_POST["correctanswer"];
		$id = $_GET['choice'];
		
		
		
		$insert=mysql_query("insert into elearning_question set title_id='$id', question='$choice', answer_one='$answerone', answer_two='$answertwo', answer_three='$answerthree', answer_four='$answerfour', correct_answer='$correctanswer', question_type = '$question_type'")or die(mysql_error());


}

?>



<div id="content" style="background:#FFFFFF;width:80%;margin-left:10px;height:auto; float:left;margin-top:10px">
<?php

if(isset($_POST['submit']))
{
		
		
		$upload_by=$_POST["upload_by"];
		$title=$_POST["title"];
		$level=$_POST["level"];
		$subjek=$_POST["subjek"];
		
		
		
					
	$insert=mysql_query("insert into elearning_title set title='$title', level='$level', subject='$subjek', upload_by='$upload_by'")or die(mysql_error());


}


	$q="SELECT * FROM elearning_title ORDER BY title_id DESC LIMIT 1";
	$r=mysql_query($q);
	$data=mysql_fetch_array($r);
	
	{
	


?>	


<center>
<br>
<br>
	
	<table width="550">
		<tr>
			<td width="128"><strong>Title</strong></td>
			<td width="10"><strong>:</strong></td>
			<td colspan="2"><strong><?php echo $data['title']; ?></strong></td>
		</tr>
		
		<tr>
			<td><strong>Subject</strong></td>
			<td><strong>:</strong></td>
			<td colspan="2"><strong><?php echo getsubject($data['subject']); ?></strong></td>
		</tr>
		
		<tr>
			<td><strong>Level</strong></td>
			<td><strong>:</strong></td>
			<td colspan="2"><strong><?php echo $data['level']; ?></strong></td>
		</tr>	
		
		<tr>
			<td height="86">Type of question </td>
			<td>:</td>
			<td width="81"><a href="?true=<?php echo $data["title_id"]; ?>&type=1" style="color:#330099; font-size:small">True/False</a></td>
			<td width="311"><a href="?choice=<?php echo $data["title_id"]; ?>&type=2" style="color:#330099; font-size:small">Multiple Choice</a></td>
		</tr>	
	
	</table>	
	
	
	
<?php							
if(isset($_GET['true']))
{
	$type = $_GET['type'];
?>	
	
	<form method="post">
	<table width="541">
		<tr>
		<td valign="top">Question</td>
			<td valign="top">:</td>
			<td><textarea name="truefalse" style="width:400px;height:95px;" required></textarea></td>
		</tr>
		<tr>
			<td width="59">Answer</td>
			<td>:</td>
			<td><input type="text" name="answerone" required> <input type="radio" name="correctanswer" value="1" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answertwo" required> <input type="radio" name="correctanswer" value="2" required></td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
		    <td align="right"><input type="submit" name="submittrue" value="Done" id="submit"></td>
		</tr> 
	</table>
	</form>
	
	
	
<?php
	
}
?>

<?php							
if(isset($_GET['choice']))
{
	$type = $_GET['type'];
?>	
	<form method="post">
	<table width="544">
		<tr>
			<td valign="top">Question</td>
			<td width="10" valign="top">:</td>
			<td><textarea name="choice" style="width:400px;height:95px;" required></textarea></td>
		</tr>
		<tr>
			<td width="59">Answer</td>
			<td>:</td>
		  <td width="459"><input type="text" name="answerone" required> <input type="radio" name="correctanswer" value="1" required> </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answertwo" required> <input type="radio" name="correctanswer" value="2" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answerthree" required> <input type="radio" name="correctanswer" value="3" required> </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answerfour" required> <input type="radio" name="correctanswer" value="4" required> </td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
		     <td align="right"><input name="submitchoice" type="submit" value="Done" ></td>
		</tr> 
	</table>
	</form>
<?php
$i++;
}
?>

	
<?php
	
	$title_id = $data["title_id"];
	
	$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($query);
	

	
?>

	<br />
 	<h3>QUESTION LIST</h3>
	<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center" >
    <tr bgcolor="#99CCFF">
   		<th width="6%">Bil</th>
      	<th width="43%">Question</th>
    	<th>A1</th>
		<th>A2</th>
		<th>A3</th>
		<th>A4</th>
		
	</tr>
	  
<?php
	$count=1;
	while($row=mysql_fetch_array($q))
	{
	?> 
	
	<form method="post">
    <tr>
		<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
		<td><center><?php echo $row['question']; ?></center></td>
		
		<td width="15%"><center><?php echo $row['answer_one']; ?></center></td>
		
		<td width="13%"><center><?php echo $row['answer_two']; ?></center></td>
		<td width="12%"><center><?php echo $row['answer_three']; ?></center></td>
		<td width="11%"><center><?php echo $row['answer_four']; ?></center></td>
		
		
	</tr>
	</form>
	<?php
	
	$count++;}
	?>
  </table>
  <br />
  <br />	
	
<?php } ?>

	<a href="<?php echo $site; ?>/assesment_control/createquiz" style="color:#000000; font-size:small">Finish</a>
</center>
  <br />
  <br />
</div>
</div>