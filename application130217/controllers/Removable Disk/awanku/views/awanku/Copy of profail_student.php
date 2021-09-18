<title>AWANKU</title>
<style>


html {
 font-family:tahoma;
}


</style>


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

<div align="center" style="color:#000; background:#59E0DA; width:50%; height:30px;"><strong>
<h2>Hai <?php echo $_SESSION["log"]["fullname"]; ?> !</h2></strong></div>
<br />
<form name="" method="post" action="" enctype="multipart/form-data">		
  
  <table width="51%" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>
	<tr><td colspan="3" rowspan="7">
  <?php 
  	if($row['picture']=="")
	{
  ?>
    <img src="<?php echo $base?>images/profile.gif" width="120" height="130" /> 
	<br />
	<input type="file" name="file" />
	<?php /*?><input type="submit" name="submit" value="upload" /><?php */?>
	
	
   <?php  
	}
	else
	{
   $data = $row['picture'];
   echo '<img width="120" height="130" src="data:image/png;base64,' . $data . '" />' ;
	}
   ?>
    <input type="hidden" name="pica" id="pica" value="<?php echo $row["picture"];?>"/>
	
    
    	<td width="12%">Fullname</td><td width="2%">:</td><td width="34%"><?php echo $row["fullname"]; ?></td>
    </tr>
    <br>
	<tr>
	  <td>IC</td>
	  <td>:</td>
	  <td><?php echo $row["noic"]; ?></td>
    </tr>
	<tr><td>Class</td><td>:</td>
     <td><?php
		$c="SELECT b.name FROM tbl_userinfo a, classlist_v2 b WHERE b.id='$row[class_id]' AND a.id='$row[id]'";
		$f=mysql_query($c);
			while($t=mysql_fetch_array($f)){w?>
  <?php echo $t["name"]; ?>
  <?php }?></td>
    </tr>
    <tr>
    	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
    	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
    	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
    	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr><td colspan="3">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
      <td width="19%">Username</td>
      <td width="2%">:</td>
      <td width="31%"><?php echo $_SESSION["log"]["username"]; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="password" value="<?php echo $row["password"]; ?>"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>No Telephone</td>
      <td>:</td>
      <td><input type="text" name="tel" value="<?php echo $row["notel"]; ?>"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>:</td>
      <td><input type="text" name="notel" value="<?php echo $row["nohp"]; ?>"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="3"><input type="submit" name="edit" value="Update"></td><td>&nbsp;</td><td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
  <p>&nbsp;</p>

</form>
</div>