<?php

$form =$_GET["q"];

//$q="SELECT $var1 FROM $table WHERE $fk='$id'";
//list($name)=mysql_fetch_row(mysql_query($q));

	if( $form == 'F1' or $form == 'F2' or $form == 'F3' )
	{
		$level = 'PT3';
	}
	
	else if( $form == 'F4' or $form == 'F5' )
	{
		$level = 'spm';
	}

	else
	{
		$level = 'DIPLOMA';
	}
?>


<select name="subjek" id="subjek">
          <option value="22">-</option>
		  
		  <?php 
		  echo $level;
		  echo $q="select * from ktube_subject where flag ='1' and $level='1'";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  ?>
          <option value="<?php echo $dataprofile["id"]; ?>"><?php echo $dataprofile["subject"]; ?></option>
		  <?php
		  }//while
		  ?>
</select>