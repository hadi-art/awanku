<SCRIPT LANGUAGE="JavaScript">


javascript:window.print();

</script>

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
<center>
<div id="tablektube" style="width:auto">
<h3><?php echo "Week ".$week." Year ".$year; ?></h3>
<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
<tr>
		<td><b>Bil</b></td>
        <td><b>Nama</b></td>
        <td><b>Status</b></td>
        <td><b>Check</b></td>
</tr>
<?php
			$q="select * from tbl_userinfo where flag='1' and level_id='1' ORDER BY seq ASC";
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
		<td style="text-align:left"><?php echo $data["fullname"];?></td>
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
		<td colspan="4" align="center"><b>Program DIPLOMA ( IB )</b></td>
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
		<td style="text-align:left"><?php echo $data["fullname"];?></td>
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
</div></center>
