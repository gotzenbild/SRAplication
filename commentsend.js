$(document).ready(function(){
	$("#comButID").click(function(){
	$("#e").load("comphp.php","comID="+$("#comID").val());
	$('#comF')[0].reset();
	})
	});    
