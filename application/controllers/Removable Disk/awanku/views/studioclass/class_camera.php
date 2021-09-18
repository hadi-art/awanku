<?php

		$id = $_GET["cid"];
		$q = mysql_query("select * from classlist_v2 where id='$id'");
		$data = mysql_fetch_array($q);
			

?>


<iframe src="<?php echo $data["cam_url"]; ?>" width="800" height="400" frameborder="0"></iframe>
<p></p>

<input type="button" onclick="location.href='https://apdm.moe.gov.my/';" value="APDM" />