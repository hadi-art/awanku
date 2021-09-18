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
		function getname($studentid)
	{
	
	
	
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studentid'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	function getclass($id)
	{


	$q="SELECT name FROM classlist_v2 WHERE id='$id'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

	return $name;

	}
	
	
	
	function getscore($id,$studentid,$classid)
	{


	$q="SELECT score FROM elearning_history WHERE user_id='$studentid' and title_id='$id' and class_id='$classid'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

	return $name;

	}
?>

<?php
	  $id=$_GET['titleid'];
	  $studentid=$_GET['studentid'];
	  $classid=$_GET['classid'];
?>

<h3><center>Title: <?php echo gettitle($id); ?></center></h2>
<h3><center>Name: <?php echo getname($studentid); ?></center></h2>
<h3><center>Score: <?php echo getscore($id,$studentid,$classid); ?></center></h2>
<strong></strong>
 <form method="post">
<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="8" cellspacing="3">
    <tr bgcolor="#99CCFF">
   		<th width="5%" height="35">Bil</th>
      	<th width="95%">Question</th>
	</tr>

<?php

	  $id=$_GET['titleid'];
	
	$query="SELECT * FROM elearning_question WHERE title_id='$id'";
	$q=mysql_query($query);	

	$count=1;
	$i=1;
	while($row=mysql_fetch_array($q))
	{
	
		
		if ( $row['question_type'] == '1')
		{
		
		$studentid=$_GET['studentid'];
	 	$classid=$_GET['classid'];
		$qqq="select ans_$count from elearning_history where title_id='$_GET[titleid]' and class_id='$_GET[classid]' and user_id='$_GET[studentid]'";
		list($jawapan)=mysql_fetch_row(mysql_query($qqq));
		if($jawapan==1){$checked1="checked='checked'";$checked2="";$checked3="";$checked4="";}
		if($jawapan==2){$checked2="checked='checked'";$checked1="";$checked3="";$checked4="";}
		

		
		
	?> 
	
	    <tr>
			<td align="center"><input name="id"  type="hidden" value="bil" > <?php echo $count; ?></td>
    	
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
			<td width="15%"><input type="radio"  <?php echo $checked1; ?>  name="group[<?php echo $i; ?>]" value="1" required>A.<?php echo $row['answer_one']; ?></td>		
		</tr>
	
		<tr>
			<td></td>
			<td><input type="radio"  <?php echo $checked2; ?>  name="group[<?php echo $i; ?>]" value="2" required>B.<?php echo $row['answer_two']; ?></td>
			
		</tr>
		
		<?php 
		$i++;
		}
		
		
		else if ($row['question_type'] == '2')
		{
		$studentid=$_GET['studentid'];
	 	$classid=$_GET['classid'];
		$qqq="select ans_$count from elearning_history where title_id='$_GET[titleid]' and class_id='$_GET[classid]' and user_id='$_GET[studentid]'";
		list($jawapan)=mysql_fetch_row(mysql_query($qqq));
		if($jawapan==1){$checked1="checked='checked'";$checked2="";$checked3="";$checked4="";}
		if($jawapan==2){$checked2="checked='checked'";$checked1="";$checked3="";$checked4="";}
		if($jawapan==3){$checked3="checked='checked'";$checked2="";$checked1="";$checked4="";}
		if($jawapan==4){$checked4="checked='checked'";$checked2="";$checked3="";$checked1="";}

		
		
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
			<td width="15%"><input type="radio"  <?php echo $checked1; ?> name="group[<?php echo $i; ?>]" value="1" required>A.<?php echo $row['answer_one']; ?></td>
				
		</tr>
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" <?php echo $checked2; ?> name="group[<?php echo $i; ?>]" value="2" required>B.<?php echo $row['answer_two']; ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" <?php echo $checked3; ?> name="group[<?php echo $i; ?>]" value="3" required>C.<?php echo $row['answer_three']; ?></td>
		</tr>
		
		<tr>
			<td></td>
			<td width="15%"><input type="radio" <?php echo $checked4; ?> name="group[<?php echo $i; ?>]" value="4" required>D.<?php echo $row['answer_four']; ?></td>
		</tr>
		
		
	<?php
		$i++;
		}
	$count++;}
	?>
	<tr>
		<td></td>
		<td align="center"><!--<input type="submit" name="submit" value="Done" id="submit">--></td>
	</tr>
  </table>
  </form>
  <br />
	  