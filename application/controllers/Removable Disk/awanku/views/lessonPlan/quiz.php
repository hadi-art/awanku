<style>
  
html
{
 font-family:tahoma;
}

</style>


<?php
#print_r($_SESSION);

	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>

<?php if(isset($_POST['submit']))
{
		
		$title_id = $_GET['cid'];		
		$upload_by =  $_SESSION["log"]["userid"];
		$class_id =  $_SESSION["log"]["class_id"];
		

		//$group1 = $_POST['group']['1'];
		//$group2 = $_POST['group']['2'];
		//$group3 = $_POST['group']['3'];
		//$group4 = $_POST['group']['4'];
		
		
		$insert=mysql_query("insert into elearning_history set user_id='$upload_by',title_id='$title_id ',class_id='$class_id'");
		

		//$insert=mysql_query("update elearning_history set score='$score' where title_id='$title_id' and user_id='$upload_by' ");
//$insert=mysql_query("insert into elearning_history set user_id='$upload_by',title_id='$title_id ', ans_1='$group1', ans_2='$group2',ans_3='$group3',ans_4='$group4',ans_5='$group5', score='$score'");

		$a=1; 
		
		while ($a <= count($_POST['group']))
    	{	
		
		
			$ans="ans_".$a;
			$studentans =  $_POST['group'][$a];
			
			$query=mysql_query("update elearning_history set $ans='$studentans', flag=1 where title_id='$title_id' and user_id='$upload_by' ");
		
		$a++;
		}
		
		
		
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
		
		
		
		list($total_question)=mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM elearning_question WHERE title_id='$title_id'"));
		$percentage=($score/$total_question) * 100;
		
		if($percentage<19.99){
		$prestasiid=1;
		}
		
		else if($percentage>=20 && $percentage<40){
		$prestasiid=2;
		}
		else if($percentage>=40 && $percentage<60){
		$prestasiid=3;
		}
		else if($percentage>=60 && $percentage<80){
		$prestasiid=4;
		}
		else{
		$prestasiid=5;
		}
		
		
		echo $qq="update elearning_history set score='$score',percentage='$percentage',prestasi='$prestasiid' where title_id='$title_id' and user_id='$upload_by'";
		$final=mysql_query($qq);
		
		
		 //$q=mysql_query("SELECT COUNT(*) FROM elearning_question WHERE title_id = '$title_id'");
					//list($int)=mysql_fetch_row($q); 
					//echo $int;
?>					
				<script type="text/Javascript">
			<!--
				alert("Quiz Successful!");
				
	-->
			</script>
			
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
					
<?php	
}//if isset post

?>






<?php
	$title_id = $_GET['cid'];
?>

<h2><center><?php echo gettitle($title_id ); ?></center></h2>
 <form method="post">
<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="8" cellspacing="3">
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
					<?php 
  			if($row['picture']=="")
			{
		  ?>
			<td><?php echo $row['question']; ?></td>

   			<?php  
			}
			else
			{
 			 $data = $row['picture'];
	 
	 		$data2= array(
			'base' => $base,
			'site' => $site,
			'nama' => $nama
			);
			?>
			<td>
			<?php
 	  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/><p></p>';
	  ?>
	  <br>
	 <?php echo nl2br($row['question']); ?></td>
	  	
	  <?php
  		 #$this->load->view('awanku/profile_picture',$data2);
			}
  		 ?>
    	
			
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
						<?php 
  			if($row['picture']=="")
			{
		  ?>
			<td><?php echo $row['question']; ?></td>

   			<?php  
			}
			else
			{
 			 $data = $row['picture'];
	 
	 		$data2= array(
			'base' => $base,
			'site' => $site,
			'nama' => $nama
			);
			?>
			<td>
			<?php
 	  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/><p></p>';
	  ?>
	  <br>
	  <?php echo  nl2br ($row['question']); ?></td>
	  	
	  <?php
  		 #$this->load->view('awanku/profile_picture',$data2);
			}
  		 ?>
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
