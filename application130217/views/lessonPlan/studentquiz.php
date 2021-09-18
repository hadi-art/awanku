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
	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	
	function getsubject($id)
	{
	
	
	
	$q="SELECT subject FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	$name;
	
	$p="SELECT subject FROM ktube_subject WHERE subject_id='$name'";
	list($name2)=mysql_fetch_row(mysql_query($p));
	
	return $name2;
	
	}
	
	
	function getclass($id)
	{
	
	
	
	$q="SELECT name FROM classlist_v2 WHERE id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	

?>
<center>

<div style="width:65%; background-color:#FFFFFF" align="center" >


<?php 
	$user_id = $_SESSION["log"]["userid"];

	$classid = $_GET['cid'];

	$query="SELECT * FROM ilearn_content WHERE class_id='$classid'";
	$q=mysql_query($query);
	
?>

	<br />
 	<h3><center><?php echo getclass($classid); ?> QUIZES</center></h3>
	<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center" >
    <tr style="background:#CCFFCC">
   		<th width="4%" >Bil</th>
      	<th width="52%">Title</th>
    	<th width="19%">Subject</th>
		<th>View</th>
		
	</tr>
	  
	<?php
	$count=1;
	while($row=mysql_fetch_array($q))
	{
	
		$quizidfromdb=$row["quiz_id"];
		
		$qz=explode(",",$quizidfromdb);
	

		for ($i = 0; $i < count($qz)-1; $i++)
		{
		
				$studentid = $_SESSION["log"]["userid"]; 
				
				$title = $qz[$i];
			
				$query="SELECT * FROM elearning_history WHERE user_id='$studentid' and title_id='$title'";
				$q=mysql_query($query);	

				$row=mysql_fetch_array($q);
				
				
				
				if ($row['flag'] == '1')//student check jawapan
				{
				?>
			
				<tr>
				<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
			
				<td align="center"><?php echo gettitle($qz[$i]);?></a></td>
			
				<td align="center"><?php echo getsubject($qz[$i]);?></td>

				<td align="center"><a href="<?php echo base_url('index.php/lessonplan_control/result/?cid='.$qz[$i].'&classid='.$classid.'&studentid='. $_SESSION["log"]["userid"].''); ?>" title="<?php echo $row["title"]; ?>" rel="gb_page_center[900, 600]" target="_blank"><img src ="<?php echo $base; ?>/images/view.png" width = "30" height = "30"/></a></td>
				<?php
				}
				else if($row['flag'] == '0')//cikgu dah release jawapan
				{
				 echo '';
				?>
		
		</tr>
					
		<?php
		}
		}

	
	$count++;}
	?>
  </table>
  <br />
  <br />

</div>
</center>