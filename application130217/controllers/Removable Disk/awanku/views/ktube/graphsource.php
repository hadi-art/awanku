<script>
function popupwindow(url, title, w, h) {
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} //
</script>
<pre>
<?php
//print_r($_SESSION);
$session = $_SESSION["log"];
$msg_pass = ""; // set initial dulu untuk elak dari error
$msg_profile = ""; // set initial dulu untuk elak dari error
?>
</pre>

<center>
  <h3>Resource Summary</h3></center>

<center>
<iframe src="<?php echo $site;?>/ktube_control/graph" width="850px" height="550px" frameborder="0" scrolling="no"></iframe></center>
<br />


<?php /*?>
<?php
$query="select * from ktube_content where flag=1";
$q=mysql_query($query);

while($data=mysql_fetch_array($q)){

?>

<iframe src="<?php echo $site;?>/fixed_asset_mgt/graphuptime/<?php echo $data["id"]; ?>" width="320px" height="300px" frameborder="0" scrolling="no"></iframe>

<?php
}//while
?><?php */?>


