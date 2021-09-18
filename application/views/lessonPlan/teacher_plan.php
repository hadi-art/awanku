
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

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

$q="delete from tbl_content where id='$id'";

mysql_query($q);

} //delete
?>

<?php
function getfnama($uname){


$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)=mysql_fetch_row(mysql_query($q));
		

		
//close($conn);
//mysql_close($conn);

return $name;

}


function getquiz($tid)
{
$q="SELECT title FROM elearning_title WHERE title_id='$tid'";
list($title)=mysql_fetch_row(mysql_query($q));
return $title;
}

function gettitle_id($tid)
{
$q="SELECT title_id FROM elearning_title WHERE title_id='$tid'";
list($title)=mysql_fetch_row(mysql_query($q));
return $title;
}




function view_subject($idsubject){
$q="SELECT subject FROM ktube_subject WHERE id='$idsubject'";
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



	if(isset($_GET['delete']))
	{
		$id=$_GET['delete'];

		//$q="delete from tbl_content where id='$id'";
		$q="update ilearn_content set flag=0 where id=$id";
		mysql_query($q);

	}//delete

//print_r($_SESSION);
#$classid=$_SESSION["ilearn"]["class_id"];

function gettitle($tid)
{
$q="SELECT title FROM ktube_content WHERE id='$tid'";
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
			$uid = $_SESSION["log"]["userid"]; 

	//show lesson planner---------------------------------- group set ---------------------------------------------------------------------
	
			if ($subject == "10" || $subject == "20" || $subject == "8" || $subject == "37" || $subject == "4" || $subject == "12" || $subject == "16" || $subject == "18" || $subject == "14" || $subject == "6" || $subject == "7" || $subject == "19"){
				
	//echo $subject;
				
				$q2="SELECT form, group_set, set_id from class_set where subject_id='$subject'";
				list($form,$gset,$sset)=mysql_fetch_row(mysql_query($q2));
				//echo $sset;
				
					$query="Select * from ilearn_content where sem='$sem' AND week='$week' AND subject_id= '$subject' AND class_id='$sset' AND year='$year' AND flag= '1' and approve_status='1'";
	$result=mysql_query($query);
	
				 $name = 'Form '.$form.'-'.$gset;

			}
	else {
		
			$query="Select * from ilearn_content where sem='$sem' AND week='$week' AND subject_id= '$subject' AND class_id='$class' AND year='$year' AND flag= '1' and (approve_status='1' or approve_status='3')";
	$result=mysql_query($query);
	
				$q="SELECT name FROM classlist_v2 where id=$class";
				list($name)=mysql_fetch_row(mysql_query($q));

			}
?>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>

<div id="tablektube">

<table id="tablektubekeywords" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>T.Name </center></th>
    <th><center>Class </center></th>
	<th><center>
	Learning Area(s)
	</center></th>
	<th><center>Files</center></th>
 </tr>
</thead>
<tbody> 
<?php
	while($row=mysql_fetch_array($result))
	{
		//$classid=$_GET['cid'];
	//$class= $row['class_id'];
	//if($classid==$class)
	//{
	$tahun = $row['year'];

	if ($year == $tahun) 
	{

	$fileidfromdb=$row["file_id"];
	//print_r($fileidfromdb);
	$qq=explode(",",$fileidfromdb);
	
	$quizidfromdb=$row["quiz_id"];
	//print_r($fileidfromdb);
	$qz=explode(",",$quizidfromdb);
	

			$datee=$row["date"];

?>

	  	<tr> 	  	
      	<td><?php echo date('d-m-Y', strtotime($datee)); ?></td>
		<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
		<td><?php echo getfnama($row['upload_id']); ?></td>
		<td><?php echo $name; ?></td>
		
		<?php
		#nl2br($text)
		$id=$row['id'];
		?>
		
      	<td><a href="<?php echo $site."/lessonplan_control/lessonplanview?id=$id"; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666"><?php echo $row['topic'];?></a></td>

		<td align="left">
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
				<li style="text-align:left"><a href="<?php echo base_url('index.php/lessonplan_control/quiz_viewdhjawab/?cid='.$qz[$i].''); ?>"rel="gb_page_center[700, 550]" style="color:#0000CC">
				My Answer: <?php echo getquiz($qz[$i]);?>
				</a>
				<br>
				<?php	
				}//if
			
				else if($row['flag'] == '2')//cikgu dah release jawapan
				{
					?>
				<li style="text-align:left"><a href="<?php echo base_url('index.php/lessonplan_control/quiz/?cid='.$qz[$i].''); ?>"rel="gb_page_center[700, 550]">
				<img src="<?php echo $base."/images/quiz2.jpg" ?>" width="40" height="40" /><br><?php echo getquiz($qz[$i]);?>
				</a>
					
				<?php
				}//else if
				
				else 
				{
				?>
				<li style="text-align:left"><a href="<?php echo base_url('index.php/lessonplan_control/quiz/?cid='.$qz[$i].''); ?>"rel="gb_page_center[700, 550]">
				<img src="<?php echo $base."/images/quiz2.jpg" ?>" width="40" height="40" /><br><?php echo getquiz($qz[$i]);?>
				</a>
					
				<?php
				}//else 
				?>
		
		
		
		<?php	
		
		}
		?>
        </ul>
		
		
		</td>

        
        <?php
$edit=get_editbutton($_SESSION["log"]["userid"],$row["id"]);

?>
          			   

   
<?php
	
	}
	  }
?>   
</tr>
</tbody>
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
#$this->load->view("lessonplan/assessmentlist",$datax);


//show assesment end-------------------------------------------------------------------------------------------------------------

	
}//isset if((isset($sem)) && (isset($week)))
	
?>  
</div>



