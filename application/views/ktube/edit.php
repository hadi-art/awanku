<style>


html {
 font-family:tahoma;
}


</style>

<script>

function showP_subjek(str)
{
if (str=="")
  {
  document.getElementById("showsubjek").innerHTML="";
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
    document.getElementById("showsubjek").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo $site."/ktube_control/form_showsubjek"; ?>?q="+str,true);
xmlhttp.send();
}



function validateForm()
{
var title=document.forms["form1"]["title"].value;
if (title==null || title==""){alert("Sila masukkan tajuk");return false;}

var level=document.forms["form1"]["level"].value;
if (level==null || level==""){alert("Sila pilih level");return false;}

var subjek=document.forms["form1"]["subjek"].value;
if (subjek==null || subjek==""){alert("Sila pilih subjek");return false;}

var idp=document.forms["form1"]["idp"].value;
if (idp==null || idp==""){alert("Sila pilih profile");return false;}



}
//func

</script>


<?php
function getnama($id,$var1,$table,$fk){
	
	
	#$data["upload_by"],"fullname","tbl_userinfo","id"
	$q="SELECT $var1 FROM $table WHERE $fk='$id'";
			list($name)=mysql_fetch_row(mysql_query($q));
			
	//close($conn);
	//mysql_close($conn);
	
	return $name;
	
	}
function get_level_name($level_id)
{
$q="SELECT description FROM tbl_param WHERE param='leveltahapktube' AND var =$level_id";
list($name)=mysql_fetch_row(mysql_query($q));
return $name;

}



function getresource($id)
{

	$q="SELECT source FROM tbl_content WHERE source_id='$id'";
	list($name)=mysql_fetch_row(mysql_query($q));
	return $name;

}
?>






<?php

if (isset($_POST["Edit"]))
{
	$Title = $_POST['title'];
	$subjek = $_POST['subjek'];
	$idp = $_POST['idp'];
	$source = $_POST['source'];
	
	
	
	$form = $_POST["level"];
				
	if($form == 'F1' or $form == 'F2' or $form == 'F3')
	{
			$levelcek ="PT3";
			$level_id = 1;
	}
	
	
	else if($form == 'F4' or $form == 'F5')
	{
			$levelcek = "SPM";
			$level_id = 2;
	}


	
	else 
	{
			$levelcek = "DIPLOMA";
			$level_id = 4;
	}

	
	
	//$update_2 = "update ktube_content set title='$Title',level_id='$level_id',subj_id='$subjek',profile_id='$idp' where id='$idp'";
	//print_r($_POST);
	//die();
	

	
	//$insert=mysql_query("update ktube_content set title='$Title',level_id='$level_id',subj_id='$subjek',profile_id='$idp' where id='$_GET[id]'");

		$update = "update ktube_content set 
		title='$Title',
		level_id='$level_id',
		subj_id='$subjek',
		profile_id='$idp', 
		source_id='$source',
		form='$form' 
		where id='$_GET[id]'";
		
	if(mysql_query($update))
	{
?>
		<script type="text/Javascript">
			<!--
				alert("Edit Successful!");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">

<?php
	}
	
	else
	{
?>
	<script type="text/Javascript">
			<!--
				alert("Edit Unsuccessfull");
				
			</script>
			<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">
	
<?php
	}

}
?>





<body>
<div class="edit">
<center>
 
  <h2>Previous Profail</h2>
   <?php
 	//$query="Select * from ktube_content where id=$_GET[id]";
	//$result=mysql_query($query);
	//$row=mysql_fetch_array($result);
	
	$query = mysql_query("SELECT * FROM ktube_content WHERE id=$_GET[id]");
	$row = mysql_fetch_assoc($query);
	?>
   <table align="center" width="50%">
  <tr>
    <th>Title</th>
    <td><?php  echo $row["title"]; ?></td>
  </tr>
  <tr>
    <th>Level</th>
    <td><?php echo get_level_name($row["level_id"]); ?></td>
  </tr>
  <tr>
    <th>Subjek</th>
    <td><?php echo getnama($row["subj_id"],"subject","ktube_subject","subject_id"); ?></td>
  </tr>
  <tr>
    <th>IBProfil</th>
    <td><?php echo getnama($row["profile_id"],"profile","ktube_ibprofile","profile_id");  ?></td>
  </tr>
  
  <tr>
    <th>Resource</th>
    <td><?php echo getresource($row["source_id"]);  ?></td>
  </tr>
</table>

  <br>
   <h2>Edit Content </h2>
  <form name="form1" method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
  
 
    <table align="center">

      <tr>
        <th>Title</th>
        <td> : </td>
        <td><textarea name="title"><?php echo $row["title"];?></textarea></td>
      </tr>

     
      <tr>
        <th>Level</th>
        <td> :</td>
        <td><select name="level" onChange="showP_subjek(this.value)">
           <option value="">-Choose Level-</option>
					 <option value="F1">FORM 1</option>
					 <option value="F2">FORM 2</option>
					 <option value="F3">FORM 3</option>
					 <option value="F4">FORM 4</option>
					 <option value="F5">FORM 5</option>
				
                     <option value="DIPLOMA">DIPLOMA</option>
          </select>        </td>
      <tr>
        <th>Subjek</th>
        <td> :</td>
        <td><div id="showsubjek">
            <select style="width:145px;font-family:calibri;font-weight:bold;color:blue" onChange="submit()" name="subjek" id="subjek">
              <option value="" selected="selected" style="color: black;">-</option>
            </select>
        </div></td>
      </tr>
      <tr>
        <th>IBProfil</th>
        <td> :</td>
        <td><select name="idp">
            <option value="">-Pilih Profile-</option>
            <?php 
		  $q="select * from ktube_ibprofile where flag ='1'";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  ?>
            <option value="<?php echo $dataprofile["id"]; ?>"><?php echo $dataprofile["profile"]; ?></option>
            <?php
		  }//while
		  ?>
          </select>        </td>
      </tr>
	  
	  <tr>
	  	<th>Resource</th>
		<td>:</td>
		<td><select name="source">
            <option value="">-Pilih Resource-</option>
            <?php 
		  $q="select * from tbl_content";
		  $r=mysql_query($q);
		  
		  while($dataprofile=mysql_fetch_array($r)){ 
		  ?>
            <option value="<?php echo $dataprofile["source_id"]; ?>"><?php echo $dataprofile["source"]; ?></option>
            <?php
		  }//while
		  ?>
          </select>       </td>
	  </tr>

  

    </table>
    <br>
	 <p align = "center">
      <input name="Edit" type="submit" id="Edit" value="Edit">
    </p>
</form>


