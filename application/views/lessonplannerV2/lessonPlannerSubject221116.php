<style>
  
html
{
 font-family:tahoma;
}

</style>

<?php
function getnamaZ($dataygnak,$table,$condtionfield1,$varcondition){
$q="select $dataygnak from $table where $condtionfield1='$varcondition'";
list($retrun)=mysql_fetch_row(mysql_query($q));

return $retrun;
}//func
?>
  <div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
<table border="1" cellpadding="2" cellspacing="0" id="tablektube1">
<tr>
  
  <th style="padding: 5px;"><?php echo getnamaZ("name","classlist_v2","id",$_GET["cid"]); ?> Subject</th>
</tr>
<?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
	
	
	<?php
	$classid=$_GET["cid"];
	$q="SELECT * FROM ktube_subject WHERE spm='1' or pmr='1' or DIPLOMA='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
		
		///lessonplanner_control/teacher_planner/1/1/$data[id]/$classid
	?>
	
	<tr><td align="center"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br /><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/$data[id]/0";?>" style="color:#000000"><?php echo $data["subject"]; ?></a></td></tr> 
	<?php
	} //while
	?>
  

</table>
</div>