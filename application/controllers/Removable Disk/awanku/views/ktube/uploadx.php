<style>
body { padding: 30px }
form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }

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

<?php 
set_time_limit(5000);
//ini_set('upload_max_filesize', '20000M');

if(isset($_POST["submit"])){
//ini_set('upload_max_filesize', '20000M');
//print_r($_POST);
//print_r($_FILES);
$name=$_FILES["file"]["name"];
$type=$_FILES["file"]["type"];
$size=$_FILES["file"]["size"];
$title=$_POST["title"];


$idp = $_GET["idp"];
$sub = $_GET["sub"];

$q2="SELECT id FROM tbl_content  ORDER BY id DESC LIMIT 1";
list($lastid)=mysql_fetch_row(mysql_query($q2));
if($lastid==""){$lastid=0;}

$newid=$lastid+1;
//die();
$target_path = "subject/";

$target_path = $target_path . $newid.".mp4";


//$cnt = mysql_query("SELECT orderseq FROM content ORDER BY orderseq DESC LIMIT 1");
//
//$row = mysql_fetch_row($cnt);
//$counterSeq = $row[0]+1;




if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['file']['name']). 
    " has been uploaded";
	
$q="insert into tbl_content set title='$title', subj_id='$sub',profile_id='$idp', level='$_POST[level]',type2='$_POST[type2]' upload_by='$_POST[upload_by]', name='$name', path='$target_path', type='$type',  size ='$size', flag='1', inc='0'";
#mysql_query($q);
	
} else{
    echo "There was an error uploading the file, please try again!";
}

?>
<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
<?php

}//if isset




?>
<?php 
$idp = $_GET["idp"];
$sub = $_GET["sub"];

?>




<br><br><div class="upload">
<center>
<div style="font-size:15pt; color:#FFF; background:#666; width:250px; height:30px; text-align:center"><u><strong>Upload Content</strong></u></div></center>
<form name="video" enctype="multipart/form-data" method="post" action="<?php echo $site."/teacher_control/add_file"; ?>">
<br><br>
<center>
<table align="center"> 

	<tr>
    			<td><input name="subjek" type ="hidden" value="<?php echo $sub?>"></td><td><input name="idp" type="hidden" value="<?php echo $idp?>"></td>
                <td><input name="upload_by" type="hidden" value="<?php echo $_SESSION["ktube"]["id"]; ?>"></td>
    </tr>
	<tr>
				<td>Title</td><td> : </td><td><input name="title" type="text" size = "50"></td>
	</tr>
    
	<tr>
		      	<td>File</td><td> : </td><td><input size="30" capture="file" name="file" type="file" id="file"></td>
	</tr> 
	<input type="hidden" name="MAX_FILE_SIZE" value="999999999999" />
    <tr>
    			<td>Level</td><td> :</td><td><select name="level">
 											 <option value="PMR">PMR</option>
  											 <option value="SPM">SPM</option>
  											</select></td>
	<tr>
    <tr>
    			<td>Type</td><td> :</td><td><select name="type2">
 											 <option value="Video">Video</option>
  											 <option value="Document">Document</option>
  											</select></td>
	<tr>
    			<td></td><td></td>
    			
		     	 <td><center><input name="submit" type="submit" value="Save" ></td>
	</tr>

											</select></td>
	<tr>
    			<td></td><td></td>
    			
		     	 <td>

<div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>
    
    <div id="status"></div>
</td>
	</tr>
	
	
</table>


</center>
</form>
</div>

    
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
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
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-850242-2";
urchinTracker();
</script>

</body>
</html>