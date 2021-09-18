<?php
	//echo $form;
?>

<script type="text/javascript">
 	var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>

<script language="javascript"> 
opener.location.reload(true);
   self.close();
</script>

<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/gb_scripts.js"></script>
<link href="<?php echo $base; ?>include/greybox/gb_styles.css" rel="stylesheet" type="text/css" />



<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
		<!--- table -->
		#tablektubekeywords.table { border-collapse: collapse; border-spacing: 0; }
		#tablektubekeywords.img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
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
}*/


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

}//get souces gambar



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
 

<div style="background:#666; width:92%; height:30px; color:#FFF"><u><h2><strong>

<?php 
$namataha_B=strtoupper($namatahap);



	if ($form == 'F1')
	{
		echo "FORM 1";
	}
	
	else if ($form == 'F2')
	{
		echo "FORM 2";
	}
	
	else if ($form == 'F3')
	{
		echo "FORM 3";
	}
	
	else if ($form == 'F4')
	{
		echo "FORM 4";
	}
	
	else if ($form == 'F5')
	{
		echo "FORM 5";
	}
	
	else
	{
		echo "DIPLOMA ";
	}

//echo "<a href='$site/ktube_control/contentlist/0/0/$tahap/$form'><font color='yellow'>$namataha_B</font></a>".": ". $subjek[0].": ".$namaibprofile; 

	echo ": ". $subjek[0].": ".$namaibprofile;

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
		
		else
		{
			$cond_ib="and profile_id=$ibprofile";
		}

//subj
	if($subj==0){$cond_subj="and subj_id<>0";}
		else{$cond_subj="and subj_id=$subj";}

//subj
	if($tahap==0){$cond_tahap="and level_id<>0";}
		else{$cond_tahap="and level_id=$tahap";}

	
	if($form == 'F1' or $form == 'F2'  or $form == 'F3'  or $form == 'F4'  or $form == 'F5')
	{
		$cond_form = "and form='$form'";
	}
		else
		{
			$cond_form="";
		}
		



//<!-----------------------------------pagination------------------------------------------------->
		$qtotal="SELECT count(*) FROM ktube_content WHERE  flag=1 $cond_form $cond_ib $cond_subj $cond_tahap";
		
		list($totalquery)=mysql_fetch_row(mysql_query($qtotal));
		$config['base_url'] = "$site/ktube_control/contentlist/$subj/$ibprofile/$tahap/$form";
		$config['total_rows'] = $totalquery;
		$config['uri_segment'] = 7;
		//kena add niiiiiiii
		$bilperpage=$config['per_page'] = 10; 
		//subj=$data[id]&ibprofile=0&page=0&tahap=1
		$this->pagination->initialize($config); 
		
		echo $link=$this->pagination->create_links();
		//<!-----------------------------------pagination------------------------------------------------->

	
	//echo "SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.flag=1 and a.server_id=b.id $cond_subj $cond_tahap limit $startpage,$bilperpage";


 $q="SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.flag=1 and a.server_id=b.id $cond_form $cond_ib $cond_subj $cond_tahap limit $startpage,$bilperpage";

$r=mysql_query($q);
$bil=$startpage;
		
		
?>
 
	


 <div id="tablektube">
 <style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:18px;
	}
	.content{
		width:900px;
		margin:0 auto;
	}
	#searchid
	{
		width:500px;
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:500px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
</style>
<table width="96%" height="32" style="width:80%; float:center">
<form method="post" action="<?php echo base_url('index.php/ktube_control/search/0/0/0')?>">
	<tr>
		<td align="center"><input type="text" width="100%" class="search" id="searchid" name="search" placeholder="Search for content" />
<?php /*?>		<td width="96" align="left"><input class="btn" type="submit" name="submitsearch" value="Search" id="submit">
<?php */?>		
		</td>
	</tr>
	</form>
	
</table>

	
	
<br />
<br  />
   
  <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" width="100%">
    <thead>
      <tr>
        <th style="padding:4px;"><span>Bil</span></th>
        <th style="padding:4px;"><span>Subjek</span></th>
        <th style="padding:4px;"><span>IB Profile</span></th>
        <th style="padding:4px;"><span>Tajuk</span></th>
        <th style="padding:4px;"><span>Upload By</span></th>
        <th style="padding:4px;">Resources</th>
        <th style="padding:4px;" colspan="3"><span>Action</span></th>
      </tr>
    </thead>
    <tbody>
<?php
while($data=mysql_fetch_array($r))
{
?>

<tr >
  <td class="lalign" style="padding:4px;"><center><?php echo $bil+1; ?></center></td>
  <td style="padding:4px;"><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  
  <td style="padding:4px;"><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  
  <td style="padding:4px;" align="left"><a title="<?php echo $data["title"]; ?>" href="<?php echo $base;?>index.php/ktube_control/details?id=<?php echo $data["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666">
  
 <?php echo $nama_supp=ellipse($data["title"],50,$crop_str='...'); ?>
 
 </a></td>
 <td> <p style="font-size:smaller; color:#8B8386; text-decoration:none"><a href="<?php echo base_url('index.php/ktube_control/teacherfile/?teacherid='.$data["upload_by"].'')?>"><?php echo getnama($data["upload_by"],"fullname","tbl_userinfo","id"); ?></a></p></td>
  <td style="padding:4px;" align="left"><img src="<?php echo get_sources($data["source_id"]); ?>" width="40" height="40" /></td>
  <td>
  <?php /*
$mmm="SELECT a.*,b.* FROM tbl_content a, ktube_content b Where a.source_id='$data[source_id]' AND b.id='$data[id]'";
$nnn=mysql_query($mmm);
while($dd=mysql_fetch_array($nnn)){ */
?>  </td>

  <td style="padding:4px;">
<!------------------------------------------------action---------------------------------------------------------------------->
<div align="center">
<table border="0" style="border-collapse:collapse">
<tr>
<td>

<?php

	if($data["type2"]=="Video")
	{ 
			
?>

	<a href="<?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$data["id"].'')?>"><img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30" />	</a>



<?php
}//if video
?>

<?php
	
	if($data["type2"]=="Document")
	{
		//get_viewdoc($data["id"]);
?>
	<a href="<?php echo $data["server_path"]."$data[path]";?>">
	<img src ="<?php echo $base; ?>/images/open-file.png" width = "25" height = "25"/>
	</a>
	
<?php
}//if video
?></td>


<?php
$edit=get_editbutton($_SESSION["log"]["userid"],$data["id"]);
if($edit==1){

?>

<td>
<a href="<?php echo $site;?>/ktube_control/edit?id=<?php echo $data["id"]; ?>" title="Edit Title" rel="gb_page_center[750, 550]"><img src ="<?php echo $base; ?>/images/edit2.png" width = "25" height = "25"/></a></td>
		   
<?php
}
?> 

<?php
$delete=get_deletebutton($_SESSION["log"]["userid"],$data["id"]);
if($delete==1){

//?subj=$data[id]&ibprofile=0&page=0&tahap=1
?>
<td>
<a onClick="return confirm('Pasti Untuk Padam?')"  href="<?php echo "$site/ktube_control/delete_content/$data[id]"; ?>"><img src ="<?php echo $base; ?>/images/delete.png" width = "25" height = "25"/></a></td>		   
<?php
}
?>
</tr>
</table>
</div>
<!------------------------------------------------------action---------------------------------------------------------------->  </td>
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
 





