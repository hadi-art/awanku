<?php
$q = mysql_query("SELECT * FROM tbl_userinfo WHERE id=$_GET[id]");
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


if(isset($_POST['submit']))
{

$q="update tbl_userinfo set fullname='$_POST[fullname]',noic='$_POST[noic]',password='$_POST[password]',username='$_POST[username]' Where id='$_GET[id]'";

mysql_query($q);

echo "<script>alert('Updated Profile');</script>";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../include/css.css" />
<title>Manage</title>
</head>
<body>
<form name="" method="post" action="" enctype="multipart/form-data">

<table width="577" align="center">
<tr valign="top">
  <td width="154">Fullname</td>
  <td width="9">:</td>
  <td width="398"><input name="fullname" type="text" size = "50" value="<?php echo $s["fullname"]; ?>" /></td>
</tr>
<tr valign="top">
  <td width="154">No IC</td>
  <td width="9">:</td>
  <td width="398"><input name="noic" type="text" size = "50" value="<?php echo $s["noic"]; ?>" /></td>
</tr>
<tr valign="top">
  <td width="154">Username</td>
  <td width="9">:</td>
  <td width="398"><input name="username" type="text" size = "50" value="<?php echo $s["username"]; ?>" /></td>
</tr>
<tr valign="top">
  <td width="154">Password</td>
  <td width="9">:</td>
  <td width="398"><input name="password" type="text" size = "50" value="<?php echo $s["password"]; ?>" /></td>
</tr>
<tr>
<td><input name="submit" type="submit" value="Save" ></td>
</tr>
</table>
</form>
</body>
</html>