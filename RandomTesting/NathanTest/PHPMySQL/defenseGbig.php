<?php
include('g/phpgraphlib.php');
include 'themvars.php';
$connect=mysql_connect($server,$username,$password); 
		
mysql_select_db($database) or die( "Unable to open database");
if(strlen($_GET['comp'])==0)//check for competiton filter
{
	$query="Select * from Team T ORDER BY defense;";
}
else
{
	$query="Select * FROM `Team` T, isAt I WHERE T.teamno=I.teamno AND I.tname='".$_GET['comp']."' ORDER BY defense;";
}
$result=mysql_query($query,$connect);//query
if (!$result) 
{
	die('Invalid query: ' . mysql_error());
}

$teamno=array();//initialize arrays
$defense_score=array();

while($row = mysql_fetch_array($result))//populate arrays
{
	array_push($teamno,$row['teamno']);
	array_push($defense_score,$row['defense']);
}

$teamno=array_combine($teamno,$defense_score);//pair score with keys


$graph = new PHPGraphLib(1920,1080);//draw PNG
$graph->addData($teamno);
$graph->setGradient("242,148,34","242,131,34");
$graph->setDataValues(false);
$graph->setTitle('Team Defense');
$graph->setTextColor("38,27,38");
$graph->setBackgroundColor("240,242,242");
$graph->createGraph();
?>