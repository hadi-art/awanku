$(document).ready(function(){
		  $("#submit").click(function(){
			//To Display progress bar 
			$("#loading").show();
			
			var title =$("#title").val();
			var file =$("#file").val();
			var level =$("#level").val();
			var subjek =$("#subjek").val();
			var idp =$("#idp").val();
			var type2 =$("#type2").val();
						
			//transfering form information to different page without page refresh
			$.post("processing.php",{ title: title, file: file, level: level, subjek: subjek, type2: type2},
				function(status){
					
					//To Hide progress bar 
					$("#loading").hide();
					alert(status);
				  });			
		  });
	    });