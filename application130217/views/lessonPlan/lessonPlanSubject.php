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
  <div class="menu" align="center" style="width: 760px; position:relative; margin-top:2%; margin-bottom:3%; margin-left:auto; margin-right:auto; border:thin solid black 0px;">
<table border="0" cellpadding="2" cellspacing="0" id="tablektube">
<tr>
  
  <th colspan="6"><?php #$linkurl1="&semua=semua&page=0&tahap=spm"; ?>
	
	
	<?php
	
	$dip_class=$_GET["cid"];
		if($dip_class==1||$dip_class==2||$dip_class==3||$dip_class==4||$dip_class==5||$dip_class==6||$dip_class==7||$dip_class==8||$dip_class==9||$dip_class==10||$dip_class==11||$dip_class==12||$dip_class==13||$dip_class==14||$dip_class==15||$dip_class==16||$dip_class==17||$dip_class==18||$dip_class==19||$dip_class==20||$dip_class==21||$dip_class==22||$dip_class==23||$dip_class==24||$dip_class==25||$dip_class==26||$dip_class==27){
	
	
	$classid=$_GET["cid"];	
		
		?>
        <center>Subject <?php echo getnamaZ("name","classlist_v2","id",$_GET["cid"]); ?></center> </th>
</tr>

        
	<tr>
    	<td width="130" height="103" align="center"><a href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/1/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Bahasa Melayu</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/10/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Bahasa Inggeris</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/12/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Chinese</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/14/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Japanese</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/18/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />French</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/16/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Arabic</a></td>
    </tr> 
    
    <tr>
    	<td width="130" height="99" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/8/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Matematik</a></td>

    <td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/5/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Sains</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/20/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Add Math</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/6/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Biology</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/7/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Chemistry</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/19/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Physics</a></td>
    </tr> 
    	
        <tr>
    	<td width="130" height="95" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/23/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Prinsip Akaun</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/9/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Pendidikan Islam</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/2/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />History</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/3/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Geography</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/4/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Kemahiran Hidup</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/15/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />PSV</a></td>
    </tr> 
    
            <tr>
    	<td width="130" height="103" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/11/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Music</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/13/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />
    	  PJK</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/17/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />PSK</a></td>
  
    </tr> 
        
        <?php
		}
		?>
        <tr>
        <th height="61" colspan="6" align="center">
        <?php
		 if($dip_class==28||$dip_class==29){
                            $classid=$_GET["cid"];
               
            echo getnamaZ("name","classlist_v2","id",$_GET["cid"]);?>
            
            IB Subject</th>
</tr>
<tr>
    	<td width="130" height="101" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/24/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Malay A</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/25/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />
   	  English B</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/26/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/></a><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/26/$classid";?>" style="color:#000000"><br />
   	  Business Management</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/27/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />History</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/28/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Physics</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/29/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Chemistry</a></td>
    </tr> 
    
            <tr>
    	<td align="center" width="130"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/30/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Math SL</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/31/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Math HL</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/32/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />TOK</a></td>
        
 		<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/33/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />CAS</a></td>
  
  		<td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/34/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Biology</a></td>
        
        <td width="130" align="center"><a  href="<?php echo $site."/lessonplan_control/teacher_plan/1/1/35/$classid/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Visual Art</a></td>
    </tr> 
    
<?php }
?>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>

</table>

</div>