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
  <h3>Logs Summary</h3></center>
                   
<center>
<iframe src="<?php echo $site;?>/report_control/graph" width="850px" height="550px" frameborder="0" scrolling="no"></iframe></center>
<br />


    
<?php /* ?> <iframe src="<?php echo $site;?>/report_control/graph?view=<?php echo $_GET["locn"]; ?>" width="850px" height="550px" frameborder="0" scrolling="no"></iframe></center><?php */ ?>
