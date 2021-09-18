
<style>


html {
 font-family:tahoma;
}


</style>

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



if(isset($_POST['edit']))
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
		  
		  
		  if(in_array($file_ext,$expensions)=== false){
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
	   
	   
	   #print_r($_FILES);
	     
	   
		//----------upload photo---------------------------

$q="update tbl_userinfo set password='$_POST[password]', email='$_POST[email]', nohp='$_POST[notel]', notel='$_POST[tel]',picture='$file_content' Where username='$nama'";

mysql_query($q);
echo "<script>alert('Updated');</script>";

}
?>


<div align="center">

<div align="center" style="color:#000; background:#59E0DA; width:550px; height:30px;"><strong>
<h2>Hai <?php echo $_SESSION["log"]["fullname"]; ?> !</h2></strong></div>
<br /><br />
<form name="" method="post" action="" enctype="multipart/form-data">		
  
  <table width="531" border="0" align="center">
<?php

$nama=$_SESSION["log"]["username"];
$q="select * from tbl_userinfo Where username='$nama'";
$r=mysql_query($q);
$row=mysql_fetch_array($r);
?>
    <tr><td colspan="3" rowspan="8">
  <?php 
  	if($row['picture']=="NULL")
	{
  ?>
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/>' ;
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
   echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/>' ;
   #$this->load->view('awanku/profile_picture',$data2);
	}
   ?>
    <input type="hidden" name="pica" id="pica"/>

    
	<td>&nbsp;</td>
    <td width="107">Fullname</td>
	<td width="9">
	
	</td>
	<td width="180"><?php echo $row["fullname"]; ?></td>
    </tr>
	
	<tr>
	  <td>&nbsp;</td>
	  <td>IC</td>
	  <td>:</td>
	  <td><?php echo $row["noic"]; ?></td>
    </tr>
	
	<tr>
	<td>&nbsp;</td>
    	<td>Username</td>
		<td>:</td>
		<td><?php echo $_SESSION["log"]["username"]; ?>
		</td>
    </tr>
	
    <tr>
	<td>&nbsp;</td>
    	<td>Password</td>
		<td>:</td>
		<td><input type="password" name="password" value="<?php echo $row["password"]; ?>"></td>
    </tr>
	
    <tr>
	<td>&nbsp;</td>
    	<td>Email</td>
		<td>:</td>
		<td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
    </tr>
	
    <tr>
	<td>&nbsp;</td>
    	 <td width="107">No Phone</td>
		 <td>:</td>
		<td><input type="text" name="tel" value="<?php echo $row["notel"]; ?>"></td>
    </tr>
	
    <tr>
	<td>&nbsp;</td>
    	<td>No HP</td>
		<td>:</td>
		<td><input type="text" name="notel" value="<?php echo $row["nohp"]; ?>"></td>
    </tr>
	
    <tr>
	<td>&nbsp;</td>
		<td>Image</td>
		<td>:</td>
		<td width="180"><input type="file" name="photo"></td>
    </tr>
    
	<tr>
		<td width="51">&nbsp;</td>
		<td width="46">&nbsp;</td>
		<td width="54">&nbsp;</td>
		<td width="54">&nbsp;</td>
    </tr>
	
    <tr>
    	<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
        <td><input type="submit" name="edit" value="Update"></td>
    </tr>
</table>

</form>
</div>