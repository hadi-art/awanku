<br />

<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>

<style>
.progress { position:relative; width:200px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>

<style type="text/css">
.upload {
    width: 400px;
    height: 250px;

    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: medium;
}

.progress-bar {
  background-color: whiteSmoke;
  border-radius: 2px;
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25) inset;

  width: 250px;
  height: 20px;
  
  position: relative;
  display: block;
}
  
.progress-bar span {
  background-color: blue;
  border-radius: 2px;

  display: block;
  text-indent: -9999px;
}
</style>



<div style="background:#666; width:75%; height:30px; color:#FFF"><u><h2><strong>
Upload File
</strong></h2></u>


</div>
<?php /*?><link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><?php */?>
<?php 
//get unique id
$up_id = uniqid(); 
?>

  
   
 

<script>

function showP_subjek(str)
{
if (str=="")
  {
  document.getElementById("showsubjek").innerHTML=""; 
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
    document.getElementById("showsubjek").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $site."/ktube_control/form_showsubjek"; ?>?q="+str,true);
xmlhttp.send();
}

</script>

<?php 

	if(isset($_POST['convert']))	
	{
		
		$q="SELECT * FROM ktube_content WHERE type2 LIKE '%video%' ";
		$r=mysql_query($q);
		
		while ($myrow = mysql_fetch_assoc($r))
		{
		
		$id = $myrow['id'];
		$newpath = substr_replace ($myrow['path'], "", -4);
		
		$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
		$videoFile = $myrow['path'];
		$imageFile = $newpath.".jpg";
		$size = "120x90";
		$getFromSecond = 5;
		echo $cmd = "$ffmpeg -i $videoFile -an -ss $getFromSecond -s $size $imageFile";
		if (!shell_exec($cmd))
		{
		
			echo "Thumbnail Created!";
			$q=mysql_query("update ktube_content set thumbnail_img = '$imageFile' where id = '$id'");
		}
			else
			{
				echo "Error Creating Thumbnail!";
			}
		}
		
	}
?>




<?php 
set_time_limit(5000);
//ini_set('upload_max_filesize', '20000M');
?>
<?php 
#$idp = $_GET["idp"];
#$sub = $_GET["sub"];

?>



<br><br><div class="upload" >

<form name="video" enctype="multipart/form-data" method="post"  action="<?php echo $site."/ktube_control/add_file"; ?>">


<table align="center" cellpadding="4%" cellspacing="4%" style="background-color:#FFFFFF"> 

	<tr>
    			<td></td>
				<td></td>
                <td><input name="upload_by" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>"></td>
    </tr>
	<tr>
				<td>Title</td><td> : </td><td><input name="title" type="text" size = "50"></td>
	</tr>
    
	<tr>
		      	<td>File</td><td> : </td><td><input size="30" capture="file" name="file" type="file" id="file"></td>
	</tr> 
	<input type="hidden" name="MAX_FILE_SIZE" value="999999999999" />
    <tr>
    			<td>Level</td>
				<td> :</td>
				<td>
					<select name="level" onchange="showP_subjek(this.value)">
					 <option value="">-Choose Level-</option>
					 <option value="PT3">PT3</option>
					 <option value="SPM">SPM</option>
					 <option value="STEAM">STEAM</option>
                     <option value="DIPLOMA">DIPLOMA</option>
					</select>
				</td>
	<tr>
    <tr>
      <td>Subject</td>
      <td> :</td>
      <td>
	  <div id="showsubjek">
		<select style="width:145px;font-family:calibri;font-weight:bold;color:blue" onchange="submit()" name="subjek" id="subjek">
		  <option value="" selected="selected" style="color: black;">-</option>
		</select>
      </div>
	  </td>
    </tr>
    <tr>
      <td>IBProfil</td>
      <td> :</td>
      <td>
	  <select name="idp">
          <option value="">-Choose Profile-</option>
		  <?php 
		  $q="select * from ktube_ibprofile where flag ='1'";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  ?>
          <option value="<?php echo $dataprofile["id"]; ?>"><?php echo $dataprofile["profile"]; ?></option>
		  <?php
		  }//while
		  ?>
      </select>
	  </td>
    </tr>
    <tr>
    			<td>Type</td><td> :</td><td><select name="type2">
 											 <option value="Video">Video</option>
  											 <option value="Document">Document</option>
  											</select></td>
	<tr>
      <tr>
    	<td>Resource</td><td> :</td><td>  <select name="source">
          <option value="">-Choose Resource-</option>
		  <?php 
		  $m="select * from tbl_content";
		  $s=mysql_query($m);
		  
		  while($f=mysql_fetch_array($s))
		  { 
		  ?>
          <option value="<?php echo $f["source_id"]; ?>"><?php echo $f["source"]; ?></option>
		  <?php
		  }//while
		  ?>
      </select>
                                             </td>
	<tr>
    			<td></td><td></td>
    			
		     	 <td><input name="submit" type="submit" value="Save" ></td>
	</tr>
	<tr>
    			<td colspan="3"></td>
    			
		     	 <td></td>
	</tr>
</table>

<!--APC hidden field-->
    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
<!---->

<div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
       
    </div>
     
    <div id="status">Please Wait . . </div>

    
</form>

<script type="text/javascript" src="<?php echo $base; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>js/jquery.form.js"></script>
<script>
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
	}
}); 

})();       
</script>




</div>







