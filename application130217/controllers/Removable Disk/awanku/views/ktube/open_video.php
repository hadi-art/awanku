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
}else if($iPad){
echo "ipad";
header("Location: $playpath");
}else if($Android){
echo "Requesting playing from Android platform failed<br>";
echo "currently playing with ipad,iphone and Pc only..";
}else if($webOS){
header("Location: $playpath");
}
else{
header("Location: $playpath");

}

?> 