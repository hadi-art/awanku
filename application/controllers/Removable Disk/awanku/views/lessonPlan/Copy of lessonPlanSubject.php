

<?php
function getnamaZ($dataygnak,$table,$condtionfield1,$varcondition){
$q="select $dataygnak from $table where $condtionfield1='$varcondition'";
list($retrun)=mysql_fetch_row(mysql_query($q));

return $retrun;
}//func
?>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>

  <div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
<table border="1" cellpadding="2" cellspacing="0" id="tablektube">
<tr>
  
  <th style="padding: 5px;"><?php echo getnamaZ("name","classlist_v2","id",$_GET["cid"]); ?> Subject</th>
</tr>
<?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
	
	
	<?php
	$classid=$_GET["cid"];
	$q="SELECT * FROM ktube_subject WHERE spm='1' or pmr='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
		
		
	?>
	
	<tr><td align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/$data[id]/$classid";?>"><?php echo $data["subject"]; ?></a></td></tr> 
	<?php
	} //while
	?>
  

</table>
</div>