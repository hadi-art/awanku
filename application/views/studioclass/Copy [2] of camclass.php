<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
</style>

<div class="content">
<div class="title" style="float:left; padding: 10px;">
<?php
echo $cid=$_GET["cid"];
echo "select guru_id,name,cam_url from classlist_v2 where id='$cid'";
list($guruid,$namakelas,$camurl)=mysql_fetch_row(mysql_query("select guru_id,name,cam_url from classlist_v2 where id='$cid'"));
list($namaguru)=mysql_fetch_row(mysql_query("select fullname from tbl_userinfo where id='$guruid'"));
?> 
<table>
<tr> 
  <td>Class</td>
  <td>:</td>
  <td><?php echo $namakelas; ?></td>
</tr>
<tr>
  <td>Teacher</td>
  <td>:</td>
  <td><?php echo $namaguru; ?></td>
</tr>
<tr>
  <td>Session time</td>
  <td>:</td>
<td><?php echo date("d/m/Y"); ?>&nbsp;&nbsp;||&nbsp;&nbsp;<?php echo date("H:i:s"); ?></td>
</tr>
</table>
</div>
<div class="camera" style="float:right; padding: 10px;">
<?php /*?><img src="<?php echo $cam["cam1"]; ?>" height="300" width="550"/><?php */?>


<?php
if($cid==12){
?>
<iframe src="<?php echo $camurl; ?>" width="800" height="400" frameborder="0"></iframe>
<?php
}//if zavio

else{
?>

<iframe src="<?php echo $camurl; ?>" width="800" height="400" frameborder="0"></iframe>
<?php
}//else axis
?>


</div>
<div class="attendance" style="padding: 2px;" align="center">
<iframe src="<?php echo site_url()."/studioclass_control/viewattendance_ajax?cid=$cid"; ?>" width="100%" height="600" frameborder="0"></iframe>
</div>
</div>
</body>
</html>
