<style type="text/css">
.okk {
	font-weight: bold;
}

body 
{
  
   background-color:#F7F7F7;
   
   
}
</style>
<link rel="stylesheet" href="<?php echo $base."include/menuvanigate/"; ?>layout.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo $base."include/menuvanigate/"; ?>menu.css" type="text/css" media="screen">
<center><div class="container">
		   <ul id="nav">
      <li><a href="<?php echo $site."/lessonplanner_control/plannerlesson_subject";?>">Subject</a></li>
      <li><a href="<?php echo $site."/lessonplanner_control/lessonPlannerTeacher";?>">Teacher</a></li>   

	</ul>

</div></center><br>

<body>
<div id="tablektube" style="width:85%">
<br><table width="80%" border="0" cellpadding="1" cellspacing="0">

    <tr>
        <td>
            <table>
            <div>
            <?php 
			$q="select * from tbl_userinfo where flag='1' and level_id='1'  ORDER BY seq ASC  limit 30";
            $r=mysql_query($q); 
                    
            while($data=mysql_fetch_array($r))
                {
                $uuid=$data["id"];
				
				$q="select approve_status from ilearn_content where flag='1' and upload_id='$uuid' AND approve_status ='3'";
					list($stat)=mysql_fetch_row(mysql_query($q));
			
				
				if ($stat=='3')
				{
                ?><tr>
               <td> <a style="color:#F00" href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo  $data["fullname"]; ?></a></b></td></tr>
                    <?php	}
					else {
						?>
                        <tr>
               <td> <a href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo $data["fullname"]; ?></a></td></tr>
                        <?php
					}
					} ?>
            </div>
            </table>
        </td>
        
     	<td>
            <table>
            <div>
            <?php $q="select * from tbl_userinfo where flag='1' and level_id='1'  ORDER BY seq ASC  limit 30,30";
            $r=mysql_query($q); 
                    
            while($data=mysql_fetch_array($r))
                {
                $uuid=$data["id"];
                $q="select approve_status from ilearn_content where flag='1' and upload_id='$uuid' AND approve_status ='3'";
					list($stat)=mysql_fetch_row(mysql_query($q));
			
				
				if ($stat=='3')
				{
                ?><tr>
               <td><b> <a style="color:#F00" href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo  $data["fullname"]; ?></a></b></td></tr>
                    <?php	}
					else {
						?>
                        <tr>
               <td> <a href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo $data["fullname"]; ?></a></td></tr>
                        <?php
					}
					} ?>
                    
            </div>
            </table>
        </td>        
                <td>
            <table>
            <div>
            <?php $q="select * from tbl_userinfo where flag='1' and level_id='1'  ORDER BY seq ASC  limit 60,30";
            $r=mysql_query($q); 
                    
            while($data=mysql_fetch_array($r))
                {
                $uuid=$data["id"];
               $q="select approve_status from ilearn_content where flag='1' and upload_id='$uuid' AND approve_status ='3'";
					list($stat)=mysql_fetch_row(mysql_query($q));
			
				
				if ($stat=='3')
				{
                ?><tr>
               <td><b> <a style="color:#F00"  href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo  $data["fullname"]; ?></a></b></td></tr>
                    <?php	}
					else {
						?>
                        <tr>
               <td> <a href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo $data["fullname"]; ?></a></td></tr>
                        <?php
					}
					} ?>
            </div>
            </table>
        </td>
        
        <td>
        	<table>
            <div>
            <?php $q="select * from tbl_userinfo where flag='1' and level_id='1'  ORDER BY seq ASC  limit 90,30";
            $r=mysql_query($q); 
                    
            while($data=mysql_fetch_array($r))
                {
                $uuid=$data["id"];
                $q="select approve_status from ilearn_content where flag='1' and upload_id='$uuid' AND approve_status ='3'";
					list($stat)=mysql_fetch_row(mysql_query($q));
			
				
				if ($stat=='3')
				{
                ?><tr>
               <td><b> <a style="color:#F00" href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo  $data["fullname"]; ?></a></b></td></tr>
                    <?php	}
					else {
						?>
                        <tr>
               <td> <a href="<?php echo $site."/lessonplanner_control/planner_teacher/1/1/$uuid/$today";?>"><?php echo $data["fullname"]; ?></a></td></tr>
                        <?php
					}
					} ?>
            </div>
            </table>
        </td>
    </tr>
    
</table>
</div>
</body>
</html>
