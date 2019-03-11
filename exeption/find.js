$(document).ready(function(){
	$("#find").click(function(){
	$("#extxt").load("find.php","log="+$("#log").val())
	$("#exeption").show("slow")	
	})
	});    
