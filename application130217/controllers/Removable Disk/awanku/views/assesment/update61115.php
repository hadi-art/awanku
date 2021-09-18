<style>


html {
 font-family:tahoma;
}



</style>

<?php
	if (isset($_POST["edit"]))
{
		$question_id = $_GET['cid'];
		
 		$question =$_POST['soalan'];
		$ans_one  =$_POST['ans_one'];
		$ans_two  =$_POST['ans_two'];
		$ans_three=$_POST['ans_three'];
		$ans_four =$_POST['ans_four'];
		$correctanswer= $_POST['correctanswer'];
		
	

		$update = "update elearning_question set question='$question', answer_one='$ans_one', answer_two='$ans_two', answer_three='$ans_three', answer_four='$ans_four', correct_answer='$correctanswer' where question_id='$question_id'";
		
	if(mysql_query($update))
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




 <?php
 
 	$question_id = $_GET['cid']; 
	
 	$query="Select * from elearning_question where question_id='$question_id'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
?>

    <form method="post">
 	<table width="60%" height="30%" align="center">
  	<tr> 
        <td width="54"><input type="hidden" name="No" id="No" value="<?php $row['question_id'] ?>"></td>
		<td></td>
		<td></td>
    </tr>
	  
	<tr> 
        <td valign="top">Soalan</td>
		<td valign="top">:</td>
        <td valign="top"><textarea name="soalan" style="width:400px;height:95px;" required><?php echo $row["question"]; ?></textarea></td>
    </tr>
	
<?php
	if ($row["question_type"] == '1')
	{
?>	
	<tr>
		<td></td>
		<td></td>
		<?php
		if ($row["correct_answer"] == '1')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="1" required checked="checked"><input type="text" name="ans_one" value="<?php echo $row["answer_one"]; ?>"></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="1" required><input type="text" name="ans_one" value="<?php echo $row["answer_one"]; ?>"></td>
		
		<?php
		}
		?>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<?php		
		if ($row["correct_answer"] == '2')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="2" required checked="checked"><input type="text" name="ans_two" value="<?php echo $row["answer_two"]; ?>"></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="2" required><input type="text" name="ans_two" value="<?php echo $row["answer_two"]; ?>"></td>
		
		<?php
		}
		?>
	</tr>
	
  
<?php
	}
?>


<?php
	if ($row["question_type"] == '2')
	{
?>	
	<tr>
		<td></td>
		<td></td>
				<?php
		if ($row["correct_answer"] == '1')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="1" required checked="checked"><input type="text" name="ans_one" value="<?php echo $row["answer_one"]; ?>"></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="1" required><input type="text" name="ans_one" value="<?php echo $row["answer_one"]; ?>"></td>
		
		<?php
		}
		?>
	</tr>

	<tr>
		<td></td>
		<td></td>
				<?php
		if ($row["correct_answer"] == '2')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="2" required checked="checked"><input type="text" name="ans_two" value="<?php echo $row["answer_two"]; ?>"></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="2" required><input type="text" name="ans_two" value="<?php echo $row["answer_two"]; ?>"></td>
		
		<?php
		}
		?>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<?php if ($row["correct_answer"] == '3')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="3" required checked="checked"><input type="text" name="ans_three" value="<?php echo $row["answer_three"]; ?>"></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="3" required><input type="text" name="ans_three" value="<?php echo $row["answer_three"]; ?>"></td>
		
		<?php
		}
		?>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<?php
		if ($row["correct_answer"] == '4')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="1" required checked="checked"><input type="text" name="ans_four" value="<?php echo $row["answer_four"]; ?>"></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="1" required><input type="text" name="ans_four" value="<?php echo $row["answer_four"]; ?>"></td>
		
		<?php
		}
		?>
	</tr>
	

  
<?php
	}
?>

	<tr>
	  	<td></td>
		<td></td>
      	<td align="right"><input name="edit" class="button" type="submit" value="Update"></td>
    </tr>
</table>
	
