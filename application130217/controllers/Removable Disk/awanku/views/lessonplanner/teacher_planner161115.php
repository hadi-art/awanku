
<?php
if(isset($_GET['delete']))
{
$id=$_GET['delete'];

$q="update ilearn_content set flag='0'  where id='$id'";

mysql_query($q);

} //delete
?>

<style>


html {
 font-family:tahoma;
}


</style>






<?php
function getfnama($uname)
{


$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

		
//close($conn);
//mysql_close($conn);

return $name;

}

function view_subject($idsubject){
$q="SELECT subject FROM ktube_subject WHERE id='$idsubject'";
list($int)=mysql_fetch_row(mysql_query($q));
return $int;
}

function get_viewbutton($user_id,$class_id){
$q="SELECT COUNT(*) FROM ilearn_info WHERE id='$user_id' AND class_id='$class_id'";
list($int)=mysql_fetch_row(mysql_query($q));
return $int;

}

function get_deletebutton($uploadid,$idcontent){
$q="SELECT COUNT(*) FROM ilearn_content WHERE id='$idcontent' AND upload_id='$uploadid'";
list($int)=mysql_fetch_row(mysql_query($q));		
return $int;

}

function get_editbutton($uploadid,$idcontent){


$q="SELECT COUNT(*) FROM ilearn_content WHERE id='$idcontent' AND upload_id='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}
function ellipse($str,$n_chars,$crop_str=' [...]')
{
    $buff=strip_tags($str);
    if(strlen($buff) > $n_chars)
    {
        $cut_index=strpos($buff,' ',$n_chars);
        $buff=substr($buff,0,($cut_index===false? $n_chars: $cut_index+1)).$crop_str;
    }
    return $buff;
}



//print_r($_SESSION);
#$classid=$_SESSION["ilearn"]["class_id"];

function gettitle($tid)
{
$q="SELECT title FROM ktube_content WHERE id='$tid'";
list($title)=mysql_fetch_row(mysql_query($q));
return $title;
}

function getquiz($tid)
{
$q="SELECT title FROM elearning_title WHERE title_id='$tid'";
list($title)=mysql_fetch_row(mysql_query($q));
return $title;
}

function getpath($tid)
{

$q="SELECT path FROM ktube_content WHERE id='$tid'";
list($path)=mysql_fetch_row(mysql_query($q));

return $path;
}


	
	if((isset($sem)) && (isset($week)))
	{
	//show lesson planner-------------------------------------------------------------------------------------------------------------
	
	$query="Select * from ilearn_content where sem='$sem' AND week='$week' AND subject_id= '$subject' AND flag= '1'";
	$result=mysql_query($query);
		
?>
<a href="<?php echo $site."/lessonplanner_control/add_plan/0/$sem/$week/$subject/add" ?>" title="Add :<?php echo view_subject($subject); ?>" rel="gb_page_center[700, 700]"><img src ="<?php echo $base; ?>/images/document_add.png" width = "25" height = "25"/>Add</a>




<div id="tablektube" style="width:auto">

<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>T.Name </center></th>
    <th><center>Class </center></th>
	<th><center>Topic</center></th>
	<th><center>Activity</center></th>
	<th><center>Files</center></th>
	<th><center>Action</center></th>
 </tr>
</thead>

<?php
	  

	while($row=mysql_fetch_array($result))
	{
	
	
	$fileidfromdb=$row["file_id"];
	//print_r($fileidfromdb);
	$qq=explode(",",$fileidfromdb);
	
	$quizidfromdb=$row["quiz_id"];
	//print_r($fileidfromdb);
	$qz=explode(",",$quizidfromdb);
	$classid = $row['class_id'];
	
	
	
	$q="SELECT name FROM classlist_v2 where id=$row[class_id]";
	list($name)=mysql_fetch_row(mysql_query($q));
	
?>
<tr> 	  	
      		<td><?php print $row['date'] ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo getfnama($row['upload_id']); ?></td>
	
		
			<td><?php echo $name; ?></td>
			<td style="padding:4px; "align="left"><a title="<?php echo $row["topic"]; ?>"href="<?php echo $base;?>index.php/lessonplanner_control/details?id=<?php echo $row["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666">
  
			 <?php echo $nama_supp=ellipse($row["topic"],50,$crop_str='...'); ?>
 			</a></td>
			<td><span style="text-align:left;"><?php echo nl2br($row['activity']); ?></span></td>
			<td>
		
			<ul>
			<?php
			for ($i = 0; $i < count($qq)-1; $i++)
			{
				$title = $qq[$i];
			
				$query="SELECT * FROM ktube_content WHERE id='$title'";
				$q=mysql_query($query);	
				$row1=mysql_fetch_array($q);
				
				if ($row1['flag'] == '1')
				{
				$title = $qq[$i];
				$query="SELECT * FROM ktube_content WHERE id='$title' and type2='Document'";
				$q=mysql_query($query);	
				$row2=mysql_fetch_array($q);
				
				if($row2["type2"]=="Document")
				{ 
				?>
				<p></p><li style="text-align:left"><a href ="<?php echo "$base".getpath($qq[$i]); ?>" style="color:#FF00FF; text-align:left"><?php echo gettitle($qq[$i]);?></a>
				<br>
				<?php
				}
				?>
				
				<?php
				$title = $qq[$i];
				$query="SELECT * FROM ktube_content WHERE id='$title' and type2='Video'";
				$q=mysql_query($query);	
				$row2=mysql_fetch_array($q);
				if($row2["type2"]=="Video")
				{
				?>
				<p></p><li style="text-align:left"><a href ="<?php echo "$base".getpath($qq[$i]); ?>" style="color:#660033; text-align:left"><?php echo gettitle($qq[$i]);?></a>
				<br>	
				<?php
				}
				?>
				<?php
				}
				else if ($row1['flag'] == '0')//deleted doc/vid
				{
			  	$title = $qq[$i];
				$query="SELECT * FROM ktube_content WHERE id='$title' and type2='Document'";
				$q=mysql_query($query);	
				$row2=mysql_fetch_array($q);
				
				if($row2["type2"]=="Document")
				{ 
				?>
				<p></p><li style="text-align:left"><?php echo gettitle($qq[$i]);?></a>&nbsp;&nbsp; Document Deleted
				<br>
				<?php
				}
				?>
				
				<?php
				$title = $qq[$i];
				$query="SELECT * FROM ktube_content WHERE id='$title' and type2='Video'";
				$q=mysql_query($query);	
				$row2=mysql_fetch_array($q);
				if($row2["type2"]=="Video")
				{
				?>
				<li style="text-align:left"><?php echo gettitle($qq[$i]);?></a>&nbsp; -&nbsp;Video Deleted
				<br>	
				<?php
				}
				?>
		<?php
			}
			}
		?>
        </ul>		
	
		 <ul>
		<?php
			for ($a = 0; $a < count($qz)-1; $a++)
			{

		?>
			<li style="text-align:left">Quiz Title : <a href="<?php echo base_url('index.php/lessonplanner_control/viewquestion/?cid='.$qz[$a].''); ?>"  rel="gb_page_center[900, 600]" target="_blank" style="text-align:left"><?php echo getquiz($qz[$a]);?></a></li>
			<br>	
		<?php
			}
		?>
        </ul>
			
			</td>
			<td>
			
			     
<?php
	$edit=get_editbutton($_SESSION["log"]["userid"],$row["id"]);
	if($edit==1)
	{
?>
	
		<a href="<?php echo "$site/lessonplanner_control/add_plan/$row[id]/$sem/$week/$subject/edit";?>" title="Edit :<?php echo view_subject($subject); ?>" rel="gb_page_center[700, 700]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a>

 		<a onClick="return confirm('Pasti Untuk Padam?')"  href="?delete=<?php echo $row["id"]; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>			   

	 <ul>
		<?php
		for ($i = 0; $i < count($qz)-1; $i++)
		{
		?>
		<a href="<?php echo base_url('index.php/lessonplanner_control/studentmark/?cid='.$qz[$i].'&classid='.$classid.''); ?>" title="<?php echo getquiz($qz[$i]);?>" rel="gb_page_center[850, 600]" target="_blank"><img src ="<?php echo $base; ?>/images/icon_scorecard3.png" width = "40" height = "40"/></a>
		<br>
		<a href="<?php echo base_url('index.php/lessonplanner_control/student_answer/?cid='.$qz[$i].'&classid='.$classid.''); ?>" title="Student Answer "><img src ="<?php echo $base; ?>/images/icon_intervention.gif" width = "40" height = "40"/></a>	
		<?php
		}
		?>
        </ul>
	
	
		<a href="<?php echo base_url('index.php/lessonplanner_control/lessonplannerpdf'); ?>">
		<img src ="<?php echo $base; ?>/images/pdf.png" width = "40" height = "40"/></a>
		
<?php
	}
	?>
			
			
			
			
			
			</td>
</tr>
<?php
	}
	
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

	
}//isset if((isset($sem)) && (isset($week)))
	
	
	
	
?>  
</div>



