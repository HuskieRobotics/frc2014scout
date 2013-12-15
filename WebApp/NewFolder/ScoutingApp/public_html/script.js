/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
	
	$('#green').click(function(){
		$('#green').hide('fast');
	});
});
