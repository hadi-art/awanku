<SCRIPT LANGUAGE="JavaScript">


javascript:window.print();

</script>

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

$q="SELECT fullname FROM tbl_userinfo WHERE id='$uuid'";
		list($fullname)=mysql_fetch_row(mysql_query($q));



	
	if((isset($sem)) && (isset($week)))
	{
	//show lesson planner-------------------------------------------------------------------------------------------------------------
	
	$query="Select * from ilearn_content where sem='$sem' AND week='$week' AND year='$year' AND flag= '1' AND upload_id='$uuid' ORDER BY date, ftime";
	$result=mysql_query($query);
		
?>

<?php /*?><a href="<?php echo $site."/lessonplanner_control/addlessonplanner/0/$sem/$week/$subject/add" ?>" title="Add :<?php echo view_subject($subject); ?>" target="_blank" ><img src ="<?php echo $base; ?>/images/document_add.png" width = "25" height = "25"/>Add</a><?php */?>




<?php /*?><a href="<?php echo $site."/lessonplanner_control/addlessonplanner/0/$sem/$week/$subject/add" ?>" title="Add :<?php echo view_subject($subject); ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" ><img src ="<?php echo $base; ?>/images/document_add.png" width = "25" height = "25"/>Add</a><?php */?>

<br /><center>
<div id="tablektube" style="width:auto">
<br />

<b><?php echo $fullname; ?></b>

<br /><br />
<table id="tablektubekeywords" border="1" cellpadding="1" cellspacing="0">
<thead>
<tr>
	<th><center>Date </center></th>
	<th><center>Time </center></th>
	<th><center>Subject </center></th>
    <th><center>Class </center></th>
	<th><center>Learning Area(s)</center></th>
   	<th><center>Review</center></th>
    
 </tr>
</thead>

<?php
	  

	while($row=mysql_fetch_array($result))
	{
	
	$uploader = getfnama($row['upload_id']);
	
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
	$subject = $row["subject_id"];

	
	 $row['year'];
	
		if ($subject == "12" || $subject == "14" || $subject == "16" || $subject == "18" || $subject == "10" || $subject == "8" || $subject == "19" || $subject == "7" || $subject == "6" || $subject == "20" || $subject == "4" || $subject == "37")

		{
 				$q="SELECT * FROM class_set WHERE flag ='1' and subject_id=$subject and id=$row[class_id]";
				$file=mysql_fetch_array(mysql_query($q));	
					
				$gset = $file["group_set"];
				$form = $file["form"];
				$name = 'Form '.$form.'<br>( '.$gset.' )';
		}

	else {
				$q="SELECT name FROM classlist_v2 where id=$row[class_id]";
				list($name)=mysql_fetch_row(mysql_query($q));

			}
	
		$datee=$row["date"];
		$hariapadong=date('D', strtotime($datee));

?>
<tr> 	  	
      		<td><?php echo "<center>".$hariapadong."</center>".date('d-m-Y', strtotime($datee)); ?></td>
			<td><?php print $row['Ftime']?> - <?php print $row['Ttime']?></td>
			<td><?php echo view_subject($row['subject_id']); ?></td>
	
		
			<td align="center"><?php echo $name; ?></td>
			<td align="left">
			 <?php echo $nama_supp=ellipse($row["topic"],50,$crop_str='...'); ?>
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
         
            </td>

</tr>
<?php
	}
	
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

	
}//isset if((isset($sem)) && (isset($week)))
	
	
	
	
?>  
</div></center>



