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
			$q="select a.*,b.fullname from ilearn_status a, tbl_userinfo b where a.week='17' and a.sem='1' and a.year='2017' and a.teacher_id=b.id ORDER BY b.seq ASC";
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
