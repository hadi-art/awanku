



<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>


<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<body>


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
 

<div style="background:#666; width:95%; height:30px; color:#FFF"><u><h2><strong>

<?php 
$namataha_B=strtoupper($namatahap);
echo "<a href='$site/mmlib_control/contentlist/0/0/$tahap'><font color='yellow'>$namataha_B</font></a>".": ". $subjek[0].": ".$namaibprofile; 

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



$q="SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE a.flag=1 and a.server_id=b.id $cond_ib $cond_subj $cond_tahap limit $startpage,$bilperpage";
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
<form method="post" action="<?php echo base_url('index.php/mmlib_control/search/0/0/0')?>">
	<tr>
		<td align="center"><input type="text" width="100%" class="search" id="searchid" name="search" placeholder="Search for content" /></td>
	</tr>
	</form>
	
</table>


<br />
<br  />

 <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" width="100%">
    
      <tr bgcolor="#E0EEEE">
        <th style="padding:4px;"><span>Bil</span></th>
        <th style="padding:4px;"><span>Subjek</span></th>
		<th style="padding:4px;"><span>IB Profile</span></th>
        <th style="padding:4px;"><span>Tajuk</span></th>
        <th style="padding:4px;"><span>Upload By</span></th>
        <th style="padding:4px;"><span>Action</span></th>
      </tr>
    
    <tbody>
<?php
while($data=mysql_fetch_array($r))
{
	
?>

<tr>
  <td class="lalign"><?php echo $bil+1; ?></td>
  <td><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  <td><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  
<?php /*?>  <td><a href="<?php echo $base;?>index.php/ktube_control/details?id=<?php echo $data["id"]; ?>" onClick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false"><?php echo $data["title"]; ?></a></td><?php */?>
  
    <td style="padding:4px;" align="left"><a title="<?php echo $data["title"]; ?>" href="<?php echo $base;?>index.php/ktube_control/details?id=<?php echo $data["id"]; ?>" onClick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#666666">
  
 <?php echo $nama_supp=ellipse($data["title"],50,$crop_str='...'); ?>
 
 </a></td>

  
  <td> <p style="font-size:smaller; color:#8B8386; text-decoration:none"><a href="<?php echo base_url('index.php/mmlib_control/teacherfile/?teacherid='.$data["upload_by"].'')?>"><?php echo getnama($data["upload_by"],"fullname","tbl_userinfo","id"); ?></a></p></td>
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

	<a href="<?php echo base_url('index.php/mmlib_control/mmlib_video/0/0/0/?cid='.$data["id"].'')?>"><img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30"/></a>



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
<?php echo $link; ?>
 </div> 


<br />
 





