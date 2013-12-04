<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
include 'themvars.php';
require_once('stats.php');

$toRem=array_keys($_POST);//grab all keys from the post data, which are the matches to remove

$alliances=array();

foreach ($toRem as $value)//create arrays of what to delete
{
	$sql = "SELECT M.REDid, M.BLUEid \n"
    . "FROM tMatch M\n"
    . "WHERE M.mid='".$value."'";
	$result=queryThis($sql);
	$row=mysql_fetch_array($result);
	array_push($alliances,$row['BLUEid']);
	array_push($alliances,$row['REDid']);
}

$teams=array();

foreach ($alliances as $value)//create arrays of stats to update
{
	$sql = "SELECT A.t1id, A.t2id, A.t3id\n"
    . "FROM Alliance A\n"
    . "WHERE A.aid='".$value."'";
	$result=queryThis($sql);
	$row=mysql_fetch_array($result);
	array_push($teams,$row['t1id']);
	array_push($teams,$row['t2id']);
	array_push($teams,$row['t3id']);
}


foreach ($alliances as $value)//delete all possible brokeWith entries from database
{
	$sql="DELETE IGNORE FROM brokeWith WHERE aid='".$value."';";
	$result=queryThis($sql);
}

foreach ($alliances as $value)//delete all possible defensiveWith entries from database
{
	$sql="DELETE IGNORE FROM defensiveWith WHERE aid='".$value."';";
	$result=queryThis($sql);
}

foreach ($alliances as $value)//delete all possible score entries from database
{
	$sql="DELETE IGNORE FROM Score WHERE sid='".$value."';";
	$result=queryThis($sql);
}

foreach ($alliances as $value)//delete all possible alliance entries from database
{
	$sql="DELETE IGNORE FROM Alliance WHERE aid='".$value."';";
	$result=queryThis($sql);
}

foreach ($toRem as $value)//delete all possible tMatch entries from database
{
	$sql="DELETE IGNORE FROM tMatch WHERE mid='".$value."';";
	$result=queryThis($sql);
}

foreach ($teams as $value)//update all effected team stats
{
	updateStats($value);
}

foreach ($toRem as $value)//delete all possible happenedAt entries from database
{
	$sql="DELETE IGNORE FROM happenedAt WHERE mid='".$value."';";
	$result=queryThis($sql);
}


header( 'Location: matchRem.php' ) ;
?>