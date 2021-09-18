<style type="text/css">
html,body{margin:0}

 ul.slide{margin:0;
          padding:10;
          height:80px;
          list-style-type:none;}
 ul.slide li{float:left;
             list-style-type:none;}
 ul.slide img{height:100px;
			 width:100px;}
			 
	#data
	 {
    border: solid 2px blue;
    width: 100px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }

    #data:hover{
    overflow: visible; 
    white-space: normal; 

    }
#font{
	font-size:x-small;
	color:#666666;
}
.recent{
   margin-left: 5%;
   margin-right: 5%;
	background-color: #FFFFFF;
	
}


</style> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script>
 //Plugin start
 (function($)
   {
     var methods = 
       {
         init : function( options ) 
         {
           return this.each(function()
             {
               var _this=$(this);
                   _this.data('marquee',options);
               var _li=$('>li',_this);
                   
                   _this.wrap('<div class="slide_container"></div>')
                        .height(_this.height())
                       .hover(function(){if($(this).data('marquee').stop){$(this).stop(true,false);}},
                              function(){if($(this).data('marquee').stop){$(this).marquee('slide');}})
                        .parent()
                        .css({position:'relative',overflow:'hidden','height':$('>li',_this).height()})
                        .find('>ul')
                        .css({width:screen.width*2,position:'absolute'});
           
                   for(var i=0;i<Math.ceil((screen.width*3)/_this.width());++i)
                   {
                     _this.append(_li.clone());
                   } 
             
               _this.marquee('slide');});
         },
      
         slide:function()
         {
           var $this=this;
           $this.animate({'left':$('>li',$this).width()*-1},
                         $this.data('marquee').duration,
                         'swing',
                         function()
                         {
                           $this.css('left',0).append($('>li:first',$this));
                           $this.delay($this.data('marquee').delay).marquee('slide');
             
                         }
                        );
                             
         }
       };
   
     $.fn.marquee = function(m) 
     {
       var settings={
                     'delay':2000,
                     'duration':900,
                     'stop':true
                    };
       
       if(typeof m === 'object' || ! m)
       {
         if(m){ 
         $.extend( settings, m );
       }
 
         return methods.init.apply( this, [settings] );
       }
       else
       {
         return methods[m].apply( this);
       }
     };
   }
 )( jQuery );
 
 //Plugin end
 
 //call
 $(document).ready(
   function(){$('.slide').marquee({delay:3000});}
 );
 
 
</script>


<!---------------------------------------------------------Total Uploader----------------------------------------------------->
<?php
function getfnama($uname)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$uname'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
	return $name;

}


function countUp($id)
{
	$q="SELECT count(*) FROM ktube_content WHERE upload_by='$id' order by upload_by";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
	return $name;

}


?>	


<div id="content" style="background-color:#FFFFFF; width:70%; height:auto"> 
<br>
<img src ="<?php echo $base; ?>/images/welcomeMessageKTUBE.png" width="37%"/>
<br>
<br>
 
 <div style="width:35%; float:left; height:auto">
 	
	<b style="font-size:20px">Recent Uploader</b>
	<br>
	<br>
	
 	<table style="border:thin; width=40%"  border="0" cellpadding="10">
    <tr align="center">
        <td bgcolor="#003399" style="color:#FFFFFF">Uploader</td>
		<td bgcolor="#003399" style="color:#FFFFFF">Total Upload</td>
		
	</tr>	
	
	
	
		<?php

		$l = mysql_query ("SELECT upload_by, COUNT(upload_by) as count FROM ktube_content GROUP BY upload_by ORDER BY COUNT(upload_by)DESC LIMIT 7");
		while($content = mysql_fetch_array($l))
		{
				
		
			$q = mysql_query("SELECT * FROM tbl_userinfo");
			while($data = mysql_fetch_array($q))
			{
				if ($content["upload_by"] == $data["id"])
				{
?>
			
			
			<tr>
				<td><?php echo $data["fullname"]; ?></td>
				<td align="center"><?php echo $content["count"] ?></td>
			</tr>
			<?php
			}}
			}
			?>


