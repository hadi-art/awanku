Assesment

<table id="tablektubekeywords" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>T.Name </center></th>
    <th><center>Class </center></th>
	<th><center>Topic</center></th>
	<th><center>Objective</center></th>
	<th><center>Activity</center></th>
	<th><center>Outcome</center></th>
	<th><center>Files</center></th>
	<th><center>Action</center></th>
 </tr>
</thead>
<tbody> 
<?php
	 $query="Select * from ilearn_content where sem='$sem' AND week='$week' AND subject_id= '$subject' AND flag= '1'";
	$result=mysql_query($query);

	while($row=mysql_fetch_array($result))
	{
	
	$fileidfromdb=$row["file_id"];
	//print_r($fileidfromdb);
	$qq=explode(",",$fileidfromdb);
	
?>

	  	<tr> 	  	
      	<td><?php print $row['date'] ?></td>
		<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
		<td><?php echo getfnama($row['upload_id']); ?></td>
		<?php		
		$q="SELECT name FROM tbl_classlist where id=$row[class_id]";
		list($name)=mysql_fetch_row(mysql_query($q));
		?>
		
		<td><?php echo $name?></td>
		
		<?php
		#nl2br($text)
		?>
		
      	<td><?php echo $row['topic'] ?></td>
		<td><?php echo nl2br($row['objective']); ?></td>
		<td><span style="text-align:left;"><?php echo nl2br($row['activity']); ?></span></td>
		<td><?php echo nl2br($row['outcome']); ?></td>
		
		<td>
        <ul>
		<?php
		for ($i = 0; $i < count($qq)-1; $i++)
		{
		?>
		<li><a href ="<?php echo "$base".getpath($qq[$i]); ?>"><?php echo gettitle($qq[$i]);?></a></li>
		<br>	
		<?php
		}
		?>
        </ul>		</td>

        
        <td>
        <!--<a href="/i-learnv2/index.php/main_control/teacher_add?id=<?php //echo $row['id'];?>&subject_id=<?php //echo $_GET["subject_id"]; ?>&editF"><img src ="<?php //echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a>-->
<?php
$edit=get_editbutton($_SESSION["log"]["userid"],$row["id"]);
if($edit==1){
?>
<a href="<?php echo "$site/lessonplanner_control/add_plan/$row[id]/$sem/$week/$subject/edit";?>" title="Edit :<?php echo view_subject($subject); ?>" rel="gb_page_center[700, 700]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a>

 <a onClick="return confirm('Pasti Untuk Padam?')"  href="?delete=<?php echo $row["id"]; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>			   
<?php
}
?></td>
   
<?php
	
	}
	
?>   
</tr>
</tbody>
</table>