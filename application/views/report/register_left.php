
<script>

function showP_class(str)
{
if (str=="")
  {
  document.getElementById("showClass").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showClass").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $site."/report_control/showClass"; ?>?q="+str,true);
xmlhttp.send();
}

</script>

<style type="text/css">

.TFtable
{
	width:60%; 
	border-collapse:collapse; 
}

.TFtable td
{ 
	padding:7px; border:#000000 1px solid;
}

table.one
{
border-style:ridge;
border-color:#98bf21;
} 

.container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }

body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}

/** page structure **/
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

##tablektubekeywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#tablektubekeywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#tablektubekeywords thead tr th { 
  font-weight: bold;
  padding: 5px 4px;
  
}
#tablektubekeywords thead tr th span { 
  
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#tablektubekeywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}



#tablektubekeywords tbody tr { 
  color: #555;
}
#tablektubekeywords tbody tr td {
  text-align: center;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
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

 
  if(isset($_POST['submit']))
{
		
		
		$fullname=$_POST["fullname"];
		$noic=$_POST["noic"];
		$email=$_POST["email"];
		$nama=$_POST["nama"];
		$tel=$_POST["tel"];
		$notel=$_POST["notel"];
		//$password=$_POST["password"];
		//$class=$_POST["class"];
		$level=$_POST["level"];
		
		
		if($level=='1'){
			$password='G'.$_POST["noic"];
		}
		
		if($level=='2'){
			$password='P'.$_POST["noic"];
		}
		
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
					
	$insert=mysql_query("insert into tbl_userinfo set fullname='$fullname', noic='$noic', email='$email', username='$nama' , notel='$tel' , nohp='$notel' , password='$password',class_id='',class_level='',picture='$file_content', level_id='$level' ")or die(mysql_error());


}
?>
<br /><br />

<div id="tablektube">
<h2><br /><div align="center" style=" width:90%; height:30px;"><strong>All User</strong></div></h2>


<table width="100%" height="32">
<form method="post" action="<?php echo base_url('index.php/report_control/search')?>">
	<tr>
		<td align="right"><input type="text" width="100%" class="search" id="searchid" name="search" placeholder="Search user" />
		
		</td>
	</tr>
	</form>
	
</table><br />


<?php
	$bil=0;
	$q="SELECT * FROM tbl_userinfo WHERE level_id='1' ORDER BY fullname ASC ";

	$r=mysql_query($q);
	
	?>
    
<table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" width="100%">
    <thead>
      <tr>
        <th style="padding:4px;"><span>Bil</span></th>
        <th style="padding:4px;"><span>Fullname</span></th>
        <th style="padding:4px;"><span>No IC</span></th>
        <th style="padding:4px;"><span>Username</span></th>
        <th style="padding:4px;"><span>Password</span></th>

      </tr>
    </thead>
    
    <?php
	while($data=mysql_fetch_array($r))
	{
	?>
    <tr>
		<td class="lalign" style="padding:4px;"><center><?php echo $bil+1; ?></center></td>
        
  		<td style="text-align:left"><?php echo $data["fullname"]; ?></td>
        
        <td class="lalign" style="padding:4px;"><center><?php echo $data["noic"]; ?></center></td>
        
  		<td style="padding:4px;"><?php echo $data["username"]; ?></td>
        
        <td style="padding:4px;"><?php echo $data["password"]; ?></td>

	</tr>
	<?php
	$bil++;
	}
	
	?>
</table>   
</div>