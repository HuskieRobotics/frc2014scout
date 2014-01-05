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
            var teamNum = $("#teamnum").val();
            var matchNum = $("#matchnum").val();
            $.post("scoutSave.php", {"teamNum":teamNum,
                "matchNum":matchNum, "highLabelA":highCountA}, processResult);
            alert("saved");
        });
});

function processResult(data, textStatus)
{
    alert(data);
}
