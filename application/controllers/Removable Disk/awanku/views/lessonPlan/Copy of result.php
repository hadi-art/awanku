<script type="text/javascript">
 	var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>

<script language="javascript"> 
opener.location.reload(true);
   self.close();
</script>

<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/gb_scripts.js"></script>
<link href="<?php echo $base; ?>include/greybox/gb_styles.css" rel="stylesheet" type="text/css" />


<style>
  
html
{
 font-family:tahoma;
}

</style>
<?php 
function getanswer($soalan)
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


	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>
<?php
$title_id = $_GET['titleid'];
?>

<h2><center><?php echo gettitle($title_id ); ?></center></h2>
<table border ="0" width="86%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center" cellpadding="10">

    <tr bgcolor="#99CCFF">
   		<th width="5%" height="35">Bil</th>
      	<th width="63%">Question</th>
		<th width="14%">Your Answer</th>
		<!--<th width="18%">Correct Answer</th>-->
	</tr>



<?php
	$title_id = $_GET['titleid'];
	$user_id = $_SESSION["log"]["userid"];
		
	$question="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($question);	
	
	$i=1;
	$bil=1;
	
	while($data=mysql_fetch_array($q))
	{
	
		$ans="ans_".$i;
	?>	
		<tr>
			<td><?php echo $bil; ?></td>
        	<td><?php echo $data["question"]; ?></td>
			<td></td>
			<td></td>
		</tr>
		
		
		<?php 
			
			if ( $data['question_type'] == '1')
			{
			?>
				<tr>
					<td></td>
					<td>A.<?php echo $data['answer_one']; ?> </td>
					<td></td>
					<td></td>
				</tr>
			
				<tr>
					<td></td>
					<td>B.<?php echo $data['answer_two']; ?> </td>
					<td align="center"><?php  
					 
					 if ( getanswer("$ans") == '1')
					 {
					 	echo "A";
					 }
					 
					 else
					 	echo "B";
					
					?></td>
					
					<?php /*?><td align="center"><?php 
					
					if ( $data["correct_answer"] == '1')
					 {
					 	echo "A";
					 }
					 
					 else
					 	echo "B";
					
					?></td><?php */?>
					
				</tr>
			
			
			<?php
			}
			?>
		
		
			<?php 
			
			if ( $data['question_type'] == '2')
			{
			?>
				<tr>
					<td></td>
					<td>A.<?php echo $data['answer_one']; ?> </td>
					<td></td>
					<td></td>
				</tr>
			
				<tr>
					<td></td>
					<td>B.<?php echo $data['answer_two']; ?> </td>
					<td></td>
					<td></td>
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
					<td align="center"><?php 
					
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
					
					 ?></td>
					 
					<?php /*?><td align="center"><?php 
					
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
					
					
					?></td><?php */?>
				</tr>
				
				
			
			<?php
			}
			?>
		
	
			
	
<?php	
	$i++;
	$bil++;
	}
			
?>
	<tr>
					<td></td>
					<td align="right"><b>Your score :</b></td>
					<td align="center"><b><?php echo getscore($title_id); ?>/<?php 
					 $q=mysql_query("SELECT COUNT(*) FROM elearning_question WHERE title_id = '$title_id'");
					list($int)=mysql_fetch_row($q); 
					echo $int;?></b>
					</td>
	</tr>
			
</table>

