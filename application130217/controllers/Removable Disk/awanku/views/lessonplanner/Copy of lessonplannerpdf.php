
<?php
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

function getfnama($uname)
{


	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
	list($name)=mysql_fetch_row(mysql_query($q));
	

	return $name;

}



 $id=$_GET["id"];

	$query="Select * from ilearn_content where id='$id'";
	$result=mysql_query($query);
		
?>


<div id="tablektube" style="width:auto">

<table id="tablektubekeywords"  style="width:auto" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>Teacher's Name </center></th>
    <th><center>Class </center></th>
	<th><center>Topic</center></th>
	<th><center>Activity</center></th>
	<th><center>Files</center></th>
	
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
      		<td><?php print date("d-m-Y", strtotime($row['date'])) ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo getfnama($row['upload_id']); ?></td>
	
		
			<td><?php echo $name; ?></td>
			<td><?php echo $row["topic"]; ?></td>
  
			
			<td><?php echo nl2br($row['activity']); ?></td>
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
				<?php echo gettitle($qq[$i]);?>
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
				<?php echo gettitle($qq[$i]);?>
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
			Quiz Title : <?php echo getquiz($qz[$a]);?>
			
		<?php
			}
		?>
        </ul>
			
			</td>
			
</tr>
</table>
<?php

	$newDate = date("dmY", strtotime($row['date']));
	$final = $row["topic"] . $newDate ;
	
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=$final.doc");


	}
	
?>   
