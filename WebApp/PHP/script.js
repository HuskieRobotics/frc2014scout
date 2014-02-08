// setting up all the counters for various point values
// in different stages of the game
var highCountA=0;
var medCountA=0;
var lowCountA=0;
var highCountT=0;
var medCountT=0;
var lowCountT=0;

$(document).ready(function(){
        // code to dynamically update the labels
        // as the user hits plus or minus
        
        /* uncomment this part for dynamic matrixUI stuff
        $("#1blue").click(function(){
            $("#1blue").css("background-color", "black");
        });
        **/
        
        //AUTO
	$("#highMinusA").click(function(){
		highCountA--;
		$('#highLabelA').val(highCountA);
	});
	$("#highPlusA").click(function(){
		highCountA++;
		$('#highLabelA').val(highCountA);
	});
        
        $("#medMinusA").click(function(){
		medCountA--;
		$('#medLabelA').val(medCountA);
	});
	$("#medPlusA").click(function(){
		medCountA++;
		$('#medLabelA').val(medCountA);
	});
        
        $("#lowMinusA").click(function(){
		lowCountA--;
		$('#lowLabelA').val(lowCountA);
	});
	$("#lowPlusA").click(function(){
		lowCountA++;
		$('#lowLabelA').val(lowCountA);
	});
        
        //TELEOP
        $("#highMinusT").click(function(){
		highCountT--;
		$('#highLabelT').val(highCountT);
	});
	$("#highPlusT").click(function(){
		highCountT++;
		$('#highLabelT').val(highCountT);
	});
        
        $("#medMinusT").click(function(){
		medCountT--;
		$('#medLabelT').val(medCountT);
	});
	$("#medPlusT").click(function(){
		medCountT++;
		$('#medLabelT').val(medCountT);
	});
        
        $("#lowMinusT").click(function(){
		lowCountT--;
		$('#lowLabelT').val(lowCountT);
	});
	$("#lowPlusT").click(function(){
		lowCountT++;
		$('#lowLabelT').val(lowCountT);
	});
});
