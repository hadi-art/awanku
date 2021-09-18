<?php
$level=$_GET["q"];
#echo $level;
?>

<select name="class" id="class">
          <option value="">-</option>
		  
		  <?php 
		  		  if ($level=="1") {
			?>
                      <option value="">-</option>

            <?php
				  }
		  
		  if($level=="2") {
		  $c="select * from classlist_v2 where flag ='1'";
		  $r=mysql_query($c);
		  
		  while($class=mysql_fetch_array($r)){ 
		  ?>
          <option value="<?php echo $class["id"]; ?>"><?php echo $class["name"]; ?></option>
		  <?php
		  }//while
		  }
		  ?>
</select>
