<title>AWANKU</title>

<br>
<br>
<br>
<style>
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}


</style>

<?php
$r = mysql_query("Select * from student_activity where flag= '1'");
$row = mysql_fetch_assoc($r);
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk){
	
	
	#$s["upload_by"],"fullname","tbl_userinfo","id"
	$r="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($r));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}

?>

<center>Student Activity List</center><br>

<div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;"> 
  <a href="<?php echo $site."/report_control/newactivity"; ?>"><img src="<?php echo $base; ?>images/add-address.png" align="left" width="3%" height="5%"/></a> 
  <table id="tablektube" border="1" cellpadding="1" cellspacing="0">
    <thead>
      <tr> 
        <th style="padding:4px;"><center>
            Date Post</center></th>
        <th style="padding:4px;"><center>
            Teacher In Charge</center></th>
        <th style="padding:4px;"><center>
            Activity</center></th>
        <th style="padding:4px;"><center>
            Start Date</center></th>
        <th style="padding:4px;"><center>
            End Date</center></th>
        <th style="padding:4px;"><center>
            Venue</center></th>
      </tr>
    </thead>
    <tbody>
      <tr> 
        <td style="padding:4px;"><?php print $row['datepost'] ?></td>
        <td style="padding:4px;"><?php echo getnama($row["teacher_id"],"fullname","tbl_userinfo","id"); ?></td>
        <td style="padding:4px;"><a href="<?php echo $site."/report_control/activitydetails"; ?>"><?php echo $row['name']?></a></td>
        <td style="padding:4px;"><?php echo $row['startdate']?></td>
        <td style="padding:4px;"><?php echo $row['enddate']?></td>
        <td style="padding:4px;"><?php echo $row['venue']?></td>
      </tr>
    </tbody>
  </table>
</div>

