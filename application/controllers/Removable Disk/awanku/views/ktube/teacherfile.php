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

<style>


html {
 font-family:tahoma;
}


</style>

<script>
$(function(){
  $('#keywords').tablesorter(); 
});
</script>

<div style="background:#59E0DA; width:75%; height:30px; color:#000"><h2><strong>
Teacher Files : <?php echo getfnama($_GET['teacherid']); ?>
</strong></h2>


</div>



<?php 

function getfnama($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
	return $name;

}


function getnama($id,$var1,$table,$fk){
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));

	return $name;
	
	}
	function get_level_name($level_id)
	{
	$q="SELECT description FROM tbl_param WHERE param='leveltahapktube' AND var =$level_id";
	list($name)=mysql_fetch_row(mysql_query($q));
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


	$teacherid = $_GET['teacherid'];
?>
<br>
<div id="tablektube" style="background:#FFFFFF; width:75%">
 
  <br>
  <br>
  <table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Bil</span></th>
        <th><span>Level</span></th>
        <th><span>Subjek</span></th>
        <th><span>IB Profile</span></th>
        <th><span>Tajuk</span></th>
        <?php /*?><th><span>Type</span></th><?php */?>
        <th><span>Action</span></th>
      </tr>
    </thead>
    <tbody>
<?php
$uploadby=$_SESSION["log"]["userid"];
$q="SELECT * FROM ktube_content WHERE flag=1 and upload_by='$teacherid'";
$r=mysql_query($q);
$bil=0;

while($data=mysql_fetch_array($r)){
?>

<tr>
  <td class="lalign"><?php echo $bil+1; ?></td>
  <td><?php echo get_level_name($data["level_id"]); ?></td>
  <td><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  <td><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  <td style="padding:8px;" align="left"><a title="<?php echo $data["title"]; ?>" href="<?php echo $base;?>index.php/ktube_control/details?id=<?php echo $data["id"]; ?>" onclick="window.open(this.href, 'child', 'scrollbars,width=950,height=600'); return false" style="color:#666666; text-decoration:underline">
  
 <?php echo $nama_supp=ellipse($data["title"],50,$crop_str='...'); ?>
 </a></td>
 <?php /*?> <td><?php echo $data["type2"]; ?></td><?php */?>
  <td>
<!------------------------------------------------action---------------------------------------------------------------------->

<table cellpadding="0" cellspacing="0">
<tr>
<td>
<?php
if($data["type2"]=="Video"){
?>
<a href="<?php echo $site."/ktube_control/open_video/$data[id]"; ?>"title="<?php echo $data["title"]; ?>" rel="gb_page_center[600, 400]" >
<img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30"/>
</a>
<?php
}//if video
?>

<?php
if($data["type2"]=="Document"){
?>
<a href="<?php echo $site."/ktube_control/open_document/$data[id]"; ?>" onClick="window.open(this.href, 'child', 'scrollbars,width=950,height=600'); return false" title="<?php echo $data["title"]; ?>">
<img src ="<?php echo $base; ?>/images/open-file.png" width = "30" height = "30"/>
</a>
<?php
}//if video
?>



</td>




</tr>
</table>
  

<!------------------------------------------------------action---------------------------------------------------------------->  </td>
</tr>
<?php
$bil++;
}//while
?>
</tbody>
</table>
<br>
<br>

</div>