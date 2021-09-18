<script language='text/javascript'>
        document.location = '" . $playpath . "';
     </script>
<?php 
//list($path)=mysql_fetch_row(mysql_query("select path from ktube_content where id='$id'"));
//$playpath=$base.$path;



$pat=mysql_query("SELECT a.*,b.ip as server_path FROM ktube_content a,ktube_server b WHERE  a.flag=1 and a.server_id=b.id and a.id='$id'");
$data = mysql_fetch_array($pat);

 
echo $playpath = $data["server_path"]."$data[path]";


//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
header("Location: $playpath");
//echo "iphone";
}

else if($iPad){
echo "ipad";
header("Location: $playpath");
}

else if($Android){
echo "Requesting View from Android platform failed<br>";
echo "currently viewing with pc,ipad and iphone only..";
header("Location: $playpath");
}

else if($webOS){
echo "Requesting View from web os failed<br>";
echo "currently viewing with pc,ipad and iphone only..";
}
else{
//view from pc
/*echo "<script>alert('Utk paparan document melalui browser sila pastikan Office Editing for Docs Plugin telah di install.');</script>";

echo "currently viewing with ipad and iphone only..";*/
header("Location: $playpath");
//header('Content-disposition: inline');
//header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
//readfile("$playpath");

exit;

}


$q=mysql_query("update ktube_content set view_count = view_count + 1 WHERE id='$id'");

?> 