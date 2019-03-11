$(document).ready(function(){
	$("#auto").click(function(){
	$("#extxt").load("auto.php","log="+$("#log").val()+"&pass="+$("#pass").val())
	$("#exeption").show("slow")	
	})
	});    
