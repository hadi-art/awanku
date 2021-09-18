<style>


html {
 font-family:tahoma;
}


</style>

<div align="center">
<br /><div align="center" style="color:#000; background:#59E0DA; width:100%; height:30px;"><strong>
<h2>Hai <?php echo $_SESSION["log"]["fullname"]; ?> !</h2></strong></div>
<br /><br />
</div>
<!-----------end of session div------------------------->


<?php
function scaleImageFileToBlob($file) {

 

   //echo $source_pic = $file;

    $max_width = 500;

    $max_height = 500;

                //list($width, $height, $type, $attr) = getimagesize($file);

    list($width, $height, $image_type) = getimagesize($file);

                //$dsas = getimagesize(trim($file));

                //echo $image_type;

                //print_r(getimagesize($file));

    switch ($image_type)

    {

        case 1: $src = imagecreatefromgif($file); break;

        case 2: $src = imagecreatefromjpeg($file);  break;

        case 3: $src = imagecreatefrompng($file); break;

        default: return '';  break;

    }

 

    $x_ratio = $max_width / $width;

    $y_ratio = $max_height / $height;

 

    if( ($width <= $max_width) && ($height <= $max_height) ){

        $tn_width = $width;

        $tn_height = $height;

        }elseif (($x_ratio * $height) < $max_height){

            $tn_height = ceil($x_ratio * $height);

            $tn_width = $max_width;

        }else{

            $tn_width = ceil($y_ratio * $width);

            $tn_height = $max_height;

    }

 

    $tmp = imagecreatetruecolor($tn_width,$tn_height);

 

    /* Check if this image is PNG or GIF, then set if Transparent*/

    if(($image_type == 1) OR ($image_type==3))

    {

        imagealphablending($tmp, false);

        imagesavealpha($tmp,true);

        $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);

        imagefilledrectangle($tmp, 0, 0, $tn_width, $tn_height, $transparent);

    }

    imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

 

    /*

     * imageXXX() only has two options, save as a file, or send to the browser.

     * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream

     * So I start the output buffering, use imageXXX() to output the data stream to the browser,

     * get the contents of the stream, and use clean to silently discard the buffered contents.

     */

    ob_start();

 

    switch ($image_type)

    {

        case 1: imagegif($tmp); break;

        case 2: imagejpeg($tmp, NULL, 100);  break; // best quality

        case 3: imagepng($tmp, NULL, 0); break; // no compression

        default: echo ''; break;

    }

 

    $final_image = ob_get_contents();

 

    ob_end_clean();

 

    return $final_image;

}



