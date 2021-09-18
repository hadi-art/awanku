

<?php

$bil=0;
$q="SELECT * from classlist_v2 where id='$_GET[id]'";
$r=mysql_query($q);

while($classroom=mysql_fetch_array($r)){
?>
    <center><h2>Class <?php echo $classroom['name'];?></h2></center>
    <?php } ?>
    
    
    
    <div class="bottominfo" style="clear:both;">
		<div class="bottominfoleft" style="float:left;padding: 5px; border-width: 1px;  border-color: #000000; width:47%;">
	<iframe src="student_list?class_id=<?php echo $_GET['id'];?>&class_level=<?php echo $_GET['level'];?>" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
		</div> 
        
		<div class="bottominfoblank" style="float:left;padding: 5px;"></div>
		<div class="bottominforight" style="float:right;padding: 5px; border-width: 1px;  border-color: #000000; width:47%;">
		
        	<iframe src="edit?id=<?php echo $_GET['id'];?>" width="100%" height="700px" frameborder="0" scrolling="auto"></iframe>
		</div>
	</div>
