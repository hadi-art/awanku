
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
} // showclass
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

/*#tablektubekeywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#tablektubekeywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}*/


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
		$noic=$_POST["noic"];

		$q="SELECT fullname,noic FROM tbl_userinfo WHERE noic='$noic'";
		list($namepenuh,$nokp)=mysql_fetch_row(mysql_query($q));

		$fullname=$_POST["fullname"];
		$noic=$_POST["noic"];
		$email=$_POST["email"];
		#$nama=$_POST["nama"];
		$tel=$_POST["tel"];
		$notel=$_POST["notel"];
		//$password=$_POST["password"];
		$class=$_POST["class"];
		$level=$_POST["level"];
		
//------------------------------------------------- class_level ------------------------------------------
		if($level=='2'){

		if($class=='1' or $class=='2'  or $class=='3'  or $class=='4'  or $class=='5')
		{
			$form='1';
		}
		
		if($class=='6' or $class=='7'  or $class=='8'  or $class=='9'  or $class=='10')
		{
			$form='2';
		}
		
		if($class=='11' or $class=='12'  or $class=='13'  or $class=='14'  or $class=='15')
		{
			$form='3';
		}
		
		if($class=='16' or $class=='17'  or $class=='18'  or $class=='19'  or $class=='20' or $class=='21')
		{
			$form='4';
		}
		
		if($class=='22' or $class=='23'  or $class=='24'  or $class=='25'  or $class=='26' or $class=='27')
		{
			$form='5';
		}
		
		if($class=='28')
		{
			$form='DP Y1';
		}
		
		if($class=='29')
		{
			$form='DP Y2';
		}

		} // level 2
		else 
		{
			$form='';
		}
//------------------------------------------------- username n password ------------------------------------------

		if($level=='1'){
			$nama='G'.$_POST["noic"];
		}
		else
		{
			$nama='P'.$_POST["noic"];
		}

		if($level=='1'){
			$password='G'.$_POST["noic"];
		}
		
		else {
			$password='P'.$_POST["noic"];
		}
		
				if($nokp==""){

					
	$insert=mysql_query("insert into tbl_userinfo set fullname='$fullname', noic='$noic', email='$email', username='$nama' , notel='$tel' , nohp='$notel' , password='$password',class_id='$class',class_level='$form',level_id='$level' ")or die(mysql_error());

$q="SELECT id FROM tbl_userinfo WHERE noic='$noic'";
list($id)=mysql_fetch_row(mysql_query($q));

	$insert=mysql_query("insert into classlist_set set stud_id='$id', fullname='$fullname', class_id='$class',class_level='$form', language_id = '', fiz_id='', chem_id='', bio_id='', addmath_id='', english_id='', kem_id='', math_id=''")or die(mysql_error());
 
if ($insert) {
    echo "<script type='text/javascript'>alert('submitted successfully! username for $fullname is $nama and password is $password')</script>";
}
		}
		else {
		echo "<script type='text/javascript'>alert('ALERT!! IC Number ". $nokp. " Has Been Registered As ".$namepenuh."')</script>";	
		}
}
?>
<br /><br /><br /><br />
<div id="tablektube">
<h2><br /><div align="center" style="color:#000; background:#59E0DA; width:800px; height:30px;"><strong>Register</strong></div></h2>


<form method="POST" enctype="multipart/form-data" onsubmit="return validateQty()">
<table width="510" border="0" align="center">
	 
	<tr>
			<td width="140">Fullname</td>
			<td width="8">:</td>
	  <td width="336"><input name="fullname" type="text" size="30" required></td>
    </tr>
	
	
	<tr>
	  		<td>IC</td>
	  		<td>:</td>
	  		<td><input name="noic" type="text" size="30" maxlength="12"  placeholder="Contoh : 860424035123" required>
			</td>
   </tr>
	
	
   <?php /*?>	<tr>
    		<td>Username</td>
			<td>:</td>
			<td>
		      <input name="nama" type="text"  size="30" required />*IC no without (-)
		    </td>
    </tr>
	
	
 <tr>
    		<td>Password</td>
			<td>:</td>
			<td><input type="text" name="password" size="30" required>
			(same with username)</td>
    </tr><?php */?>
	
	
    <tr>
    		<td>Email</td>
			<td>:</td>
			<td><input type="email" name="email" size="30"></td>
    </tr>
	
	
    <tr>
    		<td>No Telephone</td>
			<td>:</td>
			<td><input type="text" name="tel" size="30"></td>
    </tr>
	
	
    <tr>
    		<td>No HP</td>
			<td>:</td>
			<td><input type="text" name="notel" size="30"></td>
    </tr>
	
	<tr>
			<td>Level</td>
			<td>:</td>
			<td> <select name="level"  onchange="showP_class(this.value)" required>
				 <option value="">Choose Level</option>
				 <option value="1">Teacher</option>
				 <option value="2">Student</option>
				 </select>			</td>
                 
 	</tr>
 
	<tr>
     		<td height="26">Class</td>
      		<td> :</td>
      		<td>
           <div id="showClass">
		<select style="width:145px;font-family:calibri;font-weight:bold;color:blue" onchange="submit()" name="class" id="class_id" required>
		  <option value="" selected="selected" style="color: black;">-</option>
		</select>
      		</div>

            </td>
	</tr>

</table><br /><br />
 <input name="submit" type="submit" value="Submit">
<br /><br /><br /><br />
</form>
</div>
