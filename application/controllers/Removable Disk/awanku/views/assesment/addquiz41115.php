<style type="text/css">


html {
 font-family:tahoma;
}

.btn {
  -webkit-border-radius: 31;
  -moz-border-radius: 31;
  border-radius: 31px;
  font-family: Arial;
  color: #ffffff;
  font-size: 19px;
  background: #8c8f91;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}


.finish {
  background: #dce0dc;
  background-image: -webkit-linear-gradient(top, #dce0dc, #999999);
  background-image: -moz-linear-gradient(top, #dce0dc, #999999);
  background-image: -ms-linear-gradient(top, #dce0dc, #999999);
  background-image: -o-linear-gradient(top, #dce0dc, #999999);
  background-image: linear-gradient(to bottom, #dce0dc, #999999);
  -webkit-border-radius: 26;
  -moz-border-radius: 26;
  border-radius: 26px;
  font-family: Arial;
  color: #030303;
  font-size: 19px;
  padding: 1px 16px 4px 15px;
  text-decoration: none;
}

.finish:hover {
  background: #dbdbdb;
  text-decoration: none;
}

</style>

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


<?php
	function getsubject($id)
	{
	
	
	
	$q="SELECT subject FROM ktube_subject WHERE subject_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>

<?php 
	
	function gettitle($id)
	{
	
	$q="SELECT title_id FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
	
	return $name;
	
	}
	
?>

<?php 

	function getuploadid($id)
	{
	
	$q="SELECT upload_by FROM elearning_title WHERE upload_by='$id'";
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


 	header ('Location: ' . $_SERVER['REQUEST_URI']);
    exit();

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


 	header ('Location: ' . $_SERVER['REQUEST_URI']);
    exit();

}

?>



<div id="content" style="background:#FFFFFF;width:68%; margin-left:10px;height:auto; float:left;margin-top:10px; border-radius: 20px; ">
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
	
	<table width="85%">
		<tr>
		
			<td width="133"><strong>Title</strong></td>
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
			<td width="184"><button style="width:auto" id="btn" class="btn"><a href="?true=<?php echo $data["title_id"]; ?>&type=1" style="color:#000000;text-decoration:none; font-size:small"><font color="#FFFFFF">True / False</a></td>
			&nbsp; &nbsp;
			<td width="211"><button style="width:auto%" class="btn"><a href="?choice=<?php echo $data["title_id"]; ?>&type=2" style="color:#000000; text-decoration:none; font-size:small"><font color="#FFFFFF">Multiple Choice</a></td>
		</tr>	
	
	</table>	
	
	
	
<?php							
if(isset($_GET['true']))
{
	$type = $_GET['type'];
?>	
	
	<form method="post">
	<table width="71%" cellpadding="5%" cellspacing="5%" >
		<tr>
		<td valign="top">Question</td>
			<td width="8" valign="top">:</td>
			<td width="434"><textarea name="truefalse" style="width:400px;height:95px;" required></textarea></td>
		</tr>
		<tr>
			<td width="63">Answer</td>
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
	<table width="74%" cellpadding="5%" cellspacing="5%">
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
	<table border ="1" width="95%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center" >
    <tr bgcolor="#99CCFF">
   		<th width="5%">Bil</th>
      	<th width="38%">Question</th>
    	<th>A1</th>
		<th>A2</th>
		<th>A3</th>
		<th>A4</th>
		<th>Action </th>
		
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
		
		<td width="13%"><center><?php echo $row['answer_one']; ?></center></td>
		<td width="15%"><center><?php echo $row['answer_two']; ?></center></td>
		<td width="15%"><center><?php echo $row['answer_three']; ?></center></td>
		<td width="15%"><center><?php echo $row['answer_four']; ?></center></td>
		<td width="6%"><center>
		<a href="<?php echo base_url('index.php/assesment_control/update?cid='.$row["question_id"].''); ?>" rel="gb_page_center[500, 300]" target="_blank"><img src ="<?php echo $base; ?>/images/edit2.png" width = "30" height = "30"/></a>
		</center></td>
		
		
		
	</tr>
	</form>
	<?php
	
	$count++;}
	?>
  </table>
  <br />
  <br />	
	
<?php } ?>

	<a class="finish" href="<?php echo $site; ?>/assesment_control/createquiz" style="color:#000000; text-decoration:none; font-size:small">Finish</a>
</center>
  <br />
  <br />
</div>
</div>