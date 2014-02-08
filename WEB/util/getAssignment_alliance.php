<?php
include 'GLOBAL.php';

$continue = false;

if (isset($_POST['MATCH_NUM']))
{
	$MATCH_NUM = $_POST['MATCH_NUM'];
	if (isset($_POST['NAME_OF_SCOUT']))
		$NAME_OF_SCOUT = $_POST['NAME_OF_SCOUT'];
}

if ($MATCH_NUM != '')
{
	$continue = true;
}

if ($continue)
{	
	$hash = $MATCH_NUM*10;
	echo <<<_END
	<h3>Hi $NAME_OF_SCOUT, you are scouting ... ALL THE ALLIANCES... in match $MATCH_NUM</h3>
_END;
	$CONNECT_COUNT++;
	$teamID = $CONNECT_COUNT % 6;
}
else
{
	echo <<<_END
	<form action="" id="assignmentForm">
	<p>Match #<input type="text" name="MATCH_NUM" placeholder="... 1 ..." />
	Your Name: <input type="text" name="NAME_OF_SCOUT" placeholder="... name ..." />
	</p>
	<a href="#" class="btn btn-large btn-success" id="getAssignmentButton">Get Assignment</a>
	</br>
	<h3>Please try again.</h3>
	</br>
	</form>
	<h3>Hi $NAME_OF_SCOUT, you are scouting ... in match $MATCH_NUM</h3>
_END;
}