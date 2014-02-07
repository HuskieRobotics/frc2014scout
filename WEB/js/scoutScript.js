$(document).ready(function(){
    // remove first comment to stop testing mode
    //$("#teamScoutingForm").hide();
    //$("#scoutAssignmentText").load("util/assignmentForm.html");

	$(".hit").click(function(){
        var scoreID = $(this).attr("data-scoreID");
        var shotID = $(this).attr("data-shotID");
		$("#"+scoreID).val(parseInt($("#"+scoreID).val())+1);
                $("#"+shotID).val(parseInt($("#"+shotID).val())+1);
	});
	$(".miss").click(function(){
		var shotID = $(this).attr("data-shotID");
        $("#"+shotID).val(parseInt($("#"+shotID).val())+1);
	});
        
    $(".plus").click(function(){
        var counterID = $(this).attr("data-counterID");
		$("#"+counterID).val(parseInt($("#"+counterID).val())+1);
	});
        
    $("#saveButton").click(function(){
        //var teamNum = $("#teamnum").val();
        //var matchNum = $("#matchnum").val();
        $.post("util/scoutSave.php", $("#scoutingForm").serialize(), function(data){
            alert(data);
        });
    });

    $("#getAssignmentButton").click(function(){
        if (($("#MATCH_NUM").val() != '') && ($("#NAME_OF_SCOUT").val() != ''))
        {
            $.post("util/getAssignment.php", $("#assignmentForm").serialize(), function(data){
                $("#scoutAssignmentText").html(data);
            });
            $("#teamScoutingForm").show();
            $("#teleop").hide();
        }
        else
        {
            $("#scoutAssignmentText").load("util/assignmentForm_redo.html");
        }
        return false;
    });

    $("#allianceBallEndCheck").click(function() {
        $("#teleop").show();
    });
});

function processResult(data, textStatus)
{
    alert(data);
}
