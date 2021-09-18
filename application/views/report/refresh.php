<?php


#print_r($_SESSION["update"]);
if($_SESSION["update"] == 1){
	echo "<meta http-equiv=\"refresh\" content=\"0\">";
	$_SESSION["update"]=0;
}
$_SESSION["update"]=0;
?>