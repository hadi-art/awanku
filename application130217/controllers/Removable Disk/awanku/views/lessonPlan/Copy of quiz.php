

<?php if(isset($_POST['submit']))
{
		
		$title_id = $_GET['cid'];		
		$upload_by =  $_SESSION["log"]["userid"];
		

		$group1 = $_POST['group']['1'];
		$group2 = $_POST['group']['2'];
		$group3 = $_POST['group']['3'];
		$group4 = $_POST['group']['4'];
		$group5 = $_POST['group']['5'];
		
    		

		$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
		$q=mysql_query($query);	
		
		$score=0;
		$i=1;
		while($row=mysql_fetch_array($q))	
		{
			
			if(	$row['correct_answer'] == $_POST['group'][$i])
			{	
				$score++;
			
			}
			
			$i++;
		
		}
		
		
		//$insert=mysql_query("update elearning_history set score='$score' where title_id='$title_id' and user_id='$upload_by' ");

		$insert=mysql_query("insert into elearning_history set user_id='$upload_by',title_id='$title_id ', ans_1='$group1', ans_2='$group2',ans_3='$group3',ans_4='$group4',ans_5='$group5', score='$score'");

}

?>

 <form method="post">
<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  	cellpadding="5" cellspacing="3">
    <tr bgcolor="#99CCFF">
   		<th width="5%" height="35">Bil</th>
      	<th width="95%">Question</th>
	</tr>
	  
<?php

	$title_id = $_GET['cid'];
	
	$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($query);	

	$count=1;
	$i=1;
	while($row=mysql_fetch_array($q))
	{
	
		
		if ( $row['question_type'] == '1')
		{
	?> 
	
	    <tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
			<td><?php echo $row['question']; ?></td>
		</tr>	
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" name="group[<?php echo $i; ?>]" value="1" required>A.<?php echo $row['answer_one']; ?></td>		
		</tr>
	
		<tr>
			<td></td>
			<td><input type="radio" name="group[<?php echo $i; ?>]" value="2" required>B.<?php echo $row['answer_two']; ?></td>
			
		</tr>
		
		<?php 
		$i++;
		}
		
		
		else if ($row['question_type'] == '2')
		{
		 ?>
	
	
   		<tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
			<td><?php echo $row['question']; ?></td>
		</tr>	
		<tr>
			<td></td>
			<td width="15%"><input type="radio" name="group[<?php echo $i; ?>]" value="1" required>A.<?php echo $row['answer_one']; ?></td>
				
		</tr>
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" name="group[<?php echo $i; ?>]" value="2" required>B.<?php echo $row['answer_two']; ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" name="group[<?php echo $i; ?>]" value="3" required>C.<?php echo $row['answer_three']; ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" name="group[<?php echo $i; ?>]" value="4" required>D.<?php echo $row['answer_four']; ?></td>
		</tr>
		
		
	<?php
		$i++;
		}
	$count++;}
	?>
	<tr>
		<td></td>
		<td align="center"><input type="submit" name="submit" value="Done" id="submit"></td>
	</tr>
  </table>
  </form>
  <br />
