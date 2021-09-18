
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

function getnama($id,$var1,$table,$fk){
	
	
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


$q="SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.flag=1 and a.level_id='3' and a.server_id=b.id";
$r=mysql_query($q);
$bil=$startpage;


		
?>
 
	


<div id="tablektube">
	

   
  <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" width="100%">
    <thead>
      <tr>
        <th width="8%"><span>Bil</span></th>
        
        <th width="12%"><span>Subjek</span></th>
        <th width="15%"><span>IB Profile</span></th>
        <th width="39%"><span>Tajuk</span></th>
        
        <th width="26%"><span>Action</span></th>
      </tr>
    </thead>
    <tbody>
<?php
while($data=mysql_fetch_array($r))
{
?>

<tr>
  <td class="lalign"><?php echo $bil+1; ?></td>
  
  <td><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  <td><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  <td><a href="<?php echo $base;?>index.php/ktube_control/details?id=<?php echo $data["id"]; ?>" onClick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false"><?php echo $data["title"]; ?></a></td>
 
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

	<a href="<?php echo base_url('index.php/mmlib_control/mmlib_video/0/0/0/?cid='.$data["id"].'')?>"><img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30" /> 
	
	</a>



<?php
}//if video
?>

<?php
	
	if($data["type2"]=="Document")
	{
		//get_viewdoc($data["id"]);<?php echo $data["server_path"]."$data[path]";?>
	<a href="<?php echo $site."/ktube_control/open_document/$data[id]"; ?>" title="<?php echo $data["title"]; ?>" >
	<img src ="<?php echo $base; ?>/images/open-file.png" width = "30" height = "30" <?php 				
			
			?> />
</a>
<?php
}//if video
?>


</td>




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
 