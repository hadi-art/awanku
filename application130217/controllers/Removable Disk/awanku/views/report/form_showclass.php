<?php
$level=$_GET["q"];

//$q="SELECT $var1 FROM $table WHERE $fk='$id'";
//list($name)=mysql_fetch_row(mysql_query($q));


?>


<select name="class" id="class">
          <option value="0">-</option>
		  
		  <?php 
		  echo $level;
		  echo $q="select * from classlist_v2 where flag ='1' and $level='2'";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  ?>
          <option value="<?php echo $dataprofile["id"]; ?>"><?php echo $dataprofile["name"]; ?></option>
		  <?php
		  }//while
		  ?>
</select>