<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>


<?php
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk)
	{
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}
	
	function getsubject($subj)
	{
	

	$q="SELECT SUBJECT FROM ktube_subject WHERE subject_id='$subj'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	
	function getib($ib)
	{
	

	$q="SELECT profile FROM ktube_ibprofile WHERE profile_id='$ib'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	
	function getupload($upload)
	{
	

	$q="SELECT fullname FROM tbl_userinfo WHERE id='$upload'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}
	
	
function get_deletebutton($uploadid,$idcontent){


$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}

function get_editbutton($uploadid,$idcontent){


$q="SELECT COUNT(*) FROM ktube_content WHERE id='$idcontent' AND upload_by='$uploadid'";
		list($int)=mysql_fetch_row(mysql_query($q));
		


return $int;

}
	
?>
<br />
 <div id="tablektube" align="center" style="background-color:#FFFFFF; width:80%">
  <br />
 
<?php 
 	$search=$_POST["search"];
	
	if(strlen($search)<=3)
	{ $result = 'Search term too short';
	?>
	<center><?php echo $result;?></center>
	<table height="32" style="width:80%; float:right">
<form method="post" action="">
	<tr>
		<td width="793" height="26" align="right"><input type="text" name="search" id="search" required>
		
		
		<td width="69" align="left"><input type="submit" name="submitsearch" value="Search" id="submit">
		
		</td>
	</tr>
	</form>
</table>
<br />
<br />
<br />
	
	<?php
	}
	
	else if (strlen($search)>3)
	{
	$result = 'You searched for ';
	
	
?>

<center><?php echo $result; ?> <b><?php echo $search;?></b></center>
<table height="32" style="width:80%; float:right">
<form method="post" action="">
	<tr>
		<td width="793" height="26" align="right"><input type="text" name="search" id="search" required>
		
		
		<td width="69" align="left"><input type="submit" name="submitsearch" value="Search" id="submit">
		
		</td>
	</tr>
	</form>
</table>
<br />
<br />

	 <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" style="width:100%">
    <thead>
      <tr>
      <tr bgcolor="#E0EEEE">
        <th style="padding:4px;"><span>Bil</span></th>
        <th style="padding:4px;"><span>Level</span></th>
        <th style="padding:4px;"><span>Subjek</span></th>
        <th style="padding:4px;"><span>IB Profile</span></th>
        <th style="padding:4px;"><span>Tajuk</span></th>
        <th style="padding:4px;"><span>Uploader</span></th>
        <th style="padding:4px;"><span>Action</span></th>
      </tr>
      </tr>
    </thead>
<?php
		
	
	$search_exploded = explode (" ", $search);
 
	$x = "";
	$construct = "";  
    
	foreach($search_exploded as $search_each)
	{
		$x++;
		if($x==1)
		$construct .="title LIKE '%$search_each%'";
		else
		$construct .="AND title LIKE '%$search_each%'";
    
	}
  
	$constructs ="SELECT * FROM ktube_content WHERE $construct ";
	$run = mysql_query($constructs);
    
	$foundnum = mysql_num_rows($run);
    
	if ($foundnum==0)
	echo "Sorry, there are no matching result for <b>$search</b>.</br>";
	else
	{  
		
	$getquery = mysql_query("SELECT * FROM ktube_content WHERE $construct");
	$bil=0;
	while($runrows = mysql_fetch_assoc($getquery))
	{
		$title = $runrows ['title'];
		$type2 = $runrows ['type2'];
		$viewcount = $runrows ['view_count'];
		$levelid = $runrows ['level_id'];
		$subject = $runrows ['subj_id'];
		$ib = $runrows ['profile_id'];
		$upload = $runrows ['upload_by'];

?>	
	<tr>
	
		<td class="lalign"><?php echo $bil+1;  ?></td>
		<td> <?php
				if ( $levelid == 1)
					echo 'PT3';
					
					else if ( $levelid == 2)
						echo 'SPM'
				
		?>
		</td>
		<td><?php echo getsubject($subject) ?></td>
		<td><?php echo getib($ib) ?></td>
		<td><?php echo $title ?></td>
		<td><p style="font-size:smaller; color:#8B8386; text-decoration:none"><a href="<?php echo base_url('index.php/mmlib_control/teacherfile/?teacherid='.$runrows["upload_by"].'')?>"><?php echo getupload($upload) ?></a></p></td>
<?php /*?>		<td><?php echo $type2 ?></td>
	<td><?php echo $viewcount ?></td><?php */?>	
		<td>
		<!------------------------------------------------action---------------------------------------------------------------------->
		

<?php
	
	if($runrows["type2"]=="Document")
	{
		//get_viewdoc($data["id"]);
?>
	<a href="<?php echo $site."/ktube_control/open_document/$runrows[id]"; ?>" title="<?php echo $runrows["title"]; ?>" >
	<img src ="<?php echo $base; ?>/images/open-file.png" width = "30" height = "30"/></a>
<?php
	}//if doc
?>


<?php

	if($runrows["type2"]=="Video")
	{ 
			
?>

	<a href="<?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$runrows["id"].'')?>"><img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30" /></a>



<?php
		}//if video

$edit=get_editbutton($_SESSION["log"]["userid"],$runrows["id"]);
if($edit==1)
{

?>
<a href="<?php echo $site;?>/ktube_control/edit?id=<?php echo $runrows["id"]; ?>" title="Edit Title" rel="gb_page_center[400, 400]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "30" height = "30"/></a>


<?php
}
?> 


<?php
$delete=get_deletebutton($_SESSION["log"]["userid"],$runrows["id"]);
if($delete==1)
{

//?subj=$data[id]&ibprofile=0&page=0&tahap=1
?>

<a onClick="return confirm('Pasti Untuk Padam?')"  href="<?php echo "$site/ktube_control/delete_content/$runrows[id]"; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>

<?php
}
?>

		
		<!------------------------------------------------end action---------------------------------------------------------------------->
		</td>
	</tr>
<?php
$bil++;}
	?> 
	</table>
<?php
	}

}

?>



   </table>
	</div>