var highCount=0;
var medCount=0;
var lowCount=0;
$(document).ready(function(){
	$("#highMinus").click(function(){
		highCount--;
		$('#highLabel').val(highCount);
	});
	$("#highPlus").click(function(){
		highCount++;
		$('#highLabel').val(highCount);
	});
        
        $("#medMinus").click(function(){
		medCount--;
		$('#medLabel').val(medCount);
	});
	$("#medPlus").click(function(){
		medCount++;
		$('#medLabel').val(medCount);
	});
        
        $("#lowMinus").click(function(){
		lowCount--;
		$('#lowLabel').val(lowCount);
	});
	$("#lowPlus").click(function(){
		lowCount++;
		$('#lowLabel').val(lowCount);
	});
});
