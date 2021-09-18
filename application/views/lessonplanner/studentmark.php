<style>
  
html
{
 font-family:tahoma;
}

</style>
  
<?php


	function getscore($stud_id)
	{
	
	$year=date('Y');
	$titleid=$_GET['cid'];
	$q="SELECT score FROM elearning_history WHERE user_id='$stud_id' and title_id='$titleid' and year='$year'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}


?>

  
<?php
	function getprestasi($stud_id)
	{
	
	$year=date('Y');
	$titleid=$_GET['cid'];
	$q="SELECT percentage FROM elearning_history WHERE user_id='$stud_id' and title_id='$titleid' and year='$year'";
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
	
		function getsubject($id)
	{
	
	
	
	$q="SELECT subject FROM elearning_title WHERE title_id='$id'";
	list($subject)=mysql_fetch_row(mysql_query($q));
			
	
	return $subject;
	
	}
	
	if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")
	{
				function getclass($id)
			{
				
				$q="SELECT name FROM class_set WHERE id='$id'";
				list($name)=mysql_fetch_row(mysql_query($q));
							
				return $name;
	
			} //function
		} else {


				function getclass($id)
			{
				$q="SELECT name FROM classlist_v2 WHERE id='$id'";
				list($name)=mysql_fetch_row(mysql_query($q));
					
				return $name;
			
			}
	}//ifelse
	
	
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
  
  $subject = getsubject($id);
  
  				$q="SELECT form, clas_name, group_set FROM class_set where set_id=$classid";
				list($form, $class, $group)=mysql_fetch_row(mysql_query($q));

		if ($subject == "19"){
						
				  	$query="SELECT * FROM classlist_set WHERE fiz_id='$classid'";
					$q=mysql_query($query);
			}
		else if ($subject == "4" || $subject == "37"){
				  	$query="SELECT * FROM classlist_set WHERE kem_id='$classid'";
					$q=mysql_query($query);
		}
		else if ($subject == "10"){
				  	$query="SELECT * FROM classlist_set WHERE english_id='$classid'";
					$q=mysql_query($query);
		}
		else if ($subject == "7"){
				  	$query="SELECT * FROM classlist_set WHERE chem_id='$classid'";
					$q=mysql_query($query);
		}
		else if ($subject == "6"){
				  	$query="SELECT * FROM classlist_set WHERE bio_id='$classid'";
					$q=mysql_query($query);
		}
		else if ($subject == "14" || $subject == "16" || $subject == "12"|| $subject == "18"){
				  	$query="SELECT * FROM classlist_set WHERE language_id='$classid'";
					$q=mysql_query($query);
		}
		else if ($subject == "20"){
				  	$query="SELECT * FROM classlist_set WHERE addmath_id='$classid'";
					$q=mysql_query($query);
		}
		else if ($subject == "8"){
				  	$query="SELECT * FROM classlist_set WHERE math_id='$classid'";
					$q=mysql_query($query);
		}
		else {
  
			$query="SELECT * FROM classlist_set WHERE class_id='$classid'";
			$q=mysql_query($query);
	
		}


?>


	<h2><center><?php 	echo gettitle($id );?></center></h2>
	<h2><center>Class : <?php 
	
	  	if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")

		{				echo "Form ". $form. $class." - ".$group;
		 }
		
		else {  echo getclass($classid ); } ?></center></h2>
	
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
    		<td><?php echo $row['fullname'];#echo $row["stud_id"];?></td>
			<td align="center"><?php echo getscore($row['stud_id'])."/".gettotalquiz($id); 
				$totalscore = $totalscore + getscore($row['stud_id']);
				
				if(is_null(getscore($row['stud_id'])))
				{
					echo "-";
				}
				?>
			
			</td>
			<td align="center"><?php 
	
				if(is_null(getprestasi($row['stud_id'])))
				{
				     echo "-";
				}
				
				
				else if(getprestasi($row['stud_id']) >= 0)
				{
				echo round(getprestasi($row['stud_id']),2)."%";
				
				}
				
				
					
			
				
	
					
			/*?>	if(is_null(getprestasi($row['stud_id'])))
				{
				     echo "-";
				}
				
				else if(getprestasi($row['stud_id'])>=8)
				{
					 echo "Cemerlang";
				}
				
				else if (getprestasi($row['stud_id'])>=4 && (getprestasi($row['stud_id'])<8))
				{
					 echo "Memuaskan";
				}
				
				else if(getprestasi($row['stud_id'])<4)
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



