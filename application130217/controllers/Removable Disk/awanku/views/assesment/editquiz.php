	<table border ="0" width="80%" style="background-color:#FFFFFF; border-collapse:collapse; table-layout:fixed" align="center"  cellpadding="8" cellspacing="10">
    <tr bgcolor="#99CCFF">
   		<th width="5%" height="35">Bil</th>
      	<th width="95%">Question</th>
	</tr>
	
	


<?php 

echo $idquiz=$_GET["id_quiz"];

	echo $q="SELECT * FROM elearning_question WHERE title_id='$idquiz'";
	//list($name)=mysql_fetch_row(mysql_query($q));
	$r=mysql_query($q);
	
	
	while($data=mysql_fetch_array($r)){
	?>
	
	<tr bgcolor="white">
   		<th width="5%" height="35">1</th>
      	<th width="95%">Question</th>
	</tr>
	
	<?php
	}//while
	


?>


