$(document).ready(function() {
    $("#submit").click(function() {
        var first = $("input:text[name=Entry1]").val();
        var second = $("input:text[name=Entry2]").val();
        var third = $("input:text[name=Entry3]").val();
        alert("Entry 1: " + first);
        if (first === "" || second === "" || third === "") {
            confirm("Form incomplete.");
        }
    });
});


