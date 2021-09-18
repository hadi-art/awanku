  
   <style>
  .ui-progressbar {
    position: relative;
  }
  .progress-label {
    position: absolute;
    left: 50%;
    top: 4px;
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
  .content{
    margin-left:auto;
	margin-right:auto;
	padding:40%;
  }
  
  html {
 font-family:tahoma;
}

.create {
  background: #dce0dc;
  background-image: -webkit-linear-gradient(top, #dce0dc, #999999);
  background-image: -moz-linear-gradient(top, #dce0dc, #999999);
  background-image: -ms-linear-gradient(top, #dce0dc, #999999);
  background-image: -o-linear-gradient(top, #dce0dc, #999999);
  background-image: linear-gradient(to bottom, #dce0dc, #999999);
  -webkit-border-radius: 26;
  -moz-border-radius: 26;
  border-radius: 26px;
  font-family: Arial;
  color: #030303;
  font-size: 19px;
  padding: 1px 16px 4px 15px;
  text-decoration: none;
}

.create:hover {
  background: #dbdbdb;
  text-decoration: none;
}
  </style>


  
  <link rel="stylesheet" href="/resources/demos/style.css">

  <script>
  $(function() {
    var progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" );
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Complete!" );
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + 2 );
 
      if ( val < 99 ) {
        setTimeout( progress, 80 );
      }
    }
 
    setTimeout( progress, 2000 );
  });
  </script>
  
<script src="http://code.jquery.com/jquery-latest.js"></script>
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
xmlhttp.open("GET","<?php echo $site."/assesment_control/form_showsubjek"; ?>?q="+str,true);
xmlhttp.send();
}

</script>





<div id="content" style="background:#FFFFFF;width:65%;margin-left:10px;height:auto; float:left;margin-top:10px; border-radius: 20px; ">


<br />
		<center><h3>Create Quiz</h3></center>
		<form  method="post" action="<?php echo $site; ?>/assesment_control/addquiz">
		<table width="70%" align="center" style="height:auto;" cellpadding="5%" cellspacing="5%"> 

		<tr>
    			<td></td>
				<td></td>
            <td><input name="upload_by" type="hidden" value="<?php echo $_SESSION["log"]["userid"]; ?>"></td>
    	</tr>
		<tr>
				<td>Title</td><td> : </td><td><input name="title" type="text" size = "50" required></td>
		</tr>
    
   		<tr>
    			<td>Level</td>
				<td> :</td>
				<td>
					<select name="level" onchange="showP_subjek(this.value)" required>
					 <option value="">-Pilih Level-</option>
					 <option value="pmr">PT3</option>
					 <option value="spm">SPM</option>
					 <option value="steam">STEAM</option>
					</select>
				</td>
		<tr>
    	
		<tr>
     		 <td>Subjek</td>
      		<td> :</td>
      		<td>
	  		<div id="showsubjek">
		<select style="width:145px;font-family:calibri;font-weight:bold;color:blue" onchange="submit()" name="subjek" id="subjek" required>
		  <option value="" selected="selected" style="color: black;">-</option>
		</select>
      		</div>
	  		</td>
   		</tr>
		<tr>
    			<td></td>
				<td></td>
		     	<td align="right"><input class="create" name="submit" type="submit" value="Create" ></td>
		</tr> 
		
	</table>
	</form>





</div>
</div>