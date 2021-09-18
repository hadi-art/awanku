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
<table width="818" border="0" cellpadding="2" cellspacing="0" id="tablektube1">
<tr>
  <th height="65" colspan="6"><?php echo getnamaZ("name","classlist_v2","id",$_GET["cid"]); ?> MYP IB Subject</th>
</tr>

	<tr>
    	<td width="130" height="103" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/1/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Bahasa Melayu</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/10/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Bahasa Inggeris</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/12/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />
    	Mandarin</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/14/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Japanese</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/18/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />French</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/16/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Arabic</a></td>
    </tr> 
    
    <tr>
    	<td width="130" height="99" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/8/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Matematik</a></td>

    <td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/5/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Sains</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/20/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Add Math</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/6/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Biology</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/7/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Chemistry</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/19/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Physics</a></td>
    </tr> 
    	
        <tr>
    	<td width="130" height="95" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/23/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Prinsip Akaun</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/9/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Pendidikan Islam</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/2/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />History</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/3/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Geography</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/4/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Kemahiran Hidup</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/15/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />PSV</a></td>
    </tr> 
    
            <tr>
    	<td width="130" height="103" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/11/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Music</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/13/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />
    	  PJK</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/17/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />PSK</a></td>
        
       	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/36/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />ASK</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/37/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Rekabentuk dan Teknologi</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/38/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Unit Bimbingan dan Kaunseling</a></td>

  
    </tr> 
        
</table>

<table width="818" border="0" cellpadding="2" cellspacing="0" id="tablektube1">
<tr>
  
  <th height="84" colspan="6"><?php echo getnamaZ("name","classlist_v2","id",$_GET["cid"]); ?> IBDP Subject</th>
</tr>

<tr>
    	<td width="130" height="101" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/24/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Malay A</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/25/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />
   	  English B</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/26/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Business Management</a></td>
  
    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/27/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />History</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/28/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Physics</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/29/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Chemistry</a></td>
    </tr> 
    
            <tr>
    	<td align="center" width="130"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/30/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Math SL</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/31/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Math HL</a></td>

    	<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/32/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />TOK</a></td>
        
 		<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/33/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />CAS</a></td>
  
  		<td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/34/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Biology</a></td>
        
        <td width="130" align="center"><a  href="<?php echo $site."/lessonplanner_control/teacher_planner/1/1/35/$today";?>" style="color:#000000"><img src ="<?php echo $base; ?>/images/open-file.png" width = "40" height = "40"/><br />Visual Art</a></td>
    </tr> 
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>


</table>

</div>