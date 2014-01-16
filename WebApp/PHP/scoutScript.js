$(document).ready(function(){
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
            $.post("scoutSave.php", $("#scoutingForm").serialize(), function(data){
                alert(data);
            });
        });
});

function processResult(data, textStatus)
{
    alert(data);
}
