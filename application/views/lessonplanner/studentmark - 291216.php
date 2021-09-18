<style>
  
html
{
 font-family:tahoma;
}

</style>
  
<?php
	function getscore($id)
	{
	
	
	$titleid=$_GET['cid'];
	$q="SELECT score FROM elearning_history WHERE user_id='$id' and title_id='$titleid'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}


?>

  
<?php
	function getprestasi($id)
	{
	
	
	$titleid=$_GET['cid'];
	$q="SELECT percentage FROM elearning_history WHERE user_id='$id' and title_id='$titleid'";
	list($name)=mysql_fetch_row(mysql_query($q));
	
	return $name;
	
	}


?>

<?php
	function gettitle($id)
	{
	
	
	
	$q="SELECT title FROM elearning_title WHERE title_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	function getclass($id)
	{
	
	
	
	$q="SELECT name FROM classlist_v2 WHERE id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	
	function gettotalquiz($id)
	{
		$q=mysql_query("SELECT COUNT(*) FROM elearning_question WHERE title_id = '$id'");
		list($int)=mysql_fetch_row($q); 
		
		return $int;
	
	
	
	}


?>

<?php

   $id=$_GET['cid'];
  $classid=$_GET['classid'];
  
  
	
   

	$query="SELECT * FROM tbl_userinfo WHERE class_id='$classid'";
	$q=mysql_query($query);
	


?>
	

	<h2><center><?php echo gettitle($id ); ?></center></h2>
	<h2><center>Class : <?php echo getclass($classid ); ?></center></h2>
	
	<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="5" cellspacing="3">
    <tr bgcolor="#99CCFF">
   		<th width="9%" height="35">Bil</th>
      	<th width="55%">Name</th>
		<th width="17%">Score</th>
		<th width="19%">Prestasi</th>
	</tr>
	
<?php
	$count=1;
	$totalscore =0;
	
	
	while($row=mysql_fetch_array($q))
	{
	
?>
	  <tr>
			<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    		<td><?php echo $row['fullname'];#echo $row["id"];?></td>
			<td align="center"><?php echo getscore($row['id'])."/".gettotalquiz($id); 
				$totalscore = $totalscore + getscore($row['id']);
				
				if(is_null(getscore($row['id'])))
				{
					echo "-";
				}
				?>
			
			</td>
			<td align="center"><?php 
	
				if(is_null(getprestasi($row['id'])))
				{
				     echo "-";
				}
				
				
				else if(getprestasi($row['id']) >= 0)
				{
				echo round(getprestasi($row['id']),2)."%";
				
				}
				
				
					
			
				
	
					
			/*?>	if(is_null(getprestasi($row['id'])))
				{
				     echo "-";
				}
				
				else if(getprestasi($row['id'])>=8)
				{
					 echo "Cemerlang";
				}
				
				else if (getprestasi($row['id'])>=4 && (getprestasi($row['id'])<8))
				{
					 echo "Memuaskan";
				}
				
				else if(getprestasi($row['id'])<4)
				{
					 echo "Perlu di perbaiki";
				}<?php */
				
				
				
				
				
				?>
	
			</td>
		</tr>	
	
	
	
	
	
<?php
	 $count++;
	 
	} //while
?>
	<tr>
		<td></td>
		<td height="59" colspan="3">
<strong>
<?php
    $jumlahstudent=$count - 1;
	$newcount = $count - 1;
	$totalscore;
	$avg = $totalscore /  $newcount;
	$newaverage = number_format("$avg",2);
	
	
	


?>
	</strong>	</td>
	</tr>
</table>

<?php include "studentmark_graph.php";?>

<br />
<br />



