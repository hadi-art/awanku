<style>


html {
 font-family:tahoma;
}
input{ 
	word-wrap: break-word;
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
	/* Check if this image is PNG or GIF, then set if transparent */
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
$question_id = $_GET['cid'];
		
		//----------upload photo---------------------------
		if(isset($_FILES['photo'])){
		  $errors= array();
		  $file_name = $_FILES['photo']['name'];
		  $file_size =$_FILES['photo']['size'];
		  $file_tmp =$_FILES['photo']['tmp_name'];
		  $file_type=$_FILES['photo']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
		  
		  $expensions= array("jpeg","jpg","png" , "gif");
		  
		  
		 $file_content = scaleImageFileToBlob($_FILES['photo']['tmp_name']);
		 $filetakdeslashes = $file_content;
		 $file_content = addslashes($file_content);
		  
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must exactly 2 MB';
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

$q="update  elearning_question  set picture='$file_content' Where question_id='$question_id'";

	if(mysql_query($q))
	{
?>
		<script type="text/Javascript">
			<!--
				alert("Edit Image Successful!");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">

<?php
	}
	
	else
	{
?>
	<script type="text/Javascript">
			<!--
				alert("Edit Image Unsuccessfull");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
	
<?php
	}

}
?>

<?php
	if (isset($_POST["editquestion"]))
{
			$question_id = $_GET['cid'];
		
 		$question =$_POST['soalan'];
		$ans_one  =$_POST['ans_one'];
		$ans_two  =$_POST['ans_two'];
		$ans_three=$_POST['ans_three'];
		$ans_four =$_POST['ans_four'];
		$correctanswer= $_POST['correctanswer'];
		
	

		$update = "update elearning_question set question='$question', answer_one='$ans_one', answer_two='$ans_two', answer_three='$ans_three', answer_four='$ans_four', correct_answer='$correctanswer' where question_id='$question_id'";
		
	if(mysql_query($update))
	{
?>
		<script type="text/Javascript">
			<!--
				alert("Edit Successful!");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">

<?php
	}
	
	else
	{
?>
	<script type="text/Javascript">
			<!--
				alert("Edit Unsuccessfull");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
	
<?php
	}

}
?>

<?php
 
 	$question_id = $_GET['cid']; 
	
 	$query="Select * from elearning_question where question_id='$question_id'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
?>

    <form method="post" name="photo" enctype="multipart/form-data">
 	<table width="60%" height="30%" align="left">
  	<tr> 
        <td width="54"><input type="hidden" name="No" id="No" value="<?php $row['question_id'] ?>"></td>
		<td></td>
		<td></td>
    </tr>
	<tr>
	 <?php 
  			if($row['picture']=="")
			{
			echo '<tr>';
			echo '<td>Image</td>';
			echo '<td>:</td>';
			echo'<td><input type="file" name="photo"/></td>';
			//echo '<input type="file" name="photo"/><p></p>';
			echo '<td></td>';
			echo '<td><input type="submit" name="editpic" value="Update Image"/></td>';
		  ?>
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
			echo '<tr>';
			echo '<td>Image</td>';
			echo '<td>:</td>';
			echo'<td>';
 	  		echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="200"/><p></p>' ;
			echo '<input type="file" name="photo"/><p></p>';
			echo '<input type="submit" name="editpic" value="Update Image"/><p></p>';
  		 #$this->load->view('awanku/profile_picture',$data2);
	}
   ?><br>
   </tr>
   </table>
   </form>
<!-------------------------------------------------------end of image form-------------------------------->  
  <form method="post" name="question" enctype="multipart/form-data">
 	<table width="60%" height="30%" align="left">
  	<tr> 
        <td valign="top">Soalan</td>
		<td valign="top">:</td>
        <td valign="top"><textarea name="soalan" style="width:400px;height:95px;" required><?php echo $row["question"]; ?></textarea></td>
    </tr>
	
<?php
	if ($row["question_type"] == '1')
	{
?>	
	<tr>
		<td height="67"></td>
		<td></td>
		<?php
		if ($row["correct_answer"] == '1')
		{
		?>
		
	  <td><input type="radio" name="correctanswer" value="1" required checked="checked"><input type="textarea" name="ans_one" value="<?php echo $row["answer_one"]; ?>" size="50"></textarea></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="1" required><input type="textarea" size="50" name="ans_one"  value="<?php echo $row["answer_one"]; ?>"></textarea></td>
		
		<?php
		}
		?>
	</tr>

	<tr>
		<td height="52"></td>
		<td></td>
		<?php		
		if ($row["correct_answer"] == '2')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="2" required checked="checked"><input type="textarea"  size="50" name="ans_two" value="<?php echo $row["answer_two"]; ?>"></textarea></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="2" required><input type="textarea" size="50" name="ans_two" value="<?php echo $row["answer_two"]; ?>"></textarea></td>
		
		<?php
		}
		?>
	</tr>
	
  
<?php
	}
?>


<?php
	if ($row["question_type"] == '2')
	{
?>	
	<tr>
		<td height="44"></td>
		<td></td>
				<?php
		if ($row["correct_answer"] == '1')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="1" required checked="checked"><input type="textarea" size="50" name="ans_one" value="<?php echo $row["answer_one"]; ?>"></textarea></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="1" required><input type="textarea" name="ans_one" size="50" value="<?php echo $row["answer_one"]; ?>"></textarea></td>
		
		<?php
		}
		?>
	</tr>

	<tr>
		<td height="61"></td>
		<td></td>
				<?php
		if ($row["correct_answer"] == '2')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="2" required checked="checked"><input type="textarea" name="ans_two" size="50" value="<?php echo $row["answer_two"]; ?>"></textarea></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="2" required><input type="textarea" name="ans_two" size="50" value="<?php echo $row["answer_two"]; ?>"></textarea></td>
		
		<?php
		}
		?>
	</tr>
	
	<tr>
		<td height="44"></td>
		<td></td>
		<?php if ($row["correct_answer"] == '3')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="3" required checked="checked"><input type="textarea" size="50" name="ans_three" value="<?php echo $row["answer_three"]; ?>"></textarea></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="3" required><input type="textarea" name="ans_three" size="50" value="<?php echo $row["answer_three"]; ?>"></textarea></td>
		
		<?php
		}
		?>
	</tr>

	<tr>
		<td height="61"></td>
		<td></td>
		<?php
		if ($row["correct_answer"] == '4')
		{
		?>
		
		<td><input type="radio" name="correctanswer" value="1" required checked="checked"><input type="textarea" size="50" name="ans_four" value="<?php echo $row["answer_four"]; ?>"></textarea></td>
		
		<?php
		}
		
		else
		{
		?>
		<td><input type="radio" name="correctanswer" value="1" required><input type="textarea" name="ans_four" word-wrap="break-word" size="50" value="<?php echo $row["answer_four"]; ?>"></textarea></td>
		
		<?php
		}
		?>
	</tr>
	

  
<?php
	}
?>

	<tr>
	  	<td></td>
		<td></td>
      	<td align="right"><input name="editquestion" class="button" type="submit" value="Update Question"></td>
    </tr>
</table>
</form>