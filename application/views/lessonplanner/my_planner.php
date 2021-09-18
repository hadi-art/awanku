
<?php


//print_r($_SESSION);
$sesi_user = $_SESSION["log"]["userid"];

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	
	$q="update ilearn_content set flag='0'  where id='$id'";
	
	mysql_query($q);
	
		// ----------------------------------------- delete dr table ilearn_status ----------------------------------
	
	$r="SELECT upload_id,week,sem,year,approve_status from ilearn_content where id='$id'";
	list($uuid,$week,$sem,$year,$app_stat)=mysql_fetch_row(mysql_query($r)); 

	$sta="select teacher_id,submit,waiting, approve from ilearn_status where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";
	list($tod,$sub,$waiting,$approve)=mysql_fetch_row(mysql_query($sta));

			if($app_stat=='3'){
				
					$rqstat="SELECT COUNT(*) FROM ilearn_content WHERE upload_id='$sesi_user' AND sem='$sem' AND week='$week' AND year='$year' AND flag='1' AND (approve_status='3' OR approve_status='1')";
					list($tot_app)=mysql_fetch_row(mysql_query($rqstat));
					$tot_app;
					$fstat="update ilearn_status set submit='$tot_app', waiting='$tot_app' where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";
					mysql_query($fstat);
					//die();
			}
			if($app_stat=='1'){
				
					$rqstat="SELECT COUNT(*) FROM ilearn_content WHERE upload_id='$sesi_user' AND sem='$sem' AND week='$week' AND year='$year' AND flag='1' AND approve_status='1'";
					list($tot_app)=mysql_fetch_row(mysql_query($rqstat));
				
					$rqstat1="SELECT COUNT(*) FROM ilearn_content WHERE upload_id='$sesi_user' AND sem='$sem' AND week='$week' AND year='$year' AND flag='1' AND (approve_status='3' OR approve_status='1')";
					list($tot_app1)=mysql_fetch_row(mysql_query($rqstat1));
		
			$fstat="update ilearn_status set approve='$tot_app',submit='$tot_app1', waiting='$tot_app1' where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";
			mysql_query($fstat);
		
				
			}
			else 
			{
				}
	
//die();


} //delete


if(isset($_GET['approve']))
{ 
	
	$date = date('d-m-Y H:i:s');
	echo '<script language="javascript">';
	echo 'alert("Lesson Planner Approved")';
	echo '</script>';

	$title_id = $_GET['id'];
	
	
	$query="update ilearn_content set approve_status='1', approve_by='$sesi_user', approve_date='$date' where id='$title_id'";
	$result=mysql_query($query);
	
	//-----------------------------------------------------------  ilearn_status  --------------------------------------------------------------------
	
			 $stat = "select teacher_id, approve from ilearn_status where teacher_id='$sesi_user' AND week='$week' AND sem='$sem' AND year='$year'";
		 list($tid,$approve)=mysql_fetch_row(mysql_query($stat));
	 
		// if($tid=='$uuid'){
			 if($approve==''){
				 
			 $sql ="UPDATE ilearn_status set approve ='1' where teacher_id='$sesi_user' AND week='$week' AND sem='$sem' AND year='$year'";	 
			 mysql_query($sql);}
		 	else {
				$q = "select approve from ilearn_status where teacher_id='$sesi_user' AND week='$week' AND sem='$sem' AND year='$year'";
				list($app)=mysql_fetch_row(mysql_query($q));

				$fapp = $app+1;
								
			 $sql ="update ilearn_status set approve='$fapp' where teacher_id ='$sesi_user' AND week='$week' AND sem='$sem' AND year='$year'";	 
			 mysql_query($sql);

			}


		}

