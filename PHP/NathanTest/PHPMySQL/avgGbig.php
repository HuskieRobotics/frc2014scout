<?php
include('g/phpgraphlib.php');
include 'themvars.php';
$connect=mysql_connect($server,$username,$password); 
		
mysql_select_db($database) or die( "Unable to open database");
if(strlen($_GET['comp'])==0)//Check if there is a filter for competition
{
	$query = "SELECT S.sid, S.raw, S.penalty, S.final FROM Score S, Team T WHERE S.sid=T.teamno ORDER BY final";
}
else
{
	$query = "SELECT S.sid, S.raw, S.penalty, S.final FROM Score S, isAt I WHERE S.sid=I.teamno AND I.tname='".$_GET['comp']."' ORDER BY final;";
}
$result=mysql_query($query,$connect); //send query
if (!$result) 
{
	die('Invalid query: ' . mysql_error());
}

$score_id=array();//initialize arrays
$final_data=array();
$penalty_data=array();
$raw_score_data=array();

while($row = mysql_fetch_array($result))//populate arrays
{
	array_push($score_id,$row['sid']);
	array_push($final_data,$row['final']);
	array_push($penalty_data,$row['penalty']);
	array_push($raw_score_data,$row['raw']);
}

$final=array_combine($score_id,$final_data);//pair array with keys
$penalty=array_combine($score_id,$penalty_data);
$raw=array_combine($score_id,$raw_score_data);

$graph = new PHPGraphLib(1920,1080);//draw graph PNG
$graph->addData($final,$penalty,$raw);
$graph->setGradient("242,148,34","242,131,34");
$graph->setDataValues(false);
$graph->setTitle('Team Score');
$graph->setTextColor("38,27,38");
$graph->setBackgroundColor("240,242,242");
$graph->setLegend(true);
$graph->setLegendTitle('Final','Penalty','Raw');
$graph->createGraph();
?>