$(document).ready(function(){
    // remove first comment to stop testing mode
    $("#teamScoutingForm").hide();
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
        $("#scoutingArea").load("util/teamScout.html");

    });

    $("#alliance_saveButton").click(function(){
        $.post("util/scoutSave.php", $("#allianceScoutingForm").serialize(), function(data){
            alert(data);
        });
        $("#scoutingArea").load("util/allianceScout.html");

    });

    $("#getAssignmentButton_team").click(function(){
        if (($("#MATCH_NUM").val() != '') && ($("#NAME_OF_SCOUT").val() != ''))
        {
            $.post("util/getAssignment_team.php", $("#assignmentForm").serialize(), function(data){
                //alert(data);
                var newHTML = "Hi " + $("#NAME_OF_SCOUT").val() + ", ";
                newHTML = newHTML += "you are scouting <b>"+data+"</b>";
                newHTML = newHTML += " in match " + $("#MATCH_NUM").val() + ".";
                $("#scoutAssignmentText").html(newHTML);
                $("#TEAM_NUM_form").val(data);
            });
            $("#teamScoutingForm").show();
            $("#teleop").hide();
            $("#MATCH_NUM_form").val($("#MATCH_NUM").val());
            $("#NAME_OF_SCOUT_form").val($("#NAME_OF_SCOUT").val());
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
                var newHTML = "Hi " + $("#NAME_OF_SCOUT").val() + ", ";
                newHTML = newHTML += "you are scouting <b>"+data+" alliance</b>";
                newHTML = newHTML += " in match " + $("#MATCH_NUM").val() + ".";
                $("#scoutAssignmentText").html(newHTML);
                $("#ALLIANCE_COLOR_form").val(data);
                var matchNum = $("#MATCH_NUM_form").val();
                var hash = getHash(matchNum, data);
                $("#hash_field").val(hash);
            });
            $("#allianceScoutingForm").show();
            $("#MATCH_NUM_form").val($("#MATCH_NUM").val());
            $("#NAME_OF_SCOUT_form").val($("#NAME_OF_SCOUT").val());
            
        }
        else
        {
            $("#scoutAssignmentText").load("util/assignmentForm_redo.html");
        }
        return false;
    });

    $("#allianceBallEndLink").click(function() {
        $("#teleop").show();
    });

    $("#allianceBallEndTime_checkbox").click(function() {
        $("#allianceBallEndTime").val($("#timerBox").val());
    });

    function getHash(matchNum, allianceColor)
    {
        //get numerical value for allianceColor
        var allianceNum;
        if (allianceColor == "red")
        {
            allianceNum = 0;
        }
        else
        {
            allianceNum = 1;
        }
        return (matchNum*10)+allianceNum;
    }
});

function processResult(data, textStatus)
{
    alert(data);
}