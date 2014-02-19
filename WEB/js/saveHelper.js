$("#saveAssignments").click(function(event){
	event.preventDefault();
	alert("hi");
	var matchFormID = $(this).attr("data-saveFormID");
	alert(matchFormID);
	$.post("saveAssignments.php", $("#"+matchFormID).serialize(), function(data){
        alert(data);
    });

});