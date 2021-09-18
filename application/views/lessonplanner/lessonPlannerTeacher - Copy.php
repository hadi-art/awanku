<style type="text/css">
.okk {
	font-weight: bold;
}

body 
{
  
   background-color:#F7F7F7;
   
   
}
</style>

<?php 

$que="SELECT * FROM tbl_userinfo  WHERE level_id=1 AND (flag=1 OR flag=3) ORDER BY seq ASC";
$r_q=mysql_query($que); 

while($data_run=mysql_fetch_array($r_q))
{					


	$q="SELECT COUNT(upload_id) as submit_all, approve_by,approve_date  FROM ilearn_content  
WHERE upload_id='$data_run[id]' AND sem='$sem' AND WEEK='$week' AND YEAR='$year' AND flag=1 AND approve_status<>0";
	
	list($submit_all,$approve_by,$approve_date)=mysql_fetch_row(mysql_query($q));
	
	

	$q="SELECT COUNT(upload_id) as submit_notapprove FROM ilearn_content  
WHERE upload_id='21' AND sem='$sem' AND WEEK='$week' AND YEAR='$year' AND flag=1 AND approve_status<>0 AND approve_status=3
";
	
	list($submit_notapprove)=mysql_fetch_row(mysql_query($q));
	
	$bill_approve =$submit_all-$submit_notapprove;
	
	$update="UPDATE ilearn_status SET 
	submit='$submit_all',
	waiting='$submit_notapprove',
	approve='$bill_approve',
	approve_by='$approve_by',
	approve_date='$approve_date'
	where teacher_id='$data_run[id]' and sem='$sem' and week='$week' and year='$year'";
		
	mysql_query($update);
}



$sesi_user = $_SESSION["log"]["userid"];

function getfnama($uname)
{


$q="SELECT title,fullname FROM tbl_userinfo WHERE id='$uname'";
		list($t,$name)=mysql_fetch_row(mysql_query($q));
		
//close($conn);
//mysql_close($conn);

return $name;

}
?>
<br>
<div id="tablektube" style="width:auto">
<center>
<a href="<?php echo "$site/lessonplanner_control/plannerlesson_subject"; ?>"><img src ="<?php echo $base; ?>/images/document_add.png" width = "25" height = "25"/>Create LessonPlan </a> 
<a href="<?php echo "$site/lessonplanner_control/lessonPlannerTeacherPDF/$sem/$week/$year"; ?>"><img src ="<?php echo $base; ?>/images/printer-2.png" width = "25" height = "25"/>Print </a> 
</center>
<br>
<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
<tr>
		<td><b>Bil</b></td>
        <td><b>Nama</b></td>
        <td><b>Status</b></td>
        <td><b>Check</b></td>
</tr>
<?php
			echo $q="SELECT * FROM tbl_userinfo  WHERE level_id=1 AND flag=1 ORDER BY seq ASC";
            $r=mysql_query($q); 
			
            while($data=mysql_fetch_array($r))
                {					
				$uuid = $data["id"];
				$app_by=$data["approve_by"];
			
					$stat = "select teacher_id, approve, waiting, submit from ilearn_status where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";
					list($tid,$app,$wait,$sub)=mysql_fetch_row(mysql_query($stat));
					
					$check="select approve_date,approve_by from ilearn_content where flag='1' and upload_id='$uuid' AND sem='$sem' AND WEEK='$week' AND year='$year'  AND approve_status ='1'";
					list($approve_date,$checkq)=mysql_fetch_row(mysql_query($check));


				?>
<tr>
		<td><?php echo $data["seq"]; ?></td>
        
		<td style="text-align:left"><a href="<?php echo $site."/lessonplanner_control/planner_teacher/$sem/$week/$uuid/$year";?>" target="_blank"><?php echo $data["fullname"];?></a></td>
        
        <td>
        	<?php	if($tid == '')
					{	echo "No Submission"; }
									
					else
					{ 
						if ($app==$sub)
						{ echo "Review Completed";	}
						
						else if($app!==$sub)
						{ 
								$fwait=$wait-$app;
								
								 echo "Waiting for Review <br>[".$fwait."/".$sub."]";	
						}
					} 
		?>
            

        
        </td>
        
        <td><?php 			$q="SELECT title FROM tbl_userinfo WHERE id='$checkq'";
							list($t)=mysql_fetch_row(mysql_query($q));
							 echo $t." ".getfnama($checkq);?><br> <?php echo $approve_date;?></td>

</tr>
<?php } ?>
<tr>
		<td colspan="4" style="background-color:#999; color:#FFF"><b>Program DIPLOMA ( IB )</b></td>
</tr>

<?php
			$q="select * from tbl_userinfo where flag='3' and level_id='1' ORDER BY seq ASC";
            $r=mysql_query($q); 
			
            while($data=mysql_fetch_array($r))
                {					
				$uuid = $data["id"];
				$app_by=$data["approve_by"];
				
					$stat = "select teacher_id, approve, waiting, submit from ilearn_status where teacher_id='$uuid' AND week='$week' AND sem='$sem' AND year='$year'";
					list($tid,$app,$wait,$sub)=mysql_fetch_row(mysql_query($stat));

					$check="select approve_date,approve_by from ilearn_content where flag='1' and upload_id='$uuid' AND sem='$sem' AND WEEK='$week' AND year='$year'  AND approve_status ='1'";
					list($approve_date,$checkq)=mysql_fetch_row(mysql_query($check));

				?>
<tr>
		<td><?php echo $data["seq"]; ?></td>
		<td style="text-align:left"><a href="<?php echo $site."/lessonplanner_control/planner_teacher/$sem/$week/$uuid/$year";?>"><?php echo $data["fullname"];?></a></td>
        <td>
        	<?php	if($tid == ''){	echo "No Submission"; }
									else{ 
						if ($app==$sub){ echo "Review Completed";	}
								else if($app!==$sub){ 
								$fwait=$wait-$app;
								
								 echo "Waiting for Review <br>[".$fwait."/".$sub."]";	}
						} 
							?>

        
        </td>
        <td><?php 			$q="SELECT title FROM tbl_userinfo WHERE id='$checkq'";
							list($t)=mysql_fetch_row(mysql_query($q));
							 echo $t." ".getfnama($checkq);?><br> <?php echo $approve_date;?></td>

</tr>
<?php } ?>

</table>
</div>
