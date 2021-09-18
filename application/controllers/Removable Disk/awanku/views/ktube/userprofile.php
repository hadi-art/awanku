<?php
function getfnama($uname)
{	
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
	return $name;

}


?> 

<div style="background:#666; width:auto; height:30px; color:#FFF"><u><h2><strong>
<?php $id=$_GET["cid"]; ?>
<?php echo getfnama($id);?> Files
</strong></h2></u>


</div>



<?php 
function getnama($id,$var1,$table,$fk){
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));

	return $name;
	
	}

?>

<div id="tablektube">
 
  
  <table align="center" id="tablektubekeywords" cellspacing="1" cellpadding="1">
    <thead>
      <tr>
        <th><span>Bil</span></th>
        <th><span>Level</span></th>
        <th><span>Subjek</span></th>
        <th><span>IB Profile</span></th>
        <th><span>Tajuk</span></th>
        <th><span>Type</span></th>
      </tr>
    </thead>
    <tbody>
<?php
$uploadby=$_GET["cid"];
$q="SELECT * FROM ktube_content WHERE flag=1 and upload_by='$uploadby'";
$r=mysql_query($q);
$bil=0;

while($data=mysql_fetch_array($r)){
?>

<tr>
  <td class="lalign"><?php echo $bil+1; ?></td>
  <td><?php echo $data["level_id"]; ?></td>
  <td><?php echo getnama($data["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  <td><?php echo getnama($data["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
  <td><?php echo $data["title"]; ?></td>
  <td><?php echo $data["type2"]; ?></td>
  <td>


<!------------------------------------------------------action---------------------------------------------------------------->  </td>
</tr>
<?php
$bil++;
}//while
?>
</tbody>
</table>

</div>