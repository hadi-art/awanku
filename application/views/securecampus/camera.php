<br /><br />
<div id="header" style="background-color:#0000FF;width:80%; color:#FFFFFF; height:auto" align="center">
	
			<h1 align="center">Secure Campus</h1>
		
</div>



<br />
<br />

<style>
p1 {
color:#0000FF; font-family: 'Julius Sans One', sans-serif; font-size: 22px; font-weight: bold; line-height: 32px; margin: 0 0 24px; }

</style>



<div class="camera1" style="float:left; width:48%; position:absolute; left:14px; top: 200px; height: 507px;">
	<?php
		$query="SELECT axis_path , nama_camera FROM tbl_securecampus WHERE id='1'";
		$q=mysql_query($query);
	?>
	<?php
		while($row=mysql_fetch_array($q))
		{
	?>
		<p></p>
		<img src="<?php echo $row["axis_path"]; ?>" width="96%" height="445" >
		<p1>Camera : &nbsp;<?php echo $row["nama_camera"]; ?></p>
	<?php
		}
	?>
</div>


<div class="camera2" style="float:left; width:48%; position:absolute; right:25px; height: 392px; top: 216px;">
	<?php
		$query="SELECT axis_path , nama_camera FROM tbl_securecampus WHERE id='2'";
		$q=mysql_query($query);
	?>
	<?php
		while($row1=mysql_fetch_array($q))
		{
	?>
		<img src="<?php echo $row1["axis_path"]; ?>"  width="100%" height="445" frameborder="1">
		<p1>Camera : &nbsp;<?php echo $row1["nama_camera"]; ?></p>
	<?php
		}
	?>
</div>


<div class="camera3" style="float:left; width:46%; position:absolute; left:24px; top: 709px">
	<?php
		$query="SELECT axis_path , nama_camera FROM tbl_securecampus WHERE id='3'";
		$q=mysql_query($query);
	?>
	<?php
		while($row2=mysql_fetch_array($q))
		{
	?>
	
		<img src="<?php echo $row2["axis_path"]; ?>" width="100%" height="445" frameborder="1">
		<p1>Camera : &nbsp;<?php echo $row2["nama_camera"]; ?></p>
	<?php
		}
	?>
</div>

<div class="camera4" style="float:left; width:48%; position:absolute; right:33px; top: 708px;">
	<?php
		$query="SELECT axis_path  , nama_camera FROM tbl_securecampus WHERE id='4'";
		$q=mysql_query($query);
	?>
	<?php
		while($row3=mysql_fetch_array($q))
		{
	?>
		<img src="<?php echo $row3["axis_path"]; ?>" width="100%" height="445" frameborder="1">
		<p1>Camera : &nbsp;<?php echo $row3["nama_camera"]; ?></p>
	<?php
		}
	?>
</div>

