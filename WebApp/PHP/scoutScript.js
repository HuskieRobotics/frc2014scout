var highCountA=0;


$(document).ready(function(){
	$("#highMinusA").click(function(){
		highCountA--;
		$('#highLabelA').val(highCountA);
	});
	$("#highPlusA").click(function(){
		highCountA++;
		$('#highLabelA').val(highCountA);
	});
        
        $("#saveButton").click(function(){
            $.post("scoutSave.php", {"highCountA":highCountA, "teamNum":$("teamNum").val(), 
                "matchNum":$("matchNum").val()}, processResult);
            alert("saved");
        });
});

function processResult(data, textStatus)
{
    
}