</table>
</div>

<br>

<br>



<!------------------------------------------------------------Recently Added------------------------------------------------------>
<?php

function atten($studid)
{
	$q="SELECT fullname FROM tbl_userinfo WHERE id='$studid'";
		list($name)= mysql_fetch_row(mysql_query($q));
		$r=mysql_query($name);
return $name;

}

?>

	
<div class="recent" style="width:100%; float:left">
	<br/>
	<br/>
	<b style="font-size:20px">Recent Upload</b>
	<br/>
	
	<ul class="slide">
<?php

		$q = mysql_query("SELECT * FROM ktube_content ORDER BY id DESC LIMIT 10");
		while($data = mysql_fetch_array($q)){
?>

<?php
if($data["type2"]=="Video"){
?>

<li><a href="<?php echo $base."$data[path]";?>" title="<?php echo $data["title"]; ?>" rel="gb_page_center[600, 400]">
<img src ="<?php echo $base; ?>/images/play.png" width = "30" height = "30"/><br/><font color="#0066FF" style="font-style:italic;"><?php echo $data["time"];?></font>&nbsp;&nbsp;&nbsp;<div id="data" style="border: 0px solid #000; "><?php echo $data["title"]; ?></div><p id="font">by&nbsp;<br><?php echo atten($data["upload_by"]); ?></p></a>
</li>

<?php
}//if video
?>


<?php
if($data["type2"]=="Document"){
?>
<li><a href="<?php echo $site."/ktube_control/open_document/$data[id]"; ?>" title="<?php echo $data["title"]; ?>" rel="gb_page_center[600, 400]">
<img src ="<?php echo $base; ?>/images/open-file.png" width = "10" height = "10"/> <br/><font color="#0066FF" style="font-style:italic;"><?php echo $data["time"];?></font> &nbsp;&nbsp;&nbsp;<div id="data" style="border: 0px solid #000; "><?php echo $data["title"]; ?></div><p id="font">by&nbsp;<br><?php echo atten($data["upload_by"]); ?></p></li></a>

<?php
}//if video
?>

<?php 
}
?>

</ul>
</div>


<div style="width:100%;" >
<br>
<table>
	
	<tr>
		<td height="31" colspan="5" align="center" style="background-color:#FF0033; color:#FFFFFF">Most Liked Videos</td>
	</tr>
	<tr>
<?php

		$l = mysql_query ("SELECT content_id, COUNT(content_id) as count FROM ktube_like GROUP BY content_id ORDER BY COUNT(content_id)DESC
LIMIT 5");
		while($content = mysql_fetch_array($l))
		{
				
		
			$q = mysql_query("SELECT * FROM ktube_content");
			while($data = mysql_fetch_array($q))
			{
				if ($content["content_id"] == $data["id"])
				{
?>
	
		<td style="width:166;" align="center">
	<a href=" <?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$data["id"].'')?>" title="<?php echo $data["title"]; ?>"> 
			
			<video width="80%" height="30%"  >
			
 					 <source src="<?php echo $base."$data[path]";?>" type="video/mp4"  >
			</video><br/></a><br>

		<a href="<?php echo base_url('index.php/ktube_control/ktube_video/0/0/0/?cid='.$data["id"].'')?>"><?php echo $data["title"]; ?></a>
		
		 <p style="font-size:smaller; color:#8B8386">by&nbsp;<?php echo atten($data["upload_by"]); ?><br /> <img src ="<?php echo $base; ?>/images/love.png" width = "10" height = "10" /> &nbsp;<?php echo $content["count"]; ?> Likes,&nbsp;<?php echo $data["view_count"]; ?> Views</p>

	  </td>


<?php
}}}
?>



</tr>
</table>
</div>
<br>
<br/>
<br/>

<div>

