<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
</style>


<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>





<?php
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk){
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
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
	
 
 
	//$subjek = $_GET["subj"];
	
	$y="SELECT subject FROM ktube_subject WHERE subject_id = '$subj' AND flag='1'";
	$s=mysql_query($y);
	$subjek=mysql_fetch_row($s);

	$qry="SELECT subject_id FROM ktube_subject WHERE subject_id = '$subj' AND flag='1' ";
	$n=mysql_query($qry);
	$no=mysql_fetch_row($n);
	$tahap=$_SESSION["ktube"]["click"]["tahap"];
	
	
	$q="select description from tbl_param where param='leveltahapktube' and var=$tahap";
	list($namatahap)=mysql_fetch_row(mysql_query($q));
	
	$ibprofile=$_SESSION["ktube"]["click"]["ibprofile"];
	if($ibprofile==0){$namaibprofile="All Profile";}
	else{
	$q="select profile from ktube_ibprofile where id=$ibprofile";
	list($namaibprofile)=mysql_fetch_row(mysql_query($q));
	}//else
	
 ?>
 

<div style="background:#666; width:75%; height:30px; color:#FFF"><u><h2><strong>

<?php 
$namataha_B=strtoupper($namatahap);
echo "<a href='$site/ktube_control/contentlist/0/0/$tahap'><font color='yellow'>$namataha_B</font></a>".": ". $subjek[0].": ".$namaibprofile; 

?>
<!--yg bawah ni utk view semua spm atau semua pmr content-->
<?php #echo $site."/ktube_control/contentlist?subj=0&ibprofile=0&page=0&tahap=2"?>
<?php #echo $site."/ktube_control/contentlist?subj=0&ibprofile=0&page=0&tahap=1"?>
</strong></h2></u></div>
<br />

<?php
//print_r($_GET);


//ib
if($ibprofile==0){$cond_ib="and profile_id<>0";}
else{$cond_ib="and profile_id=$ibprofile";}

//subj
if($subj==0){$cond_subj="and subj_id<>0";}
else{$cond_subj="and subj_id=$subj";}

//subj
if($tahap==0){$cond_tahap="and level_id<>0";}
else{$cond_tahap="and level_id=$tahap";}





//<!-----------------------------------pagination------------------------------------------------->
		$qtotal="SELECT count(*) FROM ktube_content WHERE flag=1 $cond_ib $cond_subj $cond_tahap";
		
		list($totalquery)=mysql_fetch_row(mysql_query($qtotal));
		$config['base_url'] = "$site/ktube_control/contentlist/$subj/$ibprofile/$tahap/";
		$config['total_rows'] = $totalquery;
		$config['uri_segment'] = 6;
		//kena add niiiiiiii
		$bilperpage=$config['per_page'] = 10; 
		//subj=$data[id]&ibprofile=0&page=0&tahap=1
		$this->pagination->initialize($config); 
		
		echo $link=$this->pagination->create_links();
		//<!-----------------------------------pagination------------------------------------------------->



$q="SELECT * FROM ktube_content WHERE flag=1 $cond_ib $cond_subj $cond_tahap order by id ASC limit $startpage,$bilperpage";
$r=mysql_query($q);
$bil=$startpage;
		
		
?>
 
	


 <div id="tablektube">
 
<table height="32" style="width:80%; float:right">
<form method="post" action="<?php echo base_url('index.php/ktube_control/search/0/0/0')?>">
	<tr>
		<td width="793" height="26" align="right"><input type="text" name="search" id="search" required>
		
		
		<td width="69" align="left"><input class="btn" type="submit" name="submitsearch" value="Search" id="submit">
		
		</td>
	</tr>
	</form>
	
</table>

	
	
<br />
<br  />
   
  <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Bil</span></th>
        <th><span>Level</span></th>
        <th><span>Subjek</span></th>
        <th><span>IB Profile</span></th>
        <th><span>Tajuk</span></th>
        <th><span>Uploader</span></th>
        <th><span>Type</span></th>
		<th><span>Views</span></th>
        <th><span>Action</span></th>
      </tr>
    </thead>
    <tbody>
<?php
while($data=mysql_fetch_array($r))
{
?>

<tr >
  <td class="lalign"><?php echo $bil+1; ?></td>
  <td><?php echo get_level_name($data["level_id"]); ?></td>
  <td><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  <td><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  <td><?php echo $data["title"]; ?></td>
  <td><?php echo getnama($data["upload_by"],"fullname","tbl_userinfo","id"); ?> <br /><font size="-2"> [ <?php echo $data["time"]; ?> ]</font></td>
  <td><?php echo $data["type2"]; ?></td>
  <td><?php echo $data["view_count"]; ?></td>
  <td>
<!------------------------------------------------action---------------------------------------------------------------------->
<div align="center">
<table border="0" style="border-collapse:collapse">
<tr>
<td>

<?php

	if($data["type2"]=="Video")
	{ 
			
?>

	<a href="<?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$data["id"].'')?>"><img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30" /> 
	
	</a>



<?php
}//if video
?>

<?php
	
	if($data["type2"]=="Document")
	{
		//get_viewdoc($data["id"]);
?>
	<a href="<?php echo $site."/ktube_control/open_document/$data[id]"; ?>" title="<?php echo $data["title"]; ?>" >
	<img src ="<?php echo $base; ?>/images/open-file.png" width = "25" height = "25" <?php 				
			
			?> />
</a>
<?php
}//if video
?>


</td>


<?php
$edit=get_editbutton($_SESSION["log"]["userid"],$data["id"]);
if($edit==1){

?>

<td>
<a href="<?php echo $site;?>/ktube_control/edit?id=<?php echo $data["id"]; ?>" title="Edit Title" rel="gb_page_center[400, 400]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "25" height = "25"/></a>
</td>
		   
<?php
}
?> 

<?php
$delete=get_deletebutton($_SESSION["log"]["userid"],$data["id"]);
if($delete==1){

//?subj=$data[id]&ibprofile=0&page=0&tahap=1
?>
<td>
<a onClick="return confirm('Pasti Untuk Padam?')"  href="<?php echo "$site/ktube_control/delete_content/$data[id]"; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "25" height = "25"/></a>
</td>		   
<?php
}
?>
</tr>
</table>
  
</div>
<!------------------------------------------------------action---------------------------------------------------------------->
  
  
  
  
  </td>
</tr>
<?php
$bil++;
}//while
?>
</tbody>
</table>
<?php echo $link;?>

 </div> 


<br />
 





