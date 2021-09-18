<?php
function getnamaX($dataygnak,$table,$condtionfield1,$varcondition){
$q="select $dataygnak from $table where $condtionfield1='$varcondition'";
list($retrun)=mysql_fetch_row(mysql_query($q));

return $retrun;
}//func
?>

<?php
	$a = $_SESSION["log"]["username"];
	$l = mysql_query("select level_id from tbl_userinfo where username='$a'");
	list ($r) = mysql_fetch_row($l);
?>


  <div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
  
   <?php 
  if ($r=="1")
	 {	
	 ?>
     
<table border="1" cellpadding="2" cellspacing="0" id="tablektube">
<thead>
<tr>
  <th style="padding: 5px;">Bil</th>
  <th style="padding: 5px;">Class</th>
  <th style="padding: 5px;">Classroom Teacher</th>
  <th style="padding: 5px;">Action</th>
</tr>
</thead>
<?php
$bil=0;
$q="select * from classlist_v2 where flag='1'";
$r=mysql_query($q);
while($classroom=mysql_fetch_array($r)){
?>
<tr>
  <td style="padding: 5px;" align="center"><?php echo $bil+1; ?></td>
  <td style="padding: 5px;" align="center"><?php echo $classroom["name"]; ?></td>
  <td style="padding: 5px;" align="center"><?php echo getnamaX("fullname","tbl_userinfo","id",$classroom["guru_id"]); ?></td>
  <td style="padding: 5px;" align="center">
<!--  <a href="<!-- ?php echo base_url('index.php/studioclass_control/camclass/?cid='.$classroom["id"].''); ?>" title="<!--?php echo $classroom["name"]; ?>" rel="gb_page_center[1100, 500]" target="_blank">View</a></td> -->

<a href="<?php echo base_url('index.php/lessonplan_control/planlesson_subject/0/0/?cid='.$classroom["id"].''); ?>" ><img src ="<?php echo $base; ?>/images/view.png" width = "30" height = "30"/></a></td>
</tr>
<?php
$bil++;
}
?>
</table>
<?php } 
	else { //if level_id == 2
		header("Location: http://192.168.1.20/awanku/index.php/lessonplan_control/planlesson_subject/?cid=");
	}
?>
</div>