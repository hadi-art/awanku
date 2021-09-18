<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password</title>
</head>

<style type="text/css">
html
{
	font-family:Arial;
	font-size:small;
}
		<!--- table -->
		#tablektubekeywords.table { border-collapse: collapse; border-spacing: 0; }
		#tablektubekeywords.img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
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

/*#tablektubekeywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#tablektubekeywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}*/


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

<body style="background-color:#CFF">
<center>
<br /><br />
 <div id="tablektube">

<table width="96%" height="32" style="width:80%; float:center">
<form method="post" action="<?php echo base_url('index.php/main_control/find')?>">
	<tr>
		<td align="center" style="color:#F00">Masukkan hanya menggunakan MyKad (12 Digit) sahaja.
Contoh: 123456789101<br /><br /> <input type="text" width="100%" class="search" maxlength="12" id="searchid" name="search" placeholder="Search here!" />
<?php /*?>		<td width="96" align="left"><input class="btn" type="submit" name="submitsearch" value="Search" id="submit">
<?php */?>		
		</td>
	</tr>
	</form>
	
</table>
</div>
</center>
</body>
</html>
