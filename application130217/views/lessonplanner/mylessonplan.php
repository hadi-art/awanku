
<br><br><br>
<div id="tablektube" style="width:auto">

<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>T.Name </center></th>
    <th><center>Class </center></th>
	<th><center>
	Learning Area(s)
	</center></th>
	<th><center>
	Learning Activities
	</center></th>
   	<th><center>Remarks</center></th>
	<th><center>Action</center></th>
 </tr>
</thead>

<?php
	  

	while($row=mysql_fetch_array($result))
	{
	
	$tahun = $row['year'];
	
	if ($tahun == $year ) 
	{
		
	$fileidfromdb=$row["file_id"];
	//print_r($fileidfromdb);
	$qq=explode(",",$fileidfromdb);
	
	$quizidfromdb=$row["quiz_id"];
	//print_r($fileidfromdb);
	$qz=explode(",",$quizidfromdb);
	$classid = $row['class_id'];
	
	 $row['year'];
	
		if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18")
		{
				$q="SELECT level FROM classlist_v2 where level=$row[class_id]";
				list($name)=mysql_fetch_row(mysql_query($q));
		}
	
	else {
				$q="SELECT name FROM classlist_v2 where id=$row[class_id]";
				list($name)=mysql_fetch_row(mysql_query($q));

			}
	
		$datee=$row["date"];

?>
<tr> 	  	
      		<td><?php echo date('d-m-Y', strtotime($datee)); ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo getfnama($row['upload_id']); ?></td>
	
		
			<td><?php echo $name; ?></td>
			<td style="padding:4px; "align="left"><a title="<?php echo $row["topic"]; ?>"href="<?php echo $base;?>index.php/lessonplanner_control/details?id=<?php echo $row["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666">
  
			 <?php echo $nama_supp=ellipse($row["topic"],50,$crop_str='...'); ?>
 			</a></td>
			<td><span style="text-align:left;"><?php echo nl2br($row['activity']); ?></span></td>
			<?php /*?><td>
		
			<ul>
			<?php
			for ($i = 0; $i < count($qq)-1; $i++)
			{
				$title = $qq[$i];
			
				
				
				$query="SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.server_id=b.id and a.id='$title'";
				$q=mysql_query($query);	
				$row1=mysql_fetch_array($q);
				
				
				
				if ($row1["type2"] == "Document")
				{
					
					
					if($row1["flag"] == 1)
					{
					
						
				?>
				
				
				<p></p><li style="text-align:left"><a href ="<?php echo $row1["server_path"]."$row1[path]";?>" style="color:#FF00FF; text-align:left"><?php echo gettitle($qq[$i]);?></a>
				<br>
				
				<?php
					
					}
				
						else 
						{
						 	
							
							?>
				<p></p><li style="text-align:left"><?php echo gettitle($qq[$i]);?></a> - Document Deleted
				<br>
				<?php
						
						}
				
				
				}
				
				
				else 
				{
					
					
					if($row1["flag"] == 1)
					{
					
						
				?>
				
				
				<p></p><li style="text-align:left"><a href ="<?php echo $row1["server_path"]."$row1[path]";?>" style="color:#660033; text-align:left"><?php echo gettitle($qq[$i]);?></a>
				<br>
				
				<?php
					
					}
				
						else 
						{
						 	
							
							?>
				<p></p><li style="text-align:left"><?php echo gettitle($qq[$i]);?></a> - Video Deleted
				<br>
				<?php
						
						}
				
				
				}
				
					
			}
		?>
        </ul>
	
		 <ul>
		<?php
			for ($a = 0; $a < count($qz)-1; $a++)
			{
				
				$query="SELECT * FROM elearning_title WHERE title_id='$qz[$a]'";
				$q=mysql_query($query);	
				$row2=mysql_fetch_array($q);
				
				
				
				if($row2["flag"] == 1)
				{
						
				?>
					<li style="text-align:left">Quiz Title : <a href="<?php echo base_url('index.php/lessonplanner_control/viewquestion/?cid='.$qz[$a].''); ?>"  rel="gb_page_center[900, 600]" target="_blank" style="text-align:left"><?php echo getquiz($qz[$a]);?></a></li>
			<br>	
				
				<?php		
				}
				
					else 
					{
					
						
					?>
					
						<li style="text-align:left">Quiz Title : <?php echo getquiz($qz[$a]);?> - Quiz Deleted</li>
			<br>	
						
					<?php	
			 			
					}
				
		?>
			
		<?php
			}
		?>
        </ul>
			
			</td><?php */?>
            <td><?php if ($row['approve_remark']=="") { ?>
            No remark
            <?php }
			else {
				 print $row['approve_remark']; ?> - Remark by  <?php print getfnama($row['approve_by']);}
			?>
            </td>
			<td>
			
			     
<?php
	$edit=get_editbutton($_SESSION["log"]["userid"],$row["id"]);
	if($edit==1)
	{
?>
	
		<?php /*?><a href="<?php echo "$site/lessonplanner_control/add_plan/$row[id]/$sem/$week/$subject/edit";?>" title="Edit :<?php echo view_subject($subject); ?>" rel="gb_page_center[700, 500]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a><?php */?>
		
		
		<a href="<?php echo "$site/lessonplanner_control/editlessonplanner/$row[id]/$sem/$week/$subject/edit";?>" target="_blank" title="Edit :<?php echo view_subject($subject); ?>"><img src ="<?php echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a>
		
		
<a onClick="return confirm('Duplicate lesson ini?')"  href="?duplicate=<?php echo $row["id"]; ?>" title="Duplicate this lesson"><img src ="<?php echo $base; ?>/images/duplicate.png" width = "40" height = "40"/></a>

 		<a onClick="return confirm('Pasti Untuk Padam?')"  href="?delete=<?php echo $row["id"]; ?>" title="Delete this lesson"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>			   

	 <ul>
		<?php
		for ($i = 0; $i < count($qz)-1; $i++)
		{
		?>
		<a href="<?php echo base_url('index.php/lessonplanner_control/studentmark/?cid='.$qz[$i].'&classid='.$classid.''); ?>" title="<?php echo getquiz($qz[$i]);?>" rel="gb_page_center[850, 500]" target="_blank"><img src ="<?php echo $base; ?>/images/icon_scorecard3.png" width = "40" height = "40"/></a>
		<br>
		<a href="<?php echo base_url('index.php/lessonplanner_control/student_answer/?cid='.$qz[$i].'&classid='.$classid.''); ?>" title="Student Answer(<?php echo getquiz($qz[$i]);?>) "><img src ="<?php echo $base; ?>/images/icon_intervention.gif" width = "40" height = "40"/></a>	
		<?php
		}
		?>
        </ul>
	
	
		 <a href="<?php echo base_url('index.php/lessonplanner_control/lessonplannerpdf/?id='.$row['id'].''); ?>">
		<img src ="<?php echo $base; ?>/images/printer-2.png" width = "40" height = "40"/></a>
		
<?php
	}
	?>
			
			
			
			
			
			</td>
</tr>
<?php
	}
	
	}//if
?>   
</table>
<?php

//show lesson planner end-------------------------------------------------------------------------------------------------------------

//show assesment -------------------------------------------------------------------------------------------------------------
$datax= array(
		'base' => $base,
		'site' => $site,
		'sem' => $sem,
		'week' => $week,
		'subject' => $subject
		);
#$this->load->view("lessonplanner/assessmentlist",$datax);


//show assesment end-------------------------------------------------------------------------------------------------------------

	
//}//isset if((isset($sem)) && (isset($week)))
	
	
	
	
?>  
</div>

