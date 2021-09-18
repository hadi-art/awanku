<?php function getanswer($soalan)
{
	
	$user_id = $_SESSION["log"]["userid"];
	
	$q="SELECT $soalan FROM elearning_history WHERE user_id='$user_id'";
	$r=mysql_query($q);		
	list($ans)=mysql_fetch_row($r);



	return $ans;

}
function getscore($titleid)
{
	
	$user_id = $_SESSION["log"]["userid"];
	
	$q="SELECT score FROM elearning_history WHERE user_id='$user_id' and title_id='$titleid'";
	$r=mysql_query($q);		
	list($ans)=mysql_fetch_row($r);



	return $ans;

}

?>

<table border ="0" width="90%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="5" cellspacing="3">

    <tr bgcolor="#99CCFF">
   		<th width="4%" height="35">Bil</th>
      	<th>Question</th>
		<th width="15%">User Answer</th>
		<th width="17%">Correct Answer</th>
	</tr>



<?php
	 $title_id = $_GET['cid'];
	 $user_id = $_SESSION["log"]["userid"];
		
	$question="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($question);	
	
	$i=1;
	$bil=1;
	
	while($data=mysql_fetch_array($q))
	{
		$ans="ans_".$i;
		
		     if ( $data['question_type'] == '1')
		          {
	?>	
		             <tr>
		                	<td><?php echo $bil; ?></td>
        	                <td><?php echo $data["question"]; ?></td>
							<td></td>
							<td></td>
							
					</tr>
					
					<tr>
							<td></td>
							<td>A.<?php echo $data['answer_one']; ?> </td>
							<td align="center"><?php  
					 			    if ( getanswer("$ans") == '1')
										 {
					 						echo "A";
										 }
					 
										    else
					 							
										    echo "B";
									   
					
					?>
							<td><center><?php
			                        if ($data['correct_answer'] =='1')
			 							{
					                     	echo "A";
										}
					 
					 					   else
					 						
										   echo "B";
										?>
						    </center>
						    </td>					
					</tr>
					
					<tr>
							<td></td>
							<td>B.<?php echo $data['answer_two']; ?> </td>
        	    			<td></td>
							<td></td>
							</td>
					</tr>
<?php 
 
	}
		
		
		else if ($data['question_type'] == '2')
		{
		?>
		 <tr>
		                	<td><?php echo $bil; ?></td>
        	                <td><?php echo $data["question"]; ?></td>
							<td></td>
							<td></td>
							
					</tr>
					
					<tr>
							<td></td>
							<td>A.<?php echo $data['answer_one']; ?> </td>
							
							<td></td>
							<td></td>
					</tr>
					
					<tr>
							<td></td>
							<td>B.<?php echo $data['answer_two']; ?> </td>
							<td><center><?php  
					 			if ( getanswer("$ans") == '1')
										 {
					 						echo "A";
										 }
					 
					 						else if ( getanswer("$ans") == '2')
					 					 {
					 						echo "B";
										 }
					 
											else  if ( getanswer("$ans") == '3')
					 					 {
					 						echo "C";
					 					 }
					 
					 						if ( getanswer("$ans") == '4')
					 					 {
					 						echo "D";
					 					 }
					
					
					?>
							<td><center><?php
			                      if ( $data["correct_answer"] == '1')
										 {
					 						echo "A";
					 					 }
					 
					 						else if ( $data["correct_answer"] == '2')
					 					 {
					 						echo "B";
					 					 }
					 
					                        else  if ( $data["correct_answer"] == '3')
					 					 {
					 				        echo "C";
					 					 }
					 
					                       if ( $data["correct_answer"] == '4')
					 					 {
					 	                    echo "D";
					 					 }
										?>
							</center>
							</td>
					</tr>
					
					<tr>
					        <td></td>
							<td>C.<?php echo $data['answer_three']; ?> </td>
							<td></td>
							<td></td>
					</tr>
					
					<tr>
					        <td></td>
							<td>D.<?php echo $data['answer_four']; ?> </td>
        	    			<td ></td>
							<td></td>
					</tr>
					
					
					

		
<?php	
	

	
	}
		$bil++;
		$i++;
	}
?>
	            <tr>
							<td></td>
							<td></td>
							<td><strong>Your score :</strong></td>
							<td align="center"><strong><?php echo getscore("$title_id ") ?>/10</td>
					</tr>


</table>
