var count = 0;
$(document).ready(function() {
    $("#increment").click(function() {
        count += 1;
        $("div").html("Total: " + count);
    });
    $("#done").click(function() {
        alert("Total is " + count);
    });
});


