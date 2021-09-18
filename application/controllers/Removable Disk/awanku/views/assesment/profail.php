<?php
if(isset($_POST['edit']))
{
//$vsource=$_POST['vsource'];
$nama=$_SESSION["log"]["username"];
$q="update tbl_userinfo set password='$_POST[password]', email='$_POST[email]', nohp='$_POST[notel]', notel='$_POST[tel]' Where username='$nama'";

mysql_query($q);
echo "<script>alert('Updated');</script>";

}
?>


<div align="center">

<div align="center" style="color:#FFF; background:#F33; width:500px; height:30px"><u><strong><h2>Change Profile <?php echo $_SESSION["log"]["fullname"]; ?></h2></strong></u></div>
<br /><br />
<form name="" method="post" action="" enctype="multipart/form-data">		
  
  <table width="500" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>
	<tr>
    	<td>Fullname</td><td>:</td><td><?php echo $row["fullname"]; ?></td>
    </tr>
	<tr>
	  <td>IC</td>
	  <td>:</td>
	  <td><?php echo $row["noic"]; ?></td>
    </tr>
	<tr>
    	<td>Username</td><td>:</td><td><?php echo $_SESSION["log"]["username"]; ?></td>
    </tr>
    <tr>
    	<td>Password</td><td>:</td><td><input type="password" name="password" value="<?php echo $row["password"]; ?>"></td>
    </tr>
    <tr>
    	<td>Email</td><td>:</td><td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
    </tr>
    <tr>
    	<td>No Telephone</td><td>:</td><td><input type="text" name="tel" value="<?php echo $row["notel"]; ?>"></td>
    </tr>
    <tr>
    	<td>No HP</td><td>:</td><td><input type="text" name="notel" value="<?php echo $row["nohp"]; ?>"></td>
    </tr>
    <tr><td>&nbsp;</td>
    </tr>
    <tr>
    	<td><input type="submit" name="edit" value="Update"> </td>
    </tr>
</table>

</form>
</div>