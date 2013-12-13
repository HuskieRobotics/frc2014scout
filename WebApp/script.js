// JavaScript Document
$(document).ready(function(){
	$('div').click(function(){
		$('div').fadeOut('slow');
	});
	
	$('div').mousedown(function(){
		$('div').hide('fast');
	});
	
	$('div').mouseenter(function(){
		$('div').fadeTo('fast', 1);
	});
	
	$('div').mouseleave(function(){
		$('div').fadeTo('fast',.5);
	});
	
});