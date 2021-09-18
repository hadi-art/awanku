
<script>

function showP_class(str)
{
if (str=="")
  {
  document.getElementById("showClass").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showClass").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $site."/report_control/showClass"; ?>?q="+str,true);
xmlhttp.send();
}

</script>

<style type="text/css">

.TFtable
{
	width:60%; 
	border-collapse:collapse; 
}

.TFtable td
{ 
	padding:7px; border:#000000 1px solid;
}

table.one
{
border-style:ridge;
border-color:#98bf21;
} 

.container { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; }

body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}

/** page structure **/
#tablektube {
  display: block;
  width: 90%;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

##tablektubekeywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#tablektubekeywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#tablektubekeywords thead tr th { 
  font-weight: bold;
  padding: 5px 4px;
  
}
#tablektubekeywords thead tr th span { 
  
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#tablektubekeywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}



#tablektubekeywords tbody tr { 
  color: #555;
}
#tablektubekeywords tbody tr td {
  text-align: center;
  padding: 5px 13px;
}
#tablektubekeywords tbody tr td.lalign {
  text-align: left;
}
</style>


<br /><br />


<?php
	
	$search = $_POST["search"];
	
	
	

?>
<div id="tablektube">
<h2><br /><div align="center" style=" width:90%; height:30px;"><strong>All User</strong></div></h2>



<table width="100%" height="32">
<form method="post" action="<?php echo base_url('index.php/report_control/search')?>">
	<tr>
		<td><a href="<?php echo base_url('index.php/report_control/register_left')?>">View All</a></td>
        <td align="right"><input type="text" width="100%" class="search" id="searchid" name="search" placeholder="Search user" /></td>
	</tr>
	</form>
	
</table><br />


<?php
	$bil=0;
	$q="SELECT * FROM tbl_userinfo WHERE level_id='1' and fullname like '%$search%' ORDER BY fullname ASC ";

	$r=mysql_query($q);
	
	?>
    
<table align="center" id="tablektubekeywords" cellspacing="0" cellpadding="0" width="100%">
    <thead>
      <tr>
        <th style="padding:4px;"><span>Bil</span></th>
        <th style="padding:4px;"><span>Fullname</span></th>
        <th style="padding:4px;"><span>No IC</span></th>
        <th style="padding:4px;"><span>Username</span></th>
        <th style="padding:4px;"><span>Password</span></th>

      </tr>
    </thead>
    
    <?php
	while($data=mysql_fetch_array($r))
	{
	?>
    <tr>
		<td class="lalign" style="padding:4px;"><center><?php echo $bil+1; ?></center></td>
        
  		<td style="padding:4px;"><?php echo $data["fullname"]; ?></td>
        
        <td class="lalign" style="padding:4px;"><center><?php echo $data["noic"]; ?></center></td>
        
  		<td style="padding:4px;"><?php echo $data["username"]; ?></td>
        
        <td style="padding:4px;"><?php echo $data["password"]; ?></td>

	</tr>
	<?php
	$bil++;
	}
	
	?>
</table>   
</div>