$(document).ready(function(){
    // remove first comment to stop testing mode
    $("#teamScoutFORM").hide();
    $("#allianceScoutingForm").hide();
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
        
    $("#team_saveButton").click(function(){
        $.post("util/scoutSave.php", $("#teamScoutingForm").serialize(), function(data){
            alert(data);
        });
    });

    $("#getAssignmentButton_team").click(function(){
        if (($("#MATCH_NUM").val() != '') && ($("#NAME_OF_SCOUT").val() != ''))
        {
            $.post("util/getAssignment_team.php", $("#assignmentForm").serialize(), function(data){
                $("#scoutAssignmentText").html(data);
            });
            $("#teamScoutFORM").show();
            $("#teleop").hide();
        }
        else
        {
            $("#scoutAssignmentText").load("util/assignmentForm_redo.html");
        }
        return false;
    });

    $("#getAssignmentButton_alliance").click(function(){
        if (($("#MATCH_NUM").val() != '') && ($("#NAME_OF_SCOUT").val() != ''))
        {
            $.post("util/getAssignment_alliance.php", $("#assignmentForm").serialize(), function(data){
                $("#scoutAssignmentText").html(data);
            });
            $("#allianceScoutingForm").show();
        }
        else
        {
            $("#scoutAssignmentText").load("util/assignmentForm_redo.html");
        }
        return false;
    });

    $("#allianceBallEndLink").click(function() {
        $("#teleop").show();
        return false;
    });
});

function processResult(data, textStatus)
{
    alert(data);
}