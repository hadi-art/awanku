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
<table border="1" cellpadding="2" cellspacing="0" id="tablektube">
<tr>
  
  <th style="padding: 5px;"><?php echo getnamaZ("name","classlist_v2","id",$_GET["cid"]); ?> Subject</th>
</tr>
<?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
	
	
	<?php
	
	$dip_class=$_GET["cid"];
		if($dip_class==1||$dip_class==2||$dip_class==3||$dip_class==4||$dip_class==5||$dip_class==6||$dip_class==7||$dip_class==8||$dip_class==9||$dip_class==10||$dip_class==11||$dip_class==12||$dip_class==13||$dip_class==14||$dip_class==15||$dip_class==16||$dip_class==17||$dip_class==18||$dip_class==19||$dip_class==20||$dip_class==21||$dip_class==22||$dip_class==23||$dip_class==24||$dip_class==25||$dip_class==26||$dip_class==27){
	
	
	$classid=$_GET["cid"];
	$q="SELECT * FROM ktube_subject WHERE spm='1' or pmr='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
		
		
	?>
	
	<tr><td align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/$data[id]/$classid";?>" style="color:#000000"><?php echo $data["subject"]; ?></a></td></tr> 
	<?php
	} //while
	
		}//if
		
		if($dip_class==28||$dip_class==29){
				$classid=$_GET["cid"];
	$q="SELECT * FROM ktube_subject WHERE DIPLOMA='1'";
	$r=mysql_query($q);
	while($data=mysql_fetch_array($r)){
		
		
	?>
	
	<tr><td align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/$data[id]/$classid";?>" style="color:#000000"><?php echo $data["subject"]; ?></a></td></tr> 
	<?php
	} //while
	
		}//if

	?>
  

</table>
</div>