<?php
$q = mysql_query("SELECT * FROM ktube_content WHERE flag=1 and id=$_GET[id]");
$s = mysql_fetch_assoc($q);
#print_r($_SESSION);
	function getnama($id,$var1,$table,$fk){
	
	
	#$s["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../include/css.css" />
<title>BOM</title>
</head>
<body>
<table width="577" align="center">
<tr valign="top">
  <td width="154">Title</td>
  <td width="9">:</td>
  <td width="398"><?php echo $s["title"]; ?></td>
</tr>
<tr valign="top">
  <td>Subject </td>
  <td>:</td>
  <td><?php echo getnama($s["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
</tr>
<tr valign="top">
  <td>Uploaded By</td>
  <td>:</td>
  <td><?php echo getnama($s["upload_by"],"fullname","tbl_userinfo","id"); ?></td>
</tr>  
  <tr valign="top">
  <td>Uploaded Date</td>
  <td>:</td>
  <td><?php echo $s["time"]; ?></td>
</tr>
<tr valign="top">
  <td>Level</td>
  <td>:</td>
  <td><?php echo $s["level"]; ?></td>
</tr>
<tr valign="top">
  <td>IB Profile</td>
  <td>:</td>
  <td><?php echo getnama($s["profile_id"],"profile","ktube_ibprofile","profile_id"); ?></td>
</tr>
<tr valign="top">
  <td>Resource</td>
  <td>:</td>
  <td>
  <?php
$mmm="SELECT a.*,b.* FROM tbl_content a, ktube_content b Where a.source_id='$s[source_id]' AND b.id='$s[id]'";
$nnn=mysql_query($mmm);
while($dd=mysql_fetch_array($nnn)){
?>
  <div><?php echo $dd["source"]; ?></div><?php }?>
  </td>
</tr>
<tr>
<td>Views</td>
<td>:</td>
<td><?php echo $s["view_count"]; ?></td>
</tr>
</table>
</body>
</html>