if(isset($_GET['approveAll']))
{ 
	
	$date = date('d-m-Y H:i:s');
	echo '<script language="javascript">';
	echo 'alert("Lesson Planner Approved")';
	echo '</script>';

	//$up_id = $_GET['id'];
	
	
	
	echo $query="update ilearn_content set approve_status='1', approve_by='$sesi_user', approve_date='$date' where subject_id='$subject' AND sem='$sem' AND week='$week' AND year='$year' AND approve_status='3' AND flag='1'";
	//$result=mysql_query($query);
	
		 "<script>window.refresh();</script>";

	//-------------------------------------------------------------------  ilearn_status  -------------------------------------------------------
	
	$rqstat="SELECT COUNT(*) FROM ilearn_content WHERE upload_id='$sesi_user' AND sem='$sem' AND week='$week' AND year='$year' AND flag='1' AND approve_status='1'";
	list($tot_app)=mysql_fetch_row(mysql_query($rqstat));
					
			$sql ="update ilearn_status set approve='$tot_app' where teacher_id ='$sesi_user' AND week='$week' AND sem='$sem' AND year='$year'";	 
			 mysql_query($sql);
}



if(isset($_GET['duplicate']))
{
$id=$_GET['duplicate'];

$q="INSERT INTO ilearn_content
(upload_id,subject_id,file_id,topic,objective,activity,outcome,class_id,sem,WEEK,MONTH,DATE,year,datePost,Ftime,Ttime,flag,quiz_id,global_context,concept,inquiry,approaches,existing_knowledge,
source,description1,description2,description3,remarks,ibprofile_id,toolkit_id ) 
SELECT 
upload_id,subject_id,file_id,topic,objective,activity,outcome,class_id,sem,WEEK,MONTH,DATE,year,datePost,Ftime,Ttime,flag,quiz_id,global_context,concept,inquiry,approaches,existing_knowledge,
source,description1,description2,description3,remarks,ibprofile_id,toolkit_id FROM ilearn_content WHERE id='$id'";

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


	if( (isset($sem)) && (isset($week)) )
	{
		
	$query="Select * from ilearn_content where sem='$sem' AND week='$week' AND subject_id= '$subject' AND year='$year' AND flag= '1' AND upload_id = '$sesi_user' ORDER BY date, ftime";
	$result=mysql_query($query);
		
?>

<?php /*?><a href="<?php echo $site."/lessonplanner_control/addlessonplanner/0/$sem/$week/$subject/add" ?>" title="Add :<?php echo view_subject($subject); ?>" target="_blank" ><img src ="<?php echo $base; ?>/images/document_add.png" width = "25" height = "25"/>Add</a><?php */?>




<a href="<?php echo $site."/lessonplanner_control/addlessonplanner/0/$sem/$week/$subject/add" ?>" title="Add :<?php echo view_subject($subject); ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" ><img src ="<?php echo $base; ?>/images/document_add.png" width = "25" height = "25"/>Add</a>

<div id="tablektube" style="width:auto">
<a href="<?php echo $site."/lessonplanner_control/teacher_planner/$sem/$week/$subject/$year" ?>">Klik For Review Lesson Planner </a><br><br>


<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Bil</center></th>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>T.Name </center></th>
    <th><center>Class </center></th>
	<th><center>Learning Area(s)</center></th>
<?php /*?>	<th><center>Learning Activities</center></th><?php */?>	
	<th><center>Files</center></th>
    <th><center>Action</center></th>
   	<th><center>Review</center></th>
    
 </tr>
</thead>

<tr style="background-color:#FFC">
			<td height="74" colspan="8">Check For Whole Week ( Mon - Fri )</td>
            <td><a onClick="return confirm('Confirm to Approve')"  href="?approveAll&subject_id=<?php echo $subject; ?>&sem=<?php echo $sem; ?>&week=<?php echo $week; ?>&year=<?php echo $year;?>" title="Approve lesson plan"><input name="submit" type="submit" alt="submit" value="CHECK ALL"></a>
</td>
</tr>

<?php
	  
$bil=1;
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
	
		if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")

		{
 				$q="SELECT * FROM class_set WHERE flag ='1' and subject_id=$subject and id=$row[class_id]";
				$file=mysql_fetch_array(mysql_query($q));	
					
				$gset = $file["group_set"];
				$form = $file["form"];
				$clas_name=$file["clas_name"];
				$name = 'Form '.$form.$clas_name.'-'.$gset;

		}

	else {
				$q="SELECT name FROM classlist_v2 where id=$row[class_id]";
				list($name)=mysql_fetch_row(mysql_query($q));

			}
	
		$datee=$row["date"];
		$hariapadong=date('D', strtotime($datee));


?>
<tr> 	  	<td><?php echo $bil;?></td>
      		<td><?php echo $hariapadong."<br>".date('d-m-Y', strtotime($datee)); ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo getfnama($row['upload_id']); ?></td>
	
		
			<td><?php echo $name; ?></td>
			<td style="padding:4px; "align="left">
            
            
            <?php
			if ($row['approve_status']=="3" && ($row['req_app_1'] == $sesi_user || $row['req_app_2'] == $sesi_user || $row['req_app_3'] == $sesi_user)  ) 
			{
			?>	
				<a title="<?php echo $row["topic"]; ?>"href="<?php echo $base;?>index.php/lessonplanner_control/detailstoApprove?id=<?php echo $row["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=1700,height=750'); return false" style="color:#666666">
			 <?php echo $nama_supp=ellipse($row["topic"],20,$crop_str='...'); ?>
 			</a>
            <?php	
			}
			
			
			else
			{
			
			?>
            
            <a title="<?php echo $row["topic"]; ?>"href="<?php echo $base;?>index.php/lessonplanner_control/details?id=<?php echo $row["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666">
  
			 <?php echo $nama_supp=ellipse($row["topic"],20,$crop_str='...'); ?>
 			</a>
            
            <?php
			}
			?>
            
            
            </td>
<?php /*?>			<td><span style="text-align:left;"><?php echo nl2br($row['activity']); ?></span></td>
<?php */?>			<td>
		
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
				
				
				<p></p><li style="text-align:left"><a href ="<?php echo $row1["server_path"]."$row1[path]";?>" style="color:#FF00FF; text-align:left"><?php $stitle = gettitle($qq[$i]); echo $fstitle=ellipse($stitle,5,$crop_str='...'); ?>

				<br>
				
				<?php
					
					}
				
						else 
						{
						 	
							
							?>
				<p></p><li style="text-align:left"><?php $stitle = gettitle($qq[$i]); echo $fstitle=ellipse($stitle,5,$crop_str='...'); ?></a> - Document Deleted
				<br>
				<?php
						
						}
				
				
				}
				
				
				else 
				{
					
					
					if($row1["flag"] == 1)
					{
					
						
				?>
				
				
				<p></p><li style="text-align:left"><a href ="<?php echo $row1["server_path"]."$row1[path]";?>" style="color:#660033; text-align:left"><?php $stitle = gettitle($qq[$i]); echo $fstitle=ellipse($stitle,5,$crop_str='...'); ?></a>
				<br>
				
				<?php
					
					}
				
						else 
						{
						 	
							
							?>
				<p></p><li style="text-align:left"><?php $stitle = gettitle($qq[$i]); echo $fstitle=ellipse($stitle,5,$crop_str='...'); ?></a> - Video Deleted
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
			
			</td>
   		<td>
			
			     
<?php
	$edit=get_editbutton($_SESSION["log"]["userid"],$row["id"]);
	if($edit==1)
	{
?>
	
		<?php /*?><a href="<?php echo "$site/lessonplanner_control/add_plan/$row[id]/$sem/$week/$subject/edit";?>" title="Edit :<?php echo view_subject($subject); ?>" rel="gb_page_center[700, 500]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a><?php */?>
		
		
		<a href="<?php echo "$site/lessonplanner_control/editlessonplanner/$row[id]/$sem/$week/$subject/edit";?>" target="_blank" title="Edit :<?php echo view_subject($subject); ?>"><img src ="<?php echo $base; ?>/images/edit2.png" width = "40" height = "40"/></a>
		
		
<a onClick="return confirm('Duplicate lesson plan?')"  href="?duplicate=<?php echo $row["id"]; ?>" title="Duplicate this lesson"><img src ="<?php echo $base; ?>/images/duplicate.png" width = "40" height = "40"/></a>

 		<a onClick="return confirm('Confirm delete?')"  href="?delete=<?php echo $row["id"]; ?>" title="Delete this lesson"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>			   

	 <ul>
		<?php
		for ($i = 0; $i < count($qz)-1; $i++)
		{
			if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")

		{
		?>
        
        		<a href="<?php echo base_url('index.php/lessonplanner_control/studentmark/?cid='.$qz[$i].'&group='.$classid.''); ?>" title="<?php echo getquiz($qz[$i]);?>" rel="gb_page_center[850, 500]" target="_blank"><img src ="<?php echo $base; ?>/images/icon_scorecard3.png" width = "40" height = "40"/></a>
		<br>
		<a href="<?php echo base_url('index.php/lessonplanner_control/student_answer/?cid='.$qz[$i].'&group='.$classid.''); ?>" title="Student Answer(<?php echo getquiz($qz[$i]);?>) "><img src ="<?php echo $base; ?>/images/icon_intervention.gif" width = "40" height = "40"/></a>	

        
        <?php } else { ?>
		<a href="<?php echo base_url('index.php/lessonplanner_control/studentmark/?cid='.$qz[$i].'&classid='.$classid.''); ?>" title="<?php echo getquiz($qz[$i]);?>" rel="gb_page_center[850, 500]" target="_blank"><img src ="<?php echo $base; ?>/images/icon_scorecard3.png" width = "40" height = "40"/></a>
		<br>
		<a href="<?php echo base_url('index.php/lessonplanner_control/student_answer/?cid='.$qz[$i].'&classid='.$classid.''); ?>" title="Student Answer(<?php echo getquiz($qz[$i]);?>) "><img src ="<?php echo $base; ?>/images/icon_intervention.gif" width = "40" height = "40"/></a>	
		<?php
		}//else
		} // for
		?>
        
        </ul>
	
	
		 <a href="<?php echo base_url('index.php/lessonplanner_control/lessonplannerpdf/?id='.$row['id'].''); ?>" target="_blank">
		<img src ="<?php echo $base; ?>/images/printer-2.png" width = "40" height = "40"/></a>
		
<?php
	}
	?>
			</td>
                             <td>
						
						<?php 
						
						
					
						
						if ($row['approve_status']=="0") 
						{ ?>
						
                        	Draft
                            
						<?php 
						}
						
						
						else if ($row['approve_status']=="3") 
						{ ?>
						
                        	Waiting for Review
                            
                            
                            
						<?php 
						}
						
						
						else
						{
							
						if ($row['approve_remark']=="") 
						{ ?>
						
                            Review by  <b> <?php print getfnama($row['approve_by']);
                           
                            echo "<br></b>";
                            echo $row['approve_date'];
			 			}
						
						else 
						{
							
							$p=$row['approve_by'];
							$q="SELECT title FROM tbl_userinfo WHERE id='$p'";
							list($t)=mysql_fetch_row(mysql_query($q));
			
							 print $row['approve_remark']; ?> - Review by <b> <?php echo $t; print getfnama($row['approve_by']);
							 
							 echo "<br></b>";
							 echo $row['approve_date'];
							 
						}
				 
				}
			?> 
            
             <?php
			if ($row['approve_status']=="3" && ($row['req_app_1'] == $sesi_user || $row['req_app_2'] == $sesi_user || $row['req_app_3'] == $sesi_user)  ) 
			{
			?>
					<br />
                    <br />
                   
                   <a onClick="return confirm('Confirm to Approve')"  href="?approve&id=<?php echo $row["id"]; ?>" title="Approve lesson plan"><input name="submit" type="submit" alt="submit" value="CHECK"></a>	
                   
                  
			<?php
			}
			?>
            
            </td>
</tr>
<?php
	} $bil++;
	
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

	

	}

