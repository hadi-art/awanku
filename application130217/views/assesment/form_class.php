<?php
$level=$_GET["q"];

//$q="SELECT $var1 FROM $table WHERE $fk='$id'";
//list($name)=mysql_fetch_row(mysql_query($q));
		  
?>


<select name="form" id="form">
          <option value="">-</option>
		  
		  <?php 
		  echo $level;
		  echo $q="SELECT * FROM classlist_v2 where level=$level";
		  $r=mysql_query($q);
		  
		  if($level=='1'){
				$mm="F1";
			}
			if($level=='2'){
				$mm="F2";
			}
			if($level=='3'){
				$mm="F3";
			}
			if($level=='4'){
				$mm="F4";
			}
		  	if($level=='5'){
				$mm="F5";
			}
		  
		 $q1="select * from ktube_subject where flag ='1' and $mm='1'";
		 $r1=mysql_query($q1);
			

		  
		  while($dataprofile=mysql_fetch_array($r1)){ 
		  ?>
          <option value="<?php echo $dataprofile["id"]; ?>"><?php echo $dataprofile["subject"]; ?></option>
		  <?php
		  }//while
		  ?>
</select>