<?php
function guru($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}




?>







<meta name="viewport" content="width=device-width, , initial-scale=1.0, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/css.css'); ?>" />
<link rel="stylesheet" type="text/css" href="include/css.css" />
<title>AWANKU</title>

<div class="content" style="height:auto">
<div class="title" style="float:left; width:40%">
<?php

		$id = $_GET["cid"];
		$q = mysql_query("select * from classlist_v2 where id='$id'");
		$data = mysql_fetch_array($q);
			
		
			
		
			

			

?>
<table id="tablektube">
<tr>
  <td style="color:#0033CC; font-family: 'Amarante', Tahoma, sans-serif;"><b>Class</b></td>
  <td style="color:#0033CC"><b>:</b></td>
  <td style="font-family: 'Amarante', Tahoma, sans-serif;"><?php echo $data["name"]; ?>
  </td>
</tr>
<tr>
  <td style="color:#0033CC; font-family: 'Amarante', Tahoma, sans-serif;"><b>Teacher</b></td>
  <td style="color:#0033CC"><b>:</b></td>
  <td style="font-family: 'Amarante', Tahoma, sans-serif;"><?php echo guru($data["guru_id"]); ?></td>  
</tr>

<tr>
  <td style="color:#0033CC; font-family: 'Amarante', Tahoma, sans-serif;"><b>Session time</b></td>
  <td style="color:#0033CC"><b>:</b></td>
	<td style="font-family: 'Amarante', Tahoma, sans-serif;"><?php echo date("d/m/Y H:i:s"); ?></td>
</tr>

</table>
<br />
<br />
</div>

<div style="float:right; position:absolute; left:70; top:90; width:60%; height:100%">
  <iframe width="60%" height="80%" src="<?php echo $site."/studioclass_control/viewattendance?cid=$id";?>"></iframe>
</div>

<div class="camera" style="float:left; width:40%; position:absolute; right:10%; top: 10px;">
&nbsp;<br>
<br><br><br>
<?php /*?><img src="<?php echo $cam["cam1"]; ?>" height="300" width="550"/><?php */?>
<?php /*?><img src="<?php echo $data["cam_url"]; ?>" height="500" width="600"></img>
<?php */?>

<iframe src="<?php echo $site."/studioclass_control/class_camera/?cid=$id";?>" width="800" height="600" frameborder="0"></iframe>

<?php /*?><iframe src="<?php echo $data["cam_url"]; ?>" width="800" height="400" frameborder="0"></iframe><?php */?>

</div>


</div>

