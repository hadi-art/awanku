<?php
	
	$title_id = $_GET['cid'];
	
	$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($query);
?>


	<br />
 	
	<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="5" cellspacing="3">
    <tr bgcolor="#99CCFF">
   		<th width="5%" height="35">Bil</th>
      	<th colspan="2">Question</th>
	</tr>
	  
<?php

	$title_id = $_GET['cid'];
	$user_id = $_SESSION["log"]["userid"];
	
	$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($query);	
	
	
	$history="SELECT * FROM elearning_history WHERE title_id='$title_id' and user_id='$user_id'";
	$h=mysql_query($history);	

	$count=1;
	$i=1;
	while($row=mysql_fetch_array($q))
	{
		while($data=mysql_fetch_array($h))
		{
		
		if ( $row['question_type'] == '1')
		{
	?> 
	
	    <tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
			<td colspan="2"><?php echo $row['question']; ?></td>
		</tr>	
		
		<tr>
			<td></td>
			<td width="75%">A.<?php echo $row['answer_one']; ?></td>		
		</tr>
	
		<tr>
			<td></td>
			<td>B.<?php echo $row['answer_two']; ?></td>
			
		</tr>
		
		<tr>
			   <td></td>
			   <td></td>
			<td align="right" width="15%">Jawapan: <?php
			 if ($row['correct_answer'] =='1')
			 	{
					echo "A."; echo $row['answer_one'];
				}
				else if ($row['correct_answer'] =='2')
				{
					 echo "B."; echo $row['answer_two'];			 	}
			  ?>		     </td>
		</tr>
		
			
		
		
		<?php 
		$i++;
		}
		
		
		else if ($row['question_type'] == '2')
		{
		 ?>
	
	
   		<tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
			<td colspan="2"><?php echo $row['question']; ?></td>
		</tr>	
		<tr>
			<td></td>
			<td width="75%">A.<?php echo $row['answer_one']; ?></td>
				
		</tr>
		
		<tr>
			<td></td>
			<td width="75%">B.<?php echo $row['answer_two']; ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td width="75%">C.<?php echo $row['answer_three']; ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td width="75%">D.<?php echo $row['answer_four']; ?></td>
		</tr>
		
		  <tr>
			   <td></td>
			   <td></td>
			<td align="right" width="15%">Jawapan: <?php
			 if ($row['correct_answer'] =='1')
			 	{
					echo "A."; echo $row['answer_one'];
				}
				
					else if ($row['correct_answer'] =='2')
					{
					 	echo "B."; echo $row['answer_two'];
			 		}
				
						else if ($row['correct_answer'] =='3')
						{
							echo "C."; echo $row['answer_three'];
			 			}
				
							else if ($row['correct_answer'] =='4')
							{
				 				echo "D."; echo $row['answer_four'];
			 				}
				
			  ?>		     </td>
				
		</tr>
		
		
	<?php
		$i++;
		}
	$count++;}}
	?>

  </table>

  <br />