<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password</title>
</head>

<?php 
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];

$q="UPDATE tbl_userinfo SET PASSWORD='$_POST[username]' WHERE username='$username' AND fullname LIKE '%$fullname%'";

mysql_query($q);
?>
<script type="text/Javascript">
			<!--
				alert("Edit Title Unsuccessful!");
				
	-->
			</script>
            <body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
	<?php
}
?>
<body>
<form name="" method="post" action="" enctype="multipart/form-data">
<table width="200" border="0">
  <tr>
    <td>Fullname</td>
    <td>:</td>
    <td><input type="text" name="fullname"/></td>
    <td style="font-size:9px">*compulsory</td>
  </tr>
  <tr>
    <td>Awan ID</td>
    <td>:</td>
    <td><input type="text" name="username"/></td>
    <td style="font-size:9px">*compulsory</td>
  </tr>
 <?php /* <tr>
    <td>Level</td>
    <td>:</td>
    <td><select name="level_id" onchange="showP_level(this.value)">
      <option value="">-Choose Level-</option>
      <option value="1">Guru</option>
      <option value="2">Pelajar</option>
    </select></td>
  </tr> */ ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="submit" type="submit" value="Reset" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</body>
</html>
