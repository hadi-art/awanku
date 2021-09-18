<?php
	$uid = $_SESSION["log"]["userid"];


if(isset($_POST['submit']))
{ 
	$date = date('Y-m-d H:i:s');
	echo '<script language="javascript">';
	echo 'alert("Lesson Planner Approved")';
	echo '</script>';

	$title_id = $_POST['id'];
	
	
	$remark = $_POST["remark"];
	
	$query="update ilearn_content set approve_status='1', approve_remark='$remark',approve_by='$uid', approve_date='$date' where id='$title_id'";
	$result=mysql_query($query);
	
	
}

if(isset($_GET['reject']))
{ 
	$date = "Reject";
	echo '<script language="javascript">';
	echo 'alert("Lesson Planner Rejected")';
	echo '</script>';

	$title_id = $_GET['id'];
	
	
	
	$query="update ilearn_content set approve_status='2', approve_date='$date' where id='$title_id'";
	$result=mysql_query($query);
	
	
}


function getfnama($uname)
{

	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	return $name;

}

?>


<div style="width:80%">
<br>
<br>

<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
		  <th width="37"><center>Date </center></th>
			<th width="48"><center>Time </center></th>
			<th width="58"><center>T.Name </center></th>
			<th width="41"><center>Class </center></th>
			<th width="118"><center>View</center></th>
			<th width="63"><center>Files</center></th>
		</tr>
	</thead>

<?php
	$query="SELECT * FROM ilearn_content WHERE approve_status='3' ORDER BY date, ftime";
	$result=mysql_query($query);
	
	while($row=mysql_fetch_array($result))
	{ ?>
	<form method="post" action="">
    
<?php
	if($uid==$row["req_app_1"] || $uid==$row["req_app_2"])
	{
	
	$fileidfromdb=$row["file_id"];
	//print_r($fileidfromdb);
	$qq=explode(",",$fileidfromdb);
	
	$quizidfromdb=$row["quiz_id"];
	//print_r($fileidfromdb);
	$qz=explode(",",$quizidfromdb);
	$classid = $row['class_id'];
	
	$subject = $row["subject_id"];
	
	if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")
{
 				$q="SELECT * FROM class_set WHERE flag ='1' and subject_id=$subject and id=$row[class_id]";
				$file=mysql_fetch_array(mysql_query($q));	
					
				$gset = $file["group_set"];
				$form = $file["form"];
				$name = 'Form '.$form.'-'.$gset;
}
else {
	$q="SELECT name FROM classlist_v2 where id=$row[class_id]";
	list($name)=mysql_fetch_row(mysql_query($q));
}

?>
		<tr style="background:#FFFFFF"> 	  	
      		<td><?php print date("d-m-Y", strtotime($row['date'])); ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo getfnama($row['upload_id']); ?></td>
			<td><?php echo $name; ?></td>
			<td style="padding:4px; "align="left"><a title="<?php echo $row["topic"]; ?>"href="<?php echo $base;?>index.php/lessonplanner_control/detailstoApprove?id=<?php echo $row["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666"><?php echo $row["topic"]; ?></a><br />
                        </td>
			<td>
		
			<ul>
			<?php
			for ($i = 0; $i < count($qq)-1; $i++)
			{
				$title_id = $qq[$i];
			
				
				//SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.server_id=b.id and a.id='$title'
				
				$query="SELECT * FROM ktube_content  WHERE id='$title_id'";
				$q=mysql_query($query);	
				
				$row1=mysql_fetch_array($q);
				
				
				
				if ($row1["type2"] == "Document" )
				{
					
					
				?>
				
				
				<li style="text-align:left"><a href ="../<?php echo $row1["path"];?>" style=" text-align:left"><?php echo $row1["title"];?></a></li>
				<br>
				
				<?php


				
				
				}
				
				
				else 
				{
					
				
					
						
				?>
				
				
				<p></p><li style="text-align:left"><a href ="<?php echo $row1["path"]; ?>" style="text-align:left"><?php echo $row1["title"];?></a></li>
				<br>
				
				<?php
					
				
				}
				
					
			}
		?>
        </ul>
		</td>
        
      </tr>
	
	
<?php	
	
	}//if 1
	
	
			if($uid==$row["req_app_3"])
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
		<tr style="background:#FFFFFF"> 	  	
      		<td><?php print $row['date']; echo $uid; ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo getfnama($row['upload_id']); ?></td>
			<td><?php echo $name; ?></td>
			<td style="padding:4px; "align="left"><a title="<?php echo $row["topic"]; ?>"href="<?php echo $base;?>index.php/lessonplanner_control/details?id=<?php echo $row["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666"><?php echo $row["topic"]; ?></a></td>
			<td>
		
			<ul>
			<?php
			for ($i = 0; $i < count($qq)-1; $i++)
			{
				$title_id = $qq[$i];
			
				
				//SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.server_id=b.id and a.id='$title'
				
				$query="SELECT * FROM ktube_content  WHERE id='$title_id'";
				$q=mysql_query($query);	
				
				$row1=mysql_fetch_array($q);
				
				
				
				if ($row1["type2"] == "Document" )
				{
					
					
				?>
				
				
				<li style="text-align:left"><a href ="../<?php echo $row1["path"];?>" style=" text-align:left"><?php echo $row1["title"];?></a></li>
				<br>
				
				<?php


				
				
				}
				
				
				else 
				{
					
				
					
						
				?>
				
				
				<p></p><li style="text-align:left"><a href ="<?php echo $row1["path"]; ?>" style="text-align:left"><?php echo $row1["title"];?></a></li>
				<br>
				
				<?php
					
				
				}
				
					
			}
		?>
        </ul>
		</td>
				</tr>
	
	
<?php	
	}//if
?>
</form>
<?php
	}//while

?>




</table>

</div>