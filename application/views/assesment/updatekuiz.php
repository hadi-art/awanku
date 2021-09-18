<style type="text/css">
.finish {
  background: #dce0dc;
  background-image: -webkit-linear-gradient(top, #dce0dc, #999999);
  background-image: -moz-linear-gradient(top, #dce0dc, #999999);
  background-image: -ms-linear-gradient(top, #dce0dc, #999999);
  background-image: -o-linear-gradient(top, #dce0dc, #999999);
  background-image: linear-gradient(to bottom, #dce0dc, #999999);
  -webkit-border-radius: 26;
  -moz-border-radius: 26;
  border-radius: 26px;
  font-family: Arial;
  color: #030303;
  font-size: 19px;
  padding: 1px 16px 4px 15px;
  text-decoration: none;
}

.finish:hover {
  background: #dbdbdb;
  text-decoration: none;
}

.btn {
  background: #dce0dc;
  background-image: -webkit-linear-gradient(top, #dce0dc, #999999);
  background-image: -moz-linear-gradient(top, #dce0dc, #999999);
  background-image: -ms-linear-gradient(top, #dce0dc, #999999);
  background-image: -o-linear-gradient(top, #dce0dc, #999999);
  background-image: linear-gradient(to bottom, #dce0dc, #999999);
  -webkit-border-radius: 26;
  -moz-border-radius: 26;
  border-radius: 26px;
  font-family: Arial;
  color: #030303;
  font-size: 19px;
  padding: 1px 16px 4px 15px;
  text-decoration: none;
}

.btn:hover {
  background: #dbdbdb;
  text-decoration: none;
}



</style>


<script type="text/javascript">
 	var GB_ROOT_DIR = "<?php echo $base; ?>/include/greybox/";
</script>

<script language="javascript"> 
opener.location.reload(true);
   self.close();
</script>

<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>include/greybox/gb_scripts.js"></script>
<link href="<?php echo $base; ?>include/greybox/gb_styles.css" rel="stylesheet" type="text/css" />


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
if(isset($_POST['submittrue']))
{
		
		$question_type = $_GET['type'];
		
		$truefalse=$_POST["truefalse"];
		$answerone=$_POST["answerone"];
		$answertwo =$_POST["answertwo"];
		$correctanswer =$_POST["correctanswer"];
		$id = $_GET['cid'];
		//----------upload photo---------------------------
		if(isset($_FILES['photo'])){
		  $errors= array();
		  $file_name = $_FILES['photo']['name'];
		  $file_size =$_FILES['photo']['size'];
		  $file_tmp =$_FILES['photo']['tmp_name'];
		  $file_type=$_FILES['photo']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
		  
		  $expensions= array("jpeg","jpg","png" , "gif");
		  
		  print_r($_FILES);
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
		
		
		
		$insert=mysql_query("insert into elearning_question set title_id='$id', question='$truefalse', answer_one='$answerone', answer_two='$answertwo', correct_answer='$correctanswer', question_type = '$question_type' , picture='$file_content'")or die(mysql_error());


 	header ('Location: ' . $_SERVER['REQUEST_URI']);
    exit();

}

?>



<?php if(isset($_POST['submitchoice']))
{
		
		$question_type = $_GET['type'];
		
		$choice=$_POST["choice"];
		$answerone=$_POST["answerone"];
		$answertwo =$_POST["answertwo"];
		$answerthree =$_POST["answerthree"];
		$answerfour =$_POST["answerfour"];
		$correctanswer =$_POST["correctanswer"];
		$id = $_GET['cid'];
		//----------upload photo---------------------------
		if(isset($_FILES['photo'])){
		  $errors= array();
		  $file_name = $_FILES['photo']['name'];
		  $file_size =$_FILES['photo']['size'];
		  $file_tmp =$_FILES['photo']['tmp_name'];
		  $file_type=$_FILES['photo']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
		  
		  $expensions= array("jpeg","jpg","png" , "gif");
		  
		  print_r($_FILES);
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
		
		
		$insert=mysql_query("insert into elearning_question set title_id='$id', question='$choice', answer_one='$answerone', answer_two='$answertwo', answer_three='$answerthree', answer_four='$answerfour', correct_answer='$correctanswer', question_type = '$question_type' , picture='$file_content'")or die(mysql_error());


 	header ('Location: ' . $_SERVER['REQUEST_URI']);
    exit();

}

?>





<?php
	function getsubject($id)
	{
	
	
	
	$q="SELECT subject FROM ktube_subject WHERE subject_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
			
	
	return $name;
	
	}

?>


<?php

	$title_id=$_GET['cid'];
	$id=$_GET['subject'];

	$q="SELECT * FROM elearning_title where title_id='$title_id='";
	$r=mysql_query($q);
	$data=mysql_fetch_array($r);
	
	
	
	{
	


?>	

<style type="text/css">
<!--
body,td,th {
	font-size: 14px;
}
-->
</style><div id="content" style="background:#FFFFFF;width:72%;margin-left:10px;height:auto; float:left;margin-top:10px; border-radius: 20px; ">
<center>
<br>
<br>
	
	<table width="85%">
		<tr>
		
			<td width="133"><strong>Title</strong></td>
			<td width="10"><strong>:</strong></td>
			<td colspan="2"><strong><?php echo $data['title']; ?><a href="<?php echo base_url('index.php/assesment_control/updatetitle?cid='.$data["title_id"].''); ?>" rel="gb_page_center[700, 500]" target="_blank"><img src ="<?php echo $base; ?>/images/edit2.png" width = "30" height = "30"/></a></strong></td>
		</tr>
		
		<tr>
			<td><strong>Subject</strong></td>
			<td><strong>:</strong></td>
			<td colspan="2"><strong><?php echo getsubject($data['subject']); ?></strong></td>
		</tr>
		
		<tr>
			<td><strong>Level</strong></td>
			<td><strong>:</strong></td>
			<td colspan="2"><strong><?php echo $level_id =  $data['level']; ?></strong></td>
		</tr>	
	</table>





<table width="85%">
	<tr>
	
		<td width="24%"></td>
		<td width="27%"><a class="btn" href="?cid=<?php echo $title_id; ?>&true&type=1&id=<?php echo $data['level']; ?>" style="text-decoration:none; ">True / False</a></td>
			
		<td width="49%"><a class="btn" href="?cid=<?php echo $title_id; ?>&choice&type=2&id=<?php echo $data['level']; ?>" style="text-decoration:none;">Multiple Choice</a></td>
	
	</tr>
</table>

<br />
<br />

	
<?php							
if(isset($_GET['true']))
{
	$type = $_GET['type'];
?>	
	
	<form method="post" enctype="multipart/form-data">
	<table width="71%" cellpadding="5%" cellspacing="5%" >
		<tr>
		<td valign="top">Question</td>
			<td width="8" valign="top">:</td>
			<td width="434"><textarea name="truefalse" style="width:400px;height:95px;" required></textarea></td>
		</tr>
		<tr>
			<td>Image</td>
			<td>:</td>
			<td><input type="file" name="photo" /></td>
		</tr>
		<tr>
			<td width="63">Answer</td>
			<td>:</td>
			<td><input type="text" name="answerone" size="50" required> <input type="radio" name="correctanswer" value="1" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answertwo" size="50" required> <input type="radio" name="correctanswer" value="2" required></td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
		    <td align="right"><input type="submit" name="submittrue" value="Done" id="submit"></td>
		</tr> 
	</table>
	</form>
	
	
	
<?php
	
}
?>

<?php							
if(isset($_GET['choice']))
{
	$type = $_GET['type'];
?>	
	<form method="post" enctype="multipart/form-data">
	<table width="74%" cellpadding="5%" cellspacing="5%">
		<tr>
			<td valign="top">Question</td>
			<td width="10" valign="top">:</td>
			<td><textarea name="choice" style="width:400px;height:95px;" required></textarea></td>
		</tr>
		<tr>
			<td>Image</td>
			<td>:</td>
			<td><input type="file" name="photo" /></td>
		</tr>
		<tr>
			<td width="59">Answer</td>
			<td>:</td>
		  <td width="459"><input type="text" name="answerone" size="50" required> <input type="radio" name="correctanswer" value="1" required> </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answertwo" size="50" required> <input type="radio" name="correctanswer" value="2" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answerthree" size="50" required> <input type="radio" name="correctanswer" value="3" required> </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="text" name="answerfour" size="50" required> <input type="radio" name="correctanswer" value="4" required> </td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
		    <td align="right"><input name="submitchoice" type="submit" value="Done" ></td>
		</tr> 
	</table>
	</form>
<?php

}
?>

<?php
	
	$title_id=$_GET['cid'];
	
	
	
	$query="SELECT * FROM elearning_question WHERE title_id='$title_id'";
	$q=mysql_query($query);
	

	
?>

	<br />
 	<h3>QUESTION LIST</h3>
	<table border ="1" width="97%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center" cellpadding="5%" >
    <tr bgcolor="#99CCFF">
   		<th width="5%">Bil</th>
      	<th width="25%">Question</th>
    	<th>A1</th>
		<th>A2</th>
		<th>A3</th>
		<th>A4</th>
		<th width="9%">Action </th>
		
	</tr>
	
	
	
	<?php
	$count=1;
	while($row=mysql_fetch_array($q))
	{
	?> 
	
	<form method="post">
    <tr>
		<td align="center"><input name="id"  type="hidden" value="bil"> <?php echo $count; ?></td>
    	
		<td style="width:auto; height:auto"><center> <?php 
  			if($row['picture']=="")
				{
				echo '' ;
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
 	  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '" width="100%" height="50%"/>' ;
  		 #$this->load->view('awanku/profile_picture',$data2);
			}
  		 ?>
		</center>
		<center><?php echo nl2br ($row['question']); ?></center></td>
		
		<td width="16%"><center><?php echo $row['answer_one']; ?></center></td>
		<td width="13%"><center><?php echo $row['answer_two']; ?></center></td>
		<td width="14%"><center><?php echo $row['answer_three']; ?></center></td>
		<td width="15%"><center><?php echo $row['answer_four']; ?></center></td>
		<td><center>
		<a href="<?php echo base_url('index.php/assesment_control/update?cid='.$row["question_id"].''); ?>" rel="gb_page_center[600, 600]" target="_blank"><img src ="<?php echo $base; ?>/images/edit2.png" width = "30" height = "30"/></a>
		</center></td>
		
		
		
		
	</tr>
	</form>
	  
	  
	 <?php
	 $count++;
	 }
	 ?> 
  </table>
<br />

<?php

	
	$id=$_GET['level'];

	$q="SELECT * FROM elearning_title where title_id='$title_id='";
	$r=mysql_query($q);
	$row=mysql_fetch_array($r);
	
	
	{

?>	
<a class="finish" href="<?php echo $site; ?>/assesment_control/viewquiz?id=<?php echo $row['level']; ?>" style="color:#000000; text-decoration:none; font-size:small">Finish</a>
<br />	

	
	
	
	
<?php
}
}
?>	
	
<br>
<br>
<br>
		
</div>
</div>