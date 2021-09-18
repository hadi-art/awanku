<?php
$conn=mysql_connect("192.168.1.9","root","rebel");
mysql_select_db("tkc");
header("Content-type: image/jpeg");
  
//echo "sajshd";

//die();
 $q2="select img from fnbsublist where id='$_GET[id]'";
list($img)=mysql_fetch_row(mysql_query($q2));

echo $img;

?>