
<?php
if(isset($_GET['delete']))
{
$id=$_GET['delete'];

$q="delete from ilearn_content where id='$id'";

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




<div id="tablektube" style="width:110%">

<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
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
        </ul>		
	
		 <ul>
		<?php
			for ($a = 0; $a < count($qz)-1; $a++)
			{
		?>
			<li><a href="<?php echo base_url('index.php/lessonplanner_control/viewquestion/?cid='.$qz[$a].''); ?>"  rel="gb_page_center[900, 600]" target="_blank"><?php echo getquiz($qz[$a]);?></a></li>
			<br>	
		<?php
			}
		?>
        </ul>
			
			</td>
			<td>
			
			        <!--<a href="/i-learnv2/index.php/main_control/teacher_add?id=<?php //echo $row['id'];?>&subject_id=<?php //echo $_GET["subject_id"]; ?>&editF"><img src ="<?php //echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a>-->
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
		<?php
		}
		?>
        </ul>
		
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



