<?php
include 'themvars.php';
require_once('stats.php');

$sql="SELECT T.teamno FROM Team T;";//get a list of all teams in database
$result=queryThis($sql);

while($row = mysql_fetch_array($result))//recalculate every team's stats
{
	updateStats($row['teamno']);
}

header( 'Location: graphViewer.php' ) ;
?>