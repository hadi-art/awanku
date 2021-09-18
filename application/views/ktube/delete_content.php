<?php
list($path)=mysql_fetch_row(mysql_query("select path from ktube_content where id='$id'"));
$pathutkcmd=str_replace("/","\\",$path);
$pathdir="C:\\xampp\htdocs\awanku\\".$pathutkcmd;

$command="DEL /F /S /Q /A \"$pathdir\"";
//DEL /F /S /Q /A "D:\aaa.txt"
//C:\xampp\htdocs\awanku\
exec($command);


$q="update ktube_content set flag='0' where id='$id'";

mysql_query($q);
    
    
    $q2="delete from ktube_like where content_id='$id'";
    
    mysql_query($q2);
    
 //delete
 ?>
 
 <script>
	window.location = "<?php echo $site; ?>/ktube_control/mydocument";
</script>