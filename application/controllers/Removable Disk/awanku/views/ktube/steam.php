
<style>


html {
 font-family:tahoma;
}
/** page structure **/
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

##tablektubekeywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#tablektubekeywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#tablektubekeywords thead tr th { 
  font-weight: bold;
  padding: 5px 4px;
  
}
#tablektubekeywords thead tr th span { 
  
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#tablektubekeywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

/*#tablektubekeywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#tablektubekeywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}
*/

#tablektubekeywords tbody tr { 
  color: #555;
}
#tablektubekeywords tbody tr td {
  text-align: center;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
}

</style>


<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>

<?php

function get_sources($idsources){

$q="SELECT link FROM tbl_content WHERE source_id='$idsources'";
list($link)=mysql_fetch_row(mysql_query($q));
			
	$fulllink=base_url()."/".$link;
	
	return $fulllink;

}


function getnama($id,$var1,$table,$fk)
{
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}
function get_level_name($level_id)
	{
	$q="SELECT description FROM tbl_param WHERE param='leveltahapktube' AND var =$level_id";
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

	

?>

<div style="background:#666; width:95%; height:30px; color:#FFF"><u><h2><strong>

<?php 

echo "Steam";

?>

</strong></h2></u></div>
<br />



<?php //<!-----------------------------------pagination------------------------------------------------->
		$qtotal="SELECT count(*) FROM ktube_content WHERE flag=1 and level_id ='3'";
		
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



$q="SELECT * FROM ktube_content WHERE flag=1 and level_id='3'";
$r=mysql_query($q);
$bil=$startpage;


		
?>
 
	


<div id="tablektube">
	
	
<br />
<br  />
   
  <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" width="100%">
    <thead>
      <tr>
        <th width="7%"><span>Bil</span></th>
        
        <th width="10%"><span>Subjek</span></th>
        <th width="13%"><span>IB Profile</span></th>
        <th width="24%"><span>Tajuk</span></th>
        <th width="11%"><span>Resources</span></th>
        
		
        <th width="35%"><span>Action</span></th>
      </tr>
    </thead>
    <tbody>
<?php
while($data=mysql_fetch_array($r))
{
?>

<tr>
  <td class="lalign" style="padding:4px;"><center><?php echo $bil+1; ?></center></td>
 
  <td style="padding:4px;"><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  <td style="padding:4px;"><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  <td><a title="<?php echo $data["title"]; ?>" href="<?php echo $base;?>index.php/ktube_control/details?id=<?php echo $data["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666">
  
 <?php echo $nama_supp=ellipse($data["title"],50,$crop_str='...'); ?>
 </a></td>
  <td style="padding:4px;" align="left"><img src="<?php echo get_sources($data["source_id"]); ?>" width="40" height="40" /></td>
  
  
  <td>
<!------------------------------------------------action---------------------------------------------------------------------->
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" style="padding:0;">
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
	<img src ="<?php echo $base; ?>/images/open-file.png" width = "30" height = "30" <?php 				
			
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
<a href="<?php echo $site;?>/ktube_control/edit?id=<?php echo $data["id"]; ?>" title="Edit Title" rel="gb_page_center[400, 400]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "30" height = "30"/></a>
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
<a onClick="return confirm('Pasti Untuk Padam?')"  href="<?php echo "$site/ktube_control/delete_content/$data[id]"; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "30" height = "30"/></a>
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
 