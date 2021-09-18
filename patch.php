<pre>


<?php
mysql_connect("localhost","root","");
mysql_select_db("awanku");


$q="select * from ktube_contentxxx where id < 79";
$r=mysql_query($q);


while($data=mysql_fetch_array($r)){


echo $data["path"];
echo "<br>";

$wnn=explode("/",$data["path"]);

echo $data["upload_by"];
echo "<br>";

//print_r($wnn);


if($wnn[1]=="doc"){
$filename=$wnn[2];
$extension=".docx";
$newpath="subject/doc/";


}

if($wnn[1]=="vid"){
$filename=$wnn[3];
$extension=".mp4";
$newpath="subject/vid/converted/";

}

echo $filename;
echo "<br>";
$newid="AMC".sprintf('%05d',$data["upload_by"])."C".sprintf('%07d',$filename);

echo $newid.$extension;
echo "<br>";

echo $newpathdb=$newpath.$newid.$extension;

echo "<br>";echo "<br>";

mysql_query("update ktube_contentxxx set path='$newpathdb' where id='$data[id]'");


}//while



?>