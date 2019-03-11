$(document).ready(function(){
	$("#reg").click(function(){
	$("#extxt").load("reg.php","logr="+$("#logr").val()+"&passr="+$("#passr").val()+"&mailr="+$("#mailr").val()+"&namer="+$("#namer").val()+"&secr="+$("#secr").val()+"&surr="+$("#surr").val())
	$("#exeption").show("slow")	
	})
	});    
