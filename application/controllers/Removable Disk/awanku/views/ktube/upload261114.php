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
//get unique id
$up_id = uniqid(); 
?>

<?php
//print_r($_POST);
//process the forms and upload the files
if (isset($_POST["title"])) {

//specify folder for file upload
$folder = "tmp/"; 

//specify redirect URL
$redirect = "upload.php?success";
?>
<!-------------------------------------------------------------------------------------------------------------------->


  
  

<?php
$q2="SELECT id FROM tbl_prime  ORDER BY id DESC LIMIT 1";
list($lastid)=mysql_fetch_row(mysql_query($q2));
if($lastid==""){$lastid=0;}

$newid=$lastid+1;
$newid=$newid.".mp4";
$newasal=$newid.".flv";


//die();
$target_path = "include/diyplayer/video/";

$target_pathdb = "include/diyplayer/video/video_converted/" . $newid;


$cnt = mysql_query("SELECT orderseq FROM tbl_prime ORDER BY orderseq DESC LIMIT 1");

$row = mysql_fetch_row($cnt);
$counterSeq = $row[0]+1;



	
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
            unset($config);
			//echo "masuk ke";
			
			$name=$_FILES["file"]["name"];
			$type=$_FILES["file"]["type"];
			$size=$_FILES["file"]["size"];
			$title=$_POST["title"];
			
			
            //$date = date("ymdhis");
            $configVideo['upload_path'] = $target_path;
            $configVideo['max_size'] = '102400000000';
            $configVideo['allowed_types'] = 'flv|mp4|mov|MOV';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
		
            //$video_name = $newid.".mp4";
            $configVideo['file_name'] = $newasal;
 
            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_errors();
            } else {
                $videoDetails = $this->upload->data();
/*<!---------------------------------video converter---------------------------------------------------->*/
//ini_set('max_execution_time', 900);

//yang asal success
//$command='handbrakecli -i "E:\xampp\htdocs\e-broadcastDEV\include\diyplayer\video\\'.$newasal.'" -t 8 --angle 1 -c 1 -o "E:\xampp\htdocs\e-broadcastDEV\include\diyplayer\video\video_converted\\'.$newid.'"  -f mp4  -w 640 --loose-anamorphic  --modulus 2 -e x264 -q 20 --vfr -a 1 -E faac -6 dpl2 -R Auto -B 160 -D 0 --gain 0 --audio-fallback ffac3 --markers="C:\Users\Administrator\AppData\Local\Temp\ssss-8-chapters.csv" --x264-preset=veryfast  --x264-profile=main  --h264-level="4.0"  --verbose=1';	

$command='handbrakecli -i "C:\xampp\htdocs\e-broadcast\include\diyplayer\video\\'.$newasal.'" -t 3 --angle 1 -c 1 -o "C:\xampp\htdocs\e-broadcast\include\diyplayer\video\video_converted\\'.$newid.'"  -f mp4  -O  -w 480 --loose-anamorphic  --modulus 2 -e x264 -q 22 -r 25 --pfr -a 1 -E faac -6 dpl2 -R Auto -B 128 -D 0 --gain 0 --audio-fallback ffac3 --x264-profile=main  --h264-level="3.0"  --verbose=1';	



exec($command); 
//die();
/*<!--------------------------------video converter----------------------------------------------------->*/

				
				
                echo "Successfully Uploaded";
				$q="insert into tbl_prime set name='$name', type='$type', path='$target_pathdb', size ='$size', title='$title', flag='1', orderseq='$counterSeq'";
				mysql_query($q);

            }
        ?>
		<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
		 <?php
		  
		}//isset
		
		?>
<!-------------------------------------------------------------------------------------------------------------------->
<?php
}//
//

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload your file</title>


<!--Progress Bar and iframe Styling-->
<link href="<?php echo $base."include/progressbar2/" ?>style_progress.css" rel="stylesheet" type="text/css" />

<!--Get jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>

<!--display bar only if file is chosen-->
<script>

$(document).ready(function() { 
//

//show the progress bar only if a file field was clicked
	var show_bar = 0;
    $('input[type="file"]').click(function(){
		show_bar = 1;
    });

//show iframe on form submit
    $("#form1").submit(function(){

		if (show_bar === 1) { 
			$('#upload_frame').show();
			function set () {
				$('#upload_frame').attr('src','<?php echo $site."/main_control/upload_frame"; ?>?up_id=<?php echo $up_id; ?>');
			}
			setTimeout(set);
		}
    });
//

});

</script>

</head>


<span style="font-size:15pt;"><u><center><strong>Prime Space Update</strong></center></u></span>
  <form method="post" enctype="multipart/form-data" name="form1" id="form1" action="<?php #echo $site."/main_control/add_video"; ?>" >
<center>
<table> 
	<tr><input type="hidden" name="MAX_FILE_SIZE" value="999999999999" />
		      	<td><center><input capture="video" name="file" type="file" id="file" size="30"></center></td>
	</tr>
	<tr>
				<td><br>Title : <input name="title" type="text" size = "50"></td>
	</tr>
		
	<tr>
		     	 <td><center><input type="submit" onBlur="submit" value="Submit"></center></td>
	</tr>
	
</table>
<!--APC hidden field-->
    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>
<!---->

  
<div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>
    
    <div id="status"></div>

*MP4,MOV & FLV format only.

</center>
</form>


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