if(isset($_POST['editpic']))
{
//$vsource=$_POST['vsource'];

$nama=$_SESSION["log"]["username"];
	
		//----------upload photo---------------------------
		if(isset($_FILES['photo'])){
		  $errors= array();
		  $file_name = $_FILES['photo']['name'];
		  $file_size =$_FILES['photo']['size'];
		  $file_tmp =$_FILES['photo']['tmp_name'];
		  $file_type=$_FILES['photo']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
		  
		  $expensions= array("jpeg","jpg","png");
		  
		  
		 $file_content = scaleImageFileToBlob($_FILES['photo']['tmp_name']);
		 $filetakdeslashes = $file_content;
		 $file_content = addslashes($file_content);
		  
		  
		  if(in_array($file_ext,$expensions)=== false)
		  {
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
		  
		  if(empty($errors)==true){
			 move_uploaded_file($file_tmp,"images/".$file_name);
		  }
		  else{
			 print_r($errors);
		  }
	   }
	   
	   #echo "<pre>";
	   #print_r($_FILES);
	  
	     
	   
		//----------upload photo---------------------------

$q="update tbl_userinfo set picture='$file_content' Where username='$nama'";

mysql_query($q);
echo "<script>alert('Updated Profile Pic');</script>";

}

?>

<?php
if(isset($_POST['edit']))
{
//$vsource=$_POST['vsource'];

$nama=$_SESSION["log"]["username"];

$q="update tbl_userinfo set fullname='$_POST[fullname]', password='$_POST[password]', class_id='$_POST[class]', email='$_POST[email]', nohp='$_POST[notel]', notel='$_POST[tel]' Where username='$nama'";

mysql_query($q);

echo "<script>alert('Updated Profile');</script>";

}

?>


<!------------------------------------------------------------------------------->
<div id="container"  style="width:100%; background-color:#FFFFFF; float:left" align="center">
<?php
	$a = $_SESSION["log"]["username"];
	$l = mysql_query("select level_id,class_id from tbl_userinfo where username='$a'");
	list ($r,$classid) = mysql_fetch_row($l);
 

  if ($r=="1")
	 {	
	 ?>
<div id="picture" style=" width:15%; margin-left:25%; height:auto; float:left;margin-top:10px">

<form name="" method="post" action="" enctype="multipart/form-data">	 		
  
  <table width="162%" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>
    <tr><td>
  <?php 
  	if($row['picture']=="")
	{
  ?>
    <img src="<?php echo $base?>images/profile.gif" width="200"/> 
	<br />
  

   <?php  
	}
	else
	{
 	 $data = $row['picture'];
	 
	 $data2= array(
		'base' => $base,
		'site' => $site,
		'nama' => $nama
		);
   echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="70%" height="50%"/>' ;
   #$this->load->view('awanku/profile_picture',$data2);
	}
   ?><p></p>
    <input type="hidden" name="pica" id="pica"/>
	<input type="file" name="photo"/><br><br>
	<input type="submit" name="editpic" value="Update Photo"/>
	</td>
	</tr>
	</table>
  </form>
  
</div>
 
  
<div id="content" style="width:15%; margin-right:35%;height:auto; margin-left:10%; float:right;margin-top:10px; border-radius: 20px; ">

<form name="" method="post" action="" enctype="multipart/form-data">		
  
  <table width="453" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>


    <td width="110" valign="top">Fullname</td>
	<td width="6" valign="top">:</td>
	<td width="287"><input type="text" name="fullname" value="<?php echo $row["fullname"]; ?>" /><br>&nbsp;&nbsp;<b><a  href="<?php echo $base;?>index.php/my_attandance" onclick="window.open(this.href, 'child', 'scrollbars,width=650,height=600'); return false" style="color:#009">My Attandance</a></b></td>
    </tr>
	
	<tr>
	  <td>IC</td>
	  <td>:</td>
	  <td><?php echo $row["noic"]; ?></td>
    </tr>
	
	<tr>
    	<td>Username</td>
		<td>:</td>
		<td><?php echo $_SESSION["log"]["username"]; ?>
		</td>
    </tr>
	
    <tr>
    	<td>Password</td>
		<td>:</td>
		<td><input type="text" name="password" value="<?php echo $row["password"]; ?>"></td>
    </tr>
	
    <tr>
    	<td>Email</td>
		<td>:</td>
		<td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
    </tr>
	
    <tr>
    	 <td width="110">No Phone</td>
		 <td>:</td>
		<td><input type="text" name="tel" value="<?php echo $row["notel"]; ?>"></td>
    </tr>
	
    <tr>
    	<td>No HP</td>
		<td>:</td>
		<td><input type="text" name="notel" value="<?php echo $row["nohp"]; ?>"></td>
    </tr>
    
	<tr>
		<td width="110">&nbsp;</td>
		<td width="6">&nbsp;</td>
		<td width="287">&nbsp;</td>
		<td width="32">&nbsp;</td>
    </tr>
	
    <tr>
        <td><input type="submit" name="edit" value="Update Profile"></td>
    </tr>
</table>

</form>
</div>
<?php } // level_id = 1

	$a = $_SESSION["log"]["username"];
	$l = mysql_query("select level_id,class_id from tbl_userinfo where username='$a'");
	list ($r,$classid) = mysql_fetch_row($l);
 

  if ($r=="2")
	 {	
	 ?>

<div id="picture" style=" width:15%; margin-left:25%; height:auto; float:left;margin-top:10px">

<form name="" method="post" action="" enctype="multipart/form-data">	 		
  
  <table width="162%" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>
    <tr><td>
  <?php 
  	if($row['picture']=="")
	{
  ?>
    <img src="<?php echo $base?>images/profile.gif" width="200"/> 
	<br />
  

   <?php  
	}
	else
	{
 	 $data = $row['picture'];
	 
	 $data2= array(
		'base' => $base,
		'site' => $site,
		'nama' => $nama
		);
   echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="70%" height="50%"/>' ;
   #$this->load->view('awanku/profile_picture',$data2);
	}
   ?><p></p>
    <input type="hidden" name="pica" id="pica"/>
	<input type="file" name="photo"/><br><br>
	<input type="submit" name="editpic" value="Update Photo"/>
	</td>
	</tr>
	</table>
  </form>
  
</div>
 
  
<div id="content" style="width:15%; margin-right:35%;height:auto; margin-left:10%; float:right;margin-top:10px; border-radius: 20px; ">

<form name="" method="post" action="" enctype="multipart/form-data">		
  
  <table width="453" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>


    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="hidden" name="id" value="<?php echo $row["id"]; ?>"></td>
    </tr>
    <td width="110">Fullname</td>
	<td width="6">:</td>
	<td width="287"><input type="text" name="fullname" value="<?php echo $row["fullname"]; ?>" /></td>
    </tr>
	
	<tr>
	  <td>IC</td>
	  <td>:</td>
	  <td><?php echo $row["noic"]; ?></td>
    </tr>
	
	<tr>
    	<td>Username</td>
		<td>:</td>
		<td><?php echo $_SESSION["log"]["username"]; ?>
		</td>
    </tr>
	
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="text" name="password" value="<?php echo $row["password"]; ?>" /></td>
    </tr>
    <tr>
    	<td>Email</td>
		<td>:</td>
		<td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
    </tr>
	
    <tr>
    	 <td width="110">No Phone</td>
		 <td>:</td>
		<td><input type="text" name="tel" value="<?php echo $row["notel"]; ?>"></td>
    </tr>
	
    <tr>
    	<td>No HP</td>
		<td>:</td>
		<td><input type="text" name="notel" value="<?php echo $row["nohp"]; ?>"></td>
    </tr>
    
	<tr>
		<td width="110">&nbsp;</td>
		<td width="6">&nbsp;</td>
		<td width="287">&nbsp;</td>
		<td width="32">&nbsp;</td>
    </tr>
	
    <tr>
        <td><input type="submit" name="edit" value="Update Profile"></td>
    </tr>
</table>

</form>
</div>
<?php }//level_id 2 ?>



</div>


<?php /*?><div style="float:right">
<iframe src="<?php echo site_url()."/my_attandance/"; ?>"></iframe>
</div><?php */?>