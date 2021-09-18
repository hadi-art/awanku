<br><br>
<style>
  
html
{
 font-family:tahoma;
}
</style>
<?php
function getname($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}


function getclass($id)
{


$q="SELECT name FROM classlist_v2 WHERE id='$id'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

return $name;

}

	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>

<?php

  $id=$_GET['cid'];
  $classid=$_GET['classid'];
  
  
	
   

	$query="SELECT * FROM tbl_userinfo WHERE class_id='$classid'";
	$q=mysql_query($query);

?>
	
	
<p></p>
	<h2><center>Class : <?php echo getclass($classid ); ?></center></h2>
	<h2><center> Student Answer for  : <?php echo gettitle($id);?></center></h2>
<table border ="0" width="50%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="5" cellspacing="3">
	<tr bgcolor="#99CCFF">
   		<th width="9%" height="35">Bil</th>
      	<th width="55%">Student List Name</th>
	</tr>
	
<?php
	$count=1;
	while($row=mysql_fetch_array($q))
	{
	
?>
	<tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
		<td><a href="<?php echo base_url('index.php/lessonplanner_control/viewstudentanswer/?studentid='.$row["id"].'&titleid='.$id.'&classid='.$classid.''); ?>" title="<?php echo $row["title"]; ?>" rel="gb_page_center[800, 700]" target="_blank" style="text-decoration:none; color:#000000"><?php echo $row['fullname']; ?></a></td>
			
			</tr>
			

		
<?php
	 $count++;
	 
	} //while
?>
	</table>
