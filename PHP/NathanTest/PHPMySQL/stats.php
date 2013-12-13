<?php
require_once('globals.php');

function queryThis($sql)//queries the database with given string
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database");
	
	$result = mysql_query($sql);
	if (!$result) 
	{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sql . 'Press back!';
		die($message);
	}
	
	mysql_close();
	
	return $result;
}

function updateStats($teamno)//performs stats calculations on a given teamno
{
	$username=$GLOBALS['username'];
	$password=$GLOBALS['password'];
	$database=$GLOBALS['database'];
	$server=$GLOBALS['server'];
	$connect=mysql_connect($server,$username,$password); 
	mysql_select_db($database) or die( "Unable to open database");
	$tn=mysql_real_escape_string($teamno,$connect);
	
	$sql = "select avg(S.final), avg(S.raw), avg(S.penalty)\n"
    . "FROM Score S, Alliance A \n"
    . "WHERE (A.t1id='".$tn."'\n"
    . "OR A.t2id='".$tn."'\n"
    . "OR A.t3id='".$tn."')\n"
    . "AND A.sid=S.sid";//get the average score of a given team
	$result = mysql_query($sql);
	if (!$result) 
	{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sql . 'Press back!';
		die($message);
	}
	
	$row = mysql_fetch_array($result);
	$final=$row[0];
	$raw=$row[1];
	$penalty=$row[2];
	
	if($final==NULL)//non-nulls null responses
	{
		$final=0;
	}
	if($raw==NULL)
	{
		$raw=0;
	}
	if($penalty==NULL)
	{
		$penalty=0;
	}
	
	$sql = "UPDATE Score\n"
    . "SET final=".$final.", raw=".$raw.", penalty=".$penalty."\n"
    . "WHERE sid='".$tn."'";//updates team entry on score table
	
	$result = mysql_query($sql);
	if (!$result) 
	{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sql . 'Press back!';
		die($message);
	}
	$sql = "select count(A.sid)\n"
    . "FROM Alliance A \n"
    . "WHERE A.t1id='".$tn."'\n"
    . "OR A.t2id='".$tn."'\n"
    . "OR A.t3id='".$tn."'";//counts number of matches
	
	$matchesarry=mysql_fetch_array(queryThis($sql));
	$matches = intval($matchesarry[0]);
	
	$sql = "select count(B.aid)\n"
    . "from brokeWith B\n"
    . "where B.teamno='".$tn."';";//counts broken games
	
	$brokenarry=mysql_fetch_array(queryThis($sql));
	$broken = intval($brokenarry[0]);
	
	$reliability=1-($broken/$matches);
	
	$sql = "select A.aid\n"
    . "FROM Score S, Alliance A\n"
    . "WHERE (A.t1id='".$tn."'\n"
    . "OR A.t2id='".$tn."'\n"
    . "OR A.t3id='".$tn."')\n"
    . "AND A.sid=S.sid";//gets list of alliances
	
	$allianceq=queryThis($sql);
	
	$alliances=array();
	
	while($row = mysql_fetch_array($allianceq)) 
	{
		array_push($alliances,$row['aid']);
	}
	
	$opponents=array();
	
	foreach($alliances as $alliance)//generates list of oposing alliances by switching B(blue) to R(red) and vice-versa
	{
		if($alliance[strlen($alliance)-1]=='B')
		{
			$alliance=str_replace('B','R',$alliance);
		}
		else if($alliance[strlen($alliance)-1]=='R')
		{
			$alliance=str_replace('R','B',$alliance);
		}
		array_push($opponents,$alliance);
	}
	
	$opcount=count($opponents);
	$opavg=0.0;
	
	foreach($opponents as $alliance)//gets list of final opponent scores
	{
		$sql = "select S.final\n"
		. "FROM Score S\n"
		. "WHERE S.sid='".$alliance."'";
		$opfinal=mysql_fetch_array(queryThis($sql));
		$opavg+=floatval($opfinal[0]);
	}
	$opavg=(float)$opavg/(float)$opcount;
	
	$offense=((float)$final-$opavg)/$opavg;
	
	if($opcount==0)
	{
		$offense=0;
	}
	
	if($opavg==0)
	{
		$offense=0;
	}
	
	$sql = "select D.aid\n"
    . "FROM defensiveWith D\n"
    . "WHERE D.teamno='".$tn."';";//get defensive matches
	
	$dalliancesq=queryThis($sql);
	
	
	$dalliances=array();
	
	while($row = mysql_fetch_array($dalliancesq)) 
	{
		array_push($dalliances,$row['aid']);
	}
	
	$dopponents=array();
	
	foreach($dalliances as $dalliance)
	{
		if($dalliance[strlen($dalliance)-1]=='B')
		{
			$dalliance=str_replace('B','R',$dalliance);
		}
		else if($dalliance[strlen($alliance)-1]=='R')
		{
			$dalliance=str_replace('R','B',$dalliance);
		}
		array_push($dopponents,$dalliance);
	}
	
	$dopcount=count($dopponents);
	$dopavg=0.0;
	$dopfinal=array();
	
	foreach($dopponents as $dalliance)
	{
		$sql = "select S.final\n"
		. "FROM Score S\n"
		. "WHERE S.sid='".$dalliance."'";
		$dopfinal=mysql_fetch_array(queryThis($sql));
		$dopavg+=floatval($dopfinal[0]);
	}
	$dopavg=(float)$dopavg/(float)$dopcount;
	
	$defense=((float)$final-$dopavg)/$dopavg;
	
	if($dopcount==0)
	{
		$defense=0;
	}
	
	if($dopavg==0)
	{
		$defense=0;
	}
	
	$sql = "UPDATE Team\n"
    . "SET reliability=".$reliability.", offense=".$offense.", defense=".$defense."\n"
    . "WHERE teamno='".$tn."'";//update team stats
	
	queryThis($sql);
	
	mysql_close();
}

?>