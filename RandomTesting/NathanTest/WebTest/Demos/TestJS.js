alert("Hello, this means that JavaScript is running.");
/* window.onload = function() {
	alert("Hello, this means that JavaScript is running.");
} */
$(document).ready(function() {
    $("div").append($("<p>Hello, this means the jQuery crap is working.</p>"));
    $("div").mouseenter(function() {
        $("div").fadeTo("slow", 0.5);
    });
    $("div").mouseleave(function() {
        $("div").fadeTo("slow", 1);
    });
});