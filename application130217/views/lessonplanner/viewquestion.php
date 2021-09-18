<style>
  
html
{
 font-family:tahoma;
}

</style>
<?php
	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>

<?php
	
	$title_id = $_GET['cid'];
	
	$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($query);
	


?>

	<br />
 	<h2><center><?php echo gettitle($title_id ); ?></center></h2>
	<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="8" cellspacing="3">
    <tr bgcolor="#99CCFF">
   		<th width="5%" height="35">Bil</th>
      	<th width="95%">Question</th>
	</tr>
	  
<?php
	$count=1;
	while($row=mysql_fetch_array($q))
	{
		if ( $row['question_type'] == '1')
		{
	?> 
	
	
	    <tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
			<td><?php 
  			if($row['picture']=="")
				{
				echo '' ;
		  ?>
		<br />

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
 	  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/><p></p>' ;
  		 #$this->load->view('awanku/profile_picture',$data2);
			}
  		 ?>
    	<?php echo $row['question']; ?></td>
		</tr>	
		
		<tr>
			<td></td>
			<?php if ($row['correct_answer']=='1') 
			{?>
			<td style="color:#009900" width="15%">A.<?php echo $row['answer_one']; ?></td>
			<?php } 
				else 
				{?>
			<td width="15%">A.<?php echo $row['answer_one']; ?></td>
				<?php } ?>
		</tr>
	
		<tr>
			<td></td>
			<?php if ($row['correct_answer']=='2') 
			{?>
			<td style="color:#009900" width="15%">B.<?php echo $row['answer_two']; ?></td>
			<?php } 
				else 
				{?>
			<td width="15%">B.<?php echo $row['answer_two']; ?></td>
				<?php } ?>
		</tr>
		<?php }
		
		
		else if ($row['question_type'] == '2')
		{
		 ?>
	
	
   		<tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
			<td><?php 
  			if($row['picture']=="")
				{
				echo '' ;
		  ?>
		<br />

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
 	  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/><p></p>' ;
  		 #$this->load->view('awanku/profile_picture',$data2);
			}
  		 ?>
    	<?php echo $row['question']; ?></td>
		</tr>	
		<tr>
			<td></td>
			<?php if ($row['correct_answer']=='1') 
			{?>
			<td style="color:#009900" width="15%">A.<?php echo $row['answer_one']; ?></td>
			<?php } 
				else 
				{?>
			<td width="15%">A.<?php echo $row['answer_one']; ?></td>
				<?php } ?>
		</tr>
		
		<tr>
			<td></td>
			<?php if ($row['correct_answer']=='2') 
			{?>
			<td style="color:#009900" width="15%">B.<?php echo $row['answer_two']; ?></td>
			<?php } 
				else 
				{?>
			<td width="15%">B.<?php echo $row['answer_two']; ?></td>
				<?php } ?>
		</tr>
		
		<tr>
			<td></td>
			<?php if ($row['correct_answer']=='3') 
			{?>
			<td style="color:#009900" width="15%">C.<?php echo $row['answer_three']; ?></td>
			<?php } 
				else 
				{?>
			<td width="15%">C.<?php echo $row['answer_three']; ?></td>
				<?php } ?>
		</tr>
		
		<tr>
			<td></td>
			<?php if ($row['correct_answer']=='4') 
			{?>
			<td style="color:#009900" width="15%">D.<?php echo $row['answer_four']; ?></td>
			<?php } 
				else 
				{?>
			<td width="15%">D.<?php echo $row['answer_four']; ?></td>
				<?php } ?>
		</tr>
		
		
	<?php
		}
	$count++;}
	?>
  </table>
  <br />